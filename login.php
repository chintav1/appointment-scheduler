<html><body>

<?php

	$username = $_POST["username"];
	$password = $_POST["pass"];
	$servername = "127.0.0.1";
	$dbusername = "root";
	$db = "sct";

	$conn = mysqli_connect($servername, $dbusername,"", $db);
	if ($conn->connect_error) {
		echo "Connection Error";
	}

	$sql = "SELECT * FROM login WHERE ((username = '$username') AND (pass = '$password'))";

	$result = mysqli_query($conn, $sql);
	$num_rows = mysqli_num_rows($result);
	$row =$result -> fetch_assoc();
	$pt = $row['type'];
	$pid = $row['type_id'];
	$date =date('Y-m-d',strtotime('monday this week'));
	if($num_rows > 0) {


		if ($pt == 'employee'){
			echo "Welcome, $username, your Employee ID is $pid"."<br/>";
			echo '<a href="schedules/createschedulefront.php?pid='.$pid.'">Add new schedule</a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="schedules/cancelschedulefront.php?pid='.$pid.'">remove existing schedule</a>';
		}
		if ($pt == 'patient'){
			echo "Welcome, $username, your Patient ID is $pid"."<br/>";
    		echo '<a href="schedules/timetable.php?pid='.$pid.'&date='.$date.'">Schedule</a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="profile.php?pid='.$pid.'">Profile</a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="record.php?pid='.$pid.'">Medical Record</a>';

		}


    	die();

	}
?>


	<!--Re-enter if credentials are wrong-->
	Invalid username/password. Please try again: <br>
	<form action="login.php" method="post">
   		Username: <input type="text" name="username"><br>
   		Password: <input type="password" name="pass"><br>
   		<input type="submit" value="Login">
	</form>
</body>
</html>
