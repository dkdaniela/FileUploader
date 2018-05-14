<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>File Uploader</title>

            <link rel="stylesheet" type="text/css" href="src/css/main.css">

            <script src="node_modules/jquery/dist/jquery.js"></script>
            <script src="node_modules/web3/dist/web3.js"></script>
            <script src="node_modules/fileapi/dist/fileAPI.js"></script>
            <script src="node_modules/js-md5/src/md5.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
        </head>

        <body>
            <div class="container">

                <small id="first-address-label"></small>

                <form method="post" action="upload.php" enctype="multipart/form-data" id="uploadform" name="uploadform">

                    <input id="upload" type="file" name="upload">

                    <button id="submit-btn" type="submit">Upload file</button>

                </form>

                <button id="button-send">Send File</button><br>

                <small style="margin-bottom: 30px; display:block">* (File is automatically sent to second testrpc address)</small>

                <hr/>

                <small style="margin-top: 30px; display:block" id="second-address-label"></small>

                <button id="button-download">Get File</button>

            </div>

            <script src="src/js/web3.js"></script>


            <!-- If UploadFile button is clicked-->
            <!-- Upload the file, hash it and return the hash-->
            <?php  if($_GET['hash']) { ?>

                <script> FileUploader.setHash('<?php echo $_GET['hash']?>'); </script>

                <?php

                header('Location: index.php');
                exit;
            }?>

            <script>

                $(document).ready(function() {

                    document.getElementById('first-address-label').innerText =
                        'Actions performed by the first testrpc address: ' + web3.eth.accounts[0];
                    document.getElementById('second-address-label').innerText =
                        'Actions performed by the second testrpc address: ' + web3.eth.accounts[1];

                });

                document.getElementById('button-download').addEventListener('click', function() {
                    window.location = "download.php?hash=" + FileUploader.hash();
                }, false);

            </script>

        </body>
    </html>