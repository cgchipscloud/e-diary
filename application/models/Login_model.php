<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{    
    //-------Create constructor ------------//
    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }


    public function get_login($user_id, $password_md5)
    {
       
        $query = "SELECT au.office_user_id_generated, au.fullname, mur.user_role_id, mur.role_name
                    FROM user_login AS au 
                    JOIN master_user_role AS mur ON mur.user_role_id = au.fk_user_role_id
                    WHERE au.office_user_id_generated = '".$user_id."'  AND au.password = '".$password_md5."'";
        $result = $this->db->query($query);
        if($result->num_rows()>0)
        {
            $home_content['status']=TRUE;
            $home_content['data'] = $result->result_array();
        }
        else
        {
            $home_content['status']=FALSE;
        }

        return $home_content;
    }
}
?>