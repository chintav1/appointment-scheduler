<html>
	<body>
		<?php
		//Getting user info from the form
			$name = $_POST["name"];
			$email = $_POST["email"];
			$certificate = $_POST["Certification"];
			$clinic_name = $_POST["c_name"];
			$clinic_address = $_POST["c_address"];
			$clinic_phone = $_POST["c_number"];
			$clinic_hours = $_POST["c_time"];
			$username = $_POST["username"];
			$password = $_POST["pass"];

		//Server information
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";

		//Connect to the server
			$conn = mysqli_connect($servername, $dbusername,"", $db);
			
			if ($conn->connect_error) {
				echo "Connection Error";
			}

		//Checking for empty required fields
			if(($name == "") OR ($certificate == "Select...") OR ($clinic_name == "") OR ($clinic_address == "") OR ($clinic_phone == "") OR ($clinic_hours == "") OR ($username == "") OR ($password == "")) {
				echo "Fields with a * are required";
				die();
			}
				$sql = "INSERT INTO employee(NAME, EMAIL, CERTIFICATION) VALUES ('$name', '$email', '$certificate')";
				$login = "INSERT INTO login(username, pass, Name) VALUES ('$username', '$password', '$name')";
				$clinic = "INSERT INTO clinic(NAME, ADDRESS, PHN_NO, HOURS) VALUES ('$clinic_name', '$clinic_address', '$clinic_phone', '$clinic_hours')";
				
				if ($conn->query($sql) == TRUE) {
    				echo "New employee record created successfully";
				}

				if ($conn -> query($login) == TRUE) {
					echo "Welcome, $name";
				}

				if ($conn -> query($clinic) == TRUE) {
					echo "Clinic created successfully";
				}



		?>

	</body>
</html>

