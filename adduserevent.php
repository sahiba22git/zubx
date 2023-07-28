<?php
session_start();  
  require_once("include/config.php");
  require_once("include/functions.php");
  $user = new User();   
$userid=$_SESSION['user_id'];

if(isset($_FILES['file']['name']))
{

	$src = $_FILES['file']['tmp_name'];

	$targ = "uploads/site_map".$_FILES['file']['name'];

	if(isset($_FILES['file']['name']) && $_FILES['file']['size'] > 0)
        {
        	$uploaddir  = 'uploads/site_map/';
        	$exp = explode(".", basename($_FILES['file']['name']));
        	$ext      = end($exp);
            $filename   = time() . mt_rand().".".$ext;
            $uploadfile = $uploaddir . $filename;
            $file_type = $_FILES['file']['type'];      
	        if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
                {                                         	
                  $img_path=$uploadfile;
					
                }             
	    }
}
else{
  $img_path=0;
}

        $event_id = $_SESSION['activity_id'];
        $lat_location=$_POST['lat_location']; 
        $long_location=$_POST['long_location']; 
        $place_location=$_POST['place_location']; 
        $eventDisc = $_POST['eventDisc'];        
        $dtime = explode(' ', $_POST['datetime']);
     	$edate=$dtime[0];
        $etime=$dtime[1];
        $query=$user->insert_records('tbl_event_category_master',array("img_path"=>$img_path,"user_id"=>$userid,"event_category_id"=>$event_id,"content"=>$eventDisc,"date"=>$edate,"time"=>$etime,"add_date"=>date("Y-m-d"),"lat_location"=>$lat_location,"long_location"=>$long_location,"place_location"=>$place_location));
        $result = 1;
 
?>