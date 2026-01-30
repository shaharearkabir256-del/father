<?php ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}else{
		require '../db/db.php';
		$recid=$_SESSION['AdminUserId'];
		require('../db/cal_ad.php');
		$admin=$_SESSION['AdminUserId']; 
	
		
		$sendid=$_GET['sendId'];
		$sn=$_GET['sn'];
		$location="payments.php";
		$q1=$mysqli->query("SELECT * FROM `withdraw` WHERE `send_id`='".$sendid."' and `serial`='".$sn."' ");
		$check=mysqli_num_rows($q1);
		$with=mysqli_fetch_object($q1);
		$method=$with->method;
		$mobile=$with->mobile;
		$mobile_type=$with->mobile_type;
		$amount=$with->amount;
		$total=$with->amount+$with->tax;
		$sn=$with->serial;
		$recid=$with->send_id;
			$ad=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` WHERE `user_id`='".$admin."'"));
			$valid=1;
			if($with->type==1){
			$netbal=$ad->net_bal;
			}elseif($with->type==3){
			$netbal=$ad->shopping;
			}else{
				
			}
			if($method==5){
			if($mobile==''){ $valid=0;
			$_SESSION['msg'] = "Mobile number is Empty";
			header("Location:$location");
			exit();
			}	
			}
			if($amount==''){  $valid=0;
			$_SESSION['msg'] = "Amount is Empty";
			header("Location:$location");
			exit();
			}
			if($amount<=0){ $valid=0;
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			if($check==0){ $valid=0;
			$_SESSION['msg'] = "Invalid UserId";
			header("Location:$location");
			exit();
			}
		
		$trx_id=$with->trx_id;
		$taxamn=$with->tax;
		if(($valid==1)&&($netbal>=$total)){
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`tax`,`agent_com`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$sendid."','".$amount."','".$taxamn."','".$with->agent_com."','".$date."','".$time."','".$day."','".$admin."','$with->type','$with->method','1','3','1')");
		$mysqli->query("update `withdraw` set `status`='1' where `serial`='".$sn."' and `send_id`='".$recid."' ");
		$getpp=mysqli_num_rows($mysqli->query("select * from `trx` where `date`='".$date."' and `send_id`='$recid' and `method`='5' "));
		if($getpp==1){
		$res=mysqli_fetch_object($mysqli->query("select `get` from `tree` where `user_id`='$recid' "));
		$get=($res->get+$getpp); $mysqli->query("update `tree` set `get`='$get' where `user_id`='$recid' ");
		}
		$spot_ref=$recid;
		require('../db/cal_mem.php'); // $net
		// Sender SMS
		$receiver_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$recid."'"));	
		$receiver=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$recid."'"));
		if($receiver_member_profile->fname!=''){
			$receiver_name="$receiver_member_profile->fname $receiver_member_profile->lname";
			}else{
			$receiver_name="$receiver->log_id";
			}
			$to ="$receiver_name<$receiver_member_profile->email>"; 
			$subject="$receiver_name";
			$txt="
Balance Withdraw 
TrxID:$trx_id, 
To:$receiver->log_id, 
Amount:-$amount, 
Fee:$taxamn, 
New Balance:$net";
			$headers = "From:Balance Withdraw<$receiver_member_profile->email>". "\r\n" . "Cc:$email";
			mail($to,$subject,$txt,$headers);
$mobile=$receiver_member_profile->mobile;
$sms=$txt;			
require('../db/api_sms.php');
	
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