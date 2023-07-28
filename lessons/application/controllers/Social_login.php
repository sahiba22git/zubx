<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// Load facebook oauth library 
        $this->load->library('facebook');
        //load google login library
        $this->load->library('google');

		$this->load->model('login_register_model');
	}
	public function social_facebook_login(){
		/*---- Facebook Login Code ----*/
		if(isset($_GET['code'])){
			$userData = array();          
	        // Authenticate user with facebook 
	        if($this->facebook->is_authenticated()){ 
	            // Get user info from facebook 
	            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,picture'); 
	 
	            // Preparing data for database insertion 
	            $userData['oauth_provider'] = 'facebook'; 
	            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
	            $userData['name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'' or !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
	            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
	            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';

	            // Insert or update user data to the database 
	            $userID = $this->login_register_model->checkUser($userData); 
	            // Check user data insert or update status 
	            if(!empty($userID)){ 
	                $data['userData'] = $userData;          
	                $userdata = array(
						'userid'=>$userID,
						'name'=>$userData['first_name'].$userData['last_name'],
						'email'=>$userData['email'],
						'user_login'=>TRUE
					);
					$this->session->set_userdata($userdata);

	                // $this->session->set_userdata('userData', $userData);
	                $this->message->set_message('Login Successfully',1);
					redirect(base_url());
	            }else{ 
	               $data['userData'] = array();
	            }             
	        }
	        else{ 
	        }
	    }
	}

	public function social_google_login(){
		if(isset($_GET['code'])){
            // Authenticate user with google
            if($this->google->getAuthenticate()){
                // Get user info from google
                $gpInfo = $this->google->getUserInfo();

                // Preparing data for database insertion
                $userData['oauth_provider'] = 'google';
                $userData['oauth_uid']         = $gpInfo['id'];
                $userData['name']     = $gpInfo['given_name'] or $gpInfo['family_name'];
                $userData['email']             = $gpInfo['email'];
                $userData['picture']         = !empty($gpInfo['picture'])?$gpInfo['picture']:'';

                // Insert or update user data to the database
                $userID = $this->login_register_model->checkGoogleUser($userData);
                if(!empty($userID)){
                    $data['userData'] = $userData;
	                $userdata = array(
						'userid'=>$userID,
						'name'=>$userData['first_name'].$userData['last_name'],
						'email'=>$userData['email'],
						'user_login'=>TRUE
					);
					$this->session->set_userdata($userdata);
					$this->message->set_message('Login Successfully',1);
					redirect(base_url());
                }
                else{
                    $data['userData'] = array();
                }

                // Store the status and user profile info into session
                // $this->session->set_userdata('loggedIn', true);
                // $this->session->set_userdata('userData', $userData);

                // Redirect to profile page
                redirect('user_authentication/profile/');
            }
        }
	}
}

/* End of file Social_login.php */
/* Location: ./application/controllers/Social_login.php */