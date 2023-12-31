<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class ProfileController extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        check_login_user();
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $data['pageTitle'] = 'Profile';
        $this->load->view("profile/index", $data);
    }
}

?>