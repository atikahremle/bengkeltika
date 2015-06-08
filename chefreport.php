<?php
session_start();
extract ($_SESSION);
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chef Home</title>

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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="chefhome.php">e-Menu Chef</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo ucwords($_SESSION['name']);?><b class="caret"></b></a>
                        <ul class="dropdown-menu">

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
                        <li>
                           <a href="chefhome.php"><i class="glyphicon glyphicon-home"></i> Home</a>                    </li>
                           <li>
                            <a href="chefmenu.php"><i class="glyphicon glyphicon-user"></i> Menu Order</a></li>

                            <li class="active">
                                <a href="chefreport.php"><i class="fa fa-fw fa-edit"></i>Report</a></li>
                                <li>

                                    <!-- /.navbar-collapse -->
                                </nav>

                                <div id="page-wrapper">

                                    <div class="container-fluid">


                                      <!-- Page Heading -->
                                     <div class="row">
                                        <div class="col-lg-12">
                                            <h1 class="page-header">
                                                Order List
                                            </h1>

                                            <ol class="breadcrumb">
                                                <li>
                                                <i class="fa fa-dashboard"></i> Home / Report <div class="container-fluid">
                                                    <h2></h2>

                                                    <div class="col-lg-12">
                                                        <h2>Order List </h2> 

                                                        <table class="table table-bordered table-hover table-striped">

                                                          <tr>
                                                            <th width="25%">DATE</th>
                                                            <th width="18%">NAME</th>
                                                            <th width="15%">FOOD BREAKFAST</th>
                                                            <th width="15%">BEVERAGE BREAKFAST</th>
                                                            <th width="18%">DESSERT BREAKFAST</th>
                                                            <th width="18%">FRUIT BREAKFAST</th>
                                                            <th width="15%">FOOD LUNCH</th>
                                                            <th width="15%">BEVERAGE LUNCH</th>
                                                            <th width="18%">DESSERT LUNCH</th>
                                                            <th width="18%">FRUIT LUNCH</th> 
                                                            <th width="15%">FOOD DINNER</th>
                                                            <th width="15%">BEVERAGE DINNER</th>
                                                            <th width="18%">DESSERT DINNER</th>
                                                            <th width="18%">FRUIT DINNER</th>

                                                        </tr>
                                                    </thead>
                                                    <?php
                                                     $sql = $conn->query("SELECT * FROM `order`");  
                                                     if($sql->num_rows > 0){
                                                          while($row = $sql->fetch_assoc()){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row['date']; ?></td>
                                                                <td><?php echo $row['patientID']; ?></td>
                                                                <td><?php echo $row['foodBreakfast']; ?></td>
                                                                <td><?php echo $row['beverageBreakfast']; ?></td>
                                                                <td><?php echo $row['dessertBreakfast']; ?></td>
                                                                <td> <?php echo $row['fruitBreakfast']; ?></td>
                                                                <td><?php echo $row['foodLunch']; ?></td>
                                                                <td><?php echo $row['beverageLunch']; ?></td>
                                                                <td><?php echo $row['dessertLunch']; ?></td>
                                                                <td> <?php echo $row['fruitLunch']; ?></td>
                                                                <td><?php echo $row['foodDinner']; ?></td>
                                                                <td><?php echo $row['beverageDinner']; ?></td>
                                                                <td><?php echo $row['dessertDinner']; ?></td>
                                                                <td> <?php echo $row['fruitDinner']; ?></td>
                                                                <td>

                                                                </tr>

                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }else{?>
                                                <tr><td colspan="3">No record</td></tr>
                                                <?php }
                                                ?>
                                            </table>
                                        </div>
                                    </div>

                                </ol>
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

        </body>

        </html>
