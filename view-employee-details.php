<?php
// $url=  $_SERVER['REQUEST_URI'];
// echo $url; ///basic_php/simple_inventory/view-employee-details.php?id=18
// exit;

      // echo "View Emp Details Page";
      // die;
   include'db/dbQuery.php';
    $row = viewEmpDeviceDetailsById();
       // echo "<pre>";
       // print_r($row);
       // echo "</pre>";
    $listDevices = listDevices();
       //  echo "<pre>";
       //  print_r($listDevices);
       //  echo "</pre>";
       //  exit;

    $allDevice = listAssignDevices();
    $rows = mysqli_num_rows($allDevice) > 0;
        // echo "<pre>";
        // print_r($listDevices);
        // echo "</pre>";
        // exit;
  //  $checkAvlDev = checkAvailableDevice();
  // $rows = mysqli_num_rows($checkAvlDev) > 0 ;
    // var_dump($rows);


?>
<!DOCTYPE html>
<html>   
<head>
	<title>Inventory System</title>
    	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
       
          <!-- datepicker css and script -->
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <script>
          $( function() {
            $( "#datepicker" ).datepicker();
          } );
          </script>  <!-- datepicker css and script -->

</head>
<body>
<div class="container">
      <?php include ('inc/head.php'); ?>
        <div class="jumbotron">
          <div class="row">
            <div class="col-lg-6">
              <h4><b>Employee Details</b></h4>
              <table width="300px">
              <tr><th>  &nbsp;ID</th>           <td>&nbsp; <?php echo $row['id'];?>          </td></tr>
              <tr><th>  &nbsp;Name</th>         <td>&nbsp; <?php echo $row['fullname'];?>    </td></tr>
              <tr><th>  &nbsp;Department</th>   <td>&nbsp; <?php echo $row['department'];?>  </td></tr>
              <tr><th>  &nbsp;Designation</th>  <td>&nbsp; <?php echo $row['designation'];?> </td></tr>
              </table> 
            </div>
            <!-- <img src="assets/images/1.jpg" class="img-thumbnail" alt="employee" style="float: left; width:200px; height: 200px;"> -->
        </div>
      </div>

      <!-- assign device to employee -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
            <form class="form-inline" method="POST" action="process/employee.php">
             <div class="form-group">
                <label>Pick Device:</label>
                  <select name="devices">
                  <option disabled selected="">--Select Device--</option>
                      <?php 
                        while ($devices = mysqli_fetch_assoc($listDevices)){
                        echo "<option value=".$devices['id'].">".$devices['device_name']."</option>";
                      }?>
                  </select> 
              </div>

              <div class="form-group">
                    <label>&nbsp;&nbsp;&nbsp;Date: <span class="glyphicon glyphicon-calendar"></span></label>
                     &nbsp; <input type="text" name="assigned_date" id="datepicker" placeholder="click here" style="padding-right: 40px">
              </div>

              <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <button type="submit" name="assign" class="btn btn-primary">Assign</button>
            </form>

          </div>
        </div>
      </div>

<!-- Employee device list -->
<div class="col-lg-12">
<h3 style="background-color: #808080; color: white; border:2px solid; border-radius: 10px; width:250px; padding: 5px 5px;  border-radius: 20px; text-align: center; text-shadow:2px 2px 4px #000; ">Employee Devices </h3>
<table class="table table-striped">
 <thead>
   <tr bgcolor="blue" style="color: white">
       <th width="10%">Device Count</th>
       <th>Name</th>
       <th>Brand</th>
       <th>Device Type</th>
       <th>Assign Date</th>
       <th width="10%">Action</th>
   </tr>
 </thead>
   <tbody>

          <?php 
              // while ($device = mysqli_fetch_assoc($employeedeviceList))
              if($rows){
                $i = 1;
                foreach ($allDevice as $device) {
                  ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $device['device_name']; ?></td>
                        <td><?php echo $device['brand'];?></td>
                        <td><?php echo $device['device_type']; ?></td>
                        <td><?php echo $device['assigned_date']; ?></td>
                        <td align="center">

                        <a href="process/employee.php?deldeviceid=<?php echo $device['id']; ?> && edid=<?php echo $device['emp_id'];?>" onClick="return confirm('Are You Sure?')"
                        title="Delete" class="btn btn-danger" style="border-radius: 15%;">
                        <i class="glyphicon glyphicon-remove-sign"></i></a>
                        </td>
                    </tr>
                     <?php
                    $i++;
                  } 
                 } else 
                 { ?>
                      <tr>
                          <td colspan="6" align="center">Sorry! No Device Found.</td>
                      </tr>
                     <?php
                  } 
                ?>
   
   </tbody>
</table>
<?php include ('inc/footer.php');?>
</div>
</div>
</body>
</html>