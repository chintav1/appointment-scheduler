<html>
	<body>
		<?php
			$health = $_POST["health"];
			$name = $_POST["name"];
			$DOB = $_POST["DOB"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$insurance_company = $_POST["insurance_company"];
			$policy_number = $_POST["policy_no"];
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

			$patient_check = "SELECT health_no FROM patient WHERE (health_no = '$health')";		//checking database for existing patient

			$result = mysqli_query($conn, $patient_check);

			$num_rows = mysqli_num_rows($result);

			if ($num_rows > 0) {
				echo "An account with this health card number already exists. Please try again with a different health card number.";
				die();
			}

			$sql = "INSERT INTO patient (health_no, name, dob, address, phone, email) VALUES ('$health', '$name', '$DOB', '$address', '$phone', '$email')";


			if ($conn->query($sql) === TRUE) {
    			echo "New patient record created successfully <br>";
			}

			$sql ="SELECT id FROM patient WHERE health_no='$health' AND name='$name' AND dob='$DOB'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$id = $row['id'];
			$sql1 = "INSERT INTO login (username, pass, type, type_id) VALUES ('$username','$password', 'patient', '$id')";

			$insurance_check = "SELECT * FROM insurance WHERE policy_number = '$policy_number' AND company = 'insurance_company'";
			$insurance_result = mysqli_query($conn, $insurance_check);
			$num_rows_insurance = mysqli_num_rows($insurance_result);

			if ($num_rows_insurance < 1) {
				$insert_insurance = "INSERT INTO insurance VALUES ('$policy_number', '$insurance_company' ";
			}

			if($conn->query($sql1) == TRUE) {
				echo "New login created <br>";
			}

			else {
    			echo "Error: " . $sql . "<br>" . $conn->error;

			}

			$conn->close();

		?>

	</body>
</html>
