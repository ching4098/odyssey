<?php
session_start();
require ("../functions/keselamatan.php");
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
<?php include("../components/menu.php"); ?>
<head>
    <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
    <center>
        
        <main>
        <body>
            <h3>Kemaskini Rekod Pekerja</h3>
            <form name="form1" action="../functions/kemaskini_pekerja.php" method="POST">
                <fieldset style="padding-left:20%;padding-right:20%" >
                    <br><div class="row">
                    <div class="input-field col s12">
                        <input id="namaPengguna" type="text" name="namaPengguna" placeholder="<?php echo $username;?>">
                        <label for="text">Nama Pengguna</label>
                    </div><br><br>
                    <br><div class="row">
                    <div class="input-field col s12">
                        <input id="kataLaluan" type="password" name="kataLaluan" placeholder="<?php echo $pass;?>">
                        <label for="password">Kata Laluan</label>
                    </div>
                    </div>
                    Jenis Pengguna:
                    <br><br><br><select name="jenisPengguna" id="jenisPengguna" >
                        <option value="" disabled selected>Sila Memilih Opsyen Anda</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="PEKERJA">PEKERJA</option>
                    </select>
                    </div>
                    <input type="hidden" name="idPengguna" value=<?php echo $uid;?> ><br><br>
                    <button class="waves-effect waves-light btn-small" type="submit" name="update" id="submit" value="Kemaskini">Kemaskini</button>
                    <br>
                    <br>
                    <br>
                </fieldset>
            </form>
        </body>
        <script>M.AutoInit();</script>
    </main></center>
</html>