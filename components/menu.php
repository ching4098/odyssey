<?php
if ($_SESSION['level']=="ADMIN")
{
?>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet" type="text/css" >
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <br><li><a class="waves-effect" href="#!"><i class="material-icons">folder_open</i>Odyssey Homestay</a></li><br>
            <li><div class="divider"></div></li><br>
            <li><a class="waves-effect" href="../pages/tempah.php" ><i class="material-icons">book</i>Masuk Tempahan</a></li>
            <li><a class="waves-effect" href="../pages/semak.php"><i class="material-icons">library_add_check</i>Semak Tempahan</a></li>
            <li><a class="waves-effect" href="../pages/laporan.php"><i class="material-icons">subject</i>Laporan</a></li>
            <li><a class="waves-effect" href="../pages/bilik.php"><i class="material-icons">room_service</i>Setup Bilik</a></li>
            <li><a class="waves-effect" href="../pages/pekerja.php"><i class="material-icons">work</i>Senarai Pekerja</a></li>
            <li><a class="waves-effect" href="../pages/import_pekerja.php"><i class="material-icons">import_contacts</i>Import Pekerja</a></li><br>
            <li><div class="divider"></div></li>
            <br><li><a class="waves-effect" href="../functions/keluar.php"><i class="material-icons">exit_to_app</i>Log out</a></li>
        </ul>
    <script type="text/javascript" src="../js/materialize.js"></script>
</body>

    
<?php
} else {
?>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet" type="text/css" >
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
        <ul>
        <br><li><a class="waves-effect" href="#!">Odyssey Homestay</a></li><br>
        <li><div class="divider"></div></li><br>
            <li><a class="waves-effect" href="../pages/tempah.php" ><i class="material-icons">book</i>Masuk Tempahan</a></li>
            <li><a class="waves-effect" href="../pages/semak.php"><i class="material-icons">library_add_check</i>Semak Tempahan</a></li>
            <li><a class="waves-effect" href="../pages/laporan.php"><i class="material-icons">subject</i>Laporan</a></li>
            <li><div class="divider"></div></li>
            <li><a class="waves-effect" href="../functions/keluar.php"><i class="material-icons">exit_to_app</i>Log out</a></li>
        </ul>
    <script type="text/javascript" src="../js/materialize.js"></script>
</body>
<?php
}
?>
