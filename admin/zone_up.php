<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else
	{
	require '../db/db.php';

	$cat_id=$mysqli->real_escape_string($_POST['cat_id']);
	$cat_name=$mysqli->real_escape_string($_POST['cat']);
  
	$location="zone.php";
	
if($cat_id!=''){
				
		$mysqli->query("UPDATE `zone` SET `zone`='$cat_name' WHERE `zone_id`='$cat_id'");
		$_SESSION['msgs']="Zone Updated Successful";
	header("Location:$location");
	}else{
		$_SESSION['msg']="Failed";
		header("Location:$location");
	}
	
	
	
	
}
	?>
	