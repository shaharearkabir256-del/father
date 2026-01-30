<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';
		
		$accounts=$_SESSION['DealerLogId']; 
	
		$serial=$_GET['serial'];
		$location="bal_pay_to_del.php";
		
		$q1=$mysqli->query("SELECT * FROM `dealer_trx` WHERE `serial`='".$serial."'  ");
		$check=mysqli_num_rows($q1);
		$with=mysqli_fetch_object($q1);
		$amount=$with->amount;
		$recid=$with->send_id;
/* 			$ad=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `dealer_balance` WHERE `user_id`='".$accounts."'"));
			$netbal=$ad->net_bal;
			
			if($amount>$netbal){
			$_SESSION['msg'] = "Balance is Low! Please Recharge Balance";
			header("Location:$location");
			exit();
			} */
			
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
		$mysqli->query("update `dealer_trx` set `status`='1',`take`='1' WHERE `serial`='".$serial."' ");
		$_SESSION['msgs']= "Payment Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Payment Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>