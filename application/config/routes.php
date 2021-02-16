<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['(?i)ajax-desig-list'] = 'Dashboard/ajax_desig_list';

$route['(?i)Ediary-Login-Admin'] = 'Login/login';
$route['(?i)Ediary-Logout-Admin'] = 'Login/logout';

$route['(?i)Edairy-Home'] = 'Dashboard/index';

$route['(?i)Edairy-Department'] = 'Dashboard/departments';
$route['(?i)Ediary-Add-Department'] = 'Dashboard/add_departments';
$route['(?i)Ediary-Add-Designation'] = 'Dashboard/add_designation';
$route['(?i)Ediary-Add-Contacts'] = 'Dashboard/add_contact';
$route['(?i)Ediary-Add-IAS'] = 'Dashboard/add_ias_details';

// list report
$route['(?i)Ediary-List-Department'] = 'Dashboard/list_department';
$route['(?i)Ediary-List-Designation'] = 'Dashboard/list_designation';
$route['(?i)Ediary-List-Contacts'] = 'Dashboard/list_contact';
$route['(?i)Ediary-List-IAS'] = 'Dashboard/list_IAS';

// edit
$route['(?i)Ediary-Edit-Contacts'] = 'Dashboard/edit_contact';
$route['(?i)Ediary-Edit-IAS-Officer'] = 'Dashboard/edit_ias';



// update
$route['(?i)Ediary-Update-Contacts'] = 'Dashboard/update_contact_details';
$route['(?i)Ediary-Update-IAS-Details'] = 'Dashboard/update_ias_details';


// insert
$route['(?i)Ediary-Insert-Department'] = 'Dashboard/insert_department';
$route['(?i)Ediary-Insert-Designation'] = 'Dashboard/insert_designation';
$route['(?i)Ediary-Insert-Contacts'] = 'Dashboard/insert_contact_details';
$route['(?i)Ediary-Department-Designation-list'] = 'Dashboard/list_dept_desig';
$route['(?i)Ediary-Insert-IAS-Officer'] = 'Dashboard/insert_ias_details';


/* // API ROUTES SATRT */
$route['(?i)API-Test'] = 'Api_login/testing';
$route['(?i)API-check-IAS-ID'] = 'Api_login/checkIAS';

$route['(?i)API-send-otp'] = 'Api_login/sendOTP';

$route['(?i)API-login-Check'] = 'Api_login/checkUserData';





$route['(?i)Api-login'] = 'Api_login/Login';
/* -- API ROUTES END */

