<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');
require('../components/header.php');
if(isset($_POST['namaPengguna'])) {
    $namaPengguna = $_POST['namaPengguna'];
    $kataLaluan = $_POST['kataLaluan'];
    $jenisPengguna = $_POST['jenisPengguna'];
    //add new record
    $result = mysqli_query($samb, "INSERT INTO pengguna (namaPengguna, kataLaluan, jenisPengguna) VALUES ('$namaPengguna','$kataLaluan','$jenisPengguna')");
    echo "<script>alert('Penambahan Rekod Pengguna Baru telah Berjaya Dibuat'); window.location='../pages/pekerja.php'</script>";
}
?>
<html>
    <head>
        <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <?php include("../components/menu.php"); ?>
    <center>
        <main>
        <body>
            <h3>Tambah Pekerja</h3>
            <form name="form1" action="../functions/tambah_pekerja.php" method="POST">
                <fieldset style="padding-left:25%;padding-right:25%">
                    <label>Nama Pengguna:</label><input type="text" name="namaPengguna" id="namaPengguna" required><br><br>
                    <label>Kata Laluan:</label><input type="password" name="kataLaluan" id="kataLaluan" required><br><br>
                    <label for="jenisPengguna">Jenis Pengguna:</label>
                        <select class="browser-default" id="jenisPengguna" name="jenisPengguna" required>
                        <option value="" disabled selected>Pilih Status Pengguna:</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="PEKERJA">PEKERJA</option>
                    </select>
                    <br>
                    <button class="waves-effect waves-light btn-small purple" type="submit" name="update" id="submit" value="Tambah Pengguna" />Tambah Pengguna</button>
                    <br>
                    <br>
                </fieldset>
            </form>
            <br><a class="waves-effect waves-light btn-small purple" href="../pages/pekerja.php">Ke Senarai Pekerja</a><br>
        </body>
    </main></center>
</html>