<?php  
if (session_id() == ''){
	session_start();
}
require_once("include/config.php");
	require_once("include/functions.php");

	$user = new User();
	$cities = $user->select_allrecords('tbl_places','*');

	if ($_SERVER['HTTP_HOST'] == "localhost") {

		$SERVER = 'localhost';
		$USERNAME = 'root';
		$PASSWORD = '';
		$DATABASE = 'codesevenstudio';
	} else {
		$SERVER = 'localhost';
		$USERNAME = 'zuuboxco_eli';
		$PASSWORD = 'Qawsed@123';
		$DATABASE = 'zuuboxco_DB';
	}

    $con = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die('Oops connection error -> ' . mysqli_error($con));
if(isset($_POST['profile_user_id']))
{

?>

<?php
	
	$recentsQry = "select tbl_event_category_master.*,tbl_event_category_master.place_location as place_name FROM tbl_event_category_master WHERE tbl_event_category_master.event_category_id = '".$_POST['activity_id']."'
	AND tbl_event_category_master.user_id = '".$_POST['profile_user_id']."'
	ORDER BY  tbl_event_category_master.id DESC, tbl_event_category_master.add_date DESC LIMIT 5 ";

	

		 //$recentsQry = "select tbl_event_category_master.*, tbl_places.place_name FROM tbl_event_category_master LEFT JOIN tbl_places ON tbl_event_category_master.city_id = tbl_places.idWHERE tbl_event_category_master.event_category_id = ".$_POST['activity_id']."AND tbl_event_category_master.user_id = ".$_POST['profile_user_id']."ORDER BY  tbl_event_category_master.id DESC, tbl_event_category_master.add_date DESC LIMIT 5 ";

		$recentActivities = array();
		$result = mysqli_query($con, $recentsQry);
		$iNumRows = mysqli_num_rows($result);
		if ($iNumRows > 0) {
			while ($data = mysqli_fetch_assoc($result)) {
				$recentActivities[] = $data;
			}
		}
		$dataReq="";
		 if((($iNumRows)>0)){ 

				      				foreach($recentActivities as $acti){
				      				
				      		$dataReq.= '<div class="row">';
				      		
				      				
				      				$dataReq.= '<div class="col-xs-8">';
				      					$dataReq.= '<label>'.$acti["place_name"].'</label>';
				      				$dataReq.= '</div>';
				      				$dataReq.= '<div class="col-xs-4">';
				      					$dataReq.= '<label>'.date(" F, d Y ", strtotime($acti['date'])). " ".$acti['time'].' </label>';
				      				$dataReq.= '</div>';
				      				$dataReq.= '<div class="col-xs-12">'.$acti['content'].'</div>';
				      		$dataReq.= '</div>';
			                     }
			                } else{
			                	$dataReq.='<div class="row">';
			                    	$dataReq.= '<div class="col-xs-12">No Activity added yet!</div>';
			                    $dataReq.= '</div>';
			                    } 

			                    echo $dataReq; die;
	
}
else if(isset($_GET['act_id'])){
	if($_GET['act_id']==0){
				$query = "select user_event.img_path,place.lat, place.lng, event.color, place.place_name, user_event.content
		from tbl_event_category_master as user_event 
		LEFT JOIN tbl_places as place on user_event.city_id = place.id 
		LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id     
		";
	}
	else{
		$query = "
        select user_event.img_path,place.lat, place.lng, event.color, place.place_name, user_event.content
        from tbl_event_category_master as user_event 
        LEFT JOIN tbl_places as place on user_event.city_id = place.id 
        LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id where user_event.event_category_id=".$_GET['act_id']."     
    ";
	}
	
 	
    // $query="select * from tbl_places";

    $result = mysqli_query($con, $query);

    $iNumRows = mysqli_num_rows($result);

    $markerData = array();

    if ($iNumRows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $markerData[] = $data;
        }
    } 
    //print_r($markerData); die;
    //header('Content-Type: application/json');
    echo json_encode($markerData);die;
}
else if(isset($_GET['without_act_id'])){
	$query = "
        select user_event.img_path,place.lat, place.lng, event.color, place.place_name, user_event.content
        from tbl_event_category_master as user_event 
        LEFT JOIN tbl_places as place on user_event.city_id = place.id 
        LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id     
    ";
    // $query="select * from tbl_places";

    $result = mysqli_query($con, $query);

    $iNumRows = mysqli_num_rows($result);

    $markerData = array();

    if ($iNumRows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $markerData[] = $data;
        }
    } 
    //print_r($markerData); die;
    //header('Content-Type: application/json');
    echo json_encode($markerData);die;
}
?>