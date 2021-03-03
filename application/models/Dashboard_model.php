<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{    
    //-------Create constructor ------------//
    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    // ---------------------------get count dashboard  data----------------------------------

    public function counts_of_contact()
    {
        $sql ="SELECT count(id) as contacts FROM contact_details";
        $data = $this->db->query($sql)->row_array();
        //print_r($data);exit();
        return $data;

    }

    public function counts_of_department()
    {
        $sql ="SELECT COUNT(dept_id) as dept FROM mst_department";
        $data = $this->db->query($sql)->row_array();
        //print_r($data);exit();
        return $data;

    }

    public function counts_of_designation()
    {
        $sql ="SELECT COUNT(designation_id) as desig FROM mst_designation";
        $data = $this->db->query($sql)->row_array();
        //print_r($data);exit();
        return $data;

    }

    // ------------------------------department data show start-------------------
    public function list_department_data()
    {
        // $sql ="SELECT d.dept_id,d.order_id, d.fk_dept_category_id,mdept.category_name_eng, d.dept_name_en, 
        //        d.order_id, d.dept_name_hi FROM mst_department d
        //        LEFT JOIN mst_dept_category mdept on d.fk_dept_category_id=mdept.sequence ORDER BY d.order_id ASC";
        $sql="SELECT COUNT(c.name) as num,d.dept_id,d.order_id, d.fk_dept_category_id, mdept.category_name_eng,mdept.category_name_hin, d.dept_name_en, 
               d.order_id, d.dept_name_hi FROM mst_department d
               LEFT JOIN mst_dept_category mdept on d.fk_dept_category_id=mdept.sequence
               LEFT JOIN contact_details  c ON c.department_id= d.`dept_id`  GROUP BY d.dept_id ORDER BY d.order_id ASC";
        $data = $this->db->query($sql)->result_array();
        return $data;

    }
    // ------------------------------department data show end-------------------

    public function list_designation_data()
    {
        $sql ="SELECT des.designation_id,dep.dept_id,des.department_id,dep.dept_name_hi,dep.dept_name_en, des.designation_name_eng, des.designation_name_hindi,des.designation_name_eng FROM mst_designation des
            JOIN mst_department dep on dep.dept_id=des.department_id";

        // $sql="SELECT des.designation_id,dep.dept_id,dep.dept_name_hi,dep.dept_id, des.designation_name_eng, 
        //       des.designation_name_hindi 
        //         FROM mst_designation des
        //         JOIN mst_department dep on dep.dept_id=des.department_id
        //         WHERE dep.dept_id=1";
        $data = $this->db->query($sql)->result_array();
        return $data;

    }

    public function list_contact_data()
    {
        $sql ="SELECT cd.id, cd.name, cd.home_address, cd.office_address, cd.siting_address, cd.cont_personal_no,cd.cont_personal_no_two, cd.cont_fax, cd.cont_fax_two, cd.constituency, cd.designation_id ,mde.designation_name_hindi,mde.designation_name_eng, cd.department_id,md.dept_name_en, md.dept_name_hi, cd.cont_email, cd.cont_office_no,cd.cont_office_two, cd.nigam_city, cd.district, cd.pbx, cd.vidhansabha_contact 

          FROM contact_details cd
          INNER JOIN mst_designation mde ON cd.designation_id=mde.designation_id
          INNER JOIN mst_department md ON cd.department_id=md.dept_id ORDER BY department_id";
        $data = $this->db->query($sql)->result_array();
        return $data;
    }

    public function all_contact_data($user_id)
    {
        $sql ="SELECT cd.id, cd.name, cd.home_address, cd.office_address, cd.siting_address, cd.cont_personal_no,cd.cont_personal_no_two, cd.cont_fax, cd.cont_fax_two, cd.constituency, cd.designation_id ,mde.designation_name_hindi,mde.designation_name_eng, cd.department_id,md.dept_name_en, md.dept_name_hi, cd.cont_email, cd.cont_office_no,cd.cont_office_two, cd.nigam_city, cd.district, cd.pbx, cd.vidhansabha_contact 

        FROM contact_details cd
        INNER JOIN mst_designation mde ON cd.designation_id=mde.designation_id
        INNER JOIN mst_department md ON cd.department_id=md.dept_id where id= ?";
        $data = $this->db->query($sql,array($user_id))->row_array();
        return $data;
    }

    //-----------------------------insert department data------------------------------

    public function insert_department_detail($dataApplicant){
        //print_r($dataApplicant);exit();
        $this->db->trans_begin();  
        $parameters = array('fk_dept_category_id'=>$dataApplicant['fk_dept_category_id'],
                            'order_id'=>$dataApplicant['order_id'],
                             'dept_name_hi'=>$dataApplicant['dept_hindi_name'],
                             'dept_name_en'=>$dataApplicant['dept_eng_name'], 
                             'added_ip'=>$dataApplicant['system_ip'],
                             'is_active'=>$dataApplicant['is_active']);     
        $this->db->insert('mst_department', $parameters);
        $last_id = $this->db->insert_id();             
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }

    //-----------------------------insert designation data------------------------------


    public function insert_designation_detail($dataApplicant){
        $this->db->trans_begin();  
        $parameters = array('department_id'=>$dataApplicant['department_id'],
                             'designation_name_eng'=>$dataApplicant['designation_name_eng'],
                             'designation_name_hindi'=>$dataApplicant['designation_name_hindi'],
                             'added_ip'=>$dataApplicant['system_ip']
                             );     
        $this->db->insert('mst_designation', $parameters);
        $last_id = $this->db->insert_id();             
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }
//-----------------------------insert contact data------------------------------


    public function insert_contact_detail($dataApplicant){
        $this->db->trans_begin();

        $parameters = array('name'=>$dataApplicant['name'],
                             'home_address'=>$dataApplicant['home_address'],
                             'office_address'=>$dataApplicant['office_address'],
                             'siting_address'=>$dataApplicant['siting_address'],
                             'cont_personal_no'=>$dataApplicant['cont_personal_no'],
                             'cont_personal_no_two'=>$dataApplicant['cont_personal_no_two'],
                             'designation_id'=>$dataApplicant['designation_id'],
                             'department_id'=>$dataApplicant['department_id'],
                             'cont_email'=>$dataApplicant['cont_email'],
                             'cont_office_no'=>$dataApplicant['cont_office_no'],
                             'cont_office_two'=>$dataApplicant['cont_office_two'],
                             'cont_fax'=>$dataApplicant['cont_fax'],
                             'cont_fax_two'=>$dataApplicant['cont_fax_two']
                             );     
        $this->db->insert('contact_details', $parameters);
        $last_id = $this->db->insert_id();             
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }
// ---------------------------------------------------------------------------------

//-------------------------------------update contact details------------------------

    public function update_contact_detail($dataApplicant){
        //$this->insert_contact_detail_log($dataApplicant);
        $this->db->trans_begin();
        //print_r($dataApplicant);exit();
        
        $cid = $dataApplicant['id'];
        $parameters = array('name'=>$dataApplicant['name'],
                             'home_address'=>$dataApplicant['home_address'],
                             'office_address'=>$dataApplicant['office_address'],
                             'siting_address'=>$dataApplicant['siting_address'],
                             'cont_personal_no'=>$dataApplicant['cont_personal_no'],
                             'cont_personal_no_two'=>$dataApplicant['cont_personal_no_two'],
                             'designation_id'=>$dataApplicant['designation_id'],
                             'department_id'=>$dataApplicant['department_id'],
                             'cont_email'=>$dataApplicant['cont_email'],
                             'cont_office_no'=>$dataApplicant['cont_office_no'],
                             'cont_office_two'=>$dataApplicant['cont_office_two'],
                             'cont_fax'=>$dataApplicant['cont_fax'],
                             'cont_fax_two'=>$dataApplicant['cont_fax_two']
                             ); 
        $this->db->where('id', $cid);                        
        $this->db->update('contact_details', $parameters);
        $last_id = $this->db->insert_id();             
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }




    // ---------------------------------------get list -----------------------------

    public function get_department(){

        $getSql = "SELECT dept_id, dept_name_en,order_id, dept_name_hi FROM mst_department ORDER by order_id ASC";
        $data = $this->db->query($getSql)->result_array();
        return $data;
    }


    public function get_designation($dept_id){
        $getSql="SELECT designation_id,designation_name_eng, designation_name_hindi FROM mst_designation where department_id =".$dept_id;
        $data = $this->db->query($getSql)->result_array();
        return $data;
    }


    // ---------------Insert IAS Details Start-----------------------------------------------

    public function insert_ias_detail($dataApplicant){
        $this->db->trans_begin();

        $parameters = array('ias_id'=>$dataApplicant['ias_id'],
                             'ias_name_en'=>$dataApplicant['ias_name_en'],
                             'ias_name_hi'=>$dataApplicant['ias_name_hi'],
                             'email_id'=>$dataApplicant['email_id'],
                             'mobile_no'=>$dataApplicant['mobile_no'],
                             'post_address'=>$dataApplicant['post_address'],
                             'password'=>$dataApplicant['password'],
                             'salt'=>$dataApplicant['salt'],
                             'ip_address'=>$dataApplicant['system_ip']
                             );     
        $this->db->insert('ias_details', $parameters);
        $last_id = $this->db->insert_id();             
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }
     // ------------------Insert IAS Details End-----------------------------------------------

    //------------------------ list IAS Deatils start--------------------------------------------
    
    public function list_ias_data()
    {
        $sql ="SELECT id, ias_id, ias_name_en, ias_name_hi, email_id, post_address, mobile_no FROM ias_details";
        $data = $this->db->query($sql)->result_array();
        return $data;
    }

    public function all_ias_data($iasid)
    {
        $sql ="SELECT id, ias_id, ias_name_en, ias_name_hi, email_id, post_address, mobile_no FROM ias_details where ias_id= ?";
        $data = $this->db->query($sql,array($iasid))->row_array();
        //print_r($data);exit();
        return $data;
    }
    // ------------------------List IAS Details end----------------------------------------------


    // ------------------------Update IAS Details Start-------------------------------------------

    public function update_ias_detail($dataApplicant){
        $this->db->trans_begin();
        $sid = $dataApplicant['id'];
        $parameters = array('ias_name_en'=>$dataApplicant['ias_name_en'],
                             'ias_name_hi'=>$dataApplicant['ias_name_hi'],
                             'email_id'=>$dataApplicant['email_id'],
                             'mobile_no'=>$dataApplicant['mobile_no'],
                             'post_address'=>$dataApplicant['post_address']
                             ); 
        $this->db->where('id', $sid);                        
        $this->db->update('ias_details', $parameters);
        $last_id = $this->db->insert_id();         
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }


    // ------------------------Update IAS Details End-------------------------------
    
    // public function get_designation(){

    //     $getSql = "SELECT designation_id,designation_name_eng, designation_name_hindi FROM mst_designation";
    //     $data = $this->db->query($getSql)->result_array();
    //     return $data;
    // }

    // public function get_designation($dept_id){
    //     $getSql="SELECT designation_id,designation_name_eng,department_id, designation_name_hindi FROM mst_designation where department_id =".$dept_id;
    //     $data = $this->db->query($getSql)->result_array();
    //     return $data;
    // }


    //------------------insert department category data start------------------------------

    public function insert_department_category_detail($dataApplicant){
        $this->db->trans_begin();  
        $parameters = array('sequence'=>$dataApplicant['sequence'],
                            'order_id'=>$dataApplicant['order_id'],
                            'category_name_eng'=>$dataApplicant['category_name_eng'], 
                            'category_name_hin'=>$dataApplicant['category_name_hin']);     
        $this->db->insert('mst_dept_category', $parameters);
        $last_id = $this->db->insert_id();             
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }

    //-----------------------------insert department category data end------------------------------


    // -----------------------list department category start-----------------------

    public function get_department_category(){

        $getSql = "SELECT `category_id`, `category_name_eng`, `sequence`, `category_name_hin` FROM `mst_dept_category`";
        $data = $this->db->query($getSql)->result_array();
        return $data;
    }



    // -----------------------List Department category end-------------------------

    public function contact_dept_count(){
        
        $sql="SELECT COUNT(c.name) as number , md.`dept_id`, md.`order_id`, md.`dept_name_hi`, md.`dept_name_en`,md.fk_dept_category_id FROM mst_department md
            INNER JOIN contact_details c ON c.department_id= md.`dept_id` 

            GROUP BY c.department_id";
        $data=$this->db->query($sql)->result_array();
        return $data;
    }

    // -----------------------List Department start-------------------------
    
    public function all_dept_list($dept_id){

        $query = "SELECT d.dept_id, d.fk_dept_category_id,mdept.category_name_eng, d.dept_name_en, 
                    d.order_id, d.dept_name_hi FROM mst_department d
                 LEFT JOIN mst_dept_category mdept on d.fk_dept_category_id=mdept.sequence where d.dept_id=" .$dept_id;
         $data= $this->db->query($query,array($dept_id))->row_array();
         return $data;
   }

    // -----------------------List Department end-------------------------

   
   // -----------------------update department data start------------------

    public function update_department_detail($dataApplicant){
        $this->db->trans_begin();

        //print_r($dataApplicant);exit();
        $dept_id = $dataApplicant['dept_id'];
        $parameters = array('fk_dept_category_id'=>$dataApplicant['fk_dept_category_id'],
                             'dept_name_hi'=>$dataApplicant['dept_name_hi'],
                             'dept_name_en'=>$dataApplicant['dept_name_en'],
                             'added_ip'=>$dataApplicant['system_ip'],
                              'is_active'=>$dataApplicant['is_active']); 
        $this->db->where('dept_id', $dept_id);                        
        $this->db->update('mst_department', $parameters);
        $last_id = $this->db->insert_id();         
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }


   // ----------------------update department data end---------------------

    // --------------------insert contact details log start----------------

    // public function insert_contact_detail_log($dataApplicant){
    //     $this->db->trans_begin();

    //     $parameters = array('name'=>$dataApplicant['name'],
    //                          'home_address'=>$dataApplicant['home_address'],
    //                          'office_address'=>$dataApplicant['office_address'],
    //                          'siting_address'=>$dataApplicant['siting_address'],
    //                          'cont_personal_no'=>$dataApplicant['cont_personal_no'],
    //                          'cont_personal_no_two'=>$dataApplicant['cont_personal_no_two'],
    //                          'designation_id'=>$dataApplicant['designation_id'],
    //                          'department_id'=>$dataApplicant['department_id'],
    //                          'cont_email'=>$dataApplicant['cont_email'],
    //                          'cont_office_no'=>$dataApplicant['cont_office_no'],
    //                          'cont_office_two'=>$dataApplicant['cont_office_two'],
    //                          'cont_fax'=>$dataApplicant['cont_fax'],
    //                          'cont_fax_two'=>$dataApplicant['cont_fax_two'],

    //                          );     
    //     $this->db->insert('contact_details_log', $parameters);
    //     $last_id = $this->db->insert_id();             
    //     $sts = FALSE;
    //      if ($this->db->trans_status() === FALSE)
    //      {
    //          $this->db->trans_rollback();
    //      }
    //      else
    //      {
    //         $this->db->trans_commit();
    //         $sts = TRUE;
    //      }
    //      return $sts;
    // }

    // --------------------insert contact details log end------------------
// ----------------------list designation data--------------------------
       public function all_desig_list($designation_id){

            $query = "SELECT des.designation_id,dep.dept_id,des.department_id,dep.dept_name_hi,dep.dept_name_en, des.designation_name_eng, des.designation_name_hindi,des.designation_name_eng FROM mst_designation des
                JOIN mst_department dep on dep.dept_id=des.department_id where des.designation_id=" .$designation_id;
             $data= $this->db->query($query,array($designation_id))->row_array();
             return $data;
       }
   // ----------------------------------------------------------------------

    // -----------------------update deignation data start------------------

    public function update_designation_detail($dataApplicant){
        $this->db->trans_begin();

        //print_r($dataApplicant);exit();
        $designation_id = $dataApplicant['designation_id'];
         $parameters = array('department_id'=>$dataApplicant['department_id'],
                             'designation_name_eng'=>$dataApplicant['designation_name_eng'],
                             'designation_name_hindi'=>$dataApplicant['designation_name_hindi'],
                             'added_ip'=>$dataApplicant['system_ip']);
        $this->db->where('designation_id', $designation_id);                        
        $this->db->update('mst_designation', $parameters);
        $last_id = $this->db->insert_id();         
        $sts = FALSE;
         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
         }
         else
         {
            $this->db->trans_commit();
            $sts = TRUE;
         }
         return $sts;
    }


   // ----------------------update department data end---------------------


}
?>