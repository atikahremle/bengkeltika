<?php
session_start();
extract ($_SESSION);
ob_start();
require 'config.php';
	if(isset($_POST['btnSubmit']))
	{
		if ($_POST['btnSubmit']=="Upload File")
	{	
			
		if (isset($_FILES['uploadedfile']['name']))
        $strfilename=$_FILES['uploadedfile']['name'];
    	else
        $strfilename="";
		
		 $sql="INSERT INTO upload(title,image) VALUES('".$_POST['title']."', '".$_FILES['uploadedfile']['name']."')";
		 $conn->query($sql);
		 echo $conn->error;
   		 header("Location: ./adminupload.php");
		
        $target_path = "upload/";
        $new_path = $target_path .basename($_FILES['uploadedfile']['name']); 
	    
	}
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $new_path)) 
	{
		$valid_formats = array("jpg","bmp","jpeg","gif");
	} 
	else
	{
		echo $target_path . "-". $_FILES['uploadedfile']['error'];
	}
	}
	
	if(isset($_POST['btnSave']))
	{
		if ($_POST['btnSave']=="Simpan")
	{	
			
		$insquery="UPDATE upload SET title='" . $_POST['title'] . "' WHERE id='". $_GET['id'] ."' ";
		
 	$conn->query($sql);
    unset($_POST);
	}
	}						
	if($_GET['action']=="delete")
	{	
	// Delete all data into table
	 $sql="DELETE FROM upload WHERE id='" .$_GET['id']. "'";
	 $conn->query($sql);
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

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
					<?php 
					//show the username
					echo strtoupper($_SESSION['name']); 
					?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="adminhome.php"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="adminregnurse.php"><i class="fa fa-fw fa-user"></i> Register Nurse</a>
                    </li>
                    <li>
                        <a href="adminregchef.php"><i class="fa fa-fw fa-table"></i> Register Chef</a>
                    </li>
                    <li>
                        <a href="adminregward.php"><i class="fa fa-fw fa-edit"></i> Register Ward</a>
                    </li>
                    <li>
                        <a href="admindiseases.php"><i class="glyphicon glyphicon-pushpin"></i> Diseases</a>
                    </li>
                    <li>
                        <a href="adminmeals.php"><i class="fa fa-fw fa-cutlery"></i> Meals</a>
                    </li>
                    <li class="active">
                        <a href="adminupload.php"><i class="fa fa-fw fa-desktop"></i> Pictures</a>
             		</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Upload Pictures
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Picture </li>   
                            
                      </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row"></div>
                <!-- /.row -->

                <div class="row"></div>
                <!-- /.row -->

              <div class="row"></div>
          <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                    <form name="formID" id="formID" method="post" action="adminupload.php" onSubmit="return validate()" enctype="multipart/form-data">
                    	<div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="uploadfile">Picture</label>
                            <input class="validate[required] text-input" name="uploadedfile" type="file" />
                        </div>
                        <div class="form-group">
                        <input type="submit" class="btn btn-success" name="btnSubmit" value="Upload File">
                        <button class="btn btn-default">Reset</button>
                        </div>
 					 </form>
 				 </div>
                 <div class="col-lg-6">
                 <table class="table table-bordered table-hover table-striped">
                 		<thead>
                              <tr>
                              	<td width="18%" align="center" bgcolor="#FFFFFF">#</td>
                                <td width="28%" align="center" bgcolor="#FFFFFF">Title</td>
                                <td width="27%" align="center" bgcolor="#FFFFFF">Picture</td>
                                <td width="27%" align="center" bgcolor="#FFFFFF">Process</td>
                              </tr>
                         </thead>
                              <?php
							   $sql = $conn->query("SELECT * FROM upload");   
							  $target_path = "upload/";
        					
							  while($row = mysqli_fetch_array($sql))
                              {
							  ?>
                              <tr>
                                <td height="26" align="center"><?php echo $row['id']; ?></td>
                                <td align="center"><?php echo $row['title']; ?></td>
                                <td align="center">
                                <?php 
								$curimg=$row['image'];
								echo "<a href=$target_path$curimg target=_blank>".$row['title']."</a>";
								?>
								</td>
                                <td align="center"><a href="adminupload.php?action=delete&id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-trash">Delete</a></td>
                              </tr>
                              <?php
							  }
							  ?>
</table>
</div>
              </div>
                <!-- /.row -->
			
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>