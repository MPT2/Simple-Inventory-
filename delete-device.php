<?php
    include('db/connection.php');
    // echo $_GET['id'];
    $did = $_GET['id'];
     echo $eid;

    $sql = "DELETE FROM company_assets WHERE id =" .$did;
      $result= mysqli_query($conn, $sql);
     
    // var_dump($result);
 
 if ($result){
 	 echo "Device Deleted Successfully";
  
 	
 	@header('location:list-devices.php');
 }else{
 	echo "There was problem while Deleting Device?";
 }
mysqli_close($conn);

?>

