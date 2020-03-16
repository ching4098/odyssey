<?php
//sambungan MYSQLI dengan nama $samb
$samb = mysqli_connect("localhost","root","","odyssey");
//check for connection error
if (mysqli_connect_errno()){
    echo "Gagal sambungkan pangkalan data mysql: ".mysqli_connect_error();
}
$namasistem="ODYSSEY MANAGEMENT";
$namarumah="ODYSSEY HOMESTAY";
$moto="Servis yang Terpuji";
?>