<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

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

	/*---search on txt box value fname--*/
// echo "<pre>";print_r($_REQUEST);die;
$where = '';
if(isset($_REQUEST['search']) && !empty($_REQUEST['search']))
{
	$search=$_REQUEST['search'];
	$where .=" AND (first_name Like '".$search."%' OR religion Like '".$search."%' OR coworker Like '".$search."%')";
}
	/*----------- serach on check box --------------*/	

// if($_REQUEST['searchmale']!='' && $_REQUEST['searchfemale']!='')
// {
// 	$where .= " AND 1 ORDER BY last_login DESC LIMIT 1";
// }



if((isset($_REQUEST['searchfemale']) && !empty($_REQUEST['searchfemale'])) && (isset($_REQUEST['searchmale']) && !empty($_REQUEST['searchmale'])) )
{
	$where .=" AND ( gender = 'female' OR gender = 'male') ";	
}
else if((isset($_REQUEST['searchfemale']) && !empty($_REQUEST['searchfemale'])))
{
	$where .=" AND gender = 'female'";
}

else if((isset($_REQUEST['searchmale']) && !empty($_REQUEST['searchmale'])))
{
	$where .=" AND gender = 'male'";
}

if(isset($_REQUEST['religion']) && !empty($_REQUEST['religion'])){
	$where .=" religion = '".$_REQUEST['searchreligion']."'";
}

if (isset($_REQUEST['searchcoworker']) && !empty($_REQUEST['searchcoworker'])){
	$where .=" coworker = '".$_REQUEST['searchcoworker']."'";
}

if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '1')
{
	$where .=" AND age between 18 AND 23 ";
}
else if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '2')
{
	$where .=" AND age between 21 AND 35 ";
}
else if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '3')
{
	$where .=" AND age between 35 AND 45 ";
}
else if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '4')
{
	$where .=" AND age between 45 AND 125 ";
}

if(isset($_REQUEST['intrestcell']) && !empty($_REQUEST['intrestcell']))
{
	$where .=" AND cell_id LIKE'".$_REQUEST['intrestcell']."%'";
}

if(isset($_REQUEST['religion']) && !empty($_REQUEST['religion']))
{
	$where .=" AND religion LIKE'".$_REQUEST['religion']."%'";
}
if(isset($_REQUEST['coworker']) && !empty($_REQUEST['coworker']))
{
	$where .=" AND coworker LIKE'".$_REQUEST['coworker']."%'";
}

if(isset($_REQUEST['lastlog']) && !empty($_REQUEST['lastlog']))
{
	$where .=" ORDER BY last_login DESC LIMIT 1";
}


// echo $where; die;

// echo "ffffff". print_r($_REQUEST) ; die;

// $usersdetails=$user->select_records('tbl_singup','*',$where);
	$usersdetails = array();
	$query = "select A.id, B.* from tbl_bookmark A LEFT JOIN tbl_singup B on B.id = A.f_id where A.u_id = '".$_SESSION['user_id']."' ".$where." ";
	//die;
	// echo $query;die;
	$result = mysqli_query($con, $query);
	$iNumRows = mysqli_num_rows($result);

	while ($data = mysqli_fetch_assoc($result)) {
			// echo "hiii"."<br>";
			$usersdetails[] = $data;
		}
		// echo "<pre>";
		// print_r($usersdetails);
		// die;
?>
	<div class="post-viwe">

		<?php 
	
	//	echo "<pre>"; print_r($query); "<pre>"; die();

	if(!empty($usersdetails))
	{










		   //echo "<pre>";	print_r($aUserData); echo "</pre>";
		   // for ($i = 1; $i <= 1; $i++) {
		   		$i=1;
				foreach ($usersdetails as $val) {
					$countQuery=count($usersdetails);
					$query = "SELECT f_id FROM tbl_friend WHERE f_id = '".$val['id']."' and u_id = '".$_SESSION['user_id']."' ";
				    $result = mysqli_query($con, $query);
				    $getUser = mysqli_fetch_assoc($result);	

				    $qry = "SELECT f_id FROM tbl_bookmark WHERE f_id = '".$val['id']."' and u_id = '".$_SESSION['user_id']."'";
				    $resultBook = mysqli_query($con, $qry);
				    $getBookMark = mysqli_fetch_assoc($resultBook); 
					?>
					<?php if($i==1){ ?>
					<div class="row rowspcl"> 
					<?php }?>
					  <div class="column">
					  	
					  		
					  		<div style="width: 115px;margin: 5px; display: inline-block; float: left; vertical-align: top;">
							    <div class="col-left user-img" style="margin:0 0 5px 0;">
							  	<?php if ($val['profile_path'] != '') { ?>
								<a href="" class="frdprofile" id="<?php echo $val['id']; ?>"><img src="<?php echo $val['profile_path'] ?>" class="img-responsive"  style="width:113px; height:113px;"></a>
								<?php } else {?>
						    		<a href="" class="frdprofile" id="<?php echo $val['id']; ?>"><img src='img/user.png' class='img-responsive' style="width:113px; height:113px;"></a>
						    	<?php }	?>
								</div>
								<h4><?php echo $val['username']; ?></h4>
								<?php 
								if(!empty($getUser['f_id'])){ ?>				<!-- 
									<div class="col-left user-img" style="width: 100%; margin:0 0 5px 0; color: green"><b>Friend</b></div> -->
									<?php 
				if(!empty($getBookMark['f_id'])){?>
			     <a href="#" style="font-size:11px; border:1px solid #000; display: block; margin-bottom:5px; color:red; padding:1px; color: green; cursor: text;"><b>Bookmarked</b></a>
				<?php }else{?>
				<a id="<?php  echo "MK_". $val['id']; ?>" class="bookmark" href="#" style="font-size:11px; border:1px solid #000; display: block; margin-bottom:5px; color:red; padding:5px;"> Bookmark </a>
				<?php }?>
								<?php }else{?>
									<div id="<?php echo "K_". $val['id']; ?>" class="col-left user-img addfriend" style="width: 100%; margin:0 0 5px 0; cursor: pointer;">Add to friend`s gallery</div>

								<?php }?>
								
							</div>

					  </div>

					<?php if(($i%4)==0 or $i==$countQuery){ ?>   
					</div> <?php } if($countQuery!=$i and (($i%4)==0) ){ ?> <div class="row rowspcl"> <?php }?>
				<?php ?>

					<?php
					$i++;
				}
		
		
}
	?> 
	</div>

			<script type="text/javascript">
				$('.frdprofile').click(function(){
					var uid = $(this).attr('id');
					$.ajax({
			        	type:"POST",
			        	url:"frdsprofile.php",
			        	data:{id:uid},
			        		success:function(result){
			           		$('.frdsprofile').html(result); 
							$('.frdsprofile .frdsprofile').show();
			           		$('.post .profile').hide();	
									                
			        	}
			       	});
					return false;
				});
			</script>