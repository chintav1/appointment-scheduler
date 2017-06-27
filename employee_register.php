<html>
	<body>
		<form action="employee_registration.php" method="post">

			Name:  (*)<br>
			<input type="text" name="name"><br>

			Email: <br>
			<input type="email" name="email"><br>

			Certification:  (*) <br>
			<select name = "Certification">
				<option value = "">Select...</option>
				<option value = "Dentist">Dentist</option>
				<option value = "Hygenist">Hygenist</option>
				<option value = "Secretary">Secretary</option>  
			</select>	<br>

			Clinic Name: * <br>
			<input type = "text" name = "c_name"><br>

			Clinic Address: * <br>
			<input type = "text" name = "c_address"><br>

			Clinic Phone Number: *<br>
			<input type = "number" name = "c_number"><br>

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