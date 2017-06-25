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
			
			echo mysql_result($result, 1);

		?>





	</body>
</html>