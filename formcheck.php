<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<body>
		<font color="red">* required fields.</font>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label>First Name:</label>
			<input type="text" name="fname" size="20" maxlength="10" autocomplete="off"><br><br>
			<label>Last Name:</label><input type="text" name="lname"><br><br>
			<label>Password:</label><input type="password" name="password"><br><br>
			
			<!--Radio buttons-->
			<label>Gender:</label><br>
			<input type="radio" name="gender" value="male" checked>Male:<br>
			<input type="radio" name="gender" value="female">Female:<br>
			<input type="radio" name="gender" value="other">Other:<br><br>


			<!--Checkboxes buttons-->
			<label>My Hobbies</label><br>
			<input type="checkbox" name='hobbies[]' value="Sports">Sports<br>
			<input type="checkbox" name='hobbies[]' value="Singing">Singing<br><br>
			<input type="checkbox" name='hobbies[]' value="Dancing">Dancing<br><br>
			<input type="checkbox" name='hobbies[]' value="travelling">Travelling<br><br>
			

			<!--Select Options buttons-->
			<select name="countries">
				<option value="nepal">Nepal</option>
				<option value="china">China</option>
				<option value="india">India</option>
				<option value="korea" selected>Korea</option>
			</select>

			<br><br>
			<input type="range" name="points" min="0" max="10">
			<input type="text" name="animals" value="Elephant" readonly>

			<input type="text" name="animals" value="Elephant" disabled>

			<textarea rows="5" cols="12" name="message">enter message here..</textarea><br>
			<input type="submit" name="submit"> <br>
			<input type="reset" value="Clear">

		</form>
</body>
</html>