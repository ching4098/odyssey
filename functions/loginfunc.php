<?php
//connect to database
require('../functions/config.php');
//continue to header file
session_start();
//check data sending progress
if (isset($_POST['namaPengguna'])){
    //declare variables for username and password
    $user = $_POST['namaPengguna'];
    $pass = $_POST['kataLaluan'];
    //sql query
    $query = mysqli_query($samb,
    "SELECT * FROM pengguna
    WHERE namaPengguna ='$user'
    AND kataLaluan ='$pass'");
    $row = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query) == 0||$row['kataLaluan']!=$pass)
    {
        //login error
        echo "<script>alert('Nama Pengguna atau Kata Laluan anda adalah yang salah');
        window.location='../pages/login.html'</script>";
    }
    else{
        $_SESSION['idPengguna']=$row['idPengguna'];
        $_SESSION['level']=$row['jenisPengguna'];

        $sql = mysqli_query($samb,"UPDATE pengguna SET loginTerakhir=NOW() WHERE idPengguna={$_SESSION['idPengguna']}"); 
        $result = mysqli_query($samb, $sql);
        
        //open designated index.php
        
        echo "<script>alert('Anda telah berjaya log masuk'); window.location='../pages/index.php'</script>";
    }
}
?>