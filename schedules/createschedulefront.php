<!--  add a front for this -->
<html>

	<body>
        <?php
        $eid= $_GET['pid'];
		

        ?>
		<form action="createschedule.php" method="post">
            Create new schedules:
            <input type="hidden" name="eid" value="<?php echo $eid;?>"/><br>
			Date:<br>
			<input type="date" name="date" ><br>

		    times:<br>
             <input type="checkbox" name="10" value="10"> 10:00 AM<br>
             <input type="checkbox" name="11" value="11"> 11:00 AM<br>
             <input type="checkbox" name="12" value="12"> 12:00 PM<br>
             <input type="checkbox" name="13" value="13"> 1:00 PM<br>
             <input type="checkbox" name="14" value="14e"> 2:00 PM<br>
             <input type="checkbox" name="15" value="15"> 3:00 PM<br>
             <input type="checkbox" name="16" value="16"> 4:00 PM<br>
             <input type="checkbox" name="17" value="17"> 5:00 PM<br>


   			<input type="submit" value="Add">
   		</form>
	</body>
</html>
