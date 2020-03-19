<?php
session_start();
require ('../functions/keselamatan.php');
require('../functions/config.php');
require('../components/header.php');
if(isset($_POST['update'])){
    $idBilik = $_POST['idBilik'];
    $jenisBilik = $_POST['jenisBilik'];
    $hargaBilik = $_POST['hargaBilik'];
    //kemaskini dengan  rekod baru
    $result = mysqli_query($samb,
    "UPDATE bilik SET jenisBilik='$jenisBilik',hargaBilik='$hargaBilik' WHERE idBilik=$idBilik");
    echo"<script>
    alert('Kemaskini rekod telah berjaya');
    window.location='../pages/bilik.php'</script>";
}
?>
<?php
//get id from URL
$idBilik =$_GET['idBilik'];
//show result
$result = mysqli_query($samb, "SELECT * FROM bilik WHERE idBilik=$idBilik");
while($res = mysqli_fetch_array($result)){
    $jenisBilik = $res['jenisBilik'];
    $hargaBilik = $res['hargaBilik'];
}
?>
<html>
<?php include("../components/menu.php"); ?>
<head>
    <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
    <center>
        
        <body>
            <main>
            <h3>Kemaskini Bilik</h3>
            <form name="form1" action="../functions/kemaskini_bilik.php" method="POST">
                <fieldset style="padding-left:20%;padding-right:20%">
                    <div class="row">
                    <div class="input-field">
                        <input id="jenisBilik" type="text" name="jenisBilik" value="<?php echo $jenisBilik;?>">
                        <label for="text">Jenis Bilik</label>
                    </div>
                    <div class="row">
                    <div class="input-field">
                        <input id="hargaBilik" type="text" name="hargaBilik" value="<?php echo $hargaBilik;?>">
                        <label for="text">Harga Bilik</label>
                    </div>
                    <input type="hidden" name="idBilik" value="<?php echo $_GET['idBilik'];?>" /><br><br>
                    <button class="waves-effect waves-light btn-small" type="submit" name="update" id="submit">Kemaskini</button>
                </fieldset>
            </form>
        </main></body>
    </center>
</html>