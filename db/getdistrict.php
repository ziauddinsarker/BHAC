<?php 

$q=$_GET["q"]; 

include('config.php'); 

$sql="SELECT district.district_name FROM district INNER JOIN division ON district.division = division.division_id WHERE division.division_name = '$q'"; 

$result = mysql_query($sql); 

// This is helpful for debugging
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

?>

<!--District Button Group-->	
<div class="col-md-1 col-md-offset-2">
	<h4>District</h4>
</div>

<div class="col-md-6">						
	<div class="btn-group" data-toggle="buttons" id="district">                                 
		
		<?php

			while ($row = mysql_fetch_array($result)){ 
			$district_name = $row["district_name"];										
			echo "<label class=\"btn btn-primary\">";
			echo "<input type=\"radio\" name=\"district\" class=\"track-order-change\" id=". strtolower($district_name) ." value=".$row['district_name']." onchange='showThana(this.value)'>";
			echo  $district_name;
			echo "</label>";
			}									
		?> 	
	</div>
</div>
<?php
mysql_close($conn); 
?> 