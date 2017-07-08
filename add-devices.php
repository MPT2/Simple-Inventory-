<?php
    $host     = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "inventory";
    // var_dump($dbname); // inventory

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if(!$conn){
        die("Connectin Failed:" . mysqli_connect_error());
    }

    $device_name = $brand = $quantity = $device_type = $device_assign = '';
    $device_nameErr = $brandErr = $quantityErr = $device_typeErr = $device_assignErr = '';
    $error = "";

    if(isset($_POST['btn-save'])){
    // variables for input data
    $device_name   = $_POST['device_name'];
    $brand         = $_POST['brand'];
    $quantity      = $_POST['quantity'];
    $device_type   = $_POST['device_type'];
    echo $device_type;
    die();
    $device_assign = $_POST['device_assign'];

    if(empty($device_name) || empty($brand) || empty($quantity) || empty($device_type) || empty($device_assign)){
        $error = "Fields can not be empty";
            
            if(empty($device_name)){
                $device_nameErr = "Device name is required";
                $error = 1;
            }

            if(empty($brand)){
                $brandErr = "Brand name is required";
                $error = 1;
            }

            if(empty($quantity)){
                $quantityErr = "Quantity is required";
                $error = 1;
            }

            // if(empty($device_type)){
            //     $device_typeErr = "required";
            //     $error = 1;
            // }

    } else {
             
                 if(!preg_match("/^[a-zA-Z ]*$/",$device_name)) {
                    $device_nameErr = "only letters and white space allowed";
                    $error = 1;
                } else {
                    $device_name = trim($device_name);
                }
            }
             if($error != 1){
                 $sql = "INSERT INTO company_assets(device_name,brand,quantity,device_type,device_assign) 
                 VALUES('$device_name','$brand','$quantity','$device_type','$device_assign')";

                 if (mysqli_query($conn, $sql)) {
                    $success = "Device added Successfully";
                 }else {
                    $adderr ="There was problem while adding.";
                 }
        }

    
}
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
        h4{
            color: blue;
        }

        .error{
            color: red;
        }
	</style>
</head>
<body>
	<div class="container">

        <center>
            <div id="body">
             <div id="content">
           
         <div class="container-fluid">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                 <table class="table table-bordered">
                    <caption><b><h4>Add New Device Details:</h4></b></caption>
                    <?php 
                        if(isset($success)){
                        	echo $success;
                        	if (isset($adderr)) {
                        		echo $adderr;
                        	}
                        }
                    ?>
                        <tr>
                            <td align="center"><a href="index.php">&larr;Back</a></td>
                        </tr>

                        <tr>
                            <td>Device Name* <input type="text" name="device_name" 
                            value="<?php echo $device_name;?>" />
                            <span class="error"><?php echo $device_nameErr;?></span></td>
                        </tr>

                        <tr>
                            <td>Brand*<input type="text" name="brand" 
                            value="<?php echo $brand;?>" /> 
                            <span class="error"><?php echo $brandErr;?></span></td>
                        </tr>

                        <tr>
                            <td>Quantity*<input type="number" name="quantity" min="1" 
                            value="<?php echo $quantity; ?>" />
                            <span class="error"><?php echo $quantityErr;?></span
                            </td>
                        </tr>

                        <tr>
                            <td>Device Type*
                            <select name="device_type">
                              <option value="" disabled="disabled">--Select Device--</option> 
                                <option value="electronics">Electronics</option>
                                <option value="network">Network</option>
                                <option value="others">Others</option>
                            </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><input type="date" name="device_assign" /></td>
                        </tr>

                        <tr>
                            <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
            </div>
        </center>
    </body>
</html>