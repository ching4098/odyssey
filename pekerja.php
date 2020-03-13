<?php
require('config.php');
require('header.php');
?>
<html>
    <center>
        <h3>SENARAI PEKERJA</h3><br>
        <fieldset>
            <table width ="811" border="1" align="center">
                <tr>
                    <td colspan="5" valign="middle" align="center"><b>
                        <a href="tambah_pekerja.php">[+] Tambah Pekerja
                        </a></b></td>
                </tr>
                <tr>
                    <td width "40"><b>Bil.</b></td>
                    <td width "243"><b>Nama Pengguna</b></td>
                    <td width "150"><b>Kata Laluan</b></td>
                    <td width "120"><b>Status Pengguna</b></td>
                    <td width "120"><b>Tindakan</b></td>
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
                            <a href="kemaskini_pekerja.php?namaPengguna=
                            <?php echo $info1['namaPengguna']; ?>">Kemaskini</a> |
                            <?php
                            //admin can delete akaun pekerja but pekerja can't delete admin akaun
                            if ($info1['jenisPengguna']!="ADMIN") {
                            ?>
                            <a href="hapus_pekerja.php?namaPengguna=<?php echo $info1['namaPengguna']; ?>">Hapus</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php $no++; } ?>
            </table>
        </fieldset>
        <a href="dashboardAdmin.php">Ke Menu Utama</a>
    </center>
</html>