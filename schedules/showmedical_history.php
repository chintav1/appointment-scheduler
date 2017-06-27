<html>

	<body>
        <?php
        $pid= $_GET['pid'];
        $servername = "127.0.0.1";
        $dbusername = "root";
        $db = "sct";

        $conn =mysqli_connect($servername, $dbusername,"", $db);
        if ($conn->connect_error) {
            echo "Connection Error";
        }

        $sql = "SELECT * FROM medical_history WHERE patient_id='$pid'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        if($num_rows > 0){

            echo "history of patient id '$pid' ";
            $row = $result->fetch_assoc();
            echo "allergies: ".$row['allergies'];
            echo '<br>';
            echo "notes: ".$row['note'];

        }
        else{
            echo "this patient have no medical history";
        }




        ?>
        <button onclick="history.go(-1);">Back </button>
	</body>
</html>
