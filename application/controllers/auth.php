<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Copyright (c) 2012, Aaron Benson - GalleryCMS - http://www.gallerycms.com
 * 
 * GalleryCMS is a free software application built on the CodeIgniter framework. 
 * The GalleryCMS application is licensed under the MIT License.
 * The CodeIgniter framework is licensed separately.
 * The CodeIgniter framework license is packaged in this application (license.txt) 
 * or read http://codeigniter.com/user_guide/license.html
 * 
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 * 
 */
class Auth extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    error_reporting(0);
    // This app has run for the first time, install.
    if ( ! $this->db->table_exists('user'))
    {
      redirect('install');
      return;
    }
    
    $this->load->model('user_model');
    $this->load->model('feed_model');
  }
  
  /**
   * Display login form.
   */
  public function index()
  {
    $this->load->helper('form');
    
    $data = array();
    $data['email'] = '';
    $this->load->view('auth/index', $data);
    
    if ($this->_is_logged_in() == TRUE)
    {
      redirect('album');
    }
  }
  public function login(){
    $this->load->helper('form');
    $this->load->view('auth/login');
  }
  public function signup(){
    $this->load->helper('form');
    $this->load->view('auth/signup');
  }
  public function home(){
    $this->load->view('auth/home');
  }
  /**
   * Process user authentication.
   */


  public function authenticate()
  {
    // Authenticate user.
    $this->load->helper('form');
    $userData = array('email_address' => $this->input->post('email_address'), 'password' => $this->input->post('password'));
    $user_id = $this->user_model->authenticate($userData);
    if ($user_id > 0)
    {
      // Create session var
      $user = $this->user_model->find_by_id($user_id);
      $this->create_login_session($user);
      $feed_id=$this->feed_model->get_feed_id_by_username($this->session->userdata('username'));
      $_SESSION['username']=$this->session->userdata('username');
      $this->session->set_userdata('feed_id', $feed_id);

      $this->session->set_flashdata('flash_message', 'You are logged in.');
       $_SESSION['username']=$this->session->userdata('username');
       

      redirect('album');
    }
    else
    {
      $data = array();
      $data['login_error'] = 'Incorrect login';
      $data['email'] = $this->input->post('email_address');

      
      $this->load->view('auth/login', $data);
    }
  }  
  // public function authenticate()
  // {
  //   // Authenticate user.
  //   $this->load->helper('form');
  //   $userData = array('email_address' => $this->input->post('email_address'), 'password' => $this->input->post('password'));
  //   print_r($userData);
  //   $user_id = $this->user_model->authenticate($userData);
  //   if($user_id==null)
  //   {
  //     $data['msg']="invalid username";
  //     $this->load->view('auth/login',$data);
  //   }
  //   else{
  //     $this->session->set_flashdata('flash_message', 'You are logged in.');
  //     $user = $this->user_model->find_by_id($user_id);
  //     // Create session var
  //     $this->create_login_session($user);
  //     redirect('auth/home');
      

  //   }
  //   if ($user_id > 0)
  //   {
      
      

  //     redirect('album');
  //   }
  //   else
  //   {
  //     $data = array();
  //     $data['login_error'] = 'Incorrect login';
  //     $data['email'] = $this->input->post('email_address');
      
  //     $this->load->view('auth/index', $data);
  //   }
  //}
  public function register(){
    $this->load->helper('form');
    $now = date('Y-m-d H:i:s');
    $user_data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'email_address' => $this->input->post('email'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'min_rate' => $this->input->post('min_rate'),
      'max_rate' => $this->input->post('max_rate'),
      'from_time' => $this->input->post('from_time'),
      'to_time' => $this->input->post('to_time'),
      'birth_date' => $this->input->post('birth_date'),
      'current_location' => $this->input->post('current_location'),
      'is_active'       => 1,
      'is_admin'        => 0,
      'created_at'      => $now,
      'uuid'            => $this->create_uuid(),
      'updated_at'      => $now);
      $this->load->model('user_model');
      
          
      $user_id = $this->user_model->create($user_data);
      // Fetch user record
      $user = $this->user_model->find_by_id($user_id);
      // Sign in
      $this->create_login_session($user);
      
      $this->session->set_flashdata('flash_message', "User successfully created. You are now logged in");


      //creating JSON feed
      $session_data = $this->get_user_data();
      $feed_uuid=$this->create_uuid();
        $now = date('Y-m-d H:i:s');
        $data = array(
            'name' => $user_data['username'], 
            'created_by' => $user_id, 
            'uuid' => $feed_uuid,
            'created_at' => $now);
        
        $feed_id = $this->feed_model->create($data);
        $this->session->set_userdata('feed_id', $feed_id);
        $this->session->set_userdata('feed_uuid', $feed_uuid);

        $this->session->set_flashdata('flash_message', "Successfully created feed.");

    
    	//load view when successfully registered on site and records are being entered in db.
      //$this->load->view('auth/register');
  	 redirect('theme/selector');
  }
  
  /**
   * Process user logout.
   */
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }
  
  /**
   * Display forgot password view. Processes forgot password form.
   *
   * @return type 
   */
  public function forgotpassword()
  {
    $this->load->helper('form');
    $email_address = $this->input->post('email_address');
    
    $data = array();
    $data['email_address'] = $email_address;
    
    if (isset($email_address))
    {
      // Validate form
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
      $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|xss_clean');
      if ($this->form_validation->run() == TRUE)
      {
        $user = $this->user_model->get_by_email_address($email_address);
        // No user found
        if (empty($user))
        {
          $data['error'] = 'No user exists with the supplied email address.';
        }
        else
        {
          // Found user, email them with a link to reset password.
          // Create ticket
          $this->load->model('ticket_model');
          $ticket_id = $this->ticket_model->create(array('user_id' => $user->id, 'uuid' => $this->create_uuid()));
          $ticket = $this->ticket_model->find_by_id($ticket_id);
          // Send email
          $subject = $this->config->item('site_title') . ' - Forgot Password';
          $reset_pw_url = base_url('auth/resetpassword/' . $ticket->uuid);
          $message = "You have requested to reset your password.\r\n Click the following link to reset your password: $reset_pw_url";
          $this->send_mail($user->email_address, $subject, $message);
          // Show to success page
          $this->load->view('auth/forgot_password_success');
          return;
        }
      }
    }
    $this->load->view('auth/forgot_password', $data);
  }
  
  /**
   * Displays reset password view. Processes password reset.
   *
   * @param type $uuid 
   */
  public function resetpassword($uuid)
  {
    $this->load->model('ticket_model', 'ticket_model');
    
    $data = array();
    // Check for ticket
    $ticket = $this->ticket_model->get_by_uuid($uuid);
    if (empty($ticket))
    {
      $data['error'] = 'This link has expired.';
    }
    else
    {
      $user = $this->user_model->find_by_id($ticket->user_id);
      $data['uuid'] = $uuid;

      $new_password = $this->input->post('password');
      if (isset($new_password))
      {
        // Validate new password
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password_conf]|sha1');
        if ($this->form_validation->run() == TRUE)
        {
          // Save new password
          $this->user_model->update_password($this->input->post('password'), $user->id);
          // Delete ticket
          $this->ticket_model->delete($ticket->id);
          // Authenticate user
          $user_id = $this->user_model->authenticate(array('email_address' => $user->email_address, 'password' => $new_password));
          if ($user_id > 0)
          {
            $this->create_login_session($user);
          }
          // Redirect
          redirect('album');
        }
      }
    }
    $this->load->view('auth/reset_password', $data);
  }
  
  /**
   * Creates session data for logged in user.
   *
   * @param type $user 
   */
  protected function create_login_session($user)
  {
    $session_data = array(
        'email_address'  => $user->email_address,
        'user_id'        => $user->id,
        'logged_in'      => TRUE,
        'is_admin'       => $user->is_admin,
        'ip'             => $this->input->ip_address(),
        'username'       => $user->username
    );
    $this->session->set_userdata($session_data);
  }

  private function _is_logged_in()
  {
    $session_data = $this->session->all_userdata();
    return (isset($session_data['user_id']) && $session_data['user_id'] > 0 && $session_data['logged_in'] == TRUE);
  }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
