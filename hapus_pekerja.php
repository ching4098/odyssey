<?php
require('config.php');
//Dapatkan id dari URl
$idPengguna = $_GET['hapus_id'];
//Hapus rekod pekerja
$result = mysqli_query($samb, "DELETE FROM pengguna WHERE namaPengguna='$idPengguna'");
//Show success msg
echo "<script>alert('HAPUS REKOD PEKERJA BERJAYA'); window.location='pekerja.php'</script>";
?>
