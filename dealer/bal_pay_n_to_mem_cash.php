<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';

		$serial=$mysqli->real_escape_string($_GET['serial']);
		$location="bal_pay_to_mem_cash.php";
		if($serial>0){
		$mysqli->query("delete FROM `withdraw` WHERE `serial`='".$serial."' and `type`='1' ");
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