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


     public function add_ias_details() 
    {
        $data['title']="E-Dairy";
        $this->render_view('add_ias_details', $data);
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
        $dataApplicant['cont_personal_no_two'] = $_POST['cont_personal_no_two'];
        $dataApplicant['designation_id'] = $_POST['designation_id'];
        $dataApplicant['department_id'] = $_POST['department_id'];
        $dataApplicant['cont_email'] = $_POST['cont_email'];
        $dataApplicant['cont_office_no'] = $_POST['cont_office_no'];
        $dataApplicant['cont_office_two'] = $_POST['cont_office_two'];
        $dataApplicant['cont_fax'] = $_POST['cont_fax'];
        $dataApplicant['cont_fax_two'] = $_POST['cont_fax_two'];
       
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
        $dataApplicant['cont_personal_no_two'] = $_POST['cont_personal_no_two'];
        $dataApplicant['designation_id'] = $_POST['designation_id'];
        $dataApplicant['department_id'] = $_POST['department_id'];
        $dataApplicant['cont_email'] = $_POST['cont_email'];
        $dataApplicant['cont_office_no'] = $_POST['cont_office_no'];
        $dataApplicant['cont_office_two'] = $_POST['cont_office_two'];
        $dataApplicant['cont_fax'] = $_POST['cont_fax'];
        $dataApplicant['cont_fax_two'] = $_POST['cont_fax_two'];
       
         $sts= FALSE;
         $sts = $this->Dashboard_model->update_contact_detail($dataApplicant);
            if($sts){
                echo"<script>alert('Contact updated successfully..')</script>";
            }
            else{
             echo"<script>alert('Try Again.');</script>";
            }
            redirect(base_url('Ediary-List-Contacts'), "refresh");
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

     function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return  $token;
    }

    public function user_sha512_get($password)
    {
        //$password = $this->get('password');
        //$password = '12345';
        $front_end = $this->config->item('encryption_key');
        $salt_password_first = $front_end.trim($password).$front_end;
        //echo $front_end;
        $hased_password_first = hash('SHA512', $salt_password_first);
        return $hased_password_first;
    }

     //insert ias data start
    
    public function insert_ias_details(){

        $dataApplicant['ias_id'] = $_POST['ias_id'];
        $dataApplicant['ias_name_en'] = $_POST['ias_name_en'];
        $dataApplicant['ias_name_hi'] = $_POST['ias_name_hi'];
        $dataApplicant['email_id'] = $_POST['email_id'];
        $dataApplicant['mobile_no'] = $_POST['mobile_no'];
        $dataApplicant['post_address'] = $_POST['post_address'];

        $password = $this->user_sha512_get($dataApplicant['mobile_no']);
        $salt = $this->getToken(7);
        $salt_password = $password.$salt;
        $hased_password = hash('SHA512', $salt_password);
        $dataApplicant['password'] =$hased_password;
        $dataApplicant['salt'] =$salt; 
        $dataApplicant['system_ip'] = $_SERVER['SERVER_ADDR'];
        $sts= FALSE;
        $sts = $this->Dashboard_model->insert_ias_detail($dataApplicant);
            if($sts){
                echo"<script>alert('IAS Details Inserted succesfully..')</script>";
         
            }else{
                echo"<script>alert('Try Again.');</script>";
            }
                echo"<script>location.replace(document.referrer);</script>";
        } 
    // insert ias data end

    //---------------list IAS data start------------------------------- 

    public function list_IAS() 
    {
        $data['title']="E-Dairy";
        $data['ias_data'] = $this->Dashboard_model->list_ias_data();
        $this->render_view('list_ias', $data);
    }

    //---------------list IAS data end------------------------------- 

    //---------------Update IAS data Start------------------------------- 

    public function edit_ias() 
    {
        $data['title']="E-Dairy";
        if(isset($_GET['ias_id']) && !empty($_GET['ias_id']))
        {
          $iasid = $_GET['ias_id'];
          $data['iasdata'] = $this->Dashboard_model->all_ias_data($iasid);
        }
        $this->render_view('update_ias_officer', $data);
    }

    //---------------Update IAS data end------------------------------- 

}
