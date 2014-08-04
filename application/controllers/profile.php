<?php
class Profile extends CI_Controller {
    public function __construct() {
            parent::__construct(); 
    }

    public function index()
    {

        $username = $this->uri->segment(1);

        if (empty($username)) {
            $this->displayPageNotFound();
        }
        $this->load->view($username."/index");
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
}
?>