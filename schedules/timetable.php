<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SCT: schedule your appointment</title>
		<meta name="description" content="Sticky Table Headers Revisited" />
		<meta name="keywords" content="Sticky Table Headers Revisited" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				<a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Tutorials/ShapeHoverEffectSVG/"><span>Previous Demo</span></a>
				<span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=18116"><span>Back to the Codrops Article</span></a></span>
			</div>
			<header>
				<h1>Schedule your appointment <span>Date: </span></h1>
				<!-- <nav class="codrops-demos">
					<a href="index.html">Basic Usage</a>
					<a class="current-demo" href="index2.html">Biaxial Headers</a>
					<a href="index3.html">Wide Tables</a>
				</nav> -->
			</header>
			<div class="component">

				<h2>Change Date</h2>

				<table>
					<thead>
						<tr>
							<th>Denist Availability</th>
							<th>Monday</th>
							<th>Tuesday</th>
							<th>Wednesday</th>
							<th>Thursday</th>
							<th>Friday</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$servername = "127.0.0.1";
						$dbusername = "root";
						$db = "sct";
						$opentimeslot = ["10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00"];

						$conn = mysqli_connect($servername, $dbusername,"", $db);
						if ($conn->connect_error) {
							echo "Connection Error";
						}
// get the name of the doctor that is on schedule this date and time

			            foreach ($opentimeslot as $atime ) {

			            ?>
			                <tr>
								<th><?php echo $atime;?></th>
								<?php
								$result = mysqli_query("SELECT name FROM employee WHERE (employee)");

								?>







							</tr>
			            <?php
			            }
			            ?>
						<tr>
							<th>10:00</th>
							<td><button type="button">a doctor name<button></td>
							<td>40</td>
							<td>9</td>
							<td>47</td>
							<td>31</td>

						</tr>

					</tbody>
				</table>

		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
	</body>
</html>