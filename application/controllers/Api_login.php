<?php
	require_once APPPATH . 'libraries/RestController.php'; //including libraray
	require_once APPPATH . 'libraries/Format.php'; // response code format 

	use chriskacerguis\RestServer\RestController;

class Api_login extends RestController {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('Api_login_model');  
    }


     /*
        // Supervisor Login Start
    */ 
    public function Login_post() {
        $this->form_validation->set_rules('user_id','User-ID','trim|required|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean');

        if($this->form_validation->run() == false) {
            $this->response( [
                'status' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Please Enter All Fields.'
            ], RestController::HTTP_BAD_REQUEST );
        }else {
            $user_id = $this->input->POST('user_id');
            $password = $this->input->POST('password');
            $login_data = $this->Api_login_model->sign_in($user_id, $password);
            if($login_data['status'] == TRUE) {
                $this->response( [
                    'status' => RestController::HTTP_OK,
                    'message' => 'Login Successfully.',
                    'data' => $login_data["data"]
                ], RestController::HTTP_OK );
            }else {
                $this->response( [
                    'status' => RestController::HTTP_UNAUTHORIZED,
                    'message' => $login_data['message']
                ], RestController::HTTP_UNAUTHORIZED );
            }
        }
    }
    /*
        -- Supervisor Login End
    */ 



    public function testing_get() {
    	echo "Hello From Manju";
    }
}
?>