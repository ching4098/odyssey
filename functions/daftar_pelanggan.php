<?php
session_start();
require ("../functions/keselamatan.php");
require('config.php');
//semak sama ada data dengan IC Pelanggan telah dihantar
if (isset($_POST['icPelanggan'])){
    //pembolehubah untuk memegang data yang dihantar
    $icPelanggan = $_POST['icPelanggan'];
    $namaPelanggan = $_POST['namaPelanggan'];
    $noTelefon = $_POST['noTelefon'];
    $alamat1 = $_POST['alamat1'];
    $alamat2 = $_POST['alamat2'];
    $bandar = $_POST['bandar'];
    $poskod = $_POST['poskod'];
    $negeri = $_POST['negeri'];
    //Tambah rekod baru ke dalam table pelanggan
    $sql = "INSERT INTO pelanggan (icPelanggan, namaPelanggan, noTelefon)
    VALUES ('$icPelanggan','$namaPelanggan', '$noTelefon')";
    $hasil=mysqli_query($samb,$sql);
    //Tambah rekod baru ke dalam table alamat
    $sql1 = "INSERT INTO alamat (idAlamat, alamat1, alamat2, bandar, poskod, negeri, icPelanggan)
    VALUES (NULL, '$alamat1','$alamat2','$bandar', '$poskod', '$negeri', '$icPelanggan')";
    $hasil=mysqli_query($samb,$sql1);
    //papar mesej berjaya atau gagal simpan rekod baru
    if($hasil){
        echo "<script>alert('Pendaftaran Pelanggan Baru Berjaya');
        window.location='../pages/tempah.php'</script>";
    }else{
        echo "<script>alert('Pendaftaran Pelanggan Baru Gagal');
        window.location='../functions/daftar_pelanggan.php'</script>";
    }
}
?>


<html>
<head>
    <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <?php include("../components/menu.php"); ?>
    <main style="padding-left:5%;padding-right:5%">
    <h3>Pendaftaran Pelanggan Baru</h3><br>
<fieldset>
            <!-- Papar Borang Pendaftaran -->
            <form method="POST" style="padding-left:20%;padding-right:20%">
            <br><div class="input-field">
                <i class="material-icons prefix">perm_identity</i>
                <input id="icPelanggan" type="text" name="icPelanggan" placeholder="090807030555" maxlength="12" size="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus>
                <label for="icon_prefix">Nombor Kad Pengenalan <font size="3" color="ff0000">*Tanpa tanda "-"</font></label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">account_box</i>
                <input id="icon_prefix" type="text" name="namaPelanggan" placeholder="Muhammad Faris"  size="60" required>
                <label for="namaPelanggan">Nama Pelanggan</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input id="icon_prefix" type="text" name="noTelefon" placeholder="0187651769" maxlength="12" size="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus>
                <label for="noTelefon">Nombor Telefon</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">home</i>
                <input id="icon_prefix" type="text" name="alamat1" placeholder="Alamat 1"  size="60" required>
                <label for="alamat1">Alamat 1</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">home</i>
                <input id="icon_prefix" type="text" name="alamat2" placeholder="Alamat 2"  size="60">
                <label for="alamat2">Alamat 2</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">location_city</i>
                <input id="icon_prefix" type="text" name="bandar" placeholder="Bandar"  size="40" required>
                <label for="bandar">Bandar</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">local_post_office</i>
                <input id="icon_prefix" type="text" name="poskod" placeholder="17000"  size="7" maxlength="5" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus>
                <label for="poskod">Poskod</label>  
            </div>

            <div class="input-field">
                <i class="material-icons prefix">account_balance</i>
                <input id="icon_prefix" type="text" name="negeri" placeholder="Negeri"  size="7" required>
                <label for="negeri">Negeri</label> 
            </div>

            <button id="validate" class="waves-effect waves-light btn-small" class="daftar" type="submit">Daftar</button>
            <button class="waves-effect waves-light btn-small" class="reset" type="reset">Reset</button><br><br>
                <h6>*Pastikan semua maklumat ditaip dengan teliti.</h6>
            </form>
        </fieldset>
        </main>
</body>
</html>
