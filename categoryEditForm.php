<!--head-area-->
    <?php include_once 'admin/template/adminHead.php' ?>
<!--//head-area--> 
    
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
    <!--header-area-->
        <?php include_once 'admin/template/adminHeader.php' ?>
    <!--//header-area-->   

<!-- Page Content -->
<div class="container" style="padding-top: 40px;">
    <?php

    if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){
    ?>
    <div class="row">
        <?php
        //category edit
        $cat_id =  $_GET['category-id'];
        include_once 'dbCon.php';
        $con = connect();

        $sql = "SELECT * FROM `category` WHERE cat_id=$cat_id";

        $result = $con->query($sql);
        foreach($result as $category){
            $cat_name 		= $category['cat_name'];
        }
        ?>
        <div class="col-md-5">
            <li style="padding-bottom: 20px;">Modify Category</li>
            <form action="" method="POST"  enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to Submit?')">
                <div class="form-group">
                    <label for="categoryName">Category Name:</label>
                    <input type="text" class="form-control" name="cat_name" id="cat_name" value="<?php echo $cat_name?>"/>
                </div>
                <button type="submit" class="btn btn-info">Update</button>
            </form>
            <?php

            if($_POST){
                $cat_name = $_POST['cat_name'];
                $sql = "UPDATE category SET cat_name='$cat_name'
				WHERE cat_id=$cat_id";
                echo("<script>location.href = 'categoryList.php'</script>");  
                //echo $sql;exit;
                include_once 'dbCon.php';
                $con = connect();
                if ($con->query($sql) === TRUE) {
                    echo "New record Updated successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
            }

            ?>
            <!--Message-----------------------------------------------------------------------------------------------------------Message-->
            <div class="col-md-4" style="margin: 0px; left:-20px; width: 461px; height: 80px; color:#3399cc; font-weight: 700; ">
                <?php if(isset($msg)) {echo $msg; unset($msg); }?>
            </div>
            <!--Message-----------------------------------------------------------------------------------------------------------Message-->

        </div>
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