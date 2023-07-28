<?php
require_once("classes/cls-cell.php");
$obj_cell = new cell();
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
{ 
	// echo "Hii<pre>";
	// print_r($_POST);die;
	 $cell=$_POST['cell'];
	 $cell_parent=$_POST['cell_parent'];

	 $obj_cell->insertCell(array("cell_name"=>$cell,"cell_parent"=>$cell_parent,"add_date"=>date("Y-m-d H:i:s")));
	 	   $_SESSION['success'] = "Add cell successfully.";
	        header("location:manage-cell.php");
	        exit();
}
}
else
{
	// echo "Hii 22 <pre>";
	// print_r($_POST);die;
			$condition = "`cell_id` = '" . base64_decode($_POST['cell_id']) . "'";
			$update_data['cell_name']=$_POST['cell'];
			$update_data['cell_parent']=$_POST['cell_parent'];
	 		$update_data['add_date'] = date('Y-m-d H:i:s'); 
	 		$obj_cell->updatecell($update_data, $condition, 0);

	 		$_SESSION['success'] = "Update cell successfully.";
	        header("location:manage-cell.php");
	        exit();
}





?>