<?php
	include("../functions/config.php");

	//set timezone
	//date_default_timezone_set('Asia/Manila');
	$year = date('Y');
	$total=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT *, SUM(bayaran) AS total FROM tempahan WHERE month(tarikhKeluar)='$month' AND year(tarikhKeluar)='$year'";
		$query=$samb->query($sql);
		$row=$query->fetch_array();

		$total[]=$row['total'];
	}

	$tjan = $total[0];
	$tfeb = $total[1];
	$tmar = $total[2];
	$tapr = $total[3];
	$tmay = $total[4];
	$tjun = $total[5];
	$tjul = $total[6];
	$taug = $total[7];
	$tsep = $total[8];
	$toct = $total[9];
	$tnov = $total[10];
	$tdec = $total[11];

	$pyear = $year - 1;
	$pnum=array();

	for ($pmonth = 1; $pmonth <= 12; $pmonth ++){
		$sql="SELECT *, SUM(bayaran) AS ptotal FROM tempahan WHERE month(tarikhKeluar)='$pmonth' AND year(tarikhKeluar)='$pyear'";
		$pquery=$samb->query($sql);
		$prow=$pquery->fetch_array();

		$ptotal[]=$prow['ptotal'];
	}
	
	$pjan = $ptotal[0];
	$pfeb = $ptotal[1];
	$pmar = $ptotal[2];
	$papr = $ptotal[3];
	$pmay = $ptotal[4];
	$pjun = $ptotal[5];
	$pjul = $ptotal[6];
	$paug = $ptotal[7];
	$psep = $ptotal[8];
	$poct = $ptotal[9];
	$pnov = $ptotal[10];
	$pdec = $ptotal[11];
?>