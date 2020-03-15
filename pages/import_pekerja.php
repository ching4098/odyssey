<?php
require('../functions/config.php');
require('../components/header.php');
?>
<html>
    <center>
        <h2>DAFTAR LOGIN PEKERJA<br>
        IMPORT FAIL .CSV</h2>
        <body>
            <fieldset>
            <label>Pilih lokasi fail CSV/Excel:</label><br>
            <form action="import_proses.php" method="POST" name="upload_excel" enctype="multipart/form-data"><br>
            <input type="file" name="file" id="file" class="input-large"><br>
            <button type="submit" id="submit" name="import">Upload</button><br>
            </form><br>
            <a href="../pages/dashboardAdmin.php">Laman Utama</a>
            </fieldset>
        </body>
    </center>
</html>