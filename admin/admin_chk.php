<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$admin=$_SESSION["AdminUserId"]; 
		$catId=$mysqli->real_escape_string($_GET['userid']);
		$catchk=$mysqli->real_escape_string($_GET['chk']);
		$location="admin.php";
		
		if($catchk==1){
			$mysqli->query("update `admin` set `chk`='0' where `user_id`='".$catId."' ");
			$_SESSION['msgs']="Inactivation Success";
			header("Location:$location");
		}
		elseif($catchk==0){
			$mysqli->query("update `admin` set `chk`='1' where `user_id`='".$catId."' ");
			$_SESSION['msgs']="Activation Success";
			header("Location:$location");
		}
		else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}