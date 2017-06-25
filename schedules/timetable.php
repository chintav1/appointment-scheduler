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

			<header>
				<h1 align = "center" >Schedule your appointment </h1>

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
							<th>Denist Availability<br/>
							</th>
							<?php
							$todaydate = date('Y-m-d');
							$year=date('Y');
							$week=date('W');
							$dayofweek = date('N');
							$openingdays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];

							$j = 0;

							foreach ($openingdays as $weekday) {


								$thisdate = date("Y-m-d", strtotime("+{$j} days", strtotime('monday this week')));

							?>

								<th><?php
								echo $weekday."<br/>\n";
								echo $thisdate;
								?></th>




							<?php
							$j = $j +1;
							}
							?>
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
						// generate the row of the table base on opening timesort
			            foreach ($opentimeslot as $atime ) {

			            ?>
			                <tr>
								<th><?php echo $atime;?></th>
								<?php
								// get the name of the doctor that is on schedule this date and time

								for ($i =0; $i <5 ;$i++){
									$thisdate = date("Y-m-d", strtotime("+{$i} days", strtotime('monday this week')));
									$thistime = $atime.":00";

									$result = mysqli_query($conn, "SELECT NAME FROM employee WHERE EMP_ID IN (SELECT employee_id FROM schedule WHERE avalible_date = ".$thisdate." AND avalible_time = ".$thistime." AND patient_id IS NULL)");

								?>


								<td>
								<?php
								 	if (!$result){
									echo "no one avaliable";
								}
									while($row = $result->fetch_assoc()){
								?>
									<button type="button"><?php echo $row['NAME'];?><button>

								<?php
							}
								?>
								</td>


								<?php
								}
								?>
							</tr>
			            <?php
			            }
			            ?>


					</tbody>
				</table>

		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
	</body>
</html>
