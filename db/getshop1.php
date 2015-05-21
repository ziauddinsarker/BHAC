<?php

$q=$_GET['q'];
$name=$_GET['name'];

/*
echo "Thana: " .$q;
echo "name: " .$name;
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "va_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//item per group for Auto load
$items_per_group = 20;

$shopcount = "SELECT Count(*) AS t_records FROM medicin_shop INNER JOIN thana ON medicin_shop.fk_thana = thana.thana_id WHERE thana.thana_name = '$q'";
$shopcountrs = $conn->query($shopcount); 
$total_records = $shopcountrs->fetch_object();
$total_groups = ceil($total_records->t_records/$items_per_group);


$shopsql = "SELECT medicin_shop.shop_name, medicin_shop.shop_address, medicin_shop.cell,thana.thana_name FROM medicin_shop INNER JOIN thana ON medicin_shop.fk_thana = thana.thana_id WHERE thana.thana_name = '$q'";  
$brandsql ="SELECT drags.brand_name, generic.generic_name, company.company_name,price.drags_price, price.strength, price.quantity,price.form FROM drags INNER JOIN generic ON drags.fk_generic_name = generic.generic_id INNER JOIN company ON drags.fk_company_name = company.company_id INNER JOIN price ON drags.fk_price = price.price_id WHERE drags.brand_name = '$name' LIMIT 1";
$formsql="SELECT price.form, drags.brand_name, price.strength FROM drags INNER JOIN price ON drags.fk_price = price.price_id WHERE drags.brand_name = '$name'";
$pricesql="SELECT drags.brand_name, price.drags_price, price.strength, price.quantity, generic.generic_name, company.company_name FROM drags INNER JOIN price ON drags.fk_price = price.price_id INNER JOIN generic ON drags.fk_generic_name = generic.generic_id INNER JOIN company ON drags.fk_company_name = company.company_id WHERE generic.generic_name = (SELECT generic.generic_name  FROM drags INNER JOIN generic ON drags.fk_generic_name = generic.generic_id WHERE drags.brand_name = '$name')";

$shopsqlrs = $conn->query($shopsql); 
$brandsqlrs = $conn->query($brandsql); 
$formsqlrs = $conn->query($formsql); 
$pricesqlrs = $conn->query($pricesql); 
?>
					<div class="row">
						<div class="row">
							<?php
								//shop information
								if ($brandsqlrs->num_rows > 0) {
									// output data of each row
									while($row = $brandsqlrs->fetch_assoc()) {								
										
										echo '<div class="brand-block">';
											echo '<h2>' . $row["brand_name"] . '<span>(30)</span></h2>';
											echo '<p>Generic Name: '. $row["generic_name"] . '<p>';
											echo '<p>Price: ' . $row["drags_price"] . '</p>';
											echo '<p>Strength: ' . $row["strength"] . '</p>';
											echo '<p>form: ' . $row["form"] . '</p>';
										echo '</div>';	
									}
								} else {
									echo "Please Go Back and Search by Brand Name Or Generic Name";
								}
							?>
						</div>
						
						<div class="row">
							<div class="package-block col-md-4">
							<h3>Form</h3>
							<div class="btn-group " data-toggle="buttons" id="thana">                                
								<?php
								
								//shop information
								if ($formsqlrs->num_rows > 0) {
									// output data of each row
									while($row = $formsqlrs->fetch_assoc()) {								
								
									echo "<label class=\"btn btn-primary\">";
									echo "<input type=\"radio\" name=\"form\" class=\"track-order-change\" id=". strtolower($row['form']) ." value=".$row['form']." onchange='showShop(this.value)'>";
									echo  $row['form'];
									echo "</label>";
									
										
										{ ?> 	
							</div>
						</div>
											
						<div class="col-md-8">
							<h3>Strength</h3>
							<div class="btn-group " data-toggle="buttons" id="thana">                                
								<?php }
									echo "<label class=\"btn btn-primary\">";
									echo "<input type=\"radio\" name=\"strength\" class=\"track-order-change\" id=". strtolower($row['strength']) ." value=".$row['strength']." onchange='showShop(this.value)'>";
									echo  $row['strength'];
									echo "</label>";
									}
								} else {
									echo "0 results";
								}				
								?> 	
							</div>
							
						</div>
					</div>						
					</div>
					<!-- Second Part of the Content -->
                    <div class="row shop">					
						<h2>Shop</h2>
                        <div class="col-md-5">	
							<div class="row shop-with-icon">
							<?php
							//shop information
							if ($shopsqlrs->num_rows > 0) {
								// output data of each row
								while($row = $shopsqlrs->fetch_assoc()) {
									echo '<div class="shop-list row">';
										echo '<h5>' . $row["shop_name"] . '<span>(30)</span></h5>';
										echo '<p>Location: '. $row["shop_address"] . '<p>';
										echo '<p>Phone: ' . $row["cell"] . '</p>';
										echo '<p>Thana: ' . $row["thana_name"] . '</p>';
										echo '<div class="shop-icons">';
									 echo '<p><span class="glyphicon glyphicon-home"></span><span class="glyphicon glyphicon-earphone"></span><span class="glyphicon glyphicon-print"></span></p>';
									echo '</div>';
									echo '</div>';
									
								}
							} else {
								echo "0 results";
							}

							?>
							</div>							
						</div>
						
						<div class="col-md-7 right-sidebar">						
						
							<h3>Graph</h3>
							<div class="right-sidebar">
							
							<?php
								
								//shop information
								if ($pricesqlrs->num_rows > 0) {
									// output data of each row
									while($row = $pricesqlrs->fetch_assoc()) {	
									
									$price = $row["drags_price"]/$row["quantity"];
									
									echo "<div>";	
									echo "<h5>". $row["brand_name"] . "- (". $row["company_name"] . ") </h5>";
									echo "<div class=\"progress\">";								
									echo '<div class="progress-bar" style="width:' . $price .'%;"></div>';	
									echo "<span>&#2547; " . $price . "</span>";
									echo "</div>";
								echo "</div>";
									}
								} else {
									echo "Please Search by Brand Name or Generic Name then you can see the Graph";
								}				
								?> 
						
							</div>
							
						</div>
				
                    </div>



<?php
$conn->close();
?> 