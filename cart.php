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


<!-- Shopping Cart -->


<!--REVIEW ORDER-->
	<div class="container wrapper">
        <div class="row cart-head">
            <div class="container">
                
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                    </div>
                </div>
              
            </div>
        </div>    
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
                                    <span> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                     <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger">Remove</span></a></td> 
                                    </span>
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
                                <h6><p style="color: #551A8B;"><span style="color: #A020F0; margin-right: 50px;">[Unit Price] :</span>  ৳  <?php echo $values["item_price"]; ?></p></h6>
                            </div>

                            <div class="" name="subtotal">
                                <h6><p style="color: #8B4789;"><span style="color: #DA70D6; margin-right: 50px;">[Subtotal] :</span>  ৳ <?php echo number_format($subtotal,2); ?></p></h6>
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
                            <strong style="padding-left: 580px;">Grand Total : </strong>
                            <div class="pull-right" style="padding-right: 310px;">
                                <span name="grand_total" class="grand_total" style="color: #698B22;">
                                 ৳ <?php echo number_format($total,2); ?>
                                 </span>
                             </div>
                        </div>
                    </div>

                    <div class="row checkout">

                        <?php if(!empty($_SESSION["shopping_cart"])) { ?> 
                            <i class="fa fa-check-circle" aria-hidden="true"></i><a href="checkoutAs.php" style="padding-right: 14px;font-size: 15px; color:#008B00;"> Checkout </a>
                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i><a href="index.php?action=deleteAll&id=<?php echo $values["item_id"]; ?>" style="padding-right: 14px;font-size: 15px;" onclick="return confirm('Are you sure you want to Delete?')"> REMOVE ALL </a>
                        <?php } ?>
                            
                            <i class="fa fa-square" aria-hidden="true"></i><a href="products.php" style="padding-right: 14px;font-size: 15px;color: #104E8B;"> Continue Shopping </a>

                    </div>
                </div>
                <?php } ?>  
            </div>
        <!--REVIEW ORDER END-->
    </div>

    <!--REVIEW ORDER END-->

		<!-- recommendation -->
			<?php include_once 'template/recommendation.php' ?>
		<!-- //recommendation -->
		<!-- footer -->
			<?php include_once 'template/footer.php' ?>			
		<!-- //footer --> 
	</body>
</html>	