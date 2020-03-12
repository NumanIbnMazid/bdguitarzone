	<div class="banner">
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">  
                <div class="item active"><!-- First-Slide -->
                    <img src="images/background/282121.png" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">

                        <?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
                        <h4 data-animation="animated flipInX">Click Below to View</h4>
                        <h4 data-animation="animated flipInX"><a href="https://www.youtube.com/watch?v=2iUzGS2DTS0">Administrative Work Manual</a></h4>
                        <?php } ?>

                        
                        <h4 data-animation="animated flipInX">Click Below to View</h4>
                        <h4 data-animation="animated flipInX"><a href="https://www.youtube.com/watch?v=S49MXZUgopw">User Manual</a></h4>
                        

                    </div>
                </div>  
                <div class="item"> <!-- Second-Slide -->
                    <img src="images/background/196263.png" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">

                        <?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
                        <h4 data-animation="animated fadeInUp">Click Below to View</h4>
                        <h4 data-animation="animated fadeInDown"><a href="https://www.youtube.com/watch?v=2iUzGS2DTS0">Administrative Work Manual</a></h4>
                        <?php } ?>
                        
                        
                        <h4 data-animation="animated fadeInUp">Click Below to View</h4>
                        <h4 data-animation="animated fadeInDown"><a href="https://www.youtube.com/watch?v=S49MXZUgopw">User Manual</a></h4>
                        

                    </div>
                </div> 
                <div class="item"><!-- Third-Slide -->
                    <img src="images/background/467578.png" alt="" class="img-responsive"/>
                    <div class="carousel-caption kb_caption kb_caption_center">

                        <?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
                        <h4 data-animation="animated flipInX">Click Below to View</h4>
                        <h4 data-animation="animated fadeInLeft"><a href="https://www.youtube.com/watch?v=2iUzGS2DTS0">Administrative Work Manual</a></h4>
                        <?php } ?>

                        
                        <h4 data-animation="animated flipInX">Click Below to View</h4>
                        <h4 data-animation="animated fadeInLeft"><a href="https://www.youtube.com/watch?v=S49MXZUgopw">User Manual</a></h4>
                        

                    </div>
                </div> 
            </div> 
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a> 
            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> 
        </div>
		<script src="js/custom.js"></script>
	</div>