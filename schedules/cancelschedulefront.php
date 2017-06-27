<html>

	<body>
        <?php
        $eid= $_GET['pid'];
        $servername = "127.0.0.1";
        $dbusername = "root";
        $db = "sct";

        $conn = new mysqli($servername, $dbusername,"", $db);
        if ($conn->connect_error) {
            echo "Connection Error";
        }


        $sql = "SELECT s.avalible_date, s.avalible_time, s.employee_id, p.name, FROM schedule AS s, patient AS p WHERE s.patient_id=p.id AND s.employee_id='$eid' ORDER BY s.avalible_date";
        $result = $conn->query($sql);

        if($result->num_rows > 0){

            echo "Your existing schedules:";
            echo '<ul style="list-style-type:none">';
            while($row = $result->fetch_assoc()){
               echo '<li>';
               echo "<a href='cancelschedule.php?eid=".$row['employee_id']."&deldate=".$row['avalible_date']."&deltime=".$row['avalible_time']."'>";
               echo "CANCEL &#9";
               echo "</a>";
               echo $row['avalible_date']." at ".$row['avalible_time']." with ".$row['name'];
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
