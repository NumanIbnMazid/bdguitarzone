<!--head-area-->
    <?php include_once 'admin/template/adminHead.php' ?>
<!--//head-area--> 
    
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
    <!--header-area-->
        <?php include_once 'admin/template/adminHeader.php' ?>
    <!--//header-area-->  


<!-- page Content -->
            <?php
            //Users edit
            $booking_info =  $_GET['booking-id'];
                include_once 'dbCon.php';
                $con = connect();

                $sql = "SELECT * FROM `booking` WHERE booking_id=$booking_info";
                
                $result = $con->query($sql);
                foreach($result as $booking){
                    $shift               = $booking['shift'];
                    $dateOfPurchase      = $booking['date_of_purchase'];
                    $gift      			 = $booking['gift'];

                }
                ?>
    <!-- sign up-page -->
        <div class="login-page">
            <div class="container">
                <h3 class="w3ls-title w3ls-title1">Modify Booking</h3>
                <div class="login-body">
                    <form action="#" method="post" onsubmit="return confirm('Are you sure you want to Update?')">
                        <!--BOOKING INFORMATION-->
                                <div class="panel panel-info">
                                    <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Provide Booking Information </div>
                                    <div class="panel-body">
                                <!--BOOKING Shift-->
                                        <div class="form-group">
                                            <div class="col-md-12"><strong>Booking Shift:</strong></div>
                                            <div class="col-md-12">
                                                <select id="shift" name="shift" class="form-control">
                                                	<?php
														foreach($result as $newBook){
															echo '<option value="'.$newBook['shift'].'"'.($newBook['shift'] ==$shift? 'selected' : '').'>'.$newBook['shift'].'</option>';
														}
													?>
                                                    <option value="Morning" > Morning (10AM - 1PM) </option>
                                                    <option value="Afternoon" > Afternoon (2PM - 5PM) </option>
                                                    <option value="Evening" > Evening (6PM - 8PM) </option>
                                                </select>
                                            </div>
                                        </div>

                                <!--BOOKING Date-->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <strong>Booking Date: </strong>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <input type="text" name="date_of_purchase" id="date_of_purchase" class="form-control" value="<?php echo $dateOfPurchase; ?>" />
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                 
                                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

                                        <script>
                                            $(document).ready(function(){
                                                var date_input=$('input[name="date_of_purchase"]'); //our date input has the name "date"
                                                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                                date_input.datepicker({
                                                    format: 'yyyy/mm/dd',
                                                    container: container,
                                                    todayHighlight: true,
                                                    autoclose: true,
                                                })
                                            })
                                        </script>
								<!--BOOKING Gift-->
                                        <div class="form-group">
                                            <div class="col-md-12"><strong> Select Your Gift:</strong></div>
                                            <div class="col-md-12">
                                                <select id="gift" name="gift" class="form-control">
                                                	<?php
                                                		foreach ($result as $row) {
                                                			echo '<option value="'.$row['gift'].'"'.($row['gift'] ==$gift? 'selected' : '').'>'.$row['gift'].'</option>';
                                                		}
                                                	?>
                                                    <option value="Tuner" > Tuner (Peterson StroboClip) </option>
                                                    <option value="Belt" > Guitar Strap (MONO GS1 Betty) </option>
                                                    <option value="Capo" > Capo (Planet Waves NS) </option>
                                                    <option value="Book" > Lesson Book (Guitar Lessons For Beginners) </option>
                                                    <option value="String" > A Set of String (D'Addario EJ16-Phosphor Bronze) </option>
                                                    <option value="0" > I Don't Want (If you don't want any gift) </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <span><i class="fa fa-exclamation-triangle" aria-hidden="true"><span class="text-danger"> [N:B:] Confirm Booking: </span></i> You must confirm your booking within 20 Working Days or Your Booking will be cancelled. (You have to Come Physically to the Shop With the Soft and Hard copy of Your "Booking Confirmation Email"). .</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <button type="submit" class="btn btn-primary btn-submit-fix">Modify Booking</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--BOOKING INFORMATION END-->

                    </form>
                    <?php
                    if($_POST){
                        $shift          = $_POST['shift'];
                        $gift          = $_POST['gift'];
                        $dateOfPurchase = $_POST['date_of_purchase'];

                        $sql = "UPDATE booking SET shift='$shift',gift='$gift',date_of_purchase='$dateOfPurchase'
                WHERE booking_id=$booking_info";
                echo("<script>location.href = 'bookingList.php?bookingDetails-id=$booking_info;'</script>");  
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
                </div>
            </div>
        </div>
    <!-- /.container -->

    <!--footer-area-->
        <?php include_once 'admin/template/adminFooter.php' ?>
    <!--//footer-area-->

<?php }else {?>
    <?php 
    session_start();
    session_destroy();  
    echo  '<script>alert("Something went wrong, Please try again later."); window.location.href = "http://localhost/bdguitarzone/index.php";</script>'; ?>
<?php } ?>
