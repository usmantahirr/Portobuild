<!doctype html>
<html class="no-js" lang="en">
<?php $this->load->view('header.php'); ?>

    <div class="signUpForm">
    <?php
        $attributes = array('id' => 'signup-form');
        echo form_open('auth/register',$attributes);

          if (isset($login_error)) {
                  echo '<div class="alert alert-error"><strong>' . $login_error . '</strong></div>';
          } ?>
  

           <div class="row fullWidth">
                <div class="large-12 columns">
                    <h1>You are one step away from being "Awesome"</h1>
                </div>
           </div>
           
            <div class="row fullWidth">
                <div class="large-6 columns">
                    
                    <fieldset>
                        <!-- First name and Last Name  -->
                        <legend>Name & Login Info</legend>
                        <div class="row">
                            <div class="large-6 columns">
                            <?php
                                echo form_label('First Name');
                                $att=array('name'=>'first_name','id'=>'first_name','type'=>'text', 'class'=>'validate[required,minSize[6]]');
                                echo form_input($att);
                                ?>
                            </div>
                            <div class="large-6 columns">
                            <?php    
                                echo form_label('Last Name');
                                $att=array('name'=>'last_name','id'=>'last_name','type'=>'text', 'class'=>'validate[required,minSize[6]]');
                                echo form_input($att);
                            ?>
                            </div>
                        </div>

                        <!-- Email and username-->
                        <div class="email-field">
                            
                        </div>
                      
                        <div class="row">
                            <div class="large-6 columns">
                                <?php  
                                    
                                    $att=array('name'=>'email','id'=>'email','type'=>'email', 'class'=>'validate[required,custom[email]]');  
                                    echo form_label('Email'); 
                                    echo form_input($att);
                                ?>
                                
                            </div>
                            <div class="large-6 columns">
                                <?php    
                                    echo form_label('Username');
                                    $att=array('name'=>'username','id'=>'username','type'=>'text', 'class'=>'validate[required,minSize[10],custom[onlyLetterNumber]]');
                                    echo form_input($att);
                                ?>
                            </div>
                        </div>

                          <!-- Passowrd -->
                        <div class="row">
                            <div class="large-6 columns">
                                <div class="pasword-field">
                                    <?php  
                                        echo form_label('Password');
                                    $att=array('name'=>'password','id'=>'password','type'=>'password', 'class'=>'validate[required] text-input');
                                    echo form_input($att);
                                    ?>
                                </div>
                            </div>
                            <div class="large-6 columns">
                                <?php
                                     echo form_label('Repeat Password');
                                    $att=array('name'=>'password2','id'=>'password2','type'=>'password', 'class'=>'validate[required,equals[password]] text-input');
                                    echo form_input($att);
                                ?>
                            </div>
                        </div>



                    </fieldset>
                </div>
                
                <div class="large-6 columns">
                    <fieldset>
                        <legend>Desicription and Aditional Info</legend>
                        <!-- Hourly Rate & Location  -->
                        <div class="row">
                            <label for="minRate" style="padding-left: 10px;">Hourly Rate </label>
                            <div class="large-6 columns">
                                <div class="row collapse">                                    
                                    <div class="small-4 columns">
                                        <span class="prefix">Min</span>
                                    </div>
                                    <div class="small-5 columns">
                                        <?php
                                            $att=array('name'=>'min_rate','id'=>'min_rate','type'=>'number','placeholder'=>'Rate','class'=>'validate[required,custom[integer],min[1],max[1000]]');   
                                            echo form_input($att);
                                        ?>
                                    </div>
                                    <div class="small-3 columns">
                                        <span class="postfix">USD</span>
                                    </div>
                                </div>
                            </div>
                            <div class="large-6 columns">
                                <div class="row collapse">
                                    <div class="small-4 columns">
                                        <span class="prefix">Max</span>
                                    </div>
                                    <div class="small-5 columns">
                                        <?php
                                            $att=array('name'=>'max_rate','id'=>'max_rate','type'=>'number','placeholder'=>'Rate','class'=>'validate[required,custom[integer],min[5],max[10000]]');  
                                            echo form_input($att);
                                        ?>
                                    </div>
                                    <div class="small-3 columns">
                                        <span class="postfix">USD</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Rates Section-->
                        
                        <!-- Work Timings -->
                        <div class="row">
                            <label for="time" style="padding-left: 10px;">Work Timings <a href="http://wwp.greenwichmeantime.com/world-clock/">(GMT + 0:00)</a></label>
                            <div class="large-6 columns">
                                <div class="row collapse">                                    
                                    <div class="small-4 columns">
                                        <span class="prefix">From</span>
                                    </div>
                                    <div class="small-8 columns">
                                        <?php
                                            $att=array('name'=>'from_time','id'=>'from_time','pattern'=>'number','type'=>'time','placeholder'=>'Start Time GMT-00','class'=>'validate[required]');  
                                            echo form_input($att);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="large-6 columns">
                                <div class="row collapse">
                                    <div class="small-4 columns">
                                        <span class="prefix">to</span>
                                    </div>
                                    <div class="small-8 columns">
                                        <?php
                                            $att=array('name'=>'to_time','id'=>'to_time','pattern'=>'number','type'=>'time','placeholder'=>'pEnd Time GMT-00','class'=>'validate[required]');  
                                            echo form_input($att);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Work Timings Section-->
                        
                        <!-- Birth and Location Info -->
                        <div class="row">
                            <div class="large-6 columns">
                                <?php
                                            echo form_label('Birth Date', 'birth_date');
                                            $att=array('name'=>'birth_date','id'=>'birth_date','pattern'=>'number','type'=>'date','class'=>'validate[required]');  
                                            echo form_input($att);
                                ?>
                            </div>
                            <div class="large-6 columns">
                                <?php
                                            echo form_label('Currunt Location', 'current_location');
                                            $att=array('name'=>'current_location','id'=>'current_location','type'=>'text','class'=>'controls','placeholder'=>'Search Box','class'=>'validate[required]');  
                                            echo form_input($att);
                                ?>

                            </div>
                        </div> <!-- Birth and Location Info -->
                    </fieldset>
                </div>
            </div>
            <!-- MAP -->
            <div class="row fullWidth">
                <div class="large-12 columns">
                    <div id="map-canvas" style="height: 200px;margin-bottom: 20px;"></div>
                </div>
            </div>
            <!-- Continue Button -->
            <div class="row fullWidth">
                <div class="large-12 columns">
                    <!-- buttons -->
                    <div class="right">
                            <?php
                                $att=array('value'=>'Continue & Login','type'=>'submit','class'=>'button small');  
                                echo form_input($att);
                            ?>

                    </div>
                </div>
            </div>
        </form>
    </div>
    
</body>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script>
var map;
function initialize() {
  var markers = [];
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  
  // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('current_location'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    // For each place, get the icon, place name, and location.
    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      markers.push(marker);

      bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  // [END region_getplaces]

  
  
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);
jQuery(document).ready(function(){
	// binds form submission and fields to the validation engine
	jQuery("#signup-form").validationEngine();
});
</script>


</html>
