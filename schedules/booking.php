<html>
	<body>
		<?php
            $eid = $_GET['eid'];
			$pid = $_GET['pid'];
            $date= $_GET['date'];
            $time= $_GET['time'];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";

			$conn = mysqli_connect($servername, $dbusername,"", $db);
			if ($conn->connect_error) {
				echo "Connection Error";
			}
//script for patient to book 
			$sql = "UPDATE schedule SET patient_id= '$pid' WHERE employee_id='$eid' AND avalible_date='$date' AND avalible_time='$time'";

			$thismonday = date('Y-m-d',strtotime('monday this week'));

			if ($conn->query($sql) == TRUE) {
    			echo "appointment booked <br>";
                echo '<a href="timetable.php?pid='.$pid.'&date='.$thismonday.'">';
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
