<html><body>

<?php

	$username = $_POST["name"];
	$password = $_POST["pass"];
	$servername = "127.0.0.1";
	$dbusername = "root";
	$db = "sct";

	$conn = mysqli_connect($servername, $dbusername,"", $db);
	if ($conn->connect_error) {
		echo "Connection Error";
	}

	$sql = "SELECT username FROM login WHERE ((username = $username) AND (password = $password))";

	if ($conn->query($sql) === TRUE) {
    echo "Welcome," $username;
	}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();

?>
</body>
</html>
