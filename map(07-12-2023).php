<?php
require_once("include/config.php");
require_once("include/functions.php");

    // $query = "
    //     select place.lat, place.lng, event.color, place.place_name, user_event.content
    //     from tbl_event_category_master as user_event 
    //     LEFT JOIN tbl_places as place on user_event.city_id = place.id 
    //     LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id 
    //     where  user_event.user_id = '".$_SESSION['user_id']."'
    // ";
// $query = "
// select place.lat, place.lng, event.color, place.place_name, user_event.content
// from tbl_event_category_admin as user_event 
// LEFT JOIN tbl_places as place on user_event.city_id = place.id 
// LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id     
// ";
$query = "
select user_event.lat_location as lat, user_event.long_location as lng, event.color, user_event.place_location as place_name, user_event.content
from tbl_event_category_admin as user_event  
LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id     
";
    $result = mysqli_query($con, $query);

    $iNumRows = mysqli_num_rows($result);

    $markerData = array();

    if ($iNumRows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $markerData[] = $data;
        }
    } else {
        $_SESSION['sessionMsg'] = "No Data Found";
    }

   // echo "<pre>"; print_r($markerData); echo "</pre>";
?>

<link rel="stylesheet" href="css/map.css">

<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>

.revBtn {
    min-width: 108px!important;
    margin-right: 0;
    float: right;
    margin-left: 5px;
    text-align: center;
}
.OuterSecMap { float:right; width:17%; position:absolute;left: 83%;top: 41%;padding: 0 5px; background:#fff;}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY&sensor=false&libraries=places"></script>



<script>
   
	           

function initMap() {
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
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(100);
    
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if(count($markerData) > 0){ 
            foreach($markerData as $marker){ 
                // echo '["'.$marker['place_name'].'", '.$marker['lat'].', '.$marker['lng'].', "'.$marker['color'].'"],'; 
                echo '["'.$marker['place_name'].'", '.$marker['lat'].', '.$marker['lng'].', "'.$marker['color'].'"],'; 
            } 
        } 
        ?>
    ];
    //console.log(markers);
                        
    // Info window content
    var infoWindowContent = [
        <?php if(count($markerData) > 0){ 
            foreach($markerData as $marker){ ?>
                ['<div class="info_content">' +
                '<h3><?php echo $marker['place_name']; ?></h3>' +
                '<p><?php echo $marker['text']; ?></p>' + '</div>'],
        <?php } 
        } 
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        // let url = "http://maps.google.com/mapfiles/ms/icons/";
        // url += markers[i][3] + ".png";
        let url = "uploads/map_img/"+markers[i][3]+".png";
        
        //console.log(url);

        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: url,
            // icon:"http://maps.google.com/mapfiles/ms/icons/yellow.png",
            // icon: markers[i][3],
            title: markers[i][0]
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
                //infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.setContent(contentt);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);

    }
    // map.setCenter(new google.maps.LatLng(25.761700, -80.191788));   
    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(11);
        this.setCenter({lat:25.761700,lng:-80.191788});
        google.maps.event.removeListener(boundsListener);
    });
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
//map.setCenter(marker.getPosition());

</script>
<div class="calendar_map">

      <div class="window-btn window-btn2">
        <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true" title="Maximize"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>

	 
     <div style="height:100%; width:100%;">
        <div id="mapCanvas" style="float:left; width:100%"> 

     <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d162610.17124434028!2d-80.30909536182102!3d25.763590428404584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b0a20ec8c111%3A0xff96f271ddad4f65!2sMiami%2C+FL%2C+USA!5e0!3m2!1sen!2sin!4v1520427639617" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->

        </div>  
        <div class="OuterSecMap">
        <div class="review-btns revBtn show_timeline orange-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="0" class="EventClickk" usr_id="<?php echo $_SESSION['user_id'];?>">
                                            <span id="0">
                                                All
                                            </span>
                                        </a>
                                    </div>
              <div class="review-btns revBtn show_timeline lemon-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="1" class="EventClickk">
                                             <span id="1" usr_id="<?php echo $_SESSION['user_id'];?>" sess_id="">
                                             People
                                            </span>
                                        </a>
                                    </div>
                                    <div class="review-btns revBtn show_timeline blue-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="3" class="EventClickk" usr_id="<?php echo $_SESSION['user_id'];?>">
                                            <span id="3">
                                                Place
                                            </span>
                                        </a>
                                    </div>          
                                    <div class="review-btns revBtn show_timeline red-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="2" class="EventClickk" usr_id="<?php echo $_SESSION['user_id'];?>">
                                            <span id="2">
                                                Things
                                            </span>
                                        </a>
                                    </div>     
                                    <div class="review-btns revBtn show_timeline yellow-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="4" class="EventClickk" usr_id="<?php echo $_SESSION['user_id'];?>">
                                            <span id="4">
                                                Activities
                                            </span>
                                        </a>
                                    </div> 
        </div>
    </div>
</div>

<style type="text/css">
    html, body, #map-wrapper, #mapCanvas {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}



#propertymap .gm-style-iw{
    box-shadow:none;
    color:#515151;
    font-family: "Georgia", "Open Sans", Sans-serif;
    text-align: center;
    width: 100% !important;
    border-radius: 0;
    left: 0 !important;
    top: 20px !important;
}

 #propertymap .gm-style > div > div > div > div > div > div > div {
    background: none!important;
}

.gm-style > div > div > div > div > div > div > div:nth-child(2) {
     box-shadow: none!important;
}
 #propertymap .gm-style-iw > div > div{
    background: #FFF!important;
}

 #propertymap .gm-style-iw a{
    text-decoration: none;
}

 #propertymap .gm-style-iw > div{
    width: 245px !important
}

 #propertymap .gm-style-iw .img_wrapper {
    height: 150px;  
    overflow: hidden;
    width: 100%;
    text-align: center;
    margin: 0px auto;
}

 #propertymap .gm-style-iw .img_wrapper > img {
    width: 100%;
    height:auto;
}

 #propertymap .gm-style-iw .property_content_wrap {
    padding: 0px 20px;
}

 #propertymap .gm-style-iw .property_title{
    min-height: auto;
}
</style>
<script>


$(document).on("click",".EventClickk", function(e){
    e.preventDefault();
    var actId=$(this).attr('id');
    $.ajax({
             type:"GET",             
            dataType: 'JSON',
             url:"ajaxfileSitemap.php",
             data:{act_id:actId},
            success:function(markers){
                getMap(markers);
             }
          });
    

});

$(document).ready(function(){
    var without_act_id=0;
    $.ajax({
             type:"GET",             
            dataType: 'JSON',
             url:"ajaxfile.php",
             data:{without_act_id:without_act_id},
            success:function(markers){
                getMap(markers);
             }
          });
    

});

function getMap(markers){

               var latlng = new google.maps.LatLng(42.745334, 12.738430);
               var map;
               //var markers=[];
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
                //  $("#mapCanvas").html("");
                // Display a map on the web page
                map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
                map.setTilt(100);
                if((markers.length) > 0){ 
                    var lengthhh=markers.length;
                console.log("lengthhh "+lengthhh);
                 // Add multiple markers to map
                var infoWindow = new google.maps.InfoWindow(), markers, i;
                    for( i = 0; i < markers.length; i++ ) {

                                //console.log( markers[i]['place_name']+'","'+markers[i]['lat']+'","'+markers[i]['lng']+'","'+markers[i]['color']); 
                              //  let url = "http://maps.google.com/mapfiles/ms/icons/";
                              //   url += markers[i]['color'] + ".png";
                              let url = "uploads/map_img/"+markers[i]['color']+".png";
                                
                                //console.log(url);

                                var position = new google.maps.LatLng(markers[i]['lat'], markers[i]['lng']);
                                bounds.extend(position);
                                marker = new google.maps.Marker({
                                    position: position,
                                    map: map,
                                    icon: url,
                                    // icon:"http://maps.google.com/mapfiles/ms/icons/yellow.png",
                                    // icon: markers[i][3],
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
                                

                                 google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                      
                                        infoWindow.setContent(contentt);
                                        infoWindow.open(map, marker);
                                    }
                                })(marker, i));

                                // Center the map to fit all markers on the screen
                                map.fitBounds(bounds);


                            }
                            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                                this.setZoom(11);
                                this.setCenter({lat:25.761700,lng:-80.191788});
                                google.maps.event.removeListener(boundsListener);
                            }); 
                
                     };

}


</script>


