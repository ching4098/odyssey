<?php
session_start();
require('../functions/config.php');
require ("../functions/keselamatan.php");
?>
<html>
    <head>
        <title>Semak Tempahan</title>
        <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        
    <?php include("../components/menu.php"); ?>    
    <main style="padding-left:5%;padding-right:5%">
    <h3>Rekod Tempahan <?php echo $namarumah ?></h3><br>
    <fieldset>
    <center>
        
    <table id="laporan" class="highlight" width="1000" border="1" align="center">
<tr>
    <td width="2.5%"><b>Bil.</b></td>
    <td width="7%"><b>Jenis Bilik</b></td>
    <td width="7%"><b>Tarikh Masuk</b></td>
    <td width="7%"><b>Tarikh Keluar</b></td>
    <td width="5%"><b>Bil Hari</b></td>
    <td width="10%"><b>Nama Pelanggan</b></td>
    <td width="10%"><b>Nombor HP</b></td>
    <td width="10%"><b>Diuruskan Oleh</b></td>
    <td width="10%"><b>Harga</b></td>
    <td width="10%"><b>Jumlah Harga</b></td>
    <td width="10%"><b>Tindakan</b></td>
</tr>
<?php
$no=1;
//panggil rekod untuk paparan di jadual
$data1=mysqli_query($samb,"SELECT * FROM tempahan
ORDER BY tarikhMasuk DESC");
//nilai awal
$jumBesar=0;
while ($info1=mysqli_fetch_array($data1))
{
    //sambung ke table bilik berdasarkan kunci asing
    $databilik=mysqli_query($samb, "SELECT * FROM bilik WHERE idBilik='$info1[idBilik]'");
    $infobilik=mysqli_fetch_array($databilik);
    //sambung ke table pelanggan berdasarkan kunci asing
    $datapelanggan=mysqli_query($samb,"SELECT * FROM pelanggan WHERE icPelanggan='$info1[icPelanggan]'");
    $infopelanggan=mysqli_fetch_array($datapelanggan);

    $datapengguna=mysqli_query($samb,"SELECT * FROM pengguna WHERE idPengguna='$info1[idPengguna]'");
    $infopengguna=mysqli_fetch_array($datapengguna);

    //data beza hari
    $date1=date_create($info1['tarikhMasuk']);
    $date2=date_create($info1['tarikhKeluar']);
    $diff=date_diff($date1,$date2);
    $jumHari=$diff->format("%a");

    //susun semula tarikh
    $tarikhMasuk = date("d-m-Y", strtotime($info1['tarikhMasuk']));
    $tarikhKeluar = date("d-m-Y", strtotime($info1['tarikhKeluar']));

    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $infobilik['jenisBilik']; ?></td>
        <td><?php echo $tarikhMasuk; ?></td>
        <td><?php echo $tarikhKeluar; ?></td>
        <td><?php echo $diff->format("%a hari"); ?></td>
        <td><?php echo $infopelanggan['namaPelanggan']; ?></td>
        <td><?php echo $infopelanggan['noTelefon']; ?></td>
        <td><?php echo $infopengguna['namaPengguna']; ?></td>
        <td>RM <?php echo number_format($info1['bayaran'],2); ?></td>
        <td>RM <?php echo number_format($info1['bayaran']*$jumHari,2);
        $jumBesar+=($info1['bayaran']*$jumHari); ?></td>
        

        <td>
            <?php
            //batal tempahan dalam tempoh 3 hari sebelum tarikh
            $date10=date_create($info1['tarikhMasuk']);
            $date20=date_create(date("Y-m-d"));
            $diff1=date_diff($date10,$date20);
            $jumHari2=$diff1->format("%a");

            if ($jumHari2>3)
            {
                ?>
                <a class="waves-effect waves-light btn-small" href="../functions/hapus_tempahan.php?id=<?php echo $info1['idTempahan'];?>">
                Batal Tempahan</a>
                <?php
            }
            ?>
            </td>
            </tr>
            <?php $no++; } ?>
            <tr>
                <td colspan="9" align="right">
                    Jumlah Keseluruhan
        </td>
        <td>RM <?php echo number_format($jumBesar,2);?></td>
        <td></td>
        </tr>
        </table>
        </fieldset><div align="center" class="style15"><br>* Laporan Tamat *<br><br>Jumlah
        Rekod: <?php echo $no-1; ?></div><br>
        <center>
            <font color="red">Nota - Pembatalan tempahan hanya dibenarkan dalam
                tempoh 3 hari SEBELUM tarikh masuk.</font>
                <br><br>
                <a class="waves-effect waves-light btn-small" onclick="sysFunc.printTable()" >Cetak Laporan</a>
        </center>
        </main></body>
        <script>
            var sysFunc = new function() {
                this.printTable = function() {
                    var laporan = document.getElementById('laporan');
                    var newTab = window.open('', '', 'height=1000,width=1200');
                    newTab.document.write(laporan.outerHTML);
                    newTab.document.close();
                    newTab.print();
                }
            }
        </script>
        </html>