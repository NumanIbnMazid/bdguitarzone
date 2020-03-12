<!--head-area-->
  <?php include_once 'admin/template/adminHead.php' ?>
<!--//head-area--> 
  
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
  <!--header-area-->
    <?php include_once 'admin/template/adminHeader.php' ?>
  <!--//header-area-->   

<div class="products">
    <div class="container" style="margin-left: 110px;">
        <li style="padding-bottom: 20px;">Modify Booking Status</li>
        <table border="1">
            
            <?php
                //Users edit
                $booking_info =  $_GET['booking-id'];
                include_once 'dbCon.php';
                $con = connect();

                $sql = "SELECT * FROM `booking` WHERE booking_id=$booking_info";
                
                $result = $con->query($sql);
                foreach($result as $booking){
                    $status     = $booking['booking_status'];

                }
            ?>
            <form action="#" method="post" onsubmit="return confirm('Are you sure you want to Change the status?')">
                <!--BOOKING STATUS-->

                  <div class="form-group">
                      <div class="col-md-6 col-xs-12">
                          <strong>Booking Status:</strong>
                      </div>
                      <div class="span1"></div>
                      <div class="col-md-6 col-xs-12">
                          <input type="radio" name="status" value="Pending" <?php echo (isset($status) && $status == "Pending") ? 'checked="checked"' : ''; ?>/>       Pending
                          <input type="radio" name="status" value="Done" <?php echo (isset($status) && $status == "Done") ? 'checked="checked"' : ''; ?>/>       Done 

                          <div class="form-group" >
                              <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 20px;">
                                  <button type="submit" class="btn btn-primary btn-submit-fix"> Update Status</button>
                              </div>
                          </div>
                      </div>
                  </div>
                            
                <!--BOOKING STATUS END-->
            </form>
            <?php
              if($_POST){
                  $status          = $_POST['status'];

                  $sql = "UPDATE booking SET booking_status='$status' WHERE booking_id=$booking_info";

                  echo("<script>location.href = 'adminIndex.php?bookingDetails-id=$booking_info;'</script>");  
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
        </table>
    </div>
</div>
<?php }else {?>
  <?php 
  session_start();
  session_destroy();  
  echo  '<script>alert("Something went wrong, Please try again later."); window.location.href = "http://localhost/bdguitarzone/index.php";</script>'; ?>
<?php } ?>
