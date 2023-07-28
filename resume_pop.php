<?php 
if(isset($_SESSION['user_id']))
{
    $uid=$_SESSION['user_id'];
}
else
{
    session_start();
}

require_once("include/config.php");
require_once("include/functions.php");
require_once("admin/classes/cls-skill.php");

$user = new User();
$current_date=date('Y-m-d');

$obj_skill = new skill();

$skill_details = $obj_skill->getskill('*', '', '', '', 0);
$skill_detail  = end($skill_details);


?>
<style type="text/css">
  .allmessage{
    border: 1px solid #000;
    margin: 25px auto;
    padding: 0px;
    padding-right: 0px;
    padding-right: 0px;
    background-color: #fff;
    min-width: 870px;
    max-width: 741px;
    text-align: left;
    z-index: 999;
    position: absolute;
    top: 11px;
    height: 500px;
    margin: auto;
    left: 0px;
    right: 0%;
    animation: animateright 0.5s;
    display: none;
  }  

  .allmessage{
    margin-top: 20px;
  }
</style>

<?php

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

   $queryUserOnly = "select first_name,last_name,email,phoneno FROM tbl_singup WHERE tbl_singup.id=".$_POST['usr'];
  $resultqueryUserOnly = mysqli_query($con, $queryUserOnly); 
 while ( $users =  mysqli_fetch_assoc($resultqueryUserOnly) )
{ 
    $usersA[] = $users;
}
 
  $queryUserSkill = "select tbl_user_skill.*,tbl_skill.`skill_name` FROM tbl_user_skill left join tbl_skill on tbl_skill.skill_id=tbl_user_skill.skill_id WHERE tbl_user_skill.user_id = '".$uid."'";
$resultQueryUserSkill = mysqli_query($con, $queryUserSkill);                
while ( $skills =  mysqli_fetch_assoc($resultQueryUserSkill) )
{ 
    $getQueryUserSkillz[] = $skills;
}


?>

<link rel="stylesheet" href="css/settings.css">
<form class="allmessage" method="post" enctype="multipart/form-data">
<div class="recent-box-sc">
  <div class="month_title">
      <!-- <img src="img/setting_header.PNG" class="img-responsive"> -->
      <div class="window-btn window-btn2">
    	  <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window-res-pkg"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window-res" ></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true" id="restore-window-maximize"  style="display: none;"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window-res-pkg"></button>
    </div>
    </div>
   
  <!-- 	<a class="close-btn pull-right" style="top: -2px;
    right: -1px;">x</a> -->
	


<div class="col-xs-12" >
	<div class="row">

    	<div class="col-xs-12 p-add1">
            <div class="bhoechie-tab">
                <div class="bhoechie-tab-content active">

                      <h2 style="text-align: center;"><?php 
                                     foreach ($usersA as $getQueryUsersOnly) {
                                      echo $getQueryUsersOnly["first_name"]." ".$getQueryUsersOnly["last_name"];
                                      }
                                   ?></h2>
                      <div class="col-12">
                      <?php 
                                     foreach ($usersA as $getQueryUsersOnly) {
                                      echo "<div class='row'><div style='float:right;'><span style='font-weight:bold;'>".$getQueryUsersOnly["email"]."</span> | <span style='font-weight:bold;'>".$getQueryUsersOnly["phoneno"]."</span></div></div>";
                                      }
                                   ?>   
                                  </div>
                      <?php
                       //  $where="id='".$uid."'";
                       //  $gen_acc=$user->select_records('tbl_singup','*',$where);
                       // foreach ($aUserData as $val) {
                       //  }
                      ?>

                        <div class="panel-group msgpopup" id="accordion123">
                            <div class="panel panel-default">
                              <!-- <div class="panel-heading">
                              
                                <div class="row" >
                                  <div class="col-xs-2"><a href="#" class="edit-btn"># 
                                  </a></div>
                                  <div class="col-xs-6">Skill Name
                                  </div>
                                  <div class="col-xs-4">Experience
                                  </div>
                                
                                </div>
                              </div> -->

                                  <?php 
                                $k=1;
                                    foreach ($getQueryUserSkillz as $getQueryUserSkills) { 
                                    // echo "<pre>"; 
                                    // print_r($val); 
                                  ?>
                                	 <div class="row" style="margin-top: 10px!important;">
                                      <div class="col-xs-3" style="font-weight:bold;"><?php echo $getQueryUserSkills['skill_name']; ?></div>
                                      <div class="col-xs-3"><?php echo date("d-m-Y",strtotime($getQueryUserSkills['fromdate']))." - ".date("d-m-Y",strtotime($getQueryUserSkills['todate'])); ?>
                                      </div>
                                      <div class="col-xs-3"><?php echo $getQueryUserSkills['company_name']; ?></div>
                                      
                                      <!-- <div class="col-xs-3"><?php //echo $getQueryUserSkills['years']." Year ".$getQueryUserSkills['months']." Months ";?> </div> -->
                                      <div class="col-xs-3"><?php echo $getQueryUserSkills['city']." | ".$getQueryUserSkills['country']; ?></div>
                                      <div class="row" style="margin-left:15px; margin-top: 10px!important; border-bottom:1px solid #000;"><?php echo $getQueryUserSkills['description']; ?></div>
                                    </div>
                                   <?php $k++; } ?>

                               
                              </div>
                            </div>
                          </div>  

              </div>
            </div>
          </div>
          </div>
        </div>

</form>
<script type="text/javascript">
    


    $('#close-window-res-pkg, #minimize-window-res-pkg').click( function(){
  $('.messagesd_resume .allmessage').hide();
});

$('#restore-window-res').click(function(){
    $('#restore-window-res').hide();
    $('#restore-window-maximize').show();
    $('.messagesd_resume .allmessage').css("max-width","900px"); 
    $('.messagesd_resume .allmessage').height('100%');
});
$('#restore-window-maximize').click(function(){
    $('#restore-window-maximize').hide();
    $('#restore-window-res').show();
    $('.messagesd_resume .allmessage').css("max-width","30%"); 
    $('.messagesd_resume .allmessage').height('80%');
});

</script>