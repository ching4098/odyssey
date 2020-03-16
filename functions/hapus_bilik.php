<?php
require('../functions/config.php');
$idBilik = $_GET['idBilik'];
//Hapus rekod bilik
$result = mysqli_query($samb,"DELETE FROM bilik
WHERE idBilik='$idBilik'");
//Papar mesej jika berjaya hapus
echo "<script>alert('Hapus Bilik Berjaya');
window.location='../pages/bilik.php'</script>";
?>