<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
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

  $user = new User();

  $uid = $_SESSION['user_id'];

  $cellid=$_REQUEST['id'];

$where = "cell_id=".$cellid;
$whereParent ="cell_parent=".$cellid;
$adminCellData=$user->select_records('tbl_celldetails','*', $where);
//echo "hiiStart <pre>"; print_r($adminCellData);echo "</pre>";
//$childCells=$user->select_records('tbl_cell','cell_id', $whereParent);

$queryChild = "select tbl_cell.cell_name,tbl_cell.cell_id,(select cell_name as parent_name from tbl_cell where cell_id=".$cellid.") as parent_name FROM tbl_cell WHERE ".$whereParent;
$resultChild = mysqli_query($con, $queryChild);
//$getCellChildrow = mysqli_fetch_assoc($resultChild);
$cellResultChildArr=[];
while($getCellChild = mysqli_fetch_assoc($resultChild)){
  $arr=["cell_id"=>$getCellChild['cell_id'],"cell_name"=>$getCellChild['cell_name'],"parent_name"=>$getCellChild['parent_name']];
  array_push($cellResultChildArr,$arr);


}
//echo "<pre>"; print_r($cellResultChildArr); echo "</pre>";
  $where = "cell_id=".$cellid." AND user_id=".$uid." AND status = 1 AND `image-path` IS NOT NULL";

  $slideData=$user->select_records('tbl_user_cell','*', $where);

  if($slideData == null){
    $where = "cell_id=".$cellid." AND section_id='slider'";
    $slideData=$user->select_records('tbl_celldetails','*', $where);
  }

?>
     <div class="post-scroll1">
     <div class="col-xs-3 right_bar">
      <div class="input-group">

         <div class="input-group-addon">

            <?php
           // print_r($getCellChildrow);
           if(isset($cellResultChildArr[0])){
            echo $cellResultChildArr[0]['parent_name'];
           }
             

            ?>

         </div>

         <div class="input-group-addon">

            <?php

          if(isset($cellResultChildArr[0])){
            echo $cellResultChildArr[0]['parent_name'];
          }
   

            ?>

         </div>

      </div>

      <div class="empty_box">



      </div>

      <ul class="nav">
      <?php   
      for($i=0; $i<count($cellResultChildArr);$i++){
      // while($cellResultChildArr)
      // { ?>
       <li>
        <a href="#" atr="<?php echo $cellResultChildArr[$i]['cell_id'];?>" class="tabcellChild btn btn-default btn-block"> <?php echo $cellResultChildArr[$i]['cell_name'];?></a> 
      </li> 
      <?php  } ?> 
        
        <?php // } ?>
        


      </ul>

     </div>

     <div class="col-xs-9">

       <div class="slider_cell ">

          <h3>Trending And News</h3>
          <?php /* ?>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->

            <div class="col-xs-12">

              <div class="row">

             <ol class="carousel-indicators">

                  <?php 
                  if(!empty($slidedata))
                  {
                    foreach ($slidedata as $rows)
                    {

                       $imagep=explode(',',$rows['image-path']);

                       $imgcount= count($imagep);

                     }


                  for($i = 0; $i < $imgcount; $i++) { ?>

                  <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" id="<?php echo $i; ?>"></li>

                <?php } 
              }?>  

              </ol>

              <!-- Wrapper for slides -->

              <div class="carousel-inner">

                <?php
                if(!empty($slidedata))
                {
                 $count=0;

                 $activestauts="";

                  foreach ($slidedata as $rows) 

                  {

                     $imagep=explode(',',$rows['image-path']);

                     $imgcount= count($imagep);

                    for ($i=0;$i<$imgcount;$i++)

                    {

                       if($i==0)

                    {

                      $activestauts="active";

                    }

                    else

                    {

                      $activestauts="";

                    }                 

                  

                    ?> 



                    <div class="item <?php echo $activestauts; ?>">  

                    

                      <img src="<?php echo $imagep[$i]; ?>" alt='images'>

                    </div>

                  <?php

                }

                }
              }

                ?>                  

                                

              </div>

              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">

                <span class="glyphicon glyphicon-chevron-left"></span>

                </a>

              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">

                <span class="glyphicon glyphicon-chevron-right"></span>

              </a>

            </div>

            <div id="carouselButtons">
			      <button id="playButton" type="button" class="btn btn-default btn-xs">
			          <span class="glyphicon glyphicon-play"></span>
			       </button>
			      <button id="pauseButton" type="button" class="btn btn-default btn-xs">
			          <span class="glyphicon glyphicon-pause"></span>
			      </button>
			</div>


            <script type="text/javascript">

              $('.carousel-control.left').click(function() {

              $('#myCarousel').carousel('prev');

            });

            $('.carousel-control.right').click(function() {

              $('#myCarousel').carousel('next');

            });

            </script>

            </div>

            </div>
            <?php */?>
            <?php if(isset($slideData) && !empty($slideData)){?>

            <div id="cellCarousel" class="carousel slide" data-ride="carousel" >
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <?php 
                for($i=0;$i<count($slideData);$i++){ ?>
                    <li data-target="#cellCarousel" data-slide-to="<?php echo $i ?>" <?php echo($i==0)?'class="active"':"" ?>></li>
                <?php }?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php 
                $i = 0;
                foreach($slideData as $row){ ?>
                  <div class="item <?php echo($i == 0)?'active':''; ?>" >
                      <img src="<?php echo $row['image-path']; ?>" alt='images' style="width: 100%;height: 200px;">
                  </div>
                <?php $i++; } ?>
              </div>
            </div>

            <?php }?>
       </div>



      <div class="row">
        <div class="col-xs-6"> 
            <div class="border"> 
              <h3>SECTION 1</h3>
              <?php
                $where = "cell_id=".$cellid." AND user_id=".$uid." AND status = 1 AND section_id=1";
                $userCellData=$user->select_records('tbl_user_cell','*', $where);

              if(isset($userCellData) && !empty($userCellData) && ($userCellData!=NULL))
              {
                 foreach ($userCellData as $rows) {
                    echo  $section2 = $rows['text'];
                  }
              }else{
                if($adminCellData!=NULL){
                  foreach ($adminCellData as $rows) 
                  {
                   echo  $section1 = $rows['section_1'];
                  }
                }
                else{
                  echo  $section1 ="";
                }
                  
              }
              ?>
              <a href="#" class="btn btn-box cell-section" id="section_1">Edit</a>
                </div>
            </div>
       <div class="col-xs-6">

          <div class="border"> 



            <h3>SECTION 2</h3>

            <?php 
            $where = "cell_id=".$cellid." AND user_id=".$uid." AND status = 1 AND section_id=2";
                $userCellData=$user->select_records('tbl_user_cell','*', $where);

            if(isset($userCellData) && !empty($userCellData))
            {
                foreach ($userCellData as $rows) {
                    echo  $section2 = $rows['text'];
                  }
            }else{
              if($adminCellData!=NULL){
                foreach ($adminCellData as $rows) {

                  echo  $section2 = $rows['section_2'];
                }
              }
              else{
                echo  $section2 ="";
              }
            }

            ?>

            <a href="#" class="btn btn-box cell-section" id="section_2">Edit</a>

          </div>

       </div>



       <div class="col-xs-6">

          <div class="border"> 

            <h3>SECTION 3</h3>

            <?php
              $where = "cell_id=".$cellid." AND user_id=".$uid." AND status = 1 AND section_id=3";
                $userCellData=$user->select_records('tbl_user_cell','*', $where);

              if(isset($userCellData) && !empty($userCellData))
              {
                 foreach ($userCellData as $rows) {
                    echo  $section2 = $rows['text'];
                  }
              }else{
                if($adminCellData!=NULL){
                foreach ($adminCellData as $rows) 
                 {
                   echo  $section3 = $rows['section_3'];
                 }
                }
                else{
                  echo  $section3 ="";
                }
              }
              ?>

            <a href="#" class="btn btn-box cell-section" id="section_3">Edit</a>

          </div>

       </div>

     </div>

     <div class="row">

       <div class="col-xs-3">

          <div class="border"> 

           

          </div>

       </div>



       <div class="col-xs-3">

          <div class="border"> 

          

          </div>

       </div>

       <div class="col-xs-3">

          <div class="border"> 

          

          </div>

       </div>

       <div class="col-xs-3">

          <div class="border"> 

          

          </div>

       </div>

     </div>

     <div class="row">

       <div class="col-xs-4">

          <div class="border"> 

           

          </div>

       </div>



       <div class="col-xs-4">

          <div class="border"> 

          

          </div>

       </div>

       <div class="col-xs-4">

          <div class="border"> 

          

          </div>

       </div> 

     </div>



 

     </div>

</div>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY&libraries=places&callback=autoAddress"></script> -->

<!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY&libraries=places&callback=initMap">
</script> -->
<script>

// $('#save_section').click(function(){
//     console.log("button submit");
//     alert("save");
// });

// function init() {
//                 var input = document.getElementById('city_locationn');
//                 var autocomplete = new google.maps.places.Autocomplete(input);
//                 var place = autocomplete.getPlace();
//                 console.log(place);
//             }

//            google.maps.event.addDomListener(document.getElementById('city_locationn'), 'keypress', init );  


        // function autoAddress() {
            
        //     console.log('here');
        //     var input = document.getElementById('city_locationn');
        //     var autocomplete = new google.maps.places.Autocomplete(input);
        //     console.log(autocomplete);
        //     var place = autocomplete.getPlace();
        //     document.getElementById('place_locationn').value = place.name;
        //     document.getElementById('lat_locationn').value = place.geometry.location.lat();
        //     document.getElementById('long_locationn').value = place.geometry.location.lng();
        // }
        
      //  google.maps.event.addDomListener(document.getElementById('city_locationn'), 'keypress', autoAddress);
</script>

<script type="text/javascript">

    $('.close-btn').click(function(){

        $('.cell_layout_main .cell_layout').hide();

    });

    $('.cell-section').click(function(){
        var str = $( this ).attr("id");
        var section_id = str.replace("section_", "");
        $('#cell_id').val(<?php echo $cellid; ?>);
        $('#section_id').val(section_id);
        $('#sectionModal').modal('show');
    });
</script>

 
  <script type="text/javascript">
   /* $('#playButton').hide();
       $('#myCarousel').carousel({
        interval:2000,
        pause: "false"
    });*/
 // $('#playButton').hide();
 //    $('#playButton').click(function () {
 //        $('#myCarousel').carousel('cycle');
 //          $('#playButton').hide();
 //          $('#pauseButton').show();
 //    });
 //    $('#pauseButton').click(function () {
 //        $('#myCarousel').carousel('pause');
 //         $('#pauseButton').hide();
 //         $('#playButton').show();
 //    });


 $('.tabcellChild').click(function(){
//var cell_id=$(this).attr("id");

		        //alert(cell_id);      
	var atr = $(this).attr('atr');   
	   $.ajax({
         	type:"POST",
	        url:"cell_layoutajax.php",
	        data:{id:atr},
	        success:function(result){
			       // alert(result);      
	        $("#main").html(result); 
	        //$('.inner').hide();           
	        }	
        });
		 

//	$('.cell_layout_main .cell_layout').toggle(); 
   $('.post .profile').hide();
   $('.profile .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('#video_slider').hide();
   $(".messagesd .allmessage").hide();
    $('.bookmarkf .bookmarkf').hide();
});
 
  </script>
<style type="text/css">
  #cellCarousel .carousel-indicators .active{
    background-color: #E0EABB;
  }

  #cellCarousel .carousel-indicators li{
    border-color: #E0EABB;
  }
</style>
