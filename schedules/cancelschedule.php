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

			$sql = "SELECT * FROM schedules WHERE employee_id='$eid' AND avalible_date = '$deldate' AND avalible_time='$deltime'";
			$result = mysqli_query($conn, $sql);
	        $num_rows = mysqli_num_rows($result);
	        if($num_rows > 0){
				$row = $result->fetch_assoc();
				$pid = $row['patient_id'];
				$sql = "SELECT username FROM login WHERE type ='patient' AND type_id = '$pid'";
				$result = $conn->query($sql);
				$row = mysqli_fetch_assoc($result);
				$username = $row['username'];


				$sql = "INSERT INTO notification(login_user,message) VALUES ('$username','Your appointment is canceled')";
				$conn->query($sql);
			}



			$sql = "DELETE FROM schedule WHERE employee_id='$eid' AND avalible_date='$deldate' AND avalible_time='$deltime'";


			if ($conn->query($sql) == TRUE) {
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
