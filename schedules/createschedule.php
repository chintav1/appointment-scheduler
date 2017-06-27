<html>


	<body>
        <?php

			$eid = $_POST['eid'];
            $date = $_POST['date'];
            $stime=$_POST['starttime'];
            $etime=$_POST['endtime'];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";

			$conn = mysqli_connect($servername, $dbusername,"", $db);
			if ($conn->connect_error) {
				echo "Connection Error";
			}

			$patient_check = "SELECT HEALTH_NO FROM patient WHERE (HEALTH_NO = '$health')";		//checking database for existing patient

			$result = mysqli_query($conn, $patient_check);

			$num_rows = mysqli_num_rows($result);

			$sql = "INSERT INTO schedule(employee_id,avalible_date,avalible_time,patient_id) VALUES ('$eid','$date','$time','')";


			if ($conn->query($sql) === TRUE) {
    			echo "new time is now avaliable";
			}


			else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();

		?>

	</body>
</html>
