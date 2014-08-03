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
class Portfolio_model extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table_name = 'portfolio_details';
  }
  
  /**
   * Get all users.
   * 
   * @return type 
   */
  public function get_portfolio_details_by_username($username){
    $q=$this->db->query("SELECT pd.`id`, pd.`uid`, pd.`username`, pd.`profile_picture`, pd.`about_me`, pd.`define_myself`, pd.`phone_number`, pd.`adress_1`, pd.`addres_2`, pd.`facebook_id`, pd.`twitter_id`, pd.`dribbble`, pd.`profession` ,us.`id`, us.`uuid`, us.`email_address`, us.`password`, us.`username`, us.`first_name`, us.`last_name`, us.`min_rate`, us.`max_rate`, us.`from_time`, us.`to_time`, us.`birth_date`, us.`current_location`, us.`is_active`, us.`is_admin`, us.`created_at`, us.`updated_at`, us.`last_logged_in`, us.`last_ip` FROM `portfolio_details` pd inner join `user` us on pd.username=us.username
where pd.username='".$username."'");
    foreach ($q->result() as $key=>$row) {
      return json_encode($row);
      
    }



  }
 
}