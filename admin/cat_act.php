<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';

	$cat_id=$mysqli->real_escape_string($_POST['cat_id']);
	$cat_name=$mysqli->real_escape_string($_POST['cat']);
 
	$location="cat.php";
	
	if($cat_name!=''){
	$mysqli->query("INSERT INTO `cat`(`cat`,`cat_img`,`cat_fimg`) VALUES ('".$cat_name."','".$cat_icon."','".$fimg."')");
	$_SESSION['msgs']="Category Added Successful";
	header("Location:$location");
	exit();
	}else{
		$_SESSION['msg']="Failed";
		header("Location:$location");
	}

}
	
?>