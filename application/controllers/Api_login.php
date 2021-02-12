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
        // Login Start
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
    // login end
// -------------------------------Send OTP start--------------------------------------------
    public function sendOTP_post()
    {
        $this->form_validation->set_rules('ias_id','IAS Id','trim|required|xss_clean');
        $this->form_validation->set_rules('mobile_no','Mobile Number','trim|required|xss_clean');
        if($this->form_validation->run() == false) {
             $this->response( [  
                'status' => RestController::HTTP_UNAUTHORIZED,              
                'message' => 'Please Enter All Requird Fields.'
            ], RestController::HTTP_UNAUTHORIZED );
        }else{
            $ias_id = $this->input->post('ias_id');
            $mobile = $this->input->post('mobile_no');
            $data = $this->Api_login_model->api_user_id_check($ias_id);
            if($data[0]['ias_count']>0) {
                $otp = rand(1111, 9999);
                $result = $this->Api_login_model->insert_mobile_otp($otp, $mobile,$ias_id);
                if($result['status']==TRUE){
                    $this->response( [
                    'status' => RestController::HTTP_OK,
                    'message' => 'OTP Sent Successfully.',
                    'data' => $result
                ], RestController::HTTP_OK );
                }else{
                    $this->response( [  
                        'status' => RestController::HTTP_UNAUTHORIZED,              
                        'message' => $result['message'],
                        'data' => ''
                    ], RestController::HTTP_UNAUTHORIZED );
                }
            }else{
                $this->response( [  
                    'status' => RestController::HTTP_UNAUTHORIZED,              
                    'message' => 'No User Found with this Mobile Number or Id.',
                    'data' => ''
                ], RestController::HTTP_UNAUTHORIZED );
            }
        }
    }
    // -------------------------------Send OTP End-----------------------------------

    // -----------------------------IAS ID Check-------------------------------------
    
    public function checkIAS_post()
    {
        $this->form_validation->set_rules('ias_id','IAS Id','trim|required|xss_clean');
        if($this->form_validation->run() == false) {
             $this->response( [  
                'status' => RestController::HTTP_UNAUTHORIZED,              
                'message' => 'Please Enter All Requird Fields.'
            ], RestController::HTTP_UNAUTHORIZED );
        }else{
            $ias_id = $this->input->post('ias_id');
            $data = $this->Api_login_model->api_user_id_check($ias_id);
            if($data[0]['ias_count']>0) {
                
                    $this->response( [
                    'status' => RestController::HTTP_OK,
                    'message' => 'IAS ID Matched Successfully.',
                    'data' => $data
                ], RestController::HTTP_OK );
            }else{
                $this->response( [  
                    'status' => RestController::HTTP_UNAUTHORIZED,              
                    'message' => 'No User Found with this Id.',
                    'data' => ''
                ], RestController::HTTP_UNAUTHORIZED );
            }
        }
    }
    // -----------------------------IAS ID CHeck-------------------------------------

    // ------------------------Check OTP, Mobile,IAS ID start--------------------------------------------
    public function checkUserData_post()
    {
        $this->form_validation->set_rules('ias_id','IAS Id','trim|required|xss_clean');
        $this->form_validation->set_rules('mobile','Mobile Number','trim|required|xss_clean');
        $this->form_validation->set_rules('otp_number','OTP','trim|required|xss_clean');
        if($this->form_validation->run() == false) {
             $this->response( [  
                'status' => RestController::HTTP_UNAUTHORIZED,              
                'message' => 'Please Enter All Requird Fields.'
            ], RestController::HTTP_UNAUTHORIZED );
        }else{
            $ias_id = $this->input->post('ias_id');
            $mobile = $this->input->post('mobile');
            $otp = $this->input->post('otp_number');
            $data = $this->Api_login_model->api_user_mobile_otp_id($ias_id,$mobile,$otp);
            //print_r($data);exit();
                if($data['status'] == TRUE){
                        $this->response( [
                        'status' => RestController::HTTP_OK,
                        'message' => 'User Data Matched Successfully.',
                        'data' => $data
                    ], RestController::HTTP_OK );
                    }else{
                    $this->response( [  
                        'status' => RestController::HTTP_UNAUTHORIZED,              
                        'message' => 'No User Found with this Mobile Number or Id or OTP.',
                        'data' => ''
                    ], RestController::HTTP_UNAUTHORIZED );
                }
            }
    }
    // -------------------------------Check OTP, Mobile,IAS ID End-----------------------------------



    public function testing_get() {
    	echo "Hello From Manju";
    }
}
?>