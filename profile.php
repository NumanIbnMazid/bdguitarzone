
<!DOCTYPE html>
<html lang="en">
<!--head-area-->
<?php include_once 'template/head.php' ?>
<!--//head-area-->
<body>

    <!--header-area-->
      <?php include_once 'template/header.php' ?>
    <!--//header-area-->


<!-- page Content -->
<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){ ?>
            <?php
            $user_id =  $_GET['user-id'];
                include_once 'dbCon.php';
                $con = connect();

                $sql = "SELECT * FROM `users` WHERE user_id=$user_id";
    
    $result = $con->query($sql);
    
?>
<div class="products">
    <div class="container">
        <?php
            foreach($result as $r) {
            ?>
        <article>

        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">First Name : </h4> <h4 style="display: inline; padding-left: 138px; color: #035FBF;"><?=$r['name']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">Last Name : </h4> <h4 style="display: inline; padding-left: 140px; color: #035FBF;"><?=$r['lName']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">Gender : </h4> <h4 style="display: inline; padding-left: 166px; color: #035FBF;"><?=$r['gender']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">Age : </h4> <h4 style="display: inline; padding-left: 188px; color: #035FBF;"><?=$r['age']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">Address : </h4> <h4 style="display: inline; padding-left: 159px; color: #035FBF;"><?=$r['address']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">Postal Code : </h4> <h4 style="display: inline; padding-left: 130px; color: #035FBF;"><?=$r['post_cd']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">Mobile No. : </h4> <h4 style="display: inline; padding-left: 140px; color: #035FBF;"><?=$r['mobile']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">More About You : </h4> <h4 style="display: inline; padding-left: 104px; color: #035FBF;"><?=$r['more']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        <div style="padding-bottom: 15px">
          <h4 style="display: inline; color: #5E809F;">Email ID : </h4> <h4 style="display: inline; padding-left: 160px; color: #035FBF;"><?=$r['email']?> <a href="profileEdit.php?user-id=<?=$r['user_id']?>" style="padding-left: 50px;"><h5 style="display: inline;color: green;">Edit</h5></a>
          </h4> <br>
        </div>
        
        </article> 
        <?php } ?>
    </div>
</div>
<?php } ?>

<!-- footer -->
<?php include_once 'template/footer.php' ?>
<!-- //footer -->
</body>
</html>
