<?php
    define('BASE_URL','http://localhost/bdguitarzone');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
  <title>BDguitarZone- Leading company in Banglaesh | Home :: BDguiutarZone</title>
  <!-- Bootstrap core CSS-->
  <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      
      <div class="card-body">
        <form method="post" action="loginChecker.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email..." required=" ">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="password" id="exampleInputPassword1" type="password" placeholder="Enter Password..." required=" ">
          </div>

          <div class="form-group" >
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <button type="submit" onclick="return validate_empty();" class="btn btn-primary btn-submit-fix" 
                          style= "margin: auto;
          width: 60%;
          border: 1.5px solid #757575;
          padding: 10px;"> Login </button>
                      </div>
                  </div>

          <div class="col-md-4" id="msg">
            <?php 
              // Passing error message using session 
              if(isset($_SESSION['errorMsg'])){
                echo '<span class="text-danger">'.$_SESSION['errorMsg'].'</span>';
                unset($_SESSION['errorMsg']);
              }
          
              // Passing error message using get request
              if(isset($_GET['errorMsg'])){
                echo $_GET['errorMsg'];
              }
              $a =1;
            ?>
          </div>
        </form>
			<div class="already" style="padding-top: 18px;"> 
				<h6>Not a member?<p> <a href="signup.php" style="text-decoration: none;">Signup Now »</a> </p></h6> 
			</div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Sending Message -->
  <script>
    var a=1;
    var msg;
    //alert(a);
    var msgDiv = document.getElementById('msg');
    
    function validate_empty(){
      a = document.getElementById('email').value;
      if(a==""){ 
        msg = '<span class="text-danger"> Please type your email</span>';
        msgDiv.innerHTML = msg;
        return false;
      }
      else {
        msg = '<span class="text-success">Thank You For Being With Us</span>';
        msgDiv.innerHTML = msg;
        //alert(msg);
        return true;
      }
      return false;
    }
  </script>
</body>

</html>