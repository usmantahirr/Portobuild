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
<?php $this->load->view('header.php');?>
<div class="row fullWidth">
            <div class="loginPanel">
            <?php
            $attributes = array('id' => 'login-form');
            echo form_open('auth/authenticate',$attributes);

  if (isset($login_error)) {
          echo '<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            <strong>Hey!</strong> ' . $login_error . '</div>';
  }
  ?>
  <fieldset>
  <legend>Login</legend>
  <?php   
    echo form_label('Email Address');
    $att=array('name'=>'email_address','id'=>'email_address','type'=>'email', 'class'=>'validate[required,custom[email]]');
    echo form_input($att);

    echo form_label('Password', 'password');
    $att=array('name'=>'password','id'=>'password','type'=>'password', 'class'=>'validate[required]');
    echo form_input($att);
  ?>
  </fieldset>
  <p>
  <?php
  echo form_button(array('id' => 'submit', 'value' => 'Login', 'name' => 'submit', 'type' => 'submit', 'content' => 'Sign In','class' => 'btn btn-primary btn-large'));
  ?>
  </p>
  <?php
  echo form_close();
  ?>
            </div>
        </div>
        </div>
    </body>
<script>
        jQuery(document).ready(function(){
            // binds form submission and fields to the validation engine
            jQuery("#login-form").validationEngine();
        });
</script>

</html>

