<?php
include "./config.php";
if(isset($_GET)){
	$id=$_GET['id'];
	$sql="DELETE FROM meal WHERE mealID='$id'";
	if($conn->query($sql)){
		header("Location: ./adminmeals.php");
    	die();
	}else{
		$conn->connect_error;
		header("Location: ./adminmeals.php");
	}
}else{
	header("Location: ./adminmeals.php");
}
?>