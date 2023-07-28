<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login_register_model extends CI_Model {	

	public function login_process(){

		$return_data = $this->login();		

		if($return_data['status'] == 1){

			$return_data['response_status'] = 1;

			$return_data['response_msg'] = 'Login Successfully';

			$return_data['return_url'] = base_url();

		}

		else if($return_data['status'] == 2){

			$return_data['response_status'] = 0;

			$return_data['response_msg'] = 'Your Account is not Verify';

			$return_data['return_url'] = base_url('login');

		}

		else{

			$return_data['response_status'] = 0;

			$return_data['response_msg'] = 'Invalid Credentials';

			$return_data['return_url'] = base_url('login');

		}

		return $return_data;

	}



	public function login(){

		$return_data = array('status'=> 0);



		$this->db->where('email',$this->email);

		$this->db->where('roleId','3');

		$row = $this->db->get('tbl_users')->row_array();

		if(!empty($row)){

			if($row['is_active'] == 0){

				$return_data = array('status'=>2);

			}

			else if(password_verify($this->password,$row['password']) == true){

				$return_data = array('status'=>1);

				$this->setSession($row);

			}

		}

		return $return_data;

	}



	public function setSession($arr){

		$userdata = array(

			'userid'=>$arr['userId'],

			'name'=>$arr['name'],

			'email'=>$arr['email'],

			'user_login'=>TRUE

		);

		$this->session->set_userdata($userdata);

	}



	public function register_process(){

		$data = array(

			'token'=>random_string(35),

			'email'=>$this->email,

			'password'=>password_hash($this->password,PASSWORD_DEFAULT),

			'name'=>$this->name,

			'mobile'=>$this->phone,

			'roleId'=>'3',

			'createdDtm'=>date('Y-m-d H:i:s'),

		);

		$this->db->insert('tbl_users',$data);

		$id = $this->db->insert_id();

		if($id > 0){

			$this->db->where('userId',$id);

			$row = $this->db->get('tbl_users')->row_array();



			$emailcontent['email'] = $row['email'];

			$emailcontent['password'] = $row['password'];

			$emailcontent['link'] = base_url().'register/verify_user?token='.$row['token'];



			$mailBodyContent = $this->load->view('mailTemplates/registerVerify',$emailcontent,true);

			$this->cemail->do_mail($row['email'],null,null,'Verify Your Account',$mailBodyContent);


			$return_data['response_status'] = 1;

			$return_data['response_msg'] = 'Account has been create';

			$return_data['return_url'] = base_url('login');

		}

		else{

			$return_data['response_status'] = 0;

			$return_data['response_msg'] = 'Account has been not create';

			$return_data['return_url'] = base_url('register');

		}

		return $return_data;

	}



	public function check_email(){

		$this->db->where('email',$this->email);

		return $this->db->get('tbl_users')->row_array();

	}



	public function user_verify($token){

	    if(!empty($token)){

	        $return_data =  $this->get_user_by_token($token);

	        if($return_data['status'] == 1){

        		$data = array(

        			'is_active'=>'1'

        		);

        		$this->db->where('token',$token);

        		$res = $this->db->update('tbl_users',$data);

        		if($res > 0){

        			$return_data['response_status'] = 1;

        			$return_data['response_msg'] = 'Account Verify successfully';

        		}

        		else{

        			$return_data['response_status'] = 0;

        			$return_data['response_msg'] = 'Account not Verify';

        		}

        		$return_data['return_url'] = base_url('login');

	        }

	        else{

	            $return_data['response_status'] = 0;

				$return_data['response_msg'] = 'Something else wrong';

				$return_data['return_url'] = base_url('login');

	        }

	    }

	    else{

	        $return_data['response_status'] = 0;

			$return_data['response_msg'] = 'Something else wrong';

			$return_data['return_url'] = base_url('login');

	    }

	    return $return_data;

	}


	public function get_user_by_email($email){

		$this->db->where('email',$email);

		$this->db->where('roleId','3');

		return $this->db->get('tbl_users')->row_array();

	}



	public function reset_password(){

		if(!empty($this->token)){

			$return_data =  $this->get_user_by_token($this->token);

			if($return_data['status'] == 1){

				$data = array(

					'password'=> password_hash($this->password,PASSWORD_DEFAULT)

				);

				$this->db->where('token',$this->token);

				$res = $this->db->update('tbl_users',$data);

				if($res > 0){

					$return_data['response_status'] = 1;

					$return_data['response_msg'] = 'Password has been reset successfully';

				}

				else{

					$return_data['response_status'] = 0;

					$return_data['response_msg'] = 'Password not reset';

				}

			}

			else{

				$return_data['response_status'] = 0;

				$return_data['response_msg'] = 'Something else wrong';

			}

		}

		else{

			$return_data['response_status'] = 0;

			$return_data['response_msg'] = 'Something else wrong';
		}		
		$return_data['return_url'] = base_url('login');		
		return $return_data;

	}

	public function checkUser($userData = array()){
		if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select('*');
            $this->db->from('tbl_users');
            // $this->db->where(array('oauth_provider'=>$userData['oauth_provider'], 'oauth_uid'=>$userData['oauth_uid'], 'email'=>$userData['email']));
            $this->db->where('email',$userData['email']);
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();

            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();

                //update user data
                $userData['updatedDtm'] = date("Y-m-d H:i:s");
                $update = $this->db->update('tbl_users', $userData, array('userId' => $prevResult['userId']));
                
                //get user ID
                $userID = $prevResult['userId'];
            }else{
                //insert user data
                $userData['createdDtm']  = date("Y-m-d H:i:s");
                $userData['token'] = random_string(35);
                $userData['is_active'] = '1';
                $userData['roleId'] = '3';
                $insert = $this->db->insert('tbl_users', $userData);
                
                //get user ID
                $userID = $this->db->insert_id();
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
	}

	public function checkGoogleUser($data = array()){
		$this->db->select('*'); 
        $this->db->from('tbl_users'); 
         
        // $con = array( 
        //     'oauth_provider' => $data['oauth_provider'], 
        //     'oauth_uid' => $data['oauth_uid'] 
        // ); 
        $this->db->where('email',$data['email']); 
        $query = $this->db->get(); 
         
        $check = $query->num_rows();
        if($check > 0){ 
            // Get prev user data 
            $result = $query->row_array(); 
             
            // Update user data 
            $data['updatedDtm'] = date("Y-m-d H:i:s"); 
            $update = $this->db->update('tbl_users', $data, array('userId' => $result['userId'])); 
             
            // Get user ID 
            $userID = $result['userId']; 
        }else{ 
            // Insert user data 
            $data['createdDtm'] = date("Y-m-d H:i:s"); 
            $data['token'] = random_string(35);
            $data['is_active'] = '1';
            $data['roleId'] = '3';
            $insert = $this->db->insert('tbl_users', $data); 
             
            // Get user ID 
            $userID = $this->db->insert_id(); 
        } 
         
        // Return user ID 
        return $userID?$userID:false; 
	}

	public function get_user_by_token($token){

		$this->db->where('token',$token);

		$row = $this->db->get('tbl_users')->row_array();

		if($row > 0){

			$return_data = array('status' => 1);

		}

		else{

			$return_data = array('status' => 0);

		}

		return $return_data;

	}

}



/* End of file Login_register_model.php */

/* Location: ./application/models/Login_register_model.php */