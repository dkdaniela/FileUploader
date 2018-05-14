<?php
include 'db_connection.php';
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');


$conn = openConnection();

if (isset($_FILES["upload"]["name"])) {

    $target_dir = "uploads/";

    $target_file = $target_dir.time()."_".rand(1000, 9999)."_".basename($_FILES["upload"]["name"]);

    //$fileExtension = strtolower(end(explode('.',$target_file)));

    if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_file)) {

        // Get the file hash
        $fileHash = md5($_FILES["upload"]["tmp_name"]);

        $sql = "INSERT INTO uploads (hash, filePath) VALUES ('$fileHash', '$target_file')";

        $conn->query($sql);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}

closeConnection($conn);

header('Location: index.php?hash='.$fileHash);
exit;

?>



