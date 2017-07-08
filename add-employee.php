<?php
    $host     = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "inventory";

    // Database Connection
    $conn = mysqli_connect($host, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    $fullname = $email = $designation = $department = "";
    $fullnameErr = $emailErr = $designationErr = $departmentErr = "";
    $error = "";

    if (isset($_POST['submit'])) {
     $fullname    = $_POST["fullname"];
     $email       = $_POST["email"];
     $designation = $_POST["designation"];
     $department  = $_POST["department"];

        if (empty($fullname) || empty($email) || empty($designation) || empty($department)) {
                $error = "Fields Can not be empty!";
      
                if (empty($fullname)) {
                    $fullnameErr = "Fullname is required";
                    $error = 1;
                } 

                if (empty($email)) {
                    $emailErr = "Email is required";
                    $error = 1;
                }

                if (empty($designation)) {
                    $designationErr = "Designation is required";
                    $error = 1;
                }
               
                if (empty($department)) {
                    $departmentErr = "Department is required";
                    $error = 1;                
                }

        } else {
                if(!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
                    $fullnameErr = "only letters and white space allowed";
                    $error = 1;
                } else {
                    $fullname = trim($fullname);
                }

                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                     $sql = "SELECT email from employee WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                               $emailErr = "Email already exist!"; 
                               $error = 1;   
                            } else {
                                $email = trim($email);
                            }
                        
                        } else {
                        $emailErr = "Invalid email format";
                         $error = 1;
                    }
                }
                    if($error != 1) {
                        $sql = "INSERT INTO employee(fullname,email,designation,department) 
                                VALUES('$fullname','$email','$designation', '$department')";     
                                
                            if (mysqli_query($conn, $sql)) {
                                    $success = "Employee added Successfully";
                                }  
                    } 
} //submit post block
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

        .error{
            color: red;
        }
        .success{
            color: green;
        }
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

        </style>
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
                    <caption><b><h4>Add New Employee Details:</h4></b></caption>
                    <?php 
                        if(isset($success)){
                            echo $success;
                        }
                    ?>

                            <tr>
                                <td align="center"><a href="index.php">&larr;Back</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Fullname* <input type="text" name="fullname" value="<?php echo $fullname; ?>" /> <span  class="error"><?php echo $fullnameErr;?></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Email* <input type="text" name="email" value="<?php echo $email; ?>" />
                                <span class="error"><?php echo $emailErr;?></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Designation* <input type="text" name="designation" value="<?php echo $designation;?>" /><span class="error"><?php echo $designationErr;?></span>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Department* <input type="text" name="department" value="<?php echo $department;?>" /><span class="error"><?php echo $departmentErr;?>
                                </span>
                                </td>
                            </tr>

                            <tr>
                                <td><button type="submit" name="submit"><strong>SAVE</strong></button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </center>
    </body>
</html>