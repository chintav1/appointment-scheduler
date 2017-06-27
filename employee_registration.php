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
			$username = $_POST["username"];
			$password = $_POST["pass"];
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
		//Queries based on type of employee

				$sql = "INSERT INTO employee(NAME, EMAIL, CERTIFICATION) VALUES ('$name', '$email', '$certificate')";
				
				if ($conn->query($sql) === TRUE) {
    				echo "New employee record created successfully";
				}

		?>

	</body>
</html>

