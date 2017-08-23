	<?php
	include('connection.php');

		// --------------------------------------Device block queries--------------------------------------
	function getAllDevices() {
		global $conn;
		$sql = "SELECT * FROM company_assets ORDER BY id DESC";
		$query = mysqli_query($conn, $sql);
		
		// $mysqli->query($query);

		if(mysqli_num_rows($query) > 0) {
			$data = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$data [] = $row;
			}
			return $data;
		} else { 
			return false;
		}
	}

	function addDevice($device_name, $brand, $quantity, $device_type, $device_assign) { 
		global $conn;
		$sql = "INSERT INTO company_assets(device_name,brand,quantity,device_type,device_assign) 
		VALUES('$device_name','$brand','$quantity','$device_type','$device_assign')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<strong>Device Added Successfully</strong>";
			header("Refresh: 1, url= '../add-devices.php'");
		} else {
			echo "There was problem while adding device.";
		}
	}	

	

	function deleteDevice() {
		global $conn;
		$did = $_GET['id'];
		$sql = "DELETE FROM company_assets WHERE id =" .$did;
		if (mysqli_query($conn, $sql)) {
			echo "<strong>Device Deleted Successfully</strong>";
			header("Refresh: 1, url = '../list-devices.php");
		} else {
			echo "There was problem while Deleting.";
		}
	}	

	function getDataByDeviceId() {
		global $conn;
		$did = $_GET['id'];
		$sql = "SELECT * FROM company_assets WHERE id = ".$did;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function editDevice($name, $brand, $quantity, $type, $assign) {
		global $conn;
		$did = $_POST['id'];
		$sql = "UPDATE company_assets SET device_name = '$name', brand = '$brand', quantity = '$quantity', device_type = '$type', device_assign = '$assign' WHERE id = ".$did;
		if (mysqli_query($conn, $sql)){
			echo "<strong>Device Updated Successfully</strong>";
			header("Refresh: 1, url = '../list-devices.php");
		} else {
			echo "<strong>Problem occurs: Unable to Update?</strong>";
		}
	}

	 	// --------------------------------------Employee block queries--------------------------------------

	function getAllEmployee() {
		global $conn;
		$sql = "SELECT * FROM employee ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);
		// $con->query($sql);
		if(mysqli_num_rows($result) <= 0) {
			return false;
		} else {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			return $data;
		}
	}

	function addEmployee($fullname, $email, $designation, $department ) {
		global $conn;

		$email = $_POST['email'];
		$sql = "SELECT email FROM employee WHERE email = '$email'";
		
		$query = mysqli_query($conn, $sql);

		if(mysqli_num_rows($query) > 0) {
			return true;
		}
		 else {
			$sql = "INSERT INTO employee(fullname, email, designation, department) VALUES ('$fullname', '$email', '$designation', '$department')";
			$row = mysqli_query($conn, $sql);
		}
	}

	function deleteEmployee() {
		global $conn;
		$did = $_GET['id'];
		$sql = "DELETE FROM employee WHERE id =".$did;
		if (mysqli_query($conn, $sql)) {
			echo "<strong>Employee Deleted Successfully</strong>";
			header("Refresh: 1, url = '../index.php");
		} else {
			echo "There was problem while Deleting.";
		}
	}

	function getDataByEmpId(){
		global $conn;
		$eid = $_GET['id'];
	 		// echo $uid; fetch user id
	 		// exit;
		$sql = "SELECT * FROM employee WHERE id = ".$eid;
	 		// echo $sql;
		$result= mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}


	function checkAvlEmail($fullname, $email, $designation, $department) {

		global $conn;
		$id = $_POST['id'];
		$email = $_POST['email'];
		$sql = "SELECT email FROM employee WHERE id =".$id;
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query);
			if($email == $row['email']) {
				return true;

			} 

	}

	function editEmployee($fullname, $email, $designation, $department) {
		global $conn;
		$id = $_POST['id'];
		$sql = "UPDATE employee SET fullname = '$fullname', email = '$email', designation = '$designation', department = '$department' WHERE id = ". $id ;
		// echo $sql;
		// die;
		$query = mysqli_query($conn, $sql);
		return true;
	}



	function viewEmpDeviceDetailsById() {
	 	global $conn;
	 	$id     = $_GET['id'];
	 	$sql    = "SELECT * FROM employee WHERE id = ".$id;
	 	$result = mysqli_query($conn, $sql);
	 	$row    = mysqli_fetch_assoc($result);
	 	return $row;
	}

	function listDevices() {
	 	global $conn;
	 	$sql = "SELECT * FROM company_assets";
	 	$deviceslist = mysqli_query($conn, $sql);
	 	return $deviceslist;
	}

	function assignDevice($eid, $devices, $assigned_date) {
	 	global $conn;
	 	$eid = $_POST['id'];
	 	$did = $_POST['devices'];
	 	$sql = "SELECT device_id FROM assigned_devices WHERE (emp_id = '$eid' AND device_id = '$did')";
	 	$query = mysqli_query($conn, $sql);
	 	$row = mysqli_fetch_assoc($query);

	 	if($row) {
	 		return true;
	 	} else {
	 		$insertquery= "INSERT INTO assigned_devices(emp_id,device_id,assigned_date)
	 		VALUES ('$eid','$devices','$assigned_date')";
	 		$result = mysqli_query($conn, $insertquery);    
	 	}
	}

	function listAssignDevices(){
	 	global $conn;
	 	$id = $_GET['id'];
	 	$sql = "SELECT assigned_devices.*, company_assets.device_name, company_assets.brand, company_assets.device_type FROM assigned_devices inner join company_assets on assigned_devices.device_id = company_assets.id where emp_id =". $id;
	 	$rows = mysqli_query($conn, $sql);
	 	return $rows;
	}

	function deleteAssignDevice() {
	 	global $conn;
	 	$empId = $_GET['edid'];
	 	$delId = $_GET['deldeviceid'];
	 	$sql = "DELETE FROM assigned_devices WHERE id ='$delId' AND emp_id ='$empId'";
	 	if(mysqli_query($conn, $sql)){
	 		echo "<strong>Device Removed Successfully!!</strong>";
	 		header("refresh: 1; url=../view-employee-details.php?id=".$empId);
	 	} else {
	 		echo "<strong>Problem in Removing Employee Devie</strong>";
	 	}
	}
?>