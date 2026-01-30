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
	$sub_cat_name=$mysqli->real_escape_string(strtolower($_POST['sub_cat_name']));
 	$location="zone.php";
	
	if($sub_cat_name==''){
			$_SESSION['msg'] ="Please Enter Upzela Name";
			header("Location:$location");
			exit();
			}
	
	$chk=mysqli_num_rows($mysqli->query("SELECT * FROM `upozela` "));
	if($chk==65){ 
	$_SESSION['msg']="You Can Not Added More then 65 Zone";
	header("Location:$location");
	exit();	
	}
	if(($sub_cat_name!='')&&($cat_id!='')&&($chk!=65)){
	$mysqli->query("INSERT INTO `upozela`(`zone_id`,`upozela`) VALUES ('".$cat_id."','".$sub_cat_name."')");
	$_SESSION['msgs']="Added Successful";
	header("Location:$location");
	exit();
	}else{
		$_SESSION['msg']="Failed";
		header("Location:$location");
	}
	
	

}
	
?>