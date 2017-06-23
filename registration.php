<html>
	<body>
		<?php
			$health = $_POST["health"];
			$ID = random_int(1000, 9999);
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
			$sql = "INSERT INTO patient (HEALTH_NO, ID, NAME, DOB, ADDRESS, PHN_NO, EMAIL) VALUES ('$health', '$ID', '$name', '$DOB', '$address', '$phone', '$email')";
			$sql = "INSERT INTO login (username, pass) VALUES ('$username','$password')";

			if ($conn->query($sql) === TRUE) {
    		echo "New patient record created successfully";
    		echo "Your ID number is:" + $ID;
			}
			
			else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();

		?>

	</body>
</html>
