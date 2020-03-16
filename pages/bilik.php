<?php
require('../functions/config.php');
require('../components/header.php');
?>
<html>
    <head>
        <title>Setup Bilik</title>
    </head>
    <center>
        <h3>SENARAI BILIK</h3><br>
        <fieldset>
            <table width="811" border="1" align="center">
                <tr>
                    <td colspan="4" valign="middle" align="right"><b>
                        <a href="../functions/tambah_bilik.php">[+] Tambah Bilik</a></b></td>
</tr>
<tr>
    <td width="40"><b>Bil.</b></td>
    <td width="243"><b>Jenis Bilik</b></td>
    <td width="150"><b>Harga Semalam</b></td>
    <td width="150"><b>Tindakan</b></td>
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
        <td><a href="../functions/kemaskini_bilik.php?idBilik=
        <?php echo $info1['idBilik'];?>">Kemaskini</a> |
        <a href="../functions/hapus_bilik.php?idBilik=
        <?php echo $info1['idBilik'];?>">Hapus</a>
</td>
</tr>
<?php $no++; } ?>
</table>
</fieldset>
<a href="../pages/dashboardAdmin.php">Ke Menu Utama</a><br>
</center>
</body>
</html>