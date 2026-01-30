<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';
		
		$id=$_SESSION['DealerLogId']; 

		$sn=$_GET['sn'];
		$location="bal_virtual_to_del.php";
		
		$q1=$mysqli->query("SELECT * FROM `dealer_trx` WHERE `serial`='".$sn."' and `type`='2' ");
		$check=mysqli_num_rows($q1);
		$with=mysqli_fetch_object($q1);
		$amount=$with->amount;
		$sn=$with->serial;
		$recid=$with->send_id;
			$ad=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `dealer_balance` WHERE `user_id`='".$id."'"));
			$netbal=$ad->net_bal;
			
			if($amount>$netbal){
			$_SESSION['msg'] = "Balance is Low! Please Recharge Balance";
			header("Location:$location");
			exit();
			}
			
			if($amount==''){
			$_SESSION['msg'] = "Request Amount is Empty";
			header("Location:$location");
			exit();
			}
			
			if($amount<0){
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			if($check==0){
			$_SESSION['msg'] = "Invalid UserId";
			header("Location:$location");
			exit();
			}
		
			
		if(($check==1)&&($amount!='')&&($amount>0)){
		$mysqli->query("update `dealer_trx` set `status`='1', `take`='1' WHERE `serial`='".$sn."' ");
		$_SESSION['msgs']= "Payment Successful";
		header("Location:bal_trx.php");
		exit();
		}else{
		$_SESSION['msg']= "Payment Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>