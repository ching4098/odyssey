<?php
session_start();
require ("../functions/keselamatan.php");
//sambung ke pangkalan data
require('../functions/config.php');
$data1=mysqli_query($samb,"SELECT * FROM pengguna");
    $info3=mysqli_fetch_array($data1)
?>


<html>
    <head>
        <title>Masuk Tempahan</title>
        <link href="../css/global.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
    
    <?php include("../components/menu.php"); ?>    
    <main style="padding-left:5%;padding-right:5%">
    <h3>Tempahan Bilik</h3><br>
    <FIELDSET>
        <br><a class="waves-effect waves-light btn-small" href="../functions/daftar_pelanggan.php">[+] Pelanggan Baru</a>
        <br>
        
        <br><hr><form style="padding-left:20%;padding-right:20%" align="middle" method="POST" action="../functions/masuk_tempahan.php?idPengguna=<?php echo $info3['idPengguna']; ?>">
            <!-- BORANG CARIAN NAMA PELANGGAN MULA -->
            <label>IC Pelanggan:</label><div class="input-field"><select name="icPelanggan" required>
                    <option value="" disabled selected>Pilih IC Pelanggan</option>
                    <?php
                        $data1=mysqli_query($samb,"SELECT * from pelanggan");
                        while ($info1=mysqli_fetch_array($data1)){
                            echo "<option value='$info1[icPelanggan]'>$info1[icPelanggan]</option>";
                        }
                    ?>
                </select></div><br></div<br>
                <!-- BORANG CARIAN NAMA PELANGGAN TAMAT -->
                <label>Jenis Bilik:</label><div class="input-field"><select name="idBilik" required>
                    <option value="" disabled selected>Pilih Bilik</option>
                    <?php
                    $data2=mysqli_query($samb, "SELECT * FROM bilik");
                    while ($info2=mysqli_fetch_array($data2))
                    {
                        echo "<option value='$info2[idBilik]'>$info2[jenisBilik]</option>";
                    }
                    ?>
                    </select><br>
                    <div class="input-field">
                        <label>Tarikh Masuk</label><br>
                        <input type="date" name="tarikhMasuk" required/>
                    </div>
                    <br>
                    <div class="input-field">
                        <label>Tarikh Keluar</label><br>
                        <input type="date" name="tarikhKeluar" required/>
                    </div>
                    <br><br>
                    <button class="waves-effect waves-light btn-small" type="submit">Tempah</button>
                    <button class="waves-effect waves-light btn-small" type="reset">Reset</button><br><br>
                    <h6>*Pilihan hanya dibenarkan sekali sahaja.</h6>
                </form>
                </FIELDSET></main>
                
                <script>
                   M.AutoInit();
                </script>
                <script type="text/javascript" src="../js/global.js">
            
                </script>
                </body>
                </html>
