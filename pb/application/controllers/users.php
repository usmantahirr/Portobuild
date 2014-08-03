<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Users extends MY_Controller
{
public function __construct()
  {
    parent::__construct();
    // This app has run for the first time, install.
    if ( ! $this->db->table_exists('user'))
    {
      redirect('install');
      return;
    }
    
    $this->load->model('user_model');
  }

  public function Khalid(){
	$this->load->view('khalid/index');
  }
}
?>