<!doctype html>
<html class="no-js" lang="en">
<?php $this->load->view('header.php');?>
<div class="row fullWidth">
            <div class="loginPanel">
            <?php
  echo form_open('auth/authenticate');

  if (isset($login_error)) {
          echo '<div class="alert alert-error"><strong>' . $login_error . '</strong></div>';
  }
  echo form_label('Email Address', 'email_address');
  echo form_input('email_address');

  echo form_label('Password', 'password');
  echo form_password('password');
  ?>
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
    

</html>

