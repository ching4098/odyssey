<?php
require('config.php');
require('header.php');
?>
<html>
    <center>
        <h2>DAFTAR LOGIN PEKERJA<br>
        IMPORT FAIL .CSV</h2>
        <body>
            <fieldset>
            <label>Pilih lokasi fail CSV/Excel:</label>
            <form action="import_proses.php" method="POST" name="upload_excel" enctype="multipart/form-data">
            <input type="file" name="file" id="file" class="input-large"><br>
            <button type="submit" id="submit" name="import">Upload</button>
            </form><br>
            <a href="dashboardAdmin.php">Laman Utama</a>
            </fieldset>
        </body>
    </center>
</html>