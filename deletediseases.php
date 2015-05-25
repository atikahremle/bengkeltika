<?php
include "./config.php";
if(isset($_GET)){
	$id=$_GET['id'];
	$sql="DELETE FROM disease WHERE idDisease='$id'";
	if($conn->query($sql)){
		header("Location: ./admindiseases.php");
    	die();
	}else{
		$conn->connect_error;
		header("Location: ./admindiseases.php");
	}
}else{
	header("Location: ./admindiseases.php");
}
?>