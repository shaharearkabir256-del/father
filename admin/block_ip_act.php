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
		$catId=$mysqli->real_escape_string($_GET['id']);
		$catchk=$mysqli->real_escape_string($_GET['chk']);
		$location="block_ip.php";
		
		if($catchk==1){
			$mysqli->query("update `hacker` set `block`='1' where `serial`='".$catId."' ");
			$_SESSION['msg']="Inactivation Success";
			header("Location:$location");
		}
		elseif($catchk==0){
			$mysqli->query("update `hacker` set `block`='0' where `serial`='".$catId."' ");
			$_SESSION['msgs']="Activation Success";
			header("Location:$location");
		}
		else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}