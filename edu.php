<?php session_start(); 
//echo "<pre>"; print_r($_SESSION); echo "</pre>";
require_once("include/config.php");
require_once("include/functions.php");
require_once("admin/classes/cls-skill.php");
$obj_skill = new skill();

$skill_details = $obj_skill->getskill('*', '', '', '', 0);
$skill_detail  = end($skill_details);

	if(!isset($_SESSION['user_id']))
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

if(isset($_SESSION['user_id'])){
$uid=$_SESSION['user_id'];

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
 $queryUserEdu = "select tbl_user_edu.* from tbl_user_edu WHERE tbl_user_edu.user_id = '".$uid."'";
$resultQueryUserEdu = mysqli_query($con, $queryUserEdu);                
while ( $edu =  mysqli_fetch_assoc($resultQueryUserEdu) )
{ 
    $getQueryUserEduc[] = $edu;
}



// $query = "select * FROM tbl_resume WHERE user_id = '".$uid."'";
// $result = mysqli_query($con, $query);
// $getUser = mysqli_fetch_assoc($result);
// $sizeOf= sizeof($getUser);
// if($sizeOf==0){
//     $pathUpView='';
    
// }
// else{
//     $pathUpView=$getUser['photo_path'];
// }
//echo $pathUpView ; die;
if((isset($_REQUEST['submit']))){
   // echo "<pre>"; print_r($_REQUEST); echo "</pre>"; die;
        //echo "Hii"; die;                                	
        $obj_skill->insertUserEdu(array('user_id'=>$_REQUEST['user_id'],'uni_name'=>$_REQUEST['uni_name'],'year'=>$_REQUEST['year'],'marks'=>$_REQUEST['marks'],'created_at'=>date('Y-m-d')));
        //echo "Hi<pre>"; print_r($getUser); echo "</pre>"; die;
        header("location: ./edu.php?user=".$uid."&success=1");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Education </title>
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

<?php if($_GET['user']==$_SESSION['user_id']){ ?>
    <div class="col-sm-5 clrBackLeft" style="background-color:lavender;">
    <div class="col-sm-12 clrBackLeft" style="background-color:lavender;">
    <span style="color:green;"><?php if(isset($_GET['success'])){ ?> Record uploaded Successfully<?php }    
    ?></span>
    <span style="color:red;"><?php if(isset($_GET['reject'])){ ?> Record doesn't uploaded Successfully<?php }    
    ?></span>
            <form action="edu.php" method="post" enctype="multipart/form-data">
                <div class="row g-3">                
                            <div class="col-auto">
                            <label for="years" class="form-label">School/ University Name</label>
                            <input type="text" class="form-control" name="uni_name"  id="uniName" Required>
                            </div>
                            <div class="col-auto">
                                <label for="years" class="form-label">Year of Passing</label>
                                <input type="hidden" class="form-control" name="user_id"  value="<?php echo $_SESSION['user_id']?>">
                                <select class="form-select form-control" id="YearEdu"  name="year" aria-label="Default select example" name="skill_id" >
                                    <option value="0">Select Year</option>
                                    <?php
                                    for ($m=1950; $m<=2023; $m++) { ?>
                                        <option value="<?php echo $m;?>" ><?php echo $m; ?></option>
                                            <?php 
                                                   
                                    } ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="MonthsExp" class="form-label">Marks Percentage</label>
                                <select class="form-select form-control" id="MarksEdu" name="marks"  aria-label="Default select example" >                                   
                                    <?php
                                    for ($h=10; $h<=100; $h++) { ?>
                                        <option value="<?php echo $h;?>" ><?php echo $h." %"; ?></option>
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
      <th scope="col">School/University Name</th>
      <th scope="col">Passing Year</th>
      <th scope="col">Marks Obtained</th>
    </tr>
  </thead>
  <tbody>   
  
    <?php      $k=1;
                        foreach ($getQueryUserEduc as $getQueryUserEdu) {  ?>
<tr>
      <th scope="row"><?php echo $k; ?></th>
      <td colspan="2"><?php echo $getQueryUserEdu['uni_name'];?></td>
      <td colspan="2"><?php echo $getQueryUserEdu['year'];?></td>
      <td><?php echo $getQueryUserEdu['marks']." % ";?></td>
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
      <title>Education </title>
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
