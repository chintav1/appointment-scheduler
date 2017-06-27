<html>
	<body>
		<?php
			$PID = $_POST["PID"];
			$allergy = $_POST["allergies"];
			$note = $_POST["note"];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";
			$conn = mysqli_connect($servername, $dbusername,"", $db);

			if ($conn->connect_error) {
				echo "Connection Error";
			}

			$insert_record = "INSERT INTO medical_history VALUES ('$PID', '$allergy', '$note')";
			$check_patient = "SELECT * FROM medical_history WHERE medical_history.patient_id = $PID";
			$patient_result = mysqli_query($conn, $check_patient);
			$num_patients = mysqli_num_rows($patient_result);

			if ($num_patients > 0) {
				$update_record = "UPDATE medical_history SET allergies = $allergy, note = $note";
				$result = mysqli_query($conn, $update_record);

				if($result == TRUE) {
					echo "Medical record updated successfully";
				}
			}


			else {
				$result = mysqli_query($conn, $insert_record);

				if($result == TRUE) {
					echo "Medical record created successfully";
				}
			}

		?>

	</body>
</html>
