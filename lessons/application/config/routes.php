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

// $route['default_controller'] = "login";
$route['default_controller'] = "HomeController";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;

// Home
$route['(:num)'] = 'HomeController/index/$1';

// Course
$route['course'] = 'CourseController/all_course';
$route['course/(:num)'] = 'CourseController/all_course/$1';
$route['my-course'] = 'CourseController/my_course';

// Profile
$route['profile'] = 'ProfileController';

// Login
$route['login'] = 'LoginController';
$route['do-login'] = 'LoginController/do_login';
$route['logout'] = 'LoginController/logout';
$route['forgat-password'] = 'LoginController/forgat_password';
$route['reset-password'] = 'LoginController/reset_password';

// Register
$route['register'] = 'RegisterController';
$route['create-account'] = 'RegisterController/create_account';
$route['register/verify_user'] = 'RegisterController/verify_user';

// Course
$route['course-detail/(:num)'] = 'CourseController/index/$1';
$route['course-detail/(:num)/(:num)'] = 'CourseController/course_detail/$1/$2';
$route['add-detail'] = 'CourseController/add_details';

// Privacy Policy
$route['privacy-policy'] = 'PrivacypolicyController';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
