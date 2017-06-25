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
			
			$sql = "SELECT * FROM login JOIN patient ON login.Health_Card_No = patient.HEALTH_NO";

			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)) {
   				$name = $row['Name'];
   				$address = $row['ADDRESS'];
   				$email = $row['EMAIL'];
   				$phone = $row['PHN_NO'];
   				printf("<b> Name: </b> %s", $name)
   				
			}

			

		?>





	</body>
</html>