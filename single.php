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


	<!-- breadcrumbs --> 
	<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="index.php">Home</a></li>
			<li class="active">Single Page</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<?php 
							
				// Get all products from database to show 
				$product_id= $_GET['pro-id'];
				$sql = "SELECT * FROM product WHERE product_id=$product_id;";
				include_once 'dbCon.php';	
				$con = connect();
				$result = $con->query($sql);
				?>
				<?php 
				foreach($result as $row){ ?>
				<div class="single-page-row" id="detail-21">
					<form method="post" action="index.php?action=add&id=<?php echo $row["product_id"]; ?>">
						<div class="col-md-6 single-top-left">	
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="images/s1.jpg">
										<div class="thumb-image detail_images"> <img src="images/products/<?=$row['product_image']?>" data-imagezoom="true" class="img-responsive" style="height: 500px; width: 300px; padding-bottom: 20px;" alt=""> </div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-6 single-top-right">
							<h3 class="item_name"><?=$row['product_name']?></h3>

							<div class="video" style="margin-top: 30px;">
								<?=$row['product_video']?>
							</div>
							<div class="single-rating">
								<ul>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li class="rating">20 reviews</li>
									<li><a href="#">Add your review</a></li>
								</ul> 
							</div>
							<div class="single-price">
								<ul>
									<li>৳<?=$row['product_price']?></li>  
								</ul>	
							</div> 
							<p class="single-price-text"><i class="fa fa-align-justify"></i> Description: <?=$row['product_description']?>. </p>

							<?php if($row["stock_quantity"]>0) { ?>
							<label>Quantity</label>
							<input type="number" name="quantity" class="form-control" value="1" style="width: 30%;">
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
					   <div class="clearfix"> </div>  
				   </form> 
				</div>
				<?php } ?>					
				<div class="single-page-icons social-icons"> 
					<ul>
						<li><h4>Share on</h4></li>
						<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
						<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
						<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
					</ul>
				</div>
			</div> 

		<div class="footBar" style="padding-top: 40px;">	
			<!-- footBar -->
				<?php include_once 'template/footBarIndex.php' ?>
			<!-- //footBar -->
		</div>
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