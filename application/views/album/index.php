<?php $this->load->view('inc/admin_header'); ?>
	<body>
		<section id="side-bar" class="pull-left">
			<span class="side-bar-toggle" data-toggle="1"> <span class="glyphicon glyphicon-th-list"></span> </span>
			<div id="user-info" ng-controller = "UserController">
				<img alt="Profile Picture" src="<?php echo base_url(); ?>_lib/usman_tahir.png" class="img-circle profile-picture">
				<h2 class="profile-heading">Usman Tahir</h2>
				<button class="btn btn-primary">View Public Profile</button>
			</div>

			<nav id="main-nav">
				<ul>
					<li><span class="glyphicon glyphicon-home" ></span><a href="#"> Home</a></li>
					<li class="active"><span class="glyphicon glyphicon-picture" ></span><a href="#"> Portfolio</a></li>
					
					<div>
						<ul class="gallery-menu">
							<li class="galleries" ng-repeat="item in navList">
								<a href="{{item.link}}"> Album</a>
							</li>
						</ul>
					</div>
					<li><span class="glyphicon glyphicon-cog" ></span><a href="#"> Settings</a></li>
					<ul>
						<li class="galleries">
							<a href="canvas/">Canvas</a>
						</li>
					</ul>
				</ul>
			</nav>
		</section>
		<section id="main-container">
			<section id="titlebar" class="row">
				
				<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </a>
			    
				<div class="col-md-4">
					<div class="input-group">
					    <input type="text" class="form-control" placeholder="Search">
					    <span class="input-group-btn">
					    	<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
					    </span>
				    </div><!-- /input-group -->
			    </div> <!-- Search Bar Div end -->
				<div class="pull-left">
				  	<button class="btn btn-default" data-toggle="modal" data-target="#searchFilter">Filter Search</button>
					<div class="modal fade" id="searchFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h3>Apply Search Filters</h3>
								</div>
								<div class="modal-body">
									<div class="searchFilters">
										<label for="gendre">Gendre</label>
										<select name="gendre" id="gendreDropDown">
											<option value="male">Male</option>
						  					<option value="female">Female</option>
						  					<option value="Other">Other</option>
										</select>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-primary">Search with Filters</button>
									<button class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

					<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-inbox"></span> Messages</button>
				</div>
				<div class="pull-right" ng-controller = "UserController">
					<span class="logout-msg">Hello <em><strong>Usman Tahir</strong></em></span>
                    <a href="<?php echo site_url("auth/logout"); ?>" class="btn btn-danger">Sign Out</a>
				</div>
				<div class="clearfix"></div>
			</section>
			<div id="data-container">
				<a class="btn btn-primary" href="<?php echo site_url('feed/edit/' . $feed_id); ?>">Add albums to portfolio</a>
                <a class="btn btn-primary" href="<?php echo site_url("album/create"); ?>">Create new album</a>
				<div class="gallery">
                    <?php if (isset($albums)): ?>
                    <?php foreach ($albums as $album): ?>
                    <a href=""><img src="<?php echo base_url(); ?>images/albums/album-icon.png" alt="Album Image" class="album-folder"></a>
                    <?php   
                        endforeach;
                        endif; 
                    ?>

<!--
					<a href="<?php echo base_url(); ?>_lib/wall(1).jpg" ng-repeat="item in galleryImages" rel="image_group" title="">
						<div class="croped">
						     <img alt="Image Thumbnail" src="<?php echo base_url(); ?>_lib/wall(1).jpg" class="thumb" />
						</div>
					</a>
-->
				</div>
				
			</div>
		</section>

		<div class="clearfix"></div>

		<!-- All JS Files -->
		<script src="<?php echo base_url(); ?>_lib/jquery-1.11.0.min.js"></script>
		<script src="<?php echo base_url(); ?>_lib/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/navigationScript.js"></script>

		<!-- FancyBox Files -->
		<script type="text/javascript" src="<?php echo base_url(); ?>_lib/fancyBox/jquery.mousewheel-3.0.6.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>_lib/fancyBox/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>_lib/jquery.easing.1.3.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>_lib/fancyBox/jquery.fancybox.css" media="screen" />
	</body>