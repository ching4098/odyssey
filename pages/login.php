<?php
//connect to database
require('../functions/config.php');
//continue to header file
require('../components/header.php');
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
        echo "<script>alert('ID Pengguna atau Kata Laluan anda adalah yang salah');
        window.location='../pages/login.php'</script>";
    }
    else{
        $_SESSION['idPengguna']=$row['idPengguna'];
        $_SESSION['level']=$row['jenisPengguna'];

        //open designated index.php
        header("Location: ../pages/tempah.php");
    }
}
?>
<html>
    <head>
        <head>
        <link rel="database icon" type="image/png" href="https://img.icons8.com/dusk/64/000000/data-configuration.png">
        <title>
            Odyssey
        </title>
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    </head>
    <body>
    <fieldset>
        <img class="wave" src="../assets/img/wave.png">
        <div class="container">
            <div class="img">
                <img src="../assets/img/planet-cosmos-orbit-universe-geo-sattelite-1-51515.png">
            </div>
            <div class="login-content">
                <form method="POST">
                    <img src="../assets/img/db_image.svg">
                    <h2 class="title">Sistem Pengurusan Homestay Odyssey</h2>
                       <div class="input-div one">
                          <div class="i">
                            <i class="material-icons">
                                account_circle
                            </i>
                          </div>
                          <div class="div">
                                  <h5>Nama Pengguna</h5>
                                  <input type="text" class="input" name="namaPengguna"  required>
                          </div>
                       </div>
                       <div class="input-div pass">
                          <div class="i"> 
                            <i class="material-icons">
                                lock
                            </i>
                          </div>
                          <div class="div">
                               <h5>Kata Laluan</h5>
                               <input type="password" class="input" name="kataLaluan" id="inputPassword"  required>
                       </div>
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../js/main.js"></script>
    </fieldset>
</html>