<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome to Valo-Achi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/main.css">	
		
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>	
    </head>
	
	<body>
	<!--Header Starts Here -->	
	<header>
		<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.html"><img src="images/balogo.png" height="100" width="80"/></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav">
			<li><a href="about.html">About</a></li>
			<li><a href="contact.html">Contact</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="./ ">Sign In <span class="sr-only">(current)</span></a></li>
		  </ul>
		</div><!--/.nav-collapse -->
	  </div>
	</nav>
	</header>
	
	<!--Main Starts Here -->	
	<div class="main">
		<div class="container">			
		
			<section class="shop-result medicine-result">		
			
				<article class="row doctors-single">
					<div>
						<h4><a href="#">Dr. Asfaq Ullah</a> <span class="doctors-rating"><a href="#"> (2)</a></span></h4>
						<p>Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum
						 Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum</p>
					</div>    
				</article>	
				
				<article class="row doctors-single">
					<div>
						<h4>Dr. Asfaq Ullah</h4>
						<p>Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum
						 Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum</p>
					</div>    
				</article>
				
				<article class="row doctors-single">
					<div>
						<h4>Dr. Asfaq Ullah</h4>
						<p>Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum
						 Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum</p>
					</div>    
				</article>				
			</section>
		
		</div>

	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>
	
	
	<footer id="footer">
      <div class="container">
	  <!--
		<div class="row">
			<div class="col-md-4">
				<h5>Footer 1</h5>
			</div>
			
			<div class="col-md-4">
				<h5>Footer 2</h5>
			</div>
			
			<div class="col-md-4">
				<h5>Footer 3</h5>
			</div>
		</div>
		-->
		<div class="row">		
			<div class="col-md-6 footer-navigation">		
				<nav>
					<a href="#">About Us</a>		
					<a href="#">Legal</a>		
					<a href="#">Copyright</a>			
					<a>Contact Us</a>			
					<a>Report an Error</a>	
				</nav>
				
			 </div>
			<div class="col-md-6 copyright">	
				<p>&copy; Bhalo-Aachee - 2015. All Rights Reserved.</p>
			</div>
      </div>
    </footer>
	  <!--Footer Ends Here -->	 
	  
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/typeahead.min.js"></script>
		<script src="js/main.js"></script>
			<script>
			$(document).ready(function(){
			$('input.typeahead').typeahead({
				name: 'typeahead',
				remote:'search.php?key=%QUERY',
				limit : 10
			});
		});
		</script>
		
		<script>
			function fetchfromMysqlDatabase() {
                  $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: "getrecords.php",
                    cache: false,
                    beforeSend: function() {
                       $('#res3').html('loading please wait...');
                    },
                    success: function(htmldata) {
                       $('#res3').html(htmldata);
                    }
                  });
                }
		</script>
		<script type="text/javascript">
			function showDistrict(str)
			{
			if (str=="")
			  {
			  document.getElementById("txtHint").innerHTML="";
			  return;
			  } 
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","db/getdistrict.php?q="+str,true);
			xmlhttp.send();
			}
			
			//Show Thana
			function showThana(str)
			{
			if (str=="")
			  {
			  document.getElementById("txtHint").innerHTML="";
			  return;
			  } 
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","db/getthana.php?thana="+str,true);
			xmlhttp.send();
			}
			
			//Show Shop
			function showShop(str)
			{
			if (str=="")
			  {
			  document.getElementById("txtHint").innerHTML="";
			  return;
			  } 
			  
			
			// var txt=$('input:text[name=name]').val();
			  var name = document.getElementById("name").value;
			  
			
			var queryString = "q=" + str + "&name=" + name;
			
			//xmlhttp.open("GET","theme/getmove.php"+queryString,true);
			  
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				}
			  }
			  
			xmlhttp.open("GET","db/getshop.php?"+queryString,true);
			xmlhttp.send();
			}
			
			</script>
        
		<script type="text/javascript">
		$(document).ready(function() {
			var track_load = 0; //total loaded record group(s)
			var loading  = false; //to prevents multipal ajax loads
			var total_groups = <?php echo $total_groups; ?>; //total record group(s)
			
			$('#results').load("db/autoload_process.php", {'group_no':track_load}, function() {track_load++;}); //load first group
			
			$(window).scroll(function() { //detect page scroll
				
				if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
				{
					
					if(track_load <= total_groups && loading==false) //there's more data to load
					{
						loading = true; //prevent further ajax loading
						$('.animation_image').show(); //show loading image
						
						//load data from the server using a HTTP POST request
						$.post('db/autoload_process.php',{'group_no': track_load}, function(data){
											
							$("#results").append(data); //append received data into the element

							//hide loading image
							$('.animation_image').hide(); //hide loading image once data is received
							
							track_load++; //loaded group increment
							loading = false; 
						
						}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
							
							alert(thrownError); //alert with HTTP error
							$('.animation_image').hide(); //hide loading image
							loading = false;
						
						});
						
					}
				}
			});
		});
		</script>
		
    </body>
</html>