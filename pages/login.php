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
        window.location='../pages/login.php'</script>";
    }
    else{
        $_SESSION['idPengguna']=$row['idPengguna'];
        $_SESSION['level']=$row['jenisPengguna'];
        
        //open designated index.php
        echo "<script>alert('Anda telah berjaya log masuk');
        window.location='../pages/index.php'</script>";
        
    }
}
?>
<html>
    <head>
        <title>
            Odyssey
        </title>
        <link rel="stylesheet" type="text/css" href="../css/materialize.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    
        
    
            <div class="row" style="padding-top:7%">
            

                <form class="col s5 push-s1" method="POST">
                    <br>
                    <br>                    
                    <h3>Sistem Pengurusan Homestay Odyssey</h3>
                    <br>
                    <br>
                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="namaPengguna" type="text" class="validate" name="namaPengguna" required>
                        <label for="namaPengguna">Nama pengguna</label>
                    </div>
                    <br>
                    
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="kataLaluan" type="password" class="validate" name="kataLaluan" required>
                        <label for="kataLaluan">Kata Laluan</label>
                    </div>
                    <br>
                    <br>
                
                    <button type="submit" class="waves-effect waves-light btn-small">Log Masuk</button>
                    <br>
                    <br>
                    <a href="../pages/register.php">Pengguna Baru?</a>
                </form>
                <div class="col s1 push-s2">
                <img style="width:550px;height:550px" src="../assets/img/logo.gif" />
                </div>
            </div>
        
    </body>
    <script type="text/javascript"  src="../js/materialize.js"></script>
    
</html>