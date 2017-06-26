<html>
	<body>
		<form action="patient_registration.php" method="post">

			Name:<br>
			<input type="text" name="name"><br>

			Address:<br>
			<input type="text" name="address"><br>

			Email: <br>
			<input type="email" name="email"><br>

			Certification: <br>
			<select name = "Certification">
				<option value = "">Select...</option>
				<option value = "Dentist">Dentist</option>
				<option value="Hygenist">Hygenist</option>
			</select>	<br>
			------------------------------------------------------------<br>
			Username: <br>
			<input type= "text" name="username"><br>

   			Password: <br>
			<input type="password" name="pass"><br>
   			<input type="submit" value="Register">
   		</form>



	</body>
</html>