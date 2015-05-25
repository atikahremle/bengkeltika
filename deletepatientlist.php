<?php
include "./config.php";
if(isset($_GET)){
	$id=$_GET['id'];
	$sql="DELETE FROM patient WHERE patientID='$id'";
	if($conn->query($sql)){
		header("Location: ./listpatient.php");
    	die();
	}else{
		$conn->connect_error;
		header("Location: ./listpatient.php");
	}
}else{
	header("Location: ./listpatient.php");
}
?>