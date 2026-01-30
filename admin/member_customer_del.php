<?php
ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location: ../admin/index.php");
		exit();
	}
	else{
		require '../db/db.php';
		$catId=$mysqli->real_escape_string($_GET['userid']);

		$location="member_customer.php";
		
		if($catId>0){
			$mysqli->query("delete from `member` where `user_id`='".$catId."' limit 1 ");
			$mysqli->query("delete from `profile` where `user_id`='".$catId."' limit 1 ");
			$_SESSION['msgs']="Delete Success";
			header("Location:$location");
		}else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}