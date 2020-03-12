<style>

			.sidenav {
			    height: 50%;
			    width: 105px;
			    position: fixed;
			    z-index: 1;
			    top: 190px;
			    left: 0;
			    background: transparent;
			    background-color: transparent;
			    overflow-x: hidden;
			    padding-top: 20px;
			}

			.sidenav li a {
			    padding: 6px 8px 6px 16px;
			    text-decoration: none;
			    font-size: 20px;
			    color:#0468CA;
			    display: block;
			}
			.sidenav ul li a {
			    color:#0468CA;
			}

			.sidenav li a:hover {
			    color:green;
			}

			.main {
			    margin-left: 160px; /* Same as the width of the sidenav */
			    font-size: 28px; /* Increased text to enable scrolling */
			    padding: 0px 10px;
			}
			.sidebar-row .nav2 li {
			    margin-top: 0.8em;
			    display: block;
			}
			.nav2 > li > a {
			    width: 100%;
			    display: block;
			    position: relative;
			    color: #fff;
			    font-size: 19px;
			    font-weight: 400;
			    text-decoration: none;
			}
			.nav2 > li > a:hover,.nav2 > li >a.active{
				color: green;
				font-weight: 700;
				text-decoration: wavy blue;
				font-style: italic;
			}
			.nav2 li a.active span {
				-webkit-transform: rotatex(180deg);
				transform: rotatex(180deg);
				-moz-transform: rotatex(180deg);
				-o-transform: rotatex(180deg);
				-ms-transform: rotatex(180deg);
			}
			.nav2 ul li a {
			    line-height: 1.8em;
			    display: block;
			    position: relative;
			    font-size: 1em;
			    color: #999;
			    text-decoration: none;
				font-weight: 400;
			    padding-left: 1.5em;
			}
			.nav2 ul li a:hover{
			    color: #ff590f;
			}
			.nav2 span.glyphicon {
			    float: right;
			}

			@media screen and (max-height: 450px) {
			    .sidenav {padding-top: 15px;}
			    .sidenav a {font-size: 18px;}
			}
		</style>	
		<div class="sidenav">
			<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>

				  <ul class="nav2">
						<li class="item1"><a href="#"> ADD <span class="glyphicon glyphicon-menu-down"></span></a>
							<ul>
								<li><a href="addCategory.php">Add Category</a></li> 
								<li><a href="addBrand.php">Add Brand</a></li> 
								<li><a href="addProduct.php">Add Product</a></li>
							</ul>
						</li>
						<li class="item2"><a href="#"> VIEW <span class="glyphicon glyphicon-menu-down"></span></a>
							<ul>
								<li><a href="bookingList.php">Booking List</a></li>
								<li><a href="productList.php">Product List</a></li>
		                        <li><a href="categoryList.php">Category List</a></li>
		                        <li><a href="brandList.php">Brand List</a></li>
		                        <li><a href="userList.php">User List</a></li>
							</ul>
						</li>
						<div style="margin-left: 20px; margin-top: 40px;">
							<ul>
								<i class="fa fa-fw fa-dashboard"></i>
								<a href="adminIndex.php" class="dropdown-toggle"><h4 style="color: green;" onMouseOver="this.style.color='blue'"
   											onMouseOut="this.style.color='#DA70D6'" > Switch to Pannel </h4></a>
							</ul>
						</div>
					</ul>
					<!-- script for tabs -->
			<?php } ?>


			<script type="text/javascript">
				$(function() {
				
					var menu_ul = $('.nav2 > li > ul'),
						   menu_a  = $('.nav2 > li > a');
					
					menu_ul.hide();
				
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});
				
				});
			</script>
		</div>