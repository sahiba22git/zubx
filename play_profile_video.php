<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

if(isset($_POST['id']))
{
	$id=$_POST['id'];

	$where = 'slide_id = '.$id;

	$audiorows = $user->select_row('tbl_slidervideo','*',$where);
	
	$path = $audiorows['video_path'];
	$audionm=explode('Slider/', $path);
	//echo "<pre>"; print_r($path); die;
	$audioname=$audionm[1];
			

}
?>

 
	<video controls="controls" width="320" height="240" >
	 <source src="<?php echo 'http://localhost/zuubox/'.$path; ?>" type="video/mp4">						 
	</video> 
	<br>
	<center><?php echo $audioname;?></center><?php echo die; ?>