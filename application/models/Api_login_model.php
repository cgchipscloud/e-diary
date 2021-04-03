<?php
	defined('BASEPATH') OR exit('No direct script access allowed');


class Api_login_model extends CI_Model
{    
    //-------Create constructor ------------//
    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    /*
        // Create Token Start
    */ 
    function getToken($length) {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }
    function crypto_rand_secure($min, $max) {
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
    /*
        -- Create Token End
    */ 

    /*
        // Check Token Start 
    */ 
    function check_token($token, $client_id) {
        $condition = " WHERE aat.access_token ="."'".$token."' AND " . "aat.client_id ="."'".$client_id."'";
        $raw_query = "select 
                        CASE 
                            WHEN (date(DATE_FORMAT(NOW(), '%Y-%m-%d')) > date(DATE_FORMAT(aat.expire, '%Y-%m-%d'))) THEN FALSE
                            WHEN aat.manual_expire = 'Y' THEN FALSE        
                            ELSE TRUE
                        END AS ExprireStatus
                        FROM mobile_access_token AS aat ".$condition;

        $query = $this->db->query($raw_query);
        $record = $query->row_array();
        return $record;
    }
    /*
        -- Check Token End 
    */

         /*
        // Login Method Start
    */ 
    public function sign_in($username, $password) {
        $query_salt = "SELECT uw.salt FROM ias_details AS uw
        WHERE uw.ias_id = '".$username."'";
        $get_salt = $this->db->query($query_salt);
        $get_salt = $get_salt->result_array();
        if (!empty($get_salt)) {
            $salt = $get_salt[0]['salt'];
            $salt_password = $password . $salt;
            $hased_password = hash('SHA512', $salt_password);
            //print_r($hased_password);exit();
            $condition = "WHERE uw.ias_id  = '" . $username . "' AND uw.password = '" . $hased_password . "'";
            $login_sql = "SELECT uw.id, uw.ias_id, uw.ias_name_en, uw.ias_name_hi, uw.email_id,uw.is_active, uw.post_address, uw.mobile_no
                          FROM ias_details AS uw
                           ". $condition ;
            $login_data = $this->db->query($login_sql);
            $login_data = $login_data->result_array();
            //print_r($login_data);exit();
                          
            if ($login_data>0) {
                if($login_data[0]['is_active'] == 1)
                {
                    $token = $this->getToken(64);
                    $user_id = $login_data[0]['ias_id'] ;
                    $generated_id = $login_data[0]['mobile_no'] ;
                    $create = date('Y-m-d');
                    $expire = date('Y-m-d', strtotime(date('Y-m-d'). ' + 15 days'));
                    $scope = null;
                    $local_datetime = date('Y-m-d H:i:s');            
                    $ipaddress = ipaddress();
                    $paramiters = array('access_token'=> $token, 'fk_user_id' => $user_id,'client_id'=>$generated_id,
                                    'create' => $create, 'expire'=>$expire, 'scope'=>$scope, 'local_datetime'=>$local_datetime,
                                    'ipaddress'=> $ipaddress);
                    $mobile_access_token = $this->db->insert('mobile_access_token', $paramiters);
                    if($mobile_access_token) {
                        $result_data['token'] = $token;
                    }
                    $result_data['status']=TRUE;
                    $result_data['data'] = $login_data;
                }
                else
                {
                    $result_data['status']=FALSE;
                    $result_data['message'] = "This is User is Not Activated";
                }
            } else 
            {
                $result_data['status']=FALSE;
                $result_data['message'] = "Username or Password Does Not Match";
            }
        } else {
            $result_data['status']=FALSE;
            $result_data['message'] = "User Doesn't Exists";
        }
        return $result_data;
    }
   
// ---------------------------------IAS ID Check start----------------------------------------
    public function api_user_id_check($ias_id) {
   
        $query = "SELECT COUNT(ias_id) AS ias_count,ias_id FROM ias_details WHERE ias_id = '".$ias_id."'";
            
        $result = $this->db->query($query);
    //echo $this->db->last_query();exit;
        $row = $result->result_array();
        return $row;
    }
// ---------------------------------IAS ID Check end----------------------------------------

// ---------------------IAS ID & Mobile Number Check Start----------------------------------------

    public function api_user_check($ias_id,$mobile) {
   
        $query = "SELECT COUNT(mobile_no) AS mcount,mobile_no,ias_id FROM ias_details WHERE ias_id = '".$ias_id."' AND mobile_no= '".$mobile."'";
            
        $result = $this->db->query($query);
    //echo $this->db->last_query();exit;
        $row = $result->result_array();
        return $row;
    }

// ---------------------IAS ID & Mobile Number Check End----------------------------------------


// ---------------------Mobile Number Insert Start----------------------------------------

    public function insert_mobile($user_ka_mobile,$ias_id) {
        
        $data=array('mobile'=>$user_ka_mobile,'ias_id'=> $ias_id);
        $result = $this->db->insert('mobile_otp_list', $data);

        if($result>0){
            $returnData['status'] = TRUE;
            $returnData['message'] = "Mobile Number Matched Successfully:- " . $user_ka_mobile;
            $returnData['mobile'] = $user_ka_mobile;
            $returnData['ias_id'] = $ias_id;
        }else {
            $returnData['status'] = FALSE;
            $returnData['message'] = "Mobile Number Could Not be Matched";
        }
        return $returnData;
    }
// ---------------------Mobile Number Insert End----------------------------------------


// ---------------------IAS ID & Mobile Number Insert Start----------------------------------------
    public function updatePerviousOTP($mobile_number, $ias_id){
        $sql = "UPDATE mobile_otp_list SET is_expired = 1 WHERE ias_id = $ias_id AND mobile = $mobile_number";
        $this->db->query($sql);
    }
    public function insert_mobile_otp($otp, $user_ka_mobile, $ias_id) {
        $this->updatePerviousOTP($user_ka_mobile, $ias_id);
        $sql = $this->db->select('mobile_no')->WHERE('ias_id',$ias_id)->from('ias_details');
        $res = $this->db->get()->result_array();
        if(!empty($res[0]['mobile_no'])){            
            $data=array('otp_number'=>$otp,'mobile'=>$user_ka_mobile,'ias_id'=> $ias_id);
            $result = $this->db->insert('mobile_otp_list', $data);
            if($result>0){
                sms($user_ka_mobile, "Your OTP to Login into CG-eDiary Mobile  APP is : " . $otp);
                $returnData['status'] = TRUE;
                $returnData['message'] = "OTP Sent Successfully to Mobile Number :- " . $user_ka_mobile;
                $returnData['otp'] = $otp;
                $returnData['mobile'] = $user_ka_mobile;
                $returnData['ias_id'] = $ias_id;
            }else {
                $returnData['status'] = FALSE;

                $returnData['message'] = "OTP Could Not be Sent";
            }
        }else {
            $res = $this->db->where('ias_id',$ias_id)->update('ias_details',array('mobile_no'=>$user_ka_mobile));
            //echo  $this->db->last_query();exit;
            if($res > 0){
                $data=array('otp_number'=>$otp,'mobile'=>$user_ka_mobile,'ias_id'=> $ias_id);
                $result = $this->db->insert('mobile_otp_list', $data);
                if($result>0){
                    sms($user_ka_mobile, "Your OTP to Login into CG-eDiary Mobile  APP is : " . $otp);
                    $returnData['status'] = TRUE;
                    $returnData['message'] = "OTP Sent Successfully to Mobile Number :- " . $user_ka_mobile;
                    $returnData['otp'] = $otp;
                    $returnData['mobile'] = $user_ka_mobile;
                    $returnData['ias_id'] = $ias_id;
                }else {
                    $returnData['status'] = FALSE;
                    $returnData['message'] = "OTP Could Not be Sent";
                }
            }else {
                $returnData['status'] = FALSE;
                $returnData['message'] = "Mobile Number Could Not be Added at this time";
            }
        }
        return $returnData;
    }
// ---------------------IAS ID & Mobile Number Insert End----------------------------------------

// ---------------------IAS ID & Mobile Number and OTP Check Start----------------------------------------

    public function api_user_mobile_otp_id($ias_id,$mobile,$otp) {
   
        $query = "SELECT mobile,ias_id,otp_number FROM mobile_otp_list WHERE ias_id = '".$ias_id."' AND mobile= '".$mobile."' AND otp_number= '".$otp."' AND is_expired = 0";       
        $result = $this->db->query($query);
        $row = $result->row_array();
        if(!empty($row)){
            $sql = "SELECT uw.id, uw.ias_id, uw.ias_name_en, uw.ias_name_hi, uw.email_id,uw.is_active, uw.post_address, uw.mobile_no
                          FROM ias_details AS uw where uw.ias_id ='".$ias_id."'
                           ";
                    $resultData = $this->db->query($sql);
                    $data = $resultData->result_array();
                    $token = $this->getToken(64);
                    //print_r($data);exit();
                    $returnData['status'] = TRUE;
                    $returnData['token'] = $token;
                    $returnData['otp_number'] = $otp;
                    $returnData['iasdata'] = $data;
                    $returnData['message'] = "Your Data Matched Successfully";
            $this->updatePerviousOTP($mobile, $ias_id);        
            }else {
                $returnData['status'] = FALSE;
                $returnData['message'] = "Your Data Could Not be Matched";
            }
        return $returnData;
    }

// ---------------------IAS ID & Mobile Number Check End----------------------------------------

// -----------------------List Contacts Start------------------------------------------


// -----------------------List Contacts End--------------------------------------------
public function getDeptCategoryList(){

    $sql="SELECT `category_id`, `category_name_eng`, `category_name_hin` FROM `mst_dept_category` ORDER by sequence";
    return $this->db->query($sql)->result_array();
}

public function getSubcategory($category_id){
   $parameter=array();
    $condition="";
    if ($category_id>0) {
        $condition=" WHERE category_id=? and is_visible=1";
        array_push($parameter, $category_id);        
    }
    $sql="SELECT id,category_id,sub_category_name_hi,sub_category_name_eng FROM `sub_category` $condition";
    return $this->db->query($sql,$parameter)->result_array(); 

}

public function getDeptList($subcategory_id){
    $parameter=array();
    $condition = "";
    if($subcategory_id>0){
        $condition = " WHERE fk_sub_category_id=?";
        array_push($parameter,$subcategory_id);   
    }
    $sql ="SELECT `dept_id`,fk_sub_category_id, `dept_name_hi`, `dept_name_en` FROM `mst_department` $condition ORDER BY order_id";
    return $this->db->query($sql,$parameter)->result_array();
}

public function getContacts($dept_id){
    $parameter=array();
    $condition="";
    if ($dept_id>0) {
        $condition="WHERE cd.department_id=?";
        array_push($parameter, $dept_id);        
    }
    $sql="SELECT cd.name, cd.home_address, cd.office_address, cd.siting_address, cd.cont_personal_no  ,cd.cont_fax,mde.designation_name_hindi,cd.cont_email, cd.cont_office_no
            FROM contact_details cd
            INNER JOIN mst_designation mde ON cd.designation_id=mde.designation_id $condition";
    return $this->db->query($sql,$parameter)->result_array();

}


public function getCompleteContactDetails(){
    $returnData=array();
    foreach ($this->getDeptCategoryList() as $cat)
    {
        $data=$cat;
        $subCategorys=$this->getSubcategory($cat["category_id"]);
        foreach ($subCategorys as $subcate) {
            $data1 = $subcate;
            $departments = $this->getDeptList($subcate["id"]);
            foreach ($departments as $department) {
                $data2 = $department;
                $data2['contacts'] = $this->getContacts($department["dept_id"]);
                array_push($data1, $data2);
            }
            array_push($data, $data1);
        }
        array_push($returnData, $data);
    }
   return $returnData;
}

// public function getCompleteContactDetails(){
//     $returnData=array();
//     foreach ($this->getDeptCategoryList() as $cat) {
//         $data=array();
//         $data["title"]=$cat["category_name_eng"];
//         $data["subTitles"]=array();
//             foreach ($this->getSubcategory($cat["category_id"]) as $subcat) {
//                 $cat_data=array();
//                 $cat_data["sub_category_name_hi"]=$subcat["sub_category_name_hi"];
//                 array_push($data["subTitles"],$cat_data);
                
//                 foreach ($this->getDeptList($subcat["id"]) as $dept) {
//                     $dept_data=array();
//                     $dept_data["dept_name_hi"]=$dept["dept_name_hi"];
//                     $dept_data["contacts"]=$this->getContacts($dept["dept_id"]);
//                     array_push($data["subTitles"],$dept_data);    
//                 }
//             }    
//         array_push($returnData, $data);
//     }
//     return $returnData;
// }

}
?>
