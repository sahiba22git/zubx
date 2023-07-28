<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



/**

 * Class : LoginController (LoginController)

 * Login class to control to authenticate user credentials and starts user's session.

 * @author : Kishor Mali

 * @version : 1.1

 * @since : 15 November 2016

 */

class RegisterController extends CI_Controller

{

    public function __construct(){

        parent::__construct();

        $this->load->model('login_register_model');

    }



    public function index(){

       $this->load->view('register/index');

    }



    public function create_account(){

        $this->login_register_model->name = $this->input->post('name');

		$this->login_register_model->phone = $this->input->post('phone');

		$this->login_register_model->email = $this->input->post('email');

		$this->login_register_model->password = $this->input->post('password');



		$response = $this->login_register_model->check_email();

		if(!empty($response)){

			$this->message->set_message('This email is allready exits',0);

			redirect(base_url('register'));

		}

		else{

			$return_data = $this->login_register_model->register_process();

			$this->message->set_message($return_data['response_msg'],$return_data['response_status']);

			redirect($return_data['return_url']);

		}

    }

    public function verify_user(){
		$token = $this->input->get('token');
		$return_data = $this->login_register_model->user_verify($token);
		$this->message->set_message($return_data['response_msg'],$return_data['response_status']);
		redirect($return_data['return_url']);
	}
}



?>