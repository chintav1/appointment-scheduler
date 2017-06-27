<html>
	<body>
		<?php
			$PID = $_POST["PID"];
			$allergy = $_POST["allergies"];
			$note = $_POST["note"];

			$conn = mysqli_connect($servername, $dbusername,"", $db);
			
			if ($conn->connect_error) {
				echo "Connection Error";
			}

			$sql = "INSERT INTO medical_history(patient_id, allergies, note) VALUES ('$PID', '$allergy', '$note')";

			if ($conn -> query($sql) == TRUE) {
				echo "Medical record updated successfully";
			}

		?>
	
	</body>
</html>