<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';

	

	$location="cat.php";

	if(isset($_POST['sub_add'])){
		
		
		$cat_id=$mysqli->real_escape_string($_POST['cat_id']);
		$sub_cat_name=$mysqli->real_escape_string($_POST['sub_cat_name']);
		if($cat_id =='select'){
			$_SESSION['msg'] = "Please select A Category";
			header("Location:$location");
			}
		
		if($sub_cat_name ==''){
			$_SESSION['msg'] ="Please select Add Sub Category Name";
			header("Location:$location");
			}
			
		
		if($sub_cat_name!=''){
		$mysqli->query("INSERT INTO `scat`(`cat_id`,`scat`) VALUES ('$cat_id','$sub_cat_name')");
		$_SESSION['msgs'] ="Sub Category Added Successfully";
		header("Location:$location");
		}
	}	

	}	
?>