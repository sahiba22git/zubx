<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();
if(isset($_POST['audioid']))
{
	 $audioid=$_POST['audioid'];
	 $where = 'id ='.$audioid; 
	 $deleterow =$user->delete_row('tbl_profile_audio',$where);
	$audioslider=$user->select_allrecords('tbl_profile_audio','*');
}

?>
<h3>Audio</h3>        
  <label for="profileaudio" class="custom-file-upload" style="width: 70px;">
    <i class="fa fa-cloud-upload"></i> Add
  </label>

  <input id="profileaudio" type="file" />    
    <article id="demo-default2" class="demo">            
      <div id="coverflow2">
        <ul class="flip-items">
          <?php
            if(count($audioslider))
              {
                for($i=0;$i<count($audioslider);$i++)
                  {    
                    $audiopath=$audioslider[$i]['audio_path'];
                    $audionm=explode('Audio/', $audiopath);
                    $audioname=$audionm[1];
          ?>      
                  <li data-flip-title="Red">
                  <a class="delete-audio fa fa-trash" id="<?php echo $audioslider[$i]['id']?>"> </a> 
                  <span  id="<?php echo $audioslider[$i]['id']?>" class="profile_audio">

                  <audio>
                    <source src="<?php echo $audioslider[$i]['audio_path']?>" type="audio/mp3">                   
                  </audio> 
                  <img src="uploads/music-512.PNG" class="img-responsive">
                    <?php echo substr($audioname,1,5).'....'.substr($audioname,-3) ;?>
                  </span>
                  </li>
          <?php
                  }
              }
          ?>                              
        </ul>
      </div>
            
        <script>
            var coverflow = $("#coverflow2").flipster();
        </script>          
    </article>


<script type="text/javascript">
  $('.profile_audio').click(function(){
    var id = $(this).attr("id");
      $.ajax({
            type:"POST",
            url:"play_profile_audio.php",
            data:{id:id},
            success:function(result){
              $('.profile_audio_pop').show();
              $('.playaudio').html(result);
            }
            });  
  })
</script>

 <!--- profile audio delete -->

 <script type="text/javascript">
  $('.delete-audio').click(function(){
      var id = $(this).attr('id');
      confirm("Are you sure delete audio");
        $.ajax({
              type:"POST",
              url:"delete-profile-audio.php",
              data:{audioid:id},
              success:function(result){  
                  confirm("delete audio successfully");             
                  $('#profileaudioslider').html(result);
              }
              });
    });
 </script>
<script type="text/javascript">  
    $('#profileaudio').change(function(){
      confirm("Are you sure upload Audio");
      var file_data = $('#profileaudio').prop('files')[0];   
      var form_data = new FormData();                  
        form_data.append('file', file_data);
        $.ajax({
            url: "profile_audio_slider.php",
            type: "POST",
            data:  form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
              alert("Profile audio added successfully");
               $('#profileaudioslider').html(data);
            }
        });
    });
</script>
