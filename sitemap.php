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
 	

		<!-- site map -->
		<div class="sitemap">
			<div class="container"> 
				<h3 class="w3ls-title w3ls-title1">BdguitarZone Sitemap</h3>
				<div class="sitemap-row"> 
					<nav class="sitemap-tabs" data-spy="affix" data-offset-top="400"> 
						<div  id="myNavbar">
							<ul> 

								<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?> 	

								<li><a href="#w3sec1"><i class="fa fa-send"></i> Product List</a></li>
	                            <li><a href="#w3sec2"><i class="fa fa-send"></i> Category List</a></li>
	                            <li><a href="#w3sec3"><i class="fa fa-send"></i> Brand List</a></li>
	                            <li><a href="#w3sec4"><i class="fa fa-send"></i> User List</a></li>
								<li><a href="#w3sec9"><i class="fa fa-send"></i> Booking List</a></li> 
	                            <?php } ?>

								<li><a href="#w3sec5"><i class="fa fa-send"></i> All Products</a></li>
								<li><a href="#w3sec6"><i class="fa fa-send"></i> All Brands</a></li>
								<li><a href="#w3sec7"><i class="fa fa-send"></i> All Categories</a></li>
								<li><a href="#w3sec8"><i class="fa fa-send"></i> Latest 10 Products</a></li> 
								

								<li><a href="index.php"><i class="fa fa-home"></i> Home </a></li>

							</ul> 
						</div>
					</nav>	


					<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?> 

<!-- Product List -->
					<div id="w3sec1" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title"><i class="fa fa-send"></i> Product List</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li><h5 class="sitemap-text-title"><a href="productList.php">Product List</a></h5></li>   
							
								<?php 
									//session_start();
									if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>

									<?php
										include_once 'dbCon.php';
										$con = connect();

										$sql = "SELECT * FROM `product`";
										
										$result = $con->query($sql);
										
									?>	
									<div class="products">	 
										<div class="container">
											
											<table border="1">
												<tr>
													<th>Product Id</th>
													<th>Product Name</th>
													<th>Product Brand</th>
													<th>Product Category</th>
													<th>Product Price</th>	
													<th>Product Image</th>
													<th>Product Description</th>
													<th>Product Quantity</th>				
												</tr>
											<?php 
												foreach($result as $r) {
												?>
													<tr>
														<style type="text/css">
															
														</style>
														<td><?=$r['product_id']?></td>
														<td><?=$r['product_name']?></td>
														<td><?=$r['brands']?></td>
														<td><?php echo $r['cat'];?></td>
														<td><?php echo $r['product_price'];?></td>
														<td><?php echo $r['product_image'];?></td>
														<td><?php echo $r['product_description'];?></td>
														<td><?php echo $r['stock_quantity'];?></td>
												
														<td><i class="fa fa-cog" aria-hidden="true"></i><a href="productEditForm.php?product-id=<?=$r['product_id']?>"> Edit </a></td>
														<td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="productDeleteForm.php?product-id=<?=$r['product_id']?>"><span class="text-danger"> Delete </span></a></td>
													</tr>
												<?php } ?>
											</table>
										</div>
									</div>
								<?php } ?>							

						</div>		
						<div class="clearfix"> </div>
					</div>




<!-- Category List -->
					<div id="w3sec2" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title"><i class="fa fa-send"></i> Category List</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li><h5 class="sitemap-text-title"><a href="categoryList.php">Category List</a></h5> </li>  
							
													
								<?php
									//session_start();
									if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>

									    <?php
									    include_once 'dbCon.php';
									    $con = connect();

									    $sql = "SELECT * FROM `category`";

									    $result = $con->query($sql);

									    ?>
									    <div class="products">
									        <div class="container">
									            
									            <table border="1">
									                <tr>
									                    <th>Category Id</th>
									                    <th>Category Name</th>
									                    <th>Category Image</th>
									                </tr>
									                <?php
									                foreach($result as $r) {
									                    ?>
									                    <tr>
									                        <style type="text/css">

									                        </style>
									                        <td><?=$r['cat_id']?></td>
									                        <td><?=$r['cat_name']?></td>
									                        <td><?=$r['cat_image']?></td>
									                        
									                        <td><i class="fa fa-cog" aria-hidden="true"></i><a href="categoryEditForm.php?category-id=<?=$r['cat_id']?>"> Edit </a></td>
									                        <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="categoryDeleteForm.php?category-id=<?=$r['cat_id']?>"><span class="text-danger"> Delete </span></a></td>
									                    </tr>
									                <?php } ?>
									            </table>
									        </div>
									    </div>
									<?php } ?>		
						</div>		
						<div class="clearfix"> </div>
					</div>




<!-- Brand List -->
					<div id="w3sec3" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title"><i class="fa fa-send"></i> Brand List</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li><h5 class="sitemap-text-title"><a href="brandList.php">Brand List</a></h5></li>  
														
								<?php
									//session_start();
									if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>

									    <?php
									    include_once 'dbCon.php';
									    $con = connect();

									    $sql = "SELECT * FROM `brand`";

									    $result = $con->query($sql);

									    ?>
									    <div class="products">
									        <div class="container">
									           
									            <table border="1">
									                <tr>
									                    <th>Brand Id</th>
									                    <th>Brand Name</th>
									                    <th>Brand Image</th>
									                    <th>Brand Description</th>
									                </tr>
									                <?php
									                foreach($result as $r) {
									                    ?>
									                    <tr>
									                        <td><?=$r['brand_id']?></td>
									                        <td><?=$r['brand_name']?></td>
									                        <td><?=$r['brand_image']?></td>
									                        <td><?=$r['brand_description']?></td>

									                        <td><i class="fa fa-cog" aria-hidden="true"></i><a href="brandEditForm.php?brand-id=<?=$r['brand_id']?>"> Edit </a></td>
									                        <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="brandDeleteForm.php?brand-id=<?=$r['brand_id']?>"><span class="text-danger"> Delete </span></a></td>
									                    </tr>
									                <?php } ?>
									            </table>
									        </div>
									    </div>
									<?php } ?>						

						</div>		
						<div class="clearfix"> </div>
					</div>




<!-- User List -->
					<div id="w3sec4" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title"><i class="fa fa-send"></i> User List</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li><h5 class="sitemap-text-title"><a href="userList.php">User List</a></h5></li>   

							<?php 
								//session_start();
								if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>

								<?php

									include_once 'dbCon.php';
									$con = connect();

									$sql = "SELECT * FROM `users`";
									
									$result = $con->query($sql);
									
								?>
								<div class="products">
								    <div class="container">
								        
								        <table border="1">
								        <tr>
								            <th>User Role</th>
								            <th>Last Name</th>
								            <th>User Name</th>
								            <th>Gender</th>
								            <th>Age</th>
								            <th>Address</th>
								            <th>Postal Code</th>
								            <th>Mobile No.</th>
								            <th>More</th>
								            <th>Email</th>


								        </tr>
								        <?php
								            foreach($result as $r) {
								            ?>
								                <tr>
								                    <td><?php echo $userType = ($r['user_type'] == 0)? 'Admin':'Customer'; ?></td>								                    
								                    <td><?=$r['lName']?></td>
								                    <td><?=$r['name']?></td>
								                    <td><?php echo $r['gender'];?></td>
								                    <td><?php echo $r['age'];?></td>
								                    <td><?php echo $r['address'];?></td>
								                    <td><?php echo $r['post_cd'];?></td>
								                    <td><?php echo $r['mobile'];?></td>
								                    <td><?php echo $r['more'];?></td>
								                    <td><?php echo $r['email'];?></td>

								                    <td><i class="fa fa-cog" aria-hidden="true"></i><a href="userEditForm.php?user-id=<?=$r['user_id']?>"> Edit </a></td>
								                    <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="userDeleteForm.php?user-id=<?=$r['user_id']?>"><span class="text-danger"> Delete </span></a></td>
								                </tr>
								            <?php } ?>
								        </table>
								    </div>
								</div>
							<?php } ?>
						</div>		
						<div class="clearfix"> </div>
					</div>







<!-- Booking List -->
					<div id="w3sec9" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title" style="padding-left: 50px;"><i class="fa fa-send"></i> Booking List</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li style="padding-left: 50px;"><h5 class="sitemap-text-title"><a href="latest10.php">Booking List</a></h5> </li>  

							<!-- Booking List -->
								<?php 
									//session_start();
									if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>

									<?php

									    include_once 'dbCon.php';
									    $con = connect();

									    $sql = "SELECT * FROM `booking_details` LEFT JOIN booking
									    ON booking.booking_id = booking_details.booking_id";
									    
									    $result = $con->query($sql);
									    
									?>
									<div class="products">
									    <div class="container">

									        <table border="1">
									        <tr>
									            <th>Booking ID</th>
									            <th>User ID</th>            
									            <th>First Name</th>
									            <th>Email</th>

									            <th>Booking Details ID</th>
									            <th>Booking ID</th>
									            <th>Shift</th>
									            <th>Gift</th>
									            <th>Booking Date</th>
									            <th>Product ID</th>
									            <th>Unit Price</th>
									            <th>Order Quantity</th>
									            <th>Subtotal</th>
									            <th>Order Total</th>
									            <th>Date of Purchase</th>
									            <th>Booking Status</th>
									            
									        </tr>
									        <?php
									            foreach($result as $r) {
									            ?>
									                <tr>
									                    <td><?php echo $r['booking_id'];?></td>
									                    <td><?php echo $r['user_id'];?></td>                    
									                    <td><?php echo $r['name'];?></td>
									                    <td><?php echo $r['email'];?></td>

									                    <td><?=$r['booking_details_id']?></td>
									                    <td><?=$r['booking_id']?></td>
									                    <td><?php echo $r['shift'];?></td>
									                    <td><?php echo $r['gift'];?></td>
									                    <td><?php echo $r['date_of_purchase'];?></td>
									                    <td><?=$r['product_id']?></td>
									                    <td><?php echo $r['unit_price'];?></td>
									                    <td><?php echo $r['order_quantity'];?></td>
									                    <td><?php echo $r['subtotal'];?></td> 
									                    <td><?php echo $r['order_total'];?></td>                   
									                    <td><?php echo $r['timestamp'];?></td> 
									                    <td><?php echo $r['booking_status'];?></td> 

														<td><i class="fa fa-check-circle" aria-hidden="true"></i><a href="bookingMark.php?booking-id=<?=$r['booking_id']?>"><span class="important"> MARK </span></a></td>
									                    <td><i class="fa fa-cog" aria-hidden="true"></i><a href="bookingEditForm.php?booking-id=<?=$r['booking_id']?>"> Edit </a></td>
									                    <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="bookingDeleteForm.php?booking-id=<?=$r['booking_id']?>"><span class="text-danger"> Delete </span></a></td>
									                </tr>
									            <?php } ?>
									        </table>
									    </div>
									</div>
									<?php } ?>			
						</div>		
						<div class="clearfix"> </div>
					</div>


					<?php } ?>




<!-- All Products -->
					<div id="w3sec5" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title"><i class="fa fa-send"></i> All Products</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li><h5 class="sitemap-text-title"><a href="products.php">All Products</a></h5> </li>  						 
								
									<!-- products -->
										<div class="products">	 
											<div class="container">
												<div class="col-md-9 product-w3ls-right">
													<!-- breadcrumbs --> 
													<ol class="breadcrumb breadcrumb1">
														<li><a href="index.php">Home</a></li>
														<li class="active">Products</li>
													</ol> 
													<div class="clearfix"> </div>
													<!-- //breadcrumbs -->
													<div class="product-top">
														<h4>Products</h4>
														<ul> 
															<li class="dropdown head-dpdn">
																<?php 
																// Get all category from database to show 
																$sql = "SELECT * FROM brand ORDER BY brand_id DESC;";
																include_once 'dbCon.php';	
																$con = connect();
																$result = $con->query($sql);
																?>										               		
																<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<span class="caret"></span></a>
																<ul class="dropdown-menu">
																	<?php 
									                			foreach($result as $row){ ?>
																	<li><a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></li>
																	<?php } ?>  
																</ul>
															</li>						 
														</ul>
														<ul> 
															<li class="dropdown head-dpdn">
																<?php 
																// Get all category from database to show 
																$sql = "SELECT * FROM category ORDER BY cat_id DESC;";
																include_once 'dbCon.php';	
																$con = connect();
																$result = $con->query($sql);
																?>										               		
																<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>
																<ul class="dropdown-menu">
																	<?php 
									                			foreach($result as $row){ ?>
																	<li><a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></li>
																	<?php } ?>  
																</ul>
															</li>						 
														</ul> 
														<div class="clearfix"> </div>
													</div>

													<div class="products-row">
														<?php 						
														// Get all products from database to show 
														$sql = "SELECT * FROM product;";
														include_once 'dbCon.php';	
														$con = connect();
														$result = $con->query($sql);
														?>	
														<?php 
														foreach($result as $row){ ?> 				
														<div class="col-md-3 product-grids">					
															<div class="agile-products">
																<form method="post" action="index.php?action=add&id=<?php echo $row["product_id"]; ?>">
																	<div class="new-tag"><h6>GET<br>NOW</h6></div>
																	<a href="single.php?pro-id=<?=$row['product_id']?>"><img src="images/products/<?=$row['product_image']?>" class="img-responsive" style="width:200px; height:200px;" alt="<?=$row['product_name']?>"></a>
																	<div class="agile-product-text">              
																		<h5 style="display:block; width: 120px;
										                                            white-space: nowrap;
										                                            overflow: hidden;
										                                            text-overflow: ellipsis;">
										                                            <a href="single.php?pro-id=<?=$row['product_id']?>"><?=$row['product_name']?></a></h5> 
																		<h6>£<?=$row['product_price']?></h6>

																		
																		<label>Quantity</label>
																		<input type="number" name="quantity" max="<?=$row['stock_quantity']?>" class="form-control" value="1" style="width: 30%;">
																		

																		<input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
																		<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
																		<?php if($row["stock_quantity"]>0) { ?>
																		<input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success" value="Add To Cart">
																		<?php } ?>
																		<?php if($row["stock_quantity"]<1) { ?>
																			<p style="color: red; font-size: 15px; font-weight: 700;">This Item is Out of Stock</p>
																		<?php } ?>
																		<h5>Item Remains: <?=$row['stock_quantity']?></h5>
																	</div>
																</form> 
															</div> 							
														</div> 
														<?php } ?>															 
														<div class="clearfix"> </div>
													</div>
												</div>
											</div>
										</div>
																					
						</div>		
						<div class="clearfix"> </div>
					</div>




<!-- All Brands -->
					<div id="w3sec6" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title"><i class="fa fa-send"></i> All Brands</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li><h5 class="sitemap-text-title"><a href="brands.php">All Brands</a></h5></li>   
							
								<!-- Brands -->
									<div class="products">	 
										<div class="container">
											<div class="col-md-9 product-w3ls-right">
												<!-- breadcrumbs --> 
												<ol class="breadcrumb breadcrumb1">
													<li><a href="index.php">Home</a></li>
													<li class="active">All Brands</li>
												</ol> 
												<div class="clearfix"> </div>
												<!-- //breadcrumbs -->
												<div class="product-top">
													<h4>Brands</h4>
													<ul> 
														<li class="dropdown head-dpdn">
															<?php 
															// Get all category from database to show 
															$sql = "SELECT * FROM brand ORDER BY brand_id DESC;";
															include_once 'dbCon.php';	
															$con = connect();
															$result = $con->query($sql);
															?>										               		
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<span class="caret"></span></a>
															<ul class="dropdown-menu">
																<?php 
								                			foreach($result as $row){ ?>
																<li><a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></li>
																<?php } ?>  
															</ul>
														</li>						 
													</ul> 
													<ul> 
														<li class="dropdown head-dpdn">
															<?php 
															// Get all category from database to show 
															$sql = "SELECT * FROM category ORDER BY cat_id DESC;";
															include_once 'dbCon.php';	
															$con = connect();
															$result = $con->query($sql);
															?>										               		
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>
															<ul class="dropdown-menu">
																<?php 
								                			foreach($result as $row){ ?>
																<li><a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></li>
																<?php } ?>  
															</ul>
														</li>						 
													</ul>
													<div class="clearfix"> </div>
												</div>

												<div class="products-row">
													<?php 						
													// Get all brands from database to show 
													$sql = "SELECT * FROM brand;";
													include_once 'dbCon.php';	
													$con = connect();
													$result = $con->query($sql);
													?>	
													<?php 
													foreach($result as $row){ ?> 				
													<div class="col-md-3 product-grids">					
														<div class="agile-products">
															<div class="new-tag"><h6>BRANDS</h6></div>
															<a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><img src="images/brand/<?=$row['brand_image']?>" class="img-responsive" style="width:200px; height:200px;" alt="<?=$row['brand_name']?>"></a>
															<div class="agile-product-text">              
																<h5 style="display:block; width: 120px;
								                                            white-space: nowrap;
								                                            overflow: hidden;
								                                            text-overflow: ellipsis;">
								                                            <a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></h5> 
																<h6 style="display:block; width: 140px;
								                                            white-space: nowrap;
								                                            overflow: hidden;
								                                            text-overflow: ellipsis;">
								                                            <?=$row['brand_description']?></h6>  
															</div>
														</div> 							
													</div> 
													<?php } ?>															 
													<div class="clearfix"> </div>
												</div>
											</div>		
										</div>
									</div>
					
						</div>		
						<div class="clearfix"> </div>
					</div>




<!-- All Categories -->
					<div id="w3sec7" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title"><i class="fa fa-send"></i> All Categories</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li><h5 class="sitemap-text-title"><a href="category.php">All Categories</a></h5></li> 
							
								<!-- Categories -->
									<div class="products">	 
										<div class="container">
											<div class="col-md-9 product-w3ls-right">
												<!-- breadcrumbs --> 
												<ol class="breadcrumb breadcrumb1">
													<li><a href="index.php">Home</a></li>
													<li class="active">All Categories</li>
												</ol> 
												<div class="clearfix"> </div>
												<!-- //breadcrumbs -->
												<div class="product-top">
													<h4>Categories</h4>
													<ul> 
														<li class="dropdown head-dpdn">
															<?php 
															// Get all category from database to show 
															$sql = "SELECT * FROM brand ORDER BY brand_id DESC;";
															include_once 'dbCon.php';	
															$con = connect();
															$result = $con->query($sql);
															?>										               		
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<span class="caret"></span></a>
															<ul class="dropdown-menu">
																<?php 
								                			foreach($result as $row){ ?>
																<li><a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></li>
																<?php } ?>  
															</ul>
														</li>						 
													</ul> 
													<ul> 
														<li class="dropdown head-dpdn">
															<?php 
															// Get all category from database to show 
															$sql = "SELECT * FROM category ORDER BY cat_id DESC;";
															include_once 'dbCon.php';	
															$con = connect();
															$result = $con->query($sql);
															?>										               		
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>
															<ul class="dropdown-menu">
																<?php 
								                			foreach($result as $row){ ?>
																<li><a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></li>
																<?php } ?>  
															</ul>
														</li>						 
													</ul>
													<div class="clearfix"> </div>
												</div>

												<div class="products-row">
													<?php 						
													// Get all brands from database to show 
													$sql = "SELECT * FROM category;";
													include_once 'dbCon.php';	
													$con = connect();
													$result = $con->query($sql);
													?>	
													<?php 
													foreach($result as $row){ ?> 				
													<div class="col-md-3 product-grids">					
														<div class="agile-products">
															<div class="new-tag"><h6>CATEGORIES</h6></div>
															<a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><img src="images/category/<?=$row['cat_image']?>" class="img-responsive" style="width:200px; height:200px;" alt="<?=$row['cat_name']?>"></a>
															<div class="agile-product-text">              
																<h5 style="display:block; width: 120px;
								                                            white-space: nowrap;
								                                            overflow: hidden;
								                                            text-overflow: ellipsis;">
								                                            <a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></h5>  
															</div>
														</div> 							
													</div> 
													<?php } ?>															 
													<div class="clearfix"> </div>
												</div>
											</div>	
										</div>
									</div>

						</div>		
						<div class="clearfix"> </div>
					</div>







<!-- Latest 10 Products -->
					<div id="w3sec8" class="container-fluid sitemap-text">
						<h3 class="w3sitemap-title"><i class="fa fa-send"></i> Latest 10 Products</h3>  
						<div class="col-md-3 sitemap-text-grids"> 
							<li><h5 class="sitemap-text-title"><a href="latest10.php">Latest 10 Products</a></h5> </li>  

							<!-- Latest 10 Products -->
								<div class="products">	 
									<div class="container">
										<div class="col-md-9 product-w3ls-right">
											<!-- breadcrumbs --> 
											<ol class="breadcrumb breadcrumb1">
												<li><a href="index.php">Home</a></li>
												<li class="active">Products</li>
											</ol> 
											<div class="clearfix"> </div>
											<!-- //breadcrumbs -->
											<div class="product-top">
												<h4>Latest 10 Products</h4>
												<ul> 
													<li class="dropdown head-dpdn">
														<?php 
														// Get all category from database to show 
														$sql = "SELECT * FROM brand ORDER BY brand_id DESC;";
														include_once 'dbCon.php';	
														$con = connect();
														$result = $con->query($sql);
														?>										               		
														<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<span class="caret"></span></a>
														<ul class="dropdown-menu">
															<?php 
							                			foreach($result as $row){ ?>
															<li><a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></li>
															<?php } ?>  
														</ul>
													</li>						 
												</ul>
												<ul> 
													<li class="dropdown head-dpdn">
														<?php 
														// Get all category from database to show 
														$sql = "SELECT * FROM category ORDER BY cat_id DESC;";
														include_once 'dbCon.php';	
														$con = connect();
														$result = $con->query($sql);
														?>										               		
														<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>
														<ul class="dropdown-menu">
															<?php 
							                			foreach($result as $row){ ?>
															<li><a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></li>
															<?php } ?>  
														</ul>
													</li>						 
												</ul> 
												<div class="clearfix"> </div>
											</div>

											<div class="products-row">
												<?php 						
												// Get all products from database to show 
												$sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT 10;";
												include_once 'dbCon.php';	
												$con = connect();
												$result = $con->query($sql);
												?>	
												<?php 
												foreach($result as $row){ ?> 				
												<div class="col-md-3 product-grids">					
													<div class="agile-products">
														<form method="post" action="index.php?action=add&id=<?php echo $row["product_id"]; ?>">
															<div class="new-tag"><h6>GET<br>NOW</h6></div>
															<a href="single.php?pro-id=<?=$row['product_id']?>"><img src="images/products/<?=$row['product_image']?>" class="img-responsive" style="width:200px; height:200px;" alt="<?=$row['product_name']?>"></a>
															<div class="agile-product-text">              
																<h5 style="display:block; width: 120px;
								                                            white-space: nowrap;
								                                            overflow: hidden;
								                                            text-overflow: ellipsis;">
								                                            <a href="single.php?pro-id=<?=$row['product_id']?>"><?=$row['product_name']?></a></h5> 
																<h6>£<?=$row['product_price']?></h6> 
																
																
																<label>Quantity</label>
																<input type="number" name="quantity" class="form-control" max="<?=$row['stock_quantity']?>" value="1" style="width: 30%;">
																

																<input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
																<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
																<?php if($row["stock_quantity"]>0) { ?>
																	<input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success" value="Add To Cart"> <br><br>
																<?php } ?>
																<?php if($row["stock_quantity"]<1) { ?>
																	<p style="color: red; font-size: 17px; font-weight: 700;">This Item is Out of Stock</p>
																<?php } ?>

																<h5>Item Remains: <?=$row['stock_quantity']?></h5>
															</div>
														</form> 
													</div> 							
												</div> 
												<?php } ?>															 
												<div class="clearfix"> </div>
											</div>
										</div>
										<!-- sidebar -->
											<?php include_once 'template/sidebar.php' ?>
										<!-- //sidebar --> 
									</div>
								</div>			
						</div>		
						<div class="clearfix"> </div>
					</div>




					
				</div>
<script>
	$(document).ready(function(){
	  // Add scrollspy to <body>
	  $('body').scrollspy({target: ".sitemap-tabs", offset: 50});

	  // Add smooth scrolling on all links inside the navbar
	  $("#myNavbar a").on('click', function(event) {
		// Make sure this.hash has a value before overriding default behaviour
		if (this.hash !== "") {
		  // Prevent default anchor click behaviour
		  event.preventDefault();

		  // Store hash
		  var hash = this.hash;

		  // Using jQuery's animate() method to add smooth page scroll
		  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		  $('html, body').animate({
			scrollTop: $(hash).offset().top
		  }, 800, function(){
	   
			// Add hash (#) to URL when done scrolling (default click behaviour)
			window.location.hash = hash;
		  });
		}  // End if
	  });
	});
</script> 
				<div class="sitemap-row2  sitemap-text"> 
					<h3 class="w3sitemap-title"><i class="fa fa-gears"></i>BDguitarZone Services</h3>  
					<div class="col-md-4 sitemap-text-grids">
						<ul>   
							<li><a href="contact.php">Contact With Us</a></li> 							 
						</ul>
					</div>
					<div class="col-md-4 sitemap-text-grids">
						<ul>  
							<li><a href="signup.php">Sign Up</a></li>  
							<li><a href="login.php">Login</a></li>  
						</ul>
					</div>
					<div class="col-md-4 sitemap-text-grids">
						<ul>  
							<li><a href="help.php">Help</a></li>   
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>

			</div>
		</div>
		<!-- //site map --> 

		<!-- footer -->
			<?php include_once 'template/footer.php' ?>
		<!-- //footer --> 
	</body>
</html>	