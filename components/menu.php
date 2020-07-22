<?php
include("../functions/config.php");

if ($_SESSION['level']=="ADMIN") {
//$data = mysqli_query($samb,"SELECT * FROM pengguna");
//while ($info1=mysqli_fetch_array($data)){
?>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet" type="text/css" >
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

</head>
<body>
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <br><li><a class="waves-effect" href="../pages/index.php"><i class="material-icons">assessment</i>Odyssey Homestay</a></li><br>
            <li><div class="divider"></div></li><br>
            <li><a class="waves-effect" href="../pages/tempah.php"><i class="material-icons">book</i>Masuk Tempahan</a></li>
            <li><a class="waves-effect" href="../pages/semak.php"><i class="material-icons">library_add_check</i>Semak Tempahan</a></li>
            <li><a class="waves-effect" href="../pages/laporan.php"><i class="material-icons">subject</i>Laporan</a></li>
            <li><a class="waves-effect" href="../pages/bilik.php"><i class="material-icons">room_service</i>Setup Bilik</a></li>
            <li><a class="waves-effect" href="../pages/pekerja.php"><i class="material-icons">work</i>Senarai Pekerja</a></li>
            <li><a class="waves-effect" href="../pages/import_pekerja.php"><i class="material-icons">import_contacts</i>Import Pekerja</a></li><br>
            <li><div class="divider"></div></li>
            <br>
            <li><a class="waves-effect" onclick="zoomIn();"><i class="material-icons">add</i>Tambah Saiz</a></li>
            <li><a class="waves-effect" onclick="zoomOut();"><i class="material-icons">remove</i>Kecilkan Saiz</a></li>
            <br>
            <li><div class="divider"></div></li>
            <br><li><a class="waves-effect" href="../functions/keluar.php?idPengguna=<?php echo $_SESSION['idPengguna'] ?>"><i class="material-icons">exit_to_app</i>Log Keluar</a></li>
        </ul>
        
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
    <script>
        var options = {
    
        label: '🌓', // default: ''
        
        }

        const darkmode = new Darkmode(options);
        darkmode.showWidget();
        
    </script>
    <script>
    var pageFontSize = 15;
    function zoomIn() {
        document.getElementsByTagName('html')[0].style.fontSize = pageFontSize + 1 + "px";
        pageFontSize++;
    }
    function zoomOut() {
        document.getElementsByTagName('html')[0].style.fontSize = pageFontSize - 1 + "px";
        pageFontSize--;
    }
    </script>
</body>

    
<?php

} else {
    //$data2 = mysqli_query($samb,"SELECT * FROM pengguna");
    //while ($info2=mysqli_fetch_array($data2)) {
?>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet" type="text/css" >
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

</head>
<body>
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <br><li><a class="waves-effect" href="../pages/index.php"><i class="material-icons">assessment</i>Odyssey Homestay</a></li><br>
            <li><div class="divider"></div></li><br>
            <li><a class="waves-effect" href="../pages/tempah.php" ><i class="material-icons">book</i>Masuk Tempahan</a></li>
            <li><a class="waves-effect" href="../pages/semak.php"><i class="material-icons">library_add_check</i>Semak Tempahan</a></li>
            <br>
            <li><div class="divider"></div></li>
            <br>
            <li><a class="waves-effect" onclick="zoomIn();"><i class="material-icons">add</i>Tambah Saiz</a></li>
            <li><a class="waves-effect" onclick="zoomOut();"><i class="material-icons">remove</i>Kecilkan Saiz</a></li>
            <br>
            <li><div class="divider"></div></li>
            <br><li><a class="waves-effect" href="../functions/keluar.php?idPengguna=<?php echo $_SESSION['idPengguna'] ?>"><i class="material-icons">exit_to_app</i>Log Keluar</a></li>
        </ul>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
    <script>
        var options = {
    
        label: '🌓', // default: ''
        
        }

        const darkmode = new Darkmode(options);
        darkmode.showWidget();
        
    </script>
    <script>
    var pageFontSize = 15;
    function zoomIn() {
        document.getElementsByTagName('html')[0].style.fontSize = pageFontSize + 1 + "px";
        pageFontSize++;
    }
    function zoomOut() {
        document.getElementsByTagName('html')[0].style.fontSize = pageFontSize - 1 + "px";
        pageFontSize--;
    }
    </script>
</body>
<?php
}
?>
