<?php 
include('connect-db.php');

$user_i = $_GET['brand_strength_form_price_id'];

echo $user_i;

if(!isset($_GET['brand_strength_form_price_id']) || $_GET['brand_strength_form_price_id'] == ''){ //if no id is passed to this page take user back to previous page
	header("Location: http://localhost/dev/deshboard/pages/index.php");
}

if(isset($_POST['submit'])){

	
	$brand_name = $_POST['brand_name'];
	$generic_name = $_POST['generic_name']; 	
	$company = $_POST['company_name'];	
	$form = $_POST['form_name']; 	
	$strength = $_POST['strength_name']; 	
	$package = $_POST['packsize_name']; 	
	$price = $_POST['price'];

	
	$brand_name = mysql_real_escape_string($brand_name);
	$generic_name = mysql_real_escape_string($generic_name);
	$company = mysql_real_escape_string($company);
	$form = mysql_real_escape_string($form);
	$strength = mysql_real_escape_string($strength);
	$package = mysql_real_escape_string($package);
	$price = mysql_real_escape_string($price);
	
	mysql_query("UPDATE brand_strength_form_price SET brand_name='$brand_name', generic_name='$generic_name',company='$company', form='$form', strength='$strength', package='$package', price='$price' WHERE brand_strength_form_price_id='$brand_strength_form_price_ids'");
	$_SESSION['success'] = 'Page Updated';
	header("Location: http://localhost/dev/deshboard/pages/index.php");
	exit();

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

    <title>Deshboard - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Bhalo-Achee Deshboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
           
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
              
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="medicine.php"><i class="fa fa-table fa-fw"></i> Medicine </a>
                        </li>
                        <li>
                            <a href="shop.php"><i class="fa fa-edit fa-fw"></i> Shop</a>
                        </li>
                        <li>
                            <a href="doctors.php"><i class="fa fa-wrench fa-fw"></i>Doctors</a>
                        </li>
						 <li>
                            <a href="users.php"><i class="fa fa-bar-chart-o fa-fw"></i> User</a>
                        </li>
                        <li>
                            <a href="blog.php"><i class="fa fa-sitemap fa-fw"></i> Blog</a>
                        </li>
                 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Edit Medicine</h1>
                </div>			
            </div>
			
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
				 <form action="" method="post">
					 <input type="hidden" name="drag_id" value="<?php echo $drag_id; ?>"/>
					 <div>
					 <?php
						$id = $_GET['brand_strength_form_price_id'];
						$id = mysql_real_escape_string($id);
						$query = mysql_query("SELECT
								brand_strength_form_price.brand_strength_form_price_id,
								brand_strength_form_price.brand_name_fk,
								brand_strength_form_price.strength_name_fk,
								brand_strength_form_price.packsize_fk,
								brand_strength_form_price.form_name_fk,
								brand_strength_form_price.price,
								generic.generic_name,
								company.company_name
								FROM
								brand_strength_form_price
								INNER JOIN brand ON brand_strength_form_price.brand_name_fk = brand.brand_name
								INNER JOIN generic ON brand.generic_name_fk = generic.generic_name
								INNER JOIN company ON brand.company_fk = company.company_name
								WHERE brand_strength_form_price_id='$id'");
						$row = mysql_fetch_object($query);			
					?>
							
					 <strong>Brand Name: *</strong> <input type="text" name="brand_name" value="<?php echo $row->brand_name_fk;?>"/><br/>
					 <strong>Generic Name: *</strong> <input type="text" name="generic_name" value="<?php echo $row->generic_name;?>"/><br/>
					 <strong>Company Name: *</strong> <input type="text" name="company_name" value="<?php echo $row->company_name;?>"/><br/>
					 <strong>Drug Form: *</strong> <input type="text" name="form_name" value="<?php echo $row->form_name_fk;?>"/><br/>
					 <strong>Drug Strength: *</strong> <input type="text" name="strength_name" value="<?php echo $row->strength_name_fk;?>"/><br/>
					 <strong>Package Type: *</strong> <input type="text" name="packsize_name" value="<?php echo $row->packsize_fk;?>"/><br/>
					 <strong>Drug Price: *</strong> <input type="text" name="price" value="<?php echo $row->price;?>"/><br/>
					 <p>* Required</p>
					 <input type="submit" name="submit" value="Submit">
					 </div>
				 </form> 

                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
