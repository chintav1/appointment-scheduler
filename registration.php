<html>
	<body>
		<?php
			$health = $_POST["health"];
		//	$ID = random_int(1000, 9999);
			$name = $_POST["name"];
			$DOB = $_POST["DOB"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			$password = $_POST["pass"];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";

			$conn = mysqli_connect($servername, $dbusername,"", $db);
			if ($conn->connect_error) {
				echo "Connection Error";
			}

			if (($health == "") OR ($name == "") OR ($DOB == "") OR ($address == "") OR ($phone == "") OR ($username == "") OR ($password == "")) {
				echo "Registration error: Some required fields are empty";
				die();
			}

			$patient_check = "SELECT HEALTH_NO FROM patient WHERE (HEALTH_NO = '$health')";		//checking database for existing patient
			
			$result = mysqli_query($conn, $patient_check);
			
			$num_rows = mysqli_num_rows($result);
	
			if ($num_rows == 1) {
				echo "An account with this health card number already exists.";
				die();
			}
			
			$sql = "INSERT INTO patient (HEALTH_NO, NAME, DOB, ADDRESS, PHN_NO, EMAIL) VALUES ('$health', '$name', '$DOB', '$address', '$phone', '$email')";
			$sql1 = "INSERT INTO login (username, pass) VALUES ('$username','$password')";
			
			
			if ($conn->query($sql) === TRUE) {
    			echo "New patient record created successfully";
			}

			else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();

		?>

	</body>
</html>
