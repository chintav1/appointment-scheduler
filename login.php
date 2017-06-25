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

	$sql = "SELECT username, pass FROM login WHERE ((username = '$username') AND (pass = '$password'))";
	
	$result = mysqli_query($conn, $sql);
	$num_rows = mysqli_num_rows($result);
	
	if($num_rows > 0) {
    	echo "Welcome, $username"."<br/>";
    	echo '<a href="http://70.77.112.86/schedules/timetable.php">Schedule</a>'\t;
    	echo '<a href="http://70.77.112.86/profile.php">Profile</a>';
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
