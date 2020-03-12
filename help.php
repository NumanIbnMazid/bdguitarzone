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

			
	<!-- help-page -->
	<div class="help">
		<div class="container">  

			<div class="manual" style="font-size: 25px; font-weight: 700;">
				<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
					<li><a href="https://www.youtube.com/watch?v=2iUzGS2DTS0">Administrative Manual</a></li>
				<?php } ?>
					<li><a href="https://www.youtube.com/watch?v=S49MXZUgopw">User Manual</a></li>
			</div>

			<div class="faq-w3agile"> 
				<h3>Top 10 Frequently asked questions(FAQ)</h3>
				<ul class="faq">
					<li class="item1"><a href="#" title="click here">Store Hours?</a>
						<ul>
							<li class="subitem1"><p> Sunday --To-- Thursday. <br> Shop Opens at 10 AM, Closes at 8 PM.</p></li>										
						</ul>
					</li>
					<li class="item2"><a href="#" title="click here">Buying Policy?</a>
						<ul>
							<li class="subitem1"><p> You must confirm your booking within 20 Working Days from your booking date or Your Booking will be cancelled. (You have to Come Physically to the Shop With the Soft and Hard copy of Your "Booking Confirmation Email"). If You have any issues, please contact with us.</p></li>										
						</ul>
					</li>
					<li class="item3"><a href="#" title="click here">Make changes to or cancel an order?</a>
						<ul>
							<li class="subitem1"><p>You can make changes to your order at any time during the order process before you give final confirmation of the order. After your order has been submitted, you can change or cancel the order by contacting Customer Service. There may be a delay while your order downloads into our order database. Once it does, we may make any corrections necessary to the order..</p></li>										
						</ul>
					</li>
					<li class="item4"><a href="#" title="click here">I never received confirmation of my order. What do I do?</a>
						<ul>
							<li class="subitem1"><p>Please call us at 01685238317 to verify that we have your correct email address on file. Have your order number ready. Our Customer Service representative will be happy to check on the status of your order and provide you with any tracking information available..</p></li>										
						</ul>
					</li> 
					<li class="item5"><a href="#" title="click here">Is there any way I can combine the order that I just placed with one that I placed earlier?</a>
						<ul>
							<li class="subitem1"><p>Unfortunately, no. Orders are processed as they are received and it is not possible to combine them. You may be able to cancel both orders and place a new one. Please contact Customer Service at 01685238317 to see if this can be done. Be aware that this may delay the processing of your orders..</p></li>										
						</ul>
					</li>
					<li class="item6"><a href="#" title="click here">What is BDguitarZone Warranty Policy?</a>
						<ul>
							<li class="subitem1"><p>BDguitarZone is an authorized dealer for all brands we carry on our site and all brand new items come with a manufacturers' warranty. You have 2 options should your instruments need warranty repairs covered by the manufacturer:

							Use a local repair shop for warranty services
							Visit our stores to arrange for warranty services facilitated through our network of repair facilities.

							Send it to us for warranty services
							For band and orchestra instruments you have purchased, you also have the option to send the instrument to BDguitarZone and we will take care of the warranty repairs. You are responsible for shipping charges to and from BDguitarZone. We recommend that you insure your package as well. Please be aware that your repair could be delayed if we have to send it back to the manufacturer for warranty service. Please contact Customer Service for instructions.

							If you have an electronic product warranty issue, do not send it to BDguitarZone. Please refer to the manufacturer's warranty information should you need to have warranty repairs made.</p></li>										
						</ul>
					</li>
					<li class="item7"><a href="#" title="click here">I did not get a warranty card with my instrument. Would you please send me one?</a>
						<ul>
							<li class="subitem1"><p>Unfortunately, we do not have warranty cards to send out. Note that many manufacturers no longer include warranty cards with their products. All you will need for proof of purchase for warranty work is your original invoice that was included with your shipment, so keep it in a safe place. In addition, most manufacturers now have online product registration through their websites.</p></li>										
						</ul>
					</li>
					<li class="item8"><a href="#" title="click here">I haven't received gift.</a>
						<ul>
							<li class="subitem1"><p>You have to place order upto 28,999 in order to get a gift. You have to select your gift option while you ordering.</p></li>										
						</ul>
					</li>
					<li class="item9"><a href="#" title="click here">Gift?</a>
						<ul>
							<li class="subitem1"><p>You have to place order upto 28,999 in order to get a gift. You have to select your gift option while you ordering.</p></li>										
						</ul>
					</li>
					<li class="item10"><a href="#" title="click here">Does BDguitarZone have a repair shop?</a>
						<ul>
							<li class="subitem1"><p>Yes, we have a full service repair shop. We do most repairs and servicing here in our workshop. Turnaround time is usually very fast – depending on your requirements.</p></li>										
						</ul>
					</li> 
				</ul>
				<!-- script for tabs -->
				<script type="text/javascript">
					$(function() {
					
						var menu_ul = $('.faq > li > ul'),
							   menu_a  = $('.faq > li > a');
						
						menu_ul.hide();
					
						menu_a.click(function(e) {
							e.preventDefault();
							if(!$(this).hasClass('active')) {
								menu_a.removeClass('active');
								menu_ul.filter(':visible').slideUp('normal');
								$(this).addClass('active').next().stop(true,true).slideDown('normal');
							} else {
								$(this).removeClass('active');
								$(this).next().stop(true,true).slideUp('normal');
							}
						});
					
					});
				</script>
				<!-- script for tabs --> 
			</div> 
		</div>
	</div>
	<!-- //login-page --> 
			<!-- recommendation -->
			<?php include_once 'template/recommendation.php' ?>
		<!-- //recommendation -->
		<!-- footer -->
			<?php include_once 'template/footer.php' ?>			
		<!-- //footer --> 
		
	</body>
</html>	