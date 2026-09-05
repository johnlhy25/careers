<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//------------------Landing Page------------------------------
    $route['default_controller'] = 'pages/careers';
//------------------Landing Page------------------------------

        //Job Portal
            $route['get_vacant_position_open'] = 'pages/get_vacant_position_open';
            $route['save_forme1'] = 'pages/save_forme1';
            $route['save_forme2'] = 'pages/save_forme2';
            $route['save_forme3'] = 'pages/save_forme3';
            $route['save_forme4'] = 'pages/save_forme4';
            $route['save_forme5'] = 'pages/save_forme5';
            $route['save_forme6'] = 'pages/save_forme6';
            $route['save_forme7'] = 'pages/save_forme7';
            $route['save_forme8'] = 'pages/save_forme8';
            $route['save_forme9'] = 'pages/save_forme9';
            $route['save_forme10'] = 'pages/save_forme10';

            $route['view-document/(:any)/(:any)']      = 'pages/view_document/$1/$2';

            $route['view_applicants/(:any)'] = 'pages/view_applicants/$1';
            $route['get_applicants/(:any)'] = 'pages/get_applicants/$1';
            $route['search_form_applicant'] = 'pages/search_form_applicant';
            $route['send_email'] = 'pages/send_email';
            $route['step1/education-eligibility/(:any)'] = 'pages/education_eligibility/$1';
            $route['step2/work-experience/(:any)'] = 'pages/work_experience/$1';
            $route['step3/relevant-training/(:any)'] = 'pages/relevant_training/$1';
            $route['step4/special-acts-form/(:any)'] = 'pages/special_acts_form/$1';
            $route['step5/pds-wes/(:any)'] = 'pages/pds_wes/$1';
            $route['step6/references/(:any)'] = 'pages/references/$1';
            $route['step7/awards-related-to-performance/(:any)'] = 'pages/awards/$1';
           
            
        //Job Portal

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;





