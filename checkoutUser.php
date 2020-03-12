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



    <?php 

        $userId =  $_SESSION['user_id'];
                include_once 'dbCon.php';
                $con = connect();

                $sql = "SELECT * FROM `users` WHERE user_id=$userId";
                
                $result = $con->query($sql);
                foreach($result as $users){
                   	$name           = $users['name'];
		            $lName          = $users['lName'];
		            $gender         = $users['gender'];
		            $age            = $users['age'];
		            $address        = $users['address'];
		            $post_cd        = $users['post_cd'];
		            $mobile         = $users['mobile'];
		            $more           = $users['more'];
		            $email          = $users['email'];
                }


        if($_POST){     

            $productid      = $values["item_id"];
            $order_total    = $total;
            $userId         = $_SESSION['user_id'];
            $shift          = $_POST['shift'];
            $gift          	= isset($_POST['gift']) ? $_POST['gift'] : 0;
            $dateOfPurchase = $_POST['date_of_purchase'];
            
            //echo $dateOfPurchase;exit;
            //print_r($productid);exit;
            
            
            
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
                    //print_r($item_array_id);exit;
                    $item_array_qtty = array_column($_SESSION["shopping_cart"], "item_quantity");
                    $fei = 0;
                    //echo $orderId;exit;
                     foreach($item_array_id as $id => $qtty){
                     	//print_r($id." - ".$qtty);exit;
                        $iqtty = sizeof($item_array_qtty);
                        //print_r($iqtty);exit;
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
                $mail->Body = '<html><body> Hi '.$_SESSION['name'].' ,<br/> 
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
                $mail->addAddress($_SESSION['email'], $_SESSION['name']);

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

 <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
<!-- products -->
<div class="products">   
    <div class="container" style="width: 98%;">


        <div class="row form-group">
            <div class="col-xs-12">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li class="disabled"><a href="#step-2">
                            <p class="list-group-item-text"></p>
                    </a></li>
                </ul>
            </div>
        </div>



<!--Book AS Registered Customer-->

<div class="row setup-content" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12 well">
            <h1 class="text-center"> Booking as a Registered User </h1>
            <div class="container wrapper" style="width: 100%;">
                <div class="row cart-head">
                    <div class="container">
                        <div class="row">
                            <p></p>
                        </div>
                        
                        <div class="row">
                            <p>
                                <button id="activate-step-2" class="btn btn-primary btn-lg" onclick="window.location.href='checkoutGuest.php'"> Book as a Guest </button>                                                                            
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
                                            Review Order <div><small style="padding-left: 314px; color: #FFE4B5;">Unit Price</small> <small style="padding-left: 20px; color: #FFFFE0;">Sub Total</small></div>
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

                                                    <div class="subtotal" name="unit_price" style="margin-right: 50px;">
                                                        <h6 style="color: #8B795E;"> ৳  <?php echo $values["item_price"]; ?></h6>
                                                    </div>

                                                    <div class="col-sm-3 col-xs-3 text-right" name="subtotal">
                                                        <h6 style="color: #8B8B7A;"> ৳ <?php echo number_format($subtotal,2); ?></h6>
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

                                    </div>
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
                
                <p>
                    <button id="activate-step-2" class="btn btn-primary btn-lg" onclick="window.location.href='checkoutGuest.php'"> Book as a Guest </button>                                                                            
                </p>

        </div>
    </div>
</div>



        <!-- recommendation -->
            <?php include_once 'template/recommendation.php' ?>
        <!-- //recommendation -->
    </div>
</div>
<?php } ?>
<!--//products-->  

    <!-- footer -->
        <?php include_once 'template/footer.php' ?>
    <!-- //footer --> 
</body>
</html> 