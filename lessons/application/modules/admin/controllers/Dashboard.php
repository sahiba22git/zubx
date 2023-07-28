<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Dashboard extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->isLoggedIn();
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'courses';        
		
		$data['courserecords'] 	=	$this->Admin_model->getCourse() ;
		$data['details'] 	=	$this->Admin_model->get_all_details() ;
		$this->loadViews("admin/admin/course", $this->global, $data, NULL);
       
    }
    
	function userlisting(){
		
		$this->global['pageTitle'] = 'Users';
        
		$data['userrecords'] 	=	$this->Admin_model->getUsers() ;
		//echo "<pre>"; print_r($data) ; die;
		$this->loadViews("admin/admin/users", $this->global, $data, NULL);
	
	}
	

	
	public function CourseForm( $qty_id = NULL ){
		
		$this->global['pageTitle'] = 'Course Add / Edit' ;
		
		    if($qty_id == null)
            {
                $this->loadViews("admin/admin/courseForm", $this->global, NULL, NULL);
            }
			else{
				
				$data['qtyrecord'] 	=	$this->Admin_model->getCourseById( $qty_id ) ;
				 
				$this->loadViews("admin/admin/courseForm", $this->global , $data, NULL);
			}
    }
	
	
	function addEditCourse(){
		
		$this->global['pageTitle'] = 'Course: Add / Edit';
		
			$this->load->library('form_validation');
            
            $this->form_validation->set_rules('qt_name','Course Name','trim|required|max_length[128]');
            //$this->form_validation->set_rules('qt_desc','Course Description','trim|required');
        
            // if($this->form_validation->run() == FALSE)
            // {
			// 	 $this->CourseForm( );
				
			// }
			// else{	
				if($this->input->post('qt_id') != null){
					$courseId = $this->input->post('qt_id');
					$row = $this->Admin_model->get_course_by_id($courseId);
					if(!empty($_FILES['file']['name'])){
						$folderName = date('d-m-Y');
						if (!is_dir('assets/frontend/course/'.$folderName)) {
							mkdir('assets/frontend/course/' . $folderName, 0777, TRUE);
						}
						$str = random_string(5);
						$name = date('d-m-Y').$str;
						$config['upload_path'] = './assets/frontend/course/'.$folderName.'/';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						//$config['max_size'] = 100000;
						$config['file_name'] = $name;
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload('file')){
							echo $this->upload->display_errors();
						}
						else{
							$img =  $this->upload->data('file_name');
							$image = $folderName.'/'.$img;
						}
					}
					else{
						$image = $row['image'];
					}
					$qtyInfo = array('course_name' => $this->input->post('qt_name'),'image' => $image,'description' => $this->input->post('desc'),) ;
					$result = $this->Admin_model->editCourse($qtyInfo, $this->input->post('qt_id'));
					if($result > 0){
						$this->session->set_flashdata('success', ' Course updated successfully');
					}
					else{
						$this->session->set_flashdata('error', 'Course updated failed');
					}
					redirect('admin/course/courseForm/'.$this->input->post('qt_id').'');
				}
				else{
					$folderName = date('d-m-Y');
				    if (!is_dir('assets/frontend/course/'.$folderName)) {
			            mkdir('assets/frontend/course/' . $folderName, 0777, TRUE);
			        }
					$str = random_string(5);
					$name = date('d-m-Y').$str;
					$config['upload_path'] = './assets/frontend/course/'.$folderName.'/';
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					//$config['max_size'] = 100000;
					$config['file_name'] = $name;
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('file')){
						echo $this->upload->display_errors();
					}
					else{
						$img =  $this->upload->data('file_name');
					}
				   $qtyInfo = array( 'course_name' => $this->input->post('qt_name'),'image' => $folderName.'/'.$img,'description' => $this->input->post('desc'), 'created_at '=>date('Y-m-d H:i:s') ) ;
	
					$result = $this->Admin_model->addNewCourse($qtyInfo);
					
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', 'New Course created successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Course creation failed');
					}
					redirect('admin/course/courseForm');
				}
			//}
	   
    }
    
    function approved(){
        $this->global['pageTitle'] = 'Approved';
        $data['details'] 	=	$this->Admin_model->get_all_details() ;
		$this->loadViews("admin/admin/approved", $this->global, $data, NULL);
    }
	
	/**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCourse( $qt_id = NULL )
    {
        
			$result = $this->Admin_model->deleteCourse($qt_id);
            
           if($result)
            {
                    $this->session->set_flashdata('success', 'Course deleted successfully');
             }
           else
            {
                    $this->session->set_flashdata('error', 'Course delete failed');
            }
			
        redirect('admin/course/listing');
    }
	
	function add_course_status($id,$status){
	    $data = array(
	       'status'=>$status
	       );
	    $this->db->where('id',$id);
	    $res = $this->db->update('user_detail_tbl',$data);
	    if($res > 0){
	        $this->message->set_message('Status Changed',1);
	    }
	    else{
	        $this->message->set_message('Status Not Changed',0);
	    }
	    redirect(base_url('admin/approved'));
	}
	
    function partlisting(){
		
		$this->global['pageTitle'] = 'Part';
        
		$data['partrecords'] 	=	$this->Admin_model->getPart() ;

		$this->loadViews("admin/admin/part", $this->global, $data, NULL);
	
	}
	
	public function partForm( $item_id = NULL ){
		
		$this->global['pageTitle'] = 'Part: Add / Edit';
			
			$data['itemrecord'] 	=	$this->Admin_model->getPartById( $item_id ) ;
			$data['qtyrecords'] 	=	$this->Admin_model->getCourse() ;
		
		    if($item_id == null)
            {
                $this->loadViews("admin/admin/partForm", $this->global, $data, NULL);
            }
			else{
				
				$this->loadViews("admin/admin/partForm", $this->global , $data, NULL);
			}
    }
	
	function addEditPart(){
		$this->global['pageTitle'] = 'Part: Add / Edit';
		//$this->load->library('form_validation');
            
        // $this->form_validation->set_rules('item_name','Part ','trim|required|max_length[128]');
        // $this->form_validation->set_rules('qt_id','Course','trim|required|max_length[128]');
        
		// if($this->form_validation->run() == FALSE){
		// 	if($this->input->post('part_id') != null){
		// 		$this->PartForm( $this->input->post('part_id'));
		// 	}
		// 	else{
		// 		$this->PartForm();
		// 	}
		// }
		// else{
			if($this->input->post('item_id') != null){
				$partId = $this->input->post('item_id');
				$row = $this->Admin_model->get_part_by_id($partId);
				if(!empty($_FILES['file']['name'])){
					$folderName = date('d-m-Y');
					if (!is_dir('assets/frontend/course/part/'.$folderName)) {
						mkdir('assets/frontend/course/part/' . $folderName, 0777, TRUE);
					}
					$str = random_string(5);
					$name = date('d-m-Y').$str;
					$config['upload_path'] = './assets/frontend/course/part/'.$folderName.'/';
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					//$config['max_size'] = 100000;
					$config['file_name'] = $name;
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('file')){
						echo $this->upload->display_errors();
					}
					else{
						unlink('assets/frontend/course/part/'.$row['image']);
						$img =  $this->upload->data('file_name');
						$image = $folderName.'/'.$img;
					}
				}
				else{
					$image = $row['image'];
				}

				$itemInfo = array( 
					'part_name' => $this->input->post('item_name'),
					'course_id' => $this->input->post('qt_id'),
					'title' => $this->input->post('title'),
					'description' => $this->input->post('desc'),
					'image' => $image,
				);	

				$result = $this->Admin_model->editPart($itemInfo, $this->input->post('item_id'));
				
				if($result > 0){
					$this->session->set_flashdata('success', ' part updated successfully');
				}
				else{
					$this->session->set_flashdata('error', 'Part updated failed');
				}
				redirect('admin/part/partForm/'.$this->input->post('item_id').'');
			}
			else{
				$folderName = date('d-m-Y');
				if (!is_dir('assets/frontend/course/part/'.$folderName)) {
					mkdir('assets/frontend/course/part/' . $folderName, 0777, TRUE);
				}
				$str = random_string(5);
				$name = date('d-m-Y').$str;
				$config['upload_path'] = './assets/frontend/course/part/'.$folderName.'/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				//$config['max_size'] = 100000;
				$config['file_name'] = $name;
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('file')){
					echo $this->upload->display_errors();
				}
				else{
					$img =  $this->upload->data('file_name');
				}
				$itemInfo = array( 
					'part_name' => $this->input->post('item_name'),
					'course_id' => $this->input->post('qt_id'),
					'title' => $this->input->post('title'),
					'description' => $this->input->post('desc'),
					'image' => $folderName.'/'.$img,
					'created_at '=>date('Y-m-d H:i:s') ) ;
				$result = $this->Admin_model->addNewPart($itemInfo);

				if($result > 0){
					$this->session->set_flashdata('success', 'New Part created successfully');
				}
				else{
					$this->session->set_flashdata('error', 'Part  creation failed');
				}
				redirect('admin/part/partForm');
			}
		//}
	}
	
	function deletePart( $item_id = NULL )
    {
         $result = $this->Admin_model->deletePart($item_id);
            
        if($result)
          {
                    $this->session->set_flashdata('success', 'Part deleted successfully');
          }
        else
          {
                    $this->session->set_flashdata('error', 'Part delete failed');
          }
		
			redirect('admin/part/listing');
    }

	function sentencelisting(){
		
		$this->global['pageTitle'] = 'Sentence';
        
		$data['sentencerecords'] 	=	$this->Admin_model->getSentence() ;

		$this->loadViews("admin/admin/sentence", $this->global, $data, NULL);
	
	}
	
	public function sentenceForm( $item_id = NULL ){
		
		$this->global['pageTitle'] = 'Sentence: Add / Edit';
			
			$data['itemrecord'] 	=	$this->Admin_model->getSentenceById( $item_id ) ;
			$data['qtyrecords'] 	=	$this->Admin_model->getPart() ;
		
		    if($item_id == null)
            {
                $this->loadViews("admin/admin/sentenceForm", $this->global, $data, NULL);
            }
			else{
				
				$this->loadViews("admin/admin/sentenceForm", $this->global , $data, NULL);
			}
    }
	
	function addEditSentence(){
	
		$this->global['pageTitle'] = 'Sentence: Add / Edit';
		$this->load->library('form_validation');
            
        $this->form_validation->set_rules('item_name','Sentence ','trim|required|max_length[128]');
        //$this->form_validation->set_rules('parent_sentence_id','Parent Sentence','trim|required|max_length[128]');
		$this->form_validation->set_rules('qt_id','Part','trim|required|max_length[128]');
       // $this->form_validation->set_rules('distribution_limit','Distribution limit','trim|required|max_length[128]');
        
           if($this->form_validation->run() == FALSE)
            {
				
				if(  $this->input->post('qt_id') != null  ){
					
						$this->SentenceForm( $this->input->post('qt_id') );
				}
				else{
					
					$this->SentenceForm();
				}
			}
			else{
				
            
               
			   if(  $this->input->post('item_id') != null  ){
				   
				      $itemInfo = array( 
						'sentence_name' => $this->input->post('item_name'),
						//'parent_sentence_id' => $this->input->post('parent_sentence_id'),
						'part_id' => $this->input->post('qt_id')) ;
								
					
					$result = $this->Admin_model->editSentence($itemInfo, $this->input->post('item_id'));
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', ' part updated successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Part updated failed');
					}
					redirect('admin/sentence/sentenceForm/'.$this->input->post('item_id').'');
					
				}
				else{
					
					   $itemInfo = array( 
								'sentence_name' => $this->input->post('item_name'),
								//'parent_sentence_id' => $this->input->post('parent_sentence_id'),
								'part_id' => $this->input->post('qt_id'),
								//'distribution_limit' => $this->input->post('distribution_limit'),
								'created_at '=>date('Y-m-d H:i:s') ) ;
					
					// echo "<pre>" ;
					 // print_R($itemInfo) ;
					// die() ;
					$result = $this->Admin_model->addNewSentence($itemInfo);
					
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', 'New Sentence created successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Senence  creation failed');
					}
					redirect('admin/sentence/sentenceForm');
				}
             }	
	}
	
	function deleteSentence( $item_id = NULL )
    {
         $result = $this->Admin_model->deleteSentence($item_id);
            
        if($result)
          {
                    $this->session->set_flashdata('success', 'Sentence deleted successfully');
          }
        else
          {
                    $this->session->set_flashdata('error', 'Sart delete failed');
          }
		
			redirect('admin/sentence/listing');
    }

	function keywordlisting(){
		
		$this->global['pageTitle'] = 'keyword';
        
		$data['keywordrecords'] 	=	$this->Admin_model->getKeyword() ;

		$this->loadViews("admin/admin/keyword", $this->global, $data, NULL);
	
	}
	
	public function keywordForm( $item_id = NULL ){
		
		$this->global['pageTitle'] = 'Keyword: Add / Edit';
			
			$data['itemrecord'] 	=	$this->Admin_model->getKeywordById( $item_id ) ;
			$data['qtyrecords'] 	=	$this->Admin_model->getPart() ;
		
		    if($item_id == null)
            {
                $this->loadViews("admin/admin/keywordForm", $this->global, $data, NULL);
            }
			else{
				
				$this->loadViews("admin/admin/keywordForm", $this->global , $data, NULL);
			}
    }
	
	function addEditKeyword(){
	
		$this->global['pageTitle'] = 'Keyword: Add / Edit';
		$this->load->library('form_validation');
            
        $this->form_validation->set_rules('item_name','Keyword ','trim|required|max_length[128]');
        //$this->form_validation->set_rules('parent_sentence_id','Parent Sentence','trim|required|max_length[128]');
		$this->form_validation->set_rules('qt_id','Part','trim|required|max_length[128]');
       // $this->form_validation->set_rules('distribution_limit','Distribution limit','trim|required|max_length[128]');
        
           if($this->form_validation->run() == FALSE)
            {
				
				if(  $this->input->post('qt_id') != null  ){
					
						$this->KeywordForm( $this->input->post('qt_id') );
				}
				else{
					
					$this->KeywordForm();
				}
			}
			else{
				
            
               
			   if(  $this->input->post('item_id') != null  ){
				   
				      $itemInfo = array( 
						'keyword_name' => $this->input->post('item_name'),
						//'parent_sentence_id' => $this->input->post('parent_sentence_id'),
						'part_id' => $this->input->post('qt_id')) ;
								
					
					$result = $this->Admin_model->editKeyword($itemInfo, $this->input->post('item_id'));
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', ' part updated successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Part updated failed');
					}
					redirect('admin/keyword/keywordForm/'.$this->input->post('item_id').'');
					
				}
				else{
					
					   $itemInfo = array( 
								'keyword_name' => $this->input->post('item_name'),
								//'parent_sentence_id' => $this->input->post('parent_sentence_id'),
								'part_id' => $this->input->post('qt_id'),
								//'distribution_limit' => $this->input->post('distribution_limit'),
								'created_at '=>date('Y-m-d H:i:s') ) ;
					
					// echo "<pre>" ;
					 // print_R($itemInfo) ;
					// die() ;
					$result = $this->Admin_model->addNewKeyword($itemInfo);
					
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', 'New keyword created successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'keyword  creation failed');
					}
					redirect('admin/keyword/keywordForm');
				}
             }	
	}
	
	function deleteKeyword( $item_id = NULL )
    {
         $result = $this->Admin_model->deleteKeyword($item_id);
            
        if($result)
          {
                    $this->session->set_flashdata('success', 'Keyword deleted successfully');
          }
        else
          {
                    $this->session->set_flashdata('error', 'keyword delete failed');
          }
		
			redirect('admin/keyword/listing');
    }

	function delChallan(){
		
		$outgoing 	=	$this->Admin_model->get_outgoing_challan() ;
		
		$fetched_outgoing_challan		=	$outgoing->outgoing_challan_no	;
		 
		// die() ;
		echo	$outgoing 	=	$this->Admin_model->delete_outgoing_challan( $fetched_outgoing_challan ) ;

		
	}

	function inventorylisting(){
		
		$this->global['pageTitle'] = 'Inventory';
        
		$data['inventoryrecords'] 	=	$this->Admin_model->getNotDistInventory() ;
		
		$data['checkfordeleteInventory'] 	=	$this->Admin_model->checkfordeleteInventory() ;
		$data['checkToDistribute'] 			=	$this->Admin_model->checkToDistribute() ;
		
		// echo "<pre>" ;
		// print_R( $data ) ;
		 // die() ;
	 
		$this->loadViews("admin/inventory", $this->global, $data, NULL);
	
	}

	function inventoryundistrlisting(){
		
		$this->global['pageTitle'] = 'Inventory';
        
		//$data['inventoryrecords'] 	=	$this->Admin_model->getInventory() ;
		$data['inventoryrecords'] 	=	$this->Admin_model->getDistInventory() ;
		
		// echo "<pre>" ;
		// print_R( $data ) ;
		 // die() ;
	 
		$this->loadViews("admin/inventory_undist", $this->global, $data, NULL);
	
	}
	
	public function inventoryForm( $inv_id = NULL ){
		
		$this->global['pageTitle'] = 'Inventory: Add / Edit';
			
			$data['itemrecords'] 	=	$this->Admin_model->getItems() ;
			$data['farmrecords'] 	=	$this->Admin_model->getfarm() ;
			$data['invrecord'] 	=	$this->Admin_model->getInventoryById( $inv_id ) ;
		
		  if($inv_id == null)
            {
                $this->loadViews("admin/inventoryForm", $this->global, $data, NULL);
            }
			else{
				
				$this->loadViews("admin/inventoryForm", $this->global , $data, NULL);
			}
    }
	
	function addEditInventory(){
	
		$this->global['pageTitle'] = 'Inventory Add / Edit';
		$this->load->library('form_validation');
            
        $this->form_validation->set_rules('item_id','Item','trim|required|max_length[128]');
        $this->form_validation->set_rules('quantity','Qty','trim|required|max_length[128]');
			

			
		
  		  if($this->form_validation->run() == FALSE)
            {
				
				if(  $this->input->post('inv_id') != null  ){
					
					$this->inventoryForm( $this->input->post('inv_id') );
				}
				else{
					
					$this->inventoryForm();
				}
			}
			else{
				
				 if(  $this->input->post('inv_id') != null  ){
				   
				   $invInfo = array( 
								'item_id' => $this->input->post('item_id'),
								'farm_id' => $this->input->post('farm_id'),
								'quantity' => $this->input->post('quantity')) ;
					
					$result = $this->Admin_model->editInventory($invInfo, $this->input->post('inv_id'));
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', ' Inventory updated successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Inventory updated failed');
					}
						
						redirect('admin/inventory/inventoryForm/'.$this->input->post('inv_id').'');
					
				}
			else{
					
					$incoming_challan 	= 0	;
					$enteredQty  		= $this->input->post('quantity') ;
					
					$get_rows	=	$this->Admin_model->checkIncomingChallan() ;
			
					
					$getDistributionLimit	=	$this->Admin_model->getItemLimit( $this->input->post('item_id') ) ;
					
					$distribution_limit  = $getDistributionLimit->distribution_limit ;
				    $mod=$this->check_modulus($enteredQty,$distribution_limit);
				if( $get_rows > 0 ){
					
					$this->session->set_flashdata('error', 'please distribute the last challan items first');
				
					$this->inventoryForm() ;
					
					return false ;
				}
			//elseif( $enteredQty % $distribution_limit != 0 ){
				elseif($mod!=0){
					
					$this->session->set_flashdata('error', 'you can\'t add odd figure in the quantity');
					$this->inventoryForm() ;
					return false ;
				}
				else{
					
					$get_incominows	=	$this->Admin_model->createIncominChallan() ;
					
					
					 $invInfo = array( 
								'item_id' => $this->input->post('item_id'),
								'farm_id' => $this->input->post('farm_id'),
								'quantity' => $this->input->post('quantity'),
								'incoming_challan_no' => $get_incominows,
								'created_at '=>date('Y-m-d H:i:s') ) ;
					
					$result = $this->Admin_model->addNewinventory( $invInfo );
					
	  
					if($result > 0)
					{
						$this->session->set_flashdata('success', 'New Inventory created successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Inventory  creation failed');
					}
					
					redirect('admin/inventory/inventoryForm');
				}
				
			}
         }	
	}
	
	function deleteInventory( $inv_id = NULL )
    {
         $result = $this->Admin_model->deleteInventory( $inv_id );
            
        if($result)
          {
                    $this->session->set_flashdata('success', 'Inventory deleted successfully');
          }
        else
          {
                    $this->session->set_flashdata('error', 'Inventory delete failed');
          }
		
			redirect('admin/inventory/listing');
    }
	
	function grouplisting(){
		
		$this->global['pageTitle'] = 'Groups';
        
		$data['grouprecords'] 	=	$this->Admin_model->getgroup() ;
	
	
		$this->loadViews("admin/admin/groups", $this->global, $data, NULL);
	
	}
	
	public function group_masterForm( $gp_id = NULL ){
		
		$this->global['pageTitle'] = 'Group: Add / Edit';
			
			
			$data['grouprecord'] 	=	$this->Admin_model->getgroupById( $gp_id ) ;
		
		 
		  if($gp_id == null)
            {
                $this->loadViews("admin/group_masterForm", $this->global, $data, NULL);
            }
			else{
				
				$this->loadViews("admin/group_masterForm", $this->global , $data, NULL);
			}
    }
	
	function addEditGroup(){
	
		$this->global['pageTitle'] = 'Group: Add / Edit';
		$this->load->library('form_validation');
            
        $this->form_validation->set_rules('gp_name','Group name','trim|required|max_length[128]');
        $this->form_validation->set_rules('gp_location','Group location','trim|required|max_length[128]');
        
           if($this->form_validation->run() == FALSE)
            {
				
				if(  $this->input->post('gp_id') != null  ){
					
						$this->group_masterForm( $this->input->post('inv_id') );
				}
				else{
					
					$this->group_masterForm();
				}
			}
			else{
				
           
           
 		
			   if(  $this->input->post('gp_id') != null  ){
				   
				       $groupInfo = array( 
								'gp_name' => $this->input->post('gp_name'),
								'gp_location' => $this->input->post('gp_location') ) ;
					
					$result = $this->Admin_model->editGroup( $groupInfo, $this->input->post('gp_id'));
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', ' Inventory updated successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Inventory updated failed');
					}
						
						redirect('admin/group_master/group_masterForm/'.$this->input->post('gp_id').'');
					
				}
				else{
					
					    $groupInfo = array( 
								'gp_name' => $this->input->post('gp_name'),
								'gp_location' => $this->input->post('gp_location'),
								'created_at '=>date('Y-m-d H:i:s') ) ;
								
					
					$result = $this->Admin_model->addNewGroup( $groupInfo );
					
	  
					if($result > 0)
					{
						$this->session->set_flashdata('success', 'New Inventory created successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Inventory  creation failed');
					}
					
					redirect('admin/group_master/group_masterForm');
				}
             }	
	}
	
   function deleteGroup( $gp_id = NULL )
    {
         $result = $this->Admin_model->deleteGroup( $gp_id );
            
        if($result)
          {
                    $this->session->set_flashdata('success', 'Group deleted successfully');
          }
        else
          {
                    $this->session->set_flashdata('error', 'Group delete failed');
          }
		
			redirect('admin/group_master/listing');
    }
	
	
	function farmlisting(){
		
		$this->global['pageTitle'] = 'Farms: Add / Edit';
        
		$data['farmrecords'] 	=	$this->Admin_model->getfarm() ;
	
	
		$this->loadViews("admin/admin/farms", $this->global, $data, NULL);
	
	}
	
	
	public function farmForm( $farm_id = NULL ){
		
		$this->global['pageTitle'] = 'Farm: Add / Edit';
			
			
			$data['farmrecords'] 	=	$this->Admin_model->getfarmById( $farm_id ) ;
		
		 
		  if($farm_id == null)
            {
                $this->loadViews("admin/admin/farmForm", $this->global, $data, NULL);
            }
			else{
				
				$this->loadViews("admin/admin/farmForm", $this->global , $data, NULL);
			}
    }
	
	
	function addEditFarm(){
	
		$this->global['pageTitle'] = 'Farm: Add / Edit';
		$this->load->library('form_validation');
            
        $this->form_validation->set_rules('farm_name','Farm name','trim|required|max_length[128]');
        
           if($this->form_validation->run() == FALSE)
            {
				
				if(  $this->input->post('farm_id') != null  ){
					
						$this->farmForm( $this->input->post('farm_id') );
				}
				else{
					
					$this->farmForm();
				}
			}
			else{
				
              
           
 		
			   if(  $this->input->post('farm_id') != null  ){
				   
				    $farmInfo = array( 
								'farm_name' => $this->input->post('farm_name') ) ;
					
					$result = $this->Admin_model->editFarm( $farmInfo, $this->input->post('farm_id'));
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', ' Farm updated successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Farm updated failed');
					}
						
						redirect('admin/farm/farmForm/'.$this->input->post('farm_id').'');
					
				}
				else{
					
					 $farmInfo = array( 
								'farm_name' => $this->input->post('farm_name'),
								'created_at '=>date('Y-m-d H:i:s') ) ;
								
					$result = $this->Admin_model->addNewFarm( $farmInfo );
					
	  
					if($result > 0)
					{
						$this->session->set_flashdata('success', 'New Farm created successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Farm  creation failed');
					}
					
					redirect('admin/farm/farmForm');
				}
             }	
	}
	
	
	
	function deleteFarm( $farm_id = NULL )
    {
         $result = $this->Admin_model->deleteFarm( $farm_id );
            
        if($result)
          {
                    $this->session->set_flashdata('success', 'Farm deleted successfully');
          }
        else
          {
                    $this->session->set_flashdata('error', 'Farm delete failed');
          }
		
			redirect('admin/farm/listing');
    }
	
	
	
	
	function itemDistributionlisting(){
		
		$this->global['pageTitle'] = 'Items Distribution';
        
		$data['itemDistributionrecords'] 	=	$this->Admin_model->getItemDistribution() ;
	
		
		// echo "<pre>" ;
		 // print_r( $data ) ;	

		// die() ;
	
		$this->loadViews("admin/admin/itemDistribution", $this->global, $data, NULL);
	
	}
	
	
	public function itemDistributionForm( $itm_dist_id = NULL ){
		
		$this->global['pageTitle'] = 'Item Distribution: Add / Edit';
			
		$data['userrecords'] 	=	$this->Admin_model->getUsersInfo() ;
		$data['inventoryrecords'] 	=	$this->Admin_model->getInventory() ;	
		// $data['invrecord'] 	=	$this->Admin_model->getInventoryById( $itm_dist_id ) ;
		
		 if($itm_dist_id == null)
          {
             $this->loadViews("admin/admin/itemDistributionForm", $this->global, $data, NULL);
          }
		else{
			
			$this->loadViews("admin/admin/itemDistributionForm", $this->global , $data, NULL);
		}
	}
	
	
	function addEditItemDistribution(){
	
		$this->global['pageTitle'] = 'Item Distribution: Add / Edit';
		$this->load->library('form_validation');
            
        $this->form_validation->set_rules('user_id','User','trim|required|max_length[128]');
        $this->form_validation->set_rules('qt_distributed','Qty','trim|required|max_length[128]');
        $this->form_validation->set_rules('inv_id','Inventory','trim|required|max_length[128]');
        
           if($this->form_validation->run() == FALSE)
            {
				if(  $this->input->post('itm_dist_id') != null  ){
					
					$this->inventoryForm( $this->input->post('itm_dist_id') );
				}
				else{
					
					$this->inventoryForm();
				}
			}
			else{
				
              
           
			
			   if(  $this->input->post('itm_dist_id') != null  ){
				   
				    $itm_distInfo = array( 
								'user_id' => $this->input->post('user_id'),
								'inv_id' => $this->input->post('inv_id'),
								'qt_distributed' => $this->input->post('qt_distributed') ) ;
					
					$result = $this->Admin_model->editInventory($itm_distInfo, $this->input->post('itm_dist_id'));
					
					if($result > 0)
					{
						$this->session->set_flashdata('success', ' Inventory updated successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Inventory updated failed');
					}
						
						redirect('admin/inventory/inventoryForm/'.$this->input->post('itm_dist_id').'');
					
				}
				else{
					
				 $itm_distInfo = array( 
								'user_id' => $this->input->post('user_id'),
								'inv_id' => $this->input->post('inv_id'),
								'qt_distributed' => $this->input->post('qt_distributed'),
								'created_at '=>date('Y-m-d H:i:s') ) ;
								
					$result = $this->Admin_model->addNewItemDistribution( $itm_distInfo );
					
	  
					if($result > 0)
					{
						$this->session->set_flashdata('success', 'New Inventory created successfully');
					}
					else
					{
						$this->session->set_flashdata('error', 'Inventory  creation failed');
					}
					
					redirect('admin/item_distribution/itemDistributionForm');
				}
            }	
	}
	
// 	public function check_modulus($x,$y){

// 		$A =$x; // 7.2;
// 		$B =$y; // 1.75;

// 		$R = $A;

// 		while($R >= $B){
// 		    $D = (int)($A / $B);
// 		    $R = $A - ($B * $D);
// 		}

// 		$check_leave_number = $R;
// 		return $check_leave_number;
// 	}
	public function check_modulus($x,$y){
		$result = $this->Admin_model->getmod($x,$y);
		//echo $result;
		return $result;
		// die;
		// $A =$x; // 7.2;
		// $B =$y; // 1.75;

		// $R = $A;

		// while($R >= $B){
		//     $D = (int)($A / $B);
		//     $R = $A - ($B * $D);
		// }

		// $check_leave_number = $R;
		// return $check_leave_number;
	}
	

	    // in item_distribution add field outgoing_challan_no and item_id
    //in inventory incoming_challan_no and outgoing_challan_no

//     public function itemDistribAutomatic( $item_id = NULL,$inv_id = NULL,$quantity = NULL ){

// // echo "hello" ;
// 			// die() ;
//                     $getOutgoingChallan=$this->Admin_model->getOutgoingChallan();                    
//                     if(count($getOutgoingChallan)==0){
//                         $OutgoingChallan=1;
//                     }
//                     else{
//                         $getOutgoingChallanforDistrb=$this->Admin_model->getOutgoingChallanforDistrb();
//                         $OutgoingChallan=($getOutgoingChallanforDistrb->outgoing_challan_no)+1;
//                     }
//             $getInventoryForD = $this->Admin_model->getInventoryAutomatic();// to get inventory where outgoing_challan==0
//             if(count($getInventoryForD)>0){
//                 		foreach($getInventoryForD as $key=>$value){
// 			                    $inv_id=$value->inv_id;
// 			                    $item_id=$value->item_id;
// 			                    $quantity=$value->quantity;
// 			                    $incoming_challan_no=$value->incoming_challan_no;

// 			                    $created_at=date('d-m-Y',strtotime($value->created_at));
// 			                    $today= date('d-m-Y');
// 			                    $outgoing_challan_no=$value->outgoing_challan_no;

// 			                    $getItem = $this->Admin_model->getItemById($item_id);// to get per person limit
// 			                    $distribution_limit=$getItem->distribution_limit;                    

                    

// 	                        		if($quantity%$distribution_limit==0){
// 	                           			$no_of_persons=($quantity/$distribution_limit);// total number of persons for distribution
// 	                           			$get_last_distrib_person_result=$this->Admin_model->getRowItemDistribution($item_id); // last user_id for this item distributed
// 	                           			if($get_last_distrib_person_result!=NULL && count($get_last_distrib_person_result)==1){ 

// 				                                $getAllActiveClientsCount=$this->Admin_model->getAllActiveClients();
// 				                                $totalActiveClients=count($getAllActiveClientsCount);
// 				                                $serial_noArray=[];
// 				                                $required_array=[];
// 				                                if($totalActiveClients>0){
// 				                                	foreach($getAllActiveClientsCount as $get_active_serials){
// 				                                		array_push($serial_noArray, $get_active_serials->serial_no);
// 				                                	}
// 				                                }
// 			                                	else{
// 			                                			// No distribution possible ,because no active client
// 			                                	}

// 			                                	$lastDistUser=$get_last_distrib_person_result->user_id;
// 	                           					$get_serial_id_of_usr=$this->Admin_model->get_serial_id($lastDistUser);
// 	                           					$serial_id_of_usr=$get_serial_id_of_usr->serial_no;
// 	                           					$index=array_search($serial_id_of_usr,$serial_noArray);
// 	                           					$final_serial_array=$serial_noArray;

// 	                           					//echo " final_serial_array <pre>"; print_r($final_serial_array); echo "</pre>"; 
// 	                           						$init_index=$index+1;
// 	                           						$final_index=$no_of_persons+$index;
// 	                           						//echo "init_index = ".$init_index." final_index= ".$final_index;
// 	                           						$rept_reqd=($no_of_persons)%(sizeof($serial_noArray));	

// 	                           						$rept=($no_of_persons)%(sizeof($serial_noArray));
// 		                                			if($rept==0){
// 		                                				$rept_reqd=sizeof($serial_noArray);
// 		                                			}
// 		                                			else{
// 		                                				$rept_reqd=sizeof($serial_noArray)+$rept;
// 		                                			} 

// 	                           						for($i=1;$i<=($rept_reqd);$i++){
// 		                                				$final_serial_array=array_merge($final_serial_array,$serial_noArray);
// 		                                			}
// 	                           					$arrayReqd=array_slice($final_serial_array,$init_index,$no_of_persons);
	                           						
// 	                                			foreach($arrayReqd as $arrayReqdserial){
// 	                                                    $getUserIdFromSr=$this->Admin_model->getUserIdFromSr($arrayReqdserial);
// 	                                                        $usr_id=$getUserIdFromSr->usr_id;
// 	                                                        if($getUserIdFromSr!=NULL){
// 	                                                        $itm_distInfo = array( 
// 	                                                        'user_id' => $usr_id,
// 	                                                        'inv_id' => $inv_id,
// 	                                                        'item_id' => $item_id,
// 	                                                        'qt_distributed' => $distribution_limit,
// 	                                                        'outgoing_challan_no'=>$OutgoingChallan,
// 	                                                        'created_at '=>date('Y-m-d H:i:s') ) ;                                      
// 	                                                        $this->Admin_model->addNewItemDistribution( $itm_distInfo );
// 	                                                    	}

// 	                                            }
// 			                                     	$outgoingChallanValue = array('outgoing_challan_no' => $OutgoingChallan) ;
// 			                                		$updated=$this->Admin_model->updateoutgoingChallan($outgoingChallanValue);



// 			                            }
// 			                            else{
// 			                            	// if first time distribution

// 				                                $getAllActiveClientsCount=$this->Admin_model->getAllActiveClients();
// 				                                $totalActiveClients=count($getAllActiveClientsCount);
// 				                                $serial_noArray=[];
// 				                                $required_array=[];
// 				                                if($totalActiveClients>0){
// 				                                	foreach($getAllActiveClientsCount as $get_active_serials){
// 				                                		array_push($serial_noArray, $get_active_serials->serial_no);
// 				                                	}
// 				                                }
// 			                                	else{
// 			                                			// No distribution possible ,because no active client
// 			                                	}
// 	                                			if(sizeof($serial_noArray)>=$no_of_persons)
// 		                                		{
// 		                                			$arrayReqd=array_slice($serial_noArray,0,($no_of_persons));
// 		                                		}
// 		                                		else{
// 		                                			$array_init=$serial_noArray;
// 		                                			$remiaining_persons=$no_of_persons-sizeof($serial_noArray);// 10(No.of Persons)-4(serial_no_count and fixed)=6
		                                			

// 		                                			$rept=($remiaining_persons)%(sizeof($serial_noArray));
// 		                                			if($rept==0){
// 		                                				$rept_reqd=($remiaining_persons)/(sizeof($serial_noArray));
// 		                                			}
// 		                                			else{
// 		                                				$rept_reqd=$rept;
// 		                                			}
// 		                                			for($i=1;$i<=$rept_reqd;$i++){
// 		                                				$array_init=array_merge($array_init,$serial_noArray);
// 		                                			}
// 		                                			//echo $no_of_persons;
// 		                                			$arrayReqd=array_slice($array_init,0,($no_of_persons));
// 		                                		}
// 	                                			foreach($arrayReqd as $arrayReqdserial){
// 	                                                    $getUserIdFromSr=$this->Admin_model->getUserIdFromSr($arrayReqdserial);
// 	                                                        $usr_id=$getUserIdFromSr->usr_id;
// 	                                                        if($getUserIdFromSr!=NULL){
// 	                                                        $itm_distInfo = array( 
// 	                                                        'user_id' => $usr_id,
// 	                                                        'inv_id' => $inv_id,
// 	                                                        'item_id' => $item_id,
// 	                                                        'qt_distributed' => $distribution_limit,
// 	                                                        'outgoing_challan_no'=>$OutgoingChallan,
// 	                                                        'created_at '=>date('Y-m-d H:i:s') ) ;                                      
// 	                                                        $this->Admin_model->addNewItemDistribution( $itm_distInfo );
// 	                                                    	}

// 	                                            }
// 			                                     	$outgoingChallanValue = array('outgoing_challan_no' => $OutgoingChallan) ;
// 			                                		$updated=$this->Admin_model->updateoutgoingChallan($outgoingChallanValue);
// 			                            }
// 			                        }
// 		                    }
// 		                }

//     }


    public function itemDistribAutomatic( $item_id = NULL,$inv_id = NULL,$quantity = NULL ){

// echo "hello" ;
			// die() ;
                    $getOutgoingChallan=$this->Admin_model->getOutgoingChallan();                    
                    if(count($getOutgoingChallan)==0){
                        $OutgoingChallan=1;
                    }
                    else{
                        $getOutgoingChallanforDistrb=$this->Admin_model->getOutgoingChallanforDistrb();
                        $OutgoingChallan=($getOutgoingChallanforDistrb->outgoing_challan_no)+1;
                    }
            $getInventoryForD = $this->Admin_model->getInventoryAutomatic();// to get inventory where outgoing_challan==0
            if(count($getInventoryForD)>0){
                		foreach($getInventoryForD as $key=>$value){
			                    $inv_id=$value->inv_id;
			                    $item_id=$value->item_id;
			                    $quantity=$value->quantity;
			                    $incoming_challan_no=$value->incoming_challan_no;

			                    $created_at=date('d-m-Y',strtotime($value->created_at));
			                    $today= date('d-m-Y');
			                    $outgoing_challan_no=$value->outgoing_challan_no;

			                    $getItem = $this->Admin_model->getItemById($item_id);// to get per person limit
			                    $distribution_limit=$getItem->distribution_limit;                    

                    

	                        			$mod=$this->check_modulus($quantity,$distribution_limit);
	                        			if($mod==0){
	                        			    
	                           			$no_of_persons=($quantity/$distribution_limit);// total number of persons for distribution
	                           			
	                           			$get_last_distrib_person_result=$this->Admin_model->getRowItemDistribution($item_id); // last user_id for this item distributed
	                           			//echo "get_last_distrib_person_result = <pre>"; print_r($get_last_distrib_person_result);echo "</pre>";
	                           			if($get_last_distrib_person_result!=NULL && isset($get_last_distrib_person_result->user_id) && ($get_last_distrib_person_result->user_id!="" || $get_last_distrib_person_result->user_id!=0)){ 

				                                $getAllActiveClientsCount=$this->Admin_model->getAllActiveClients();
				                                $totalActiveClients=count($getAllActiveClientsCount);
				                                $serial_noArray=[];
				                                $required_array=[];
				                                if($totalActiveClients>0){
				                                	foreach($getAllActiveClientsCount as $get_active_serials){
				                                		array_push($serial_noArray, $get_active_serials->serial_no);
				                                	}
				                                }
			                                	else{
			                                			// No distribution possible ,because no active client
			                                	}

			                                	$lastDistUser=$get_last_distrib_person_result->user_id;
	                           					$get_serial_id_of_usr=$this->Admin_model->get_serial_id($lastDistUser);
	                           					$serial_id_of_usr=$get_serial_id_of_usr->serial_no;
	                           					$index=array_search($serial_id_of_usr,$serial_noArray);
	                           					$final_serial_array=$serial_noArray;

	                           					//echo " final_serial_array <pre>"; print_r($final_serial_array); echo "</pre>"; 
	                           						$init_index=$index+1;
	                           						$final_index=$no_of_persons+$index;
	                           						//echo "init_index = ".$init_index." final_index= ".$final_index;
	                           						$rept_reqd=($no_of_persons)%(sizeof($serial_noArray));	

	                           						$rept=($no_of_persons)%(sizeof($serial_noArray));
		                                			if($rept==0){
		                                				$rept_reqd=sizeof($serial_noArray);
		                                			}
		                                			else{
		                                				$rept_reqd=sizeof($serial_noArray)+$rept;
		                                			} 

	                           						for($i=1;$i<=($rept_reqd);$i++){
		                                				$final_serial_array=array_merge($final_serial_array,$serial_noArray);
		                                			}
	                           					$arrayReqd=array_slice($final_serial_array,$init_index,$no_of_persons);


	                           						
	                           					if(count($arrayReqd)< $no_of_persons){ $arrayReqd=array_slice($final_serial_array,$init_index,($no_of_persons+1));}
	                                			foreach($arrayReqd as $arrayReqdserial){
	                                                    $getUserIdFromSr=$this->Admin_model->getUserIdFromSr($arrayReqdserial);
	                                                        $usr_id=$getUserIdFromSr->usr_id;
	                                                        if($getUserIdFromSr!=NULL){
	                                                        $itm_distInfo = array( 
	                                                        'user_id' => $usr_id,
	                                                        'inv_id' => $inv_id,
	                                                        'item_id' => $item_id,
	                                                        'qt_distributed' => $distribution_limit,
	                                                        'outgoing_challan_no'=>$OutgoingChallan,
	                                                        'created_at '=>date('Y-m-d H:i:s') ) ;                                      
	                                                        $this->Admin_model->addNewItemDistribution( $itm_distInfo );
	                                                    	}

	                                            }
			                                     	$outgoingChallanValue = array('outgoing_challan_no' => $OutgoingChallan) ;
			                                		$updated=$this->Admin_model->updateoutgoingChallan($outgoingChallanValue);



			                            }
			                            else{
			                            	// if first time distribution

				                                $getAllActiveClientsCount=$this->Admin_model->getAllActiveClients();
				                                $totalActiveClients=count($getAllActiveClientsCount);
				                                $serial_noArray=[];
				                                $required_array=[];
				                                if($totalActiveClients>0){
				                                	foreach($getAllActiveClientsCount as $get_active_serials){
				                                		array_push($serial_noArray, $get_active_serials->serial_no);
				                                	}
				                                }
			                                	else{
			                                			// No distribution possible ,because no active client
			                                	}
	                                			if(sizeof($serial_noArray)>=$no_of_persons)
		                                		{
		                                			$arrayReqd=array_slice($serial_noArray,0,($no_of_persons));
		                                			if(count($arrayReqd)< $no_of_persons){ $arrayReqd=array_slice($serial_noArray,0,($no_of_persons+1));}
		                                		}
		                                		else{
		                                			$array_init=$serial_noArray;
		                                			$remiaining_persons=$no_of_persons-sizeof($serial_noArray);// 10(No.of Persons)-4(serial_no_count and fixed)=6
		                                			

		                                			$rept=($remiaining_persons)%(sizeof($serial_noArray));
		                                			if($rept==0){
		                                				$rept_reqd=($remiaining_persons)/(sizeof($serial_noArray));
		                                			}
		                                			else{
		                                				$rept_reqd=$rept;
		                                			}
		                                			for($i=1;$i<=$rept_reqd;$i++){
		                                				$array_init=array_merge($array_init,$serial_noArray);
		                                			}
		                                			//echo $no_of_persons;
		                                			$arrayReqd=array_slice($array_init,0,($no_of_persons));
		                                			if(count($arrayReqd)< $no_of_persons){ $arrayReqd=array_slice($array_init,0,($no_of_persons+1));}
		                                		}
	                                			foreach($arrayReqd as $arrayReqdserial){
	                                                    $getUserIdFromSr=$this->Admin_model->getUserIdFromSr($arrayReqdserial);
	                                                        $usr_id=$getUserIdFromSr->usr_id;
	                                                        if($getUserIdFromSr!=NULL){
	                                                        $itm_distInfo = array( 
	                                                        'user_id' => $usr_id,
	                                                        'inv_id' => $inv_id,
	                                                        'item_id' => $item_id,
	                                                        'qt_distributed' => $distribution_limit,
	                                                        'outgoing_challan_no'=>$OutgoingChallan,
	                                                        'created_at '=>date('Y-m-d H:i:s') ) ;                                      
	                                                        $this->Admin_model->addNewItemDistribution( $itm_distInfo );
	                                                    	}

	                                            }
			                                     	$outgoingChallanValue = array('outgoing_challan_no' => $OutgoingChallan) ;
			                                		$updated=$this->Admin_model->updateoutgoingChallan($outgoingChallanValue);
			                            }
			                        }
		                    }
		                }

    }
    public function createExcel() {
        ob_start();

	 	if(!isset($_GET['c'])){
	 		echo "Something Went Wrong....";die;
	 	}
	 	
	 	$bold = [
            'font' => [
                'bold' => true,
            ]];
	 	$outgoingchln=$_GET['c'];
		$fileName = 'challan_'.$outgoingchln.'.xlsx';  
		// $filename = 'challan_'.date('Ymd').'.xlsx'; 
		
		//$itemDistributionrecords = $this->Admin_model->getItemDistribution_csv();


        $RS_ROWS=$this->Admin_model->getItemDistribution_rows($outgoingchln);
        $rs_COLS=$this->Admin_model->getItemDistribution_cols($outgoingchln);


        // echo "<pre>"; print_r($RS_ROWS); echo "</pre>";
        // echo " rs_COLS <pre>"; print_r($rs_COLS); echo "</pre>"; die;
        
        //$rs_record=$this->Admin_model->getItemDistribution_Record(13);

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

       	$sheet->setCellValue('A1', 'Group Number');
       	
       $sheet->getStyle('A1')->getAlignment()->setWrapText(true);
       //$sheet->getColumnDimension('A')->setAutoSize(TRUE);
       $sheet->getStyle('A1')->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('A1')->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('A1')->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('A1')->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       
       $sheet->getStyle('A1')->getFont()->getColor()->setARGB(PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
       $sheet->getStyle('A1')->getFill()->setFillType(PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('73C4F3');
       $sheet->getStyle('A1')->applyFromArray($bold);
       
        $sheet->setCellValue('B1', 'Group Name');
        $sheet->getStyle('B1')->getAlignment()->setWrapText(true);
        $sheet->getColumnDimension('B')->setAutoSize(TRUE);
        
        $sheet->getStyle('B1')->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('B1')->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('B1')->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('B1')->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       
       $sheet->getStyle('B1')->getFont()->getColor()->setARGB(PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
       $sheet->getStyle('B1')->getFill()->setFillType(PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('73C4F3');
       $sheet->getStyle('B1')->applyFromArray($bold);
         
        $sheet->setCellValue('C1', 'Challan No');
        
        $sheet->getStyle('C1')->getAlignment()->setWrapText(true);
        
        $sheet->getStyle('C1')->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('C1')->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('C1')->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('C1')->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       
       $sheet->getStyle('C1')->getFont()->getColor()->setARGB(PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
       $sheet->getStyle('C1')->getFill()->setFillType(PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('73C4F3');
       $sheet->getStyle('C1')->applyFromArray($bold);
       
        $sheet->setCellValue('D1', 'Member No');
        $sheet->getStyle('D1')->getAlignment()->setWrapText(true);
        
        $sheet->getStyle('D1')->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('D1')->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('D1')->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('D1')->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       
       $sheet->getStyle('D1')->getFont()->getColor()->setARGB(PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
       $sheet->getStyle('D1')->getFill()->setFillType(PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('73C4F3');
       $sheet->getStyle('D1')->applyFromArray($bold);
       
		$sheet->setCellValue('E1', 'Member Name');
		$sheet->getStyle('E1')->getAlignment()->setWrapText(true);
		
		$sheet->getStyle('E1')->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('E1')->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('E1')->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       $sheet->getStyle('E1')->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       
       $sheet->getStyle('E1')->getFont()->getColor()->setARGB(PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
       $sheet->getStyle('E1')->getFill()->setFillType(PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('73C4F3');
       $sheet->getStyle('E1')->applyFromArray($bold);
       
		$sheet->getColumnDimension('E')->setAutoSize(TRUE);
		$alpha=["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD","CE","CF","CG","CH","CI","CJ","CK","CL","CM","CN","CO","CP","CQ","CR","CS","CT","CU","CV","CW","CX","CY","CZ","DA","DB","DC","DD","DE","DF","DG","DH","DI","DJ","DK","DL","DM","DN","DO","DP","DQ","DR","DS","DT","DU","DV","DW","DX","DY","DZ","EA","EB","EC","ED","EE","EF","EG","EH","EI","EJ","EK","EL","EM","EN","EO","EP","EQ","ER","ES","ET","EU","EV","EW","EX","EY","EZ","FA","FB","FC","FD","FE","FF","FG","FH","FI","FJ","FK","FL","FM","FN","FO","FP","FQ","FR","FS","FT","FU","FV","FW","FX","FY","FZ"];
	
		$upload_path = realpath(APPPATH. '../uploads');
        $cols=5;
        //echo "<pre>"; print_r($rs_COLS); die;
        foreach ($rs_COLS as $key => $value) {
        	$cell=(string)$alpha[$cols].'1';
            $sheet->setCellValue($cell, $value['item_name']);
            $sheet->getStyle($cell)->getAlignment()->setHorizontal('center')->setTextRotation(90);
            
            $sheet->getStyle($cell)->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle($cell)->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle($cell)->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle($cell)->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
       
       $sheet->getStyle($cell)->getFont()->getColor()->setARGB(PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
       $sheet->getStyle($cell)->getFill()->setFillType(PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('73C4F3');
       $sheet->getStyle($cell)->applyFromArray($bold);
       
             $sheet->getColumnDimension($alpha[$cols])->setAutoSize(TRUE);
            $cols++;
        }
		// die() ;
		
        $rows = 2;
        //echo "<pre>"; print_r($rs_COLS); die;
        $gp_id=0;
        $start=2;
        $end=2;
       // $row_id=2;
        $count=count($RS_ROWS); 
        foreach ($RS_ROWS as $val){
            // if($gp_id==$val['gp_id']){ 
            //     $end=$end+1;
            //     $spreadsheet->getActiveSheet()->mergeCells('A'.($start).':A'.$end); $spreadsheet->getActiveSheet()->mergeCells('B'.($start).':B'.$end);
            // }
            // else{
            //     if($rows==2){ $start=$start;}
            //     else{
            //         $start=$end+1;
            //         $end=$end+1;
            //     }
            // }
            
            if($gp_id==$val['gp_id']){ 
                $start=$start;
                $end=$end+1;
                
            }
            else{
               
                if($rows==2){ $start=$start;  $end=$end;}
                else{
                     $spreadsheet->getActiveSheet()->mergeCells('A'.($start).':A'.$end); $spreadsheet->getActiveSheet()->mergeCells('B'.($start).':B'.$end);
                    $start=$end+1;
                    $end=$end+1;
                    
                    
                }
                
            }
            if(($count+1)==($rows)){
                $spreadsheet->getActiveSheet()->mergeCells('A'.($start).':A'.$end); $spreadsheet->getActiveSheet()->mergeCells('B'.($start).':B'.$end);
            }
            $sr_no=$this->Admin_model->get_serialno($val['user_id']);
            $sheet->setCellValue('A' . $rows, $val['gp_id']);
            $sheet->setCellValue('B' . $rows, $val['gp_name']);
            $sheet->setCellValue('C' . $rows, $val['outgoing_challan_no']);
           // $sheet->setCellValue('D' . $rows, $val['user_id']);
            $sheet->setCellValue('D' . $rows, $sr_no);
            $sheet->setCellValue('E' . $rows, $val['name']);
            
            $sheet->getStyle('A' . $rows)->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A' . $rows)->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A' . $rows)->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A' . $rows)->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            
            $sheet->getStyle('A' . $rows)->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            
            
            $sheet->getStyle('B' . $rows)->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('B' . $rows)->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('B' . $rows)->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('B' . $rows)->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            
            $sheet->getStyle('C' . $rows)->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('C' . $rows)->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('C' . $rows)->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('C' . $rows)->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            
            $sheet->getStyle('C' . $rows)->getAlignment()->setHorizontal('center');
            $sheet->getStyle('D' . $rows)->getAlignment()->setHorizontal('center');
            
            $sheet->getStyle('D' . $rows)->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('D' . $rows)->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('D' . $rows)->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('D' . $rows)->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            
            $sheet->getStyle('E' . $rows)->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('E' . $rows)->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('E' . $rows)->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('E' . $rows)->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            
            
            $cols=5;
		        //echo "<pre>"; print_r($rs_COLS); die;
		        foreach ($rs_COLS as $key => $value) {
		        	$cell=(string)$alpha[$cols].$rows;
		        	$challan_no=$val['outgoing_challan_no'];
		        	$item_code=$value['item_id']; 
		        	$User_ID = $val['user_id'];
		        	$item_total=$this->Admin_model->getItemDistribution_colsItems($challan_no,$item_code,$User_ID);
		        	 $sheet->setCellValue($cell, $item_total);
		        	 $sheet->getStyle($cell)->getBorders()->getLeft()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $sheet->getStyle($cell)->getBorders()->getRight()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $sheet->getStyle($cell)->getBorders()->getTop()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $sheet->getStyle($cell)->getBorders()->getBottom()->setBorderStyle(PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        
                        $sheet->getStyle($cell)->getAlignment()->setHorizontal('center');
		            
		            $cols++;
		        }
		        
            $gp_id=$val['gp_id'];
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save($upload_path.'/'.$fileName);
		
        ob_clean();
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/uploads/".$fileName);              
    } 
	
	
}
?>