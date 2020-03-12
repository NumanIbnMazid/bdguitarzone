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
        //brand edit
        $brand_id =  $_GET['brand-id'];
        include_once 'dbCon.php';
        $con = connect();

        $sql = "SELECT * FROM `brand` WHERE brand_id=$brand_id";

        $result = $con->query($sql);
        foreach($result as $brand){
            $brand_name 		     = $brand['brand_name'];
            $brand_description       = $brand['brand_description'];
        }
        ?>
        <div class="col-md-5">
            <li style="padding-bottom: 20px;">Modify Brand</li>
            <form action="" method="POST"  enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to Submit?')">
                <div class="form-group">
                    <label for="brandName">Brand Name:</label>
                    <input type="text" class="form-control" name="brand_name" id="brand_name" value="<?php echo $brand_name?>"/>
                </div>
                <div class="form-group">
                    <label for="brandDescription">Brand Description:</label>
                    <input type="text" class="form-control" name="brand_description" id="brand_description" value="<?php echo $brand_description?>"/>
                </div>
                <button type="submit" class="btn btn-info">Update</button>
            </form>
            <?php

            if($_POST){
                $brand_name         = $_POST['brand_name'];
                $brand_description  = $_POST['brand_description'];
                $sql = "UPDATE brand SET brand_name='$brand_name', brand_description='$brand_description'
				WHERE brand_id=$brand_id";
                echo("<script>location.href = 'brandList.php'</script>");  
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