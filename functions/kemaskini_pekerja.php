<?php
require('../functions/config.php');
require('../components/header.php');
if(isset($_POST['update'])) {
    $idPengguna = $_POST['idPengguna'];
    $namaPengguna = $_POST['namaPengguna'];
    $kataLaluan = $_POST['kataLaluan'];
    $jenisPengguna = $_POST['jenisPengguna'];
    //Kemaskini with new record
    $result = mysqli_query($samb, "UPDATE pengguna SET namaPengguna='$namaPengguna',kataLaluan='$kataLaluan',jenisPengguna='$jenisPengguna' WHERE idPengguna='$idPengguna'");
    //show message if success
    echo "<script>alert('Kemaskini Rekod Pekerja telah berjaya');
    window.location='../pages/pekerja.php'</script>";
}
?>
<?php
//Dapatkan id dari url
$id = $_GET['idPengguna'];
//Pilih data berdasarkan id rekod
$result = mysqli_query($samb, "SELECT * FROM pengguna WHERE idPengguna='$id'");
while($res = mysqli_fetch_array($result)) {
    //Show original data
    $uid =$res['idPengguna'];
    $username = $res['namaPengguna'];
    $pass = $res['kataLaluan'];
    $status = $res['jenisPengguna'];
}
?>
<html>
    <center>
        <body>
            <h3>KEMASKINI REKOD PEKERJA</h3>
            <form name="form1" action="../functions/kemaskini_pekerja.php" method="POST">
                <fieldset>
                    <label>Nama Pengguna:</label><input type="text" name="namaPengguna" id="namaPengguna" placeholder="<?php echo $username;?>" /><br><br>
                    <label>Kata Laluan:</label><input type="pass" name="kataLaluan" id="kataLaluan" placeholder="<?php echo $pass;?>" /><br><br>
                    <label>Jenis Pengguna:</label>
                    <select id="jenisPengguna" name="jenisPengguna" id="jenisPengguna" >
                        <option aria-placeholder="<?php echo $status; ?>">Sila Memilih Opsyen Anda</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="PEKERJA">PEKERJA</option>
                    </select>
                    <input type="hidden" name="idPengguna" value=<?php echo $uid;?> ><br><br>
                    <input type="submit" name="update" id="submit" value="Kemaskini" />
                </fieldset>
            </form>
            <a href="../pages/pekerja.php">Ke Senarai Pekerja</a>
        </body>
    </center>
</html>