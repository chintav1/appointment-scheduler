<html>

	<body>
        <?php
        $eid= $_GET['pid'];

        ?>
		<form action="cancelschedule.php" method="post">
            Your existing schedules:
            <input type="hidden" name="eid" value="<?php echo $eid;?>"/><br>
            <?php
            $sql = "SELECT s.avalible_date, s.avalible_time, s.patient_id, p.name, FROM schedule AS s, patient AS p WHERE s.patient_id=p.id AND s.employee_id='$eid' ORDER BY s.avalible_date";
            $result = $conn->query($sql);
            echo '<ul style="list-style-type:none">';
            if($result->num_rows > 0){
               while($row = $result->fetch_assoc()){
                   echo '<li>';
                   echo "<a href='cancelschedule.php?eid=".$row['id']."&deldate=".$row['avalible_date']."&deltime=".$row['avalible_time']."'>";
                   echo "CANCEL &#9";
                   echo "</a>";
                   echo $row['avalible_date']." at ".$row['avalible_time']." with ".$row['name'];
                   echo '</li>';
               }
            }
            echo '</ul>';


   			<input type="submit" value="Add">
   		</form>
	</body>
</html>
