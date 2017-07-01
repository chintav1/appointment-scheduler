<html>


	<body>
        <?php

			$eid = $_POST['eid'];
            $date = $_POST['date'];
			$servername = "127.0.0.1";
			$dbusername = "root";
			$db = "sct";

			$conn = mysqli_connect($servername, $dbusername,"", $db);
			if ($conn->connect_error) {
				echo "Connection Error";
			}


            $timesopen = ['10','11','12','13','14','15','16','17'];

			if (strtotime($date) < strtotime('today')){
				echo "<font color= 'red'>That date is in the past</font> <br>";
			}
			else {
	            foreach ($timesopen as $timename) {

					//exisitence checking
	                if (isset($_POST[$timename])){
	                    $time=$timename.":00:00";
						$checking = "SELECT * FROM schedule WHERE employee_id='$eid' AND avalible_date= '$date' AND avalible_time= '$time'";
						$result = $conn->query($checking);
	 					if(mysqli_num_rows($result) <= 0)
	  					{
							//new tuple creation
		                    $sql = "INSERT INTO schedule(employee_id,avalible_date,avalible_time) VALUES ('$eid','$date','$time')";
							if ($conn->query($sql) == TRUE) {
				   				echo "schedule created on '$date' at '$time' <br>";

				   			}
				   			else {
				   				echo "Error: " . $sql . "<br>" . $conn->error;
				   			}
						}
						else{
								echo "<font color='red'>schedule already exist on '$date' at '$time' </font><br>";
						}
	                }
	            }
			}


			echo '<a href="createschedulefront.php?pid='.$eid.'">Add new schedule</a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="cancelschedulefront.php?pid='.$eid.'">remove existing schedule</a>';
			$conn->close();

		?>

	</body>
</html>
