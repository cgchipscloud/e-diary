<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['(?i)ajax-desig-list'] = 'Dashboard/ajax_desig_list';
$route['(?i)ajax-subcategory-list']='Dashboard/ajax_subcategory_list';
$route['(?i)ajax-department-list']='Dashboard/ajax_department_list';

$route['(?i)Ediary-Login-Admin'] = 'Login/login';
$route['(?i)Ediary-Logout-Admin'] = 'Login/logout';

$route['(?i)Edairy-Home'] = 'Dashboard/index';

$route['(?i)Edairy-Department'] = 'Dashboard/departments';
$route['(?i)Ediary-Add-Department'] = 'Dashboard/add_departments';
$route['(?i)Ediary-Add-Designation'] = 'Dashboard/add_designation';
$route['(?i)Ediary-Add-Contacts'] = 'Dashboard/add_contact';
$route['(?i)Ediary-Add-IAS'] = 'Dashboard/add_ias_details';
$route['(?i)Ediary-Add-Daepartment-Category'] = 'Dashboard/add_departments_category';



// list report
$route['(?i)Ediary-List-Department'] = 'Dashboard/list_department';
$route['(?i)Ediary-List-Designation'] = 'Dashboard/list_designation';
$route['(?i)Ediary-List-Contacts'] = 'Dashboard/list_contact';
$route['(?i)Ediary-List-IAS'] = 'Dashboard/list_IAS';
$route['(?i)Ediary-List-Department-Category'] = 'Dashboard/list_departments_category';


// edit
$route['(?i)Ediary-Edit-Contacts'] = 'Dashboard/edit_contact';
$route['(?i)Ediary-Edit-IAS-Officer'] = 'Dashboard/edit_ias';
$route['(?i)Ediary-Edit-department'] = 'Dashboard/edit_department';
$route['(?i)Ediary-Edit-designation'] = 'Dashboard/edit_designation';





// update
$route['(?i)Ediary-Update-Contacts'] = 'Dashboard/update_contact_details';
$route['(?i)Ediary-Update-IAS-Details'] = 'Dashboard/update_ias_details';
$route['(?i)Ediary-Update-department'] = 'Dashboard/update_deaprtment_details';
$route['(?i)Ediary-Update-designation'] = 'Dashboard/update_designation_details';



// insert
$route['(?i)Ediary-Insert-Department'] = 'Dashboard/insert_department';
$route['(?i)Ediary-Insert-Designation'] = 'Dashboard/insert_designation';
$route['(?i)Ediary-Insert-Contacts'] = 'Dashboard/insert_contact_details';
$route['(?i)Ediary-Department-Designation-list'] = 'Dashboard/list_dept_desig';
$route['(?i)Ediary-Insert-IAS-Officer'] = 'Dashboard/insert_ias_details';
$route['(?i)Ediary-Insert-Department-Category'] = 'Dashboard/insert_add_departments_category';


/* // API ROUTES SATRT */
$route['(?i)API-Test'] = 'Api_login/testing';
$route['(?i)API-check-IAS-ID'] = 'Api_login/checkIAS';

$route['(?i)API-send-otp'] = 'Api_login/sendOTP';

$route['(?i)API-login-Check'] = 'Api_login/checkUserData';

$route['(?i)API-contact-Details']='Api_login/Contacts';

$route['(?i)API-contact']='Api_login/Contactsdetails';





$route['(?i)Api-login'] = 'Api_login/Login';
/* -- API ROUTES END */

