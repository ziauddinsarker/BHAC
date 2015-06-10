<?php //Database Configuration File
    include 'db/config.php';
	$sql_doc_cat = "SELECT doctors_category.doctors_category_name FROM doctors_category ORDER BY doctors_category_name ASC";
	$doc_cat = mysql_query($sql_doc_cat, $conn) or die ('Problem with query' . mysql_error());
?>
<?php include 'templates/header.php';?>	
		
			<section class="signup">
				
			<article class="row">					
			
				<div role="tabpanel" id="main-tab">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				
				  <li role="presentation" class="active"><a href="#doctors" aria-controls="home" role="tab" data-toggle="tab">Doctors SignUp</a></li>
				  <li role="presentation"><a href="#company" aria-controls="profile" role="tab" data-toggle="tab">Company Signup</a></li>
				  
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="doctors">
						<form method="post" action="signup-process.php">
							<div class="form-group">
							<!-- the name input field -->
								<label for="login_input_name">Name(Full Name)</label>
								<input id="login_input_name" class="form-control login_input" type="text" name="fullname" />
							</div>
							
							<div class="form-group">
								<!-- the Title/Degree input field -->
								<label for="login_input_title">Title/Degree</label>
								<input id="login_input_title" class="form-control login_input" type="text" name="title" />
							</div>
							
							<div class="form-group">
								<!-- the Gender input field -->
								<label for="login_input_gender">Gender</label>	
								<input id="login_input_male" type="radio" name="gender" value="male">Male
								<input id="login_input_female" type="radio" name="gender" value="female">Female
							</div>
							
							<div class="form-group">
								<!-- the BDMC input field -->
								<label for="login_input_bmdc">BMDC No.</label>
								<input id="login_input_bmdc" class="form-control  login_input" type="text" name="bmdc" />
							</div>
							
							<div class="form-group">
								<!-- the email input field uses a HTML5 email type check -->
								<label for="login_input_email">Email Address</label>
								<input id="login_input_email" class="form-control  login_input" type="email" name="user_email" required />
							</div>
							
							<div class="form-group">
								<!-- the Phone input field -->
								<label for="login_input_phone">Phone</label>
								<input id="login_input_phone" class="form-control login_input" type="text" name="phone" />
							</div>
							
							<div class="form-group">
								<!-- the Specialist input field -->
								<label for="login_input_specialist">Speciality</label>								
								
								<?php
									echo "<select class=\"form-control\" name=\"specialist\" id=\"sel1\">";	
									
									while ($row = mysql_fetch_array($doc_cat)){ 
									$doctors_category_name = $row["doctors_category_name"];									
										echo "<option>" . $doctors_category_name . "</option>"; 							
									}	
									echo "</select>";								
								?>
							</div>	
															
							<div class="form-group">
								<!-- the Address input field -->
								<label for="login_input_address">Address</label>
								<input id="login_input_address" class="form-control login_input" type="textarea" name="address" rows="4" cols="20" />
							</div>
							
							<div class="form-group">
								<!-- the Address input field --><!-- the Address input field --><!-- the Address input field --><!-- the Address input field -->
								<label for="login_input_district">District</label>
								<input id="login_input_district" class="form-control login_input" type="text" name="district" rows="4" cols="20" />
								<!-- the Address input field --><!-- the Address input field --><!-- the Address input field --><!-- the Address input field -->
							</div>
							
							<div class="form-group">
								<!-- the user name input field uses a HTML5 pattern check -->
								<label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
								<input id="login_input_username" class="form-control login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
							</div>
							
							<div class="form-group">
								<!-- the Password input field -->
								<label for="login_input_password_new">Password (min. 6 characters)</label>
								<input id="login_input_password_new" class="form-control login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
							</div>
							
							<div class="form-group">
								<label for="login_input_password_repeat">Repeat password</label>
								<input id="login_input_password_repeat" class="form-control login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
							</div>
							<!-- the Submit input field -->
							<input type="submit"  name="registerDoctor" value="Register" />

							</form>
					</div>
					
					<div role="tabpanel" class="tab-pane" id="company">
						No Doctors Found
					</div>				  
				</div>
				<!-- Tab panes end -->
			  </div>  
			  
			</article>
			
		</section>


			
		</div>

	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>

<?php include 'templates/footer.php';?>	