<?php

function openConnection()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $db = "BlockchainFilesData";


    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
    // Check connection
    if ($conn->connect_error)
    {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
    }


    return $conn;
}

function closeConnection($conn)
{
    $conn -> close();
}

?>