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
        echo "<script>alert('Pendaftaran Pelanggan Baharu Berjaya');
        window.location='../pages/dashboardAdmin.php'</script>";
    }else{
        echo "<script>alert('Pendaftaran Pelanggan Baharu Gagal');
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
    <main>
    <h3>Pendaftaran Pelanggan Baru</h3><br>
<fieldset>
            <!-- Papar Borang Pendaftaran -->
            <form method="POST" style="padding-left:20%;padding-right:20%">
                <br>Nombor Kad Pengenalan<br>
                <font size="1" color="ff0000">*Tanpa tanda "-"</font><br>
                <input class="input1" type="text" name="icPelanggan" id="icPelanggan"
                placeholder="090807030555" maxlength="12" size="15"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                required autofocus><br>

                Nama Anda<br>
                <input class="input2" type="text" name="namaPelanggan" id="namaPelanggan"
                placeholder="Ray Teoh" size="60" required ><br>

                Nombor Telefon<br>
                <input class="input3" type="text" name="noTelefon" id="noTelefon" placeholder="0187651769"
                maxlength='12'size="15"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                required autofocus><br>

                Alamat (NOMBOR)<br>
                <input class="input4" type="text" name="alamat1" id="alamat1"
                placeholder="48" size="60" required ><br>

                Alamat (JALAN)<br>
                <input class="input5" type="text" name="alamat2" id="alamat2"
                placeholder="Jalan Gembira" size="60" required ><br>

                Bandar<br>
                <input class="input6" type="text" name="bandar" id="bandar"
                placeholder="Georgetown" size="60" required ><br>

                Poskod<br>
                <input class="input7" type="text" name="poskod" id="poskod" placeholder="18000"
                maxlength="5" size="15"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                required autofocus><br>

                Negeri<br>
                <input class="input8" type="text" name="negeri" id="negeri"
                placeholder="Pulau Pinang" size="30" required><br><br>
        
                <button class="waves-effect waves-light btn-small purple" class="daftar" type="submit">Daftar</button>
                <button class="waves-effect waves-light btn-small purple" class="reset" type="reset">Reset</button><br><br>
                *Pastikan semua maklumat ditaip dengan teliti.
            </form>
        </fieldset>
        </main>
</body>
</html>
