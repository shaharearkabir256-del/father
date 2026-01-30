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

		$brand=$mysqli->real_escape_string(strtolower($_POST['brand']));
		$brand_id=$mysqli->real_escape_string($_POST['brand_id']);
		$cat_id=$mysqli->real_escape_string($_POST['cat_id']);
		$scat_id=$mysqli->real_escape_string($_POST['scat_id']);

 	$location="zone.php";
	
	if($brand==''){
		$_SESSION['msg'] ="Please Enter ward Name";
		header("Location:$location");
		exit();
	}
	

	if(($brand!='')&&($cat_id!='')&&($scat_id!='')){
	$mysqli->query("INSERT INTO `ward`(`zone_id`,`upozela_id`,`union_id`,`ward`) VALUES ('".$cat_id."','".$scat_id."','".$brand_id."','".$brand."')");
	$_SESSION['msgs']="Added Successful";
	header("Location:$location");
	exit();
	}else{
		$_SESSION['msg']="Failed";
		header("Location:$location");
	}
	
	

}
	
?>