-- add a front for this -->
<html>

	<body>
        <?php
        $eid= $_GET['pid']
         ?>
		<form action="createschedule.php" method="post">
            Employee id: <br>
            <input type="number" name="eid"><br>
            <input type="hidden" name="eid" value="<?php echo $eid;?>" />
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
