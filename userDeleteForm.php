
<?php

  ob_start();
  include("dbCon.php");
  $con = connect();
  if(isset($_GET['user-id'])!="")
  {
  $delete=$_GET['user-id'];
  $delete=$con->query("DELETE FROM users WHERE user_id='$delete'");
  if($delete)
  {
      header("Location:userList.php");
  }
  else
  {
      echo mysqli_error();
  }
  }
  ob_end_flush();

?>