<html>
	<body>

		<?php
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";

			$conn = mysqli_connect($servername, $dbusername,"", $db);

			if ($conn->connect_error) {
				echo "Connection Error";
			}

			$sql = "SELECT name FROM login AND patient WHERE (login.type_id = patient.id AND login.type = 'patient')";

			$result = $conn -> query($sql);

			while($row = $result -> fetch_assoc()) {
   				$name = $row['name'];
   				$address = $row['address'];
   				$email = $row['email'];
   				$phone = $row['phone'];
   				printf("<b> Name: </b> %s", $name);
			}

		



		?>





	</body>
</html>
