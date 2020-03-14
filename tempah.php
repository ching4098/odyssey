<?php
//sambung ke pangkalan data
require('config.php');
//sambung ke fail template
require('header.php');
?>
<html>
    <head>
        <title>Masuk Tempahan</title>
    </head>
    <body><FIELDSET>
        Jika pelanggan baharu <a href="daftar_pelanggan.php">Daftar di sini</a>
        <br><hr><form method="POST" action="masuk_tempahan.php">
            <!-- BORANG CARIAN NAMA PELANGGAN MULA -->
            <label>IC Pelanggan: </label><select name="icPelanggan">
                    <?php
                        $data1=mysqli_query($samb,"SELECT * from pelanggan");
                        while ($info1=mysqli_fetch_array($data1)){
                            echo "<option hidden selected> -- pilih IC Pelanggan -- </option>";
                            echo "<option value='$info1[icPelanggan]'>$info1[icPelanggan]</option>";
                        }
                    ?>
                </select><br>
                <!-- BORANG CARIAN NAMA PELANGGAN TAMAT -->
                <label>Bilik: </label><select name="idBilik">
                    <?php
                    $data2=mysqli_query($samb, "SELECT * FROM bilik");
                    while ($info2=mysqli_fetch_array($data2))
                    {
                        echo "<option hidden selected> -- pilih bilik -- </option>";
                        echo "<option value='$info2[idBilik]'>$info2[jenisBilik]</option>";
                    }
                    ?>
                    </select><br>
                    Tarikh Masuk: <input type="date" name="tarikhMasuk"><br>
                    Tarikh Keluar: <input type="date" name="tarikhKeluar"><br><br>
                    <button type="submit">Tempah</button>
                    <button type="reset">Reset</button><br><br>
                    *Pilihan hanya dibenarkan sekali sahaja.
                </form>
                <a href="dashboardAdmin.php">Dashboard</a>
                </FIELDSET></body>
                </html>
