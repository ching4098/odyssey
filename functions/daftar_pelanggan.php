<?php
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
<h2>PENDAFTARAN PELANGGAN BARU</h2>
<body>
<fieldset>
            <!-- Papar Borang Pendaftaran -->
            <form method="POST">
                <label class="id">Nombor Kad Pengenalan</label><br>
                <font size="1" color="ff0000">*Tanpa tanda "-"</font><br>
                <input class="input1" type="text" name="icPelanggan" id="icPelanggan"
                placeholder="090807030555" maxlength="12" size="15"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                required autofocus><br>

                <label class="name">Nama Anda</label><br>
                <input class="input2" type="text" name="namaPelanggan" id="namaPelanggan"
                placeholder="Contoh: Ray Teoh" size="60" required ><br>

                <label class="telefon">Nombor Telefon</label><br>
                <input class="input3" type="text" name="noTelefon" id="noTelefon" placeholder="0187651769"
                maxlength='12'size="15"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                required autofocus><br>

                <label class="alamat">Alamat(NOMBOR)</label><br>
                <input class="input4" type="text" name="alamat1" id="alamat1"
                placeholder="48" size="60" required ><br>

                <label class="alamat">Alamat (JALAN)</label><br>
                <input class="input5" type="text" name="alamat2" id="alamat2"
                placeholder="Jalan Gembira" size="60" required ><br>

                <label class="alamat">Bandar</label><br>
                <input class="input6" type="text" name="bandar" id="bandar"
                placeholder="Georgetown" size="60" required ><br>

                <label class="poskod">Poskod</label><br>
                <input class="input7" type="text" name="poskod" id="poskod" placeholder="18000"
                maxlength="5" size="15"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                required autofocus><br>

                <label class="negeri">Negeri</label><br>
                <input class="input8" type="text" name="negeri" id="negeri"
                placeholder="Pulau Pinang" size="30" required><br><br>
        
                <button class="daftar" type="submit">Daftar</button>
                <button class="reset" type="reset">Reset</button><br><br>
                *Pastikan semua maklumat ditaip dengan teliti.
            </form>
            <a href="../pages/dashboardAdmin.php">Dashboard</a>
        </fieldset>
</body>
</html>
