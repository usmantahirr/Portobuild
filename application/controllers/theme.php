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
  
  

}

/* End of file theme.php */
/* Location: ./application/controllers/theme.php */
