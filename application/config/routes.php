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
$route['default_controller'] = 'FrontendController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Frontend Routes*/
$route['website-review-form'] = 'WebsiteReviewController/index';
$route['report/(:any)/(:any)'] = 'WebsiteReviewController/report/$1/$2';
$route['priority-type/(:any)'] = 'WebsiteReviewController/getPriorityType/$1';

$route['edit-report/(:any)'] = 'EditReportController/index/$1';

/*Backend Routes*/
$route['admin'] = 'BackendController/index';
$route['run'] = 'WebsiteReviewController/run';
$route['scrape'] = 'WebsiteReviewController/scrape';
$route['save'] = 'WebsiteReviewController/save';

/*Point Check Master*/
$route['admin/point-check-master'] = 'PointCheckMasterController/index';
$route['admin/point-check-master/add'] = 'PointCheckMasterController/add';
$route['admin/point-check-master/edit/(:any)'] = 'PointCheckMasterController/edit/$1';
$route['admin/point-check-master/update/(:any)'] = 'PointCheckMasterController/update/$1';
$route['admin/point-check-master/store'] = 'PointCheckMasterController/store';

$route['admin/template-php'] = 'TemplateReport/index';

$route['news/chart'] = 'news/chart';
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
