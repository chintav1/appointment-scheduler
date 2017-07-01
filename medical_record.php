<html>
	<body>
		<?php
		//Get information from HTML form
			$PID = $_POST["PID"];
			$allergy = $_POST["allergies"];
			$note = $_POST["note"];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";
			$conn = mysqli_connect($servername, $dbusername,"", $db);										//Connect to the database

			if ($conn->connect_error) {																		
				echo "Connection Error";
			}
			
			$insert_record = "INSERT INTO medical_history VALUES ('$PID', '$allergy', '$note')";			//Insertion of medical record
			
			$check_patient = "SELECT * FROM medical_history WHERE medical_history.patient_id = '$PID'";		//Checking if patient exists
			
			$patient_result = mysqli_query($conn, $check_patient);											//perform $check_patient query
			
			$num_patients = mysqli_num_rows($patient_result);												//get number of rows in the result
 
			//If the patient's ID exists in the table, update their tuple with the new information
			if ($num_patients > 0) {
				$update_record = "UPDATE medical_history SET allergies = '$allergy' , note = '$note'  WHERE patient_id = '$PID' ";
				$result = mysqli_query($conn, $update_record);
				if($result == TRUE) {
					echo "Medical record updated successfully";
				}
			}


			//Otherwise, insert a new tuple with the patient's medical record
			else {
				$result = mysqli_query($conn, $insert_record);

				if($result == TRUE) {
					echo "Medical record created successfully";
				}
			}

		?>

	</body>
</html>
