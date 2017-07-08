<?php
    include('db/connection.php');
    // echo $_GET['id'];
    $uid = $_GET['edid'];
    $did = $_GET['deldeviceid'];
  // // echo $did;
  //  echo $uid."\t".$did;
  //    die();

     $sql = "DELETE FROM assigned_devices WHERE assigned_device_id =".$did." AND emp_id =" .$uid;
    //echo "test";die;
      $result= mysqli_query($conn, $sql);
     // DELETE FROM assigned_devices WHERE assigned_device_id = 25 AND emp_id = 31
    // var_dump($result);

  
 	
 	header("Location: view-employee-details.php?id=".$uid);

mysqli_close($conn);

?>

