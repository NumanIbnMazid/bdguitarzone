<!--head-area-->
	<?php include_once 'admin/template/adminHead.php' ?>
<!--//head-area--> 
	
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
	<!--header-area-->
		<?php include_once 'admin/template/adminHeader.php' ?>
	<!--//header-area-->   


	    <!-- Page Content -->
	    <div class="container" style="padding-top: 40px;">
	        <div class="row">
	    <?php
			//product edit
			$product_id =  $_GET['product-id'];
				include_once 'dbCon.php';
				$con = connect();

				$sql = "SELECT * FROM `product` WHERE product_id=$product_id";
				
				$result = $con->query($sql);
				foreach($result as $product){
					$product_name 			= $product['product_name'];
					$brands 				= $product['brands'];
					$category     			= $product['cat'];
					$product_price 			= $product['product_price'];
					$product_video 			= $product['product_video'];
					$product_description 	= $product['product_description'];
					$qtty 					= $product['stock_quantity'];					
				}
				?>
	            <div class="col-md-5">		
	            	<li style="padding-bottom: 20px;">Modify Product</li>			
					<form action="" method="POST"  enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to Update?')">
						<div class="form-group">
							<label for="productName">Product Name:</label>
							<input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product_name?>"/>
						</div>
						  
						<div class="form-group">
							<label for="productBrand">Product Brand:</label>
							<select name="brands" class="form-control">
								<option value="<?=$brand['brand_id']?>">- Select Brand -</option>
								<?php 
								// Get all brands from database to show in drop down 
									$sql = "SELECT * FROM brand;";					
									include_once 'dbCon.php';	
									$con = connect();
									$result = $con->query($sql);
										
								?>
								<?php
									foreach($result as $newBra){
										echo '<option value="'.$newBra['brand_id'].'"'.($newBra['brand_id'] ==$brands? 'selected' : '').'>'.$newBra['brand_name'].'</option>';
									}
								?>
							</select>
						</div>	
						<div class="form-group">
							<label for="productCategory">Product Category:</label>
							<select name="cat" class="form-control">
								<option value="<?=$category['cat_id']?>">- Select Category -</option>
								<?php
								// Get all category from database to show in drop down 
									$sql = "SELECT * FROM category;";
									
									include_once 'dbCon.php';	
									$con = connect();
									$result = $con->query($sql);										
								?>
								<?php
									foreach($result as $newCat){
										echo '<option value="'.$newCat['cat_id'].'"'.($newCat['cat_id'] ==$category? 'selected' : '').'>'.$newCat['cat_name'].'</option>';
									}
								?>
							</select>
						</div>					  
						<div class="form-group">
							<label for="price">Product Price:</label>
							<input type="number" class="form-control" name="product_price" id="price" value="<?php echo $product_price?>">
						</div>
						<div class="form-group">
							<label for="qtty">Stock Quantity:</label>
							<input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="qtty" id="qtty" value="<?php echo $qtty?>">
						</div>
						
						<div class="form-group">
							<label for="video">Product Video:

							<div class="panel-group">
							  <div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" href="#collapse1" style="font-weight: 500; color: #3399cc;">Click Here to learn How to Add Video</a>
							      </h4>
							    </div>
							    <div id="collapse1" class="panel-collapse collapse">
							      <ul class="list-group">
							        <li class="list-group-item">Step 1: Use the <a href="https://www.youtube.com/">Youtube</a> site to provide video for your Product</li>
							        <li class="list-group-item">Step 2: Click the 'Share' button below the video <img style="width:440px;" src="images/help/step2.png" /></li>
							        <li class="list-group-item">Step 3: Click the 'Embed' button next to the link they show you <img style="width:440px;" src="images/help/step3.png" /></li>
							        <li class="list-group-item">Step 4: Copy the whole code between the iframe <img style="width:440px;" src="images/help/step4.png" /></li>
							        <li class="list-group-item">Step 5: Paste the link to the bellow box and you are done. <img style="width:440px;" src="images/help/step5.png" /></li>
							      </ul>
							    </div>
							  </div>
							</div>

							</label>
							<div class="form-group">
								<textarea class="form-control" name="product_video" id="product_video" placeholder="Paste Your iframe Code Here"><?php echo $product_video; ?></textarea>
								
								<!-- <input type="textarea" class="form-control" name="product_video" id="product_video" value="<?php echo $product_video; ?>" placeholder="Paste Your iframe Code Here" /> -->
							</div>										
						</div>

						<div class="form-group">
							<label for="description">Product Description:</label>
							<input type="text" class="form-control" name="product_description" id="product_description" value="<?php echo $product_description?>">						
						</div>
					  <button type="submit" class="btn btn-info">Update</button>
					</form>
	<?php 

	if($_POST){
		$product_name 			= $_POST['product_name'];
		$brands 				= $_POST['brands'];
		$category 				= $_POST['cat'];		
		$product_price 			= $_POST['product_price'];
		$product_video 			= $_POST['product_video'];
		$product_description 	= $_POST['product_description'];
		$qtty 					= $_POST['qtty'];	
		
		$sql = "UPDATE product SET product_name='$product_name', brands='$brands', cat='$category', product_price='$product_price', product_video='$product_video', product_description='$product_description', stock_quantity='$qtty'
				WHERE product_id=$product_id";
				echo("<script>location.href = 'productList.php'</script>");  
		//echo $sql;exit;		
		include_once 'dbCon.php';	
		$con = connect();
		if ($con->query($sql) === TRUE) {
			echo "New record Updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}
	
?>
	<!--Message-----------------------------------------------------------------------------------------------------------Message-->
		<div class="col-md-4" style="margin: 0px; left:-20px; width: 461px; height: 80px; color:#3399cc; font-weight: 700; ">
				<?php if(isset($msg)) {echo $msg; unset($msg); }?>
		</div>
	<!--Message-----------------------------------------------------------------------------------------------------------Message-->

				</div>
	        </div>
	        
	    </div>

    <!--footer-area-->
		<?php include_once 'admin/template/adminFooter.php' ?>
	<!--//footer-area-->

<?php }else {?>
	<?php 
	session_start();
	session_destroy();	
	echo  '<script>alert("Something went wrong, Please try again later."); window.location.href = "http://localhost/bdguitarzone/index.php";</script>'; ?>
<?php } ?>