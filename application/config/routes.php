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
$route['default_controller'] = 'home';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;



//add new

$route['logout'] = 'login/logout';
$route['users/(:num)'] = 'users/index/$1'; //pagination users controller

$route['report-users'] = 'laporan/report_users'; //here function report menu: report->report users
$route['print-report-users'] = 'laporan/print_report_users'; //here for function print laporan

$route['report-computer'] = 'laporan/report_spec'; //here function report menu: report->report users
$route['print-report-spec'] = 'laporan/print_report_spec'; //here for function print computer_specification
$route['computers/(:num)'] = 'computers/index/$1';
$route['room/(:num)'] = 'room/index/$1';
// $route['listmaintenance/(:num)'] = 'listmaintenance/index/$1';  sengaja disable untuk memudahkan pagination

$route['schedule/(:num)'] = 'schedule/index/$1';
// $route['fieldwork/(:num)'] = 'fieldwork/index/$1'; //sengaja disable untuk memudahkan pagination

$route['computertypes/(:num)'] = 'computertypes/index/$1';
$route['locations/(:num)'] = 'locations/index/$1';
$route['problem/(:num)'] = 'problem/index/$1';
$route['jobprogram/(:num)'] = 'jobprogram/index/$1';

$route['asset_category/(:num)'] = 'asset_category/index/$1';
$route['asset_hardware/(:num)'] = 'asset_hardware/index/$1';
