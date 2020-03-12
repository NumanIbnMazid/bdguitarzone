
<?php

  ob_start();
  include("dbCon.php");
  $con = connect();

  if(isset($_GET['category-id'])!="")
  {
  $delete=$_GET['category-id'];
  $delete=$con->query("DELETE FROM category WHERE cat_id='$delete'");
  if($delete)
  {
      header("Location:categoryList.php");
  }
  else
  {
      echo mysqli_error();
  }
  }
  ob_end_flush();

?>