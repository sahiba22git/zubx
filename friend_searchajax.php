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


$where = " 1 ";
	/*---search on txt box value fname--*/
#echo "<pre>";print_r($_REQUEST);die;
if(isset($_REQUEST['search']))
	{
		$search=$_REQUEST['search'];
		$where.=" AND (first_name Like '".$search."%' OR religion Like '".$search."%' OR coworker Like '".$search."%')";
	}
	/*----------- serach on check box --------------*/	



if(!empty($_REQUEST['searchfemale']) )
{
	$where .=" AND(gender = 'female')";
}

if(!empty($_REQUEST['searchmale']) )
{
	$where .=" AND (gender = 'male' )";
}

if (!empty($_REQUEST['searchreligion'])){
	$where .=" AND (religion = '".$_REQUEST['searchreligion']."')";
}
if (!empty($_REQUEST['searchcoworker'])){
	$where .=" AND (coworker = '".$_REQUEST['searchcoworker']."')";
}

/*
else if($_REQUEST['intrestcell']))
{
	$where="cell_id LIKE'".$_REQUEST['intrestcell']."%'";
}
*/

$orderby = "";
if(!empty($_REQUEST['lastlog']))
{
	$orderby = "  ORDER BY last_login DESC LIMIT 1";
}

	// $usersdetails=$user->select_records('tbl_singup','*',$where);

	$userIds = array();
	$friendIds = array();
	$bookmarkIds = array();
	$messageIds = array();
	$mainIds = array();
	$user_id = $_SESSION['user_id'];

	$query = "select * from tbl_singup where ".$where." ".$orderby." ";
	// echo $query." ";

	$result = mysqli_query($con, $query);
	if(isset($result) && $result != null ){
		$iNumRows = mysqli_num_rows($result);
		while ($data = mysqli_fetch_assoc($result)) {
				$usersdetails[] = $data;
				$userIds[] = $data['id'];
		}
		$mainIds = $userIds;
	}

	if(isset($_REQUEST['myfriend']) && !empty($_REQUEST['myfriend']))
	{
		$query1 = "select A.id, A.u_id, A.f_id, B.*
		from tbl_friend A 
		LEFT JOIN tbl_singup B on B.id = A.f_id 
		where  A.u_id = '".$user_id."' AND A.flage = 1 AND ".$where."
		UNION ALL
		select A.id, A.u_id, A.f_id, B.*
		from tbl_friend A 
		LEFT JOIN tbl_singup B on B.id = A.u_id 
		where  A.f_id = '".$user_id."' AND A.flage = 1  AND ".$where." ";

		// echo $query1." ";
		
		$result = array();
		$result = mysqli_query($con, $query1);
		if(isset($result) && $result != null ){
			$iNumRows = mysqli_num_rows($result);
			while ($data = mysqli_fetch_assoc($result)) {
				// $friendsdetails[] = $data;
				$friendIds[] = $data['id'];
			}
		}
		$mainIds = array_intersect($mainIds,$friendIds);
	}

	if(isset($_REQUEST['mybookmark']) && !empty($_REQUEST['mybookmark']))
	{
		$query = "select A.id, B.* from tbl_bookmark A LEFT JOIN tbl_singup B on B.id = A.f_id where A.u_id = '".$_SESSION['user_id']."' AND ". $where."";

		// echo $query." "; 

		$result = mysqli_query($con, $query);
		$iNumRows = mysqli_num_rows($result);
		if ($iNumRows > 0) {
			while ($data = mysqli_fetch_assoc($result)) {
				// $bookmarkdetails[] = $data;
				$bookmarkIds[] = $data['id'];
			}
		}
		$mainIds = array_intersect($mainIds,$bookmarkIds);
	}

	if(isset($_REQUEST['mymsg']) && !empty($_REQUEST['mymsg']))
	{
		$query = "select A.id, B.* from tbl_message A LEFT JOIN tbl_singup B on B.id = A.f_id where A.u_id = '".$_SESSION['user_id']."' AND ". $where."";

		// echo $query." "; 

		$result = mysqli_query($con, $query);
		$iNumRows = mysqli_num_rows($result);
		if ($iNumRows > 0) {
			while ($data = mysqli_fetch_assoc($result)) {
				// $bookmarkdetails[] = $data;
				$messageIds[] = $data['id'];
			}
		}
		$mainIds = array_intersect($mainIds,$messageIds);
	}

	$query = "select * from tbl_singup where id IN (" . implode(',', $mainIds) . ")";

	$result = mysqli_query($con, $query);
	if(isset($result) && $result != null ){
		$iNumRows = mysqli_num_rows($result);
		while ($data = mysqli_fetch_assoc($result)) {
				$maindetails[] = $data;
		}
	}

?>
	<div class="post-viwe">

		<?php 
			
			//echo "<pre>"; print_r($query); "<pre>"; die();

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
		// $('.frdprofile').click(function(e){
		// 	e.preventDefault();
		// 	console.log("Hi");
		// 	var uid = $(this).attr('id');
		// 	$.ajax({
	    //     	type:"POST",
	    //     	url:"frdsprofile.php",
	    //     	data:{id:uid},
	    //     		success:function(result){
	    //        		$('.frdsprofile').html(result); 
		// 			$('.frdsprofile .frdsprofile').show();
	    //        		$('.post .profile').hide();	
						                
	    //     	}
	    //    	});
		// 	return false;
		// });

		$('.frdprofile').click(function(e){
		e.preventDefault();
		var uid = $(this).attr('id');
		$.post('activity_id.php', {type:2,friend_id:uid}
         );
			$.ajax({
         		type:"POST",
        		url:"profile.php",
        		data:{id:uid},
        			success:function(result){
            		$('.frdsprofile').html(result);	
					$('.frdsprofile .frdsprofile').show();
            		$('.friend .profile').hide();
            		$('.frdsprofile').css('display','block');
            		$('.messagesd .allmessage .sendmsgpop').hide();
        		}
       		 });
			return false;
	});
	</script>