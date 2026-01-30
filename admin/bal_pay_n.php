<?php ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';

		$sendid=$_GET['sendId'];
		$sn=$_GET['sn'];
		$location="payments.php";
		if(($sn!='')&&($sendid!='')){
		$mysqli->query("delete FROM `withdraw` WHERE `send_id`='".$sendid."' and `serial`='".$sn."'");
		$_SESSION['msg']= "Payment Canceled";
		header("Location:$location");
		exit();	
		}else{
		$_SESSION['msg']= "Failed!";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>