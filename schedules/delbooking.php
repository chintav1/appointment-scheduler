<html>
	<body>
		<?php
            $eid = $_GET['eid'];
			$pid = $_GET['pid'];
            $deldate= $_GET['deldate'];
            $deltime= $_GET['deltime'];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";
            $date = date('Y-m-d',strtotime("monday this week"));
			$conn = mysqli_connect($servername, $dbusername,"", $db);
			if ($conn->connect_error) {
				echo "Connection Error";
			}

			//cancel booking script
			
			$sql = "UPDATE schedule SET patient_id= NULL WHERE employee_id='$eid' AND avalible_date='$deldate' AND avalible_time='$deltime'";



			if ($conn->query($sql) == TRUE) {
    			echo "appointment canceled <br>";
                echo '<a href="timetable.php?pid='.$pid.'&date='.$date.'">';
                echo "go back";
                echo "</a>";
			}
			else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();

		?>

	</body>
</html>
