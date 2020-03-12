<div class="col-md-3 rsidebar">
	<div class="rsidebar-top">
		<div class="sidebar-row">
			<h4> Browse Store</h4>
			<ul class="faq">
				<li class="item1"><a href="#">Browse By Categories<span class="glyphicon glyphicon-menu-down"></span></a>
					<ul>
						<?php 
						// Get all category from database to show 
						$sql = "SELECT * FROM category ORDER BY cat_id DESC;";
						include_once 'dbCon.php';	
						$con = connect();
						$result = $con->query($sql);
						?>
						<?php 
									foreach($result as $row){ 
									//print_r($row);exit;
									?>
						<li class="subitem1"><a href="catProducts.php?cat-id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></li>										
						<?php } ?>									
					</ul>
				</li>
				<li class="item2"><a href="#">Browse By Brands<span class="glyphicon glyphicon-menu-down"></span></a>
					<ul>
						<?php 
						// Get all brands from database to show 
						$sql = "SELECT * FROM brand ORDER BY brand_id DESC;";
						include_once 'dbCon.php';	
						$con = connect();
						$result = $con->query($sql);
						?>
						<?php 
						foreach($result as $row){ 
						//print_r($row);exit;
						?>
						<li class="subitem1"><a href="brandProducts.php?brand-id=<?=$row['brand_id']?>"><?=$row['brand_name']?></a></li>													
						<?php } ?>	
					</ul>
				</li>
				<li class="item3"><a href="#">Browse Latest 04 Products<span class="glyphicon glyphicon-menu-down"></span></a>
					<ul>
						<?php 
						// Get all products from database to show 
						$sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT 04;";
						include_once 'dbCon.php';	
						$con = connect();
						$result = $con->query($sql);
						?>
						<?php 
						foreach($result as $row){ 
						//print_r($row);exit;
						?>
						<li class="subitem1"><a href="single.php?pro-id=<?=$row['product_id']?>"><?=$row['product_name']?></a></li>										
						<?php } ?>						
					</ul>
				</li>
				
				<ul><a href="brands.php">View All Brands</a></ul>
				<ul><a href="category.php">View All Categories</a></ul>
				<ul><a href="products.php">View All Products</a></ul>
				<ul><a href="latest10.php">View Latest 10 Products</a></ul>
				<ul><a href="sitemap.php">View Site Map</a></ul>
				<ul><a href="index.php">Go to Home Page</a></ul>
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
<div class="clearfix"> </div>