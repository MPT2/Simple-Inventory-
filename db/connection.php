<?php
		$host = "127.0.0.1";
		$user = "root";
		$pass = "";
		$db   = "inventory";
		
		$conn = mysqli_connect($host, $user, $pass);
		
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		@mysqli_select_db($conn, $db) or die("Unable to select db! Un-matched Database");	
?>