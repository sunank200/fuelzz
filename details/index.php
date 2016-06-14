<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fuelzz- Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
    <?php
		ob_start( );
		include("connect.php");
		session_start();
		
		$ans["carno"]=$_GET['uname'];
		$sql="SELECT car_name, fuel_left, fuel_avg FROM fuel_table, car_table WHERE fuel_table.car_id=car_table.car_id AND fuel_table.car_no='".$ans["carno"]."'";
		$result=mysqli_query($db, $sql);
		while($row = $result->fetch_assoc()) {
	        		$ans["car_name"]=$row["car_name"];
	        		$ans["fuel_left"]=$row["fuel_left"];
	        		$ans["fuel_avg"]=$row["fuel_avg"];
	       }
	     $volume=($ans["fuel_left"]/100)*7;
	    $ans_keys = '["' . implode('", "', array_keys($ans) ) . '"]';
		// echo "<script type='text/javascript'>alert('$ans[car_name]');</script>";
	?>
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          // ['Memory', 80],
          ['Fuel Level', <?php echo $ans['fuel_left'];?>],
          // ['Network', 68]
        ]);

        var options = {
          width: 500, height: 220,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>

</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Fuelzz</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		



	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
				<div class="col-lg-12">
					<h1  class="page-header">Dashboard</h1>
					<div align='center' id="chart_div" style="width: 400px; height: 120px;"></div>
				</div>
			</div><!--/.row-->
			<!-- <div align='right' id="chart_div" style="width: 400px; height: 120px;"></div> -->
			
		</div>

	</div> <!--/.row-->

	<?php echo "<h3 align='center'>Car name: Tata Safari </h3>";?>
	
	<?php echo "<h3 align='center'>Fuel level:".$volume."</h3>";?>
	<?php echo "<h3 align='center'>Kms can travel: 3.33 kms</h3>";?>
	
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="parent ">
				
				
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="http://127.0.0.1/fuelzz/index.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	
								
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
