
<?php
error_reporting(E_ALL);
include('../db/dbQuery.php');
include'../inc/debugger.php';
$fullname = $email = $designation = $department = "";
	$error = "";

if (isset($_POST['btn-update'])) {
        $fullname    = $_POST["fullname"];
        $email       = $_POST["email"];

        $designation = $_POST["designation"];
        $department  = $_POST["department"];

        if (empty($fullname) || empty($email) || empty($designation) || empty($department)) {
         echo "<strong>Fields can not be empty</strong>";
         $error = 1;
         header("Refresh: 1, url= '../add-employee.php'");
            if (empty($fullname)) {
              echo "Fullname is required";
              $error = 1;
              }

            if (empty($email)) {
                echo "Email is required";
                $error = 1;
              }

            if (empty($designation)) {
                echo "Designation is required";
                $error = 1;
              }

            if (empty($department)) {
                echo "Department is required";
                $error = 1;
              }            

        } else {
            if(!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
               echo "only letters and white space allowed";
                $fullname = trim($fullname);
                $error = 1;
            }
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 
              
               $chkEmail = checkAvlEmail($fullname, $email, $designation, $department);
               
               if ($chkEmail) {
                    echo "Email already exist!"; 
                    $error = 1;
                  }  
              }
              
              else {
                  echo "Invalid email format";
                  $error = 1;
                }
        
      }
        //if not any error
        if($error != 1) {
          $email = trim($email);
          $updateData = editEmployee($fullname, $email, $designation, $department); 
          if($updateData) {
            echo "<strong> Employee Updated Successfully </strong>";
            header("Refresh: 1, url = '../add-employee.php");
          } else {
            echo "<strong>There was problem while updating employee</strong>";
          header("Refresh: 1, url = '../add-employee.php");
          }
        }
}

// debugger($_POST, true); 
if (isset($_POST['submit'])) {
  
        $fullname    = $_POST["fullname"];
        $email       = $_POST["email"];
        $designation = $_POST["designation"];
        $department  = $_POST["department"];

        if (empty($fullname) || empty($email) || empty($designation) || empty($department)) {
         echo "<strong>Fields can not be empty</strong>";
         $error = 1;
         header("Refresh: 1, url= '../add-employee.php'");
         exit;
            if (empty($fullname)) {
              echo "Fullname is required";
              $error = 1;
              }

            if (empty($email)) {
                echo "Email is required";
                $error = 1;
              }

            if (empty($designation)) {
                echo "Designation is required";
                $error = 1;
              }

            if (empty($department)) {
                echo "Department is required";
                $error = 1;
              }

        } else {
             if(!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
               echo "only letters and white space allowed";
                $error = 1;
            } else {
                $fullname = trim($fullname);
              }

            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $chkEmail = addEmployee($fullname, $email, $designation, $department);
            if ($chkEmail) {
                echo "Email already exist!"; 
                header("Refresh: 1, url= '../add-employee.php'");
                $error = 1;
              } else {
                  $email = trim($email);
                }
              } else {
                echo "Invalid email format ";
                $error = 1;
              }
          }

            if($error != 1) {
              $insertData = addEmployee($fullname, $email, $designation, $department); 
              if($insertData) {
                echo "<strong> Employee Added Successfully </strong>";
                header("Refresh: 1, url = '../add-employee.php");
              } else {
                echo "<strong>There was problem while adding employee</strong>";
              header("Refresh: 1, url = '../add-employee.php");
              }
            }
}

// debugger($_POST, true);
if(isset($_POST['assign'])){
      $eid = $_POST['id']; //employee id
      $did = $_POST['devices']; //device id
      $assigned_date = $_POST['assigned_date'];
      //function to check available device
      $device = assignDevice($eid, $did, $assigned_date);
      // var_dump($device);
      // die;
      if($device) {
        echo "<strong>Device Already Assigned!</strong>";
        @header("Refresh: 1, url = ../view-employee-details.php?id=".$eid);
       } else {
          $device = assignDevice($eid, $did, $assigned_date);
          echo "<strong>Device added Successfully!!</strong>";
          @header("Refresh: 1, url = ../view-employee-details.php?id=".$eid);
        }
    }

if(isset($_GET['id'])){
       $delEmp = deleteEmployee();
     }

if (isset($_GET['deldeviceid']) && isset($_GET['edid'])) {
           $del = deleteAssignDevice();
       }
?>
