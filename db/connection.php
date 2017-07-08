<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";


$conn = mysqli_connect($servername, $username, $password, $dbname);
//print_r($conn);die;
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}


?>