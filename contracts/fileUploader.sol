pragma solidity ^0.4.23;

contract FileUploaderContract {

    mapping (address => string) encryptedFile;

    string public hash;

    // Set the file hash
    function setHash(string _hash) public {

        if(!(bytes(hash).length > 0)) {
            hash = _hash;
        } else {
            return;
        }
    }
    // Send enctypred file to an address
    function sendEncryptedFile(address _recipient, string _encryptedFile) public {
        encryptedFile[_recipient] = _encryptedFile;
    }

    function getEncryptedFile() view public returns (string) {
        return encryptedFile[msg.sender];
    }

}