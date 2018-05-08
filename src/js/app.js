// Calculate hash from uploaded file
document.getElementById('button-hash').addEventListener('click', fileHashEventHandler, false);

function fileHashEventHandler(evt) {

    var file = document.getElementById('upload').files[0];

    fileHash(file, sha256, function(resultFileHash){
        // Contract interaction - Set the hash
        FileUploader.setHash(resultFileHash);

        console.log(FileUploader.hash());
    });
}

function fileHash(file, hasher, smartContractInteractor) {
    //Instantiate a reader
    var reader = new FileReader();

    //Make hash
    reader.onload = function(e){
        var hash = hasher(e.target.result);
        smartContractInteractor(hash);
    };

    reader.readAsBinaryString(file);
}


// Encrypt uploaded file and send to another address
document.getElementById('button-send').addEventListener('click', fileEncryptEventHandler, false);

function fileEncryptEventHandler(evt) {

    var file = document.getElementById('upload').files[0];

    fileEncrypt(file, function(resultEncryptedFile){
        // Contract interaction - Encrypt file and send to an address

        // Receiving address
        var receiver = web3.eth.accounts[1];

        FileUploader.sendEncryptedFile(receiver, resultEncryptedFile.toString());

    });
}

function fileEncrypt(file, smartContractInteractor) {
    //Instantiate a reader
    var reader = new FileReader();

    // Encrypt uploaded file
    reader.onload = function(e){
        var encryptedFile = CryptoJS.AES.encrypt(e.target.result, 'SB96$5$Z~bWR*w)');
        smartContractInteractor(encryptedFile);
    };

    reader.readAsBinaryString(file);
}