<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');
?>
<html>
    <head>
        <title>
            Laporan Bulanan Bilik
        </title>
        <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
    <?php include("../components/menu.php"); ?>
        <main>
        
        <table>
            <h3>Laporan Bulanan Keuntungan Bilik</h3>
        
        <table class="highlight" id="laporan">
            <tr>
                <td colspan="9">
                    Rekod Tempahan Bulanan : <?php echo $namarumah; ?>
                    <div align="right" class="style15">Tarikh Cetakan:<?php echo date("d/m/Y"); ?></div>
                </td>
            </tr>
            <tr>
                <td width="2.5%"><b>Bil.</b></td>
                <td width="7%"><b>Jenis Bilik</b></td>
                <td width="7%"><b>Tarikh Masuk</b></td>
                <td width="7%"><b>Tarikh Keluar</b></td>
                <td width="5%"><b>Bil. Hari</b></td>
                <td width="15%"><b>Nama Pelanggan</b></td>
                <td width="10%"><b>Nombor HP</b></td>
                <td width="10%"><b>Harga</b></td>
                <td width="10%"><b>Jumlah</b></td>
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
                    Jumlah Keseluruhan
                </td>
                <td>RM <?php echo number_format($jumBesar,2); ?></td>
            </tr>
        </table>
    
        <br><div align="center" class="style15">*LAPORAN TAMAT*<br><br>
        Jumlah Rekod:<?php echo $bil_rekod; ?></div>
        <center>
            <br>
            <a class="waves-effect waves-light btn-small" onclick="sysFunc.printTable()">Cetak Laporan</a>
        </center>
        </table>
    </main></body>
    <script>
            var sysFunc = new function() {
                this.printTable = function() {
                    var laporan = document.getElementById('laporan');
                    var style = "<style>";
                    style = style + "table {width: 100%;}";
                    style = style + "table, th, td {border: 1px solid black;}";
                    style = style + "</style>";
                    var newTab = window.open('', '', 'height=1000,width=1200');
                    newTab.document.write(style);
                    newTab.document.write(laporan.outerHTML);
                    newTab.document.close();
                    newTab.print();
                }
            }
        </script>
</html>