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

    echo "Welcome, $username, your Patient ID is $pid"."<br/>";
    echo '<a href="schedules/timetable.php?pid='.$pid.'&date='.$date.'">Schedule</a>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="profile.php?pid='.$pid.'">Profile</a>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="record.php?pid='.$pid.'">Medical Record</a>';
    echo "<br><br><br>";

    //Nodifacation
    $sql = "SELECT * FROM notification WHERE login_user = '$username'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0){
        echo '<font face="verdana" color="blue">Notification:</font><br>';
        while ($row =$result -> fetch_assoc()){
            echo '<a href="dismiss.php?id='.$row['id'].'">DISMISS</a>';
            echo '&nbsp;'.$row['message'];
        }
    }
    die();


?>



</body>
</html>
