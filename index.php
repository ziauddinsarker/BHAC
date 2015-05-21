<?php //Database Configuration File
    include 'db/config.php';
	$sql_division = "SELECT division.division_name FROM division ORDER BY division_name ASC";
	$division = mysql_query($sql_division, $conn) or die ('Problem with query' . mysql_error());
?>
<?php include 'templates/header.php';?>	
		
			<section class="shop-result medicine-result">
				
			<article class="row">					
			
            <div role="tabpanel" id="main-tab">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
			  <li role="presentation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
              <li role="presentation" class="active"><a href="#price" aria-controls="home" role="tab" data-toggle="tab">Find Medicine Price</a></li>
              <li role="presentation"><a href="#events" aria-controls="profile" role="tab" data-toggle="tab">Find Social Event</a></li>
              <li role="presentation"><a href="#doctor" aria-controls="messages" role="tab" data-toggle="tab">Find Doctors</a></li>
              <li role="presentation"><a href="#discount" aria-controls="messages" role="tab" data-toggle="tab">Find Discount</a></li>
              <li role="presentation"><a href="#blog" aria-controls="settings" role="tab" data-toggle="tab">Blog & News</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
			<div role="tabpanel" class="tab-pane" id="about">
			<div class="row">
				<div class="col-md-6 about-page">
				<h3>What we do:</h3>
				<p>Our idea is to mix “Healthcare” and “Social branding” together to bring free healthcare services to the people. We also provide graphical information on medicine prices that help people to compare prices and reduce their cost of treatment. </p>
				<h3>What Social Branding is:</h3>
				<p>Here we define social branding as: what roles an entity or company would play through social media, social events or campaigns in people’s lives to increase their brand value. </p>
				<h3>How we work with “Healthcare” and “Social branding” together: </h3>
				<p>We work with any entity or company who are related to healthcare industry. Our endeavor is to search, recognise and rate the voluntary services of them in healthcare and ultimately bring forward healthcare services to the people at free of charge. We invite and encourage any hospital, clinic, pharmaceutical company, medicine shop, fitness center, therapy center, medical-diagnostic center, NGO, pharmacist, dentist, dietician and doctor to contribute in healthcare for the people as a part of their social responsibility to increase their rating on social branding. 
				Each time any entity or company arrange any social event to contribute in healthcare and inform us with evidence, we recognise, make rating and publish that on our site so that people can know their rating on social branding. We give a rating of 10 points for every hour they voluntarily spend for healthcare contribution for the people of the society.</p>
				<h3>What you would find here:</h3>
				
				<ul>
					<li>Information on the prices of medicines, price-comparison graph, and healthcare offers or discounts that are available in Bangladesh.</li>
					<li>Free healthcare or medical consultancy services form the social events whenever arranged by any entity or company.</li>
					<li>Directories and evidence based ratings on social branding for the entities or companies who are related to healthcare industry.</li>
					<li>Blogs, reviews, articles, disease FAQs, and news on healthcare.</li>
				</ul>
				
				<h3>The reasons of our activities are:</h3>
				<ul>
					<li>To help the people to reduce their cost of treatment by comparing the prices of the same drugs from different companies.</li>
					<li>To divert some of the spending on branding by the healthcare companies to social branding to bring free healthcare services to the people.</li>
					<li>To show who has more voluntary contributions in healthcare.</li>
					<li>To give options to the people for choosing an alternative entity or company based on their rating on social branding caused by their free healthcare services.</li>
				</ul>
				</div>
				
				<div class="col-md-6 about-page">
					<h3>Who we are:</h3>
					<p>We began this startup “Bhalo-Achee.com” in 2015 as a team. Our team members are of different professional backgrounds who opt to work relentlessly for healthcare for the general people. But yet we look and ask for interested people or partners to make them join into our team to devise more ideas and bring more services at free of charge for the welfare of the people.</p>
					<h3>Background behind the idea of mixing “Healthcare” and “Social branding” together:</h3>
					<p>Many studies suggest that “medical representatives (MR)” used for the pharmaceutical marketing and “Low health knowledge” of patients may make a doctor biased in writing “drug prescriptions” which may cause higher cost of treatment as the exact same medicine in a prescription may have lower price from other manufacturing companies. Therefore, as many people in our country are not aware of how the prices vary for the exact same medicine, we have become interested to bring a graph of prices for the same drugs so that the people can compare the prices and make their own choice in buying the exact same drug from the other companies to reduce their cost of treatment.</p>
					<p>Also we think, in case, when a company offers higher price for an exact same drug, people may feel interested to make their own choice in buying that medicine based on the rating on “social branding” of the company caused by their free healthcare services. In this way, we think we can help the people to reduce their higher cost of treatment in general that may occur because of the influence of “medical representatives (MR)” of the pharmaceutical companies and “Low health knowledge” of the patients.</p>
					<h3>Our vision:</h3>
					<p>To raise the spirit of healthcare contribution among the entities or companies operating in healthcare industry where they would compete to get higher rating on their social branding by bringing healthcare services to the people at free of charge and finally make the entities or companies and the people mutually benefitted.</p>
					<h3>Legal notice:</h3>
					<p>All the given information about the drugs herein on Bhalo-Achee.com are collected from different reliable sources and intended for educational purpose only. No one should do any medical practice based on these given information. In addition, the database can sometimes contain errors. Bhalo-Achee.com does not provide any medical advice or treatment. </p>
					<h3>Copyright:</h3>
					<p>We reserve no rights to spread the knowledge among the people feely, however, we request you to use proper citation when you use any content which is originally published on www.bhalo-achee.com.</p>

				</div>
			</div>
			
			
			
			
			</div>
                <div role="tabpanel" class="tab-pane active" id="price">
                    <div class="result-medicine" id="shop-result" >
						
						<article class="row">
							<form class="form-inline large-search form-search form-emphasis" role="form" method="post"  action="getshop.php">
								<div class="col-md-6 col-md-offset-2">
									<div class="form-group table-input">
									   <label class="sr-only" for="name">Tablet Name</label>
									   <input type="text" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false" name="name" id="name" placeholder="Enter Brand Name or Generic Name">
									</div>
								</div>	
							</form>
						</article>
					
						<article class="row" id="div-dis-tha">
							<div class="col-md-1 col-md-offset-2">
							<h4>Division</h4>
							</div>
								<div class="col-md-7">
								
									<div class="btn-group" data-toggle="buttons" id="division"> 
											<?php
										
												while ($row = mysql_fetch_array($division)){ 
												$divsion_name = $row["division_name"];										
												echo "<label class=\"btn btn-primary\">";
												echo "<input type=\"radio\" name=\"division\" class=\"track-order-change\" id=". strtolower($divsion_name) ." value=".$row['division_name']." onchange='showDistrict(this.value)'>";
												echo  $divsion_name;
												echo "</label>";
												}									
											?>
										<!--	
											<label class="btn btn-primary">
											  <input type="radio" name="radios" class="track-order-change" id="chittagong">
											  Chittagong
											</label>
										-->
									</div>
								</div>
						</article>						
					</div>
                </div>
				
				<!--Event Tab-->
              <div role="tabpanel" class="tab-pane" id="events">
			  
			  <div class="row event-single">
				<div class="col-md-4">
				<h5>Location: Dhaka</h5>
				<h5>Shop: M/S Medicine Shop</h5>
				<h5>Date: 29-04-15</h5>
				<h5>Time: 12:00pm</h5>
				</div>
				<div class="col-md-8">
				<h2>Dr. Asfaq Ullah</h2>
				<p>Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum
				 Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum</p>
				 </div>				
			  </div>
			  <div class="row event-single">
				<div class="col-md-4">
				<h5>Location: Dhaka</h5>
				<h5>Shop: M/S Medicine Shop</h5>
				<h5>Date: 29-04-15</h5>
				<h5>Time: 12:00pm</h5>
				</div>
				<div class="col-md-8">
				<h2>Dr. Asfaq Ullah</h2>
				<p>Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum
				 Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum</p>
				 </div>				
			  </div>
			  
			  </div>
              <div role="tabpanel" class="tab-pane" id="doctor">No Doctors Found</div>
              <div role="tabpanel" class="tab-pane" id="discount">No Discount</div>
              <div role="tabpanel" class="tab-pane" id="blog">No Blog</div>
            </div>

          </div>
    
				</article>
			</section>


			<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
				<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
					<ul class="cd-switcher">
						<li><a href="#0">Sign in</a></li>
						<li><a href="#0">New account</a></li>
					</ul>

					<div id="cd-login"> <!-- log in form -->
						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-email" for="signin-email">E-mail</label>
								<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="signin-password">Password</label>
								<input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
								<a href="#0" class="hide-password">Hide</a>
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input type="checkbox" id="remember-me" checked>
								<label for="remember-me">Remember me</label>
							</p>

							<p class="fieldset">
								<input class="full-width" type="submit" value="Login">
							</p>
						</form>
						
						<p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
						<!-- <a href="#0" class="cd-close-form">Close</a> -->
					</div> <!-- cd-login -->

					<div id="cd-signup"> <!-- sign up form -->
						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-username" for="signup-username">Username</label>
								<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-email" for="signup-email">E-mail</label>
								<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="signup-password">Password</label>
								<input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
								<a href="#0" class="hide-password">Hide</a>
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input type="checkbox" id="accept-terms">
								<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
							</p>

							<p class="fieldset">
								<input class="full-width has-padding" type="submit" value="Create account">
							</p>
						</form>

						<!-- <a href="#0" class="cd-close-form">Close</a> -->
					</div> <!-- cd-signup -->

					<div id="cd-reset-password"> <!-- reset password form -->
						<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-email" for="reset-email">E-mail</label>
								<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input class="full-width has-padding" type="submit" value="Reset password">
							</p>
						</form>

						<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
					</div> <!-- cd-reset-password -->
					<a href="#0" class="cd-close-form">Close</a>
				</div> <!-- cd-user-modal-container -->
			</div> <!-- cd-user-modal -->
			
			<!--			
			<section class="container-full">		
					<h4>THE BOTTOM LINE</h4>
					<p>Don’t go to the pharmacy without checking drug prices at Bhaloaachee.com first.</p>
			</section>
			-->
		</div>

	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>

<?php include 'templates/footer.php';?>	