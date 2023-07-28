<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Admin_model extends CI_Model
{
   
    function getUsers()
    {
        $this->db->select('*');
        $this->db->from('tbl_users as mastertbl');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    } 

    function getCourse()
    {
        $this->db->select('*');
        $this->db->from('course_master');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }  
	
	function getCourseById( $course_id )
    {
        $this->db->select('*');
        $this->db->from('course_master');
        $this->db->where('course_id', $course_id);
        $query = $this->db->get();
        
         return $query->row();
    }

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewCourse( $CourseInfo )
    {
        $this->db->trans_start();
        $this->db->insert('course_master', $CourseInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
	    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editCourse($qtyInfo, $course_id)
    {
        $this->db->where('course_id', $course_id);
        $this->db->update('course_master', $qtyInfo);
        
        return TRUE;
    }
	
	/**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCourse($course_id)
    {
        $this->db->where('course_id', $course_id);
        $this->db->delete('course_master');
        return $this->db->affected_rows();
    }
	
	
	function getPart()
    {
        $this->db->select('*');
        $this->db->from('part_master as mastertbl');
		$this->db->join('course_master as qtytbl', 'mastertbl.course_id = qtytbl.course_id');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }  
	
		function getPartById( $item_id )
    {
        $this->db->select('*');
        $this->db->from('part_master');
        $this->db->where('part_id', $item_id);
        $query = $this->db->get();
        
         return $query->row();
    }
	
	 function addNewPart( $itemInfo )
    {
        $this->db->trans_start();
        $this->db->insert('part_master', $itemInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	  function editPart($itemInfo, $item_id)
    {
        $this->db->where('part_id', $item_id);
        $this->db->update('part_master', $itemInfo);
        
        return TRUE;
    }

    function get_part_by_id($id){
        $this->db->where('part_id',$id);
        $row = $this->db->get('part_master')->row_array();
        return $row;
    }

    function get_course_by_id($id){
        $this->db->where('course_id',$id);
        $row = $this->db->get('course_master')->row_array();
        return $row;
    }
	
	
	function deletePart($item_id)
    {
        $this->db->where('part_id', $item_id);
        $this->db->delete('part_master');

        $row = $this->get_part_by_id($item_id);
        unlink('assets/frontend/course/part/'.$row['image']);
        return $this->db->affected_rows();
    }
	
	



	function getSentence()
    {
        $this->db->select('*');
        $this->db->from('sentence_master as mastertbl');
		$this->db->join('part_master as qtytbl', 'mastertbl.part_id = qtytbl.part_id');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }  
	
		function getSentenceById( $sentence_id )
    {
        $this->db->select('*');
        $this->db->from('sentence_master');
        $this->db->where('sentence_id', $sentence_id);
        $query = $this->db->get();
        
         return $query->row();
    }
	
	 function addNewSentence( $itemInfo )
    {
        $this->db->trans_start();
        $this->db->insert('sentence_master', $itemInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	  function editSentence($itemInfo, $sentence_id)
    {
        $this->db->where('sentence_id', $sentence_id);
        $this->db->update('sentence_master', $itemInfo);
        
        return TRUE;
    }
	
	
	    function deleteSentence($sentence_id)
    {
        $this->db->where('sentence_id', $sentence_id);
        $this->db->delete('sentence_master');
        return $this->db->affected_rows();
    }





	function getKeyword()
    {
        $this->db->select('*');
        $this->db->from('keyword_master as mastertbl');
		$this->db->join('part_master as qtytbl', 'mastertbl.part_id = qtytbl.part_id');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }  
	
		function getKeywordById( $keyword_id )
    {
        $this->db->select('*');
        $this->db->from('keyword_master');
        $this->db->where('keyword_id', $keyword_id);
        $query = $this->db->get();
        
         return $query->row();
    }
	
	 function addNewKeyword( $itemInfo )
    {
        $this->db->trans_start();
        $this->db->insert('keyword_master', $itemInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	  function editKeyword($itemInfo, $keyword_id)
    {
        $this->db->where('keyword_id', $keyword_id);
        $this->db->update('keyword_master', $itemInfo);
        
        return TRUE;
    }
	
	
	    function deleteKeyword($keyword_id)
    {
        $this->db->where('keyword_id', $keyword_id);
        $this->db->delete('keyword_master');
        return $this->db->affected_rows();
    }






	 function addNewinventory( $invInfo )
    {
        $this->db->trans_start();
        $this->db->insert('inventory', $invInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	 function editInventory($itemInfo, $inv_id)
    {
        $this->db->where('inv_id', $inv_id);
        $this->db->update('inventory', $itemInfo);
        
        return TRUE;
    }
	
	   function getNotDistInventory()
    {
        $this->db->select('mastertbl.created_at as created,mastertbl.*,itemtbl.item_name,qtytbl.qt_name,farmtbl.farm_name,itemtbl.distribution_limit');
        $this->db->from('inventory as mastertbl');
        $this->db->join('item_master as itemtbl', 'mastertbl.item_id = itemtbl.item_id');
        $this->db->join('quantity_master as qtytbl', 'itemtbl.qt_id = qtytbl.qt_id');
        $this->db->join('farm_master as farmtbl', 'mastertbl.farm_id = farmtbl.farm_id');
        $this->db->where('mastertbl.outgoing_challan_no','0');
        $query = $this->db->get();
        
        return $query->result();
    } 
       function getDistInventory()
    {
        $this->db->select('mastertbl.created_at as created,mastertbl.*,itemtbl.item_name,qtytbl.qt_name,farmtbl.farm_name,itemtbl.distribution_limit');
        $this->db->from('inventory as mastertbl');
        $this->db->join('item_master as itemtbl', 'mastertbl.item_id = itemtbl.item_id');
        $this->db->join('quantity_master as qtytbl', 'itemtbl.qt_id = qtytbl.qt_id');
        $this->db->join('farm_master as farmtbl', 'mastertbl.farm_id = farmtbl.farm_id');
        $this->db->where('mastertbl.outgoing_challan_no !=','0');
        $query = $this->db->get();
        
        return $query->result();
    } 
		function getInventory()
    {
        $this->db->select('mastertbl.created_at as created,mastertbl.*,itemtbl.item_name,qtytbl.qt_name,farmtbl.farm_name,itemtbl.distribution_limit');
        $this->db->from('inventory as mastertbl');
		$this->db->join('item_master as itemtbl', 'mastertbl.item_id = itemtbl.item_id');
		$this->db->join('quantity_master as qtytbl', 'itemtbl.qt_id = qtytbl.qt_id');
		$this->db->join('farm_master as farmtbl', 'mastertbl.farm_id = farmtbl.farm_id');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }  
	
		
		function getInventoryById( $inv_id )
    {
        $this->db->select('*');
        $this->db->from('inventory as mastertbl');
		$this->db->join('item_master as itemtbl', 'mastertbl.item_id = itemtbl.item_id');
        $this->db->where('inv_id', $inv_id);
        $query = $this->db->get();
        
         return $query->row();
    }
	
	
  	 function deleteInventory( $inv_id )
    {
        $this->db->where('inv_id', $inv_id);
        $this->db->delete('inventory');
        return $this->db->affected_rows();
    }
	
	function checkIncomingChallan(){
		
		$today_date = date('Y-m-d') ;
		
		$this->db->select('*');
        $this->db->from('inventory as mastertbl');
        
		$this->db->where('created_at <', $today_date);
		$this->db->where('outgoing_challan_no', 0);
		// $this->db->or_where('outgoing_challan_no', NULL);
		
	
		$query = $this->db->get();
        
		// echo $this->db->last_query() ;
		// die() ;
         return $query->num_rows();
		
	}
	
	function checkToDistribute(){
	
		$this->db->select('*');
		$this->db->from('inventory as mastertbl');
		$this->db->where('outgoing_challan_no', 0);
		
		$query = $this->db->get();
        
        return $query->num_rows();
		
	}
	
	
	function checkfordeleteInventory(){
		
		$this->db->select('*');
		$this->db->from('inventory as mastertbl');
		$this->db->where('outgoing_challan_no', 0);
		
		$query = $this->db->get();
        
        return $query->num_rows();
		
	}
	
	
	function get_outgoing_challan(){
		
		$this->db->select('*');
        $this->db->from('inventory as mastertbl');
        
		$this->db->where('outgoing_challan_no !=', 0);
		$this->db->limit(1);
		$this->db->order_by('inv_id',"DESC");
		$query = $this->db->get();
        
		// echo $this->db->last_query() ;
		
		// die() ;
         return $query->row();
		
	}
	
		function delete_outgoing_challan( $fetched_outgoing_challan = NULL )
    {
		
		$updaterow = array( 'outgoing_challan_no' => 0) ;	
		$this->db->where('outgoing_challan_no', $fetched_outgoing_challan);
        $this->db->update('inventory', $updaterow);
        
		
		 $this->db->where('outgoing_challan_no', $fetched_outgoing_challan);
        $this->db->delete('item_distribution');
        return $this->db->affected_rows();
	
	}
	
	
	function getItemLimit( $item_id ){
		
		$today_date = date('Y-m-d H:i:s') ;
		$this->db->select('distribution_limit');
		$this->db->from('item_master as mastertbl');
		$this->db->where('item_id', $item_id);
		
		$query = $this->db->get();
        
         return $query->row();
	}
	
	function createIncominChallan(){
		
		$today_date = date('Y-m-d H:i:s') ;
		
		$this->db->select('*') ;
		$this->db->from('inventory') ;
		$query = $this->db->get() ;
		$numofrow = $query->num_rows();
		
		if($numofrow	==0	){ 
			$incoming_challan=1;
		}else{
			
			$this->db->select('incoming_challan_no') ;
			$this->db->from('inventory') ;
			$this->db->limit(1);
			$this->db->order_by('inv_id',"DESC");
			$query = $this->db->get() ;
			$getrecentRow =  $query->row();
			
			$recenet_row_incoming_no = $getrecentRow->incoming_challan_no ; 
			
				$this->db->select('*') ;
				$this->db->from('inventory') ;
				$this->db->where('created_at', $today_date);
				$query2 = $this->db->get() ;
				$todayDaterow = $query2->num_rows();
				
					if( $todayDaterow != 0 ){
						 $incoming_challan = $recenet_row_incoming_no	;
					}
					else{ 
						$incoming_challan= $recenet_row_incoming_no+1 ;
					}
		}
		
		return $incoming_challan ; 
	}	
	
	
	function getgroup()
    {
        $this->db->select('*');
        $this->db->from('group_master as mastertbl');
		// $this->db->join('item_master as itemtbl', 'mastertbl.item_id = itemtbl.item_id');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }  
	
	function getgroupById( $gp_id )
    {
        $this->db->select('*');
        $this->db->from('group_master as mastertbl');
		// $this->db->join('item_master as itemtbl', 'mastertbl.item_id = itemtbl.item_id');
        $this->db->where('gp_id', $gp_id);
        $query = $this->db->get();
        
         return $query->row();
    }
	
	
	
   function addNewGroup( $groupInfo )
    {
        $this->db->trans_start();
        $this->db->insert('group_master', $groupInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	 function editGroup($groupInfo, $gp_id)
    {
        $this->db->where('gp_id', $gp_id);
        $this->db->update('group_master', $groupInfo);
        
        return TRUE;
    }
	
	
 function deleteGroup( $gp_id )
    {
        $this->db->where('gp_id', $gp_id);
        $this->db->delete('group_master');
        return $this->db->affected_rows();
    }
	
	
	
   function getfarm()
    {
        $this->db->select('*');
        $this->db->from('farm_master as mastertbl');
		// $this->db->join('item_master as itemtbl', 'mastertbl.item_id = itemtbl.item_id');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }  
	
   function getfarmById( $farm_id )
    {
        $this->db->select('*');
        $this->db->from('farm_master as mastertbl');
		// $this->db->join('item_master as itemtbl', 'mastertbl.item_id = itemtbl.item_id');
        $this->db->where('farm_id', $farm_id);
        $query = $this->db->get();
        
         return $query->row();
    }
	
	

  function addNewFarm( $farmInfo )
    {
        $this->db->trans_start();
        $this->db->insert('farm_master', $farmInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
  function editFarm($farmInfo, $farm_id)
    {
        $this->db->where('farm_id', $farm_id);
        $this->db->update('farm_master', $farmInfo);
        
        return TRUE;
    }
	
	 function deleteFarm( $farm_id )
    {
        $this->db->where('farm_id', $farm_id);
        $this->db->delete('farm_master');
        return $this->db->affected_rows();
    }
	
	
    function getItemDistribution()
    {
        $this->db->select('*,mastertbl.created_at as created,sum(mastertbl.qt_distributed) as total_quantity');
        $this->db->from('item_distribution as mastertbl');
		//$this->db->join('inventory as invtbl', 'mastertbl.inv_id = invtbl.inv_id');
		$this->db->join('item_master as itemtbl', 'itemtbl.item_id = mastertbl.item_id');        
        $this->db->join('quantity_master as qtytbl', 'itemtbl.qt_id = qtytbl.qt_id');
		$this->db->join('tbl_users as usertbl', 'mastertbl.user_id = usertbl.userId');
        $this->db->group_by('mastertbl.outgoing_challan_no,mastertbl.user_id,mastertbl.item_id');
        $this->db->order_by('mastertbl.outgoing_challan_no','DESC');
        $this->db->order_by('mastertbl.user_id','ASC');
        $this->db->order_by('mastertbl.item_id','ASC');
        // $this->db->where('roleId !=', 1);
        // $str=$this->db->last_query();
        // $this->db->save_queries = TRUE;
        // $str = $this->db->last_query();
        // echo $str;
        $query = $this->db->get();
       //echo $str = $this->db->last_query(); die;
        return $query->result();
    }  
    function getSerial($user_id)
    {
        $this->db->select('clients.serial_no');
        $this->db->from('clients');
        $this->db->where('usr_id', $user_id);
        // $str=$this->db->last_query();
        // $this->db->save_queries = TRUE;
        // $str = $this->db->last_query();
        // echo $str;
        $query = $this->db->get();
       //echo $str = $this->db->last_query(); die;
        $res= $query->result();
        // echo $str = $this->db->last_query(); die;
        //echo "<pre>"; print_r($res); die;
         return $res[0]->serial_no;
    }  
	
	function getItemDistributionById( $itm_dist_id )
		
     {
        $this->db->select('*');
        $this->db->from('inventory as mastertbl');
		$this->db->join('inventory as invtbl', 'mastertbl.inv_id = invtbl.inv_id');
		$this->db->join('item_master as itemtbl', 'invtbl.item_id = itemtbl.item_id');
		$this->db->join('tbl_users as usertbl', 'mastertbl.user_id = usertbl.userId');
        $this->db->where('inv_id', $itm_dist_id);
        $query = $this->db->get();
        
         return $query->row();
     }
	
	
	 function addNewItemDistribution( $itm_distInfo )
    {
        $this->db->trans_start();
        $this->db->insert('item_distribution', $itm_distInfo);
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	 function getUsersInfo( )
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        // $this->db->where('isDeleted', 0);
		// $this->db->where('roleId !=', 1);
        // $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    } 
	
	
	    // tanveer
    function getRowItemDistribution($item_id)
    {
        $this->db->select('item_distribution.user_id');
        $this->db->from('item_distribution');
        $this->db->join('clients', 'item_distribution.user_id = clients.usr_id');        
        $this->db->where('item_distribution.item_id',$item_id);
        $this->db->where('clients.status',1);
        $this->db->order_by('item_distribution.itm_dist_id','desc');
        $this->db->limit('1');
        $query = $this->db->get();
        
        return $query->row();
    } 
    function getUserIdFromSr($serial_no){

        $this->db->select('usr_id');
        $this->db->from('clients');
        $this->db->where('serial_no',$serial_no);
        $query = $this->db->get();        
        return $query->row();

    }
    function getInventoryAutomatic()
    {
        $this->db->select('*');
        $this->db->from('inventory');
        //$this->db->join('item_master', 'inventory.item_id = item_master.item_id');
        //$this->db->join('farm_master', 'inventory.farm_id = farm_master.farm_id');
        $this->db->where('inventory.outgoing_challan_no', '0');
        $query = $this->db->get();
        
        return $query->result();
    }  
    function getAllActiveClients(){
        $this->db->select('ct_id,serial_no');
        $this->db->from('clients');
        $this->db->where('clients.status','1');
        $query = $this->db->get();        
        return $query->result();
    }
    //////////
    function getLastUserSerial(){
        $this->db->select('serial_no');
        $this->db->from('clients');
        $this->db->order_by('ct_id','desc');
        $query = $this->db->get();        
        return $query->row();
    }
    function get_serial_id($usr_id){
        $this->db->select('serial_no');
        $this->db->from('clients');
        $this->db->where('clients.usr_id',$usr_id);
        $query = $this->db->get();        
        return $query->row();
    }
	function getLastDistrUserSerial($user_id){
        $this->db->select('serial_no');
        $this->db->from('clients');
        $this->db->where('clients.usr_id =',$user_id);
        $query = $this->db->get();        
        return $query->row();
    }
    function getOutgoingChallan(){
        $this->db->select('outgoing_challan_no');
        $this->db->from('inventory');
        $this->db->where('inventory.outgoing_challan_no !=',0);
        $query = $this->db->get();        
        return $query->result();
    }
    function getOutgoingChallanforDistrb(){

        $this->db->select('outgoing_challan_no');
        $this->db->from('inventory');
        $this->db->where('inventory.outgoing_challan_no!=',0);        
        $this->db->order_by('inv_id','desc');
        $this->db->limit('1');
        $query = $this->db->get();
              
        return $query->row();
    }

    function get_all_details(){
        $this->db->select('user_detail_tbl.*,tbl_users.name,tbl_users.email');
        $this->db->from('user_detail_tbl');
        $this->db->join('tbl_users','tbl_users.userId = user_detail_tbl.userid');
        $this->db->order_by('user_detail_tbl.id','DESC');
        $row = $this->db->get()->result_array();
        return $row;
    }

     function updateoutgoingChallan($outgoingChallan)
    {
        $this->db->where('outgoing_challan_no', 0);
        $this->db->update('inventory', $outgoingChallan);
        
        return TRUE;
    }
    function getItemDistribution_rows($outgoing_challan_no)
    {
        //$sql="SELECT DISTINCT MEMBER_NO,Outgoing_Challan_No,Distributed_date,Group_Number,Group_Name  FROM CHALLAN WHERE OUTGOING_CHALLAN_NO =1 ORDER BY Group_Number,MEMBER_NO ";
        $sql="SELECT DISTINCT(`mastertbl`.user_id),`mastertbl`.outgoing_challan_no, `mastertbl`.`created_at` as `created`,`usertbl`.name,`usertbl`.gp_id,`grptbl`.gp_name FROM `item_distribution` as `mastertbl` JOIN  `tbl_users` as `usertbl` ON `mastertbl`.`user_id` = `usertbl`.`userId` JOIN `group_master` as `grptbl` ON `grptbl`.`gp_id` = `usertbl`.`gp_id` where `mastertbl`.outgoing_challan_no=".$outgoing_challan_no." group by `mastertbl`.user_id order by `usertbl`.gp_id asc,`mastertbl`.user_id asc";
        $query=$this->db->query($sql);
        return $array_row = $query->result_array();

    }

    function getItemDistribution_cols($outgoing_challan_no)
    {
        //$sql="SELECT DISTINCT ITEM_CODE,ITEM FROM CHALLAN WHERE OUTGOING_CHALLAN_NO =1 ORDER BY ITEM_CODE";
        $sql="SELECT DISTINCT(`mastertbl`.item_id),`itemtbl`.item_name FROM `item_distribution` as `mastertbl` JOIN `item_master` as `itemtbl` ON `mastertbl`.`item_id` = `itemtbl`.`item_id` where `mastertbl`.outgoing_challan_no=".$outgoing_challan_no." order by `mastertbl`.item_id asc";
        $query=$this->db->query($sql);
        return $array_row = $query->result_array();
    }
    
    function getItemDistribution_colsItems($outgoing_challan_no,$item_code,$User_ID){
        $sql="Select Sum(`mastertbl`.qt_distributed) as qt_distributed from item_distribution as `mastertbl` where `mastertbl`.outgoing_challan_no=".$outgoing_challan_no." AND `mastertbl`.item_id=".$item_code." AND `mastertbl`.user_id=".$User_ID;
        //$sql="SELECT Member_No,Item_code,Quantity,Unit FROM CHALLAN WHERE OUTGOING_CHALLAN_NO =1";
        $query=$this->db->query($sql);
        $array_row = $query->result_array();
        //echo "<pre>"; print_r($array_row ); die;
        if(!empty($array_row) && isset($array_row[0]) && ($array_row[0]['qt_distributed']!='')){
            $qty=$array_row[0]['qt_distributed'];
        }
        else{
            $qty='';
        }
        return $qty;
    }
    function getItemDistribution_csv()
    {
        // $this->db->select('*');
        $this->db->select('grptbl.gp_id, grptbl.gp_name, usertbl.userId, usertbl.name, itemtbl.item_id, itemtbl.item_name, mastertbl.created_at, invtbl.quantity, qtytbl.qt_name, mastertbl.outgoing_challan_no');
        $this->db->from('item_distribution as mastertbl');
        $this->db->join('inventory as invtbl', 'mastertbl.inv_id = invtbl.inv_id');
        $this->db->join('item_master as itemtbl', 'invtbl.item_id = itemtbl.item_id');
        $this->db->join('quantity_master as qtytbl', 'qtytbl.qt_id = itemtbl.qt_id');
        $this->db->join('tbl_users as usertbl', 'mastertbl.user_id = usertbl.userId');
        $this->db->join('group_master as grptbl', 'grptbl.gp_id = usertbl.gp_id');
        // $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result_array();
    }  
    
    function getmod($a,$b){

        $query=$this->db->query("select MOD($a,$b) as mods from tbl_users limit 1");
        
        $array_row = $query->result_array();
        return $array_row[0]["mods"];
        //echo "hi <pre>"; print_r($array_row); echo "</pre>";die;

    }
    function get_serialno($user_id){
        $query=$this->db->query("select serial_no from clients where usr_id=".$user_id);
        
        $array_row = $query->result_array();
        return $array_row[0]["serial_no"];
    }
    // function getLastDistrUserSerial($user_id,$item_id){
    //     $this->db->select('clients.serial_no');
    //     $this->db->from('item_distribution');
    //     $this->db->join('clients', 'clients.usr_id = item_distribution.user_id');
    //     $this->db->where('item_distribution.user_id =', $user_id);
    //     $this->db->where('item_distribution.item_id =', $item_id);
    //     $query = $this->db->get();        
    //     return $query->row();
    // }
	
	
}

  