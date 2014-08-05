<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Friends extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->is_logged_in() == FALSE)
    {
      redirect('auth');
    }
    else
    {
      $this->load->model('album_model');
      $this->load->model('image_model');
      $this->load->model('user_model');
    }
  }
  public function add(){
    $this->user_model->addFriend($this->input->post("friend_name"));
    $data['msg']="Frien Sucessfully added!";
    redirect('album/index');
  }
  
 
}
