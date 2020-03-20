<?php
	include("../functions/config.php");

	$amount=$_POST['amaun'];
	$sales_date=$_POST['tarikh'];

	$sql="INSERT INTO keuntungan (amaun, tarikh) VALUES ('$amount', '$sales_date')";
	$samb->query($sql);

	echo "<script>alert('Tambah Keuntungan Berjaya');
	window.location='../pages/index.php'</script>";
?>