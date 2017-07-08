<?php
    // require 'db/connection.php';
    $host     = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "inventory";

    $conn = mysqli_connect($host, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed :" . mysqli_connect_error());
        }

    $uid = $_GET['id'];
    // die();
    //fetch employee
   // echo $uid;
    
    $sql = "SELECT * FROM employee WHERE id = ".$uid;
      $result= mysqli_query($conn, $sql);
      $rows = mysqli_fetch_assoc($result);
          // var_dump($rows);
          //form variables
    $fullname = $email = $designation = $department = "";
    //error variables
    $fullnameErr = $emailErr = $designationErr = $departmentErr = "";

// var_dump($_POST);
if(isset($_POST['btn-update'])) {

        $fullname    = $_POST['fullname'];
        $email       = $_POST['email'];
        $designation = $_POST['designation'];
        $department  = $_POST['department'];
      
      if(empty($fullname)){
            $fullnameErr = "Fullname is required";
        }elseif(!preg_match("/^[a-zA-Z ]*$/",$fullname)){
            $fullnameErr = "only letters and white space allowed";
        }else{
            $fullname = trim($_POST['fullname']);
        }

        if(empty($_POST['email'])){
            $emailErr = "Email is required";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $emailErr = "Invalid email format"; 
    
        }else{
            $email = trim($_POST['email']);
        }

        if(empty($_POST['designation'])){
            $designationErr = "Designation is required";
        }
   

        if(empty($_POST['department'])){
            $departmentErr = "Department is required";
        }

        else{
                  
                 $sql = "UPDATE employee SET id = '$uid', fullname = '$fullname', email = '$email', designation = '$designation', department = '$department' WHERE id = ". $uid ;
                    // var_dump($employeeUpdate);
                     if (mysqli_query($conn, $sql)){
                $success = "Employee Updated Successfully";
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
        h2 {
            color: white;
            text-shadow: 2px 2px 4px #000;

        }
	</style>
</head>
<body>
	<div class="container">
            	<h2 align="center">Update Employee Details</h2>
            	<!--top menu-->
            	<div class="topnav" id="myTopnav">
            			<a href="index.php" class="active">Home</a> 
            			<a href="about.php">About</a> 
            			<a href="add-employee.php">Add Employee</a> 
            			<a href="add-devices.php">Add Devices</a>	
            			<a href="list-devices.php">List Devices</a>
            	</div><br>
            	<div class="clearfix"></div>

<center>
<div id="body">
    <div id="content">
        <form method="post" action="edit-employee-details.php?id=<?php echo $uid?>">
            <table align="center">

                <?php 
                    if(isset($success)){
                        echo $success;
                    }
                    if (isset($error)){
                        echo $error;
                    }
                ?>

                    <tr>
                        <td align="center"><a href="index.php">Back</a></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="fullname" value="<?php echo $rows['fullname']; ?>"></td>
                    </tr>

                    <tr>
                        <td><input type="email" name="email" value="<?php echo $rows['email']; ?>"></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="designation" value="<?php echo $rows['designation']; ?>"></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="department" value="<?php echo $rows['department']; ?>"></td>
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