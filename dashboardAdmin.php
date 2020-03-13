
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="dashboardAdmin.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2 class="title">dashboard</h2>
        <ul>
        <!-- <li><a href="tempah.php"><i class="fas fa-home"></i>Masuk Tempahan</a></li> -->
        <li><a href="tempah.php"><i class="fas fa-home"></i>Masuk Tempahan</a></li>
            <li><a href="semak.php"><i class="fas fa-sticky-note"></i>Semak Tempahan</a></li>
            <li><a href="laporan.php"><i class="fas fa-poll-h"></i>Laporan</a></li>
            <li><a href="bilik.php"><i class="fas fa-edit"></i>Setup Bilik</a></li>
            <li><a href="pekerja.php"><i class="fas fa-user-edit"></i>Tambah Pekerja</a></li>
            <li><a href="import_pekerja.php"><i class="fas fa-portrait"></i>Import Pekerja</a></li>
        </ul> 
    </div>
    <div class="main_content">
            <img src="img/homestay.png" alt="logo" class="logo">
        <pre class="header">               Sistem Pengurusan Homestay Ray</pre> 
    </div>
    <a href="keluar.php" class="logout">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>

        <div class="footer">
						Sistem Pengurusan Homestay Odyssey
					</div>
</div>

</body>
</html>
