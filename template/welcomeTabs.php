
	<div class="welcome"> 
		<div class="container"> 
			<div class="welcome-info">

<!-- TEST SESSION -->				
<!--  <?php
   foreach($_SESSION as $result){
    print_r($result);
}
?>  -->

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
							<h5>Products</h5>
							<input type="button" name="" onclick="location.href='products.php';" value="View All Products" />
						</a></li>
						<li role="presentation"><a href="#carl" role="tab" id="carl-tab" data-toggle="tab"> 
							<i class="fa fa-copyright" aria-hidden="true"></i>
							<h5>Categories</h5>
							<input type="button" name="" onclick="location.href='category.php';" value="View All Categories" />
						</a></li>
						<li role="presentation"><a href="#james" role="tab" id="james-tab" data-toggle="tab"> 
							<i class="fa fa-briefcase" aria-hidden="true"></i>
							<h5>Brands</h5>
							<input type="button" name="" onclick="location.href='brands.php';" value="View All Brands" />
						</a></li> 
					</ul>
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">Featured For You</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
								<div id="owl-demo" class="owl-carousel"> 
									<?php 
						                    // Get all products from database to show 
						                    $sql = "SELECT * FROM product ORDER BY product_id DESC;";
						                    include_once 'dbCon.php'; 
						                    $con = connect();
						                    $stock = 
						                    $result = $con->query($sql);
						                    ?>
						                    <?php 
						                    foreach($result as $row){ ?>
									<div class="item">
										<div class="glry-w3agile-grids agileits"> 

											<form method="post" action="index.php?action=add&id=<?php echo $row["product_id"]; ?>">

												<a href="single.php?pro-id=<?=$row['product_id']?>">
													<img src="images/products/<?=$row['product_image']?>" style="width:280px; height:310px" alt="<?=$row['product_name']?>"></a>
												<p style="display:block;width: 210px;
							                                            white-space: nowrap;
							                                            overflow: hidden;
							                                            padding-left: 60px;
							                                            ">
							                                            <a href="single.php?pro-id=<?=$row['product_id']?>"><?=$row['product_name']?></a></p>
												<div class="view-caption agileits-w3layouts">           
													<h4><a href="single.php?pro-id=<?=$row['product_id']?>"><?=$row['product_name']?></a></h4>
													<p 
														style="display:block; width: 120px;
							                                            white-space: nowrap;
							                                            overflow: hidden;
							                                            text-overflow: ellipsis;"
													><?=$row['product_description']?></p>
													<h5>৳<?=$row['product_price']?></h5>
													
													<?php if($row["stock_quantity"]>0) { ?> 
													<label>Quantity</label>
													<input type="number" name="quantity" class="form-control" max="<?=$row['stock_quantity']?>" value="1" style="width: 50%;">
													<?php } ?>

													<input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
													<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
													<?php if($row["stock_quantity"]>0) { ?>
														<input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success" value="Add To Cart"> <br><br>
													<?php } ?>
													<?php if($row["stock_quantity"]<1) { ?>
														<p style="color: red; font-size: 15px; font-weight: 700;">This Item is Out of Stock</p>
													<?php } ?>

													<h4>Item Remains: <?=$row['stock_quantity']?></h4>
													
												</div> 
											</form> 

										</div>   
									</div>
									<?php } ?> 
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
									<?php 
						                    // Get all category from database to show 
						                    $sql = "SELECT * FROM category ORDER BY cat_id DESC;";
						                    include_once 'dbCon.php'; 
						                    $con = connect();
						                    $result = $con->query($sql);
						                    ?>
						                    <?php 
						                    foreach($result as $row){ ?>
									<div class="item">
										<div class="glry-w3agile-grids agileits"> 
											<a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><img src="images/category/<?=$row['cat_image']?>" style="width:280px; height:310px" alt="<?=$row['cat_name']?>"></a>
											<p style="display:block;width: 210px;
						                                            white-space: nowrap;
						                                            overflow: hidden;
						                                            padding-left: 60px;
						                                            ">
						                                            <a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></p>
											<div class="view-caption agileits-w3layouts">           
												<h4><a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></h4> 
											</div>   
										</div>   
									</div>
									<?php } ?>   
								</div>   
							</div>
						</div> 
						<div role="tabpanel" class="tab-pane fade" id="james" aria-labelledby="james-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo2").owlCarousel({
									 
										  autoPlay: 2000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo2" class="owl-carousel"> 
									<?php 
						                    // Get all category from database to show 
						                    $sql = "SELECT * FROM brand ORDER BY brand_id DESC;";
						                    include_once 'dbCon.php'; 
						                    $con = connect();
						                    $result = $con->query($sql);
						                    ?>
						                    <?php 
						                    foreach($result as $row){ ?>
									<div class="item">
										<div class="glry-w3agile-grids agileits"> 
											<a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><img src="images/brand/<?=$row['brand_image']?>" style="width:280px; height:310px" alt="<?=$row['brand_name']?>"></a>
											<p style="display:block;width: 210px;
						                                            white-space: nowrap;
						                                            overflow: hidden;
						                                            padding-left: 60px;
						                                            ">
						                                            <a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></p>
											<div class="view-caption agileits-w3layouts">           
												<h4><a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></h4> 
											</div>   
										</div>   
									</div>
									<?php } ?> 
								</div>    
							</div>
						</div> 
					</div>   
				</div> 				
			</div>  	
		</div>  	
	</div> 