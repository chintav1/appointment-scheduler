<html>
	<body>
		<?php
            $eid = $_GET['eid'];
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

			$sql = "SELECT l.username FROM login AS l, schedules AS s WHERE l.type = 'patient' AND l.type_id = s.patient_id AND s.employee_id='$eid' AND avalible_date = '$deldate' AND avalible_time='$deltime'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			$username = $row['username'];

			$sql = "DELETE FROM schedule WHERE employee_id='$eid' AND avalible_date='$deldate' AND avalible_time='$deltime'";




			if ($conn->query($sql) == TRUE) {
				$sql = "INSERT INTO notification(login_user,message) VALUES ('$username','Your appointment on '.$deldate.' is canceled')"
			    $fk =	$conn->query($sql);


				echo "appointment canceled <br>";
                echo '<a href="createschedulefront.php?pid='.$eid.'">Add new schedule</a>';
                echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="cancelschedulefront.php?pid='.$eid.'">remove existing schedule</a>';

			}
			else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();

		?>

	</body>
</html>
