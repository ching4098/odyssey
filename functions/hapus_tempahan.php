<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');
//get id from URL
$idPengguna = $_GET['id'];
//delete record
$result = mysqli_query($samb, "DELETE FROM tempahan WHERE idTempahan='$idPengguna'");
echo "<script>alert('HAPUS REKOD TEMPAHAN BERJAYA'); window.location='../pages/semak.php'</script>";
?>