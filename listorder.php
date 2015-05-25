<?php
session_start();
ob_start();
error_reporting(0);
if(!isset($_SESSION['name'])) {
  header("Location:nursehome.php");
}
require 'config.php';

if(isset($_POST["submit"])){	
	$id=$_GET['id'];
	$sql="SELECT * FROM patient JOIN ward ON patient.ward_no=ward.ward_no WHERE patientID='$id'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $conn->query($sql);
      echo $conn->error;
      unset($_POST);
      header("Location: ./listorder.php?id=".$row['patientID']);
      die();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Nurse Order Menu</title>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body>
        <div id="wrapper">
          <!-- Navigation -->
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="index.php">SB Admin</a> </div>
              <!-- Top Menu Items -->
              <ul class="nav navbar-right top-nav">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                  <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview"> <a href="#">
                      <div class="media"> <span class="pull-left"> <img class="media-object" src="http://placehold.it/50x50" alt=""> </span>
                        <div class="media-body">
                          <h5 class="media-heading"><strong>John Smith</strong> </h5>
                          <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </div>
                    </a> </li>
                    <li class="message-preview"> <a href="#">
                      <div class="media"> <span class="pull-left"> <img class="media-object" src="http://placehold.it/50x50" alt=""> </span>
                        <div class="media-body">
                          <h5 class="media-heading"><strong>John Smith</strong> </h5>
                          <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </div>
                    </a> </li>
                    <li class="message-preview"> <a href="#">
                      <div class="media"> <span class="pull-left"> <img class="media-object" src="http://placehold.it/50x50" alt=""> </span>
                        <div class="media-body">
                          <h5 class="media-heading"><strong>John Smith</strong> </h5>
                          <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </div>
                    </a> </li>
                    <li class="message-footer"> <a href="#">Read All New Messages</a> </li>
                  </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                  <ul class="dropdown-menu alert-dropdown">
                    <li> <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a> </li>
                    <li> <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a> </li>
                    <li> <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a> </li>
                    <li> <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a> </li>
                    <li> <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a> </li>
                    <li> <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a> </li>
                    <li class="divider"></li>
                    <li> <a href="#">View All</a> </li>
                  </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                  <?php 
					//show the username
                  echo strtoupper($_SESSION['name']); 
                  ?>
                  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li> <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a> </li>
                    <li> <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a> </li>
                    <li> <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a> </li>
                    <li class="divider"></li>
                    <li> <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
                  </ul>
                </li>
              </ul>
              <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  <li> <a href="nursehome.php"><i class="glyphicon glyphicon-home"></i> Home</a> </li>
                  <li>
                    <li> <a href="nurseregpatient.php"><i class="glyphicon glyphicon-user"></i> Register Patient</a></li>
                    <li> <a href="listpatient.php"><i class="fa fa-fw fa-table"></i>Patient List</a></li>
                    <li class="active"> <a href="nurseorder.php"><i class="fa fa-fw fa-edit"></i>Menu Order</a></li>
                    <li>
                      <!-- /.navbar-collapse -->
                    </nav>
                    <div id="page-wrapper">
                      <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="row">
                          <div class="col-lg-12">
                            <h1 class="page-header">Order Menu</h1>
                            <ol class="breadcrumb">
                              <li> <i class="fa fa-dashboard"></i> Home / Order </a> </li>
                            </ol>
                          </div>
                        </div>
                        <!-- /.row -->
                        <div class="row">
                          <div class="row">
                            <div class="col-md-12">
                             <?php
                             $id=$_GET['id'];
                             $sql="SELECT * FROM patient JOIN ward ON patient.ward_no=ward.ward_no WHERE patientID='$id'";
                             $result=$conn->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){
                                ?>
                                <form action="./ordermenu.php?id=<?php echo $row['patientID']?>" method="POST" class="form-horizontal">

                                  <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" id="name" value="<?php echo $row['name'];?>" size="50" readonly />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Ward No</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" id="name" value="<?php echo $row['ward_no'];?> - <?php echo $row['ward_name'];?>" size="50" readonly />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nurse Name</label>
                                    <div class="col-sm-5">
                                      <input type="hidden" name="userID" value="<?php echo $_SESSION['userID'];?>"/>
                                      <input type="text" class="form-control" id="name" value="<?php echo $_SESSION['name'];?> "size="50" readonly />
                                    </div>
                                  </div>
      
                                  <?php }} ?>
                                </form>
                                <div class="col-lg-12">    
                                  <div class="container">
                                    <h2>Order List</h2>
                                    <?php
                                    $today=date('Y-m-d');
                                    $sql="SELECT * FROM `order` WHERE patientId=$id AND date='$today';";
                                    $result=$conn->query($sql);
                                    if($result->num_rows > 0){
                                      while($row = $result->fetch_assoc()){
                                    ?>
                                    <h3>Breakfast</h3>
                                    <table class="table">
                                      <tr>
                                        <td>Food</td>
                                        <td><p class="text-center">= <?=$row["foodBreakfast"];?></p></td>
                                      </tr>
                                      <tr>
                                        <td>Beverage</td>
                                        <td>= <?=$row["beverageBreakfast"];?></td>
                                      </tr>
                                      <tr>
                                        <td>Desert</td>
                                        <td>= <?=$row["dessertBreakfast"];?></td>
                                      </tr>
                                      <tr>
                                        <td>Fruit</td>
                                        <td>= <?=$row["fruitBreakfast"];?></td>
                                      </tr>
                                    </table>
                                    <h3>Lunch</h3>
                                    <table class="table">
                                      <tr>
                                        <td>Food</td>
                                        <td><p class="text-center">= <?=$row["foodLunch"];?></p></td>
                                      </tr>
                                      <tr>
                                        <td>Beverage</td>
                                        <td>= <?=$row["beverageLunch"];?></td>
                                      </tr>
                                      <tr>
                                        <td>Desert</td>
                                        <td>= <?=$row["dessertLunch"];?></td>
                                      </tr>
                                      <tr>
                                        <td>Fruit</td>
                                        <td>= <?=$row["fruitLunch"];?></td>
                                      </tr>
                                    </table>
                                    <h3>Dinner</h3>
                                    <table class="table">
                                      <tr>
                                        <td>Food</td>
                                        <td><p class="text-center">= <?=$row["foodDinner"];?></p></td>
                                      </tr>
                                      <tr>
                                        <td>Beverage</td>
                                         <div class="col-md-4"><td>= <?=$row["beverageDinner"];?></td></div>
                                      </tr>
                                      <tr>
                                        <td>Desert</td>
                                        <td>= <?=$row["dessertDinner"];?></td>
                                      </tr>
                                      <tr>
                                        <td>Fruit</td>
                                        <td>= <?=$row["fruitDinner"];?></td>
                                      </tr>
                                    </table>
                                      <?php
                                      }}
                                      ?>
                                  </div>
                                </div>   

                                <!-- jQuery -->
                                <script src="js/jquery.js"></script>
                                <!-- Bootstrap Core JavaScript -->
                                <script src="js/bootstrap.min.js"></script>
                                <script>
                                  function myFunction() {
                                    document.getElementById("admitDate").step = "2";
                                    document.getElementById("demo").innerHTML = "Step was set to '2', meaning that the user can only select every second day in the calendar.";
                                  }
                                </script>
                              </div>
                            </body>
                            </html>