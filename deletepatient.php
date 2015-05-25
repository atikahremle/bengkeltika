<?php
include "./config.php";
if(isset($_GET)){
	$id=$_GET['id'];
	$sql="DELETE FROM patient WHERE patientID='$id'";
	if($conn->query($sql)){
		header("Location: ./nurseregpatient.php");
    	die();
	}else{
		$conn->connect_error;
		header("Location: ./nurseregpatient.php");
	}
}else{
	header("Location: ./nurseregpatient.php");
}
?>