<!--  add a front for this -->
<html>

	<body>
        <?php
        $eid= $_GET['pid']
        echo "your Employee id is: '$eid'";
         ?>
		<form action="createschedule.php" method="post">
            Create new schedules:
            <input type="hidden" name="eid" value="<?php echo $eid;?>"/><br>
			Date:<br>
			<input type="date" name="date"><br>

			start time:<br>
			<input type="time" name="starttime"><br>

			end time: <br>
			<input type="time" name="endtime"><br>

   			<input type="submit" value="Add">
   		</form>
	</body>
</html>
