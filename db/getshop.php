<?php

$q=$_GET['q'];
$name=$_GET['name'];

/*
echo "Thana: " .$q;
echo "name: " .$name;
*/
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



//Shop Sql Query
$shopsql = "SELECT shop.shop_name, shop.shop_address, shop.twenty_four_hours, shop.`call`, shop.home_delivery, thana.thana_name FROM shop INNER JOIN thana ON shop.thana = thana.thana_name WHERE thana.thana_name = '$q'";  
//Brand/Drag Sql Query
$brandsql ="SELECT brand.brand_name, brand.brand_description,  generic.generic_name FROM brand INNER JOIN generic ON brand.generic_name_fk = generic.generic_name WHERE brand.brand_name = '$name'";
//Form SQL Query
$formsql="SELECT drug_form.drug_form_name, drags.brand_name FROM drug_form INNER JOIN drug_form_mut ON drug_form_mut.drug_form = drug_form.drug_form_id INNER JOIN drags ON drug_form_mut.drug_name = drags.drag_id WHERE drags.brand_name = '$name'";
//Price SQL Query
//$pricesql="SELECT drags.brand_name, price.drags_price, price.strength, price.quantity, generic.generic_name, company.company_name FROM drags INNER JOIN price ON drags.fk_price = price.price_id INNER JOIN generic ON drags.fk_generic_name = generic.generic_id INNER JOIN company ON drags.fk_company_name = company.company_id WHERE generic.generic_name = (SELECT generic.generic_name  FROM drags INNER JOIN generic ON drags.fk_generic_name = generic.generic_id WHERE drags.brand_name = '$name')";
$pricesql="SELECT brand.brand_name, form.form_name,strength.strength_name, brand_strength_form_price.price, generic.generic_name, company.company_name,pack.packsize_quantity FROM brand_strength_form_price INNER JOIN brand ON brand_strength_form_price.brand_name_fk = brand.brand_name INNER JOIN form ON brand_strength_form_price.form_name_fk = form.form_name INNER JOIN strength ON brand_strength_form_price.strength_name_fk = strength.strength_name INNER JOIN pack ON brand_strength_form_price.packsize_fk = pack.packsize_name INNER JOIN generic ON brand.generic_name_fk = generic.generic_name INNER JOIN company ON brand.company_fk = company.company_name WHERE generic.generic_name = (SELECT generic.generic_name FROM generic INNER JOIN brand ON brand.generic_name_fk = generic.generic_name WHERE brand.brand_name = '$name') ORDER BY brand_strength_form_price.price DESC";


$strengthsql ="SELECT drug_strength.drug_strength_name, drags.brand_name FROM drug_strength_mut INNER JOIN drug_strength ON drug_strength_mut.drug_strength_name = drug_strength.drug_strength_id INNER JOIN drags ON drug_strength_mut.drugs_name = drags.drag_id WHERE drags.brand_name = '$name'";


//Shop SQL result
$shopsqlrs = $conn->query($shopsql); 
//Brand SQL result
$brandsqlrs = $conn->query($brandsql); 
//Form SQL result
$formsqlrs = $conn->query($formsql); 
//Price SQL result
$pricesqlrs = $conn->query($pricesql);

$strengthsqlrs = $conn->query($strengthsql);
?>
					
					               

								<!-- Medicine Description -->
								<article class="row medicine-description">
									<div class="col-md-2 medicine-desc-image">
										<img class="img-responsive" src="images/naftin.jpg" alt="" />
									</div>
									<div class="col-md-10">
									<?php								
										//shop information
										if ($brandsqlrs->num_rows > 0) {
											// output data of each row
											while($row = $brandsqlrs->fetch_assoc()) {
												echo "<h3><a href=\"#\">" . $row['brand_name'] . " </a> <span class=\"medicine-result-generic\">(<a href=\"#\" id=\"genericname\">". $row['generic_name']."</a>)</span></h3>";
												echo "<p>".$row['brand_description']. "</p>";
												}
											}
										else {
												echo "0 results";
											}
									?>
									</div>
								</article>
								
								
								
								<article class="row">
								<!-- Shop Details -->
									<div class="col-md-4 col-md-offset-1 shop-single" id="infinite-result-shop">
									
									<!--Shop info will go there-->									
										<!--This is Result -->
										<div id="loader_image"><img src="loader.gif" alt="" width="24" height="24"> Loading...please wait</div>
										<div class="margin10"></div>
										<div id="loader_message"></div>
										<!--This is End of the Result -->
									</div>
									
									<!-- Medicine Description -->
									<div class="col-md-7 medicine-price-graph" id="price-filter">									
										<?php											
											//Medicine information Graph
											if ($pricesqlrs->num_rows > 0) {
												// output data of each row
												while($row = $pricesqlrs->fetch_assoc()) {	
												
												$price = $row["price"]/$row["packsize_quantity"];
												
												echo "<div>";
													echo '<h5><a href="#">' . $row["brand_name"] . '</a><span class="brand-rating"> <a href="">(2)</a></span>
													<br/><a href="#"> ' . $row["company_name"] .  '</a><span class=" brand-rating company-rating"> <a href="#">(2)</a></span></h5>';
													echo '<div class="progress">';
													echo '<div class="progress-bar" style="width: ' . $price . '%;">';
													echo '</div>';
													echo '<span>'. $row["brand_name"] .' </span>';										
												echo "</div>";
											echo "</div>";
												}
											} else {
												echo "Please Search by Brand Name or Generic Name then you can see the Graph";
											}				
										?>
									 </div>	
								 </article>

<?php
$conn->close();
?> 