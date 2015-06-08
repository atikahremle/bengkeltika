<?php
include "./config.php";
if(isset($_GET)){
	$id=$_GET['id'];
	$sql="DELETE FROM order WHERE orderID='$id'";
	if($conn->query($sql)){
		header("Location: ./nurseorder.php");
    	die();
	}else{
		$conn->connect_error;
		header("Location: ./nurseorder.php");
	}
}else{
	header("Location: ./nurseorder.php");
}
?>