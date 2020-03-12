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
					if($_POST){
						// Start of code to upload file
						$target_dir = "images/products/";
						$fileName = basename($_FILES["fileToUpload"]["name"]);
						$target_file = $target_dir . $fileName;
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						
						// Check if image file is a actual image or fake image
						$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
						if($check !== false) {
							$msg = "File is an image - " . $check["mime"] . ".";
							$uploadOk = 1;
						} else {
							$msg = "File is not an image.";
							$uploadOk = 0;
						}
						
						// Check if file already exists
						if (file_exists($target_file)) {
							$msg = "Sorry, file already exists.";
							$uploadOk = 0;
						}
						
						// Check file size
						if ($_FILES["fileToUpload"]["size"] > 50000000) {
							$msg = "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							$msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}
						
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							$msg = "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								$msg = "The file ". $fileName. " has been uploaded.";
							} else {
								$msg = "Sorry, there was an error uploading your file.";
							}
						}
						// =========End of file upload======	
						
						if($uploadOk == 1) {
											
							$product_name 			= $_POST['product_name'];
							$brand 					= $_POST['brands'];
							$category				= $_POST['cat'];
							$product_price 			= $_POST['product_price'];
							$qtty 					= $_POST['qtty'];
							$product_video 			= $_POST['product_video'];
							$product_description 	= $_POST['product_description'];
							
							$sql = "INSERT INTO product(product_name,brands,cat,product_price,product_image,product_video,product_description,stock_quantity)
								VALUES ('$product_name','$brand','$category','$product_price','$fileName','$product_video','$product_description','$qtty');";
							
							include_once 'dbCon.php';	
							$con = connect();
							if ($con->query($sql) === TRUE) {
								$msg= "New record created successfully <br>".$msg;
							} else {
								$msg= "Error: " . $sql . "<br>" . $con->error;
							}
						}
					}
					
					// Get all brands from database to show in drop down 
					$sql = "SELECT * FROM brand;";					
					include_once 'dbCon.php';	
					$con = connect();
					$result = $con->query($sql);						
				?>		

	            <div class="col-md-5" style="margin-right: 150px;">	
	            <p style="color: purple;">You must fill up the fields properly that are marked with * sign.</p>	
	            <li style="padding-bottom: 20px;">Add Product</li>			
					<form action="" method="POST"  enctype="multipart/form-data">
						<div class="form-group">
							<label for="productName">Product Name: *</label>
							<input type="text" class="form-control" name="product_name" id="product_name" minlength="1" maxlength="60" placeholder="Enter Product Name..." required=" " />
						</div>
						  
						<div class="form-group">
							<label for="productBrand">Product Brand: *</label>
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
									foreach($result as $brand){
										echo '<option value="'.$brand['brand_id'].'">'.$brand['brand_name'].'</option>';
									}
								?>
							</select>
						</div>	
						<div class="form-group">
							<label for="productCategory">Product Category: *</label>
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
									foreach($result as $category){
										echo '<option value="'.$category['cat_id'].'">'.$category['cat_name'].'</option>';
									}
								?>
							</select>
						</div>					  
						<div class="form-group">
							<label for="price">Product Price: *</label>
							<input type='text' onkeypress='validate(event)' class="form-control" name="product_price" id="price" minlength="4" maxlength="9"  placeholder="Enter Product Price..." required=" ">
						</div>
						<div class="form-group">
							<label for="qtty">Stock Quantity: *</label>
							<input type="text" class="form-control" name="qtty" id="qtty" minlength="1" maxlength="5" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="Enter Product Quantity..." required=" ">
						</div>
						<div class="form-group">
							<label for="image">Product Image: *</label>
							<input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
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
							<textarea placeholder="Paste Your iframe Code Here..." class="form-control" name="product_video" id="product_video" style="margin: 0px; width: 461px; height: 40px;"></textarea>												
						</div>
						<div class="form-group">
							<label for="description">Product Description:</label>
							<textarea name="product_description" class="form-control" id="product_description" placeholder="Enter Product Description..." style="margin: 0px; width: 461px; height: 80px;"></textarea>						
						</div>
					  <button type="submit" class="btn btn-info">Submit</button>
					</form>

	<!--Message-----------------------------------------------------------------------------------------------------------Message-->
		<div class="col-md-4" style="margin: 0px; left:-20px; width: 461px; height: 80px; color:#3399cc; font-weight: 700; ">
				<?php if(isset($msg)) {echo '<script>alert(" New Record Created Successfully !"); </script>'; unset($msg); }?>
		</div>
	<!--Message-----------------------------------------------------------------------------------------------------------Message-->

				</div>

				<?php
					include_once 'dbCon.php';
					$con = connect();

					$sql = "SELECT * FROM `product`";
					
					$result = $con->query($sql);
					
				?>	
			<div class="productList" >
				<li style="padding-bottom: 20px;">Product List</li>
				<table border="1">
					<tr>
						<th>Product Id</th>
						<th>Product Name</th>
						<th>Product Brand</th>
						<th>Product Category</th>
						<th>Product Price</th>	
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
							<td><?php echo $r['stock_quantity'];?></td>
					
							<td><i class="fa fa-cog" aria-hidden="true"></i><a href="productEditForm.php?product-id=<?=$r['product_id']?>"> Edit </a></td>
							<td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="productDeleteForm.php?product-id=<?=$r['product_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
						</tr>
					<?php } ?>
				</table>
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

<script type="text/javascript">
	function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>