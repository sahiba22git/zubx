<?php if(!defined('BASEPATH')) exit('No direct script access allowed');





/**

 * This function is used to print the content of any data

 */

function pre($data)

{

    echo "<pre>";

    print_r($data);

    echo "</pre>";

}



/**

 * This function used to get the CI instance

 */

if(!function_exists('get_instance'))

{

    function get_instance()

    {

        $CI = &get_instance();

    }

}



/**

 * This function used to generate the hashed password

 * @param {string} $plainPassword : This is plain text password

 */

if(!function_exists('getHashedPassword'))

{

    function getHashedPassword($plainPassword)

    {

        return password_hash($plainPassword, PASSWORD_DEFAULT);

    }

}



/**

 * This function used to generate the hashed password

 * @param {string} $plainPassword : This is plain text password

 * @param {string} $hashedPassword : This is hashed password

 */

if(!function_exists('verifyHashedPassword'))

{

    function verifyHashedPassword($plainPassword, $hashedPassword)

    {

        return password_verify($plainPassword, $hashedPassword) ? true : false;

    }

}



/**

 * This method used to get current browser agent

 */

if(!function_exists('getBrowserAgent'))

{

    function getBrowserAgent()

    {

        $CI = get_instance();

        $CI->load->library('user_agent');



        $agent = '';



        if ($CI->agent->is_browser())

        {

            $agent = $CI->agent->browser().' '.$CI->agent->version();

        }

        else if ($CI->agent->is_robot())

        {

            $agent = $CI->agent->robot();

        }

        else if ($CI->agent->is_mobile())

        {

            $agent = $CI->agent->mobile();

        }

        else

        {

            $agent = 'Unidentified User Agent';

        }



        return $agent;

    }

}



if(!function_exists('setProtocol'))

{

    function setProtocol()

    {

        $CI = &get_instance();

                    

        $CI->load->library('email');

        

        $config['protocol'] = PROTOCOL;

        $config['mailpath'] = MAIL_PATH;

        $config['smtp_host'] = SMTP_HOST;

        $config['smtp_port'] = SMTP_PORT;

        $config['smtp_user'] = SMTP_USER;

        $config['smtp_pass'] = SMTP_PASS;

        $config['charset'] = "utf-8";

        $config['mailtype'] = "html";

        $config['newline'] = "\r\n";

        

        $CI->email->initialize($config);

        

        return $CI;

    }

}



if(!function_exists('emailConfig'))

{

    function emailConfig()

    {

        $CI->load->library('email');

        $config['protocol'] = PROTOCOL;

        $config['smtp_host'] = SMTP_HOST;

        $config['smtp_port'] = SMTP_PORT;

        $config['mailpath'] = MAIL_PATH;

        $config['charset'] = 'UTF-8';

        $config['mailtype'] = "html";

        $config['newline'] = "\r\n";

        $config['wordwrap'] = TRUE;

    }

}



if(!function_exists('resetPasswordEmail'))

{

    function resetPasswordEmail($detail)

    {

        $data["data"] = $detail;

        // pre($detail);

        // die;

        

        $CI = setProtocol();        

        

        $CI->email->from(EMAIL_FROM, FROM_NAME);

        $CI->email->subject("Reset Password");

        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));

        $CI->email->to($detail["email"]);

        $status = $CI->email->send();

        

        return $status;

    }

}



if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}

if(!function_exists('add_part_view')){
    function add_part_view($courseId,$partId){
        $CI = get_instance();
        $CI->db->where('userid',user_id());
        $CI->db->where('partid',$partId);
        $row = $CI->db->get('part_view_tbl')->row_array();
        if(empty($row)){
            $data = array(
                'userid'=>user_id(),
                'partid'=>$partId,
                'courseId'=>$courseId,
                'date'=>date('Y-m-d H:i:s')
            );
            $CI->db->insert('part_view_tbl',$data);
        }
    }
}

if(!function_exists('get_part_view_percantage')){
    function get_part_view_percantage($courseId){
        $CI = get_instance();
        $CI->db->where('course_id',$courseId);
        $totalPart = $CI->db->get('part_master')->num_rows();
        
        $CI->db->where('userid',user_id());
        $CI->db->where('courseId',$courseId);
        $viewPart = $CI->db->get('part_view_tbl')->num_rows();
        if($viewPart > 0){
            $b = ($totalPart - $viewPart) / $totalPart * 100;
            return 100 - $b;
        }
        else{
            return 0;
        }
    }
}

if(!function_exists('check_course_detail_status')){
    function check_course_detail_status($courseId){
        $CI = get_instance();
        $CI->db->where('userid',user_id());
        $CI->db->where('courseid',$courseId);
        $row = $CI->db->get('user_detail_tbl')->row_array();
        if(!empty($row)){
            if($row['status'] == 0){
                return 'PENDING';
            }
            else if($row['status'] == 1){
                return 'APPROVED';
            }
            else{
                return 'DISAPPROVED';
            }
        }
        else{
            return FALSE;
        }
    }
}

?>