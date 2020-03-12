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