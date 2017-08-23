<?php 
// echo "Edit page";
// die;
// session_start();
include('db/dbQuery.php');
$row = getDataByEmpId();
 // echo "<pre>";
 //  print_r($row);
 // echo "</pre>";
  $name        = $row['fullname'];
  $email       = $row['email'];
  $designation = $row['designation'];
  $department  = $row['department'];

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
</head>
<body>
	<div class="container">      	

<div id="body">
    <div id="content">
        <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6">
                      <form method="POST" action="process/employee.php">
                          <table class="table table-bordered">
                              <caption><b><h4>Edit Employee Details:</h4></b></caption>
                                  <tr>
                                      <td align="center"><a href="index.php">&larr;Back</a></td>
                                      <td>Enter Employee Details for Update</td>
                                  </tr>

                                  <tr> 
                                      <td>FullName:</td>
                                      <td><input type="text" name="fullname" value="<?php echo $name
                                      ; ?>">
                                      <span class="error"></span></td>
                                  </tr>

                                  <tr>
                                      <td>Email:
                                      <td><input type="email" name="email" value="<?php echo $email; ?>">
                                      <span class="error"></span></td>
                                  </tr>

                                  <tr>
                                      <td>Designation:</td>
                                      <td><input type="text" name="designation" value="<?php echo $designation;?>">
                                      <span class="error"></td>
                                  </tr>

                                  <tr>
                                      <td>Department:</td>
                                      <td><input type="text" name="department" value="<?php echo $department;?>">
                                      <span class="error"></td>
                                  </tr>
                                  
                                  <tr>
                                      <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                                      <td><button type="submit" name="btn-update"><strong>Update</strong></button></td>
                                  </tr>
                          </table>
                      </form>
                      <?php include ('inc/footer.php');?>
                </div>
            </div>
      <div class="col-md-3"></div>
  </div>
</body>
</html>