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

    $sql = "SELECT * FROM `category` ORDER BY cat_id DESC";

    $result = $con->query($sql);

    ?>
    <div class="products">
        <div class="container">
            <li style="padding-bottom: 20px;">Category List</li>
            <table border="1">
                <tr>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                </tr>
                <?php
                foreach($result as $r) {
                    ?>
                    <tr>
                        <style type="text/css">

                        </style>
                        <td><?=$r['cat_id']?></td>
                        <td><?=$r['cat_name']?></td>
                        <td><img src="images/category/<?=$r['cat_image']?>" width="150px" height="150px" alt="<?=$r['cat_name']?>"></td>
                        
                        <td><i class="fa fa-cog" aria-hidden="true"></i><a href="categoryEditForm.php?category-id=<?=$r['cat_id']?>"> Edit </a></td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="categoryDeleteForm.php?category-id=<?=$r['cat_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
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
