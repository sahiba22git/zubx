<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



/**

 * Class : LoginController (LoginController)

 * Login class to control to authenticate user credentials and starts user's session.

 * @author : Kishor Mali

 * @version : 1.1

 * @since : 15 November 2016

 */

class LoginController extends CI_Controller

{



    public function __construct(){

        parent::__construct();
        // Load facebook oauth library 
        $this->load->library('facebook');
        //load google login library
        $this->load->library('google');
        $this->load->model('login_register_model');

    }



    public function index(){

       if(is_login() != TRUE){			
            $data['authURL'] =  $this->facebook->login_url();
            $data['googleloginURL'] = $this->google->loginURL();
            $this->load->view('login/index',$data);

        }

        else{

            redirect(base_url());

        }

    }



    public function do_login(){

        $this->login_register_model->email = $this->input->post('email');

        $this->login_register_model->password = $this->input->post('password');

        $return_data = $this->login_register_model->login_process();

        $this->message->set_message($return_data['response_msg'],$return_data['response_status']);

        redirect($return_data['return_url']);

    }



    public function logout(){
        // Remove local Facebook session 
        $this->facebook->destroy_session(); 
        // Remove user data from session 
        // Reset OAuth access token 
        $this->google->revokeToken();
        $this->session->sess_destroy();
		$userdata = array('userid'=>'','name'=>'','email'=>'','user_login'=>FALSE);
		$this->session->set_userdata($userdata);
		$this->message->set_message('Logout Successfully',1);
		redirect(base_url('login'));
	}



    public function forgat_password(){

        $email = $this->input->post('email');

        $return_data = $this->login_register_model->get_user_by_email($email);

        if($return_data > 0){

            $emailcontent['name'] = $return_data['name'];

            $emailcontent['link'] = base_url('reset-password?token=').$return_data['token'];

            $mailBodyContent = $this->load->view('mailTemplates/lostPassword',$emailcontent,true);

            $this->cemail->do_mail($return_data['email'],null,null,'Reset Password',$mailBodyContent);

            $return_data['response_status'] = 1;

            $return_data['response_msg'] = 'Password reset link has been sent your email';

        }

        else{

            $return_data['response_status'] = 0;

            $return_data['response_msg'] = 'This Email is not register';

        }

        

        $this->message->set_message($return_data['response_msg'],$return_data['response_status']);

        redirect(base_url('login'));

    }

    public function reset_password(){
        $data['token'] = $this->input->get_post('token');
        $this->load->view('login/reset_password',$data);
    }

    public function password_reset(){
		$this->login_register_model->token = $this->input->post('token');
		$this->login_register_model->password = $this->input->post('password');
		$return_data =  $this->login_register_model->reset_password();
		$this->message->set_message($return_data['response_msg'],$return_data['response_status']);
		redirect($return_data['return_url']);
	}
}



?>