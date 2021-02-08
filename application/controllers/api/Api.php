<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/RestController.php'; //including libraray
require_once APPPATH . 'libraries/Format.php'; // response code format 

use chriskacerguis\RestServer\RestController;

class Api extends RestController {    

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model("Questions");
    }

    //Default method
    public function index_get(){
        $this->response( [                
            'message' => 'Invalid Url'
        ], RestController::HTTP_NOT_FOUND );
    }

    /* GET Method using _get() 
    // Weburl/controller/function?[params]
    */
    public function DataGet_get()
    {
        $username = $this->get('username');
        $password = $this->get('password');
        
		if(empty($username) || empty($password))
		{			
			$this->response( [                
                'message' => 'Please Enter All Fields.'
            ], RestController::HTTP_NOT_FOUND );
        }
        else
        {
            $username = $this->input->get('username');
            $password = $this->input->get('password');
            //call Model Function ....            
            $this->response( [                
                'message' => 'Data Get Successfully.'
            ], RestController::HTTP_OK );                          
        }
    }

    /* POST Method using post() 
    // Weburl/controller/function 
    // fill form-data or x-www-form-urlencoded as per your requerment.
    */
    public function DataPost_post()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        if(empty($username) || empty($password))
		{			
			$this->response( [                
                'message' => 'Please Enter All Fields.'
            ], RestController::HTTP_NOT_FOUND );
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //call Model Function ....            
            $this->response( [                
                'message' => 'Data Post Successfully.'
            ], RestController::HTTP_OK );                          
        }
    }


    /* DELETE Method using delete() 
    // Weburl/controller/function/[id]
    */
    public function DataDelete_delete($id)
    {           
        if(empty($id))
		{			
			$this->response( [                
                'message' => 'Please Enter All Fields.'
            ], RestController::HTTP_NOT_FOUND );
        }
        else
        {
            //$id
            //call Model Function ....            
            $this->response( [                
                'message' => 'Data Delete Successfully.'
            ], RestController::HTTP_OK );                          
        }
    }

    /* PUT Method using put() 
    // Weburl/controller/function/[id]?[params]
    */
    public function DataPut_put($id)
    {
        $value = $this->input->get('value');        
        if(empty($value) || empty($id))
		{			
			$this->response( [                
                'message' => 'Please Enter All Fields.'
            ], RestController::HTTP_NOT_FOUND );
        }
        else
        {
            $username = $this->input->get('value');
            //$id
            //call Model Function ....            
            $this->response( [                
                'message' => 'Data Put Successfully.'
            ], RestController::HTTP_OK );                          
        }
    }

    /* Question Modules Start */
    public function applicationModuleList_get(){
        $this->response( [
            "applicationModules" => $this->Questions->getApplicationModuleList()
        ], RestController::HTTP_OK);                          
    }
    public function questionModuleList_get($app_mod_id){
        $this->response( [
            "questionModules" => $this->Questions->getQuestionModuleList($app_mod_id)
        ], RestController::HTTP_OK);                          
    }

    public function getQuestionList_get($moduleId = 0){
        $this->response( [
            "questions" => $this->Questions->getQuestionList($moduleId)
        ], RestController::HTTP_OK);                          
    }

    public function getQuestionWithOptionList_get($moduleId = 0){
        $this->response( [
            "questions" => $this->Questions->getQuestionsWithOptions($moduleId)
        ], RestController::HTTP_OK);                          
    }

    public function getOptionList_get($questionId){
        $this->response( [
            "questions" => $this->Questions->getQuestionOptionList($questionId)
        ], RestController::HTTP_OK);                          
    }

    /* Question Modules End */

}