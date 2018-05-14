<?php

include 'db_connection.php';

if(isset($_GET['hash'])) {

    $conn = openConnection();

    $sql = "SELECT * FROM uploads WHERE `hash` = '".$_GET['hash']."'";

    $resultRow = $conn->query($sql);

    $row = mysqli_fetch_array($resultRow);

    closeConnection($conn);

    header('Location:' . $row['filePath']);

    exit;
}

header('Location: index.php');
exit;

?>