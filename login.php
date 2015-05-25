<?php
session_start();
ob_start();
if(isset($_POST['submit'])){
$userID = $_POST['userID'];
$password = $_POST['password'];
// Include database connection settings
include('config.php');

 $a = set_time_limit(25);

// Retrieve username and password from database according to user's input
// $login = mysql_query("SELECT * FROM user WHERE (userID = '" . mysql_real_escape_string($_POST['userID']) . "') and (password = '" .($_POST['password']) . "')");
 $sql = "SELECT * FROM user WHERE (userID = '" . mysqli_real_escape_string($conn,$_POST['userID']) . "') and (password = '" .(md5($_POST['password'])) . "')";
 $login = $conn->query($sql);
if(!$login)
  {
  echo "<script language='javascript'>alert('No Record');</script> 
  <script language='javascript'>window.location.href='index.php'</script>";
  }
// Check username and password match
if ($login->num_rows == 1) 
{
		while($row = $login->fetch_assoc())
		{
			if ($row['position']=="admin")
			{
			// Set username session variable
			$_SESSION['userID'] = $_POST['userID'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['ic_num'] = $_POST['ic_num'];
			$_SESSION['position'] = $row['position'];
			// Jump to adminhome page as Admin
			header('Location: adminhome.php');
			}
			else if($row['position']=="nurse")
			{
			// Set username session variable
			$_SESSION['userID'] = $_POST['userID'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['ic_num'] = $row['ic_num'];
			$_SESSION['position'] = $row['position'];
			// Jump to home page as sttaff
			header('Location: nursehome.php');
			}
			else if($row['position']=="chef")
			{
			// Set username session variable
			$_SESSION['userID'] = $_POST['userID'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['ic_num'] = $row['ic_num'];
			$_SESSION['position'] = $row['position'];
			// Jump to home page as chef
			header('Location: chefhome.php');
			}
		}	
	}
}
?>
<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/styles.css">
<script>
function validateForm()
{
var x=document.forms["login"]["username"].value;
if (x==null || x=="")
  {
  alert("Please Insert Your Username");
  return false;
  }
var x=document.forms["login"]["password"].value;
if (x==null || x=="")
  {
  alert("Please Insert Your Password");
  return false;
  }  
}
</script>
</head>

	<!-- Main HTML -->
	
<body>
	
	<!-- Begin Page Content -->
	
	<div id="container">
		
		<form name="login" method="post" class="signin" action="login.php" onSubmit="return validateForm()">
		<label for="name">Username:</label>
		
		<input type="name" name="userID" placeholder="UserID">
		
		<label for="password">Password:</label>
			
		<input type="password" name="password" placeholder="Password">
		
		<div id="lower">
       
		
		<input type="submit" name="submit" value="Login">
		
		</div>
		
		</form>
		
	</div>
	
	
	<!-- End Page Content -->
	
</body>

</html>
	
	
	
	
	
		
	