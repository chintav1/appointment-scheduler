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

			$result = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($result);

			if($num_rows > 0) {
				while($row = $result -> fetch_assoc()) {
   					$name = $row['name'];
   					$address = $row['address'];
   					$email = $row['email'];
   					$phone = $row['phone'];
   					printf("<b> Name: </b> %s", $name);
				}
			}

			else{
				echo "No user found";
			}

			

		



		?>





	</body>
</html>
