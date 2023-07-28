<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {
	public function get_all_course($limit, $start){
		$this->db->order_by('course_id','DESC');
		$this->db->limit($limit, $start);
		$row = $this->db->get('course_master')->result_array();
		return $row;
	}
	
	public function get_total_course(){
		return $this->db->count_all("course_master");
	}

	public function get_course_by_id($id){
		$this->db->where('course_id',$id);
		$row = $this->db->get('course_master')->row_array();
		return $row;
	}

	public function get_part_by_course_id($id){
		$this->db->where('course_id',$id);
		$row = $this->db->get('part_master')->row_array();
		return $row;
	}

	public function get_part_by_course_id_and_part_id($courseId,$partId){
		$this->db->where('part_id',$partId);
		$this->db->where('course_id',$courseId);
		$row = $this->db->get('part_master')->row_array();
		return $row;
	}

	public function get_all_part_by_course_id($id){
		$this->db->where('course_id',$id);
		$row = $this->db->get('part_master')->result_array();
		return $row;
	}

	public function get_prev_part_by_course_id($courseId){
		$this->db->where('course_id',$courseId);
		$row = $this->db->get('part_master')->row_array();
		if(!empty($row)){
			$this->db->where('part_id <',$row['part_id']);
			$this->db->where('course_id',$row['course_id']);
			$prevPart = $this->db->get('part_master')->row_array();
			return $prevPart;
		}
		else{
			return '';
		}
	}

	public function get_next_part_by_course_id($courseId){
		$this->db->where('course_id',$courseId);
		$row = $this->db->get('part_master')->row_array();
		if(!empty($row)){
			$this->db->where('part_id >',$row['part_id']);
			$this->db->where('course_id',$row['course_id']);
			$nextPart = $this->db->get('part_master')->row_array();
			return $nextPart;
		}
		else{
			return '';
		}
	}

	public function get_prev_part_by_course_and_part_id($courseId,$partId){
		$this->db->where('part_id',$partId);
		$this->db->where('course_id',$courseId);
		$row = $this->db->get('part_master')->row_array();

		$this->db->where('part_id <',$row['part_id']);
		$this->db->where('course_id',$row['course_id']);
		$prevPart = $this->db->get('part_master')->row_array();
		return $prevPart;
	}

	public function get_next_part_by_course_and_part_id($courseId,$partId){
		$this->db->where('part_id',$partId);
		$this->db->where('course_id',$courseId);
		$row = $this->db->get('part_master')->row_array();

		$this->db->where('part_id >',$row['part_id']);
		$this->db->where('course_id',$row['course_id']);
		$nextPart = $this->db->get('part_master')->row_array();
		return $nextPart;
	}

	public function add_details(){
		$data = array(
			'userid'=>user_id(),
			'courseid'=>$this->course_id,
			'trasaction_id'=>$this->trasaction_id,
			'date'=>date('Y-m-d H:i:s')
		);
		$this->db->insert('user_detail_tbl',$data);
		$id = $this->db->insert_id();
		if($id > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'your request is submitted successfully, we will get back to you within 24 hours.';
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'form not submit';
		}
		$return_data['return_url'] = base_url('course-detail/'.$this->course_id);
		return $return_data;
	}
	
	public function get_my_course(){
	    $this->db->select('user_detail_tbl.courseid,course_master.*');
	    $this->db->where('user_detail_tbl.userid',user_id());
	    $this->db->where('user_detail_tbl.status','1');
	    $this->db->from('user_detail_tbl');
	    $this->db->join('course_master','course_master.course_id = user_detail_tbl.courseid');
	    $row = $this->db->get()->result_array();
	    return $row;
	}
	
	public function get_keyword_by_partid($partId){
	    $this->db->where('part_id',$partId);
	    $this->db->order_by('keyword_id','DESC');
	    $row = $this->db->get('keyword_master')->result_array();
	    return $row;
	}
	
	public function get_sentence_by_partid($partId){
	    $this->db->where('part_id',$partId);
	    $this->db->order_by('sentence_id','DESC');
	    $row = $this->db->get('sentence_master')->result_array();
	    return $row;
	}
}