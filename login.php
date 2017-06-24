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
	$num_rows = mysqli_num_rows($conn, $result);
	if($num_rows > 0) {
    	echo "Welcome, $username";
	}

	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();

?>
</body>
</html>
