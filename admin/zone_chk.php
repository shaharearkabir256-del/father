<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$admin=$_SESSION["Admin"]; 
		$catId=$mysqli->real_escape_string($_GET['catser']);
		$catchk=$mysqli->real_escape_string($_GET['chk']);
		$location="zone.php";
		
		if($catchk==1){
			$mysqli->query("update `zone` set `chk`='0' where `zone_id`='".$catId."' ");
			$_SESSION['msg']="Inactivation Success";
			header("Location:$location");
		}
		elseif($catchk==0){
			$mysqli->query("update `zone` set `chk`='1' where `zone_id`='".$catId."' ");
			$_SESSION['msgs']="Activation Success";
			header("Location:$location");
		}
		else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}