<?php
include("../functions/config.php");
$idPengguna = $_GET['idPengguna'];
$sql = mysqli_query($samb,"UPDATE pengguna SET logoutTerakhir=NOW() WHERE idPengguna=$idPengguna"); 
$result = mysqli_query($samb, $sql);

session_start();
session_destroy();
echo"<script>alert('Anda telah berjaya log keluar');
window.location='../pages/login.html'</script>";

?>