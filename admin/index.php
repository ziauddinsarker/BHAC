<?php //Database Configuration File
    include './../db/config.php';
?>
<?php include './../templates/header.php';?>	
		
			<section class="shop-result medicine-result">
				
			<article class="row">					
			
            <div role="tabpanel" id="main-tab">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
			  <li role="presentation"><a href="#admin" aria-controls="about" role="tab" data-toggle="tab">Admin</a></li>
              <li role="presentation" class="active"><a href="#medicine" aria-controls="home" role="tab" data-toggle="tab">Medicine</a></li>
              <li role="presentation"><a href="#medicine-shop" aria-controls="profile" role="tab" data-toggle="tab">Shop</a></li>
              <li role="presentation"><a href="#doctor" aria-controls="messages" role="tab" data-toggle="tab">Doctor</a></li>
              <li role="presentation"><a href="#user" aria-controls="messages" role="tab" data-toggle="tab">Users</a></li>
              <li role="presentation"><a href="#blog" aria-controls="settings" role="tab" data-toggle="tab">Blog</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
				<div role="tabpanel" class="tab-pane" id="admin">
				
				</div>
                <div role="tabpanel" class="tab-pane active" id="medicine">
                    
                </div>
				
				<!--Event Tab-->
              <div role="tabpanel" class="tab-pane" id="medicine-shop">			
			  
			  </div>
              <div role="tabpanel" class="tab-pane" id="doctor">No Doctors Found</div>
              <div role="tabpanel" class="tab-pane" id="user">No user</div>
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

<?php include './../templates/footer.php';?>	