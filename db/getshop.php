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
$shopsql = "SELECT medicin_shop.shop_name, medicin_shop.shop_address, medicin_shop.cell,thana.thana_name FROM medicin_shop INNER JOIN thana ON medicin_shop.fk_thana = thana.thana_id WHERE thana.thana_name = '$q'";  
//Brand/Drag Sql Query
$brandsql ="SELECT drags.brand_name, drags.brand_description, generic.generic_name FROM drags INNER JOIN generic ON drags.fk_generic_name = generic.generic_id WHERE drags.brand_name = '$name'";
//Form SQL Query
$formsql="SELECT drug_form.drug_form_name, drags.brand_name FROM drug_form INNER JOIN drug_form_mut ON drug_form_mut.drug_form = drug_form.drug_form_id INNER JOIN drags ON drug_form_mut.drug_name = drags.drag_id WHERE drags.brand_name = '$name'";
//Price SQL Query
$pricesql="SELECT drags.brand_name, price.drags_price, price.strength, price.quantity, generic.generic_name, company.company_name FROM drags INNER JOIN price ON drags.fk_price = price.price_id INNER JOIN generic ON drags.fk_generic_name = generic.generic_id INNER JOIN company ON drags.fk_company_name = company.company_id WHERE generic.generic_name = (SELECT generic.generic_name  FROM drags INNER JOIN generic ON drags.fk_generic_name = generic.generic_id WHERE drags.brand_name = '$name')";


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
								
								<!-- Medicine Verity -->
								<article class="row medicine-verity">					
									<div class="form-block col-md-4">
										<h5>Form</h5>
										<div class="btn-group" data-toggle="buttons">
											<?php								
												//shop information
												if ($formsqlrs->num_rows > 0) {
													// output data of each row
													while($row = $formsqlrs->fetch_assoc()) {								
												
													echo "<label class=\"btn btn-primary\">";
													echo "<input type=\"radio\" name=\"form\" class=\"track-order-change\" id=". strtolower($row['drug_form_name']) ." value=\"{$row['drug_form_name']}\" onchange='filterForm(this.value)'>";
													echo  $row['drug_form_name'];
													echo "</label>";													
													}
												}
													else {
													echo "0 results";
													}
																									
												?>
										</div>
									</div>
									
									<div class="strength-block col-md-4">
										<h5>Strength</h5>
										<div class="btn-group" data-toggle="buttons">   
											<?php								
												//shop information
												if ($strengthsqlrs->num_rows > 0) {
													// output data of each row
													while($row = $strengthsqlrs->fetch_assoc()) {								
												
													echo "<label class=\"btn btn-primary\">";
													echo "<input type=\"radio\" name=\"form\" class=\"track-order-change\" id=". strtolower($row['drug_strength_name']) ." value=".$row['drug_strength_name']." onchange='showShop(this.value)'>";
													echo  $row['drug_strength_name'];
													echo "</label>";													
													}
												}
													else {
													echo "0 results";
													}
																									
												?>											
										</div>
									</div>
									
									<div class="col-md-4">
									<div id="map-canvas"></div>
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
												
												$price = $row["drags_price"]/$row["quantity"];
												
												echo "<div>";
													echo '<h5><a href="#">' . $row["brand_name"] . '</a><span class="brand-rating"> <a href="">(2)</a></span>
													<br/><a href="#"> ' . $row["company_name"] .  '</a><span class=" brand-rating company-rating"> <a href="#">(2)</a></span></h5>';
													echo '<div class="progress">';
													echo '<div class="progress-bar" style="width: ' . $price . '%;">';
													echo '</div>';
													echo '<span>'. $row["brand_name"] .' &#2547; ' . $price .  ' </span>';										
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