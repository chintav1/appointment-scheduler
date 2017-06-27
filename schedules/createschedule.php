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

            foreach ($timesopen as $timename) {

                if (isset($_POST[$timename])){
                    $time=$timename.":00:00";
                    $sql = "INSERT INTO schedule(employee_id,avalible_date,avalible_time) VALUES ('$eid','$date','$time')";
                    $conn->query($sql);
                }
            }

			if ($conn->query($sql) == TRUE) {
				echo "appointment created <br>";
				echo '<a href="schedules/createschedulefront.php?pid='.$eid.'">Add new schedule</a>';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="schedules/cancelschedulefront.php?pid='.$eid.'">remove existing schedule</a>';

			}
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();

		?>

	</body>
</html>
