<!--
Numan Ibn Mazid
NCC ID: 00160542
-->
<!DOCTYPE html>
<html lang="en">
		<!--head-area-->
			<?php include_once 'template/head.php' ?>
		<!--//head-area-->
	<body>

		<!--header-area-->
			<?php include_once 'template/header.php' ?>
		<!--//header-area-->


<!-- TEST SESSION -->
<div class="welcome"> 
		<div class="container"> 
			<div class="welcome-info">

<!-- TEST SESSION -->				
<!-- <?php
   foreach($_SESSION as $result){
    print_r($result);
}
?> -->

<!-- TEST SESSION -->
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class=" nav-tabs" role="tablist">
						<style type="text/css">
							input[type=button], input[type=submit], input[type=reset] {
							    border : solid 0px #4d084d;
								border-radius : 9px 0px 7px 4px ;
								moz-border-radius : 9px 0px 7px 4px ;
								-webkit-box-shadow : 5px 5px 0px rgba(0,0,0,0.2);
								-moz-box-shadow : 5px 5px 0px rgba(0,0,0,0.2);
								box-shadow : rgb(163, 212, 255);
								font-size : 19px;
								color : #70fff5;
								margin-top: 12px;
								padding : 1px 10px;
								background : #1ba853;
								background : -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1ba853), color-stop(50%,#000000), color-stop(100%,#addbff));
								background : rgb(163, 212, 255);
								background : -webkit-linear-gradient(top, #1ba853 0%, #000000 50%, #addbff 100%);
								background : -o-linear-gradient(top, #1ba853 0%, #000000 50%, #addbff 100%);
								background : -ms-linear-gradient(top, #1ba853 0%, #000000 50%, #addbff 100%);
								background : linear-gradient(top, #1ba853 0%, #000000 50%, #addbff 100%);
								filter : progid:DXImageTransform.Microsoft.gradient( startColorstr='#1ba853', endColorstr='#addbff',GradientType=0 );
}
						</style>

						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" >
							<i class="fa fa-cubes" aria-hidden="true"></i> 
							<h5>USER</h5>
						<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
								<input type="button" name="" onclick="location.href='checkoutUser.php';" value="Checkout as Registered User" />
						<?php }else {?>
								<input type="button" name="" onclick="location.href='login.php';" value="Checkout as Registered User" />
						<?php } ?>
							</a>
						</li>

						<li role="presentation"><a href="#carl" role="tab" id="carl-tab" data-toggle="tab"> 
							<i class="fa fa-copyright" aria-hidden="true"></i>
							<h5>GUEST</h5>
							<input type="button" name="" onclick="location.href='checkoutGuest.php';" value="Checkout as Guest" />
							</a>
						</li> 
					</ul>
					<div class="clearfix"> </div>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
								<div id="owl-demo" class="owl-carousel"> 
									
								</div> 
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="carl" aria-labelledby="carl-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo1").owlCarousel({
									 
										  autoPlay: 2000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo1" class="owl-carousel"> 
									
									<div class="item">
										<div class="glry-w3agile-grids agileits"> 
											
											<div class="view-caption agileits-w3layouts">           
												 
											</div>   
										</div>   
									</div>
									  
								</div>   
							</div>
						</div> 
						 
					</div>   
				</div> 				
			</div>  	
		</div>  	
	</div> 
		<!-- footer -->
			<?php include_once 'template/footer.php' ?>			
		<!-- //footer --> 
		
	</body>
</html>	
			