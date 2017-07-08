<?php
    include('db/connection.php');
      $uid    = $_GET['id'];
      $sql    = "SELECT * FROM employee WHERE id = ".$uid;
      // echo $sql;
      $result = mysqli_query($conn, $sql);
      $rows   = mysqli_fetch_assoc($result);
      // var_dump($rows);
      $errormsg = "";
      $alldevices = "SELECT * FROM company_assets";
      $deviceslist = mysqli_query($conn, $alldevices);
      // var_dump($_POST);
  if(isset($_POST['assign'])){
          $devices       = $_POST['devices']; //device id
          $assigned_date = $_POST['assigned_date'];
          
            $device = "SELECT device_id FROM assigned_devices WHERE (emp_id = '$uid' AND device_id = '$devices')";
            // echo $device;
            $query = mysqli_query($conn, $device);
            // var_dump(mysqli_num_rows($query) > 0);
              if(mysqli_num_rows($query) > 0){
                    $errormsg = "Device already assigned";

              } else {

                    $insertsql= "INSERT INTO assigned_devices(emp_id,device_id,assigned_date)
                    VALUES ('$uid','$devices','$assigned_date')";
                    //var_dump($insertsql);
                    if (mysqli_query($conn, $insertsql)) {
                    $msg = "Device Added successfully";
                    } else {
                    $adderr = "Problem in Assigning Device?";
                    }
                }
    }
              $result = "SELECT assigned_devices.*, company_assets.device_name, company_assets.device_type FROM assigned_devices inner join company_assets on assigned_devices.device_id = company_assets.id where emp_id =". $uid;
                // var_dump($sqlEmployeedevice);
                $employeedeviceList = mysqli_query($conn, $result);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>   
<head>
	<title>Inventory System</title>
    	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
      <style type="text/css">
      		/* Add a black background color to the top navigation */
          .topnav {
              background-color: #333;
              overflow: hidden;
          }

          /* Style the links inside the navigation bar */
          .topnav a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
          }

          /* Change the color of links on hover */
          .topnav a:hover {
              background-color: #ddd;
              color: black;
          }

          /* Add a color to the active/current link */
          .topnav a.active {
              background-color: #4CAF50;
              color: white;
          }
          h2 {
              color: white;
              text-shadow: 2px 2px 4px #000;

          }
    	</style>
</head>
<body>
	<div class="container">
	<h2 align="center">View Employee Details</h2>
	<!--top menu-->
	<div class="topnav" id="myTopnav">
		  <a href="index.php" class="active">Home</a> 
      <a href="about.php">About</a> 
			<a href="add-employee.php">Add Employee</a> 
			<a href="add-devices.php">Add Devices</a>	
			<a href="list-devices.php">List Devices</a>

	</div><br>
     <?php if(isset($msg)){
        echo $msg;
            if (isset($adderr)) {
              echo $adderr;
          }
    } else {
          echo $errormsg;
    }
    ?>

  <div class="jumbotron">
    <div class="row">
      <div class="col-lg-5">
        <h3><b><u>Employee Details</u></b></h3>
         <font size="4">
            Employee ID:&nbsp;<?php echo $rows['id'];?><br>
            Name:&nbsp;<?php echo $rows['fullname'];?><br>
            Department:&nbsp;<?php echo $rows['department'];?><br>
            Designation:&nbsp;<?php echo $rows['designation'];?><br>
          </font>

      </div>
      <img src="assets/images/1.jpg" class="img-thumbnail" alt="employee" width="200px" height="100px" style="float: left; padding-left: : 20%">
  </div>
</div>

<!-- assign device to employee -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" method="POST" action="view-employee-details.php?id=<?php echo $uid?>">

        <div class="form-group">
          <label class="col-sm-2 control-label">Select Device:  </label>
           <div class="col-sm-6">
            <select name="devices">
             <?php 
                while ($listdevices = mysqli_fetch_assoc($deviceslist)){
                      // var_dump($listdevices['device_name']);
                    

                      echo "<option value=".$listdevices['id'].">".$listdevices['device_name']."</option>";
              }?>
           </select>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Select Date:</label>
            <div class="col-sm-6">
              <input type="date" name="assigned_date" class="form-control"/>
            </div>
        </div>
   
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6"> 
            <button type="submit" name="assign" class="btn btn-primary">Assign</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Employee device list -->
<div class="col-lg-12">
<h3><b><u>List Devices</u></b></h3>
<table class="table table-striped">
 <thead>
   <tr bgcolor="blue" style="color: white">
       <th>ID</th>
       <th>Name</th>
       <th>Device Type</th>
       <th>Assign Date</th>
       <th width="10%">Action</th>
   </tr>
 </thead>
   <tbody>
   
          <?php 
              // while ($device = mysqli_fetch_assoc($employeedeviceList))
                foreach ($employeedeviceList as $device) {
                  ?>
                    <tr>
                        <td><?php echo $device['id'];?></td>
                        <td><?php echo $device['device_name']; ?></td>
                        <td><?php echo $device['device_type']; ?></td>
                        <td><?php echo $device['assigned_date']; ?></td>
                        <td align="center">
                        <a href="delete-assign-device.php?deldeviceid=<?php echo $device['id']; ?> && edid=<?php echo $device['emp_id'];?>" 
                        title="Delete" class="btn btn-danger" style="border-radius: 15%;"><i class="fa fa-w fa-pencil"><i class="glyphicon glyphicon-remove-sign"></i></a
                        </td>
                    </tr>
                <?php
                }
             ?>   
   
   </tbody>
</table>
</div>
</div>
</body>
</html>