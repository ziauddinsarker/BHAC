<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($drag_id, $brand_name, $generic_name, $company_name, $drug_form_name, $strength, $package_type, $drags_price, $error)
 {
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
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="medicine.html"><i class="fa fa-table fa-fw"></i> Medicine </a>
                        </li>
                        <li>
                            <a href="shop.html"><i class="fa fa-edit fa-fw"></i> Shop</a>
                        </li>
                        <li>
                            <a href="doctors.html"><i class="fa fa-wrench fa-fw"></i>Doctors</a>
                        </li>
						 <li>
                            <a href="users.html"><i class="fa fa-bar-chart-o fa-fw"></i> User</a>
                        </li>
                        <li>
                            <a href="blog.html"><i class="fa fa-sitemap fa-fw"></i> Blog</a>
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
                    <h1 class="page-header"> Edit Shop</h1>
                </div>
				<?php 
					 // if there are any errors, display them
					 if ($error != '')
					 {
					 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
					 }
					 ?> 
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
				 <form action="" method="post">
					 <input type="hidden" name="drag_id" value="<?php echo $drag_id; ?>"/>
					 <div>
					
					 <strong>Brand Name: *</strong> <input type="text" name="brand_name" value="<?php echo $brand_name; ?>"/><br/>
					 <strong>Generic Name: *</strong> <input type="text" name="generic_name" value="<?php echo $generic_name; ?>"/><br/>
					 <strong>Company Name: *</strong> <input type="text" name="company_name" value="<?php echo $company_name; ?>"/><br/>
					 <strong>Drug Form: *</strong> <input type="text" name="company_name" value="<?php echo $drug_form_name; ?>"/><br/>
					 <strong>Drug Strength: *</strong> <input type="text" name="company_name" value="<?php echo $strength; ?>"/><br/>
					 <strong>Package Type: *</strong> <input type="text" name="company_name" value="<?php echo $package_type; ?>"/><br/>
					 <strong>Drug Price: *</strong> <input type="text" name="company_name" value="<?php echo $drags_price; ?>"/><br/>
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

<?php
 }
 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['drag_id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['drag_id'];
 $brand_name = mysql_real_escape_string(htmlspecialchars($_POST['brand_name']));
 $generic_name = mysql_real_escape_string(htmlspecialchars($_POST['generic_name']));
 $company_name = mysql_real_escape_string(htmlspecialchars($_POST['company_name']));
 $drug_form_name = mysql_real_escape_string(htmlspecialchars($_POST['drug_form_name']));
 $strength = mysql_real_escape_string(htmlspecialchars($_POST['strength']));
 $package_type = mysql_real_escape_string(htmlspecialchars($_POST['package_type']));
 $drags_price = mysql_real_escape_string(htmlspecialchars($_POST['drags_price']));
 
 
 
 
 // check that firstname/lastname fields are both filled in
 if ($brand_name == '' || $generic_name == '' || $company_name == '' || $drug_form_name == '' ||  $strength == '' || $package_type == '' || $drags_price == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($drag_id, $brand_name, $generic_name, $company_name, $drug_form_name, $strength, $package_type, $drags_price, $error);
 }
 else
 {
 // save the data to the database
 //mysql_query("UPDATE drags SET firstname='$firstname', lastname='$lastname' WHERE id='$id'")
mysql_query("UPDATE drags INNER JOIN generic ON drags.fk_generic_name = generic.generic_id INNER JOIN company ON drags.fk_company_name = company.company_id
	INNER JOIN price ON drags.fk_price = price.price_id
	INNER JOIN package ON price.fk_package = package.package_id
	INNER JOIN drug_form_mut ON drug_form_mut.drug_name = drags.drag_id
	INNER JOIN drug_form ON drug_form_mut.drug_form = drug_form.drug_form_id
	SET
	drags.brand_name = '$brand_name',
	generic.generic_name = '$generic_name',
	company.company_name = '$company_name',
	drug_form.drug_form_name = '$drug_form_name',
	price.strength = '$strength',
	package.package_type = '$package_type',
	price.drags_price = '$drags_price'
	WHERE
	drag_id='$drag_id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: medicine.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checking that it is numeric/larger than 0)
 if (isset($_GET['drag_id']) && is_numeric($_GET['drag_id']) && $_GET['drag_id'] > 0)
 {
 // query db
 $drag_id = $_GET['drag_id'];
 $result = mysql_query("SELECT
						drags.drag_id,
						drags.brand_name,
						generic.generic_name,
						company.company_name,
						drug_form.drug_form_name,
						price.strength,
						package.package_type,
						price.drags_price
						FROM
						drags
						INNER JOIN generic ON drags.fk_generic_name = generic.generic_id
						INNER JOIN company ON drags.fk_company_name = company.company_id
						INNER JOIN price ON drags.fk_price = price.price_id
						INNER JOIN package ON price.fk_package = package.package_id
						INNER JOIN drug_form_mut ON drug_form_mut.drug_name = drags.drag_id
						INNER JOIN drug_form ON drug_form_mut.drug_form = drug_form.drug_form_id WHERE drag_id=$drag_id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $brand_name = $row['brand_name'];
 $generic_name = $row['generic_name'];
 $company_name = $row['company_name'];
 $drug_form_name = $row['drug_form_name'];
 $strength = $row['strength'];
 $package_type = $row['package_type'];
 $drags_price = $row['drags_price'];
 
 
 // show form
 renderForm( $drag_id, $brand_name, $generic_name, $company_name, $drug_form_name, $strength, $package_type, $drags_price, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>
