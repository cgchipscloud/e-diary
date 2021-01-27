<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('Login_model');  
    }

	public function index()
	{
        $data['title']="E-Dairy";
        $this->login();
        //$this->load->view('admin_login/login_page', $data);
	}

    public function login() {
        //for login case ...
        $this->form_validation->set_rules('username', 'Username', 'required|trim|stripslashes');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|stripslashes');

        //if form validation is true
        if ($this->form_validation->run() === TRUE) {

            //SHA512 encryption 
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $password_md5 = md5($password);

            $return_data = $this->Login_model->get_login($username, $password_md5);

            if ($return_data['status'] === TRUE) {
                $session_data = array(
                    'fullname' => $return_data['data'][0]['fullname'],
                    'user_role_id' => $return_data['data'][0]['user_role_id'],
                    'role_name' => $return_data['data'][0]['role_name']
                );

                $this->session->set_userdata($session_data);
                //print_r( $session_data);exit();
                $this->role_check();
            } else {
                $this->session->set_flashdata("error", "Please Enter Valid Username / Password.");
            }
        } else {
            // error massage...
            $this->session->set_flashdata("error","Username / Password field are required.");
        }
         //$data = array();
        $this->load->view('admin_login/login_page');
    }

    function role_check() {
        
        if($this->session->userdata('role_name') == 'superuser') {
            redirect(base_url('Edairy-Home'), "refresh");
        }  
        else {
            $this->session->set_flashdata("error", "No such account exist in database");
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('admin_login/logout');
    }
}
?>