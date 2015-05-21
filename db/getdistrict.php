<?php 

$q=$_GET["q"]; 

include('config.php'); 

$sql="SELECT  districs.distric_name,  division.division_name FROM  districs INNER JOIN division ON districs.fk_division = division.division_id WHERE division.division_name = '$q'"; 

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
			$district_name = $row["distric_name"];										
			echo "<label class=\"btn btn-primary\">";
			echo "<input type=\"radio\" name=\"district\" class=\"track-order-change\" id=". strtolower($district_name) ." value=".$row['distric_name']." onchange='showThana(this.value)'>";
			echo  $district_name;
			echo "</label>";
			}									
		?> 	
	</div>
</div>
<?php
mysql_close($conn); 
?> 