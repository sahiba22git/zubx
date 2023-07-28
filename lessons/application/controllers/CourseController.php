<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class CourseController extends BaseController
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
    public function index($id){
        $data['pageTitle'] = 'Course';
        $data['course'] = $this->Common_model->get_course_by_id($id);
        $data['part'] = $this->Common_model->get_part_by_course_id($id);
        $data['parts'] = $this->Common_model->get_all_part_by_course_id($id);
        $data['prev_part'] = $this->Common_model->get_prev_part_by_course_id($id);
        $data['next_part'] = $this->Common_model->get_next_part_by_course_id($id);
        if(!empty($data['part']['part_id'])){
            add_part_view($id,$data['part']['part_id']);
            $data['keywords'] = $this->Common_model->get_keyword_by_partid($data['part']['part_id']);
            $data['sentences'] = $this->Common_model->get_sentence_by_partid($data['part']['part_id']);
        }
        $data['part_list'] = TRUE;
        if(!empty($data['part'])){
            $data['part_active'] = $data['part']['part_id'];
        }
        else{
            $data['part_active'] = '';
        }
        $this->load->view("course/index", $data);
    }
    
    public function all_course(){
        $this->load->library('pagination');
        $data['pageTitle'] = 'Course';
        //$data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $total_records = $this->Common_model->get_total_course();
        $data['courses'] = $this->Common_model->get_all_course($limit_per_page, $start_index);
        $config['base_url'] = base_url('course');
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 2;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
         
        $config['first_link'] = '<<';
        $config['first_tag_open'] = '<li class="page-item"><a href="">';
        $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = '>>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
         
        $config['next_link'] = '>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active">';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
         
        // build paging links
        $data["links"] = $this->pagination->create_links();
        $this->load->view("course/all-course", $data);
    }

    public function course_detail($courseId,$partId){
        $data['pageTitle'] = 'Course';
        $data['course'] = $this->Common_model->get_course_by_id($courseId);
        $data['part'] = $this->Common_model->get_part_by_course_id_and_part_id($courseId,$partId);
        $data['parts'] = $this->Common_model->get_all_part_by_course_id($courseId);
        $data['prev_part'] = $this->Common_model->get_prev_part_by_course_and_part_id($courseId,$partId);
        $data['next_part'] = $this->Common_model->get_next_part_by_course_and_part_id($courseId,$partId);
        $data['keywords'] = $this->Common_model->get_keyword_by_partid($partId);
        $data['sentences'] = $this->Common_model->get_sentence_by_partid($partId);
        add_part_view($courseId,$partId);
        $data['part_list'] = TRUE;
        $data['part_active'] = $partId;
        $this->load->view("course/course-detail", $data);
    }

    public function add_details(){
        $this->Common_model->course_id = $this->input->post('course_id');
        $this->Common_model->trasaction_id = $this->input->post('trasaction_id');
        $return_data = $this->Common_model->add_details();
        $this->message->set_message($return_data['response_msg'],$return_data['response_status']);
        redirect($return_data['return_url']);
    }
    
    public function my_course(){
        $data['pageTitle'] = 'My Course';
        $data['mycourses'] = $this->Common_model->get_my_course();
        $this->load->view("course/my-course", $data);
    }
}

?>