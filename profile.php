<html>
	<body>

		<?php
			$pid = $_GET["pid"];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";

			$conn = mysqli_connect($servername, $dbusername,"", $db);

			if ($conn->connect_error) {
				echo "Connection Error";
			}

			$sql = "SELECT patient.name, patient.address, patient.email, patient.phone FROM login, patient WHERE (login.type_id = patient.id AND login.type = 'patient' AND patient.id = '$pid')";

			$result = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($result);

			if($num_rows > 0) {
				while($row = $result -> fetch_assoc()) {
   					$name = $row['name'];
   					$address = $row['address'];
   					$email = $row['email'];
   					$phone = $row['phone'];
   					printf("<b> Name: </b> %s", $name);
   					printf("<b> Email: </b> %s", $address);
				}
			}

			else{
				echo "No user found";
			}

			

		



		?>





	</body>
</html>
