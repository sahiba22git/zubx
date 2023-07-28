<?php
session_start();
//echo "<pre>"; print_r($_SESSION); echo "</pre>";die;
if (isset($_POST['activity_id'])) {
	$_SESSION['activity_id'] = $_POST['activity_id'];
	echo $_SESSION['activity_id'];
}
if (isset($_POST['type'])) {
	$_SESSION['type'] = $_POST['type'];
	if($_POST['type'] == 2)
	{
		$_SESSION['friend_id'] = $_POST['friend_id'];
	}
	echo $_SESSION['type'];
}