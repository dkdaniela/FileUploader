// if(typeof web3 !== 'undefined') {
//     // Is there an injected web3?
//     web3 = new Web3(web.currentProvider);
// } else {
    // If there's no web3 injected use testrpc
    web3 = new Web3(new Web3.providers.HttpProvider('http://localhost:8545'));
// }

web3.eth.defaultAccount = web3.eth.accounts[0];


var fileUploaderContractAddress = '0x9b9fedab6f7a6fdce2f9afc4019aed3decb68db0';

var fileUploaderContractAbi = [
    {
        "constant": false,
        "inputs": [
            {
                "name": "_recipient",
                "type": "address"
            },
            {
                "name": "_encryptedFile",
                "type": "string"
            }
        ],
        "name": "sendEncryptedFile",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "_hash",
                "type": "string"
            }
        ],
        "name": "setHash",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "getEncryptedFile",
        "outputs": [
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "hash",
        "outputs": [
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    }
];

var FileUploaderContract = web3.eth.contract(fileUploaderContractAbi);

var FileUploader = FileUploaderContract.at(fileUploaderContractAddress);
