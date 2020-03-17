<?php
session_start();
require ("../functions/keselamatan.php");
require ('../functions/config.php');
require ('../components/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Menu Utama</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet" type="text/css" >
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/dashboardAdmin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<div class="container">
    <div class="sidebar">
    <?php include ("../components/menu.php"); ?>
    </div>
    <div class="main_content">
        <pre class="header">               Sistem Pengurusan Homestay Odyssey</pre> 
    </div>
    <a href="../functions/keluar.php" class="logout">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>

        <div class="footer">
						
	    </div>
</div>

</body>
</html>