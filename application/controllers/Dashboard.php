<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('Dashboard_model');  
    }

	public function index()
	{
		//$this->dashboard();
        $data['title']="E-Dairy";
        $data['contact_count']=$this->Dashboard_model->counts_of_contact();
        $data['dept_count']=$this->Dashboard_model->counts_of_department();
        $data['desig_count']=$this->Dashboard_model->counts_of_designation();
        $this->render_view('dashboard', $data);
	}

	public function dashboard() 
    {
        $data['title']="E-Dairy";
        $data['contact_count']=$this->Dashboard_model->counts_of_contact();
        $this->render_view('dashboard', $data);
    }

    public function departments() 
    {
        $data['title']="E-Dairy";
        $this->render_view('departments', $data);
    }

    public function add_departments() 
    {
        $data['title']="E-Dairy";
        $this->render_view('add_department', $data);
    }

    public function add_designation() 
    {
        $data['title']="E-Dairy";
        $data['get_department'] = $this->Dashboard_model->get_department();
        $this->render_view('add_designation', $data);
    }

    // public function list_dept_desig() 
    // {
    //     $data['title']="E-Dairy";
    //     //$data = array();
    //     $data['get_department'] = $this->Dashboard_model->get_department();
    //     $data['desig_data'] = $this->Dashboard_model->list_designation_data();

    //     $this->render_view('desig_dept_tree_list', $data);
    // }


    public function add_contact() 
    {
        $data['title']="E-Dairy";
        $data['get_department'] = $this->Dashboard_model->get_department();
        
        //$data['get_designation'] = $this->Dashboard_model->get_designation($dept_id);
        // if(isset($_GET['department_id']) && !empty($_GET['department_id']))
        // {

        //   $id = $_GET['department_id'];
        //   $data['get_department'] = $this->Dashboard_model->get_designation($id);
        // }

        $this->render_view('add_contacts', $data);
    }

    public function ajax_desig_list()
    {

        $department_id = $_POST['department_id'];
        $desig_list = $this->Dashboard_model->get_designation($department_id);
        echo json_encode($desig_list, JSON_UNESCAPED_SLASHES);
    }

    // list show start
    public function list_department() 
    {
        $data['title']="E-Dairy";
        $data['dept_data'] = $this->Dashboard_model->list_department_data();
        $this->render_view('list_department', $data);
    }

    public function list_designation() 
    {
        $data['title']="E-Dairy";
        $data['desig_data'] = $this->Dashboard_model->list_designation_data();
        $this->render_view('list_designation', $data);
    }
    // list show end
    public function list_contact() 
    {
        $data['title']="E-Dairy";
        $data['contact_data'] = $this->Dashboard_model->list_contact_data();
        $this->render_view('list_contacts', $data);
    }
    
    public function edit_contact() 
    {
        $data['title']="E-Dairy";
        // $data['get_designation'] = $this->Dashboard_model->get_designation();
        $data['get_department'] = $this->Dashboard_model->get_department();

        if(isset($_GET['id']) && !empty($_GET['id']))
        {
          $id = $_GET['id'];
          $data['cdata'] = $this->Dashboard_model->all_contact_data($id);
        }
        $this->render_view('update_contact', $data);
    }

    

    //insert department data start

    public function insert_department(){

        $dataApplicant['dept_hindi_name'] = $_POST['dept_hindi_name'];
        $dataApplicant['dept_eng_name'] = $_POST['dept_eng_name'];
        $dataApplicant['system_ip'] = $_SERVER['SERVER_ADDR'];
         $sts= FALSE;
         $sts = $this->Dashboard_model->insert_department_detail($dataApplicant);
            if($sts){
                echo"<script>alert('department Inserted succesfully..')</script>";
         
            }else{
                echo"<script>alert('Try Again.');</script>";
            }
                echo"<script>location.replace(document.referrer);</script>";
        } 
    // insert department data end

    //insert designation data start
    
    public function insert_designation(){

        $dataApplicant['department_id'] = $_POST['department_id'];
        $dataApplicant['designation_name_eng'] = $_POST['designation_name_eng'];
        $dataApplicant['designation_name_hindi'] = $_POST['designation_name_hindi'];
        $dataApplicant['system_ip'] = $_SERVER['SERVER_ADDR'];
         $sts= FALSE;
         $sts = $this->Dashboard_model->insert_designation_detail($dataApplicant);
            if($sts){
                echo"<script>alert('Designation Inserted succesfully..')</script>";
         
            }else{
                echo"<script>alert('Try Again.');</script>";
            }
                echo"<script>location.replace(document.referrer);</script>";
        } 
    // insert designation data end


    //insert contacts data start
    
    public function insert_contact_details(){

        $dataApplicant['name'] = $_POST['name'];
        $dataApplicant['home_address'] = $_POST['home_address'];
        $dataApplicant['office_address'] = $_POST['office_address'];
        $dataApplicant['siting_address'] = $_POST['siting_address'];
        $dataApplicant['cont_personal_no'] = $_POST['cont_personal_no'];
        $dataApplicant['designation_id'] = $_POST['designation_id'];
        $dataApplicant['department_id'] = $_POST['department_id'];
        $dataApplicant['cont_email'] = $_POST['cont_email'];
        $dataApplicant['cont_office_no'] = $_POST['cont_office_no'];
       
         $sts= FALSE;
         $sts = $this->Dashboard_model->insert_contact_detail($dataApplicant);
            if($sts){
                echo"<script>alert('contacts Inserted succesfully..')</script>";
         
            }else{
                echo"<script>alert('Try Again.');</script>";
            }
                echo"<script>location.replace(document.referrer);</script>";
        } 
    // insert contacts data end

    // update contact details start
    public function update_contact_details(){
        $dataApplicant['id'] = $_POST['id'];
        $dataApplicant['name'] = $_POST['name'];
        $dataApplicant['home_address'] = $_POST['home_address'];
        $dataApplicant['office_address'] = $_POST['office_address'];
        $dataApplicant['siting_address'] = $_POST['siting_address'];
        $dataApplicant['cont_personal_no'] = $_POST['cont_personal_no'];
        $dataApplicant['designation_id'] = $_POST['designation_id'];
        $dataApplicant['department_id'] = $_POST['department_id'];
        $dataApplicant['cont_email'] = $_POST['cont_email'];
        $dataApplicant['cont_office_no'] = $_POST['cont_office_no'];
       
         $sts= FALSE;
         $sts = $this->Dashboard_model->update_contact_detail($dataApplicant);
            if($sts){
                echo"<script>alert('Contact updated successfully..')</script>";
            }
            else{
             echo"<script>alert('Try Again.');</script>";
            }
            redirect(base_url('List-Contacts'), "refresh");
        } 
    //update contact details end

	private function render_view($view, $data) 
    {
        $this->load->view('user_includes/header_link', $data);
        $this->load->view('user_includes/left_sidebar', $data);
        $this->load->view('user_includes/top_bar', $data);
        $this->load->view($view, $data);
        $this->load->view('user_includes/footer_link', $data);
        $this->load->view('user_includes/footer', $data);
    }

    // test function start
        public function list_dept_desig() 
        {
            $return_data = array();
            $data['title']="E-Dairy";            
            $deptList = $this->Dashboard_model->get_department();
            foreach ($deptList as $dept) {
                $temp["dept_id"] = $dept["dept_id"];
                $temp["dept_name_hi"] = $dept["dept_name_hi"];
                $temp["designations"] = $this->Dashboard_model->get_designation($dept["dept_id"]);
                array_push($return_data,$temp);
            }
            $data["dept_design_list"] = $return_data;            
            $this->render_view('desig_dept_tree_list', $data);
        }
    // test function end

}
