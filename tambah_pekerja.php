<?php
require('config.php');
require('header.php');
if(isset($_POST['namaPengguna'])) {
    $namaPengguna = $_POST['namaPengguna'];
    $kataLaluan = $_POST['kataLaluan'];
    $jenisPengguna = $_POST['jenisPengguna'];
    //add new record
    $result = mysqli_query($samb, "INSERT INTO pengguna (namaPengguna, kataLaluan, jenisPengguna) VALUES ('$namaPengguna','$kataLaluan','$jenisPengguna')");
    echo "<script>alert('Penambahan Rekod Pengguna Baru telah Berjaya Dibuat'); window.location='pekerja.php'</script>";
}
?>
<html>
    <center>
        <body>
            <h3>TAMBAH PEKERJA</h3>
            <form name="form1" action="tambah_pekerja.php" method="POST">
                <fieldset>
                    <label>Nama Pengguna:</label><input type="text" name="namaPengguna" id="namaPengguna" /><br><br>
                    <label>Kata Laluan:</label><input type="password" name="kataLaluan" id="kataLaluan" /><br><br>
                    <label for="jenisPengguna">Jenis Pengguna:</label>
                    <select id="jenisPengguna" name="jenisPengguna">
                        <option value="ADMIN">ADMIN</option>
                        <option value="PEKERJA">PEKERJA</option>
                    </select>
                    <br><br>
                    <input type="submit" name="update" id="submit" value="Tambah Pengguna" />
                </fieldset>
            </form>
            <a href="pekerja.php">Ke Senarai Pekerja</a><br>
        </body>
    </center>
</html>