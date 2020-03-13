<?php
require('config.php');
require('header.php');
if(isset($_POST['update'])) {
    $idPengguna = $_POST['idPengguna'];
    $namaPengguna = $_POST['namaPengguna'];
    $kataLaluan = $_POST['kataLaluan'];
    $aras = $_POST['jenisPengguna'];
    //Kemaskini with new record
    $result = mysqli_query($samb, "UPDATE pengguna SET namaPengguna='$namaPengguna',kataLaluan='$kataLaluan',jenisPengguna='$aras' WHERE namaPengguna='idPengguna'");
    //show message if success
    echo "<script>alert('Kemaskini Rekod Pekerja telah berjaya');
    window.location='pekerja.php'</script>";
}
?>
<?php
//Dapatkan id dari url
$id = $_GET['kemaskini_id'];
//Pilih data berdasarkan id rekod
$result = mysqli_query($samb, "SELECT * FROM pengguna WHERE namaPengguna='$id'");
while($res = mysqli_fetch_array($result)) {
    //Show original data
    $user = $res['namaPengguna'];
    $name = $res['namaPengguna'];
    $pass = $res['kataLaluan'];
    $level = $res['jenisPengguna'];
}
?>
<html>
    <center>
        <body>
            <?php echo $user;?>
            <h3>KEMASKINI REKOD PEKERJA</h3>
            <form name="form1" action="kemaskini_pekerja.php" method="POST">
                <fieldset>
                    <label>Nama Pengguna:</label><input type="text" name="name" id="name" value="<?php echo $name;?>" /><br><br>
                    <label>Kata Laluan:</label><input type="text" name="pass" id="pass" value="<?php echo $pass;?>" />
                    <input type="hidden" name="level" id="level" value=<?php echo $level;?> >
                    <input type="hidden" name="name" id="name" value=<?php echo $user;?> ><br><br>
                    <input type="submit" name="update" id="submit" value="Kemaskini" />
                </fieldset>
            </form>
            <a href="pekerja.php">Ke Senarai Pekerja</a>
        </body>
    </center>
</html>