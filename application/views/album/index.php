<?php $this->load->view('inc/admin_header'); ?>
	<body>
		<section id="side-bar" class="pull-left">
			<span class="side-bar-toggle" data-toggle="1"> <span class="glyphicon glyphicon-th-list"></span> </span>
			<div id="user-info" ng-controller = "UserController">
                <?php if($profile_picture!='') {
                ?>
				    <img alt="Profile Picture" src="<?php echo $profile_picture ?>" class="img-circle profile-picture" height="200" width="200"><br/><br/>
                    <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#pictureModal"><span class="glyphicon glyphicon-circle-arrow-up"></span>  Change Profile Picture </a>
                <?php
                }
                else{
                ?>
                <img alt="Profile Picture" src="<?php echo base_url(); ?>images/default_picture.jpg" class="img-circle profile-picture" height="200" width="200"><br/><br/>
                <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#pictureModal"><span class="glyphicon glyphicon-circle-arrow-up"></span>  Upload Profile Picture </a>
                       
                
                <?php
                }
                ?>
                
                <h2 class="profile-heading"><?php echo $first_name." ".$last_name; ?></h2>
				<button class="btn btn-primary">View Public Profile</button>
			</div>

			<nav id="main-nav">
				<ul>
					<li><span class="glyphicon glyphicon-home" ></span><a href="#"> Home</a></li>
					<li class="active-admin"><span class="glyphicon glyphicon-picture" ></span><a href="#"> Portfolio</a></li>
                    <?php if (isset($albums)): ?>
                    <?php foreach ($albums as $album): ?>
					<div>
						<ul class="gallery-menu">
							<li class="galleries">
                                <a href="<?php echo site_url("album/images/" . $album['id']); ?>"> <span class="badge"><?php echo $album['total_images']; ?></span> <?php echo $album['name']; ?></a>
							</li>
						</ul>
					</div>
                    <?php
                        endforeach;
                        endif; 
                    ?>
					<li><span class="glyphicon glyphicon-cog" ></span><a href="#"> Settings</a></li>
					<ul>
						<li class="galleries">
							<a href="canvas/">Canvas</a>
						</li>
                        <li class="galleries">
                            <a href="<?php echo base_url(); ?>theme/user_info">User Details</a>
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
                    <a class="btn btn-success" href="#" data-toggle="modal"  data-target="#basicModal"><span class="glyphicon glyphicon-inbox"></span>  Chat with Friends </a>
				</div>
				<div class="pull-right" ng-controller = "UserController">
					<span class="logout-msg">Hello <em><strong><?php echo $username; ?></strong></em></span>
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
                    <div class="album-folder-container">
                        
                        <a href="<?php echo site_url("album/images/" . $album['id']); ?>"><img src="<?php echo base_url(); ?>images/albums/album-icon.png" alt="Album Image" class="album-folder"></a>        
                        <span class="album-name"><?php echo $album['name']; ?>
                            <span class="images-count badge"><?php echo $album['total_images']; ?></span>
                        </span>
                        
                        <div class="dropdown">
                            <button class="btn btn-default btndropdown-toggle album-options-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url("album/edit/" . $album['id']); ?>"><i class="glyphicon glyphicon-pencil"></i> Rename</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url("album/images/" . $album['id']); ?>"><i class="glyphicon glyphicon-th-large"></i> Images</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url("album/configure/" . $album['id']); ?>"><i class="glyphicon glyphicon-cog"></i> Configure</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a class="delete-album" role="menuitem" tabindex="-1" href="#album-modal" data-toggle="modal" rel="<?php echo site_url("album/remove/" . $album['id']); ?>"> <i class="glyphicon glyphicon-trash"></i> Delete <span class="label label-danger pull-right">!</span></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <?php   
                        endforeach;
                        endif; 
                    ?>
                    <?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</section>


        <!-- profile picture modal -->
        <div class="modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Album</h4>
                    </div>
                    <div class="modal-body">
                        <p><strong>Upload Profile Picture</strong></p>
                        <?php echo form_open_multipart('profile/change_picture');?>
                            <input type="file" name="userfile" size="20" />
                            <br /><br />
                            <input type="submit" class="btn btn-success" value="upload" />
                            </form>
                    </div>
                    
                </div>
            </div>
        </div>




        <!-- Delete Modal -->
        <div class="modal fade" id="album-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Album</h4>
                    </div>
                    <div class="modal-body">
                        <p><strong>Are you sure you want to delete this album?</strong></p>
                        <p>This will permanently delete all photos in this album.</p>
                    </div>
                    <div class="modal-footer">
                        <a id="album-modal-delete-btn" href="#" class="btn btn-danger">Delete</a>
                        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!--  Chat modal  -->
        <input type="hidden" value="<?php echo $username ?>" id="user_name">
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
                        <h3 class="modal-title" id="myModalLabel">Friend List</h3>
                    </div>
                    <div class="modal-body">
                        <div class="list-group">
                          <?php foreach ($friends as $friend) {
                           ?>
                          <a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $friend->friend_name; ?>','<?php echo $username; ?>');" class="list-group-item"><?php echo $friend->friend_name; ?></a>
                          <?php
                          }
                          ?>
                        </div>
                        <h4>Add new Friend </h4>
                        <hr>
                        <form method="post" action="<?php echo site_url("friends/add"); ?>">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="friend_name" id='friend_name'><br/>
                                    <input type="submit" class="btn btn-success" value="Add">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p>Just click on friend name and start enjoying Awesome chatting</p>
                    </div>
                </div>
            </div>
        </div>

		<div class="clearfix"></div>
        
		<!-- All JS Files -->
		<script src="<?php echo base_url(); ?>_lib/jquery-1.11.0.min.js"></script>
		<script src="<?php echo base_url(); ?>_lib/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/navigationScript.js"></script>
        
        <script type="text/javascript">
            var deleteUrl;
            jQuery(document).ready(function() {
                jQuery('.delete-album').click(function() {
                    deleteUrl = jQuery(this).attr('rel');
                });
                jQuery('#album-modal').on('shown.bs.modal', function (e) {
                    jQuery('#album-modal-delete-btn').attr('href', deleteUrl);
                jQuery('#pictureModal').on('shown.bs.modal', function (e) {
                    jQuery('#picture-modal-btn').attr('href', deleteUrl);
                })
            });
        </script>
        <script>
            jQuery('#myModal').modal('show');
            var user=document.getElementById('user_name');
            jQuery.ajax("http://portobuild.dev/php/chat/chat.php?action=setSession&username="+user.value);
            //window.alert(user.value);
        </script>
        
		<!-- FancyBox Files -->
		<script type="text/javascript" src="<?php echo base_url(); ?>_lib/fancyBox/jquery.mousewheel-3.0.6.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>_lib/fancyBox/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>_lib/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/chat.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>_lib/fancyBox/jquery.fancybox.css" media="screen" />
	</body>
</html>
