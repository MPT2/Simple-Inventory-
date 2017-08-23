<?php
	include'db/dbQuery.php';
	include'inc/debugger.php';
?>

<!DOCTYPE html>
<html>
<head>
	<?php 
   	 include('inc/head.php');
	?>
	<div class="container-fluid">
			 <table class="table table-bordered">
			 	<caption><b><h4><i class="glyphicons glyphicons-user"></i>List Employee Details:</h4></b></caption>
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
				 	$employee = getAllEmployee();
				 	// debugger($employee, true);
				 	// die;
				 	if($employee){
						$i = 1;
						foreach ($employee as $key => $listemployee) { ?>
							<tr>
				                <td><?php echo $i;?></td>
				                <td><?php echo $listemployee['fullname']; ?></td>
				                <td><?php echo $listemployee['designation']; ?></td>
				                <td><?php echo $listemployee['department']; ?></td>
				                <td><?php echo $listemployee['email']; ?></td>
				                <td>
				                <a href="view-employee-details.php?id=<?php echo $listemployee['id']; ?>" title="view" class="btn btn-primary" style="border-radius: 15%;"><i class="glyphicon glyphicon-eye-open"></i></a>

								<a href="edit-employee.php?id=<?php echo $listemployee['id']; ?>" title="edit" class="btn btn-warning" style="border-radius: 15%;"><i class="glyphicon glyphicon-edit"></i></a>

								<a href="process/employee.php?id=<?php echo $listemployee['id']; ?>" onClick="return confirm('Are You Sure?')" title="delete" class="btn btn-danger" style="border-radius: 15%;"><i class="glyphicon glyphicon-trash"></i></a>

								</td>   

							</tr>
						     <?php
			                   	$i++;
			                   } 
			                 } else { ?>
		                        <tr>
		                      		<td colspan="6">Sorry! No Employee Found.</td>
								</tr>
			                    <?php } ?>
				</tbody>
			</table>
			<?php include ('inc/footer.php');?>	
		</div>
</body>
</html>