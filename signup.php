<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portobuild - Login</title>
        <link rel="stylesheet" href="css/app.css" />
        <script src="bower_components/modernizr/modernizr.js"></script>
    </head>

    <body>
        <!-- Navigation -->
        <?php require 'php/navigation.php'; ?>
        <div class="row fullWidth">
            <div class="loginPanel">
                <form data-abide>
                    <fieldset>
                        <legend>Signup</legend>
                        
                            <div class="row">
                                <div class="large-6 columns">
                                    <label>First Name
                                        <input type="text" placeholder="First Name" />
                                    </label>
                                </div>
                                <div class="large-6 columns">
                                    <label>Last Name
                                        <input type="text" placeholder="Last Name" />
                                    </label>
                                </div>
                            </div>
         
                        <div class="email-field">
                            <label>Email <small>required</small>
                                <input type="email" placeholder="name@vender.com" pattern="email" required>
                            </label>
                            <small class="error">An email address is required.</small>
                        </div>
                       
                        <div class="pasword-field">
                            <label>Password <small>required</small>
                                <input type="password" placeholder="password" required>
                            </label>
                            <small class="error">Valid password is required.</small>
                        </div>
                        
                        <input type="checkbox" name="remember" value="remember"> Remember Me
                        <div class="right">
                            <a href="#" class="button small">Signup</a>
                            <a href="#" type="submit" class="button small">Login</a>
                        </div>
                        
                    </fieldset>
                </form>
            </div>
        </div>
        </div>
        
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/foundation/js/foundation.min.js"></script>
        <script src="js/app.js"></script>
    </body>

</html>
