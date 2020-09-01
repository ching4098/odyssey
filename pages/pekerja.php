<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/global.css">
        <title>Senarai Pekerja</title>
    </head>
    <body>
        <?php include("../components/menu.php"); ?>
    </body>
    
    <main style="padding-left:5%;padding-right:5%"><center>
        <h3>Senarai Pekerja</h3><br>
        <fieldset>
            <table class="highlight">
            <style>
            @media screen and (min-width:800px) and (max-width: 1366px) {
            table {
                font-size: 10px;
            }
        }
        </style>
                <tr>
                    <td colspan="7" valign="middle" align="center">
                        <a class="waves-effect waves-light btn-small" href="../functions/tambah_pekerja.php">[+] Tambah Pekerja
                        </a></td>
                </tr>
                <tr>
                    <td width="5%"><b>Bil.</b></td>
                    <td width="10%"><b>Nama Pengguna</b></td>
                    <td width="10%"><b>Kata Laluan</b></td>
                    <td width="10%"><b>Status Pengguna</b></td>
                    <td width="10%"><b>Login Terakhir</b></td>
                    <td width="10%"><b>Logout Terakhir</b></td>
                    <td width="10%"><b>Tindakan</b></td>
                </tr>
                <?php
                $data1=mysqli_query($samb,"SELECT * FROM pengguna");
                $no=1;
                while ($info1=mysqli_fetch_array($data1)) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $info1['namaPengguna']; ?></td>
                        <td><?php echo $info1['kataLaluan']; ?></td>
                        <td><?php echo $info1['jenisPengguna']; ?></td>
                        <td><?php echo $info1['loginTerakhir']; ?></td>
                        <td><?php echo $info1['logoutTerakhir']; ?></td>
                        <td>
                            <a class="waves-effect waves-light btn-small" href="../functions/kemaskini_pekerja.php?idPengguna=<?php echo $info1['idPengguna']; ?>">Kemaskini</a> |
                            <?php
                            //admin can delete akaun pekerja but pekerja can't delete admin akaun
                            if ($info1['jenisPengguna']!="ADMIN") {
                            ?>
                            <a class="waves-effect waves-light btn-small" href="../functions/hapus_pekerja.php?idPengguna=<?php echo $info1['idPengguna']; ?>">Hapus</a>
                            <?php
                            }
                            ?>
</td>
</tr>
<?php $no++; } ?>
</table>
</fieldset>
</center>    
</main>    
</html>