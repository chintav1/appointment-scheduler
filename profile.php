<html>
	<body>

		<?php
			$username = $_POST['username'];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";

			$conn = mysqli_connect($servername, $dbusername,"", $db);
			
			if ($conn->connect_error) {
				echo "Connection Error";
			}
			
			$sql = "SELECT * FROM login INNER JOIN patient ON ((username = $username) AND (login.Health_Card_No = patient.HEALTH_NO))";

			$result = $conn -> query($sql);

			while($row = $result->fetch_assoc()) {
   				$name = $row['Name'];
   				$address = $row['ADDRESS'];
   				$email = $row['EMAIL'];
   				$phone = $row['PHN_NO'];
   				printf("<b> Name: </b> %s", $name);
   				
			}

			

		?>





	</body>
</html>