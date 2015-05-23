<?php 
include('config.php');
$thana=$_GET["thana"]; 
$sql="SELECT thana.thana_name FROM thana INNER JOIN district ON thana.district_name = district.district_id WHERE district.district_name = '$thana'"; 
$result = mysql_query($sql); 

// This is helpful for debugging
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

?>

<!--Thana Button Group-->	
<div class="col-md-1 col-md-offset-2">
	<h4>Thana</h4>
</div>

<div class="col-md-6">
<div class="btn-group" data-toggle="buttons" id="thana">	
		<?php	
			while ($row = mysql_fetch_array($result)){ 
			$thana_name = $row["thana_name"];										
			echo "<label class=\"btn btn-primary\">";
			echo "<input type=\"radio\" name=\"thana\" class=\"track-order-change\" id=". strtolower($thana_name) ." value=".$row['thana_name']." onchange='showShop(this.value)'>";
			echo  $row['thana_name'];
			echo "</label>";
			}									
		?> 	
	</div>

<?php
mysql_close($conn); 
?> 