<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';

		$serial=$_GET['serial'];
		$location="bal_pay_to_del.php";
		if($serial!=''){
		$mysqli->query("delete FROM `dealer_trx` WHERE `serial`='".$serial."' ");
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