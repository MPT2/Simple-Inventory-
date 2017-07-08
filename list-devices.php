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

$sql = "SELECT * FROM company_assets";
// var_dump($sql);
$result = mysqli_query($conn, $sql);
//var_dump($result);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<?php 
   	 include('inc/head.php');
	?>



		<div class="container-fluid">
			 <table class="table table-bordered">
			 <caption><b><h4>List Device Details:</h4></b></caption>
				<thead>
				<tr bgcolor="blue" style="color: white">
					<th width="7%">S.no.</th>
					<th>Device Name</th>
					<th>Brand</th>
					<th>Quantity</th>
					<th>Device Type</th>
					<th>Assign Date</th>
					<th width="12%">Action</th>
				</tr>
				</thead>

				<tbody>
				<?php 
					$i = 1;
					foreach ($result as $deviceinfo) {
					?>
		
				<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $deviceinfo['device_name'];?></td>
				<td><?php echo $deviceinfo['brand'];?></td>
				<td><?php echo $deviceinfo['quantity'];?></td>
				<td><?php echo $deviceinfo['device_type'];?></td>
				<td><?php echo $deviceinfo['device_assign'];?></td>
				<td>
				
				<a href="edit-device.php?id=<?php echo $deviceinfo['id']; ?>" title="Edit"  class="btn btn-warning" style="border-radius: 15%;"><i class="glyphicon glyphicon-edit"></i></a>

				<a href="delete-device.php?id=<?php echo $deviceinfo['id']; ?>" onClick="return confirm('Are You Sure?')" title="Delete"  class="btn btn-danger" style="border-radius: 15%;"><i class="fa fa-w fa-pencil"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
				</tr>
					<?php
					$i++;
					}
					
					?>


				</tbody>
			</table>
				
		</div>
</body>
</html>