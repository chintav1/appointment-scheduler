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
    	echo "Welcome, $username";
    	$link = "<link rel= "stylesheet" type= "text/css" href="schedules/timetable.php"/>";
    	echo htmlentities($link);
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
