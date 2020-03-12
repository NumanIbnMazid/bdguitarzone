
<?php

  ob_start();
  include("dbCon.php");
  $con = connect();
  if(isset($_GET['product-id'])!="")
  {
  $delete=$_GET['product-id'];
  $delete=$con->query("DELETE FROM product WHERE product_id='$delete'");
  if($delete)
  {
      header("Location:productList.php");
  }
  else
  {
      echo mysqli_error();
  }
  }
  ob_end_flush();

?>




