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

		if (isset($_SESSION['type'])) {	
			if($_SESSION['type'] == 2)
			{
				$userIdFinal = $_SESSION['friend_id'];
			}
			else{
				$userIdFinal =$_SESSION['user_id'];
			}
		}
		else{
			$userIdFinal =$_SESSION['user_id'];
		}
	 $recentsQry = "select tbl_event_category_master.*,tbl_event_category_master.place_location as place_name FROM tbl_event_category_master WHERE tbl_event_category_master.event_category_id = '".$_SESSION['activity_id']."'
	AND tbl_event_category_master.user_id = '".$userIdFinal."'
	ORDER BY  tbl_event_category_master.id DESC, tbl_event_category_master.add_date DESC LIMIT 5 ";

	$recentActivities = array();
	$result = mysqli_query($con, $recentsQry);
	//print_r($con);
	//echo var_dump($result); 
	if($result!=false){
	$iNumRows = mysqli_num_rows($result);
		if (($iNumRows > 0)) {
			while ($data = mysqli_fetch_assoc($result)) {
				$recentActivities[] = $data;
			}
		}
	}
	

	$recentQry = "select tbl_event_category_master.*, tbl_event_category_master.place_location as place_name FROM tbl_event_category_master	
	WHERE tbl_event_category_master.event_category_id = '".$_SESSION['activity_id']."'
	AND tbl_event_category_master.user_id = '".$userIdFinal."'
	ORDER BY tbl_event_category_master.add_date DESC, tbl_event_category_master.id DESC LIMIT 1 ";

	$recentActivity = array();
	$result = mysqli_query($con, $recentQry);
	if($result!=false){
		$iNumRows = mysqli_num_rows($result);
		if ($iNumRows > 0) {
			while ($data = mysqli_fetch_assoc($result)) {
				$recentActivity = $data;
			}
		}
	}

	$markerquery = "select user_event.lat_location as lat, user_event.long_location as lng, user_event.place_location as place_name, user_event.content,event.color from tbl_event_category_master as user_event LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id where user_event.user_id = '".$userIdFinal."' AND user_event.event_category_id = '".$_SESSION['activity_id']."' order by user_event.id desc";

    $result = mysqli_query($con, $markerquery);
	if($result!=false){
	    $iNumRows = mysqli_num_rows($result);

	    $markerData = array();

	    if ($iNumRows > 0) {
	        while ($data = mysqli_fetch_assoc($result)) {
	            $markerData[] = $data;
	        }
	        //echo "<pre>";print_r($markerData);die;
	    }
	}

} catch (Exception $e) {
	echo "Error" . $e->getMessage();
}

?>

<link rel="stylesheet" href="css/activity.css">
<style>
	.activity-hr{ border-top: 0px!important; }
</style>
<form class="activity activity1" method="post" enctype="multipart/form-data" id="FormPersonalProf" style="background: black !important; z-index: 999;">
	<div style="float:left; width:100%; max-height: 40px;">
    	<img src="img/profile_head_review.png" class="img-responsive profile-head headerimg" style="width: 98%; flat:left; height:61px!important;">
	</div style="float:right; width:20%;">

	<h3 class="activity-main-title"><!-- Activity --></h3>
	<div class="window-btn window-btn2" style="position: absolute;
    top: 0;
    right: 5px;
    background: #fff;">
	    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-activity-t"></button>
	       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-activity-t" ></button>
	        <button type="button" class="fa fa-window-maximize" aria-hidden="true" id="restore-activity-maximize-t" style="display: none"></button>
	        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-activity-t"></button>
	</div>
	<div class="container" style="width: inherit;">
		<div class="row">
			<div class="col-md-12" style="top: 26px; left:28px;">
				<button class="btn btn-green <?php echo($_SESSION['type'] != 1)?'f-prof-session':'' ?> session-store <?php echo($_SESSION['activity_id']==1)?'sess-green':'' ?>" id="1" f_id="<?php echo($_SESSION['type'] != 1)?'f-prof-session':'' ?>" finalUserId="<?php echo($_SESSION['type'] != 1)?$_SESSION['friend_id']:$_SESSION['user_id'] ?>" >People</button>
				<button class="btn btn-blue <?php echo($_SESSION['type'] != 1)?'f-prof-session':'' ?>  session-store <?php echo($_SESSION['activity_id']==3)?'sess-blue':'' ?>" id="3" f_id="<?php echo($_SESSION['type'] != 1)?'f-prof-session':'' ?>" finalUserId="<?php echo($_SESSION['type'] != 1)?$_SESSION['friend_id']:$_SESSION['user_id'] ?>">Places</button>
				<button class="btn btn-red <?php echo($_SESSION['type'] != 1)?'f-prof-session':'' ?>  session-store <?php echo($_SESSION['activity_id']==2)?'sess-red':'' ?>" id="2" f_id="<?php echo($_SESSION['type'] != 1)?'f-prof-session':'' ?>" finalUserId="<?php echo($_SESSION['type'] != 1)?$_SESSION['friend_id']:$_SESSION['user_id'] ?>">Things</button>
				<button class="btn btn-yellow <?php echo($_SESSION['type'] != 1)?'f-prof-session':'' ?>  session-store <?php echo($_SESSION['activity_id']==4)?'sess-yellow':'' ?>" id="4" f_id="<?php echo($_SESSION['type'] != 1)?'f-prof-session':'' ?>" finalUserId="<?php echo($_SESSION['type'] != 1)?$_SESSION['friend_id']:$_SESSION['user_id'] ?>">Activities</button> <br>
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
		                <?php //echo "<pre>"; print_r($_SESSION); echo "</pre>";?>
		                <?php if($_SESSION['type'] == 1){ ?>
		                <div class="form-group" style="margin-bottom: 6px!important;">
		                    <label class="col-form-label" style="display: none;">Description</label>
		                    <textarea class="form-control" name="eventDisc" id="eventDisc"></textarea>
		                </div>
                    <div class="form-group" style="margin-bottom: 6px!important;">
		                    <label class="col-form-label" style="color:#fff;">Upload Picture</label>
		                    <input type="file" name="file" id="fileToUpload">
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
					<div class="col-md-12" style="margin-bottom:5px">
						<!-- <div style="height:100%; width:100%;"> -->
					        <div id="mapActivity" class="mapActivityUserProfile">

					        </div>  
					    <!-- </div> -->
					</div>					
				</div>
				<!-- <div class="row">
					<div class="col-md-12" >
							<ul class="list-group">
								<?php foreach($recentActivities as $recent){ ?>
							  		<li class="list-group-item list-group-item-light">
							  			<b><?php echo $recent['place_name']; ?></b>
							  			<br><?php echo $recent['date'] ;?>
							  		</li>
								<?php } ?>
							</ul>
					</div>
				</div> -->
			</div>
			
			<div class="col-md-12" style="margin-top: 10px;">
					<div class="panel panel-default">
				      	<div class="panel-heading">Recent Activities</div>
				      	<div class="panel-body AfterOrOnSpotSearch">
				      			<?php 
				      			//echo "<pre>"; print_r($recentActivities); echo "</pre>";
				      			if(isset($recentActivities) && count($recentActivities)>0){ 
				      				
				      				foreach($recentActivities as $actii){
				      				?>
				      		<div class="row">
				      		
				      				
				      				<div class="col-xs-8">
				      					<label><?php echo $actii['place_name'];?> </label>
				      				</div>
				      				<div class="col-xs-4">
				      					<label><?php echo date(" F, d Y ", strtotime($actii['date'])); ?>  <?php echo $actii['time'];?> </label>
				      				</div>
				      				<div class="col-xs-12">
				      					<?php echo $actii['content'];?> 
				      				</div>
				      		</div>
			                    <?php }
			                } else{ ?>
			                	<div class="row">
			                    	<div class="col-xs-12">No Activity added yet!!</div>
			                    </div>
			                    <?php } ?>
				      		
				      	</div>
				    </div>
				</div>
			
		
		</div>
	</div>
</form>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script> -->
<script type="text/javascript">


          
       
   $(document).ready(function(){
 //$('#city_location').val(1);




   		$(document).on("click", ".session-store", function(){ 
    		var activity_id = $(this).attr('id');
        var f_id = $(this).attr('f_id');
        var finalUserId = $(this).attr('finalUserId');
    		 console.log("activity_id");
    		$.post('activity_id.php', {activity_id:activity_id}, function() 
    		{
    			// alert("success"+activity_id);
         	});
         	// location.reload();
          // if(f_id != "f-prof-session"){ var type =1;  var uidd ='<?php echo $_SESSION['user_id'];?>'; } else{ var type =2; var uidd = '<?php echo $_SESSION['friend_id'];?>'; }  ;            

              
            
    		$.ajax({
		        type:"POST",
		        dataType: 'html',
		        url:"activity.php",     
		        success:function(result){
		            $('.activity').html(result); 
		            $('.activity').css('display','block');
		            $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
		             var input = document.getElementById('city_location');    
		             var autocomplete = new google.maps.places.Autocomplete(input);

                  google.maps.event.addListener(autocomplete, 'place_changed', function () {
                        var place = autocomplete.getPlace();
                        document.getElementById('place_location').value = place.name;
                        document.getElementById('lat_location').value = place.geometry.location.lat();
                        document.getElementById('long_location').value = place.geometry.location.lng();

                    });
                    // initActivityMap();

                    $.ajax({
                            type:"GET",
                            dataType: 'JSON',
                            data:{activity_id:activity_id,profile_user_id: finalUserId},
                            url:"activityMap_ajax.php",     
                            success:function(data){                                          
                                                      var map;
                                                var bounds = new google.maps.LatLngBounds();
                                                var mapOptions = {
                                                          mapTypeId: 'roadmap',
                                                      styles: [
                                                          { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                                                          { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                                                          { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                                                          {
                                                            featureType: "administrative.locality",
                                                            elementType: "labels.text.fill",
                                                            stylers: [{ color: "#d59563" }],
                                                          },
                                                          {
                                                            featureType: "poi",
                                                            elementType: "labels.text.fill",
                                                            stylers: [{ color: "#d59563" }],
                                                          },
                                                          {
                                                            featureType: "poi.park",
                                                            elementType: "geometry",
                                                            stylers: [{ color: "#263c3f" }],
                                                          },
                                                          {
                                                            featureType: "poi.park",
                                                            elementType: "labels.text.fill",
                                                            stylers: [{ color: "#6b9a76" }],
                                                          },
                                                          {
                                                            featureType: "road",
                                                            elementType: "geometry",
                                                            stylers: [{ color: "#38414e" }],
                                                          },
                                                          {
                                                            featureType: "road",
                                                            elementType: "geometry.stroke",
                                                            stylers: [{ color: "#212a37" }],
                                                          },
                                                          {
                                                            featureType: "road",
                                                            elementType: "labels.text.fill",
                                                            stylers: [{ color: "#9ca5b3" }],
                                                          },
                                                          {
                                                            featureType: "road.highway",
                                                            elementType: "geometry",
                                                            stylers: [{ color: "#746855" }],
                                                          },
                                                          {
                                                            featureType: "road.highway",
                                                            elementType: "geometry.stroke",
                                                            stylers: [{ color: "#1f2835" }],
                                                          },
                                                          {
                                                            featureType: "road.highway",
                                                            elementType: "labels.text.fill",
                                                            stylers: [{ color: "#f3d19c" }],
                                                          },
                                                          {
                                                            featureType: "transit",
                                                            elementType: "geometry",
                                                            stylers: [{ color: "#2f3948" }],
                                                          },
                                                          {
                                                            featureType: "transit.station",
                                                            elementType: "labels.text.fill",
                                                            stylers: [{ color: "#d59563" }],
                                                          },
                                                          {
                                                            featureType: "water",
                                                            elementType: "geometry",
                                                            stylers: [{ color: "#17263c" }],
                                                          },
                                                          {
                                                            featureType: "water",
                                                            elementType: "labels.text.fill",
                                                            stylers: [{ color: "#515c6d" }],
                                                          },
                                                          {
                                                            featureType: "water",
                                                            elementType: "labels.text.stroke",
                                                            stylers: [{ color: "#17263c" }],
                                                          },
                                                        ]
                                                      };
                    
                                              // Display a map on the web page
                                              map = new google.maps.Map(document.getElementById("mapActivity"), mapOptions);
                                              map.setTilt(100);

                                              if(data.length>0){

                                                    var markers = data;

                                                    var infoWindowContent = data;
                                                    // Multiple markers location, latitude, and longitude
                                                        
                                                    // Add multiple markers to map
                                                    var infoWindow = new google.maps.InfoWindow(), marker, i;
                                                    // Place each marker on the map  
                                                    //console.log(markers);
                                                    for( var i = 0; i < markers.length; i++ ) {
                                                        // let url = "http://maps.google.com/mapfiles/ms/icons/";
                                                        // url += markers[i]['color'] + ".png";
                                                        let url = "uploads/map_img/"+markers[i]['color']+".png";
                                                        var position = new google.maps.LatLng(parseFloat(markers[i]['lat']), parseFloat(markers[i]['lng']));
                                                        bounds.extend(position);
                                                        marker = new google.maps.Marker({
                                                            position: position,
                                                            map: map,
                                                            icon: url,
                                                            title: markers[i]['place_name']
                                                        });
                                                        
                                                        let contentt = "<div class='map_info_wrapper'><a href='#'><div class='img_wrapper'><img src="+markers[i]['img_path']+" style='width:230px; height:149px;'></div>"+
                            "<div class='property_content_wrap'>"+
                            "<div class='property_title' style='font-weight:500; padding:5px;'>"+
                            "<span>"+markers[i]['place_name']+"</span>"+
                            "</div>"+

                            "<div class='property_price' style=' padding:5px;'>"+
                            "<span>"+markers[i]['content']+"</span>"+
                            "</div>"+
                            "</div></a></div>";
                                                        // Add info window to marker    
                                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                                            return function() {
                                                              infoWindow.setContent(contentt);
                                        infoWindow.open(map, marker);
                                                            }
                                                        })(marker, i));
                                                        // Center the map to fit all markers on the screen
                                                        map.fitBounds(bounds);
                                                    }

                                                    // Set zoom level
                                                    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                                                      this.setZoom(11);    	
                                                      var lat_init=28.394857;
                                                      var long_init=84.12400799999999;
                                                     
                                                      if(markers[0]['lat']!=null || markers[0]['lat']!=undefined || markers[0]['lat']!=0){
                                                          lat_init=parseFloat(markers[0]['lat']);
                                                          long_init=parseFloat(markers[0]['lng']);
                                                      }
                                                      console.log("markers "+lat_init);
                                                      console.log("long_init "+long_init);
                                                      this.setCenter({lat:lat_init,lng:long_init});
                                                      google.maps.event.removeListener(boundsListener);
                                                    });
                                              }else{
                                                var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                                                      this.setZoom(11);    	
                                                      var lat_init=28.394857;
                                                      var long_init=84.12400799999999;
                                                      this.setCenter({lat:lat_init,lng:long_init});
                                                      google.maps.event.removeListener(boundsListener);
                                                    });
                                              }


                            }
                        });

		        }
		    });
		    return false;
		});

		$(document).on("click", "#search_event", function(){

			var days = "";  
		    days = $.trim($("#days").val()); 
		    var city_id = "";
		   // city_id = $("#city_id").val();
		    var datetime = "";
		    datetime = $("#datetime1").val();
		     var  lat_location = $("#lat_location").val();
		     var  long_location = $("#long_location").val();
		     var  place_location = $("#place_location").val();
		    if(days == '' || lat_location =='' || datetime =='' )
		    {
		      alert('Please fill all fileds on search event');
		    }
		    else
		    {
		        $.ajax({
		            type:"POST",
		            url:"searchuserevent.php",
		            data:{lat_location:lat_location,long_location:long_location,place_location:place_location,datetime:datetime,days:days},
		            success:function(result){ 
		                // alert('You have successfully add event.');  

		                $('#days').val(''); 
		                $('#datetime1').val('');
		                $('.activity').html(result); 
		                console.log("it Works.......");
		                var input = document.getElementById('city_location');    
				        var autocomplete = new google.maps.places.Autocomplete(input);

		               google.maps.event.addListener(autocomplete, 'place_changed', function () {
		                    var place = autocomplete.getPlace();
		                    document.getElementById('place_location').value = place.name;
		                    document.getElementById('lat_location').value = place.geometry.location.lat();
		                    document.getElementById('long_location').value = place.geometry.location.lng();

		                });
			            $('.activity').css('display','block');
			            $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'}); 
		                 
		                        $.ajax({
                        type:"POST",
                        dataType: 'JSON',
                        data:{datetime:datetime,days:days},
                        url:"activitySearchMap_ajax.php",     
                        success:function(data){
                            
                            var map;
                            var bounds = new google.maps.LatLngBounds();
                            var mapOptions = {
                                mapTypeId: 'roadmap',
                                                styles: [
                                        { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                                        { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                                        { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                                        {
                                          featureType: "administrative.locality",
                                          elementType: "labels.text.fill",
                                          stylers: [{ color: "#d59563" }],
                                        },
                                        {
                                          featureType: "poi",
                                          elementType: "labels.text.fill",
                                          stylers: [{ color: "#d59563" }],
                                        },
                                        {
                                          featureType: "poi.park",
                                          elementType: "geometry",
                                          stylers: [{ color: "#263c3f" }],
                                        },
                                        {
                                          featureType: "poi.park",
                                          elementType: "labels.text.fill",
                                          stylers: [{ color: "#6b9a76" }],
                                        },
                                        {
                                          featureType: "road",
                                          elementType: "geometry",
                                          stylers: [{ color: "#38414e" }],
                                        },
                                        {
                                          featureType: "road",
                                          elementType: "geometry.stroke",
                                          stylers: [{ color: "#212a37" }],
                                        },
                                        {
                                          featureType: "road",
                                          elementType: "labels.text.fill",
                                          stylers: [{ color: "#9ca5b3" }],
                                        },
                                        {
                                          featureType: "road.highway",
                                          elementType: "geometry",
                                          stylers: [{ color: "#746855" }],
                                        },
                                        {
                                          featureType: "road.highway",
                                          elementType: "geometry.stroke",
                                          stylers: [{ color: "#1f2835" }],
                                        },
                                        {
                                          featureType: "road.highway",
                                          elementType: "labels.text.fill",
                                          stylers: [{ color: "#f3d19c" }],
                                        },
                                        {
                                          featureType: "transit",
                                          elementType: "geometry",
                                          stylers: [{ color: "#2f3948" }],
                                        },
                                        {
                                          featureType: "transit.station",
                                          elementType: "labels.text.fill",
                                          stylers: [{ color: "#d59563" }],
                                        },
                                        {
                                          featureType: "water",
                                          elementType: "geometry",
                                          stylers: [{ color: "#17263c" }],
                                        },
                                        {
                                          featureType: "water",
                                          elementType: "labels.text.fill",
                                          stylers: [{ color: "#515c6d" }],
                                        },
                                        {
                                          featureType: "water",
                                          elementType: "labels.text.stroke",
                                          stylers: [{ color: "#17263c" }],
                                        },
                                      ]
                                                };
                                        
                            // Display a map on the web page
                            map = new google.maps.Map(document.getElementById("mapActivity"), mapOptions);
                            map.setTilt(100);


                            var markers = data;

                            var infoWindowContent = data;
                            // Multiple markers location, latitude, and longitude
                                
                            // Add multiple markers to map
                            var infoWindow = new google.maps.InfoWindow(), marker, i;

						    // Place each marker on the map  
						    for( var i = 0; i < markers.length; i++ ) {
						        // let url = "http://maps.google.com/mapfiles/ms/icons/";
						        // url += markers[i]['color'] + ".png";
                    let url = "uploads/map_img/"+markers[i]['color']+".png";
						        var position = new google.maps.LatLng(markers[i]['lat'], markers[i]['lng']);
						        bounds.extend(position);
						        marker = new google.maps.Marker({
						            position: position,
						            map: map,
						            icon: url,
						            title: markers[i]['place_name']
						        });
						        var input = document.getElementById('city_location');    
		             var autocomplete = new google.maps.places.Autocomplete(input);

               google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    var place = autocomplete.getPlace();
                    document.getElementById('place_location').value = place.name;
                    document.getElementById('lat_location').value = place.geometry.location.lat();
                    document.getElementById('long_location').value = place.geometry.location.lng();

                });
                let contentt = "<div class='map_info_wrapper'><a href='#'><div class='img_wrapper'><img src="+markers[i]['img_path']+" style='width:230px; height:149px;'></div>"+
                            "<div class='property_content_wrap'>"+
                            "<div class='property_title' style='font-weight:500; padding:5px;'>"+
                            "<span>"+markers[i]['place_name']+"</span>"+
                            "</div>"+

                            "<div class='property_price' style=' padding:5px;'>"+
                            "<span>"+markers[i]['content']+"</span>"+
                            "</div>"+
                            "</div></a></div>";
                                                        // Add info window to marker    
                                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                                            return function() {
                                                              infoWindow.setContent(contentt);
                                        infoWindow.open(map, marker);
                                                            }
						        })(marker, i));

						        // Center the map to fit all markers on the screen
						        map.fitBounds(bounds);

						    }

						    // Set zoom level
						    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
						        this.setZoom(11);
                    var lat_init=28.394857;
                      var long_init=84.12400799999999;
                      if(markers[0]['lat']!=null || markers[0]['lat']!=undefined || markers[0]['lat']!=0){
                          lat_init=markers[0]['lat'];
                          long_init=markers[0]['lng'];
                      }
						        this.setCenter({lat:lat_init,lng:long_init});
        						//this.setCenter({lat:25.761700,lng:-80.191788});
						        google.maps.event.removeListener(boundsListener);
						    });


                        }
                    });  
		                // location.reload();
		            }
		        });  
		    }
		});

   		$(document).on("click", "#save_event", function(){ 
		    var eventDisc = "";  
		    eventDisc = $.trim($("#eventDisc").val()); 
		    var city_id = "";
		    city_id = $("#city_id").val();
		     var  lat_location = $("#lat_location").val();
		     var  long_location = $("#long_location").val();
		     var  place_location = $("#place_location").val();
         var file_data = $('#fileToUpload').prop('files')[0];  
		     //alert(lat_location);
		    var datetime = "";
		    datetime = $("#datetime1").val();

		    if(eventDisc == '' || city_location =='' || lat_location =='' || datetime =='' || eventDisc == undefined )
		    {
		      alert('Please fill all fileds on add event');
		    }
		    else
		    {
          var form_data = new FormData($("#FormPersonalProf")[0]);                  
              form_data.append('file', file_data);
		        $.ajax({
		            type:"POST",
		            url:"adduserevent.php",
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data, 
		            //data:{lat_location:lat_location,long_location:long_location,place_location:place_location,datetime:datetime,eventDisc:eventDisc,file_data:file_data},
		            success:function(result){ 
		                alert('You have successfully add event.');  
		                $('#eventDisc').val(''); 
		                $('#datetime1').val(''); 

		                $.ajax({
                    type:"POST",
                    dataType: 'html',
                    url:"activity.php",     
                    success:function(result){
                                $('.activity').html(result); 
                                $('.activity').css('display','block');
                                $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
                                // initActivityMap();

                                $.ajax({
                                  type:"GET",
                                  dataType: 'JSON',
                                  url:"activityMap_ajax.php",     
                                  success:function(data){
                                      
                                          var map;
                                var bounds = new google.maps.LatLngBounds();
                                var mapOptions = {
                                    mapTypeId: 'roadmap',
                                styles: [
                                    { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                                    { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                                    { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                                    {
                                      featureType: "administrative.locality",
                                      elementType: "labels.text.fill",
                                      stylers: [{ color: "#d59563" }],
                                    },
                                    {
                                      featureType: "poi",
                                      elementType: "labels.text.fill",
                                      stylers: [{ color: "#d59563" }],
                                    },
                                    {
                                      featureType: "poi.park",
                                      elementType: "geometry",
                                      stylers: [{ color: "#263c3f" }],
                                    },
                                    {
                                      featureType: "poi.park",
                                      elementType: "labels.text.fill",
                                      stylers: [{ color: "#6b9a76" }],
                                    },
                                    {
                                      featureType: "road",
                                      elementType: "geometry",
                                      stylers: [{ color: "#38414e" }],
                                    },
                                    {
                                      featureType: "road",
                                      elementType: "geometry.stroke",
                                      stylers: [{ color: "#212a37" }],
                                    },
                                    {
                                      featureType: "road",
                                      elementType: "labels.text.fill",
                                      stylers: [{ color: "#9ca5b3" }],
                                    },
                                    {
                                      featureType: "road.highway",
                                      elementType: "geometry",
                                      stylers: [{ color: "#746855" }],
                                    },
                                    {
                                      featureType: "road.highway",
                                      elementType: "geometry.stroke",
                                      stylers: [{ color: "#1f2835" }],
                                    },
                                    {
                                      featureType: "road.highway",
                                      elementType: "labels.text.fill",
                                      stylers: [{ color: "#f3d19c" }],
                                    },
                                    {
                                      featureType: "transit",
                                      elementType: "geometry",
                                      stylers: [{ color: "#2f3948" }],
                                    },
                                    {
                                      featureType: "transit.station",
                                      elementType: "labels.text.fill",
                                      stylers: [{ color: "#d59563" }],
                                    },
                                    {
                                      featureType: "water",
                                      elementType: "geometry",
                                      stylers: [{ color: "#17263c" }],
                                    },
                                    {
                                      featureType: "water",
                                      elementType: "labels.text.fill",
                                      stylers: [{ color: "#515c6d" }],
                                    },
                                    {
                                      featureType: "water",
                                      elementType: "labels.text.stroke",
                                      stylers: [{ color: "#17263c" }],
                                    },
                                  ]
                                };
                  
                            // Display a map on the web page
                            map = new google.maps.Map(document.getElementById("mapActivity"), mapOptions);
                            map.setTilt(100);


                            var markers = data;

                            var infoWindowContent = data;
                            // Multiple markers location, latitude, and longitude
                                
                            // Add multiple markers to map
                            var infoWindow = new google.maps.InfoWindow(), marker, i;

                            // Place each marker on the map  
                            for( var i = 0; i < markers.length; i++ ) {
                                // let url = "http://maps.google.com/mapfiles/ms/icons/";
                                // url += markers[i]['color'] + ".png";
                                let url = "uploads/map_img/"+markers[i]['color']+".png";
                                var position = new google.maps.LatLng(markers[i]['lat'], markers[i]['lng']);
                                bounds.extend(position);
                                marker = new google.maps.Marker({
                                    position: position,
                                    map: map,
                                    icon: url,
                                    title: markers[i]['place_name']
                                });
                                
                                let contentt = "<div class='map_info_wrapper'><a href='#'><div class='img_wrapper'><img src="+markers[i]['img_path']+" style='width:230px; height:149px;'></div>"+
                            "<div class='property_content_wrap'>"+
                            "<div class='property_title' style='font-weight:500; padding:5px;'>"+
                            "<span>"+markers[i]['place_name']+"</span>"+
                            "</div>"+

                            "<div class='property_price' style=' padding:5px;'>"+
                            "<span>"+markers[i]['content']+"</span>"+
                            "</div>"+
                            "</div></a></div>";
                                                        // Add info window to marker    
                                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                                            return function() {
                                                              infoWindow.setContent(contentt);
                                        infoWindow.open(map, marker);
                                                            }
                                })(marker, i));

                                // Center the map to fit all markers on the screen
                                map.fitBounds(bounds);

                            }   
                          var input = document.getElementById('city_location');    
                                          var autocomplete = new google.maps.places.Autocomplete(input);

                                        google.maps.event.addListener(autocomplete, 'place_changed', function () {
                                              var place = autocomplete.getPlace();
                                              document.getElementById('place_location').value = place.name;
                                              document.getElementById('lat_location').value = place.geometry.location.lat();
                                              document.getElementById('long_location').value = place.geometry.location.lng();

                                          });
                              // Set zoom level
                              var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                                  this.setZoom(11);
                                  var lat_init=28.394857;
                                  var long_init=84.12400799999999;
                                  if(markers[0]['lat']!=null || markers[0]['lat']!=undefined || markers[0]['lat']!=0){
                                      lat_init=markers[0]['lat'];
                                      long_init=markers[0]['lng'];
                                  }
                                this.setCenter({lat:lat_init,lng:long_init});
                                //this.setCenter({lat:25.761700,lng:-80.191788});
                                google.maps.event.removeListener(boundsListener);
                              });


                          }
                      });
                    }
					        });
		                // location.reload();
		            }
		        });  
		    }
		  });

		$(document).on("click", "#close-activity-t", function(){
			$('.activity').hide();
			//$('.activity1').hide();
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




// Load initialize function
// google.maps.event.addDomListener(window, 'load', initActivityMap);

// var myButton = document.getElementsByClassName('addevent');
// console.log(myButton+" button");
// google.maps.event.addDomListener(myButton, 'click', initActivityMap);
</script>

<?php } ?>