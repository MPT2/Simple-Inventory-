<?php

	session_start();
	include('../db/dbQuery.php');
    $device_name = $brand = $quantity = $device_type = $device_assign = "";
	$error = "";
	
if(isset($_POST['btn-update'])){
	$id = $_POST['id'];
	// echo $did;
	// exit;
    $name 		= $_POST['device_name'];
    $brand 		= $_POST['brand'];
    $quantity 	= $_POST['quantity'];
    $type 		= isset($_POST['device_type']) ? $_POST['device_type'] : '';
    $assign 	= $_POST['device_assign'];

	if(empty($name) || empty($brand) || empty($quantity) || empty($type) || empty($assign)){
	   echo "<strong>Fields Cannot be empty?</strong>";
	 	} else {
	        $updateData = editDevice($name, $brand, $quantity, $type, $assign); 
	         
	            echo "<strong>Device Updated Successfully </strong>";
	         } 

}


if(isset($_POST['btn-save'])){
	    $device_name   = $_POST['device_name'];
	    $brand         = $_POST['brand'];
	    $quantity      = $_POST['quantity'];
	  	$device_type   = $_POST['device_type'];
	    $device_assign = $_POST['device_assign'];

	    if(empty($device_name) || empty($brand) || empty($quantity) || empty($device_assign)) {
	        $_SESSION['error'] = "<strong>Fields can not be empty</strong>";
	          header("location: ../add-devices.php");
                   $error = 1; 
	      
  
	        if(empty($device_name)){
	           $_SESSION['device_name'] = "Device name is required";
	            $error = 1;
	        }

	        if(empty($brand)){
	            $_SESSION['brand'] = "Brand name is required";
	            $error = 1;
	        }

	        if(empty($quantity)){
	            $_SESSION['quantity'] = "Quantity is required";
	            $error = 1;
	        }

	    } elseif ($error != 1) {     
			   $insertData = addDevice($device_name, $brand, $quantity, $device_type, $device_assign); 
			   return $insertData;
			} else {
				
				echo "Problem: Unable to Add Device";
			  }
}

	$result = deleteDevice();

?>