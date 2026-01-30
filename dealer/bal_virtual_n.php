<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';

		$sn=$_GET['sn'];
		$location="bal_virtual_to_del.php";
		if($sn!=''){
		$mysqli->query("delete FROM `dealer_trx` WHERE `serial`='".$sn."' and `type`='2' ");
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