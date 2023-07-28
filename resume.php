<?php session_start(); 
//echo "<pre>"; print_r($_SESSION); echo "</pre>";
require_once("include/config.php");
require_once("include/functions.php");
require_once("admin/classes/cls-skill.php");
$obj_skill = new skill();

$skill_details = $obj_skill->getskill('*', '', '', '', 0);
$skill_detail  = end($skill_details);

	if(!isset($_GET['user']))
	{
		echo'<script type="text/javascript">window.location.href="index.php";</script>';
		exit;     
	}

?>
<style>
    .bckBtn{background: white;
    border-radius: 3px;
    padding: 5px 10px;
    margin-top: 5px;
    float: left;
    color: black;
    margin-left: 5px;
}
.viewBtn{
    background: black;
    border-radius: 3px;
    padding: 10px 30px;
    /* margin: auto; */
    color: white;
    margin-top: 50px;
    float: left;
    margin-left: 40%;
   
}
.clrBackRight{
    min-height: 50% !important;
    border: 1px solid #000;
    margin-top: 5px;
    background-color:white !important;
    float:right !important;
    margin-left: 5px !important;
}
.clrBackLeft{
    min-height: 50% !important;
    
    margin-top: 5px;
    background-color:white !important;
    float:left !important;
    margin-right: 5px !important;
}
</style>
<?php

if(isset($_GET['user'])){
$uid=$_GET['user'];

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
 $queryUserSkill = "select tbl_user_skill.*,tbl_skill.`skill_name` FROM tbl_user_skill left join tbl_skill on tbl_skill.skill_id=tbl_user_skill.skill_id WHERE tbl_user_skill.user_id = '".$uid."'";
$resultQueryUserSkill = mysqli_query($con, $queryUserSkill);                
while ( $skills =  mysqli_fetch_assoc($resultQueryUserSkill) )
{ 
    $getQueryUserSkillz[] = $skills;
}



$query = "select * FROM tbl_resume WHERE user_id = '".$uid."'";
$result = mysqli_query($con, $query);
$getUser = mysqli_fetch_assoc($result);
$sizeOf= sizeof($getUser);
if($sizeOf==0){
    $pathUpView='';
    
}
else{
    $pathUpView=$getUser['photo_path'];
}
//echo $pathUpView ; die;
if((isset($_REQUEST['submit']))){
   // echo "<pre>"; print_r($_REQUEST); echo "</pre>"; die;
        //echo "Hii"; die;                                	
        $obj_skill->insertUserskill(array('skill_id'=>$_REQUEST['skill_id'],'user_id'=>$_REQUEST['user_id'],'years'=>$_REQUEST['years'],'months'=>$_REQUEST['months'],'created_at'=>date('Y-m-d')));
        //echo "Hi<pre>"; print_r($getUser); echo "</pre>"; die;
        header("Location: resume.php?user=".$uid."&success=1");?>
        <script>
            setTimeout(function(){
             window.location.href=window.location.hostname+"/resume.php?user="+$uid+"&success=1";},2000);
        </script> 
        <?php
        //echo'<script type="text/javascript">setTimeout(function(){ window.location.href="./resume.php?user="'+$uid+'&success=1},1000);</script>';
        
		
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resume </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
<div class="row" style="width:100%; height:40px; background-color:black; float:left;">
    <a class="bckBtn" href="oh.php">Back</a>
</div>
<div class="window-btn">
       
             <button type="button" class="close-btn-sub pull-right">x</button>
            <img class="img-responsive edu-head" src="img/work_header.png" alt="education_header">
    </div>
  <div class="row">

<?php if(isset($_GET['user'])){ ?>
    <div class="col-sm-5 clrBackLeft" style="background-color:lavender;">
    <div class="col-sm-12 clrBackLeft" style="background-color:lavender;">
    <span style="color:green;"><?php if(isset($_GET['success'])){ ?> Record uploaded Successfully<?php }    
    ?></span>
    <span style="color:red;"><?php if(isset($_GET['reject'])){ ?> Record doesn't uploaded Successfully<?php }    
    ?></span>
            <form action="" method="post" enctype="multipart/form-data">
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
                </div>
    </div>

    <?php }?>
    <div class="col-sm-6 clrBackRight" style="background-color:lavenderblush;">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">skill_name</th>
      <th scope="col">Experience</th>
    </tr>
  </thead>
  <tbody>   
  
    <?php      $k=1;
                        foreach ($getQueryUserSkillz as $getQueryUserSkills) {  ?>
<tr>
      <th scope="row"><?php echo $k; ?></th>
      <td colspan="2"><?php echo $getQueryUserSkills['skill_name'];?></td>
      <td><?php echo $getQueryUserSkills['years']." Year ".$getQueryUserSkills['months']." Months ";?></td>
    </tr>

                        <?php $k++; }?>
         </tbody>
    </table>
        <!-- <div class="row">
        <a rel="<?php //echo $pathUpView ?>" id="viewRes" class="viewBtn">View Resume</a>
        </div> -->
    </div>

  </div>
</div>

</body>
<script>
    $("#viewRes").on("click",function(e){
        e.preventDefault();
        var openUrl=$('#viewRes').attr('rel');
        window.open(openUrl,"_blank");
    })
     

</script>
</html>
<?php }
else{ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Resume </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    
    <div class="container-fluid">
    <div class="row" style="width:100%; height:40px; background-color:black; float:left;">
        <a class="bckBtn" href="oh.php">Back</a>
    </div>
      <div class="row">
        <div class="col-sm-8 clrBackLeft" style="background-color:lavender;">
               Please Login with valid User First
        </div>
        
    
      </div>
    </div>
    
    </body>
    </html>
<?php
}
?>
