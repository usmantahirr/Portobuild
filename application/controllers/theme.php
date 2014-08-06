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
class Theme extends MY_Controller
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
	$this->load->helper('file');
    $this->load->helper('form');
    $this->load->model('user_model');
    $this->load->model('portfolio_model');
    $this->load->model('album_model');
      $this->load->model('image_model');
      $this->load->model('feed_model');

  }
  
  /**
   * Display login form.
   */
  public function selector()
  {
    
    
    $data = array();
    $data['email'] = '';
    $this->load->view('theme/selector', $data);
  }
  public function apply(){
  	$theme=$this->input->post('theme');
    $zip = new ZipArchive;
    if($theme=="theme1"){
      if ($zip->open('./assests/theme1.zip') === TRUE) {
          $zip->extractTo('./portfolios/');
          $zip->close();
          echo 'ok';
      } else {
          echo 'failed';
      }
      rename('./portfolios/theme1','./portfolios/'.$this->session->userdata('username'));
    }
    elseif ($theme=="theme2") {
      if ($zip->open('./assests/theme2.zip') === TRUE) {
          $zip->extractTo('./portfolios/');
          $zip->close();
          echo 'ok';
      } else {
          echo 'failed';
      }
      rename('./portfolios/theme2','./portfolios/'.$this->session->userdata('username'));
    }
    elseif ($theme=="theme3") {
      if ($zip->open('./assests/theme3.zip') === TRUE) {
          $zip->extractTo('./portfolios/');
          $zip->close();
          echo 'ok';
      } else {
          echo 'failed';
      }
      rename('./portfolios/theme3','./portfolios/'.$this->session->userdata('username'));
    }
    //mkdir('portfolios/khalid');
    //copy ( './assests/theme1.zip', './portfolios/khalid/theme1.zip');
   //  $zip = new ZipArchive;
   //  if ($zip->open('./portfolios/khalid/theme1.zip') === TRUE) {
   //      $zip->extractTo('./portfolios/khalid/');
   //      $zip->close();
   //      echo 'ok';
   //  } else {
   //      echo 'failed';
   //  }
  	redirect('album/create');
  }
  public function get_details($username){
    echo $this->portfolio_model->get_portfolio_details_by_username($username);
  }
  public function user_info(){
    $uri = $this->uri->segment(3);
    $offset = ( ! empty($uri) && is_numeric($uri)) ? $uri : 0;
    $per_page = 10;
    
    if ($this->is_admin() === TRUE)
    {
      $album_data = $this->album_model->paginate($per_page, $offset);
      $total = count($this->album_model->fetch_all());
    }
    else
    {
      $album_data = $this->album_model->paginate_by_user_id($this->get_user_id(), $per_page, $offset);
      $total = count($this->album_model->fetch_by_user_id($this->get_user_id()));
    }
    
    for ($i = 0; $i < count($album_data); $i++)
    {
      $album_data[$i]['images'] = $this->image_model->get_last_ten_by_album_id($album_data[$i]['id']);
    }
    $data = array();
    $data['albums'] = $album_data;
    
    $this->load->library('pagination');
    
    $config = array();
    $config['base_url']         = site_url('album/index');
    $config['total_rows']       = $total;
    $config['per_page']         = $per_page;
    $config['full_tag_open']    = '<div class="pagination"><ul>';
    $config['full_tag_close']   = '</ul></div>';
    $config['first_link']       = '&larr; First';
    $config['last_link']        = 'Last &rarr;';
    $config['first_tag_open']   = '<li>';
    $config['first_tag_close']  = '</li>';
    $config['prev_link']        = 'Previous';
    $config['prev_tag_open']    = '<li class="prev">';
    $config['prev_tag_close']   = '</li>';
    $config['next_link']        = 'Next';
    $config['next_tag_open']    = '<li>';
    $config['next_tag_close']   = '</li>';
    $config['last_tag_open']    = '<li>';
    $config['last_tag_close']   = '</li>';
    $config['cur_tag_open']     =  '<li class="active"><a href="#">';
    $config['cur_tag_close']    = '</a></li>';
    $config['num_tag_open']     = '<li>';
    $config['num_tag_close']    = '</li>';
    $config['num_links']        = 4;
    
    $this->pagination->initialize($config);
    
    $this->load->model('user_model');
    $data['user'] = $this->user_model->find_by_id($this->get_user_id());
    
    $flash_login_success = $this->session->flashdata('flash_message'); 
    
    if (isset($flash_login_success) && ! empty($flash_login_success))
    {
      $data['flash'] = $flash_login_success;
    }
    
    $data['is_admin'] = $this->is_admin();
    $session_data = $this->get_user_data();
    $data['email_address'] = $session_data['email_address'];
    $data['feed_id'] = $this->session->userdata('feed_id');
    $data['username']=$this->session->userdata('username');
    $data['friends'] = $this->user_model->get_friends_by_username($this->session->userdata('username'));
   // die;
    //echo $this->feed_model->get_feed_uuid(3);
    $this->load->view("theme/user_info",$data);
  }

  public function save_details(){
    $this->load->helper('form');
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '100';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload())
    {
     print_r($error = array('error' => $this->upload->display_errors()));

     // $this->load->view('upload_form', $error);
    }
    else
    {
      print_r($data = array('upload_data' => $this->upload->data()));

     // $this->load->view('upload_success', $data);
    }
    // $user_data = array(
    //   'define_yourself' => $this->input->post('define_yourself'),
    //   'about_me' => $this->input->post('about_me'),
    //   'profession' => $this->input->post('profession'),
    //   'phone_number' => $this->input->post('phone_number'),
    //   'address1' => $this->input->post('address1'),
    //   'address2' => $this->input->post('address2'),
    //   'Portfolio_info' => $this->input->post('Portfolio_info'),
    //   'contact_info' => $this->input->post('contact_info'),
    //   'phone_number' => $this->input->post('phone_number'),
    //   'facebook_id' => $this->input->post('facebook_id'),
    //   'twitter_id' => $this->input->post('twitter_id'),
    //   'dribble_id' => $this->input->post('dribble_id'));

    //$id=$this->portfolio_model->create($ser_data);


  }
  
  

}

/* End of file theme.php */
/* Location: ./application/controllers/theme.php */
