<!doctype html>
<style type="text/css">
  .alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}
.alert h4 {
  margin-top: 0;
  color: inherit;
}
.alert .alert-link {
  font-weight: bold;
}
.alert > p,
.alert > ul {
  margin-bottom: 0;
}
.alert > p + p {
  margin-top: 5px;
}
.alert-dismissable {
  padding-right: 35px;
}
.alert-dismissable .close {
  position: relative;
  top: -2px;
  right: -21px;
  color: inherit;
}
.alert-success {
  background-color: #dff0d8;
  border-color: #d6e9c6;
  color: #3c763d;
}
.alert-success hr {
  border-top-color: #c9e2b3;
}
.alert-success .alert-link {
  color: #2b542c;
}
.alert-info {
  background-color: #d9edf7;
  border-color: #bce8f1;
  color: #31708f;
}
.alert-info hr {
  border-top-color: #a6e1ec;
}
.alert-info .alert-link {
  color: #245269;
}
.alert-warning {
  background-color: #fcf8e3;
  border-color: #faebcc;
  color: #8a6d3b;
}
.alert-warning hr {
  border-top-color: #f7e1b5;
}
.alert-warning .alert-link {
  color: #66512c;
}
.alert-danger {
  background-color: #f2dede;
  border-color: #ebccd1;
  color: #a94442;
}
.alert-danger hr {
  border-top-color: #e4b9c0;
}
.alert-danger .alert-link {
  color: #843534;
}
.close {
  float: right;
  font-size: 21px;
  font-weight: bold;
  line-height: 1;
  color: #000000;
  text-shadow: 0 1px 0 #ffffff;
  opacity: 0.2;
  filter: alpha(opacity=20);
}
.close:hover,
.close:focus {
  color: #000000;
  text-decoration: none;
  cursor: pointer;
  opacity: 0.5;
  filter: alpha(opacity=50);
}
button.close {
  padding: 0;
  cursor: pointer;
  background: transparent;
  border: 0;
  -webkit-appearance: none;
}
</style>
<html class="no-js" lang="en">
<!DOCTYPE html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
</head>
<body>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1478118785780017',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->


<?php $this->load->view('header.php'); ?>

    <div class="signUpForm">
    <?php
        $attributes = array('id' => 'signup-form');
        echo form_open('auth/register',$attributes);

          if (isset($username_error)) {
                  echo '<div class="alert alert-danger"><strong>' . $username_error . '</strong></div>';
          } 
          if (isset($email_error)) {
                  echo '<div class="alert alert-danger"><strong>' . $email_error . '</strong></div>';
          } 

          ?>
  

           <div class="row fullWidth">
                <div class="large-12 columns">
                    <h1 style="display: inline-block;">You are one step away from being "Awesome"</h1>
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                    </fb:login-button>

                    <div id="status">
                    </div>

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
                                $att=array('name'=>'first_name','id'=>'first_name','type'=>'text', 'class'=>'validate[required,minSize[3]]');
                                echo form_input($att);
                                ?>
                            </div>
                            <div class="large-6 columns">
                            <?php    
                                echo form_label('Last Name');
                                $att=array('name'=>'last_name','id'=>'last_name','type'=>'text', 'class'=>'validate[required,minSize[3]]');
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
                                    $att=array('name'=>'username','id'=>'username','type'=>'text', 'class'=>'validate[required,minSize[6],custom[onlyLetterNumber]]');
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
