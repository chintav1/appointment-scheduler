<?php
	
	$username = $_POST["name"];
	$pass = $_POST["pass"];
	$servername = "70.77.112.86";
	$username = "root";
	$db = "sct";

	$conn = mysqli_connect($servername, $username, $db);
	if ($conn->connect_error) {
		echo "Connection Error";
	}
	echo "Welcome to the database";
	$sql = "INSERT INTO login (username, pass) VALUES ('". $username."','". $pass ."')"


?>