<?php
require_once("classes/cls-skill.php");
$obj_skill = new skill();
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
{ 
	// echo "Hii<pre>";
	// print_r($_POST);die;
	 $skill=$_POST['skill'];

	 $obj_skill->insertskill(array("skill_name"=>$skill,"add_date"=>date("Y-m-d H:i:s")));
	 	   $_SESSION['success'] = "Add skill successfully.";
	        header("location:manage-skill.php");
	        exit();
}
}
else
{
	// echo "Hii 22 <pre>";
	// print_r($_POST);die;
			$condition = "`skill_id` = '" . base64_decode($_POST['skill_id']) . "'";
			$update_data['skill_name']=$_POST['skill'];
	 		$update_data['add_date'] = date('Y-m-d H:i:s'); 
	 		$obj_skill->updateskill($update_data, $condition, 0);

	 		$_SESSION['success'] = "Update skill successfully.";
	        header("location:manage-skill.php");
	        exit();
}





?>