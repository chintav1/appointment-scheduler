<html>

	<body>
        <?php
        $eid= $_GET['pid'];
        $servername = "127.0.0.1";
        $dbusername = "root";
        $db = "sct";

        $conn =mysqli_connect($servername, $dbusername,"", $db);
        if ($conn->connect_error) {
            echo "Connection Error";
        }

        $nopatient="SELECT * FROM schedule WHERE employee_id = '$eid' AND patient_id IS NULL";
        $result = mysqli_query($conn, $nopatient);
        $num_rows = mysqli_num_rows($result);
        if($num_rows > 0){
            echo "Your scheduled time with no patient:";
            echo '<ul style="list-style-type:none">';
            while($row = $result->fetch_assoc()){
               echo '<li>';
               echo "<a href='cancelschedule.php?eid=".$row['employee_id']."&deldate=".$row['avalible_date']."&deltime=".$row['avalible_time']."'>";
               echo "CANCEL &#9";
               echo "</a>";
               echo $row['avalible_date']." at ".$row['avalible_time'];
               echo '</li>';
            }
           echo '</ul>';
        }

        $sql = "SELECT s.employee_id, s.avalible_date, s.avalible_time, p.id, p.name FROM schedule AS s, patient AS p WHERE s.patient_id=p.id AND s.employee_id='$eid' ORDER BY s.avalible_date";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        if($num_rows > 0){

            echo "Your booked appointment: ";
            echo '<ul style="list-style-type:none">';
            while($row = $result->fetch_assoc()){
               echo '<li>';
               echo "<a href='cancelschedule.php?eid=".$row['employee_id']."&deldate=".$row['avalible_date']."&deltime=".$row['avalible_time']."'>";
               echo "CANCEL &#9";
               echo "</a>";
               echo $row['avalible_date']." at ".$row['avalible_time']." with ";
               echo "<a href='showmedical_history.php?eid=".$row['patient_id']."'>";
               echo $row['name'];
               echo "</a>";
               echo '</li>';
            }
           echo '</ul>';
        }
        else{
            echo "you have no schedule.";
        }


        ?>

	</body>
</html>
