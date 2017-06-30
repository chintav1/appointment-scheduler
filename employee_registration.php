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
				$sql = " SELECT id FROM employee WHERE certification ='Manager'";
				$result=$conn -> query($sql);
				$row=$result->fetch_assoc();
				
				$super_id=$row['id'];

				$sql = "INSERT INTO employee(clinic_address, clinic_phone, name, email, certification, super_id) VALUES
						((SELECT address FROM clinic WHERE address = '$clinic_address'), (SELECT phone FROM clinic WHERE phone = '$clinic_phone'),
						'$name', '$email', '$certificate', '$super_id')";

				if ($conn->query($sql) == TRUE) {
    				echo "New employee record created<br>";
				}

				$sql1 = "SELECT id FROM employee WHERE name ='$name' AND certification = '$certificate'";
				$result = $conn->query($sql1);
				$row = $result->fetch_assoc();
				$id = $row['id'];
				$login = "INSERT INTO login(username, pass, type, type_id) VALUES ('$username', '$password', 'employee', '$id')";

				if ($conn -> query($login) == TRUE) {
					echo "Welcome, $name<br>";
				}

				$clinic = "INSERT INTO clinic(name, address, phone, hours) VALUES ('$clinic_name', '$clinic_address', '$clinic_phone', '$clinic_hours')";

				if ($conn -> query($clinic) == TRUE) {
					echo "Clinic created successfully<br>";
				}



		?>

	</body>
</html>
