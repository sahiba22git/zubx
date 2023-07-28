<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//-- check logged user

if (!function_exists('check_login_user')) {

    function check_login_user() {

        $CI = get_instance();

        if ($CI->session->userdata('user_login') != TRUE) {

            $CI->session->sess_destroy();

            redirect(base_url('login'));

        }

    }

}



if(!function_exists('is_login'))

{

    function is_login()

    {

        $CI =& get_instance();

        $id=isset($CI->session->userdata['userid'])?$CI->session->userdata['userid']:"";

        return ($id=="")?FALSE:TRUE;

    }

}

if(!function_exists('get_user_field')){
	function get_user_field($field){
		$CI =& get_instance();
		if(isset($CI->session->userdata['userid'])){
			$CI->db->where('userId',$CI->session->userdata['userid']);
			$CI->db->where('roleId','3');
			$row = $CI->db->get('tbl_users')->row_array();
			return $row[$field];
		};
	}
}


if(!function_exists('user_id'))

{

    function user_id()

    {

        $CI =& get_instance();

        $user_id=isset($CI->session->userdata['userid'])?$CI->session->userdata['userid']:"";

        return($user_id);

    }

}



if(!function_exists('user_name'))

{

    function name()

    {

        $CI =& get_instance();

        $user_name=isset($CI->session->userdata['name'])?$CI->session->userdata['name']:"";

        return($user_name);

    }

}





if(!function_exists('user_email'))

{

    function user_email()

    {

        $CI =& get_instance();

        $user_name=isset($CI->session->userdata['email'])?$CI->session->userdata['email']:"";

        return($user_name);

    }

}

