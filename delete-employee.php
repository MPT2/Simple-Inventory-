<?php
    include('db/connection.php');
    // echo $_GET['id'];
    $uid = $_GET['id'];

    $record = "DELETE FROM employee WHERE id =" .$uid;
      $result= mysqli_query($conn, $record);
    // var_dump($result);
 
 if ($result){
 	$msg = "Employee Deleted Successfully";
 	echo $msg;
 	
 	@header('location:index.php');
 }else{
 	$adderr ="There was problem while Deleting.";
 }
 $db->close();

?>

