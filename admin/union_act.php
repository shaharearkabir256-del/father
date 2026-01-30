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
		$cat_id=$mysqli->real_escape_string($_POST['cat_id']);
		$scat_id=$mysqli->real_escape_string($_POST['sub_cat_id']);

 	$location="zone.php";
	
	if($brand==''){
		$_SESSION['msg'] ="Please Enter Union Name";
		header("Location:$location");
		exit();
	}
	

	if(($brand!='')&&($cat_id!='')&&($scat_id!='')){
	$mysqli->query("INSERT INTO `union`(`zone_id`,`upozela_id`,`union`) VALUES ('".$cat_id."','".$scat_id."','".$brand."')");
	$_SESSION['msgs']="Added Successful";
	header("Location:$location");
	exit();
	}else{
		$_SESSION['msg']="Failed";
		header("Location:$location");
	}
	
	

}
	
?>