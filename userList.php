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

	$sql = "SELECT * FROM `users` ORDER BY user_id DESC";
	
	$result = $con->query($sql);
	
?>
<div class="products">
    <div class="container">
        <li style="padding-bottom: 20px;">User List</li>
        <table border="1">
        <tr>
            <th>User ID</th>
            <th>User Role</th>
            <th>User Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>Mobile No.</th>
            <th>More</th>
            <th>Email</th>


        </tr>
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
                    <td><?php echo $r['address'];?></td>
                    <td><?php echo $r['post_cd'];?></td>
                    <td><?php echo $r['mobile'];?></td>
                    <td><?php echo $r['more'];?></td>
                    <td><?php echo $r['email'];?></td>

                    <td><i class="fa fa-cog" aria-hidden="true"></i><a href="userEditForm.php?user-id=<?=$r['user_id']?>"> Edit </a></td>
                    <!-- <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="userDeleteForm.php?user-id=<?=$r['user_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td> -->
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
