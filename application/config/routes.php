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

// list report
$route['(?i)Ediary-List-Department'] = 'Dashboard/list_department';
$route['(?i)Ediary-List-Designation'] = 'Dashboard/list_designation';
$route['(?i)Ediary-List-Contacts'] = 'Dashboard/list_contact';

// edit
$route['(?i)Ediary-Edit-Contacts'] = 'Dashboard/edit_contact';

// update
$route['(?i)Ediary-Update-Contacts'] = 'Dashboard/update_contact_details';


// insert
$route['(?i)Ediary-Insert-Department'] = 'Dashboard/insert_department';
$route['(?i)Ediary-Insert-Designation'] = 'Dashboard/insert_designation';
$route['(?i)Ediary-Insert-Contacts'] = 'Dashboard/insert_contact_details';
$route['(?i)Ediary-Department-Designation-list'] = 'Dashboard/list_dept_desig';


/* // API ROUTES SATRT */
$route['(?i)API-Test'] = 'Api_login/testing';

$route['(?i)Api-login'] = 'Api_login/Login';
/* -- API ROUTES END */

