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
                                    <a href="chefmenu.php"><i class="glyphicon glyphicon-th-list"></i> Menu Order</a></li>

                                    <li>
                                        <a href="chefreport.php"><i class="fa fa-fw fa-edit"></i>Report</a></li>
                                        <li>

                                         <li class="active">
                                        <a href="chefreport.php"><i class="glyphicon glyphicon-signal"></i>Report Graph</a></li>
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
                                                                <i class="fa fa-dashboard"></i> Home / Order List
                                                           </li>
                                                       </ol>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                <div class="col-lg-12">
                                                    
  <?php // content="text/plain; charset=utf-8"
require_once ('chefgraph.php');
require_once ('chefgraph.php');

$data1y=array(47,80,40,116);
$data2y=array(61,30,82,105);
$data3y=array(115,50,70,93);


// Create the graph. These two calls are always required
$graph = new Graph(350,200,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);
$b3plot = new BarPlot($data3y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");

$b2plot->SetColor("white");
$b2plot->SetFillColor("#11cccc");

$b3plot->SetColor("white");
$b3plot->SetFillColor("#1111cc");

$graph->title->Set("Bar Plots");

// Display the graph
$graph->Stroke();
?>
      
                                            </div>
                                        </div>
                                       
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
