<!doctype html>
<html class="no-js" lang="en">
<?php $this->load->view('header.php'); ?>

    <div class="signUpForm">
    <?php
        echo form_open('auth/register');

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
                                echo form_label('First Name', 'first_name');
                                echo form_input('first_name');
                                ?>
                            </div>
                            <div class="large-6 columns">
                            <?php    
                                echo form_label('Last Name', 'last_name');
                                echo form_input('last_name');
                            ?>
                            </div>
                        </div>

                        <!-- Email and username-->
                        <div class="email-field">
                            
                        </div>
                      
                        <div class="row">
                            <div class="large-6 columns">
                                <?php  
                                    echo form_label('Email', 'email');
                                    echo form_input('email');
                                ?>
                                
                            </div>
                            <div class="large-6 columns">
                                <?php    
                                    echo form_label('Username', 'username');
                                    echo form_input('username');
                                ?>
                            </div>
                        </div>

                          <!-- Passowrd -->
                        <div class="pasword-field">
                            <?php  
                                echo form_label('Password', 'password');
                                echo form_password('password');
                            ?>
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
                                            $att=array('name'=>'min_rate','id'=>'min_rate','type'=>'number','placeholder'=>'Rate');  
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
                                            $att=array('name'=>'max_rate','id'=>'max_rate','type'=>'number','placeholder'=>'Rate');  
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
                                            $att=array('name'=>'from_time','id'=>'from_time','pattern'=>'number','type'=>'time','placeholder'=>'Start Time GMT-00');  
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
                                            $att=array('name'=>'to_time','id'=>'to_time','pattern'=>'number','type'=>'time','placeholder'=>'pEnd Time GMT-00');  
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
                                            $att=array('name'=>'birth_date','id'=>'birth_date','pattern'=>'number','type'=>'date');  
                                            echo form_input($att);
                                ?>
                            </div>
                            <div class="large-6 columns">
                                <?php
                                            echo form_label('Currunt Location', 'current_location');
                                            $att=array('name'=>'current_location','id'=>'current_location','type'=>'text','class'=>'controls','placeholder'=>'Search Box');  
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

</html>
