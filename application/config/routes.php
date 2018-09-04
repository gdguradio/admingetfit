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
$route['default_controller'] = 'welcome';
$route['Login'] = 'login/login';

//branch routes
$route['MainGymInformation/(:any)'] = 'registerbranch/MainGymInformation/$1';
$route['FranchiseGymInformation/(:any)'] = 'registerbranch/FranchiseGymInformation/$1';

//user routes
$route['UserProfile/(:any)'] = 'registeruser/UserProfile/$1';
$route['MainUserInformation/(:any)'] = 'registeruser/MainUserInformation/$1';
$route['FranchiseUserInformation/(:any)'] = 'registeruser/FranchiseUserInformation/$1';

// master data routes
$route['MasterDataAdminImageGallery/(:any)'] = 'masterdata/MasterDataAdminImageGallery/$1';
$route['MasterDataTrainingImage/(:any)'] = 'masterdata/MasterDataTrainingImage/$1';
$route['MasterDataTrainingVideo/(:any)'] = 'masterdata/MasterDataTrainingVideo/$1';
$route['MasterDataBulletinBoard/(:any)'] = 'masterdata/MasterDataBulletinBoard/$1';
$route['MasterDataRole/(:any)'] = 'masterdata/MasterDataRole/$1';
$route['MasterDataMenu/(:any)'] = 'masterdata/MasterDataMenu/$1';
$route['MasterDataPosition/(:any)'] = 'masterdata/MasterDataPosition/$1';
$route['MasterDataSubMenu/(:any)'] = 'masterdata/MasterDataSubMenu/$1';
$route['MasterDataScreen/(:any)'] = 'masterdata/MasterDataScreen/$1';
$route['MasterDataGymPhase/(:any)'] = 'masterdata/MasterDataGymPhase/$1';
$route['MasterDataSubGymPhase/(:any)'] = 'masterdata/MasterDataSubGymPhase/$1';

//gym
$route['GymContent'] = 'gym/GymContent/index';
$route['ShowGymPhases'] = 'gym/ShowGymPhases/index';

// $route['login'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// $route['login'] = 'login/index';
// $route['login/(:any)'] = 'login/$1';