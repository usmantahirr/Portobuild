<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portobuild - Signup</title>
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/foundation-datepicker.css" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <script src="bower_components/modernizr/modernizr.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    
</head>

<body>
    <!-- Navigation -->
    <?php require 'php/navigation.php'; ?>

    <div class="signUpForm">
        <form data-abide action="themeSelector.php" name="signupForm">
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
                                <label>First Name <small>required</small>
                                    <input type="text" placeholder="First Name" required/>
                                </label>
                                <small class="error">First Name is required.</small>
                            </div>
                            <div class="large-6 columns">
                                <label>Last Name <small>required</small>
                                    <input type="text" placeholder="Last Name" required/>
                                </label>
                                <small class="error">Last Name is required.</small>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="email-field">
                            <label>Email <small>required</small>
                                <input type="email" placeholder="name@vender.com" pattern="email" required>
                            </label>
                            <small class="error">An email address is required.</small>
                        </div>
                        <!-- Passowrd -->
                        <div class="pasword-field">
                            <label>Password <small>required</small>
                                <input type="password" placeholder="password" required>
                            </label>
                            <small class="error">Valid password is required.</small>
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
                                        <input type="number" id="minRate" pattern="number" placeholder="Rate" />
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
                                        <input type="number" pattern="number" placeholder="Rate" />
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
                                        <input type="time" id="time" pattern="number" placeholder="Start Time GMT-00" />
                                    </div>
                                </div>
                            </div>
                            <div class="large-6 columns">
                                <div class="row collapse">
                                    <div class="small-4 columns">
                                        <span class="prefix">to</span>
                                    </div>
                                    <div class="small-8 columns">
                                        <input type="time" pattern="number" placeholder="End Time GMT-00" />
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Work Timings Section-->
                        
                        <!-- Birth and Location Info -->
                        <div class="row">
                            <div class="large-6 columns">
                                <label for="birthDate" >Birth Date</label>
                                <input type="date" id="birthDate" pattern="number" />
                            </div>
                            <div class="large-6 columns">
                                <label for="pac-input" >Currunt Location</label>
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
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
                        <a href="javascript: submitform()" class="button small">Continue & Login</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <script type="text/javascript">
        function submitform() { document.signupForm.submit(); }
    </script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/mapScript.js"></script>
    <script src="js/app.js"></script>
    
</body>

</html>
