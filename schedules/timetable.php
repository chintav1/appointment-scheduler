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
				<?php
				$todaydate = date('Y-m-d');
				$year=date('Y');
				$week=date('W');
				$openingdays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
				$thismonday =$_GET['date'];
				$pid=$_GET['pid'];
				$nextmonday = date("Y-m-d", strtotime("monday next week"));
				$lastmonday= date("Y-m-d", strtotime("monday last week"));
				echo "<h1 align = 'center' > Week of: '$thismonday'</h1>";
				 ?>
				<!-- <nav class="codrops-demos">
					<a href="index.html">Basic Usage</a>
					<a class="current-demo" href="index2.html">Biaxial Headers</a>
					<a href="index3.html">Wide Tables</a>
				</nav> -->
			</header>
			<div class="component">

				<h2>Change Date</h2>
				<?php
				echo '<a href="timetable.php?pid='.$pid.'&date='.$lastmonday.'">Prev Week</a><br>';
				echo '<a href="timetable.php?pid='.$pid.'&date='.$nextmonday.'">Next Week</a><br>';
				?>

				<table>
					<thead>
						<tr>
							<th><br/>Denist Availability<br/>

							</th>
							<?php

							$j = 0;

							foreach ($openingdays as $weekday) {


								$thisdate = date("Y-m-d", strtotime("+{$j} days", strtotime($thismonday)));

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

						$conn = new mysqli($servername, $dbusername,"", $db);
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
									$thisdate = date("Y-m-d", strtotime("+{$i} days", strtotime($thismonday)));
									$thistime = $atime.":00";
									$sql ="SELECT * FROM employee WHERE id IN (SELECT employee_id FROM schedule WHERE avalible_date = '$thisdate' AND avalible_time = '$thistime' AND patient_id IS NULL)";
									$result = $conn->query($sql);
									echo "<td>";
									// echo $sql;
								 	if($result->num_rows > 0){
										while($row = $result->fetch_assoc()){
											echo "<li>";
											echo "<a href='booking.php?eid=".$row['id']."&date=".$thisdate."&time=".$thistime."&pid=".$pid."'>\n";
											echo "Dr. ".$row['name'];
											echo "</a></li>\n";
										}
									}
									else {
										echo "Not Avaliable";
									}
									echo "</td>";
								}
								?>
							</tr>
			            <?php
			            }
			            ?>


					</tbody>
				</table>

				<?php
				echo "Your booked appointments: <br>";
				$sql = "SELECT s.avalible_date, s.avalible_time, e.name, e.id FROM schedule AS s, employee AS e WHERE s.patient_id='$pid' AND s.employee_id=e.id ORDER BY s.avalible_date";
				$result = $conn->query($sql);
				echo '<ul style="list-style-type:none">';
				if($result->num_rows > 0){
				   while($row = $result->fetch_assoc()){
					   echo '<li>';
					   echo "<a href='delbooking.php?eid=".$row['id']."&deldate=".$row['avalible_date']."&deltime=".$row['avalible_time']."&pid=".$pid."'>";
					   echo "cancel &#9";
					   echo "</a>";
					   echo $row['avalible_date']." at ".$row['avalible_time']." with ".$row['name'];
					   echo '</li>';
				   }
			   	}
				echo '</ul>';



				 ?>

		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
	</body>
</html>
