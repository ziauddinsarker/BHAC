<?php include 'templates/header.php';?>				
		
			<section class="shop-result medicine-result">
				
			<article class="row">					
			
            <div role="tabpanel" id="main-tab">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
              <li role="presentation"><a href="#price" aria-controls="home" role="tab" data-toggle="tab">Find Price</a></li>
              <li role="presentation"><a href="#events" aria-controls="profile" role="tab" data-toggle="tab">Event</a></li>
              <li role="presentation"><a href="#discount" aria-controls="messages" role="tab" data-toggle="tab">Discount</a></li>
              <li role="presentation"><a href="#blog" aria-controls="settings" role="tab" data-toggle="tab">Blog</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
				<!-- About Tab -->
				<div role="tabpanel" class="tab-pane" id="about">About</div>
				
				<!-- Price Tab -->
                <div role="tabpanel" class="tab-pane active" id="price">
                    <div class="row result-medicine">
					
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
				
				<article class="row">
				<div class="col-md-1 col-md-offset-2">
				<h4>Division</h4>
				</div>
					<div class="col-md-6">
					
						<div class="btn-group" data-toggle="buttons" id="division"> 
							<label class="btn btn-primary">
							  <input type="radio" name="radios" class="track-order-change" id="chittagong">
							  Chittagong
							</label>
							
							<label class="btn btn-primary">
							  <input type="radio" name="radios" class="track-order-change" id="dhaka" value="">
							  Dhaka
							</label>
							
							<label class="btn btn-primary">
							  <input type="radio" name="radios" class="track-order-change" id="khulna">
							Khulna
							</label>
							
							<label class="btn btn-primary">
							  <input type="radio" name="radios" class="track-order-change" id="rajshahi">
							Rajshahi
							</label>	
									
							<label class="btn btn-primary">
							  <input type="radio" name="radios" class="track-order-change" id="rangpur">
							Rangpur
							</label>
							
							<label class="btn btn-primary">
							  <input type="radio" name="radios" class="track-order-change" id="sylhet">
							Sylhet
							</label>
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
              <div role="tabpanel" class="tab-pane" id="discount">No Discount</div>
              <div role="tabpanel" class="tab-pane" id="blog">No Blog</div>
            </div>

          </div>
    
				</article>
			</section>
		
		</div>

	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>
	
<?php include 'templates/footer.php';?>	