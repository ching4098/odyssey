<?php
session_start();
require ("../functions/keselamatan.php");
//sambung ke pangkalan data
require('../functions/config.php');
//sambung ke fail template
require('../components/header.php');

?>
<html>
    <head>
        <title>Masuk Tempahan</title>
        <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
    <?php include("../components/menu.php"); ?>    
    <main>
    <h3>Tempahan Bilik</h3>
    <FIELDSET>
        <br><a class="waves-effect waves-light btn-small purple" href="../functions/daftar_pelanggan.php">[+] Pelanggan Baru</a>
        <br>
        
        <br><hr><form style="padding-left:20%;padding-right:20%" align="middle" method="POST" action="../functions/masuk_tempahan.php">
            <!-- BORANG CARIAN NAMA PELANGGAN MULA -->
            IC Pelanggan:<div class="input-field col s12"><select class=browser-default name="icPelanggan">
                    <?php
                        $data1=mysqli_query($samb,"SELECT * from pelanggan");
                        while ($info1=mysqli_fetch_array($data1)){
                            echo "<option hidden selected> -- Pilih IC Pelanggan -- </option>";
                            echo "<option value='$info1[icPelanggan]'>$info1[icPelanggan]</option>";
                        }
                    ?>
                </select></div><br></div<br>
                <!-- BORANG CARIAN NAMA PELANGGAN TAMAT -->
                Jenis Bilik:<div class="input-field col s12"><select class=browser-default name="idBilik">
                    <?php
                    $data2=mysqli_query($samb, "SELECT * FROM bilik");
                    while ($info2=mysqli_fetch_array($data2))
                    {
                        echo "<option hidden selected> -- Pilih bilik -- </option>";
                        echo "<option value='$info2[idBilik]'>$info2[jenisBilik]</option>";
                    }
                    ?>
                    </select><br>
                    Tarikh Masuk:<div class="input-field col s12"> <input type="date" name="tarikhMasuk" ><br>
                    Tarikh Keluar:<div class="input-field col s12"> <input type="date" name="tarikhKeluar"><br><br>
                    <button class="waves-effect waves-light btn-small purple" type="submit">Tempah</button>
                    <button class="waves-effect waves-light btn-small purple" type="reset">Reset</button><br><br>
                    *Pilihan hanya dibenarkan sekali sahaja.
                </form>
                </FIELDSET></main></body>
                </html>
