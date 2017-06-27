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


			if
            foreach ($timesopen as $timename) {

                if (isset($_POST[$timename])){
                    $time=$timename.":00:00";
					$checking = "SELECT * FROM schedule WHERE employee_id='$eid' AND avalible_date= '$date' AND avalible_time= '$time'";
					$result =$conn->query($sql);
 					if(mysqli_num_rows($result) <= 0)
  					{
	                    $sql = "INSERT INTO schedule(employee_id,avalible_date,avalible_time) VALUES ('$eid','$date','$time')";
	                    $conn->query($sql);
					}
                }
            }

			if ($conn->query($sql) == TRUE) {
				echo "appointment created <br>";
			}
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			echo '<a href="createschedulefront.php?pid='.$eid.'">Add new schedule</a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="cancelschedulefront.php?pid='.$eid.'">remove existing schedule</a>';
			$conn->close();

		?>

	</body>
</html>
