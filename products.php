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
									<h6> ৳ <?=$row['product_price']?></h6> 

									
									<label>Quantity</label>
									<input type="number" name="quantity" class="form-control" max="<?=$row['stock_quantity']?>" value="1" style="width: 50%;">
									

									<input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
									<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
									
									<?php if($row["stock_quantity"]>0) { ?>
										<input type="submit" name="add_to_cart" style="margin-top: 15px;" class="btn btn-success" value="Add To Cart"> <br><br>
									<?php } ?>
									<?php if($row["stock_quantity"]<1) { ?>
										<h5 style="color: red; font-size: 15px; font-weight: 700;">This Item is Out of Stock</h5>
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

			<!-- recommendation -->
				<?php include_once 'template/recommendation.php' ?>
			<!-- //recommendation -->
		</div>
	</div>
	<!--//products-->  

		<!-- footer -->
			<?php include_once 'template/footer.php' ?>
		<!-- //footer --> 
	</body>
</html>	