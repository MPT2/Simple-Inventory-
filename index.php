<?php
// error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//print_r($conn);die;
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM employee";
// var_dump($sql);
$result = mysqli_query($conn, $sql);
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
			 	<caption><b><h4>List Employee Details:</h4></b></caption>
				<thead>
					<tr bgcolor="blue">
						<th width="7%" style="color: white">Emp. No</th>
						<th style="color: white">Full name</th>
						<th style="color: white">Designation</th>
						<th style="color: white">Department</th>
						<th style="color: white">Email</th>
						
						<th width="15%" style="color: white">Action</th>
					</tr>
				</thead>

				<tbody>
				 <?php 
					$i = 1;
              		// while ($listemployee = mysqli_fetch_assoc($result))
					foreach ($result as $listemployee) {
					?>
					 <tr>
		                <td><?php echo $i;?></td>
		                <td><?php echo $listemployee['fullname']; ?></td>
		                <td><?php echo $listemployee['designation']; ?></td>
		                <td><?php echo $listemployee['department']; ?></td>
		                <td><?php echo $listemployee['email']; ?></td>
		                <td>
		                <a href="view-employee-details.php?id=<?php echo $listemployee['id']; ?>" title="View" class="btn btn-primary" style="border-radius: 15%;"><i class="fa fa-w fa-pencil"><i class="glyphicon glyphicon-eye-open"></i></a>

						<a href="edit-employee-details.php?id=<?php echo $listemployee['id']; ?>" title="Edit" class="btn btn-warning" style="border-radius: 15%;"><i class="fa fa-w fa-pencil"><i class="glyphicon glyphicon-edit"></i></a>

						<a href="delete-employee.php?id=<?php echo $listemployee['id']; ?>" onClick="return confirm('Are You Sure?')" title="Delete" class="btn btn-danger" style="border-radius: 15%;"><i class="glyphicon glyphicon-trash"></i></a>
						</td>   
					</tr>
		       		 <?php
		       		  	$i++;
		            } ?> 
		           		  
				</tbody>
			</table>
				
		</div>
</body>
</html>