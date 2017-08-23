<?php

include'db/dbQuery.php';
 
 $row = getDataByDeviceId();
    // echo "<pre>";
    //     print_r($row);
    // echo "</pre>";
    // exit;

    $name      = $row['device_name'];
    $brand     = $row['brand'];
    $quantity  = $row['quantity'];
    $type      = $row['device_type'];
    $assign    = $row['device_assign'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory System</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap.js">
    <!-- datepicker css and script -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>  <!-- datepicker css and script -->

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
            h4 {
                color: blue;
                

            }
</style>
</head>
<body>
	<div class="container">
        <div id="body">
            <div id="content">
                <div class="row">
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="container-fluid">
                            <form method="post" action="process/device.php">
                            <table class="table table-bordered">
                                <caption><b><h4>Edit Device Details:</h4></b></caption>
                                <tr>
                                    <td align="center"><a href="list-devices.php">&larr;Back</a></td>
                                    <td>Enter Device Details For Update</td>
                                </tr>

                                <tr>
                                    <td>Device Name:</td>
                                    <td><input type="text" name="device_name" value="<?php echo $name; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Brand:</td>
                                    <td><input type="text" name="brand" value="<?php echo $brand; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Quantity:</td>
                                    <td><input type="number" name="quantity" value="<?php echo $quantity; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Select Device</td>
                                    <td>
                                        <label></label>
                                        <select name="device_type">
                                            <option value = "" disabled selected="">--Select Device--</option>
                                            <option value="electronics">Electronics</option>
                                            <option value="network">Network</option>
                                            <option value="others">Others</option>
                                        </select><span class="error"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>Date: <span class="glyphicon glyphicon-calendar"></span></label>
                                     &nbsp; </td>
                                 <td>         
                                    <input type="text" name="device_assign" value="<?php echo $assign; ?>" id="datepicker" placeholder="click here" 
                                     style="padding-right: 40px">
                                 </td>
                                 </tr>
                                 <tr>
                                    <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                                    <td align="right"><button type="submit" name="btn-update"><strong>Update</strong></button></td>
                                </tr>
                            </table>
                            
                        </form>
                        
                        <?php include ('inc/footer.php');?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
   </body>
 </html>

