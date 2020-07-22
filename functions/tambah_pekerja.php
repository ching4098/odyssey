<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');

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
    <main style="padding-left:5%;padding-right:5%">
        <body>
            <h3>Tambah Pekerja</h3>
            <form name="form1" action="../functions/tambah_pekerja.php" method="POST" onsubmit="return validateForm(this)">
                <fieldset style="padding-left:25%;padding-right:25%">
                    <label>Nama Pengguna:</label><input type="text" name="namaPengguna" id="namaPengguna"><br><br>
                    <label>Kata Laluan:</label><input type="password" name="kataLaluan" id="kataLaluan"><br><br>
                    <label for="jenisPengguna">Jenis Pengguna:</label>
                        <select id="jenisPengguna" name="jenisPengguna">
                        <option value="" disabled selected>Pilih Status Pengguna:</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="PEKERJA">PEKERJA</option>
                    </select>
                    <br>
                    <button class="waves-effect waves-light btn-small" type="submit" name="update" id="submit" value="Tambah Pengguna" />Tambah Pengguna</button>
                    <br>
                    <br>
                </fieldset>
            </form>
            <br><a class="waves-effect waves-light btn-small" href="../pages/pekerja.php">Ke Senarai Pekerja</a><br>
        </body>
        <script>
            M.AutoInit();
        </script>
        <script>
        function validateForm(form) {
            if(form.kataLaluan.value == "" || form.namaPengguna.value == "" || form.jenisPengguna.value == "") {
                M.toast({
                    html: 'Sila masukkan nama pengguna, kata laluan atau jenis pengguna anda',
                    classes: 'rounded'
                });
                return false;
            }
            if(form.kataLaluan.value.length >= 26 || form.kataLaluan.value.length <= 5) {
                M.toast({
                    html: 'Panjang kata laluan anda adalah dari 6 hingga 25 perkataan',
                    classes: 'rounded'
                });
                return false;
            }
            return true;
        }
    </script>
    </main></center>
</html>