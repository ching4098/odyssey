<?php
session_start();

require('../functions/config.php');

if(isset($_POST['namaPengguna'])) {
    $namaPengguna = $_POST['namaPengguna'];
    $kataLaluan = $_POST['kataLaluan'];
    $jenisPengguna = $_POST['jenisPengguna'];
    //add new record
    $result = mysqli_query($samb, "INSERT INTO pengguna (namaPengguna, kataLaluan, jenisPengguna) VALUES ('$namaPengguna','$kataLaluan','$jenisPengguna')");
    echo "<script>alert('Pengguna telah didaftar'); window.location='../pages/login.html'</script>";
}
?>