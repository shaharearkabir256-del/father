<?php
ob_start();
	session_start();
	require "../db/db.php";
	$user =$mysqli->real_escape_string($_POST['memberiId']);

	$q1=$mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$user."' and `active`='1'");	
	$check = mysqli_num_rows($q1);
	$ad=mysqli_fetch_object($q1);
	$memberid=$ad->user_id;
	if($check==1){
	
		$_SESSION['DealerLogId'] =$memberid;
		header("Location: ../dealer/home.php");
		exit();
	}else{
		$_SESSION['msg'] = "DealerId Inactive";
		header("Location: ../admin/dealer_login.php");
		exit();
	}
?>