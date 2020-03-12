
<?php

  ob_start();
  include("dbCon.php");
  $con = connect();
  if(isset($_GET['booking-id'])!="")
  {
  $delete=$_GET['booking-id'];
  $delete=$con->query("DELETE FROM booking WHERE booking_id='$delete'");
  if($delete)
  {
      header("Location:bookingList.php");
  }
  else
  {
      echo mysqli_error();
  }
  }
  ob_end_flush();

?>