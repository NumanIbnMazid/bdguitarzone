
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


<!--Current Sessions-->
    <!-- <?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';  ?> --> 
<!--//Current Sessions-->


    <?php 


        $iUniqueNumber = crc32(uniqid());

        if($_POST){     

                                                         
            $order_total    = $total;
            $userId         = $iUniqueNumber;
            $shift          = $_POST['shift'];
            $gift           = isset($_POST['gift']) ? $_POST['gift'] : 0;
            $dateOfPurchase = $_POST['date_of_purchase'];
            $name           = $_POST['name'];
            $lName          = $_POST['lName'];
            $gender         = $_POST['gender'];
            $age            = $_POST['age'];
            $address        = $_POST['address'];
            $post_cd        = $_POST['post_cd'];
            $mobile         = $_POST['mobile'];
            $more           = $_POST['more'];
            $email          = $_POST['email'];
            //echo $dateOfPurchase;exit;
            //print_r($item_id);exit;
        
          
            $sql = "INSERT INTO booking(order_total,user_id,shift,gift,date_of_purchase,name,lName,gender,age,address,post_cd,mobile,more,email)
                VALUES ('$order_total','$userId','$shift','$gift','$dateOfPurchase','$name','$lName','$gender','$age','$address','$post_cd','$mobile','$more','$email');";

            include_once 'dbCon.php';   
            $con = connect();
            if ($con->query($sql) === TRUE) {
                $msg= "New record created successfully <br>";
            } else {
                $msg= "Error: " . $sql . "<br>" . $con->error;
            }
            
            $booking_id = $con->insert_id;

                    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
                    $item_array_qtty = array_column($_SESSION["shopping_cart"], "item_quantity");
                    $fei = 0;
                    //echo $orderId;exit;
                     foreach($item_array_id as $id => $qtty){
                        $iqtty = sizeof($item_array_qtty);
                        
                        if($qtty >0){

                            $sql = "SELECT * FROM product WHERE product_id = $qtty";
                        
                            $product = $con->query($sql);
                            foreach($product as $pd){
                                $singleProduct = $pd;
                            }        

                    //print_r($singleProduct); 
                            // $Quantity       = $values["item_quantity"];
                            $Quantity       = $item_array_qtty[$fei];
                            $unit_price = $singleProduct['product_price'];
                            $sub_total = $unit_price * $Quantity;

                            $sql = "INSERT INTO booking_details(booking_id,product_id,unit_price,order_quantity,subtotal) 
                            VALUES ('$booking_id','$qtty','$unit_price','$Quantity','$sub_total')";
                            $con->query($sql);
                            $updatedQuantity = $singleProduct['stock_quantity'] - $Quantity;

                            $sqlUpdte = "UPDATE product SET stock_quantity=$updatedQuantity WHERE product_id=$qtty";
                            $con->query($sqlUpdte);
                            // echo '<br><br><br><br><br>';
                            // echo $Quantity;
                          /*print_r($_SESSION['shopping_cart']);
                          echo '<br><br><br><br><br>';
                          print_r($item_array_id);
                          echo '<br>';
                          echo $iqtty;
                          echo '<br>';
                          print_r($item_array_qtty);
                          echo '<br> Qtty:';
                          echo $item_array_qtty[$fei];*/
                        $fei = $fei + 1;
                    
                    /*$unit_price = $values["item_price"];
                    $subtotal = $values["item_quantity"] * $values["item_price"];
                    $qtty       = $values["item_quantity"];

                    $sql = "INSERT INTO booking_details(booking_id,product_id,unit_price,order_quantity,subtotal) 
                    VALUES ('$booking_id','$productid','$unit_price','$qtty','$subtotal')";
                    $con->query($sql);*/
                    
                    }
                }

                include 'mailSender.php';
                $mail->Body = '<html><body> Hi '.$lName.' ,<br/>
                                            Your Booking Information: <br/><br/>
                                            Booking Date : ['.$dateOfPurchase.']<br/>
                                            Order Total : BDT ['.$order_total.']<br/>
                                            Booking Shift : ['.$shift.']<br/>
                                            Gift : ['.$gift.']<br/>                                            
                                            <br/>
                                            [N:B:] You must confirm your booking within 20 working days from your booking date.<br/>
                                            Otherwise your order will be automatically cancelled.<br/>
                                            
                                            And You have to bring both soft and hard copy of your Booking Confirmation Email.<br/>
                                            <br/>
                                            If You have any issues, please contact with us.<br/>
                                            Mobile: 01680000000<br/>
                                            E-mail: bdguitarzone@gmail.com<br/><br/>
                                            Your User ID : ['.$userId.']<br/><br/>
                                            Thanks For Being with us.<br/>
                                            <admin>
                                            </body></html>';
                $mail->addAddress($email, $lName);

                if(!$mail->send()) {                   
                    echo  '<script>alert("Something went wrong, Mail not sent. Please contact with us."); window.location.href = "contact.php";</script>';
                }else{
                    echo  '<script>alert("Booking succesfull ! Please check your mail for confirmation."); window.location.href = "products.php";</script>';
                }
                unset($_SESSION['shopping_cart']);
            }
                
                // Get all category from database to show in drop down 
                $sql = "SELECT * FROM product;";
                
                include_once 'dbCon.php';   
                $con = connect();
                $result = $con->query($sql);
                    
            ?>

<!-- products -->
<div class="products">   
    <div class="container" style="width: 98%;">


        <div class="row form-group">
            <div class="col-xs-12">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li class="active"><a href="#step-1">
                        <p class="list-group-item-text"></p>
                    </a></li>
                </ul>
            </div>
        </div>



<!--Book AS Registered Customer-->

<div class="row setup-content" id="step-1">
    <div class="col-xs-12">
        <div class="col-md-12 well">
            <h1 class="text-center"> Booking as a Guest</h1>
            <div class="container wrapper" style="width: 100%;">
                <div class="row cart-head">
                    <div class="container">
                        <div class="row">
                            <p></p>
                        </div>
                        
                        <div class="row">
                            <p>
                                <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
                                <button id="activate-step-2" class="btn btn-primary btn-lg" onclick="window.location.href='checkoutUser.php'"> Book as a Registered User </button>
                                <?php }else {?>  
                                <button id="activate-step-2" class="btn btn-primary btn-lg" onclick="window.location.href='signup.php'"> Book as a Registered User </button>
                                <?php } ?>                                                                         
                            </p>
                        </div>
                    </div>
                </div>    
                    <div class="row cart-body">
                        <form class="form-horizontal" method="post" action="" onsubmit="return confirm('Are you sure you want to submit?')">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">

                                        <!--REVIEW ORDER-->
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    Review Order 
                                                </div>
                                                <div class="panel-body">
                                                    <?php 
                                                        if(!empty($_SESSION["shopping_cart"]))
                                                        {
                                                            $total = 0; 
                                                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                                
                                                        ?>
                                                        <div class="form-group">        

                                                                <?php                       
                                                                // Get all products from database to show 
                                                                $match_id = $values["item_id"];
                                                                $sql = "SELECT * FROM product WHERE product_id = $match_id;";
                                                                include_once 'dbCon.php';   
                                                                $con = connect();
                                                                $result = $con->query($sql);
                                                                ?>  
                                                                <?php 
                                                                foreach($result as $row){ ?>                                                                            
                                                            <div class="col-sm-3 col-xs-3" style="height: 50px; width: 50px;">
                                                                <img class="img-responsive" src="images/products/<?=$row['product_image']?>" />
                                                            </div>
                                                           <?php } ?>   
                                                            <div class="col-sm-6 col-xs-6">

                                                                <div class="col-xs-12" name="productID[<?php echo $values["item_id"]; ?>]" >
                                                                    <a href="single.php?pro-id=<?php echo $values["item_id"]; ?>"><?php echo $values["item_name"]; ?></a>
                                                                </div>

                                                                <div class="col-xs-12 qtty">
                                                                    <small>
                                                                        Quantity:<span style="padding-right: 50px;" class="qtty">
                                                                            <?php echo $values["item_quantity"]; ?>
                                                                        </span>
                                                                    </small>
                                                                </div>
                                                            </div>

                                                            <?php
                                                             $subtotal = $values["item_quantity"] * $values["item_price"];
                                                             { ?>

                                                            <div class="subtotal" name="unit_price">
                                                                <h6><p style="color: #551A8B;"><span style="color: #A020F0;">[Unit Price]</span>  ৳  <?php echo $values["item_price"]; ?></p></h6>
                                                            </div>

                                                            <div class="" name="subtotal">
                                                                <h6><p style="color: #8B4789;"><span style="color: #DA70D6;">[Subtotal]</span>  ৳ <?php echo number_format($subtotal,2); ?></p></h6>
                                                            </div>
                                                            
                                                            <?php } ?>


                                                        </div>
                                                    <?php                                                          
                                                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                                        }
                                                    ?>
                                                    <div class="form-group"><hr /></div>

                                                    <div class="form-group">
                                                        <div class="col-xs-12">
                                                            <strong>Grand Total</strong>
                                                            <div class="pull-right">
                                                                <span name="grand_total" class="grand_total" style="color: #698B22;">
                                                                 ৳ <?php echo number_format($total,2); ?>
                                                                 </span>
                                                             </div>
                                                        </div>
                                                    </div>

                                                    <div class="row checkout">
                                                      <?php if(!empty($_SESSION["shopping_cart"])) { ?> 
                                                        
                                                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i><a href="index.php?action=deleteAll&id=<?php echo $values["item_id"]; ?>" style="padding-right: 14px;font-size: 15px;"> REMOVE ALL </a>
                                                    <?php } ?>
                                                        
                                                        <i class="fa fa-square" aria-hidden="true"></i><a href="products.php" style="padding-right: 14px;font-size: 15px;color: #104E8B;"> Continue Shopping </a>
                                                      <i class="fa fa-check-circle" aria-hidden="true"></i><a href="cart.php"> Review Cart </a>

                                                    </div>
                                                </div>
                                                <?php } ?>  
                                            </div>
                                        <!--REVIEW ORDER END-->
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                                            <!--PERSONAL INFORMATION-->
                                            <div class="panel panel-info">
                                                <div class="panel-heading"> Provide Your Personal Information</div>
                                                <div class="panel-body">
                                                    <span style="font-size: 18px; font-weight: 700; margin-bottom: 10px;"><i class="fa fa-exclamation-triangle" aria-hidden="true">
                                                            <span class="text-danger"></span>
                                                        </i> You must fill up the fields properly that are marked with  
                                                        <span style="color: green; font-size: 20px;"> * </span>
                                                    </span>
                                                    
                                                <!-- Name --> 
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>First Name: <span style="color: green; font-size: 20px;">*</span></strong>
                                                            <input type="text" name="name" id="name" minlength="1" maxlength="14" placeholder="First Name..." class="form-control" value="" required=" " />
                                                        </div>

                                                        <div class="span1"></div>

                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>Last Name: <span style="color: green; font-size: 20px;">*</span></strong>
                                                            <input type="text" name="lName" id="lName" minlength="1" maxlength="19" placeholder="Last Name..." class="form-control" value="" required=" " />
                                                        </div>
                                                    </div>
                                                <!-- gender -->
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>Gender: <span style="color: green; font-size: 20px;">*</span></strong>
                                                        </div>
                                                        <div class="span1"></div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <input type="radio" name="gender" value="M" <?php echo (isset($gender) && $gender == "M") ? 'checked="checked"' : ''; ?>/>       Male
                                                            <input type="radio" name="gender" value="F" <?php echo (isset($gender) && $gender == "F") ? 'checked="checked"' : ''; ?>/>       Female 
                                                            <input type="radio" name="gender" value="O" <?php echo (isset($gender) && $gender == "O") ? 'checked="checked"' : ''; ?>/>       Other  
                                                        </div>
                                                    </div>
                                                <!-- age -->
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Age: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                                        <div class="col-md-12">
                                                            <input type="number" name="age" id="age" size="20" min="10" max="130" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" required=" "  class="form-control" />
                                                        </div>
                                                    </div>
                                                <!-- address -->
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Address: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                                        <div class="col-md-12">
                                                            <input type="text" name="address" id="address" minlength="5" maxlength="50" placeholder="Address..." required=" " class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                <!-- Postal Code -->
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Postal Code: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                                        <div class="col-md-12">
                                                            <input type="tel" name="post_cd" id="post_cd" minlength="4" maxlength="4" placeholder="Postal Code..." onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" required=" " class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                <!-- mobile -->
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Mobile Number: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                                        <div class="col-md-12">
                                                            <input type="tel" id="mobile" name="mobile" size="20" minlength="11" maxlength="11" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="ex: 01685238317" required="" class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                <!-- more about you -->
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>More About You:</strong></div>
                                                        <div class="col-md-12"><input type="text" name="more" id="more" maxlength="60" placeholder="More About You..." class="form-control" value="" /></div>
                                                    </div>
                                                <!-- email -->
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Email Address: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                                        <div class="col-md-12"><input type="email" name="email" id="email" maxlength="59" placeholder="ex: numan@gmail.com"" autofocus required pattern="[^ @]*@[^ @]*" required="" class="form-control" value="" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--PERSONAL INFORMATION END-->

                                        <!--BOOKING INFORMATION-->
                                            <div class="panel panel-info">
                                                <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Provide Booking Information </div>

                                                <div class="panel-body">
                                                    <div>
                                                        <span style="color: #286090;margin-bottom: 15px; font-size:20px;">
                                                            <i class="fa fa-gift" aria-hidden="true"> 
                                                                <span style="color: green; font-size: 20px; font-weight: 700;"> Gift: 
                                                                </span>
                                                            </i> [ If Your order total is upto 28,999 you can view and select an special gift bellow.. Otherwise you can't.. ]
                                                        </span>
                                                    </div>
                                            <!--BOOKING Shift-->
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Booking Shift: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                                        <div class="col-md-12">
                                                            <select id="shift" name="shift" class="form-control">
                                                                <option value="Morning" > Morning (10AM - 1PM) </option>
                                                                <option value="Afternoon" > Afternoon (2PM - 5PM) </option>
                                                                <option value="Evening" > Evening (6PM - 8PM) </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            <!--BOOKING Date-->
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <strong>Booking Date: <span style="color: green; font-size: 20px;">*</span></strong>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <input type="text" name="date_of_purchase" id="date_of_purchase" class="form-control" value="" />
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
                                                    <!--Gift-->
                                                    <?php if($total>28999) { ?>
                                                            <div class="form-group">
                                                                <div class="col-md-12"><strong> Select Your Gift:</strong></div>
                                                                <div class="col-md-12">
                                                                    <select id="gift" name="gift" class="form-control">
                                                                        <option value="Tuner" > Tuner (Peterson StroboClip) </option>
                                                                        <option value="Belt" > Guitar Strap (MONO GS1 Betty) </option>
                                                                        <option value="Capo" > Capo (Planet Waves NS) </option>
                                                                        <option value="Book" > Lesson Book (Guitar Lessons For Beginners) </option>
                                                                        <option value="String" > A Set of String (D'Addario EJ16-Phosphor Bronze) </option>
                                                                        <option value="0" > I Don't Want (If you don't want any gift) </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                        <div class="col-md-12">
                                                            <span><i class="fa fa-exclamation-triangle" aria-hidden="true"><span class="text-danger"> [N:B:] Confirm Booking: </span></i> You must confirm your booking within 20 Working Days or Your Booking will be cancelled. (You have to Come Physically to the Shop With the Soft and Hard copy of Your "Booking Confirmation Email"). .</span>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--BOOKING INFORMATION END-->
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="row cart-footer">
                            
                                </div>
                            </div>

                        <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
                            <button id="activate-step-2" class="btn btn-primary btn-lg" onclick="window.location.href='checkoutUser.php'"> Skip These Steps </button>
                        <?php }else {?>
                            <button class="btn btn-primary btn-lg" onclick="window.location.href='login.php'" > Skip These Steps & Book As Registered Customer </button>
                        <?php } ?>

                    </div>
                </div>
            </div>


<div class="row setup-content" id="step-3">
    <div class="col-xs-12">
        <div class="col-md-12 well">
            <h1 class="text-center"> STEP 3</h1>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
    
        var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();

        navListItems.click(function(e)
        {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');
            
            if (!$item.hasClass('disabled')) {
                navListItems.closest('li').removeClass('active');
                $item.addClass('active');
                allWells.hide();
                $target.show();
            }
        });
        
        $('ul.setup-panel li.active a').trigger('click');
        
        // DEMO ONLY //
        $('#activate-step-2').on('click', function(e) {
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            $(this).remove();
        })    
    });
</script>

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