<?php
session_start();

require('../functions/config.php');

if(isset($_POST['namaPengguna'])) {
    $namaPengguna = $_POST['namaPengguna'];
    $kataLaluan = $_POST['kataLaluan'];
    $jenisPengguna = $_POST['jenisPengguna'];
    //add new record
    $result = mysqli_query($samb, "INSERT INTO pengguna (namaPengguna, kataLaluan, jenisPengguna) VALUES ('$namaPengguna','$kataLaluan','$jenisPengguna')");
    echo "<script>alert('Penambahan Rekod Pengguna Baru telah Berjaya Dibuat'); window.location='../pages/login.php'</script>";
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
                    
                    <label for="jenisPengguna">Jenis Pengguna:</label>
                        <select id="jenisPengguna" name="jenisPengguna" required>
                        <option value="" disabled selected>Pilih Status Pengguna:</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="PEKERJA">PEKERJA</option>
                    </select>
                    <br>
                    <br>
                
                    <button type="submit" class="waves-effect waves-light btn-small">Daftar</button>
                    <br>
                    <br>
                    <a href="../pages/login.php">Sudah Daftar?</a>
                </form>
                <div class="col s1 push-s2">
                <img style="width:550px;height:550px" src="../assets/img/logo.gif" />
                </div>
            </div>
        
    </body>
    <script type="text/javascript"  src="../js/materialize.js"></script>
    <script>
        M.AutoInit();
    </script>
</html>