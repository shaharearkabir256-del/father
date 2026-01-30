<?php
ob_start();
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
		$location=$mysqli->real_escape_string($_GET['location']);
		$location="dealer_dh.php";
	
	
		if($catchk==1){
			$mysqli->query("update `dealer` set `chk`='0' where `user_id`='".$catId."' ");
			$message="You Are Suspended To Login";
			$mysqli->query("INSERT INTO `msg`(`user_id`, `msg`,`chk`,`mdate`) VALUES ('$catId','".$message."','1','".$datef."')"); //0=Public; 1=Only me; 2=Friends; 3= Customize
			
			$_SESSION['msgs']="Inactivation Success";
			header("Location:$location");
		}
		elseif($catchk==0){
			$mysqli->query("update `dealer` set `chk`='1' where `user_id`='".$catId."' ");
			$message="You Are Able To Login";
			$mysqli->query("INSERT INTO `msg`(`user_id`, `msg`,`chk`,`mdate`) VALUES ('$catId','".$message."','1','".$datef."')"); //0=Public; 1=Only me; 2=Friends; 3= Customize
			
			$_SESSION['msgs']="Activation Success";
			header("Location:$location");
		}
		else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}