<?php
ob_start();
	session_start();
	require "../db/db.php";
	$user =$mysqli->real_escape_string($_POST['memberiId']);

	$q1=$mysqli->query("SELECT * FROM `admin` WHERE `user_id`='".$user."' and `chk`='1'");	
	$check = mysqli_num_rows($q1);
	$ad=mysqli_fetch_object($q1);
	$memberid=$ad->user_id;
	if($check==1){
	
		$_SESSION['AdminUserId'] =$memberid;
		header("Location: ../admin/home.php");
		exit();
	}else{
		$_SESSION['msg'] = "MemberId Inactive";
		header("Location: ../admin/admin_login.php");
		exit();
	}
?>