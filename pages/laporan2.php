<?php
require('../functions/config.php');
?>
<html>
    <head>
        <title>
            LAPORAN BULANAN BILIK
        </title>
    </head>
    <body>
        <table width="711" border="0">
            <td><p><strong>LAPORAN BULANAN KEUNTUNGAN BILIK</strong></p></td>
        <table width="1000" border="1" align="center">
            <tr>
                <td colspan="9">
                    REKOD TEMPAHANA BULANAN: <?php echo $namarumah; ?><br>
                    <div align="right" class="style15">Tarikh Cetakan:<?php echo date("d/m/Y"); ?></div>
                </td>
            </tr>
            <tr>
                <td width="30"><b>Bil.</b></td>
                <td width="150"><b>Jenis Bilik</b></td>
                <td width="140"><b>Tarikh Masuk</b></td>
                <td width="140"><b>Tarikh Keluar</b></td>
                <td width="100"><b>Bil. Hari</b></td>
                <td width="100"><b>Nama Pelanggan</b></td>
                <td width="100"><b>Nombor HP</b></td>
                <td width="140"><b>Harga</b></td>
                <td width="140"><b>Jumlah</b></td>
            </tr>
            <?php
                $no=1;
                $idBilik=$_POST["jenisBilik"];
                $bulan=$_POST["bulan"];
                $tahun=$_POST["tahun"];

                if ($idBilik=="-"&&$bulan=="-"&&$tahun=="-") {
                    $data1=mysqli_query($samb, "SELECT * FROM tempahan ORDER by idBilik, tarikhMasuk");
                }elseif ($idBilik!="-"&&$bulan=="-"&&$tahun=="-") {
                    $data1=mysqli_query($samb, "SELECT * FROM tempahan ORDER by idBilik, tarikhMasuk");
                }elseif ($idBilik!="-"&&$bulan!="-"&&$tahun=="-") {
                    $data1=mysqli_query($samb, "SELECT * FROM tempahan WHERE idBilik='$idBilik' AND (MONTH(tarikhMasuk)='$bulan' OR MONTH(tarikhKeluar)='$bulan') ORDER BY idBilik, tarikhMasuk");
                }elseif($idBilik!="-"&&$bulan!="-"&&$tahun!="-") {
                    $data1=mysqli_query($samb, "SELECT * FROM tempahan WHERE idBilik='$idBilik' AND ((MONTH(tarikhMasuk)='$bulan' AND YEAR(tarikhMasuk)='$tahun') OR (MONTH(tarikhKeluar)='$bulan' AND YEAR(tarikhKeluar)='$tahun')) ORDER BY idBilik, tarikhMasuk");
                }elseif($idBilik=="-"&&$bulan!="-"&&$tahun=="-") {
                    $data1=mysqli_query($samb, "SELECT * FROM tempahan WHERE MONTH(tarikhMasuk)='$bulan' OR MONTH(tarikhKeluar)='$bulan' ORDER BY idBilik, tarikhMasuk");
                }elseif($idBilik=="-"&&$bulan=="-"&&$tahun!="-") {
                    $data1=mysqli_query($samb, "SELECT * FROM tempahan WHERE YEAR(tarikhMasuk)='$tahun' OR YEAR(tarikhKeluar)='$tahun' ORDER BY idBilik, tarikhMasuk");
                }elseif($idBilik!="-"&&$bulan=="-"&&$tahun!="-") {
                    $data1=mysqli_query($samb, "SELECT * FROM tempahan WHERE idBilik='$idBilik AND (YEAR(tarikhMasuk)='$tahun' OR YEAR(tarikhKeluar)='$tahun') ORDER BY idBilik, tarikhMasuk");
                }
                
                $jumBesar=0;
                $bil_rekod=mysqli_num_rows($data1);
                while ($info1=mysqli_fetch_array($data1)) {
                    //connect to record
                    $dataBilik=mysqli_query($samb, "SELECT * FROM bilik WHERE idBilik='$info1[idBilik]'");
                    $infoBilik=mysqli_fetch_array($dataBilik);

                    //get customer name
                    $dataPelanggan=mysqli_query($samb, "SELECT * FROM pelanggan WHERE icPelanggan='$info1[icPelanggan]'");
                    $infoPelanggan=mysqli_fetch_array($dataPelanggan);

                    //days of stay
                    $date1=date_create($info1['tarikhMasuk']);
                    $date2=date_create($info1['tarikhKeluar']);
                    $diff=date_diff($date1,$date2);
                    $jumHari=$diff->format("%a");

                    //rearrange dates
                    $tarikhMasuk =date("d-m-Y", strtotime($info1['tarikhMasuk']));
                    $tarikhKeluar =date("d-m-Y", strtotime($info1['tarikhKeluar']));
            ?>

            <!-- show record in table -->
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $infoBilik['jenisBilik'] ?></td>
                <td><?php echo $tarikhMasuk; ?></td>
                <td><?php echo $tarikhKeluar; ?></td>
                <td><?php echo $diff->format("%a hari"); ?></td>
                <td><?php echo $infoPelanggan['namaPelanggan']; ?></td>
                <td><?php echo $infoPelanggan['noTelefon']; ?></td>
                <td>RM <?php echo number_format($info1['bayaran'],2); ?></td>
                <td>RM <?php echo number_format($info1['bayaran']*$jumHari,2);
                $jumBesar+=($info1['bayaran']*$jumHari);
                ?></td>
            </tr>
            <?php $no++; } ?>
            <tr>
                <td colspan="8" align="right">
                    JUMLAH KESELURUHAN
                </td>
                <td>RM <?php echo number_format($jumBesar,2); ?></td>
            </tr>
        </table>
        <hr /><div align="center" class="style15">*LAPORAN TAMAT*<br />
        Jumlah Rekod:<?php echo $bil_rekod; ?></div>
        <center>
            <br><br>
            <a href="../pages/dashboardAdmin.php">Ke Menu Utama</a>
            <a href="javascript:window.print()">Cetak Laporan</a>
        </center>
        </table>
    </body>
</html>