<?php
require('config.php');
//Dapatkan id dari URl
$target = $_GET['idPengguna'];
//Hapus rekod pekerja
$result = mysqli_query($samb, "DELETE FROM pengguna WHERE idPengguna='$target'");
//Show success msg
echo "<script>alert('HAPUS REKOD PEKERJA BERJAYA'); window.location='pekerja.php'</script>";
?>
