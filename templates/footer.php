
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

				<!--			
				<nav>
					<a href="#">About Us</a>		
					<a href="#">Legal</a>		
					<a href="#">Copyright</a>			
					<a>Contact Us</a>			
					<a>Report an Error</a>	
				</nav>
				-->
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
		<script src="js/hogan-3.0.2.min.js"></script>
		<script src="js/main.js"></script>
		<script>
			$(document).ready(function(){
			
				$('input.typeahead').typeahead({
					name: 'typeahead',
					//header:'<h2>Name</h2>',
					valueKey: 'brand_name_fk',
					template: '<p>{{brand_name_fk}} - {{strength_name_fk}} - ({{form_name_fk}})</p>',
					engine: Hogan,
					remote:'db/search.php?key=%QUERY',
					limit : 10
				}).on('typeahead:selected', function($e, datum) {  // suggestion selected
				
				//.on('typeahead:selected',function(event,suggestions){	$myTextarea.append(suggestions.value, ' ');$('.typeahead').val('');});
				
						 var brandname = datum['brand_name_fk'];
						 var strengthname = datum['strength_name_fk'];
						 var formname = datum['form_name_fk'];
				
						  console.log('Brand: ' + brandname + 'Strength:'+ strengthname + 'Form:'+ formname ) ;
						  
						  //var brand = datum['brand_name_fk']);
						  //document.write(brand);
			  });
			});
			
			// - {{strength_name_fk}} - ({{form_name_fk}})
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
		
			/*
			*
			* Show the Districs on the homepage when clicking on the division 
			*
			*/
			function showDistrict(str)
			{
			if (str=="")
			  {
			  document.getElementById("div-dis-tha").innerHTML="";
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
				document.getElementById("div-dis-tha").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","db/getdistrict.php?q="+str,true);
			xmlhttp.send();
			}
			
			/*
			*
			* Show the Thana on the homepage when clicking on the Districs 
			*
			*/
			function showThana(str)
			{
				window.str;
				
				
			if (str=="")
			  {
			  document.getElementById("div-dis-tha").innerHTML="";
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
				document.getElementById("div-dis-tha").innerHTML=xmlhttp.responseText;
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
			  document.getElementById("shop-result").innerHTML="";
			  return;
			  } 			  
			
			// var txt=$('input:text[name=name]').val();
			  var name = document.getElementById("name").value;
			  
			window.thana = str;
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
				document.getElementById("shop-result").innerHTML=xmlhttp.responseText;
				}
			  }
			  
			xmlhttp.open("GET","db/getshop.php?"+queryString,true);
			xmlhttp.send();
			}
			
			</script>
        
		<script type="text/javascript">
		/*
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
		*/
		</script>
		<script type="text/javascript">
      var busy = false;
      var limit = 10
      var offset = 0;
		var thana = window.str;

      function displayRecords(lim, off) {
        $.ajax({
          type: "GET",
          async: false,
          url: "db/getshoprecords.php",
          data: "limit=" + lim + "&offset=" + off + "&thana=" + thana,
          cache: false,
          beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
            $("#infinite-result-shop").append(html);
            $('#loader_image').hide();
            if (html == "") {
              $("#loader_message").html('<button class="btn btn-default" type="button">No more records.</button>').show()
            } else {
              $("#loader_message").html('<button class="btn btn-default" type="button">Loading please wait...</button>').hide();
            }
            window.busy = false;


          }
        });
      }

      $(document).ready(function() {
        // start to load the first set of data
        if (busy == false) {
          busy = true;
          // start to load the first set of data
          displayRecords(limit, offset);
        }


        $(window).scroll(function() {
          // make sure u give the container id of the data to be loaded in.
          if ($(window).scrollTop() + $(window).height() > $("#infinite-result-shop").height() && !busy) {
            busy = true;
            offset = limit + offset;

            // this is optional just to delay the loading of data
            setTimeout(function() { displayRecords(limit, offset); }, 200);

            // you can remove the above code and can use directly this function
            // displayRecords(limit, offset);

          }
        });

      });

    </script>
		
    </body>
</html>