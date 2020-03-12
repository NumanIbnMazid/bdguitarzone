<!--header-area-->
	<?php include_once 'admin/template/adminHead.php' ?>
<!--//header-area--> 
	
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
	<!--header-area-->
		<?php include_once 'admin/template/adminHeader.php' ?>
	<!--//header-area-->   
    <!--header-area-->
		<?php include_once 'admin/template/adminDash.php' ?>
	<!--//header-area-->
       

		<?php

		    include_once 'dbCon.php';
		    $con = connect();

		    $sql = "SELECT * FROM `booking` ORDER BY booking_id DESC";
		    
		    $result = $con->query($sql);
		    
		?>


      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Booking Data Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User ID</th>            
              	  <th>Name</th>
                  <th>Booking ID</th>
  		            <th>Booking Date</th>
  		            <th>Order Total</th>
  		            <th>Booking Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>User ID</th>            
            	    <th>First Name</th>
                  <th>Booking ID</th>
		              <th>Booking Date</th>
		              <th>Order Total</th>
		              <th>Booking Status</th>
                </tr>
              </tfoot>
              <tbody>
              	<?php
	            foreach($result as $r) {
	                $bookingIDnew = $r['booking_id'];
	            ?>
                <tr>
                  <td><?php echo $r['user_id'];?></td> 
                  <td><?php echo $r['name'];?></td>
                  <td><?php echo $r['booking_id'];?></td>                  
				          <td><?php echo $r['date_of_purchase'];?></td>
                  <td><?php echo $r['order_total'];?></td>                    
                  <td style="color: #8a2be2;"><?php echo $r['booking_status'];?></td> 

                  <td><i class="fa fa-check-circle" aria-hidden="true"></i><a href="bookingMark.php?booking-id=<?=$r['booking_id']?>"><span class="important"> MARK </span></a></td>
                    <td><i class="fa fa-cog" aria-hidden="true"></i><a href="bookingEditForm.php?booking-id=<?=$r['booking_id']?>"> Edit </a></td>
                    <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="bookingDeleteForm.php?booking-id=<?=$r['booking_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>



      <div class="panel-group" style="margin-top: 20px; margin-bottom: 30px;">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 class="panel-title"> >
              <a data-toggle="collapse" href="#collapse1" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='blue'" style="font-weight: 500; color: #3399cc; text-decoration: none;"> View User Data</a>
            </h5>
          </div>
          <div id="collapse1" class="panel-collapse collapse">
            <ul class="list-group">

              <?php

                include_once 'dbCon.php';
                $con = connect();

                $sql = "SELECT * FROM `users` ORDER BY user_id DESC";
                
                $result = $con->query($sql);
                
              ?>
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> User Data Table</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>User Role</th>
                          <th>User Name</th>
                          <th>Last Name</th>
                          <th>Gender</th>
                          <th>Date of Birth</th>
                          <th>Postal Code</th>
                          <th>Mobile No.</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>User ID</th>
                          <th>User Role</th>
                          <th>User Name</th>
                          <th>Last Name</th>
                          <th>Gender</th>
                          <th>Date of Birth</th>
                          <th>Postal Code</th>
                          <th>Mobile No.</th>
                          <th>Email</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                          foreach($result as $r) {
                        ?>
                        <tr>
                          <td><?=$r['user_id']?></td>
                          <td><?php echo $userType = ($r['user_type'] == 0)? 'Admin':'Customer'; ?></td>
                          <td><?=$r['name']?></td>
                          <td><?=$r['lName']?></td>                   
                          <td><?php echo $r['gender'];?></td>
                          <td><?php echo $r['age'];?></td>
                          <td><?php echo $r['post_cd'];?></td>
                          <td><?php echo $r['mobile'];?></td>
                          <td><?php echo $r['email'];?></td>

                          <td><i class="fa fa-cog" aria-hidden="true"></i><a href="userEditForm.php?user-id=<?=$r['user_id']?>"> Edit </a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div>

            </ul>
          </div>
        </div>
      </div>




      <div class="panel-group" style="margin-top: 20px; margin-bottom: 30px;">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 class="panel-title"> >
              <a data-toggle="collapse" href="#collapse2" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='blue'" style="font-weight: 500; color: #3399cc; text-decoration: none;"> View Product Data</a>
            </h5>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <ul class="list-group">

              <?php
                include_once 'dbCon.php';
                $con = connect();

                $sql = "SELECT * FROM `product` ORDER BY product_id DESC";
                
                $result = $con->query($sql);
                
              ?>

              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> Product Data Table</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Product Id</th>
                          <th>Product Name</th>
                          <th>Product Brand</th>
                          <th>Product Category</th>
                          <th>Product Price</th>  
                          <th>Product Quantity</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Product Id</th>
                          <th>Product Name</th>
                          <th>Product Brand</th>
                          <th>Product Category</th>
                          <th>Product Price</th>  
                          <th>Product Quantity</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                          foreach($result as $r) {
                        ?>
                        <tr>
                          <td><?=$r['product_id']?></td>
                          <td><a href="single.php?pro-id=<?=$r['product_id']?>"><?=$r['product_name']?></a></td>
                          <td><?=$r['brands']?></td>
                          <td><?php echo $r['cat'];?></td>
                          <td><?php echo $r['product_price'];?></td>
                          <td><?php echo $r['stock_quantity'];?></td>
                      
                          <td><i class="fa fa-cog" aria-hidden="true"></i><a href="productEditForm.php?product-id=<?=$r['product_id']?>"> Edit </a></td>
                          <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="productDeleteForm.php?product-id=<?=$r['product_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div>

            </ul>
          </div>
        </div>
      </div>





      <div class="panel-group" style="margin-top: 20px; margin-bottom: 30px;">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 class="panel-title"> >
              <a data-toggle="collapse" href="#collapse3" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='blue'" style="font-weight: 500; color: #3399cc; text-decoration: none;"> View Category Data</a>
            </h5>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <ul class="list-group">

              <?php
              include_once 'dbCon.php';
              $con = connect();

              $sql = "SELECT * FROM `category` ORDER BY cat_id DESC";

              $result = $con->query($sql);

              ?>
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> Category Data Table</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Category Id</th>
                          <th>Category Name</th>

                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Category Id</th>
                          <th>Category Name</th>

                        </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                          foreach($result as $r) {
                        ?>
                        <tr>
                          <td><?=$r['cat_id']?></td>
                          <td><?=$r['cat_name']?></td>
           
                          <td><i class="fa fa-cog" aria-hidden="true"></i><a href="categoryEditForm.php?category-id=<?=$r['cat_id']?>"> Edit </a></td>
                          <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="categoryDeleteForm.php?category-id=<?=$r['cat_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div>
            
            </ul>
          </div>
        </div>
      </div>




      <div class="panel-group" style="margin-top: 20px; margin-bottom: 30px;">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 class="panel-title"> >
              <a data-toggle="collapse" href="#collapse4" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='blue'" style="font-weight: 500; color: #3399cc; text-decoration: none;"> View Brand Data</a>
            </h5>
          </div>
          <div id="collapse4" class="panel-collapse collapse">
            <ul class="list-group">

              <?php
              include_once 'dbCon.php';
              $con = connect();

              $sql = "SELECT * FROM `brand` ORDER BY brand_id DESC";

              $result = $con->query($sql);

              ?>
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> Brand Data Table</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Brand Id</th>
                          <th>Brand Name</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Brand Id</th>
                          <th>Brand Name</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                          foreach($result as $r) {
                        ?>
                        <tr>
                          <td><?=$r['brand_id']?></td>
                          <td><?=$r['brand_name']?></td>

                          <td><i class="fa fa-cog" aria-hidden="true"></i><a href="brandEditForm.php?brand-id=<?=$r['brand_id']?>"> Edit </a></td>
                          <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="brandDeleteForm.php?brand-id=<?=$r['brand_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div>
            
            </ul>
          </div>
        </div>
      </div>

    <!--header-area-->
		<?php include_once 'admin/template/adminFooter.php' ?>
	<!--//header-area-->

<?php }else {?>
	<?php 
	session_start();
	session_destroy();	
	echo  '<script>alert("Something went wrong, Please try again later."); window.location.href = "http://localhost/bdguitarzone/index.php";</script>'; ?>
<?php } ?>

