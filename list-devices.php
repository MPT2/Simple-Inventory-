<?php
	include('db/dbQuery.php');

	//getAllDevices function list all devices 
	
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
				$devices = getAllDevices();
				// var_dump($devices);
				// exit;
				if($devices) {
					$i = 1;
					foreach ($devices as $key => $deviceinfo) { ?>
					<tr>	
					<td><?php echo $i;?></td>
					<td><?php echo $deviceinfo['device_name'];?></td>
					<td><?php echo $deviceinfo['brand'];?></td>
					<td><?php echo $deviceinfo['quantity'];?></td>
					<td><?php echo $deviceinfo['device_type'];?></td>
					<td><?php echo $deviceinfo['device_assign'];?></td>
					<td>
					<a href="edit-device.php?id=<?php echo $deviceinfo['id']; ?>" title="Edit"  class="btn btn-warning" style="border-radius: 15%;"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="process/device.php?id=<?php echo $deviceinfo['id']; ?>" onClick="return confirm('Are You Sure?')" title="Delete"  class="btn btn-danger" style="border-radius: 15%;"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
					<?php 
						$i++;

						} 
						
						} else { ?>
							<tr>
							<td colspan="7"> Sorry! No Device Found</td>
							</tr>

						<?php } ?>
				</tbody>
			</table>
				<?php include ('inc/footer.php');?>
		</div>
</body>
</html>