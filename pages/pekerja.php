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
    <center>
        <main>
        <h3>Senarai Pekerja</h3><br>
        <fieldset>
            <table class="highlight">
                <tr>
                    <td colspan="5" valign="middle" align="center">
                        <a class="waves-effect waves-light btn-small" href="../functions/tambah_pekerja.php">[+] Tambah Pekerja
                        </a></td>
                </tr>
                <tr>
                    <td width="5%"><b>Bil.</b></td>
                    <td width="20%"><b>Nama Pengguna</b></td>
                    <td width="10%"><b>Kata Laluan</b></td>
                    <td width="10%"><b>Status Pengguna</b></td>
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
        </main>
    </center>
</html>