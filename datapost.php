<?php

if(isset($_POST['submit'])){
	$first_name = $_POST['fname'];
	echo "Your Name is: ".$first_name;
	$message = $_POST['message'];

	$my_hobbies = $_POST['hobbies'];

	
	print_r($my_hobbies);
	$gender = $_POST['gender'];
	$country = $_POST['countries'];
	echo "You Belong to  ".$country;

	$points = $_POST['points'];
	echo $points;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form data </title>
</head>
<body>
		<h3>Data fetch from form fields</h3>
</body>
</html>