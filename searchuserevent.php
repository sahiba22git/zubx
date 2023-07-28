<?php 

if (session_id() == ''){
	session_start();
}
if(isset($_SESSION['user_id']) && isset($_SESSION['activity_id']))
{

?>
<?php
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
try{

	$dtime = explode(' ', $_POST['datetime']);
    $start_date = $dtime[0];
    $days = $_POST["days"];
    $end_date= date('Y-m-d', strtotime($start_date. ' + '.$days.' days'));
    $lat_location=$_POST['lat_location']; 
    $long_location=$_POST['long_location']; 
    $place_location=$_POST['place_location'];

    $recentsQry = "
        select user_event.lat_location as lat, user_event.long_location as lng, user_event.place_location as place_name, user_event.content,event.color from tbl_event_category_master as user_event LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id where  user_event.user_id = '".$_SESSION['friend_id']."' AND user_event.event_category_id = '".$_SESSION['activity_id']."'  AND DATE(user_event.add_date) <= '".$end_date."' AND DATE(user_event.add_date) >= '".$start_date."' ORDER BY user_event.add_date DESC, user_event.id DESC LIMIT 5 ";

	//$recentsQry = "select tbl_event_category_master.date, tbl_places.place_name FROM tbl_event_category_master LEFT JOIN tbl_places ON tbl_event_category_master.city_id = tbl_places.id WHERE tbl_event_category_master.event_category_id = '".$_SESSION['activity_id']."' AND tbl_event_category_master.user_id = '".$_SESSION['friend_id']."' AND DATE(tbl_event_category_master.add_date) <= '".$end_date."' AND DATE(tbl_event_category_master.add_date) >= '".$start_date."' ORDER BY tbl_event_category_master.add_date DESC, tbl_event_category_master.id DESC LIMIT 5 ";

	$recentActivities = array();
	$result = mysqli_query($con, $recentsQry);
	//echo "<pre>"; print_r($result); echo "</pre>";
	$iNumRows = mysqli_num_rows($result);
	if ($iNumRows > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			$recentActivities[] = $data;
		}
	}

	// $recentQry = "select tbl_event_category_master.*, tbl_places.place_name FROM tbl_event_category_master LEFT JOIN tbl_places ON tbl_event_category_master.city_id = tbl_places.id WHERE tbl_event_category_master.event_category_id = '".$_SESSION['activity_id']."'	AND tbl_event_category_master.user_id = '".$_SESSION['friend_id']."' AND DATE(tbl_event_category_master.add_date) <= '".$end_date."' AND DATE(tbl_event_category_master.add_date) >= '".$start_date."' ORDER BY tbl_event_category_master.add_date DESC, tbl_event_category_master.id DESC LIMIT 1 ";
 $recentQry = "
        select user_event.lat_location as lat, user_event.long_location as lng, user_event.place_location as place_name, user_event.content,event.color from tbl_event_category_master as user_event LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id where  user_event.user_id = '".$_SESSION['friend_id']."' AND user_event.event_category_id = '".$_SESSION['activity_id']."'  AND DATE(user_event.add_date) <= '".$end_date."' AND DATE(user_event.add_date) >= '".$start_date."' ORDER BY user_event.add_date DESC, user_event.id DESC LIMIT 1 ";
	$recentActivity = array();
	$result = mysqli_query($con, $recentQry);
	$iNumRows = mysqli_num_rows($result);
	if ($iNumRows > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			$recentActivity = $data;
		}
	}
$markerquery = "
        select user_event.lat_location as lat, user_event.long_location as lng, user_event.place_location as place_name, user_event.content,event.color from tbl_event_category_master as user_event LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id where  user_event.user_id = '".$_SESSION['friend_id']."' AND user_event.event_category_id = '".$_SESSION['activity_id']."'  AND DATE(user_event.add_date) <= '".$end_date."' AND DATE(user_event.add_date) >= '".$start_date."' ORDER BY user_event.add_date DESC, user_event.id DESC  ";
	//$markerquery = "select place.lat, place.lng, event.color, place.place_name, user_event.content        from tbl_event_category_master as user_event LEFT JOIN tbl_places as place on user_event.city_id = place.id         LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id         where  user_event.user_id = '".$_SESSION['friend_id']."' AND user_event.event_category_id = '".$_SESSION['activity_id']."' AND user_event.add_date <= '".$end_date."' AND user_event.add_date >= '".$start_date."'    ";

    $result = mysqli_query($con, $markerquery);

    $iNumRows = mysqli_num_rows($result);

    $markerData = array();

    if ($iNumRows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $markerData[] = $data;
        }
        //echo "<pre>";print_r($markerData);die;
    }

} catch (Exception $e) {
	echo "Error" . $e->getMessage();
}

?>
<link rel="stylesheet" href="css/activity.css">

<form class="activity" method="post" enctype="multipart/form-data" style="background: black !important;">
	<div style="float:left; width:100%; max-height: 40px;">
    	<img src="img/profile_head_review.png" class="img-responsive profile-head headerimg" style="width: 98%; flat:left; height:61px!important;">
	</div style="float:right; width:20%;">

        <!-- <img src="img/profile_head.png" class="img-responsive profile-head headerimg"> -->
		<div class="window-btn window-btn2" style="position: absolute;
	    top: 20px;
	    right: 5px;
	    ">
		    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-activity-t"></button>
		       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-activity-t" ></button>
		        <button type="button" class="fa fa-window-maximize" aria-hidden="true" id="restore-activity-maximize-t" style="display: none"></button>
		        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-activity-t"></button>
		</div>
	</div>
	<h3 class="activity-main-title">Activity</h3>
	<div class="container" style="width: inherit;">
		<div class="row">
			<div class="col-md-12" style="top: 26px; left:28px;">
				<button class="btn btn-green session-store <?php echo($_SESSION['activity_id']==1)?'sess-green':'' ?>" id="1">People</button>
				<button class="btn btn-blue session-store <?php echo($_SESSION['activity_id']==3)?'sess-blue':'' ?>" id="3">Places</button>
				<button class="btn btn-red session-store <?php echo($_SESSION['activity_id']==2)?'sess-red':'' ?>" id="2">Things</button>
				<button class="btn btn-yellow session-store <?php echo($_SESSION['activity_id']==4)?'sess-yellow':'' ?>" id="4">Activities</button> <br>
				<hr class="activity-hr">
			</div>
			<div class="col-md-9">
				<div class="col-md-12" style="margin-top: 10px;border: 1px solid #fff;">
				<div class="activity-card">
					<!-- <button type="button" class="close" data-dismiss="activity-card" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button> -->
					<form role="form" method="POST" enctype="multipart/form-data" name="add-form" id="add-form" >
						<div class="form-group" style="margin-bottom: 6px!important;">
		                    <label for="message-text" class="col-form-label"  >Location</label>
		                    <input type="text" class="form-control" name="city_location" id='city_location' style="width: 100%;">
		                    <input type="hidden" class="form-control" name="lat_location" id='lat_location' style="width: 100%;">
		                    <input type="hidden" class="form-control" name="place_location" id='place_location' style="width: 100%;">
		                    <input type="hidden" class="form-control" name="long_location" id='long_location' style="width: 100%;">
		                        
		                </div>

		               <!--  <div class="form-group" style="margin-bottom: 6px!important;">
		                    <label for="message-text" class="col-form-label" style="display: none;">Place</label>
		                    <select class="form-control" name="city" id='city_id' style="width: 53%;">
		                        <?php //foreach($cities as $city) { ?>
		                        <option value="<?php //echo $city['id'] ?>"><?php //echo $city['place_name'] ?></option>
		                    <?php // } ?>
		                   </select>
		                </div> -->
		                <?php if($_SESSION['type'] == 1){ ?>
		                <div class="form-group" style="margin-bottom: 6px!important;">
		                    <label class="col-form-label" style="display: none;">Description</label>
		                    <textarea class="form-control" name="eventDisc" id="eventDisc"></textarea>
		                </div>
		                <?php }else{ ?> 
		                <div class="form-group" style="margin-bottom: 6px!important;">
		                    <label class="col-form-label" style="display: none;">No of Days</label>
		                	<input type="text" class="form-control" name="days" id="days" placeholder="Enter Days">
		                </div>
		                <?php } ?> 
		                		                

		                <!-- <input type="hidden" name="event_id" id="event_id"> -->
		                <div class="form-group" style="margin-bottom: 6px!important;">
		                    <label for="recipient-name" class="col-form-label" style="display: none;">Date Time</label>
		                    <input type="text" class="form-control " name="datetime" id="datetime1" placeholder="YYYY-MM-DD HH:mm:ss">
		                </div>
		                <?php if($_SESSION['type'] == 1){ ?>
		                <button type="button" class="btn btn-primary" id="save_event">Save event</button> 
		                <?php }else{ ?> 
		                	<script>
		                		$(document).ready(function(){
		                		var usrImpId=<?php echo $_SESSION['friend_id']; ?>;
		                		//alert();
		                	
		                });
							    </script>
		                <button type="button" class="btn btn-primary" id="search_event">Search event</button>
		                <?php } ?> 
		            </form>
				</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<div class="col-md-12">
						<!-- <div style="height:100%; width:100%;"> -->
					        <div id="mapActivity">

					        </div>  
					    <!-- </div> -->
					</div>
					
					
				</div>
			</div>
			<!-- <div class="col-md-12">
						<ul class="list-group">
							<?php if(isset($recentActivities) && $recentActivities != null) { ?>
								<?php foreach($recentActivities as $recent){ ?>
							  		<li class="list-group-item list-group-item-light">
							  			<b><?php echo $recent['place_name']; ?></b>
							  			<br><?php echo $recent['date'] ;?>
							  		</li>
								<?php } ?>
							<?php }else{ ?>
								<li class="list-group-item list-group-item-light">
									<b>No Activity added yet!!</b>
								</li>
							<?php } ?>
						</ul>
			</div> -->
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top: 10px;">
				<div class="panel panel-default">
			      	<div class="panel-heading">Recent Activity</div>
			      	<div class="panel-body">
			      		<div class="row">
			      			<?php if(isset($recentActivity) && $recentActivity != null){ ?>
			      				<div class="col-xs-4">
			      					<label><?php echo $recentActivity['place_name'];?> </label>
			      				</div>
			      				<div class="col-xs-4">
			      					<label><?php echo date(" F, d Y ", strtotime($recentActivity['date'])); ?>  <?php echo $recentActivity['time'];?> </label>
			      				</div>
			      				<div class="col-xs-12">
			      					<?php echo $recentActivity['content'];?> 
			      				</div>
		                    <?php } else{ ?>
		                    	<div class="col-xs-12">No Activity added yet!!</div>
		                    <?php } ?>
			      		</div>
			      	</div>
			    </div>
			</div>
		
		</div>
	</div>
</form>
<script type="text/javascript">
   $(document).ready(function(){

   	$(document).on("click", "#close-activity-t", function(){
			$('.activity').hide();
			$('.activity').css('display', 'none');
		});	

		$(document).on("click", "#minimize-activity-t", function(){
			$('.activity').hide();
			$('.activity').css('display', 'none');
		});

		$(document).on("click", "#restore-activity-t", function(){
			$('#restore-activity-maximize-t').show();
			$('#restore-activity-t').hide();
		});

		$(document).on("click", "#restore-activity-maximize-t", function(){
			$('#restore-activity-t').show();
			$('#restore-activity-maximize-t').hide();
		});

    });

</script>
<?php } ?>