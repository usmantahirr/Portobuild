<?php
class Profile extends CI_Controller {
    public function __construct() {
            parent::__construct(); 
            $this->load->helper(array('form', 'url'));
            $this->load->model("user_model");
    }

    public function index()
    {

        $username = $this->uri->segment(1);

        if (empty($username)) {
            $this->displayPageNotFound();
        }
        //$this->load->view($username."/index");
        redirect('portfolios/'.$username.'/index.php');
        /*
        $this->load->model('muser');

        // Check if parameter is not a valid username.
        if (!$this->muser->checkIfUsername($username)) {
            $this->displayPageNotFound();
        } else {
            // Load data for user profile.
            $ip = $this->session->userdata('ip_address');
            $curr_user = $this->session->userdata('id');

            $data['profile'] = $this->db->get_where('users', array('id' => $profile_id))->row_array();  
            $data['followers'] = $this->db->get_where('followers', array('following_id' => $profile_id))->num_rows();       
            $data['following'] = $this->db->get_where('followers', array('follower_id' => $profile_id))->num_rows();
            $data['doesFollow'] = $this->db->get_where('followers', array('follower_id' => $curr_user, 'following_id' => $profile_id))->num_rows();
            $data['posts'] = $this->db->get_where('posts', array('user_id' => $profile_id))->result_array();        

            $data['main_content'] = 'profile';  
            $this->load->view('template', $data);   

            $this->get_profile_view($profile_id, $ip, $curr_user);  
        }*/
    } 

    protected function displayPageNotFound() {
        $this->output->set_status_header('404');
        $this->load->view('page_not_found');
    }
    public function change_picture(){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width']  = '5332';
        $config['max_height']  = '3333';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

          //  $this->load->view('upload_success', $data);
        }
        $pic="http://portobuild.dev/uploads/".$data['upload_data']['orig_name'];
        $this->user_model->update_profile_picture($pic);
        redirect("album");

    }
    public function update_details(){
        $this->load->helper('form');
        $user_data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'username' => $this->input->post('username'),
      'min_rate' => $this->input->post('minrate'),
      'max_rate' => $this->input->post('maxrate'),
      'current_location' => $this->input->post('current_location'));
        $account_details=$this->user_model->get_by_username($this->session->userdata('username'));
        $this->user_model->update($user_data,$account_details->id);
        $this->session->set_userdata('username', $user_data['username']);
        redirect("album");
    }
}
?>