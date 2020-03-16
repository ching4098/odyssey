<?php
session_start();
include ("../functions/keselamatan.php");
require ('../functions/config.php');
require ('../components/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu Utama</title>
</head>
<body>

<div class="wrapper">
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
