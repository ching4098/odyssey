<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');
require('../components/header.php');
?>

<html>
    <head>
        <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <?php include("../components/menu.php"); ?>
    <body>
        
        <main>
        <center>
            <table>
                <h3>Laporan Homestay Odyssey</h3>
                <form  name="form1" method="POST" action="laporan2.php">
                    <table style="padding-left:20%;padding-right:20%" border="1">
                        <tr>
                            <td width="118">Jenis Bilik</td>
                            <td width="31">:</td>
                            <td width="429"><label for="select"></label><select class=browser-default name="jenisBilik">
                                <?php
                                //call idBilik from db
                                $data2=mysqli_query($samb, "SELECT * FROM bilik");
                                echo "<option>-</option>";
                                while ($info2=mysqli_fetch_array($data2)){
                                    echo "<option value='$info2[idBilik]'>$info2[jenisBilik]</option>";
                                }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Bulan</td>
                            <td>:</td>
                            <td><select class=browser-default name="bulan" id="bulan">
                                <option value="-">-</option>
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
                            </select></td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>:</td>
                            <td><select class=browser-default name="tahun" id="tahun">
                                <option value="-">-</option>
                                <option>2019</option>
                                <option>2020</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:center">
                                <button class="waves-effect waves-light btn-small purple" type="submit" name="button" id="button" value="Cetak">Cetak</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </table>
        </center>
    </main></body>
</html>