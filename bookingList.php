<!--head-area-->
    <?php include_once 'admin/template/adminHead.php' ?>
<!--//head-area--> 
    
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
    <!--header-area-->
        <?php include_once 'admin/template/adminHeader.php' ?>
    <!--//header-area-->   

<?php

    include_once 'dbCon.php';
    $con = connect();

    $sql = "SELECT * FROM `booking_details` LEFT JOIN booking
    ON booking.booking_id = booking_details.booking_id ORDER BY booking_details_id DESC";
    
    $result = $con->query($sql);
    
?>
<div class="products">
    <div class="container">
        <li style="padding-bottom: 20px;">Booking List</li>
        <table border="1">
        <tr>
            <th>Booking ID</th>
            <th>Booking Details ID</th>
            <th>User ID</th>            

            <th>Shift</th>
            <th>Gift</th>
            <th>Booking Date</th>
            <th>Product ID</th>
            <th>Unit Price</th>
            <th>Order Quantity</th>
            <th>Subtotal</th>
            <th>Order Total</th>
            <th>Date of Purchase</th>
            <th>Booking Status</th>
            
        </tr>
        <?php
            foreach($result as $r) {
                $bookingIDnew = $r['booking_id'];
            ?>
                <tr>
                    <td><?php echo $r['booking_id'];?></td>
                    <td><?=$r['booking_details_id']?></td>
                    <td><?php echo $r['user_id'];?></td>                    

                    <td><?php echo $r['shift'];?></td>
                    <td><?php echo $r['gift'];?></td>
                    <td><?php echo $r['date_of_purchase'];?></td>
                    <td><?=$r['product_id']?></td>
                    <td><?php echo $r['unit_price'];?></td>
                    <td><?php echo $r['order_quantity'];?></td>
                    <td><?php echo $r['subtotal'];?></td> 
                    <td><?php echo $r['order_total'];?></td>                   
                    <td><?php echo $r['timestamp'];?></td>                   
                    <td style="color: blue;"><?php echo $r['booking_status'];?></td>                   
                    
                    <td><i class="fa fa-check-circle" aria-hidden="true"></i><a href="bookingMark.php?booking-id=<?=$r['booking_id']?>"><span class="important"> MARK </span></a></td>
                    <td><i class="fa fa-cog" aria-hidden="true"></i><a href="bookingEditForm.php?booking-id=<?=$r['booking_id']?>"> Edit </a></td>
                    <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="bookingDeleteForm.php?booking-id=<?=$r['booking_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
                   
                </tr>
            <?php } ?>
        </table>
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
