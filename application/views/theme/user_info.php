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
          <li><span class="glyphicon glyphicon-picture" ></span><a href="#"> Portfolio</a></li>
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
            <li class="galleries active-admin">
                <a  href="<?php echo base_url(); ?>/theme/user_info">User Details</a>
            </li>
            <li class="galleries">
                <a href="<?php echo base_url(); ?>theme/change_theme">Change theme</a>
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
              <input type="text" id="search-box" class="form-control" placeholder="Search username here..">
              <div class="dropdown">
                <a class="dropdown-toggle hidden" id="dropdownMenu1" href="#">Dropdown trigger</a>
                <ul id="dropdown-list" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                  
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">View All results</a></li>
                </ul>
              </div>
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
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <ul class="nav nav-pills" role="tablist">
            <li class="active"><a href="#profile_details" role="tab" data-toggle="tab">Theme Details</a></li>
            <li><a href="#account_details" role="tab" data-toggle="tab">Account Details</a></li>
          </ul>


        </div>
      </div>
      <!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="profile_details">
  <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <h1>Set Up Your Theme Details Here!<small> this is what people will see</small></h1>
          <hr>
        </div>
  </div>
   <div class="row">
          <div class="col-sm-5 col-sm-offset-3">
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Hey!</strong>  it will look nasty if you left any detail blank</div>
          </div>
        </div>
        <?php
         $attributes = array('id' => 'themeInfo-form');
          echo form_open_multipart('theme/save_details',$attributes);


          ?>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              <img class="img-rounded" src="<?php echo $portfolio_details->profile_picture; ?>" height='160' width='150'>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              <?php echo form_label('Upload display picture of your Portfolio <br/><small>*   it can be company logo</small>', 'userfile'); ?>
              <input type="file" name="files[]" size="20"/>

              <br /><br />
              <hr>
            </div>
          </div>
          <br/>
          
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              <h2>Upload Your Best Two Photos <small>photo must 900 X 600 or higher</small></h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              <img class="img-rounded" src="<?php echo $portfolio_details->best_pic_1; ?>" height='160' width='400'>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              <input type="file" name="files[]" size="20" />
              <br /><br />
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              <img class="img-rounded" src="<?php echo $portfolio_details->best_pic_2; ?>" height='160' width='400'>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              <input type="file" name="files[]" size="20" />
              <br /><br />
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Define me', 'define_yourself');
                $att=array('name'=>'define_yourself','id'=>'define_yourself','type'=>'text','class'=>'form-control validate[required,max[100]','placeholder'=>'Define Your Self in 100 characters','rows'=>'2','cols'=>'50','value'=>$portfolio_details->define_yourself);  
                echo form_textarea($att);
                //echo form_input($att);
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('About me', 'about_me');
                $att=array('name'=>'about_me','id'=>'about_me','type'=>'text','class'=>'form-control validate[required,max[200]]','placeholder'=>'Define Your Self in 200 characters','rows'=>'3','cols'=>'50','value'=>$portfolio_details->about_me);  
                echo form_textarea($att);
                //echo form_input($att);
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Profession', 'profession');
                $att=array('name'=>'profession','id'=>'profession','type'=>'text','class'=>'form-control validate[required]','placeholder'=>'Hey! tell me your profession...','value'=>$portfolio_details->profession);  
                echo form_input($att);
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Phone Number', 'phone_number');
                $att=array('name'=>'phone_number','id'=>'phone_number','type'=>'text','class'=>'form-control','placeholder'=>'Enter your number here...','value'=>$portfolio_details->phone_number);  
                echo form_input($att);
            ?>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Adrress 1', 'address1');
                $att=array('name'=>'address1','id'=>'address1','type'=>'text','class'=>'form-control','placeholder'=>'Enter your Permanent address...','rows'=>'2','cols'=>'50','value'=>$portfolio_details->address_1);  
                echo form_textarea($att);
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Adrress 2', 'address2');
                $att=array('name'=>'address2','id'=>'address1','type'=>'text','class'=>'form-control','placeholder'=>'Enter your current or secondary address...','rows'=>'2','cols'=>'50','value'=>$portfolio_details->address_2);  
                echo form_textarea($att);
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Portfolio information', 'Portfolio_info');
                $att=array('name'=>'Portfolio_info','id'=>'Portfolio_info','type'=>'text','class'=>'form-control','placeholder'=>'Say something about your portfolio','rows'=>'3','cols'=>'50','value'=>$portfolio_details->portfolio_info);  
                echo form_textarea($att);
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
             <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Contact information', 'contact_info');
                $att=array('name'=>'contact_info','id'=>'contact_info','type'=>'text','class'=>'form-control','placeholder'=>'Say something about your Conact','rows'=>'3','cols'=>'50','value'=>$portfolio_details->contact_info);  
                echo form_textarea($att);
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Facebook Id', 'facebook_id');
                $att=array('name'=>'facebook_id','id'=>'facebook_id','type'=>'text','class'=>'form-control','placeholder'=>'Enter your facebook id...','value'=>$portfolio_details->facebook_id);  
                echo form_input($att);
            ?>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Twitter Id', 'twitter_id');
                $att=array('name'=>'twitter_id','id'=>'twitter_id','type'=>'text','class'=>'form-control','placeholder'=>'Enter your twitter id...','value'=>$portfolio_details->twitter_id);  
                echo form_input($att);
            ?>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('dribble Id', 'dribble_id');
                $att=array('name'=>'dribble_id','id'=>'dribble_id','type'=>'text','class'=>'form-control','placeholder'=>'Enter your dribble id...','value'=>$portfolio_details->dribbble_id);  
                echo form_input($att);
            ?>
            </div>
          </div>
          <br/>





          <div class="row">
            <div class="col-sm-1 col-sm-offset-5">
            <?php
                $att=array('value'=>'Save','type'=>'submit','class'=>'btn btn-success form-control');  
                echo form_input($att);
            ?>
            </div>
          </div>
          </form>
          </div>
  <div class="tab-pane" id="account_details">
    <div class="row">
        <div class="col-sm-11 col-sm-offset-1">
          <h1>Your Account Details are Here!<small> that is how you will Access your account</small></h1>
          <hr>
        </div>
  </div>
        <div class="row">
          <div class="col-sm-5 col-sm-offset-3">
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Alert!</strong> You can not change your Email</div>
          </div>
        </div>
        <?php
        echo form_open_multipart('profile/update_details');


          ?>
          
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Email: '.$account_details->email_address, '');
                echo "<br/><br/><br/>";
                echo form_label('First Name', 'first_name');
                $att=array('name'=>'first_name','id'=>'first_name','type'=>'text','class'=>'form-control','value'=>$account_details->first_name);  
                echo form_input($att);
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Last Name', 'last_name');
                $att=array('name'=>'last_name','id'=>'last_name','type'=>'text','class'=>'form-control','value'=>$account_details->last_name);  
                echo form_input($att);
                
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Username', 'username');
                $att=array('name'=>'username','id'=>'username','type'=>'text','class'=>'form-control','value'=>$account_details->username);  
                echo form_input($att);
                
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
             <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 col-sm-offset-3">
            <?php
                echo form_label('Min Rate', 'minrate');
                $att=array('name'=>'minrate','id'=>'minrate','type'=>'number','class'=>'form-control','value'=>$account_details->min_rate);  
                echo form_input($att);
                
            ?>
            </div>
            <div class="col-sm-2 col-sm-offset-1">
            <?php
                echo form_label('Max Rate', 'maxrate');
                $att=array('name'=>'maxrate','id'=>'maxrate','type'=>'number','class'=>'form-control','value'=>$account_details->max_rate);  
                echo form_input($att);
                
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
             <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
            <?php
                echo form_label('Current Location', 'current_location');
                $att=array('name'=>'current_location','id'=>'current_location','type'=>'text','class'=>'form-control','value'=>$account_details->current_location);  
                echo form_input($att);
                
            ?>
            </div>
          </div><br/>
          <div class="row">
            <div class="col-sm-2 col-sm-offset-4">
            <?php
                $att=array('value'=>'Update','type'=>'submit','class'=>'btn btn-success form-control');  
                echo form_input($att);
            ?>
            </div>
          </div>
          </form>
  </div>
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


        <!-- Modal -->
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
        <input type="hidden" value="<?php echo $this->session->userdata['username'] ?>" id="user_name">
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
                })
            });
        </script>
        <script>
            jQuery('#myModal').modal('show');
            var user=document.getElementById('user_name');
            jQuery.ajax("http://portobuild.dev/php/chat/chat.php?action=setSession&username="+user.value);
            //window.alert(user.value);
        </script>
        <script type="text/javascript">
        $( "#search-box" ).keyup(function() {
              jQuery("a.dropdown-toggle").dropdown("toggle");
              var my_val=jQuery("#search-box").val();
              var value1="http://portobuild.dev/search/getRecords/".concat(my_val);
              jQuery('#dropdown-list').html('');
              jQuery.post( value1,  function( data ) {
               var jsonObj=JSON.parse(data);
               for(var i=0;i<jsonObj.length;i++){
                jQuery('#dropdown-list').prepend("<li role='presentation'><a role='menuitem' tabindex='-1' id='search-res-".concat(i).concat("' href=''></a></li>"));
               jQuery('#search-res-'.concat(i)).attr('href','http://portobuild.dev/'.concat(jsonObj[i].username));
               jQuery('#search-res-'.concat(i)).html("<img src='".concat(jsonObj[i].display_picture).concat("' id='search-res-1-img' height='50' width='50'/><span class='h4'> ").concat(jsonObj[i].first_name).concat("  ").concat(jsonObj[i].last_name).concat("</span><small> ").concat(jsonObj[i].profession).concat("</small>"));
               }
             });
          });
        
        
        </script>
        
    <!-- FancyBox Files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>_lib/fancyBox/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>_lib/fancyBox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>_lib/jquery.easing.1.3.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/chat.js"></script>
    <link rel="stylesheet" media="all" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css"/>
    
    <script>
        jQuery(document).ready(function(){
            // binds form submission and fields to the validation engine
            jQuery("#themeInfo-form").validationEngine();
        });
</script>
  </body>
</html>
