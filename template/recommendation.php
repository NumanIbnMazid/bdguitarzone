
<!-- subscribe -->
<div class="subscribe"> 
	<div class="container">
		<div class="col-md-6 social-icons w3-agile-icons">
			<h4>Keep in touch</h4>  
			<ul>
				<li><a href="https://www.youtube.com/channel/UCNNlfUfTU61QaJDWPEakkeg?view_as=subscriber" class="fa fa-facebook icon facebook"> </a></li>
				<li><a href="https://www.youtube.com/channel/UCNNlfUfTU61QaJDWPEakkeg?view_as=subscriber" class="fa fa-twitter icon twitter"> </a></li>
				<li><a href="https://www.youtube.com/channel/UCNNlfUfTU61QaJDWPEakkeg?view_as=subscriber" class="fa fa-google-plus icon googleplus"> </a></li>
				<li><a href="https://www.youtube.com/channel/UCNNlfUfTU61QaJDWPEakkeg?view_as=subscriber" class="fa fa-dribbble icon dribbble"> </a></li>
				<li><a href="https://www.youtube.com/channel/UCNNlfUfTU61QaJDWPEakkeg?view_as=subscriber" class="fa fa-rss icon rss"> </a></li> 
			</ul> 
		</div> 
		<div class="recommend">
	<h3 class="w3ls-title">Our Recommendations </h3> 
	<script>
		$(document).ready(function() { 
			$("#owl-demo5").owlCarousel({
		 
			  autoPlay: 3000, //Set AutoPlay to 3 seconds
		 
			  items :4,
			  itemsDesktop : [640,5],
			  itemsDesktopSmall : [414,4],
			  navigation : true
		 
			});
			
		}); 
	</script>
	<div id="owl-demo5" class="owl-carousel">
		<?php 
        // Get all products from database to show 
        $sql = "SELECT * FROM product ORDER BY product_id DESC;";
        include_once 'dbCon.php'; 
        $con = connect();
        $result = $con->query($sql);
        ?>   
        <?php 
        foreach($result as $row){ ?> 
		<div class="item">					                
			<div class="glry-w3agile-grids agileits" style="height: 300px;">
				<div class="new-tag"><h6>New <br> Product</h6></div>
				<form method="post" action="index.php?action=add&id=<?php echo $row["product_id"]; ?>">					
					<a href="single.php?pro-id=<?=$row['product_id']?>"><img src="images/products/<?=$row['product_image']?>" style="width:200px; height:200px" alt="<?=$row['product_name']?>"></a>
					<div class="view-caption agileits-w3layouts">           
						<h4 style="display:block; width: 120px;
	                                        white-space: nowrap;
	                                        overflow: hidden;
	                                        text-overflow: ellipsis;"><a href="single.php?pro-id=<?=$row['product_id']?>"><?=$row['product_name']?></a></h4>
						<p 
							style="display:block; width: 120px;
	                                        white-space: nowrap;
	                                        overflow: hidden;
	                                        text-overflow: ellipsis;"
						><?=$row['product_description']?></p>
						<h5>৳<?=$row['product_price']?></h5>
						
						<?php if($row["stock_quantity"]>0) { ?>
						<label style="padding-left: 20px; margin-top: -20px;">Quantity</label>
						<input type="number" name="quantity" class="form-control" max="<?=$row['stock_quantity']?>" value="1" style="background-color: #fff; width: 50%; height: 25px;">
						<?php } ?>

						<input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
						
						<?php if($row["stock_quantity"]>0) { ?>
							<input type="submit" name="add_to_cart" style="margin-top: 5px; height: 40px;" class="btn btn-secondary" value="Add To Cart"> <br><br>
						<?php } ?>
						<?php if($row["stock_quantity"]<1) { ?>
							<p style="color: red; font-size: 15px; font-weight: 700;">This Item is Out of Stock</p>
						<?php } ?>

						<h4 style="color: #fff;">Item Remains: <?=$row['stock_quantity']?></h4>

					</div> 
				</form>
			</div> 					
		</div> 
		<?php } ?>   
	</div>    
</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //subscribe --> 