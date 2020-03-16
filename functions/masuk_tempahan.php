<?php
require('../functions/config.php');
if (isset($_POST['icPelanggan'])){
    $icPelanggan = $_POST['icPelanggan'];
    $tarikhMasuk = $_POST['tarikhMasuk'];
    $idBilik =$_POST['idBilik'];
    $tarikhKeluar =$_POST['tarikhKeluar'];
    //dapatkan jumlah bayaran bilik
    $duit=mysqli_query($samb,"SELECT * FROM bilik
    WHERE idBilik='$idBilik'");
    $tunjukDuit=mysqli_fetch_array($duit);

    //Periksa Bilik kosong atau tidak
    $wujud=mysqli_query($samb,
    "SELECT * FROM tempahan
    WHERE idBilik='$idBilik' AND (
    (tarikhMasuk <= '$tarikhMasuk' AND tarikhKeluar > '$tarikhMasuk')
    OR (tarikhMasuk < '$tarikhKeluar' AND tarikhKeluar >= '$tarikhKeluar')
    OR (tarikhMasuk >= '$tarikhMasuk' AND tarikhKeluar < '$tarikhKeluar')
    )");
    $bil_rekod=mysqli_num_rows ($wujud);
    if ($bil_rekod==0&&$tarikhMasuk!=$tarikhKeluar)
    {
        //tambah rekod baru ke dalam table
        $rekod = "INSERT INTO tempahan
        (idTempahan,tarikhMasuk,tarikhKeluar,icPelanggan,idBilik,bayaran)
        VALUES (NULL,'$tarikhMasuk','$tarikhKeluar','$icPelanggan','$idBilik',
        '$tunjukDuit[hargaBilik]')";
        //Melaksanakan pertanyaan rekod dengan sambungan ke p.data
        $hasil = mysqli_query($samb,$rekod);
        //papar mesej berjaya atau gagal simpan rekod baharu
        echo "<script>alert('Tempahan Bilik Berjaya');
        window.location='../pages/semak.php'</script>";
    }
    else{
        echo "<script>alert('Tempahan Bilik Gagal! Bilik telah ditempah');
        window.location='../pages/tempah.php'</script>";
        }
}
?>