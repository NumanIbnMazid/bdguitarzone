<!--cart-function-->
			<?php include_once 'cartFunction.php' ?>
<!--//cart-function-->

<!-- <div><span name="userId" class="userId">{<?php 

     //this can be static or dynamic 
    $a = session_id();
        if(empty($a)) session_start();
        echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];
        print_r($a);
    ?>}</span>
</div> -->

<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-left">
				<p><a href="index.php">© BDguitarZone | LEADING SELLER IN BANGLADESH </a></p>
			</div>
			<div class="w3ls-header-right">
				<ul>
					<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
					<li class="dropdown head-dpdn">
						<a href="adminIndex.php" class="dropdown-toggle"><i class="fa fa-gift" aria-hidden="true"></i> Go to Admin Pannel</a>
					</li>
					<?php } ?>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
							| <?=$_SESSION['name']?><?php } else {?>
							My Account
							<?php } ?><span class="caret"></span>
						<ul class="dropdown-menu">
							<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] && $_SESSION['role'] != 0){ ?>
								<li><a href="profile.php?user-id=<?=$_SESSION['user_id']?>">View Your Profile</a></li>
							<?php }
							else {?>
								<li><a href="login.php">Login </a></li>
								<li><a href="signup.php">Sign Up</a></li>
							<?php } ?>
							<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){ ?>
								<li><a href="logout.php" onclick="return confirm('You are going to Log out?')">Log Out </a></li>
							<?php } ?>
						</ul>
					</li>
					
					<li class="dropdown head-dpdn">
						<a href="offers.php" class="dropdown-toggle"><i class="fa fa-gift" aria-hidden="true"></i> Gifting Details</a>
					</li>
					<li class="dropdown head-dpdn">
						<a href="contact.php" class="dropdown-toggle"><i class="fa fa-map-marker" aria-hidden="true"></i> Store Finder</a>
					</li>

					<li class="dropdown head-dpdn">
						<a href="help.php" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
					</li>

					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book" aria-hidden="true"></i>System Manual Guide<span class="caret"></span>
						<ul class="dropdown-menu">
							<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
								<li><a href="https://www.youtube.com/watch?v=2iUzGS2DTS0">Administrative Manual</a></li>
							<?php } ?>
								<li><a href="https://www.youtube.com/watch?v=S49MXZUgopw">User Manual</a></li>    
                        </ul>
					</li>

				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="header-two" style="margin-top: -15px;"><!-- header-two -->
			<div class="container" style="height: 90px;">
				<div class="header-logo" style="padding-top:20px;">
					<p><a href="index.php" style="font-size: 40px;font-weight: 700;"> BDguitarZone</a></p>
					<p style="color:#0468CA;"> Never Compromise With Quality.</p>

					<!-- DATE TIME SYSTEM -->
						<!-- <div id="clockbox" style="font:10pt Arial; color:#F44336;"></div> -->
					<!-- //DATE TIME SYSTEM -->
				</div>
				<div class="header-cart" style="margin-top: -4px;">
					<div class="my-account">
						<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
							 <li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#8a2be2; font-size: 15px;">
										<i class="fa fa-user" aria-hidden="true"></i><?=$_SESSION['name']?>
										<span class="caret"></span>
										 <a href="logout.php" style="color:#DA70D6; font-size: 15px;"
										  	onMouseOver="this.style.color='#FF0000'"
   											onMouseOut="this.style.color='#DA70D6'" onclick="return confirm('You are going to Log out?')"> ---------:  [Logout]</a>
									<ul class="dropdown-menu">
										<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
											<li><a href="bookingList.php">Booking List</a></li>
											<li><a href="addCategory.php">Add Category</a></li>
											<li><a href="addBrand.php">Add Brand</a></li>
											<li><a href="addProduct.php">Add Product</a></li>
											<li><a href="productList.php">Product List</a></li>
	                                        <li><a href="categoryList.php">Category List</a></li>
	                                        <li><a href="brandList.php">Brand List</a></li>
	                                        <li><a href="userList.php">User List</a></li>

	                                    <?php } ?>
	                                    	<li><a href="profile.php?user-id=<?=$_SESSION['user_id']?>">My Profile</a></li>
									</ul>
								</li>
								 
						<?php }else {?>
							<a href="login.php" style="color:#8a2be2; font-size: 15px;">Log In</a>
						<?php } ?>
						
						<!-- ADMIN PANNEL <?=$_SESSION['name']?>-->
							<!-- <?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
							<div class="admin">
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>ADMIN PANNEL<span class="caret"></span>
									<ul class="dropdown-menu">
											<li><a href="addCategory.php">Add Category</a></li>
											<li><a href="addBrand.php">Add Brand</a></li>
											<li><a href="addProduct.php">Add Product</a></li>
											<li><a href="productList.php">Product List</a></li>
	                                        <li><a href="categoryList.php">Category List</a></li>
	                                        <li><a href="brandList.php">Brand List</a></li>
	                                        <li><a href="userList.php">User List</a></li>
									</ul>
								</li>
							</div>
							<?php } ?>	 -->	
						<!-- //ADMIN PANNEL -->

						<!-- DATE TIME SYSTEM -->
							 <div id="clockbox" style="font:10pt Arial; color:#0468CA;"></div> 
						<!-- //DATE TIME SYSTEM -->
					</div>

					<style type="text/css">
					    
					    .search-box{
					        width: 200px;
					        left: 380px;
					        top: 45px;
					        position: absolute;
					        display: inline-block;
					        font-size: 14px;
					    }
					    .search-box input[type="text"]{
					        height: 32px;
					        padding: 5px 10px;
					        border: 1px solid #CCCCCC;
					        font-size: 14px;
					    }
					    .result{
					        position: absolute;        
					        z-index: 999;
					        top: 100%;
					        left: 0;
					    }
					    .search-box input[type="text"], .result{
					        width: 100%;
					        box-sizing: border-box;
					    }
					    /* Formatting result items */
					    .result p{
					    	background-color: rgb(224, 240, 255);
					    	color: green;
					        margin: 0;
					        padding: 7px 10px;
					        border: 1px solid #CCCCCC;
					        border-top: none;
					        cursor: pointer;
					    }
					    .result p:hover{
					        background: #f2f2f2;
					    }
					</style>

					<script type="text/javascript">
						$(document).ready(function(){
						    $('.search-box input[type="text"]').on("keyup input", function(){
						        /* Get input value on change */
						        var inputVal = $(this).val();
						        var resultDropdown = $(this).siblings(".result");
						        if(inputVal.length){
						            $.get("backend-search.php", {term: inputVal}).done(function(data){
						                // Display the returned data in browser
						                resultDropdown.html(data);
						            });
						        } else{
						            resultDropdown.empty();
						        }
						    });
						    
						    // Set search input value on click of result item
						    $(document).on("click", ".result p", function(){
						        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
						        $(this).parent(".result").empty();
						    });
						});
					</script>
					
					    <div class="search-box">
					        <input type="text" autocomplete="off" placeholder="Search Product..." />
					        <div class="result"></div>
					    </div>
					

					<!-- Shopping Cart -->
						<div class="cart" style="margin-top: 30px;">
						
						<?php if(!empty($_SESSION["shopping_cart"])) { ?>
							<?php 
								$nCount 		=0;
								$cartHas		=	count($_SESSION["shopping_cart"]);
								$currentCart	=	$cartHas - $nCount;
							 ?>
							<span class="navbar-text pull-right" style="position:fixed; margin-left: 50px; color:#0468CA; font-weight: 700;">Cart has <span class="" style="font-size: 20px; color: green;"><?php echo $currentCart ?></span> Items ||</span> 
						<?php } ?>

						<?php if(empty($_SESSION["shopping_cart"])) { ?>
							<span class="navbar-text pull-right" style="position:fixed; margin-left: 50px; color:#0468CA; font-weight: 700;">Cart has <span class="" style="font-size: 20px; color: green;">0</span> Items ||</span> 
						<?php } ?>

						  <div class="popup" style="background-color: rgb(224, 240, 255); z-index: 1;">
						  	<div class="extra" style="padding: 10px 10px 10px 10px;"> 
						  		<?php if(!empty($_SESSION["shopping_cart"])) { ?> 
							  	<h4>Your Cart Items 
									<span style="padding-left: 150px;"><i class="fa fa-square" aria-hidden="true"></i><a href="cart.php" style="padding-right: 14px;font-size: 20px;color: #DA70D6;" 
										onMouseOver="this.style.color='#FF0000'"
   										onMouseOut="this.style.color='#DA70D6'"> View Cart </a></span>
							  	</h4>
							  	<?php } ?>
							    <div class="table table-bordered">
							    	<table border="1" style="margin-top: 30px; margin-left: 30px; margin-right: 30px;">
									<tr>
										<th width="38%">Item Name</th>
										<th width="1%">Quantity</th>
										<th width="24%">Price</th>
										<th width="30%">Sub Total</th>
										<th width="7%">Action</th>
									</tr>
									<?php 
										if(!empty($_SESSION["shopping_cart"]))
										{
											$total = 0; 
											foreach ($_SESSION["shopping_cart"] as $keys => $values) {
												
										?>
										<tr>
											<td><a href="single.php?pro-id=<?php echo $values["item_id"]; ?>"><?php echo $values["item_name"]; ?></a></td>
											<td><?php echo $values["item_quantity"]; ?></td>
											<td>৳ <?php echo $values["item_price"]; ?></td>
											<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
											<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>" onclick="return confirm('Are you sure you want to Remove?')"><span class="text-danger">Remove</span></a></td>
										</tr>
										<?php
												$total = $total + ($values["item_quantity"] * $values["item_price"]);
											}
										?>
										<tr>
											<td colspan="3" align="right"> Grand Total </td>
											<td align="right">৳ <?php echo number_format($total,2); ?></td>						
											<td align="right">
												<i class="fa fa-trash-o fa-lg" aria-hidden="true" style="color: red;"></i>
												<a href="index.php?action=deleteAll&id=<?php echo $values["item_id"]; ?>" onclick="return confirm('Are you sure you want to Remove All?')"
													onMouseOver="this.style.color='#FF0000'"
   													onMouseOut="this.style.color='#DA70D6'"
   											> REMOVE ALL </a>
											</td>						
										</tr>
										<?php 

										}
									 ?>
									 </table>
								</div>
							    <div class="row checkout">

							      	<?php if(!empty($_SESSION["shopping_cart"])) { ?>                       					
								      <i class="fa fa-check-circle" aria-hidden="true"></i><a href="checkoutAs.php" style="padding-right: 14px;font-size: 15px; color:#008B00;"> Checkout </a>								 
								      <i class="fa fa-square" aria-hidden="true"></i><a href="cart.php" style="padding-right: 14px;font-size: 15px;color: #8B7500;"> View Cart </a>
								    <?php } ?>

								      <i class="fa fa-square" aria-hidden="true"></i><a href="products.php" style="padding-right: 14px;font-size: 15px;color: #104E8B;"> Continue Shopping </a>

							    </div>
						    </div>
						  </div>
						</div>
					<!-- Shopping Cart -->

					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>

			</div>
		</div><!-- //header-two -->
		<div class="header-three"><!-- header-three -->
			<div class="container">
				<div class="menu">
					<div class="cd-dropdown-wrapper">
						<a class="cd-dropdown-trigger" href="#0"> MENU </a>
						<nav class="cd-dropdown"> 
							<a href="#0" class="cd-close">Close</a>
							<ul class="cd-dropdown-content"> 
								<li class="has-children">
									<a href="#">Product Categories</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="category.php">All Categories</a></li>
										<li class="has-children">
											<a href="#">Category List</a>  
											<ul class="is-hidden"> 
												<?php 
		//--------------------------------------categoryElement-----------------------------------------------------------														// Get all category from database to show 
												$sql = "SELECT * FROM category ORDER BY cat_id DESC;";
												include_once 'dbCon.php';	
												$con = connect();
												$result = $con->query($sql);
												?>
												<li class="go-back"><a href="category.php">All Categories</a></li> 
												<?php 
												foreach($result as $row){ 
												//print_r($row);exit;
												?>
												<li><a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></li>
												<?php } ?>												
											</ul>
										</li> 										
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li class="has-children">
									<a href="#">Product Brands</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="brands.php">Browse All Brands</a></li>
										<li class="has-children">
											<a href="brands.php">All Brands List</a> 
											<ul class="is-hidden">
												<?php 
		//--------------------------------------brandsElement-----------------------------------------------------------														// Get all brands from database to show 
												$sql = "SELECT * FROM brand ORDER BY brand_id DESC;";
												include_once 'dbCon.php';	
												$con = connect();
												$result = $con->query($sql);
												?>
												<li class="go-back"><a href="brands.php">All Brands</a></li> 
												<?php 
												foreach($result as $row){ 
												//print_r($row);exit;
												?>
												<li><a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></li>
												<?php } ?>												
											</ul>
										</li> 										
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li><a href="brands.php">View All Brands</a></li>
								<li><a href="category.php">View All Categories</a></li>
								<li><a href="products.php">View All Products</a></li>

								<li><a href="sitemap.php">Full Site Directory </a></li>  
							</ul> <!-- .cd-dropdown-content -->
						</nav> <!-- .cd-dropdown -->
					</div> <!-- .cd-dropdown-wrapper -->	 
				</div>
				<div class="move-text">
					<div class="marquee"><a href="#"> Sunday --To-- Thursday <span>Shop Opens at : | 10AM </span> <span> Shop Closes at : | 8PM </span></a></div>
					<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
					<script>
					  $('.marquee').marquee({ pauseOnHover: true });
					  //@ sourceURL=pen.js
					</script>
				</div>
			</div>
		</div>
	</div>
	
	<!-- //header -->
	
	<!--side-nav-->
		<?php include_once 'template/side-nav.php' ?>
	<!--//side-nav-->

<script type="text/javascript">
	tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

	function GetClock(){
	var d=new Date();
	var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
	var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

	if(nhour==0){ap=" AM";nhour=12;}
	else if(nhour<12){ap=" AM";}
	else if(nhour==12){ap=" PM";}
	else if(nhour>12){ap=" PM";nhour-=12;}

	if(nmin<=9) nmin="0"+nmin;
	if(nsec<=9) nsec="0"+nsec;

	document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" || "+nhour+":"+nmin+":"+nsec+ap+"";
	}

	window.onload=function(){
	GetClock();
	setInterval(GetClock,1000);

	}
</script>
