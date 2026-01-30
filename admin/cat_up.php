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
	
if($cat_id!=''){
				
		$mysqli->query("UPDATE `cat` SET `cat`='$cat_name' WHERE `cat_id`='$cat_id'");
		$_SESSION['msgs']="Category Updated Successful";
	header("Location:$location");
	}else{
		$_SESSION['msg']="Failed";
		header("Location:$location");
	}
	
	
	
	
}
	?>
	