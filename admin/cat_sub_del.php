<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';

$scatid=$mysqli->real_escape_string($_GET['scatid']);
 $location="cat.php";
if($scatid!=''){
	
    //$mysqli->query("DELETE FROM `scat` WHERE `scat_id`='".$scatid."' ");
	$_SESSION["msgs"]="DELETE Successful";
	header("Location:$location");
	exit();
}else{
	$_SESSION["msg"]="DELETE Fail";
	header("Location:$location");
	exit();
}
	}
?>