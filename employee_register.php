<html>
	<body>
		<form action="employee_registration.php" method="post">				<!--Goes to employee_registrstion.php when Register is pressed-->



			Name: *<br>
			<input type="text" name="name"><br>								<!--Text field for name-->

			Email: <br>
			<input type="email" name="email"><br>							<!--Text field for email-->

			<!--Selection menu for certification-->
			Certification: * <br>										
			<select name = "Certification">
				<option value = "">Select...</option>
				<option value = "Dentist">Dentist</option>
				<option value = "Hygenist">Hygenist</option>
				<option value = "Secretary">Secretary</option>
				<option value = "Manager">Manager</option>  
			</select>	<br>

			Clinic Name: * <br>
			<input type = "text" name = "c_name"><br>					<!--Text field for clinic name-->

			Clinic Address: * <br>
			<input type = "text" name = "c_address"><br>				<!--Text field for clinic address-->

			Clinic Phone Number: *<br>
			<input type = "number" name = "c_number"><br>				<!--Phone number field-->

			Clinic Hours: * <br>
			<input type = "time" name = "c_time"><br>					
			------------------------------------------------------------<br>
			Username: * <br>
			<input type= "text" name="username"><br>

   			Password: * <br>
			<input type="password" name="pass"><br>
   			<input type="submit" value="Register">
   		</form>



	</body>
</html>