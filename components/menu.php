<?php
if ($_SESSION['level']=="ADMIN")
{
?>
<h2>Menu Utama ADMIN</h2>
        <ul>
        <!-- <li><a href="tempah.php"><i class="fas fa-home"></i>Masuk Tempahan</a></li> -->
        <li><a href="tempah.php"><i class="fas fa-home"></i>Masuk Tempahan</a></li>
            <li><a href="semak.php"><i class="fas fa-sticky-note"></i>Semak Tempahan</a></li>
            <li><a href="laporan.php"><i class="fas fa-poll-h"></i>Laporan</a></li>
            <li><a href="bilik.php"><i class="fas fa-edit"></i>Setup Bilik</a></li>
            <li><a href="pekerja.php"><i class="fas fa-user-edit"></i>Tambah Pekerja</a></li>
            <li><a href="import_pekerja.php"><i class="fas fa-portrait"></i>Import Pekerja</a></li>
        </ul>
<?php
} else {
?>
<h2>Menu Utama PEKERJA</h2>
        <ul>
        <!-- <li><a href="tempah.php"><i class="fas fa-home"></i>Masuk Tempahan</a></li> -->
        <li><a href="tempah.php"><i class="fas fa-home"></i>Masuk Tempahan</a></li>
            <li><a href="semak.php"><i class="fas fa-sticky-note"></i>Semak Tempahan</a></li>
            <li><a href="laporan.php"><i class="fas fa-poll-h"></i>Laporan</a></li>
        </ul>
<?php
}
?>