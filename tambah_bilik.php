<?php
require('config.php');
require('header.php');
if(isset($_POST['jenisBilik'])) {
    $jenisBilik=$_POST['jenisBilik'];
    $hargaBilik=$_POST['hargaBilik'];
    //add record to table
    $result = mysqli_query($samb, "INSERT INTO bilik (jenisBilik,hargaBilik) VALUES ('$jenisBilik','$hargaBilik')");
    echo "<script>alert('Penambahan rekod bilik telah dibuat');
    window.location='bilik.php'</script>";
}
?>
<html>
    <center>
        <body>
            <h3>TAMBAH BILIK BAHARU</h3>
            <form name="form1" action="tambah_bilik.php" method="POST">
                <fieldset>
                    <label>Jenis Bilik:</label><input type="text" name="jenisBilik" id="jenisBilik" /><br><br>
                    <label>Harga:</label><input type="text" name="hargaBilik" id="hargaBilik" />
                    <br><br><input type="submit" name="update" id="submit" value="Tambah Bilik" />
                </fieldset>
            </form>
            <a href="bilik.php">Ke Senarai Bilik</a>
        </body>
    </center>
</html>