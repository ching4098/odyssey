<?php
require('../functions/config.php');
require('../components/header.php');
if(isset($_POST['update'])){
    $idBilik = $_POST['idBilik'];
    $jenisBilik = $_POST['jenisBilik'];
    $hargaBilik = $_POST['hargaBilik'];
    //kemaskini dengan  rekod baru
    $result = mysqli_query($samb,
    "UPDATE bilik SET namaPelanggan='$namaPelanggan',harga='$hargaBilik' WHERE idBilik=$idBilik");
    echo"<script
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
    <center>
        <body>
            <h3>KEMASKINI BILIK</h3>
            <form name="form1" action="../functions/kemaskini_bilik.php" method="POST">
                <fieldset>
                    <label>Nama Bilik:</label>
                    <input type="text" name="jenisBilik" id="jenisBilik" placeholder="<?php echo $jenisBilik;?>" /><br><br>
                    <label>Harga:</label>
                    <input type="text" name="hargaBilik" id="hargaBilik" placeholder="<?php echo $hargaBilik;?>" />
                    <input type="hidden" name="idBilik" value="<?php echo $_GET['idBilik'];?>" /><br><br>
                    <input type="submit" name="update" id="submit" value="Kemaskini" />
                </fieldset>
            </form>
            <a href="../pages/bilik.php">Ke Senarai Bilik</a>
        </body>
    </center>
</html>