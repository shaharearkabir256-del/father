<?php
ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location:logout.php");
		exit();
	}
	else{
		require('../db/db.php');
		$catId=$mysqli->real_escape_string($_GET['userid']);
		$catchk=$mysqli->real_escape_string($_GET['chk']);
		$location="member.php";
		
		if($catchk==1){
			$mysqli->query("update `tree` set `active`='0' where `user_id`='".$catId."' ");
			$message="You Are Suspended To Sponsor";
			$mysqli->query("INSERT INTO `msg`(`user_id`, `msg`,`chk`,`mdate`) VALUES ('".$catId."','".$message."','1','".$datef."')"); //0=Public; 1=Only me; 2=Friends; 3= Customize
			
			$_SESSION['msg']="Sponsor Suspended";
			header("Location:$location");
		}
		elseif($catchk==0){
			$mysqli->query("update `tree` set `active`='1' where `user_id`='".$catId."' ");
			$message="You Are Suspended To Sponsor";
			$mysqli->query("INSERT INTO `msg`(`user_id`, `msg`,`chk`,`mdate`) VALUES ('".$catId."','".$message."','1','".$datef."')"); //0=Public; 1=Only me; 2=Friends; 3= Customize
			
			$_SESSION['msgs']="Sponsor Activation Success";
			header("Location:$location");
		}
		else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}