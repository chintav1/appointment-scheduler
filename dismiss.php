<html><body>

<?php

	$id = $_GET["id"];
	$servername = "127.0.0.1";
	$dbusername = "root";
	$db = "sct";

	$conn = mysqli_connect($servername, $dbusername,"", $db);
	if ($conn->connect_error) {
		echo "Connection Error";
	}

	$sql = "DELETE FROM notification WHERE id= '$id'";

    mysqli_query($conn, $sql);


    die();
    header('Location: ' . $_SERVER['HTTP_REFERER']);


?>



</body>
</html>
