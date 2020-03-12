<!--header-area-->
	<?php include_once 'admin/template/adminHead.php' ?>
<!--//header-area--> 
	
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
					$target_dir = "images/brand/";
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
										
						$brand_name 			= $_POST['brand_name'];
						$brand_description 		= $_POST['brand_description'];
						
						$sql = "INSERT INTO brand(brand_name,brand_image,brand_description)
							VALUES ('$brand_name','$fileName','$brand_description');";
						
						include_once 'dbCon.php';	
						$con = connect();
						if ($con->query($sql) === TRUE) {
							$msg= "New record created successfully <br>".$msg;
						} else {
							$msg= "Error: " . $sql . "<br>" . $con->error;
						}
					}
				}
				
				// Get all category from database to show in drop down 
				$sql = "SELECT * FROM category;";
				
				include_once 'dbCon.php';	
				$con = connect();
				$result = $con->query($sql);
					
			?>
			
            <div class="col-md-5" style="margin-right: 150px;">	
            <p style="color: purple;">You must fill up the fields properly that are marked with * sign.</p>  	
            <li style="padding-bottom: 30px;">Add Brand</li>		
				<form action="" method="POST"  enctype="multipart/form-data">
					<div class="form-group">
						<label for="brandName">Brand Name: *</label>
						<input type="text" class="form-control" name="brand_name" id="brand_name" minlength="1" maxlength="30" placeholder="Enter Brand Name..." required />
					</div>
					<div class="form-group">
						<label for="image">Brand Image: *</label>
						<input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
					</div>
					<div class="form-group">
						<label for="description">Brand Description:</label>
						<textarea name="brand_description" class="form-control" id="brand_description" maxlength="200" placeholder="Enter Brand Description..." style="margin: 0px; width: 461px; height: 80px;"></textarea>						
					</div>
				  <button type="submit" class="btn btn-info">Submit</button>
				</form>

<!--Message-----------------------------------------------------------------------------------------------------------Message-->
	<div class="col-md-4" style="margin: 0px; left:-20px; width: 461px; height: 80px; color:#3399cc; font-weight: 700; ">
			<?php if(isset($msg)) {echo '<script>alert(" New Record Created Successfully !"); </script>'; unset($msg); }?>
	</div>
<!--Message-----------------------------------------------------------------------------------------------------------Message-->

			</div>
			<div class="brandList" >
			<?php
		    include_once 'dbCon.php';
		    $con = connect();

		    $sql = "SELECT * FROM `brand`";

		    $result = $con->query($sql);

		    ?>
            <li style="padding-bottom: 20px;">Brand List</li>
            <table border="1">
                <tr>
                    <th>Brand Id</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                </tr>
                <?php
                foreach($result as $r) {
                    ?>
                    <tr>
                        <td><?=$r['brand_id']?></td>
                        <td><?=$r['brand_name']?></td>
                        <td><?=$r['brand_description']?></td>

                        <td><i class="fa fa-cog" aria-hidden="true"></i><a href="brandEditForm.php?brand-id=<?=$r['brand_id']?>"> Edit </a></td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="brandDeleteForm.php?brand-id=<?=$r['brand_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
                    </tr>
                <?php } ?>
            </table>
			</div>
        </div>
    </div>
    <!-- /.container -->
    <!--header-area-->
		<?php include_once 'admin/template/adminFooter.php' ?>
	<!--//header-area-->

<?php }else {?>
	<?php 
	session_start();
	session_destroy();	
	echo  '<script>alert("Something went wrong, Please try again later."); window.location.href = "http://localhost/bdguitarzone/index.php";</script>'; ?>
<?php } ?>