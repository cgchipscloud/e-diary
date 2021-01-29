<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['(?i)ajax-desig-list'] = 'Dashboard/ajax_desig_list';

$route['(?i)Login-Admin'] = 'Login/login';
$route['(?i)Logout-Admin'] = 'Login/logout';

$route['(?i)Edairy-Home'] = 'Dashboard/index';

$route['(?i)Edairy-Department'] = 'Dashboard/departments';
$route['(?i)Add-Department'] = 'Dashboard/add_departments';
$route['(?i)Add-Designation'] = 'Dashboard/add_designation';
$route['(?i)Add-Contacts'] = 'Dashboard/add_contact';

// list report
$route['(?i)List-Department'] = 'Dashboard/list_department';
$route['(?i)List-Designation'] = 'Dashboard/list_designation';
$route['(?i)List-Contacts'] = 'Dashboard/list_contact';

// edit
$route['(?i)Edit-Contacts'] = 'Dashboard/edit_contact';

// update
$route['(?i)Update-Contacts'] = 'Dashboard/update_contact_details';


// insert
$route['(?i)Insert-Department'] = 'Dashboard/insert_department';
$route['(?i)Insert-Designation'] = 'Dashboard/insert_designation';
$route['(?i)Insert-Contacts'] = 'Dashboard/insert_contact_details';
$route['(?i)Department-Designation-list'] = 'Dashboard/list_dept_desig';





