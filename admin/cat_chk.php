<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$catId=$mysqli->real_escape_string($_GET['catser']);
		$catchk=$mysqli->real_escape_string($_GET['chk']);
		$location="cat.php";
		if($catchk==1){
			$mysqli->query("update `cat` set `chk`='0' where `cat_id`='".$catId."' ");
			$_SESSION['msgs']="Inactivation Success";
			header("Location:$location");
		}
		elseif($catchk==0){
			$mysqli->query("update `cat` set `chk`='1' where `cat_id`='".$catId."' ");
			$_SESSION['msgs']="Activation Success";
			header("Location:$location");
		}
		else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}