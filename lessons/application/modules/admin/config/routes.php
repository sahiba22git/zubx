<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/*
|--------------------------------------------------------------------------
| Remove the default route set by the module extensions
|--------------------------------------------------------------------------
|
| Normally by default this route is accepted:
|
| module/controller/method
|
| If you do not want to allow access via that route you should add:
|
| $route['module'] = "";
| $route['module/(:any)'] = "";
|
 */

$route['admin'] = "dashboard";

$route['user/listing'] = 'Admin/userlisting' ;
/*********** Quantity DEFINED ROUTES *******************/
 
 $route['admin/course/listing'] = 'Dashboard';
 $route['admin/course/courseForm'] = 'Dashboard/courseForm';
 $route['admin/course/courseForm/(:any)'] = 'Dashboard/courseForm/$1';
 $route['admin/course/addEditCourse'] = 'Dashboard/addEditCourse';
 $route['admin/course/deleteCourse/(:any)'] = 'Dashboard/deleteCourse/$1';
 $route['admin/course-status/(:num)/(:num)'] = 'Dashboard/add_course_status/$1/$2';
  
 $route['admin/approved'] = 'Dashboard/approved';
 
 
 $route['admin/part/listing'] = 'Dashboard/partlisting' ;
 $route['admin/part/partForm'] = 'Dashboard/partForm' ;
 $route['admin/part/partForm/(:any)'] = 'Dashboard/partForm/$1' ;
 $route['admin/part/addEditPart'] = 'Dashboard/addEditPart' ;
 $route['admin/part/deletePart/(:any)'] = 'Dashboard/deletePart/$1';

 $route['admin/sentence/listing'] = 'Dashboard/sentencelisting' ;
 $route['admin/sentence/sentenceForm'] = 'Dashboard/sentenceForm' ;
 $route['admin/sentence/sentenceForm/(:any)'] = 'Dashboard/sentenceForm/$1' ;
 $route['admin/sentence/addEditSentence'] = 'Dashboard/addEditSentence' ;
 $route['admin/sentence/deleteSentence/(:any)'] = 'Dashboard/deleteSentence/$1';

 
 $route['admin/keyword/listing'] = 'Dashboard/keywordlisting' ;
 $route['admin/keyword/keywordForm'] = 'Dashboard/keywordForm' ;
 $route['admin/keyword/keywordForm/(:any)'] = 'Dashboard/keywordForm/$1' ;
 $route['admin/keyword/addEditKeyword'] = 'Dashboard/addEditKeyword' ;

  ///////////////////////////////////////////////////////////////////////////
 $route['admin/distinventory/listing'] = 'Dashboard/inventoryundistrlisting' ;
 $route['admin/group_master/listing'] = 'Dashboard/grouplisting' ;
 $route['admin/group_master/group_masterForm'] = 'Dashboard/group_masterForm' ;
 $route['admin/group_master/group_masterForm/(:any)'] = 'Dashboard/group_masterForm/$1' ;
 $route['admin/group_master/addEditGroup'] = 'Dashboard/addEditGroup' ;
 $route['admin/group_master/deleteGroup/(:any)'] = 'Dashboard/deleteGroup/$1' ;

  $route['admin/farm/listing'] = 'Dashboard/farmlisting' ;
  $route['admin/farm/farmForm'] = 'Dashboard/farmForm' ;
  $route['admin/farm/farmForm/(:any)'] = 'Dashboard/farmForm/$1' ;
  $route['admin/farm/addEditFarm'] = 'Dashboard/addEditFarm' ;
  $route['admin/farm/deleteFarm/(:any)'] = 'Dashboard/deleteFarm/$1';
 
  $route['admin/itemDistribAutomatic'] = 'Dashboard/itemDistribAutomatic' ;
  $route['admin/delChallan'] = 'Dashboard/delChallan' ;
  
  $route['admin/createExcel'] = 'Dashboard/createExcel' ;

/*********** USER DEFINED ROUTES *******************/
$route['admin/front'] = 'Front/index';
$route['admin/loginMe_fe'] = 'Front/loginMe';
$route['admin/logout_fe'] = 'Front/logout_fe';
$route['admin/forgotPassword_fe'] = "Front/forgotPassword";
$route['admin/resetPasswordUser_fe'] = "Front/resetPasswordUser";
$route['admin/resetPasswordConfirmUser_fe'] = "Front/resetPasswordConfirmUser";
$route['admin/resetPasswordConfirmUser_fe/(:any)'] = "Front/resetPasswordConfirmUser/$1";
$route['admin/resetPasswordConfirmUser_fe/(:any)/(:any)'] = "Front/resetPasswordConfirmUser/$1/$2";
$route['admin/createPasswordUser_fe'] = "Front/createPasswordUser";
$route['admin/singup'] = "Front/singup";
$route['admin/registerUser'] = "Front/addNewUser";
$route['admin/courses'] = "Front/courses";

$route['admin/loginMe'] = 'login/loginMe';
$route['admin/dashboard'] = 'user';
$route['admin/logout'] = 'user/logout';
$route['admin/userListing'] = 'user/userListing';
$route['admin/userListing/(:num)'] = "user/userListing/$1";
$route['admin/addNew'] = "user/addNew";
$route['admin/addNewUser'] = "user/addNewUser";
$route['admin/editOld'] = "user/editOld";
$route['admin/editOld/(:num)'] = "user/editOld/$1";
$route['admin/editUser'] = "user/editUser";
$route['admin/deleteUser'] = "user/deleteUser";
$route['admin/activeUser'] = "user/activeUser";


$route['admin/activateuser/(:num)'] = "user/activateuser/$1";
$route['admin/deactivateuser/(:num)'] = "user/deactivateuser/$1";

$route['admin/profile'] = "user/profile";
$route['admin/profile/(:any)'] = "user/profile/$1";
$route['admin/profileUpdate'] = "user/profileUpdate";
$route['admin/profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['admin/loadChangePass'] = "user/loadChangePass";
$route['admin/changePassword'] = "user/changePassword";
$route['admin/changePassword/(:any)'] = "user/changePassword/$1";
$route['admin/pageNotFound'] = "user/pageNotFound";
$route['admin/checkEmailExists'] = "user/checkEmailExists";
$route['admin/login-history'] = "user/loginHistoy";
$route['admin/login-history/(:num)'] = "user/loginHistoy/$1";
$route['admin/login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['admin/forgotPassword'] = "login/forgotPassword";
$route['admin/resetPasswordUser'] = "login/resetPasswordUser";
$route['admin/resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['admin/resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['admin/resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['admin/createPasswordUser'] = "login/createPasswordUser";
/*
|--------------------------------------------------------------------------
| Routes to accept
|--------------------------------------------------------------------------
|
| Map all of your valid module routes here such as:
|
| $route['your/custom/route'] = "controller/method";
|
 */