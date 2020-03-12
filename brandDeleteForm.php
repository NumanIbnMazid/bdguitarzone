
<?php

  ob_start();
  include("dbCon.php");
  $con = connect();

  if(isset($_GET['brand-id'])!="")
  {
  $delete=$_GET['brand-id'];
  $delete=$con->query("DELETE FROM brand WHERE brand_id='$delete'");
  if($delete)
  {
      header("Location:brandList.php");
  }
  else
  {
      echo mysqli_error();
  }
  }
  ob_end_flush();

?>