<?php
session_start();
require ('../functions/keselamatan.php');
require('../functions/config.php');

?>
<html>
    <head>
    <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <?php include("../components/menu.php"); ?>
    </body>
    <main>
    <center>
        <h3>Import Akaun Pekerja</h3>
        <body>
            <fieldset>
            <label>Pilih lokasi fail CSV/Excel:</label><br>
            <form action="../functions/import_proses.php" method="POST" name="upload_excel" enctype="multipart/form-data"><br>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="file" id="file" class="input-large">
                    </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <button class="waves-effect waves-light btn-small" type="submit" id="submit" name="Import">Upload</button><br>
            </form><br>
            </fieldset>
        </body>
    </center></main>
</html>