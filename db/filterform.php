<?php 
include('config.php');

$form=$_GET["form"]; 

$genericname=$_GET['genericname'];

$servername = "localhost";
$username = "bhaloachee";
$password = "19A14t1&";
$dbname = "bhaloach_dev";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql="SELECT drug_form.drug_form_name, drags.brand_name, generic.generic_name FROM drug_strength_form_name INNER JOIN drug_form ON drug_strength_form_name.form_name = drug_form.drug_form_id INNER JOIN drags ON drug_strength_form_name.drug_name = drags.drag_id INNER JOIN generic ON drags.fk_generic_name = generic.generic_id WHERE drug_form.drug_form_name = '$form' AND generic.generic_name='$genericname'"; 
//$result = mysql_query($sql); 

$pricesql="SELECT drags.brand_name FROM drug_strength_form_name INNER JOIN drug_form ON drug_strength_form_name.form_name = drug_form.drug_form_id INNER JOIN drags ON drug_strength_form_name.drug_name = drags.drag_id INNER JOIN generic ON drags.fk_generic_name = generic.generic_id WHERE drug_form.drug_form_name = '$form' AND generic.generic_name='$genericname'";
//Price SQL result
$pricesqlrs = $conn->query($pricesql);

											
			//Medicine information Graph
			if ($pricesqlrs->num_rows > 0) {
				// output data of each row
				while($row = $pricesqlrs->fetch_assoc()) {	
				
				echo "<div>";
					echo '<h5><a href="#">' . $row["brand_name"] . '</a><span class="brand-rating"> <a href="">(2)</a></span><a href="#"> </a><span class="company-rating"> <a href="#">(2)</a></span></h5>';
					echo '<div class="progress">';
					//echo '<div class="progress-bar" style="width: ' . $price . '%;">';
					echo '</div>';
					//echo '<span>'. $row["brand_name"] .' &#2547; ' . $price .  ' </span>';										
				echo "</div>";
			echo "</div>";
				}
			} else {
				echo "There are no graph for form or Strength filter";
			}				
		
mysqli_close($conn); 
?> 