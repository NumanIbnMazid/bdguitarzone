<!--head-area-->
    <?php include_once 'admin/template/adminHead.php' ?>
<!--//head-area--> 
    
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
    <!--header-area-->
        <?php include_once 'admin/template/adminHeader.php' ?>
    <!--//header-area-->   


<!-- page Content -->
			<?php
			//Users edit
			$user_id =  $_GET['user-id'];
				include_once 'dbCon.php';
				$con = connect();

				$sql = "SELECT * FROM `users` WHERE user_id=$user_id";
				
				$result = $con->query($sql);
				foreach($result as $users){
					
					$lName	    = $users['lName'];
                    $name	    = $users['name'];
					$gender     = $users['gender'];
					$age 		= $users['age'];
					$address	= $users['address'];
					$post_cd 	= $users['post_cd'];
                    $mobile	    = $users['mobile'];
					$more 		= $users['more'];
					$email 		= $users['email'];
                    $password	= $users['password'];
				}
				?>
    <!-- sign up-page -->
        <div class="login-page">
            <div class="container">
                <h3 class="w3ls-title w3ls-title1">Update <?php echo $name?>'s account</h3>
                <div class="row cart-body">
                    <form class="form-horizontal" method="post" action="" onsubmit="return confirm('Are you sure you want to submit?')">
                                                      
                    <div class="form-horizontal">
                        <!--PERSONAL INFORMATION-->
                        <div class="panel panel-info" style="width: 500px;">              
                            <div class="panel-body">
                                <div class="form-group">
                                </div>
                                <!-- Name --> 
                                    <div class="form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>First Name: <span style="color: green; font-size: 20px;">*</span></strong>
                                            <input type="text" name="name" id="name" placeholder="First Name..." class="form-control" value="<?php echo $name?>" required=" " />
                                        </div>

                                        <div class="span1"></div>

                                        <div class="col-md-6 col-xs-12">
                                            <strong>Last Name: <span style="color: green; font-size: 20px;">*</span></strong>
                                            <input type="text" name="lName" id="lName" placeholder="Last Name..." class="form-control" value="<?php echo $lName?>" required=" " />
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
                                            <input type="text" name="age" id="age" placeholder="Age..."onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" value="<?php echo $age?>" required=" "  class="form-control" />
                                        </div>
                                    </div>
                                <!-- address -->
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Address: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="address" id="address" placeholder="Address..." required=" " class="form-control" value="<?php echo $address?>" />
                                        </div>
                                    </div>
                                <!-- Postal Code -->
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Postal Code: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                        <div class="col-md-12">
                                            <input type="number" name="post_cd" id="post_cd" placeholder="Postal Code..." onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" value="<?php echo $post_cd?>" required=" " class="form-control" value="" />
                                        </div>
                                    </div>
                                <!-- mobile -->
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Mobile Number: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                        <div class="col-md-12">
                                            <input type="tel" id="mobile" name="mobile" size="20" minlength="11" maxlength="11" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="ex: 01685238317" required="" class="form-control" value="<?php echo $mobile?>" />
                                        </div>
                                    </div>
                                <!-- more about you -->
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>More About You:</strong></div>
                                        <div class="col-md-12"><input type="text" name="more" id="more" placeholder="More About You..." class="form-control" value="<?php echo $more?>" /></div>
                                    </div>                                                             
                                </div>
                            </div>
                        <!--PERSONAL INFORMATION END-->

                        <!--LOGIN INFORMATION-->
                            <div class="panel panel-info" style="background-color: rgb(163, 212, 255);">
                                <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Provide Login Information </div>
                                <div class="panel-body">                                           
                                <!-- email -->
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Email Address: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                        <div class="col-md-12"><input type="email" name="email" id="email" placeholder="ex: numan@gmail.com"" autofocus required pattern="[^ @]*@[^ @]*" required="" class="form-control" value="<?php echo $email?>" /></div>
                                    </div>                                           
                                <!-- password -->    
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Password: <span style="color: green; font-size: 20px;">*</span></strong></div>
                                        <div class="col-md-12"><input type="password" name="password" id="password" placeholder="Please enter your password..." required=" " class="form-control" value="<?php echo $password?>" /></div>
                                    </div>           

                                    <div class="form-group" >
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-submit-fix" 
                                            style= "margin: auto;
                                                    width: 60%;
                                                    border: 1.5px solid #757575;
                                                    padding: 10px;">Update</button>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                            
                        <!--LOGIN INFORMATION END-->
                        </div>                                        
                    </form>
                    <?php
                    if($_POST){
                        
                        $lName	    = $_POST['lName'];
                        $name	    = $_POST['name'];
                        $gender     = $_POST['gender'];
                        $age 		= $_POST['age'];
                        $address	= $_POST['address'];
                        $post_cd 	= $_POST['post_cd'];
                        $mobile	    = $_POST['mobile'];
                        $more 		= $_POST['more'];
                        $email 		= $_POST['email'];
                        $password   = $_POST['password'];

                        $sql = "UPDATE users SET lName='$lName',name='$name',gender='$gender',age='$age',address='$address',post_cd='$post_cd',mobile='$mobile',more='$more',email='$email',password='$password'
				WHERE user_id=$user_id";
                echo("<script>location.href = 'userList.php?user-id=$user_id;'</script>");  
                        //echo $sql;exit;
                        include_once 'dbCon.php';
                        $con = connect();
                        if ($con->query($sql) === TRUE) {
                            echo "New record Updated successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $con->error;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <!-- /.container -->
    <!--footer-area-->
        <?php include_once 'admin/template/adminFooter.php' ?>
    <!--//footer-area-->

<?php }else {?>
    <?php 
    session_start();
    session_destroy();  
    echo  '<script>alert("Something went wrong, Please try again later."); window.location.href = "http://localhost/bdguitarzone/index.php";</script>'; ?>
<?php } ?>
