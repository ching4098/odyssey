<?php
session_start();
require ("../functions/keselamatan.php");
require('../functions/config.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Laporan Keuntungan</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/global.css">
	<!-- ChartJS -->
	<script src="../chart.js/Chart.js"></script>
</head>
<body>
<?php include ("../components/menu.php"); ?>
<main style="padding-left:5%;padding-right:5%">
<div>
	<h3>Laporan Keuntungan Homestay Odyssey</h3>
  <br>
  <FIELDSET>
		<div class="col s9">
			<div class="box box-success">
            <div class="box-header with-border">
            	<?php
            		  //set timezone
					       //date_default_timezone_set('Asia/Manila');
					       $year = date('Y');
            	?>
              <h6>Carta Keuntungan (<?php echo $year-1; ?> dengan <?php echo $year; ?>)</h6>
              <br>

            </div>
            <div>
              <div>
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
        </div>
		</div>
	</div>
</div>
<?php include('../functions/data.php'); ?>
<script>
  $(function () {
    var lineChartData = {
      labels  : ['Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'],
      datasets: [
        {
          label               : 'Tahun Lepas',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [ "<?php echo $pjan; ?>",
                                  "<?php echo $pfeb; ?>",
                                  "<?php echo $pmar; ?>",
                                  "<?php echo $papr; ?>",
                                  "<?php echo $pmay; ?>",
                                  "<?php echo $pjun; ?>",
                                  "<?php echo $pjul; ?>",
                                  "<?php echo $paug; ?>",
                                  "<?php echo $psep; ?>",
                                  "<?php echo $poct; ?>",
                                  "<?php echo $pnov; ?>",
                                  "<?php echo $pdec; ?>" 
                                ]
        },
        {
          label               : 'This Year',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [ "<?php echo $tjan; ?>",
                                  "<?php echo $tfeb; ?>",
                                  "<?php echo $tmar; ?>",
                                  "<?php echo $tapr; ?>",
                                  "<?php echo $tmay; ?>",
                                  "<?php echo $tjun; ?>",
                                  "<?php echo $tjul; ?>",
                                  "<?php echo $taug; ?>",
                                  "<?php echo $tsep; ?>",
                                  "<?php echo $toct; ?>",
                                  "<?php echo $tnov; ?>",
                                  "<?php echo $tdec; ?>" 
                                ]
        }
      ]
    }
  
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgb(26,162,96)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : true,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }
    
    lineChartOptions.datasetFill = false
    lineChart.Line(lineChartData, lineChartOptions)

  })
</script>
<script src="../js/global.js"></script>
</main></body>
</html>