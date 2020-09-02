<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');

?>

<html>
    <head>
        <title>Laporan</title>
        <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <?php include("../components/menu.php"); ?>
    <body>
        
        <main style="padding-left:5%;padding-right:5%">
        <center>
        
                <h3>Laporan Homestay Odyssey</h3><br>
                <FIELDSET>
                <form style="padding-left:20%;padding-right:20%" align="middle" name="form1" method="POST" action="laporan2.php">
                                <label>Jenis Bilik:</label><br><br><select class=browser-default name="jenisBilik">
                                <?php
                                //call idBilik from db
                                $data2=mysqli_query($samb, "SELECT * FROM bilik");
                                echo "<option>Semua</option>";
                                while ($info2=mysqli_fetch_array($data2)){
                                    echo "<option value='$info2[idBilik]'>$info2[jenisBilik]</option>";
                                }
                                ?>
                            </select><br>
                                                
                            <label>Bulan:</label><br><br>
                            <select class=browser-default name="bulan" id="bulan">
                                <option value="-">Semua</option>
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mac</option>
                                <option value="4">Apr</option>
                                <option value="5">Mei</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Ogos</option>
                                <option value="9">Sept</option>
                                <option value="10">Okt</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select><br>
                                                
                            <label>Tahun:</label><br><br>
                            <select class=browser-default name="tahun" id="tahun">
                                <option value="-">Semua</option>
                                <option>2019</option>
                                <option>2020</option>
                            </select><br><br>
                            
                            <button class="waves-effect waves-light btn-small" type="submit" name="button" id="button" value="Cetak">Papar</button>
                            
                        
                    
                </form>
                </FIELDSET>
            
        </center>
    </main></body>
</html>