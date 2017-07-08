<?php
    require 'db/connection.php';
  
    $uid = $_GET['id'];
    // die();
    //fetch employee
   // echo $uid;
    $sql = "SELECT * FROM company_assets WHERE id = ".$uid;
      $result= mysqli_query($conn, $sql);
      $rows = mysqli_fetch_assoc($result);
        // var_dump($rows);
      
      if(isset($_POST['btn-update'])){

        $device_name = $_POST['device_name'];
        $brand = $_POST['brand'];
        $quantity = $_POST['quantity'];
        $device_type = $_POST['device_type'];
        $device_assign = $_POST['device_assign'];
        
        $deviceUpdate = "UPDATE company_assets SET id = '$uid', device_name = '$device_name', brand = '$brand', quantity = '$quantity', device_type = '$device_type', device_assign = '$device_assign' WHERE id = ". $uid;
           var_dump($deviceUpdate);
               $deviceEdit = mysqli_query($conn, $deviceUpdate);
       if($deviceEdit){
  
        header('location:list-devices.php');
       }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory System</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap.js">
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

<center>
<div id="body">
    <div id="content">
        <div class="container-fluid">
        <form method="post" action="edit-device.php?id=<?php echo $uid?>">
            <table class="table table-bordered">
                <caption><b><h4>Edit Device Details:</h4></b></caption>
                <tr>
                <td align="center"><a href="list-devices.php">&larr;Back</a></td>
                </tr>

                <tr>
           
                <td><input type="text" name="device_name" value="<?php echo $rows['device_name']; ?>"></td>
                </tr>

                <tr>
                <td><input type="text" name="brand" value="<?php echo $rows['brand']; ?>"></td>
                </tr>

                <tr>
                <td><input type="number" name="quantity" value="<?php echo $rows['quantity']; ?>"></td>
                </tr>

                <tr>
                <td><input type="text" name="device_type" value="<?php echo $rows['device_type']; ?>"></td>
                </tr>
                <tr>
                <td><input type="date" name="device_assign" value="<?php echo $rows['device_assign']; ?>">
                </tr>

                <tr>
                <td><button type="submit" name="btn-update"><strong>Update</strong></button></td>
                </tr>
            </table>
        </form>
    </div>
</div>

</center>

</body>
</html>

