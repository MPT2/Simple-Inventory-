<?php 
	//variables
	$fullname = $mobile = $email = $courses = $gender = "";

	//error 
	$fullnameErr = $mobileErr = $emailErr = $coursesErr = $genderErr = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//check empty field
		if(empty($_POST["fullname"])){
			$fullnameErr = "Name is required";
		} else{

			$fullname = test_input($_POST['fullname']);
			// check if name only contains letters and whitespaces

			if (!preg_match("/^[a-zA-Z ]*$/",$fullname)){
				$fullnameErr = "Only letters and white space allowed";
			}
		}

		if(empty($_POST["mobile"])){
			$mobileErr = "Mobile number is required"; 
			} else{
				$mobile = test_input($_POST['mobile']);
				if(!preg_match("/^[1-9][0-9]*$/", $mobile)){
				$mobileErr = "Only Numbers and Digits allowed";
				
			}
			}

		if(empty($_POST["email"])){
			$emailErr = "Email is required";
		} else{
			$email = test_input($_POST['email']);
			 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			$emailErr = "Invalid email format"; 
    		}
		}

	
		if(empty($_POST["courses"])){
			$coursesErr = "Select Course";
		}else{
		
			$courses = $_POST['courses'];


		}

		if(empty($_POST["gender"])){
			$genderErr = "Gender Missing";
		}else{
			$gender = $_POST['gender'];
		}
	


	} //closing of POST


	 

	function test_input($data){
	$data = trim($data); //removes extra whitespaces, newline, tab
	$data = stripcslashes($data); //removes backwardslashes (\)
	$data = htmlspecialchars($data); // converts special chars to html entities
	return $data;


	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
 	<font color="red">*required fields.</font><hr>
 	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 		
 		Fullname: <input type="text" name="fullname" value="<?php echo $fullname;?>">
 		<span class="error">* <?php echo $fullnameErr;?></span><br><br>

 		Mobile: <input type="number" name="mobile" min="0" value="<?php echo $mobile;?>">
 		<span class="error">* <?php echo $mobileErr;?></span><br><br>

 		Emial: <input type="email" name="email" value="<?php echo $email;?>">
 		<span class="error">*<?php echo $emailErr;?></span><br><br>
 		

 		Course Interested: <select name="courses" value="<?php echo $courses;?>">
 			<option value="android">Android</option>
 			<option value="ios">iOS</option>
 			<option value="web development">Web Development</option>
 			<option value="c++">C++</option>
 			<option value="php">PHP</option>
 			<option value="ruby">Ruby on Rails</option>
 			<span class="error">*<?php echo $coursesErr;?></span>
 			
 			
 		</select><br><br>
 		Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  				<span class="error">* <?php echo $genderErr;?></span>
  				<br><br>

 			<input type="submit" name="submit">
 		
 	</form>
</body>
</html>

<?php
echo $fullname;
echo "<br>";
echo $mobile;
echo "<br>";
echo $email;
echo "<br>";
echo $courses;
echo "<br>";
echo $gender;


?>