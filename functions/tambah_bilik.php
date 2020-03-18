<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');
require('../components/header.php');
if(isset($_POST['jenisBilik'])) {
    $jenisBilik=$_POST['jenisBilik'];
    $hargaBilik=$_POST['hargaBilik'];
    //add record to table
    $result = mysqli_query($samb, "INSERT INTO bilik (jenisBilik,hargaBilik) VALUES ('$jenisBilik','$hargaBilik')");
    echo "<script>alert('Penambahan rekod bilik telah dibuat');
    window.location='../pages/bilik.php'</script>";
}
?>
<html>
    <?php include("../components/menu.php"); ?>
    <center>
        <head>
            <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        </head>
        
        <body>
            
            <main>
            <h3>Tambah Bilik Baharu</h3>
            <form name="form1" action="../functions/tambah_bilik.php" method="POST">
                <fieldset style="padding-left:25%;padding-right:25%">
                    <label>Jenis Bilik:</label><input type="text" name="jenisBilik" id="jenisBilik" /><br><br>
                    <label>Harga:</label><input type="text" name="hargaBilik" id="hargaBilik" />
                    <br><br><button class="waves-effect waves-light btn-small" type="submit" name="update" id="submit" value="Tambah Bilik">Tambah Bilik</button>
                    <br>
                    <br>
                </fieldset>
            </form>
            <br><a class="waves-effect waves-light btn-small" href="../pages/bilik.php">Ke Senarai Bilik</a>
        </body>
    </main></center>
</html>