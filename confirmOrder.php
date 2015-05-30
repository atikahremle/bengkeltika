<?php
include("config.php");
$orderId=$_POST['orderId'];
$sql="UPDATE `order` SET `status`='confirm' WHERE `orderID`='$orderId'";
$conn->query($sql);
header("Location: ./msgConfirmOrder.php");
?>