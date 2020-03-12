<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="footer-info w3-agileits-info">
			<div class="col-md-4 address-left agileinfo">
				<div class="footer-logo header-logo">
					<p><a href="index.php" style="font-size: 40px;font-weight: 700;"> BDguitarZone</a></p>
					<p style="color:#0468CA;"> Never Compromise With Quality.</p>
				</div>
				<ul>
					<li><i class="fa fa-map-marker"></i> Daffodil International Academy, Panthapath, Dhaka.</li>
					<li><i class="fa fa-mobile"></i> +880 1685238317 </li>
					<li><i class="fa fa-phone"></i> +222 11 4444 </li>
					<li><i class="fa fa-envelope-o"></i> <a href="mailto:1000024@daffodil.ac">1000024@daffodil.ac</a></li>
				</ul> 
			</div>
			<div class="col-md-8 address-right">
				<div class="col-md-4 footer-grids">
					
				</div>
				<div class="col-md-4 footer-grids">
					<h3>Services</h3>
					<ul>
						<li><a href="contact.php">Contact Us</a></li> 
						<li><a href="help.php">Help</a></li>
						<li><a href="sitemap.php">Site Map</a></li>
					</ul> 
				</div>
				<div class="col-md-4 footer-grids">
					<h3>Login & Sign Up</h3>
					<ul>
						<li><a href="login.php">Login</a></li>
						<li><a href="signup.php">Sign Up</a></li> 
					</ul> 
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //footer -->		
<div class="copy-right"> 
	<div class="container">
		<p>© 2018 BDguitarZone. All rights reserved | Design by <a href="https://www.youtube.com/channel/UCNNlfUfTU61QaJDWPEakkeg?view_as=subscriber">Numan Ibn Mazid</a></p>
	</div>
</div> 
<!-- cart-js -->

<!-- //cart-js -->	
<!-- countdown.js -->	
<script src="js/jquery.knob.js"></script>
<script src="js/jquery.throttle.js"></script>
<script src="js/jquery.classycountdown.js"></script>
	<script>
		$(document).ready(function() {
			$('#countdown1').ClassyCountdown({
				end: '1388268325',
				now: '1387999995',
				labels: true,
				style: {
					element: "",
					textResponsive: .5,
					days: {
						gauge: {
							thickness: .10,
							bgColor: "rgba(0,0,0,0)",
							fgColor: "#1abc9c",
							lineCap: 'round'
						},
						textCSS: 'font-weight:300; color:#fff;'
					},
					hours: {
						gauge: {
							thickness: .10,
							bgColor: "rgba(0,0,0,0)",
							fgColor: "#05BEF6",
							lineCap: 'round'
						},
						textCSS: ' font-weight:300; color:#fff;'
					},
					minutes: {
						gauge: {
							thickness: .10,
							bgColor: "rgba(0,0,0,0)",
							fgColor: "#8e44ad",
							lineCap: 'round'
						},
						textCSS: ' font-weight:300; color:#fff;'
					},
					seconds: {
						gauge: {
							thickness: .10,
							bgColor: "rgba(0,0,0,0)",
							fgColor: "#f39c12",
							lineCap: 'round'
						},
						textCSS: ' font-weight:300; color:#fff;'
					}

				},
				onEndCallback: function() {
					console.log("Time out!");
				}
			});
		});
	</script>
<!-- //countdown.js -->
<!-- menu js aim -->
<script src="js/jquery.menu-aim.js"> </script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<!-- //menu js aim --> 
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster --> 