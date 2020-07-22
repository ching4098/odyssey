<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');

?>
<html>
    <head>
        <title>Setup Bilik</title>
        <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <?php include("../components/menu.php"); ?>
    <body>
        
    <main style="padding-left:5%;padding-right:5%">
        <center>
        <h3>Senarai Bilik</h3><br>
        <fieldset >
            <table class="highlight" >
                <tr>
                    <td colspan="4"  valign="middle" align="middle">
                        <a class="waves-effect waves-light btn-small" href="../functions/tambah_bilik.php">[+] Tambah Bilik</a></td>
</tr>
<tr>
    <td width="10%"><b>Bil.</b></td>
    <td width="20%"><b>Jenis Bilik</b></td>
    <td width="25%"><b>Harga Semalam</b></td>
    <td width="10%"><b>Tindakan</b></td>
</tr> 
<?php
$data1=mysqli_query($samb,"SELECT * FROM bilik ORDER BY hargaBilik");
$no=1;
while ($info1=mysqli_fetch_array($data1))
{
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $info1['jenisBilik']; ?></td>
        <td>RM <?php echo $info1['hargaBilik']; ?></td>
        <td><a class="waves-effect waves-light btn-small" href="../functions/kemaskini_bilik.php?idBilik=<?php echo $info1['idBilik'];?>">Kemaskini</a> |
        <a class="waves-effect waves-light btn-small" href="../functions/hapus_bilik.php?idBilik=<?php echo $info1['idBilik'];?>">Hapus</a>
        
</td>
</tr>
<?php $no++; } ?>
</table>
</fieldset>
</center>
</main>
</body>
</html>