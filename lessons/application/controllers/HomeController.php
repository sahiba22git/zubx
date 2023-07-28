<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class HomeController extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        check_login_user();
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index(){
        $data['pageTitle'] = 'Home';
        //$data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
        $total_records = $this->Common_model->get_total_course();
        $data['courses'] = $this->Common_model->get_all_course($limit_per_page, $start_index);
        $config['base_url'] = base_url();
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 1;
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
        $this->load->view("home/index", $data);
    }
}

?>