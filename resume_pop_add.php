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
<div class="row g-3">                
                            <div class="col-auto">
                            <label for="years" class="form-label">Select Skill</label>
                                <select class="form-select form-control" aria-label="Default select example" name="skill_id" >
                                    
                                    <?php
                                    foreach ($skill_details as $skill_detailss) { ?>
                                    <option value="<?php echo $skill_detailss['skill_id'];?>" ><?php echo ucfirst($skill_detailss['skill_name']); ?></option>

                                            <?php 
                                                   
                                            } ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="years" class="form-label">Years of Experience</label>
                                <input type="hidden" class="form-control" name="user_id"  value="<?php echo $_SESSION['user_id']?>">
                                <select class="form-select form-control" id="YearsExp"  name="years" aria-label="Default select example" name="skill_id" >
                                    <option value="0">Select Year</option>
                                    <?php
                                    for ($m=1; $m<=80; $m++) { ?>
                                        <option value="<?php echo $m;?>" ><?php echo $m; ?></option>
                                            <?php 
                                                   
                                    } ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="MonthsExp" class="form-label">Months</label>
                                <select class="form-select form-control" id="MonthsExp" name="months"  aria-label="Default select example" >
                                    <option value="0">Select Month</option>
                                    <?php
                                    for ($h=1; $h<=12; $h++) { ?>
                                        <option value="<?php echo $h;?>" ><?php echo $h; ?></option>
                                            <?php 
                                                   
                                    } ?>
                                </select>

                            </div> <br> <br>
               
                                    </div>
                <!-- Select File to upload:
                <input type="file" name="file" id="fileToUpload"> -->
                <div class="col-auto">
                    <input type="submit" value="Submit" name="submit">
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