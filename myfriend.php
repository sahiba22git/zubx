<?php 
if(isset($_SESSION['user_id']))
{
    
}
else
{
    session_start();
}

require_once "include/config.php";
require_once "include/functions.php";
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
		

#echo "<pre>";print_r($_REQUEST);die;
try {
	// $query = "SELECT * FROM tbl_singup WHERE id != '".$_SESSION['user_id']."' ORDER BY id DESC";

	$aUserData = array();

	//if(!empty($_POST['friend_gallery_id'])){
	//	$fid = $_POST['friend_gallery_id'];
	//}
	if(!empty($_SESSION['user_id'])){
		$fid = $_SESSION['user_id'];
	}else{
		$fid = '';
	}

	//$query = "select A.id,A.u_id,A.u_id, B.* from tbl_friend A LEFT JOIN tbl_singup B on B.id = A.u_id where A.flage = 0 AND A.f_id = '".$_SESSION['user_id']."'";

/*	$query = "select A.id,A.u_id,A.f_id, B.* from tbl_friend A LEFT JOIN tbl_singup B on B.id = A.u_id where  (A.f_id = '".$fid."' || A.u_id = '".$fid."')   AND A.flage = 1";*/

	//$query = "select A.id,A.u_id,A.f_id, B.* from tbl_friend A LEFT JOIN tbl_singup B on B.id = A.u_id where ( A.f_id = '".$fid."'  || A.u_id = '".$fid."' ) AND A.u_id != '".$fid."'  AND A.flage = 1"; // old query
	// $query = "select A.id,A.u_id,A.f_id, B.* 
	// from tbl_friend A 
	// LEFT JOIN tbl_singup B on B.id = A.u_id 
	// where ( A.f_id = '".$fid."' || A.u_id = '".$fid."' ) AND A.u_id != '".$fid."'  AND A.flage = 1";

	$query = "
		select A.id, A.u_id, A.f_id, B.*
		from tbl_friend A 
		LEFT JOIN tbl_singup B on B.id = A.f_id 
		where  A.u_id = '".$fid."' AND A.flage = 1
		UNION ALL
		select A.id, A.u_id, A.f_id, B.*
		from tbl_friend A 
		LEFT JOIN tbl_singup B on B.id = A.u_id 
		where  A.f_id = '".$fid."' AND A.flage = 1
	";
	
	$result = mysqli_query($con, $query);

	$iNumRows = mysqli_num_rows($result);
	if ($iNumRows > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			// echo "hiii"."<br>";
			$aUserData[] = $data;
		}
	} else {
		$_SESSION['sessionMsg'] = "No Data Found";
	}

} catch (Exception $e) {
	echo "Error" . $e->getMessage();
}
$condition = "`id`=" . $_SESSION['user_id'];
$getcell = $user->select_records('tbl_singup', '*', $condition);

// echo "<pre>"; 
// print_r($aUserData); die;
 foreach ($getcell as $row) {
 	$cellno = $row['cell_id'];
 }

?>

<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/post.css">
<form class="profile" method="post" enctype="multipart/form-data">
<div class="window-btn window-btn2">
    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window" onclick="window_minimize()"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window" ></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true" onclick="window_maximize()" style="display: none;"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window2"></button>
</div>
	<!-- <button class="close-btn pull-right" style="    top: -2px;
    right: -1px;">x</button> -->
    <div class="post-left">
	    <div class="user-head">
	    	<div id="frend_message" style="display: none;"></div>
	    	<h3>Friend Gallary</h3>
	    	<!-- <a href="#">Add </a> <a href="#">Edit</a> -->
	    </div>
		<div class="post-scroll">
		   <div class="post-viwe" id="usersearch1">

		   		<?php
		   //echo "<pre>";	print_r($aUserData); echo "</pre>";
		   // for ($i = 1; $i <= 1; $i++) {
		   		$i=1;
				foreach ($aUserData as $val) {
					$countQuery=count($aUserData);
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
		?>

		   </div>
		</div>
	</div>
	<div class="post-right">
	    <div class="user-filter">
		    <div class="filter-top">
		    	<h4> User </h4>
		    	<p>Please click all that apply</p>
		    	<div>
							<input type="checkbox" name="selectall" id="selectallfilter1" class="chkAll" value="all" > Click All
						</div>
		    </div>

			<div class="filter-box">
				
				<div class="row">
					<div class="col-xs-8">
						<div class="input-group">							   
							    <select name="country" id="countryFilter1" class="form-control">
							    	<option value="">Country</option>
							    	<?php
							    	$users = new User();
							    	$allcountry=$users->select_allrecords('tbl_country','*');
							    		foreach ($allcountry as $row) {
							    			echo "<option value='".$row['country_name']."'>".$row['country_name']."";
							    		}
							    	?>
							    </select>
							    <!-- <input type="text" value="" name="country" class="form-control"> -->
							   
								
						      </div>
						      <div>
							<input type="checkbox" name="mybookmarkfrnd" id="mybookmarkfrnd1" class="chk"  > Bookmark Users
						</div>
						<div>
							<input type="checkbox" name="mymsg" id="mymsg1" class="chk" > Messages
						</div>	
					   <div class="check">
							
							<div>
							<input type="checkbox" name="cellintrest" id="cellintrest1" class="chk" onclick="checkintrest1(this.value);" > Interest </div>
							<div>
							<input type="checkbox" name="searchmale" id='searchmale1' value="male" class="chk" onclick="checkmale1(this.value);"> Male </div>
							<div>
							<input type="checkbox" name="searchfemale" id='searchfemale1' value="female" class="chk" onclick="checkfemale1(this.value);"> Female </div>
							<div style="width: 200px;">							
							<input name="searchage" id='searchage1' type="checkbox" class="chk" onclick="ageSearch(this.value);"> Age</div>
							<div style="width: 200px;">
							<input type="checkbox" name="cellcoworker" id='cellcoworker1' class="chk" onclick="checkcoworker1(this.value);"> Coworker/Classmate</div>

							<div style="width: 200px;">							
							<input name="cellreligion" id='cellreligion1' type="checkbox" class="chk" onclick="checkreligion1(this.value);"> Religion</div>
							<div style="width: 200px;">
							<input type="checkbox" name="lastloging" id='lastloging1' class="chk" onclick="checklastloging1(this.value);"> Last logged in </div>
				        </div>
					</div>
					<div class="col-xs-4 drop-padding">
				        <div class="percentagelist1" >
				        	<div>
				        		<label class="drop-list">Cell Percent</label>
				        		<select name="percetage" id="percetage1" class="form-control less-padding-drop">
				        			<option value="100">100</option>
				        			<option value="90">90</option>
				        			<option value="80">80</option>
				        			<option value="70">70</option>
				        			<option value="60">60</option>
				        			<option value="50">50</option>
				        			<option value="40">40</option>
				        			<option value="30">30</option>
				        			<option value="20">20</option>
				        			<option value="10">10</option>
				        		</select>
				        	</div>
				        </div>
				    </div>
				     
				    <div class="col-xs-4 drop-padding">
				        <div class="religionlist1" >
				        	<div>
				        		<label class="drop-list">Religion</label>				        		
									<select name="religion" id="religion1" class="form-control less-padding-drop" >
										<option>select</option>
										<option value="christianity">Christianity</option>
										<option value="islam">Islam</option>
										<option value="nonreligious">Nonreligious</option>
										<option value="hinduism">Hinduism</option>
										<option value="chinese">Chinese</option>
										<option value="buddhism">Buddhism</option>
										<option value="sikhism">Sikhism</option>
				<option value="judaism">Judaism</option>
				<option value="zoroastrianism">Zoroastrianism</option>
										<option value="primal_indigenous">Primal-indigenous</option>
									</select>	
				        	</div>
				        </div>
				    </div>
				    <div class="col-xs-4 drop-padding">
				        <div class="coworkerlist1" >
				        	<div>
				        		<label class="drop-list" style="">Coworker / Classmate</label>
				        		<select name="coworker" id="coworker1" class="form-control less-padding-drop">
									<option>select</option>
									<option value="coworker">Coworker</option>
									<option value="classmate">Classmate</option>					
								</select>	
				        	</div>
				        </div>
				    </div>

				    <div class="col-xs-4 drop-padding">
				        <div class="agelistfriend" >
				        	<div>
				        		<label class="drop-list" style="">Age</label>
				        		<select name="age_limit" id="age_limit" class="form-control less-padding-drop">
									<option>select</option>
									<option value="1">18 to 23</option>
									<option value="2">21 to 35</option>
									<option value="3">35 to 45</option>
									<option value="4">45 to 70</option>
									<option value="5">70 to 90</option>
									<option value="6">90 to 125</option>
								</select>	
				        	</div>
				        </div>
				    </div>
				</div>
				
		        <div class="bar">

		        </div>
		        <div class="input-group">
                   <input type="text" name="search" id="search1" class="form-control">
                   <!-- <div class="input-group-btn">
                     <input type="button" name=""  class="btn" value="Search">
                   </div> -->
		        </div>
			</div>
        </div>

        <div class="search-result">

           <h3>Search Result</h3>

           <div class="post-scroll">

           	<div id='fusersearch'>

		   <div class="post-viwe">

		   <?php for ($i = 1; $i <= 1; $i++) {
			foreach ($aUserData as $val) {
			?>
			     <div class="user-box mainfriend">
			       <div class="col-left user-img">
			      	<?php if ($val['avitor_image'] != '') {

			?>
			       		<a href="" class="frdprofile" id="<?php echo $val['id']; ?>">
			      		<img src="<?php echo $val['avitor_image'] ?>" class="img-responsive">
			      	</a>

			        <?php
} else {?>
			    		<a href="" class="frdprofile" id="<?php echo $val['id']; ?>">
			    		<img src='img/user.png' class='img-responsive'>
			    	</a>
			    	<?php
}
		?>

			       </div>


			       <div class="col-left user-info">
			       	<a href="" class="frdprofile" id="<?php echo $val['id']; ?>">
						<h3><?php echo $val['username']; ?></h3>
					</a>
						<label class="col-xs-6"> Name <span>

							<?php echo $val['first_name']; ?></span>
						</label>
						<label class="col-xs-6"> Sure name - Given name <span>
							<?php echo $val['last_name']; ?></span>
						</label>

						<label class="col-xs-3">Gender  <span>
							<?php echo $val['gender']; ?></span>
						</label>
						<label class="col-xs-3">height  <span>
							<?php echo $val['height']; ?></span>
						</label>
						<label class="col-xs-3">weight <span>
							<?php echo $val['weight']; ?></span>
						</label>

						<label class="col-xs-12">Profession <span>
							<?php echo $val['profession']; ?></span>
						</label>
						<label class="col-xs-3">State <span>
							<?php echo $val['city']; ?></span>
						</label>
						<label class="col-xs-3">City <span>
							<?php echo $val['other_city']; ?></span>
						</label>
						<label class="col-xs-3">Country  <span>
							<?php echo $val['country']; ?></span>
						</label>

			       </div>

			     </div>

		     <?php
}
}
?>
		   </div>
		   </div>
		</div>

	 </div>
        </div>
	</div>

</form>
<script type="text/javascript">
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

	// $('.mainfriend .frdprofile').click(function(){
	// 		var uid = $(this).attr('id');
	// 		$.ajax({
	//         	type:"POST",
	//         	url:"frdsprofile.php",
	//         	data:{id:uid},
	//         		success:function(result){
	//            		$('.frdsprofile').html(result); 
	// 				$('.frdsprofile .frdsprofile').show();
	//            		$('.post .profile').hide();	
						                
	//         	}
	//        	});
	// 		return false;
	// 	});
</script>


<!--///////////////////////////////////////////////////-->
<script type="text/javascript">
	$('.percentagelist1').hide();
	$('.coworkerlist1').hide();
	$('.religionlist1').hide();
	$('.agelistfriend').hide();
	$('input[type="checkbox"]').click(function(){
		if($(this).val()=='all'){
						if($(this).prop('checked')==true){$('.chk').prop('checked', true);}
						else{ $('.chk').prop('checked', false);}
					
						

						if ($('#mybookmarkfrnd1').prop("checked") == true){
							var mybookmark = 'mybookmark';
						}
						else
						{
							var mybookmark ='';
						}

						if ($('#mymsg1').prop("checked") == true){
							var mymsg = 'mymsg';
						}
						else
						{
							var mymsg ='';
						}
	
						if ($('#cellintrest1').prop("checked") == false)
						{			
								$('.percentagelist1').hide();
								if ($('#lastloging1').prop("checked") == true){
									var lastlog = 'lastlogin';
								}
								else
								{
									var lastlog ='';
								}

								if($('#searchfemale1').prop("checked") == true){
									var searchfemale = 'female';
								}
								else
								{
									var searchfemale = '';
								}

								if($('#searchmale1').prop("checked") == true){
									var searchmale = 'male';
								}
								else
								{
									var searchmale = '';
								}

								
								if($('#cellreligion1').prop("checked") == true){
									var searchreligion = $('#religion1').val();

								}else{
									var searchreligion = '';
								}
									
								if($('#cellcoworker1').prop("checked") == true){
									var searchcoworker = $('#coworker1').val();
								}else{
									var searchcoworker = '';
								}

						

						 			//var cells = '<?php echo $cellno; ?>';

									 $.ajax({
						         				type:"POST",
						        				url:"friend_searchajax.php",
						        				data:{mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion:searchreligion,searchcoworker:searchcoworker},
						        				success:function(result){
						        					//alert('post_searchajax/cell Interest not clicked');
						        					//console.log(result);
							        				$("#usersearch1").html(result);
						        				}
						       				 });

						}
						else
						{			
							//$('.percentagelist').show();

							if($('#searchfemale1').is(":checked")){

							var searchfemale = 'female';
							}
							else
							{
								var searchfemale = '';
							}

							if($('#searchmale1').is(":checked")){
								var searchmale = 'male';
							}
							else
							{
								var searchmale = '';
							}
							
							if($('#cellreligion1').prop("checked") == true){
								var religion = $('#religion1').val();
							}else{
								var religion = '';
							}
								
							if($('#searchageuser1').prop("checked") == true){
								var age_limit = $('#age_limit_post1').val();
							}
							else{
								var age_limit = '';
							}



							    $("#percetage1").change(function(){

							       	var percentage = $("#percetage1 option:selected").val();
					        		var cells = '<?php echo $cellno; ?>';
					        		//var age_limit = $("#age_limit_post option:selected").val();
							       	
				                        $.ajax({
							         			type:"POST",
							        			url:"friend_searchajax.php",
							        			data:{mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker,religion:religion},
							        			success:function(result){
							        			//	alert(result);
				    							//alert('post_searchajaxinterst/cell Interest clicked');
							        			$("#usersearch1").html(result);
							        			}
							       			 });
				                        return false;

							    });

							  		var percentage = $("#percetage1 option:selected").val();
									//var age_limit = $("#age_limit_post option:selected").val();
							       	
					        		var cells = '<?php echo $cellno; ?>';
				                        $.ajax({
							         			type:"POST",
							        			url:"friend_searchajax.php",
							        			data:{ mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker,religion:religion},
							        			success:function(result){
							        				//alert(result);
							        				$("#usersearch1").html(result);
							        			}
							       			 });

								       			 

						}

////////////////////////////////////////////////////////////////////////////////////


		if ($('#cellreligion1').prop("checked") == false)
		{
			$('.religionlist').hide();				
			
			if ($('#lastloging1').prop("checked") == true){
					var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale1').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion1').prop("checked") == true){
					var searchreligion = $('#religion1').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#cellcoworker1').prop("checked") == true){
					var searchcoworker = $('#coworker1').val();
				}else{
					var searchcoworker = '';
				}

				if ($('#myfriend1').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 			var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"friend_searchajax.php",
	        				data:{ mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,cells:cells,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,searchcoworker :searchcoworker},
	        				success:function(result){
        						//alert('post_searchajax/religion not clicked');
	        					//console.log(result);
		        				$("#usersearch1").html(result);
	        				}
	       				 });

		}
		else
		{

			$('.religionlist').show();
			if($('#searchfemale1').is(":checked")){

			var searchfemale = 'female';
			}
			else
			{
				var searchfemale = '';
			}

			if($('#searchmale1').is(":checked")){
				var searchmale = 'male';
			}
			else
			{
				var searchmale = '';
			}

			/*if($('#cellreligion').prop("checked") == true){
				var religion = $('#religion').val();
			}else{
				var religion = '';
			}*/

			if($('#searchageuser1').prop("checked") == true){
				var age_limit = $('#age_limit_post1').val();
			}else{
				var age_limit = '';
			}

			if ($('#myfriend1').prop("checked") == true){
				var myfriend = 'myfriend';
			}
			else
			{
				var myfriend ='';
			}

			if ($('#mybookmarkfrnd1').prop("checked") == true){
				var mybookmark = 'mybookmark';
			}
			else
			{
				var mybookmark ='';
			}

			if ($('#mymsg1').prop("checked") == true){
				var mymsg = 'mymsg';
			}
			else
			{
				var mymsg ='';
			}

				    $("#religion1").change(function(){

				       	var coworker = $("#coworker1 option:selected").val();
				       	//var age_limit = $("#age_limit_post option:selected").val();
				       	
				       	var religion = $('#religion1').val();

				       	var cells = '<?php echo $cellno; ?>';

		        		$.ajax({
		         			type:"POST",
		        			url:"friend_searchajax.php",
		        			data:{mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,religion:religion,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker},
		        			success:function(result){
	        					//alert('post_searchajaxinterst/religion clicked');
		        			//	alert(result);
		        			$("#usersearch1").html(result);
		        			}
		       			 });
	                        return false;

				    });		

				var coworker = $("#coworker1 option:selected").val();
				//var age_limit = $("#age_limit_post option:selected").val();
		       	var religion = '';
				var cells = '<?php echo $cellno; ?>';
                $.ajax({
	         			type:"POST",
	        			url:"friend_searchajax.php",
	        			data:{ mybookmark:mybookmark, mymsg:mymsg, age_limit:age_limit,religion:religion,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker},
	        			success:function(result){
        					//alert('post_searchajaxinterst/religionclicked but');
	        			//	alert(result);
	        			$("#usersearch1").html(result);
	        			}
	       			 });

		}

////////////////////////////////////////////////////////////////////////////////////


		if ($('#cellcoworker1').prop("checked") == true)
		{		
			//$('.coworkerlist').show();

			if($('#searchfemale1').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}
				if($('#cellreligion1').prop("checked") == true){
					var religion = $('#religion').val();
				}else{
					var religion = '';
				}

				if($('#searchageuser1').prop("checked") == true){
					var age_limit = $('#age_limit_post').val();
				}else{
					var age_limit = '';
				}

				
					var myfriend ='';
				

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    $("#coworker1").change(function(){

				       	var coworker = $("#coworker1 option:selected").val();
				       	//var age_limit = $("#age_limit_post option:selected").val();
				       	
		        		var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"friend_searchajax.php",
				        			data:{age_limit:age_limit,searchcoworker:coworker,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
        					//alert('post_searchajaxinterst/coworker clicked');
				        			//	alert(result);
				        			$("#usersearch1").html(result);
				        			}
				       			 });
	                        return false;

				    });		

				    var coworker = $("#coworker1 option:selected").val();
					//var age_limit = $("#age_limit_post option:selected").val();
				       	
	 				var cells = '<?php echo $cellno; ?>';
                        $.ajax({
			         			type:"POST",
			        			url:"friend_searchajax.php",
			        			data:{ mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,searchcoworker:coworker,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
			        			success:function(result){
        					//alert('post_searchajaxinterst/coworker not clicked');
			        			//	alert(result);
			        			$("#usersearch1").html(result);
			        			}
			       			 });	

		}
		else
		{
			$('.coworkerlist1').hide();

			if ($('#lastloging1').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale1').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion1').prop("checked") == true){
					var searchreligion = $('#religion1').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#cellcoworker1').prop("checked") == true){
					var searchcoworker = $('#coworker1').val();
				}else{
					var searchcoworker = '';
				}

				

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 			//var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"friend_searchajax.php",
	        				data:{ mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,searchcoworker :searchcoworker},
	        				success:function(result){
        					//alert('post_searchajax/coworker not clicked/selected');
	        					//alert(result);
	        					//console.log(result);
		        				$("#usersearch1").html(result);
	        				}
	       				 });



		}
		/////////////////////////////////////// Age /////////////////////////////////////////////////
if ($('#searchageuser1').prop("checked") == true)
		{
			
			if($('#searchfemale1').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}
			
				if($('#cellreligion1').prop("checked") == true){
					var religion = $('#religion1').val();
				}else{
					var religion = '';
				}

				if ($('#myfriend1').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    $("#age_limit_post1").change(function(){

				       	var age_limit = $("#age_limit_post1 option:selected").val();
				       	
		        		var cells = '<?php echo $cellno; ?>';
						//alert(age_limit);
	                        $.ajax({
				         			type:"POST",
				        			url:"friend_searchajax.php",
				        			data:{ mybookmark:mybookmark, mymsg:mymsg, age_limit:age_limit,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
				        				//alert(result);
				        			$("#usersearch1").html(result);
				        			}
				       			 });
	                        return false;

				    });		


				if($('#searchageuser1').prop("checked") == true){
					var age_limit = $('#age_limit_post1').val();
				}else{
					var age_limit = '';
				}

				if ($('#myfriend1').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    //var age_limit = $("#age_limit_post option:selected").val();

		 				var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"friend_searchajax.php",
				        			data:{ mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
				        				//alert(result);
				        			$("#usersearch1").html(result);
				        			}
				       			 });	

		}
		else
		{
			$('.agelist1').hide();

			if ($('#lastloging1').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale1').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion1').prop("checked") == true){
					var searchreligion = $('#religion1').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#searchageuser1').prop("checked") == true){
					var age_limit = $('#age_limit_post1').val();
				}else{
					var age_limit = '';
				}

				

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 				//var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"post_searchajax.php",
	        				data:{ mybookmark:mybookmark, mymsg:mymsg,lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,age_limit:age_limit,searchcoworker:searchcoworker},
	        				success:function(result){
	        					//alert(result);
	        					//console.log(result);
		        				$("#usersearch").html(result);
	        				}
	       				 });
		}
		 
		}
			//else{alert(2);}

		

		if ($('#mybookmarkfrnd1').prop("checked") == true){
			var mybookmark = 'mybookmark';
		}
		else
		{
			var mybookmark ='';
		}

		if ($('#mymsg1').prop("checked") == true){
			var mymsg = 'mymsg';
		}
		else
		{
			var mymsg ='';
		}
	
		if ($('#cellintrest1').prop("checked") == false)
		{			
			$('.percentagelist1').hide();
			if ($('#lastloging1').prop("checked") == true){
				var lastlog = 'lastlogin';
			}
			else
			{
				var lastlog ='';
			}

			if($('#searchfemale1').prop("checked") == true){
				var searchfemale = 'female';
			}
			else
			{
				var searchfemale = '';
			}

			if($('#searchmale1').prop("checked") == true){
				var searchmale = 'male';
			}
			else
			{
				var searchmale = '';
			}

			
			if($('#cellreligion1').prop("checked") == true){
				var searchreligion = $('#religion1').val();

			}else{
				var searchreligion = '';
			}
				
			if($('#cellcoworker1').prop("checked") == true){
				var searchcoworker = $('#coworker').val();
			}else{
				var searchcoworker = '';
			}

			

 			//var cells = '<?php echo $cellno; ?>';

			 $.ajax({
         				type:"POST",
        				url:"friend_searchajax.php",
        				data:{ mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion:searchreligion,searchcoworker:searchcoworker},
        				success:function(result){
        					//alert('post_searchajax/cell Interest not clicked');
        					//console.log(result);
	        				$("#usersearch1").html(result);
        				}
       				 });

		}
		else
		{			
			//$('.percentagelist').show();

			if($('#searchfemale1').is(":checked")){

			var searchfemale = 'female';
			}
			else
			{
				var searchfemale = '';
			}

			if($('#searchmale1').is(":checked")){
				var searchmale = 'male';
			}
			else
			{
				var searchmale = '';
			}
			
			if($('#cellreligion1').prop("checked") == true){
				var religion = $('#religion1').val();
			}else{
				var religion = '';
			}
				
			if($('#searchageuser1').prop("checked") == true){
				var age_limit = $('#age_limit_post1').val();
			}
			else{
				var age_limit = '';
			}



			    $("#percetage1").change(function(){

			       	var percentage = $("#percetage1 option:selected").val();
	        		var cells = '<?php echo $cellno; ?>';
	        		//var age_limit = $("#age_limit_post option:selected").val();
			       	
                        $.ajax({
			         			type:"POST",
			        			url:"friend_searchajax.php",
			        			data:{ mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker,religion:religion},
			        			success:function(result){
			        			//	alert(result);
    							//alert('post_searchajaxinterst/cell Interest clicked');
			        			$("#usersearch1").html(result);
			        			}
			       			 });
                        return false;

			    });

			  		var percentage = $("#percetage1 option:selected").val();
					//var age_limit = $("#age_limit_post option:selected").val();
			       	
	        		var cells = '<?php echo $cellno; ?>';
                        $.ajax({
			         			type:"POST",
			        			url:"friend_searchajax.php",
			        			data:{ mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker,religion:religion},
			        			success:function(result){
			        				//alert(result);
			        				$("#usersearch1").html(result);
			        			}
			       			 });

				       			 

		}

////////////////////////////////////////////////////////////////////////////////////


		if ($('#cellreligion1').prop("checked") == false)
		{
			$('.religionlist1').hide();				
			
			if ($('#lastloging1').prop("checked") == true){
					var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale1').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion1').prop("checked") == true){
					var searchreligion = $('#religion1').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#cellcoworker1').prop("checked") == true){
					var searchcoworker = $('#coworker1').val();
				}else{
					var searchcoworker = '';
				}

				if ($('#myfriend1').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 			var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"friend_searchajax.php",
	        				data:{ mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,cells:cells,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,searchcoworker :searchcoworker},
	        				success:function(result){
        						//alert('post_searchajax/religion not clicked');
	        					//console.log(result);
		        				$("#usersearch1").html(result);
	        				}
	       				 });

		}
		else
		{

			$('.religionlist1').show();
			if($('#searchfemale1').is(":checked")){

			var searchfemale = 'female';
			}
			else
			{
				var searchfemale = '';
			}

			if($('#searchmale1').is(":checked")){
				var searchmale = 'male';
			}
			else
			{
				var searchmale = '';
			}

			/*if($('#cellreligion').prop("checked") == true){
				var religion = $('#religion').val();
			}else{
				var religion = '';
			}*/

			if($('#searchageuser1').prop("checked") == true){
				var age_limit = $('#age_limit_post1').val();
			}else{
				var age_limit = '';
			}

			if ($('#myfriend1').prop("checked") == true){
				var myfriend = 'myfriend';
			}
			else
			{
				var myfriend ='';
			}

			if ($('#mybookmarkfrnd1').prop("checked") == true){
				var mybookmark = 'mybookmark';
			}
			else
			{
				var mybookmark ='';
			}

			if ($('#mymsg1').prop("checked") == true){
				var mymsg = 'mymsg';
			}
			else
			{
				var mymsg ='';
			}

				    $("#religion1").change(function(){

				       	var coworker = $("#coworker1 option:selected").val();
				       	//var age_limit = $("#age_limit_post option:selected").val();
				       	
				       	var religion = $('#religion1').val();

				       	var cells = '<?php echo $cellno; ?>';

		        		$.ajax({
		         			type:"POST",
		        			url:"friend_searchajax.php",
		        			data:{ mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,religion:religion,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker},
		        			success:function(result){
	        					//alert('post_searchajaxinterst/religion clicked');
		        			//	alert(result);
		        			$("#usersearch1").html(result);
		        			}
		       			 });
	                        return false;

				    });		

				var coworker = $("#coworker1 option:selected").val();
				//var age_limit = $("#age_limit_post option:selected").val();
		       	var religion = '';
				var cells = '<?php echo $cellno; ?>';
                $.ajax({
	         			type:"POST",
	        			url:"friend_searchajax.php",
	        			data:{ mybookmark:mybookmark, mymsg:mymsg, age_limit:age_limit,religion:religion,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker},
	        			success:function(result){
        					//alert('post_searchajaxinterst/religionclicked but');
	        			//	alert(result);
	        			$("#usersearch").html(result);
	        			}
	       			 });

		}

////////////////////////////////////////////////////////////////////////////////////


		if ($('#cellcoworker1').prop("checked") == true)
		{		
			//$('.coworkerlist').show();

			if($('#searchfemale1').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}
				if($('#cellreligion1').prop("checked") == true){
					var religion = $('#religion1').val();
				}else{
					var religion = '';
				}

				if($('#searchageuser1').prop("checked") == true){
					var age_limit = $('#age_limit_post1').val();
				}else{
					var age_limit = '';
				}

				if ($('#myfriend1').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    $("#coworker1").change(function(){

				       	var coworker = $("#coworker1 option:selected").val();
				       	//var age_limit = $("#age_limit_post option:selected").val();
				       	
		        		var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"friend_searchajax.php",
				        			data:{age_limit:age_limit,searchcoworker:coworker,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
        					//alert('post_searchajaxinterst/coworker clicked');
				        			//	alert(result);
				        			$("#usersearch1").html(result);
				        			}
				       			 });
	                        return false;

				    });		

				    var coworker = $("#coworker1 option:selected").val();
					//var age_limit = $("#age_limit_post option:selected").val();
				       	
	 				var cells = '<?php echo $cellno; ?>';
                        $.ajax({
			         			type:"POST",
			        			url:"friend_searchajax.php",
			        			data:{ mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,searchcoworker:coworker,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
			        			success:function(result){
        					//alert('post_searchajaxinterst/coworker not clicked');
			        			//	alert(result);
			        			$("#usersearch1").html(result);
			        			}
			       			 });	

		}
		else
		{
			$('.coworkerlist1').hide();

			if ($('#lastloging1').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale1').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion1').prop("checked") == true){
					var searchreligion = $('#religion1').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#cellcoworker1').prop("checked") == true){
					var searchcoworker = $('#coworker1').val();
				}else{
					var searchcoworker = '';
				}

				if ($('#myfriend1').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 			//var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"friend_searchajax.php",
	        				data:{mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,searchcoworker :searchcoworker},
	        				success:function(result){
        					//alert('post_searchajax/coworker not clicked/selected');
	        					//alert(result);
	        					//console.log(result);
		        				$("#usersearch1").html(result);
	        				}
	       				 });



		}
		/////////////////////////////////////// Age /////////////////////////////////////////////////
if ($('#searchageuser1').prop("checked") == true)
		{
			
			if($('#searchfemale1').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}
			
				if($('#cellreligion1').prop("checked") == true){
					var religion = $('#religion1').val();
				}else{
					var religion = '';
				}


				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    $("#age_limit_post1").change(function(){

				       	var age_limit = $("#age_limit_post1 option:selected").val();
				       	
		        		var cells = '<?php echo $cellno; ?>';
						//alert(age_limit);
	                        $.ajax({
				         			type:"POST",
				        			url:"friend_searchajax.php",
				        			data:{ mybookmark:mybookmark, mymsg:mymsg, age_limit:age_limit,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
				        				//alert(result);
				        			$("#usersearch1").html(result);
				        			}
				       			 });
	                        return false;

				    });		


				if($('#searchageuser1').prop("checked") == true){
					var age_limit = $('#age_limit_post').val();
				}else{
					var age_limit = '';
				}

				
				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    //var age_limit = $("#age_limit_post option:selected").val();

		 				var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"friend_searchajax.php",
				        			data:{ mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
				        				//alert(result);
				        			$("#usersearch1").html(result);
				        			}
				       			 });	

		}
		else
		{
			$('.agelist1').hide();

			if ($('#lastloging1').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale1').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion1').prop("checked") == true){
					var searchreligion = $('#religion1').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#searchageuser1').prop("checked") == true){
					var age_limit = $('#age_limit_post1').val();
				}else{
					var age_limit = '';
				}

			

				if ($('#mybookmarkfrnd1').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg1').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 				//var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"friend_searchajax.php",
	        				data:{ mybookmark:mybookmark, mymsg:mymsg,lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,age_limit:age_limit,searchcoworker:searchcoworker},
	        				success:function(result){
	        					//alert(result);
	        					//console.log(result);
		        				$("#usersearch1").html(result);
	        				}
	       				 });
		}

		});


function checkintrest1(value){
	if($('#cellintrest1').prop("checked") == true){
		$('.percentagelist1').show();
		$('.coworkerlist1').hide();
		$('.religionlist1').hide();
		$('.agelistfriend').hide();
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}

function checkmale1(value){
	if($('#searchmale1').prop("checked") == true){
		$('.percentagelist1').hide();
		$('.coworkerlist1').hide();
		$('.religionlist1').hide();
		$('.agelistfriend').hide();
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}

function checklastloging1(value){
	if($('#lastloging1').prop("checked") == true){
		$('.percentagelist1').hide();
		$('.coworkerlist1').hide();
		$('.religionlist1').hide();
		$('.agelistfriend').hide();
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
	}
}

function checkfemale1(value){
	if($('#searchfemale1').prop("checked") == true){
		$('.percentagelist1').hide();
		$('.coworkerlist1').hide();
		$('.religionlist1').hide();
		$('.agelistfriend').hide();
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}


function checkreligion1(value){
	if($('#cellreligion1').prop("checked") == true){
		$('.percentagelist1').hide();
		$('.coworkerlist1').hide();
		$('.religionlist1').show();
		$('.agelistfriend').hide();
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}
function checkcoworker1(value){
	if($('#cellcoworker1').prop("checked") == true){
		$('.percentagelist1').hide();
		$('.coworkerlist1').show();
		$('.religionlist1').hide();
		$('.agelistfriend').hide();
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}
function ageSearch(value){
	if($('#searchage1').prop("checked") == true){
		$('.agelistfriend').show();
		$('.percentagelist1').hide();
		$('.coworkerlist1').hide();
		$('.religionlist1').hide();
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}

</script>

<script type="text/javascript">

	//$(document).ready( function(){
		$('#close-window2').click(function(){
			// alert('dfgdfg');
        	//$('.profile').hide();
               $('.friend').hide();
      	});
	//})
	function window_minimize(){
		$('.profile').hide();
	}

	$('#search1').keyup(function(){
		var search = document.getElementById('search1').value;
			console.log(search);
			$("#fusersearch").html("");
		 $.ajax({
			type:"POST",
			url:"friend_searchajax.php",
			data:{search:search},
			success:function(result){

				//alert(result);
				$("#fusersearch").html(result);
			}
			 });

	});

$(".addfriend").click(function(){
	var cur_id =  $(this).attr('id');	
	var u_id = '<?php echo $_SESSION['user_id'];?>';	
	var f_id =  $(this).attr('id').replace('K_','');
	
	$.ajax({
			type:"POST",
			url:"add_friend.php",
			data:{u_id:u_id,f_id:f_id},
			success:function(result){		
				$("#frend_message").html(result);
				$("#frend_message").show();
				$("#"+cur_id).html("Friend").removeClass('addfriend');
			}
		 });
	return false;

});

$('.allFriend').click(function(){
	var u_id = '<?php echo $_SESSION['user_id'];?>';
		$.ajax({
     		type:"POST",
    		url:"my_friends.php",
    		data:{id:u_id},
    			success:function(result){
        		$('.frdsprofile').html(result);
				$('.frdsprofile .frdsprofile').show();
        		$('.post .profile').hide();
    		}
   		 });
		return false;
});


$(".bookmark").click(function(){
	var cur_id =  $(this).attr('id');	
	var u_id = '<?php echo $_SESSION['user_id'];?>';	
	var f_id =  $(this).attr('id').replace('MK_','');
	
	$.ajax({
			type:"POST",
			url:"add_friend.php",
			data:{action:'bookmark',u_id:u_id,f_id:f_id},
			success:function(result){		
				$("#frend_message").html(result);
				$("#frend_message").show();
				$("#"+cur_id).html("bookmarked").removeClass('bookmark');
			}
		 });
	return false;
});



/*$('.fa-window-minimize').click(function(){
    $('.fa-window-maximize').show();
    $('.fa-window-maximize').css("display","block");
    $('#restore-window-maximize-t').show();
    $('.msgthreaduser').css("max-width","900px"); 
    $('.msgthreaduser').height('100%');
});
$('.fa-window-restore').click(function(){
    $('.fa-window-restore').hide();
    $('#restore-window-t').show();    
    //$('.fa-window-maximize').css("display","block");
    $('.msgthreaduser').css("max-width","30%"); 
    $('.msgthreaduser').height('80%');
});
*/

$('.fa-window-restore').click(function(){

		$('.fa-window-restore').hide();
		$('.fa-window-maximize').show();
		$('.updater').height('100%');
    	$('.updater').height('100%');
    	$('.updater').css("max-width","900px"); 
    	$('.updater .recent-box-sc').height('100%');    	
	});
	
	$('.fa-window-maximize').click(function(){
		
		$('.fa-window-restore').show();
		$('.fa-window-maximize').hide();
		$('.updater').height('500px');
		$('.updater').css("max-width","741px"); 
		$('.profile').height('auto');
	});
$(".remove-friend").click(function(){ 
	var friend_id =  $(this).attr('id');
	var session_id = '<?php echo $_SESSION['user_id'];?>';	
	alert(friend_id);
	if(confirm('Are you sure to remove this friend?')){	
		$.ajax({
				type:"POST",
				url:"add_friend.php",
				data:{action:'remove_friend',user_id:session_id,friend_id:friend_id},
				success:function(result){		
					//alert(result);
					location.reload(); 
				}
		});	
	}	
});

</script>




