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
                <a class="navbar-brand" href="index.php">Bhalo-Achee Deshboard</a>
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
                    <h1 class="page-header">Medicine</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
				
				<?php
/* 
	VIEW-PAGINATED.PHP
	Displays all data from 'players' table
	This is a modified version of view.php that includes pagination
*/

	// connect to the database
	include('connect-db.php');
	
	// number of results to show per page
	$per_page = 20;
	
	// figure out the total pages in the database
	$result = mysql_query("SELECT 
							brand_strength_form_price.brand_strength_form_price_id,
							brand.brand_name,
							generic.generic_name,
							strength.strength_name,
							pack.packsize_name,
							form.form_name,
							brand_strength_form_price.price,
							company.company_name
							FROM
							brand_strength_form_price
							INNER JOIN brand ON brand_strength_form_price.brand_name_fk = brand.brand_name
							INNER JOIN generic ON brand.generic_name_fk = generic.generic_name
							INNER JOIN strength ON brand_strength_form_price.strength_name_fk = strength.strength_name
							INNER JOIN pack ON brand_strength_form_price.packsize_fk = pack.packsize_name
							INNER JOIN form ON brand_strength_form_price.form_name_fk = form.form_name
							INNER JOIN company ON brand.company_fk = company.company_name");
	$total_results = mysql_num_rows($result);
	$total_pages = ceil($total_results / $per_page);

	// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
	if (isset($_GET['page']) && is_numeric($_GET['page']))
	{
		$show_page = $_GET['page'];
		
		// make sure the $show_page value is valid
		if ($show_page > 0 && $show_page <= $total_pages)
		{
			$start = ($show_page -1) * $per_page;
			$end = $start + $per_page; 
		}
		else
		{
			// error - show first set of results
			$start = 0;
			$end = $per_page; 
		}		
	}
	else
	{
		// if page isn't set, show first set of results
		$start = 0;
		$end = $per_page; 
	}
	
	// display pagination
	
	echo "<p><a href='medicine.php'>View All</a> | <b>View Page:</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='medicine.php?page=$i'>$i</a> ";
	}
	echo "</p>";
		
	// display data in table
	echo "<table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\"><thead>";
	echo "  <tr>
			<th>Brand Name</th>
			<th>Generic Name</th>
			<th>Company</th>
			<th>Form</th>
			<th>Strength</th>
			<th>Package</th>
			<th>Price</th>
		</tr> 
		</thead>
        <tbody>";

	// loop through results of database query, displaying them in the table	
	for ($i = $start; $i < $end; $i++)
	{
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total_results) { break; }
	
		// echo out the contents of each row into a table
		echo "<tr class=\"odd gradeX\">";
		echo '<td>' . mysql_result($result, $i, 'brand_name') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'generic_name') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'company_name') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'form_name') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'strength_name') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'packsize_name') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'price') . '</td>';
		echo '<td><a href="edit-medicine.php?brand_strength_form_price_id=' . mysql_result($result, $i, 'brand_strength_form_price_id') . '">Edit</a> | <a href="delete-medicine.php?brand_strength_form_price_id=' . mysql_result($result, $i, 'brand_strength_form_price_id') . '">Delete</a></td>';
		echo "</tr>";
		
	}
	// close table>
	echo "</tbody></table>"; 
	
	// pagination
	
?>
<p><a href="new.php">Add a new Medicine</a></p>
                    
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
