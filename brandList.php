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

    $sql = "SELECT * FROM `brand` ORDER BY brand_id DESC";

    $result = $con->query($sql);

    ?>
    <div class="products">
        <div class="container">
            <li style="padding-bottom: 20px;">Brand List</li>
            <table border="1">
                <tr>
                    <th>Brand Id</th>
                    <th>Brand Name</th>
                    <th>Brand Image</th>
                    <th>Brand Description</th>
                </tr>
                <?php
                foreach($result as $r) {
                    ?>
                    <tr>
                        <td><?=$r['brand_id']?></td>
                        <td><?=$r['brand_name']?></td>
                        <td><img src="images/brand/<?=$r['brand_image']?>" width="150px" height="150px" alt="<?=$r['brand_name']?>"></td>
                        <td><?=$r['brand_description']?></td>

                        <td><i class="fa fa-cog" aria-hidden="true"></i><a href="brandEditForm.php?brand-id=<?=$r['brand_id']?>"> Edit </a></td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="brandDeleteForm.php?brand-id=<?=$r['brand_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
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
