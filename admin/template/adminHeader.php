
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="adminIndex.php"> Admin Pannel</a>

    <!-- DATE TIME SYSTEM -->
      <div id="clockbox" style="font:10pt Arial; color:#EBB000;"></div>
    <!-- //DATE TIME SYSTEM -->

    <h4 style="margin-left: 70px;"> <a href="adminIndex.php" style="color: #cccccc; text-decoration: none; font-weight: 700;"> BDguitarZone </a></h4>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="adminIndex.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"> ADD New </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="addProduct.php"> Add Product</a>
            </li>
            <li>
              <a href="addBrand.php"> Add Brand</a>
            </li>
            <li>
              <a href="addCategory.php"> Add Category</a>
            </li>

          </ul>
        </li>

		    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text"> View & Modify </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="bookingList.php"> Booking List</a>
            </li>
            <li>
              <a href="userList.php"> User List</a>
            </li>
            <li>
              <a href="productList.php"> Product List</a>
            </li>
            <li>
              <a href="brandList.php"> Brand List</a>
            </li>
            <li>
              <a href="categoryList.php"> Category List</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="https://www.youtube.com/watch?v=2iUzGS2DTS0">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text"> Administritive Manual </span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> View Site</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">


        <li class="nav-item">

        	<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          	<i class="fa fa-user" aria-hidden="true"></i> <?=$_SESSION['name']?>
			<span class="caret"></span>
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
			<?php }else {?>
				<a href="login.php" style="color:#8a2be2; font-size: 15px;">Log In</a>
			<?php } ?>

        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="adminIndex.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Admin Dashboard</li>
      </ol>


<script type="text/javascript">
  tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
  tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

  function GetClock(){
  var d=new Date();
  var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
  var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

  if(nhour==0){ap=" AM";nhour=12;}
  else if(nhour<12){ap=" AM";}
  else if(nhour==12){ap=" PM";}
  else if(nhour>12){ap=" PM";nhour-=12;}

  if(nmin<=9) nmin="0"+nmin;
  if(nsec<=9) nsec="0"+nsec;

  document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" || "+nhour+":"+nmin+":"+nsec+ap+"";
  }

  window.onload=function(){
  GetClock();
  setInterval(GetClock,1000);

  }
</script>