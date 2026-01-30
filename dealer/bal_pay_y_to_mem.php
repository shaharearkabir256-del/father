<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';
		require '../db/function.php';
		$accounts=$_SESSION['DealerLogId']; 
	
		
		$sendid=$_GET['sendId'];
		$sn=$_GET['sn'];
		$location="bal_pay_to_mem.php";
		
		$q1=$mysqli->query("SELECT * FROM `withdraw` WHERE `send_id`='".$sendid."' and `serial`='".$sn."' and `type`='0' ");
		$check=mysqli_num_rows($q1);
		$with=mysqli_fetch_object($q1);
		$amount=$with->amount;
		$sn=$with->serial;
		$recid=$with->send_id;
			$ad=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `dealer_balance` WHERE `user_id`='".$accounts."'"));
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
		$mysqli->query("INSERT INTO `dealer_trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$accounts."','".$amount."','".$date."','".$time."','".$day."','".$recid."','2','0','1','1','1')");
		
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$accounts."','".$amount."','".$date."','".$time."','".$day."','".$recid."','2','0','1','1','1')");
		
		$mysqli->query("update `withdraw` set 
		`status`='1' 
		where `serial`='".$sn."' and 
		`send_id`='".$recid."'");
		
		$spot_ref=$recid;
		require('../db/cal_mem.php');
		
	
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