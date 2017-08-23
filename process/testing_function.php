

function checkAvlDeivce() {
	global $conn;
	$sql = "SELECT device_id FROM assigned_devices WHERE (emp_id = '$eid' AND device_id = '$did')";
	$query = mysqli_query($conn, $sql);
	if(mysqli_num_rows) > 0 ){
		$data = array();
		while($row = mysqli_fetch_assoc($query)){
			$data[] = $row;
		}
		return $data;
	} else {
		return false;
	}

}

$device = checkAvlDeivce();
if($device) {
	echo "Device Available";
} else {
	$assignDevice = assignDevice($eid, $devices, $assigned_date);
	if($assignDevice == true) {
		ehco "Device added Successfully";
	}
}
