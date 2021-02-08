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
        WHERE uw.mobile_no = '".$username."'";
        $get_salt = $this->db->query($query_salt);
        $get_salt = $get_salt->result_array();
        if (!empty($get_salt)) {
            $salt = $get_salt[0]['salt'];
            $salt_password = $password . $salt;


            /*SELECT `id`, `ias_id`, `ias_name_en`, `ias_name_hi`, `email_id`, `post_address`, `mobile_no`, `password`, `create_by`, `update_by`, `create_datetime`, `update_datetime`, `ip_address` FROM `ias_details` WHERE 1*/

            $hased_password = hash('SHA512', $salt_password);
            //print_r($hased_password);exit();
            $condition = "WHERE uw.mobile_no  = '" . $username . "' AND uw.password = '" . $hased_password . "'";
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
    /*
        -- Login Method End
    */ 



}
?>
