<?php ob_start();
	session_start();
	if($_SESSION['MemLogId'] == '')
	{
	$_SESSION['msg']="Please login first";
	header("Location:logout.php");
	exit();}
	else
	{
	require '../db/db.php';
	require '../db/function.php';
	$memId=$_SESSION['MemLogId']; 
		$trxId=$mysqli->real_escape_string(strtolower($_POST['userid']));
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		$location="bal_trx.php";
		
		$q1=$mysqli->query("SELECT * FROM `member` WHERE `log_id`='".$trxId."' ");
		$check=mysqli_num_rows($q1);
		$acts=mysqli_fetch_object($q1);
		$recid=$acts->user_id; 
		$sender=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$memId."'"));
		$tre=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` WHERE `user_id`='".$memId."'"));
		$valid=1;
		if($tre->expdate<1){ $valid=0;
			$_SESSION['msg'] = "Your ID is Expired ";
			header("Location:$location");
			exit();
		}
		$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` WHERE `user_id`='".$memId."'"));
		$pinchk=$sender->pin;
		$net=$bal->net_bal;
		if($bal->active==0){ $valid=0;
		$_SESSION['msg'] = "You are Suspended To Transaction ";
		header("Location:$location");
		exit();
		}else{
			if($trxId==''){ $valid=0;
			$_SESSION['msg'] = "Please Enter User id ";
			header("Location:$location");
			exit();
			}
			if($amount==''){ $valid=0;
			$_SESSION['msg'] = "Please Enter Amount ";
			header("Location:$location");
			exit();
			}
			if($amount<1){ $valid=0;
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			if($net<1){ $valid=0;
			$_SESSION['msg'] = "Invalid Cash Wallet ";
			header("Location:$location");
			exit();
			}
			if($amount<$transactionamount){ $valid=0;
			$_SESSION['msg'] = "Transaction Amount Minimum $transactionamount $t ";
			header("Location:$location");
			exit();
			}
			$taxamn=$setting->mem_trx_tax;
			$totalamount=$amount+$taxamn;
			if($totalamount>$net){ $valid=0;
			$_SESSION['msg'] = "Insufficient Balance";
			header("Location:$location");
			exit();
			}
	
			if($pin==''){ $valid=0;
			$_SESSION['msg'] = "Please Enter pin Number";
			header("Location:$location");
			exit();
			}
			if($pinchk!=$pin){ $valid=0;
			$_SESSION['msg'] = "Wrong pin Number ";
			header("Location:$location");
			exit();
			}
			if($check==''){ $valid=0;
			$_SESSION['msg'] = "Invalid UserId";
			header("Location:$location");
			exit();
			}
			
			if($memId==$recid){ $valid=0;
				$_SESSION['msg'] = "You can not Transaction your own id";
				header("Location:$location");
				exit();
			}
		
			
	
		//$balup=$net-$amount;
			//$taxamn=$amount*12.50/100;
		$sender_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$memId."'"));	
		$receiver_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$recid."'"));	
		$receiver=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$recid."'"));
		
		if(($net>0)&&($valid==1)){
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`tax`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$memId."','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','".$recid."','0','0','1','3','1')");
				
			if($sender_member_profile->fname!=''){
			$sender_name="$sender_member_profile->fname $sender_member_profile->lname";
			}else{
			$sender_name="$sender->log_id";
			}
			if($sender_member_profile->fname!=''){
			$receiver_name="$receiver_member_profile->fname $receiver_member_profile->lname";
			}else{
			$receiver_name="$receiver->log_id";
			}
		$spot_ref=$memId;
		require('../db/cal_mem.php');
		
		
/* // Sender SMS
$to ="$receiver_name<$sender_member_profile->email>"; 
$subject="$receiver_name";
$txt="
Balance Transaction 
TrxID:$trx_id, 
To:$receiver->log_id, 
Amount:-$amount, 
Fee:$taxamn, 
New Balance:$net";
$headers = "From:Balance Transaction<$sender_member_profile->email>". "\r\n" . "Cc:$email";
mail($to,$subject,$txt,$headers);

$mobile=$sender_member_profile->mobile;
$sms=$txt;			
require('../db/api_sms.php');
		$spot_ref=$recid;
		require('../db/cal_mem.php');
		
// Receiver SMS
$to ="$sender_name<$receiver_member_profile->email>"; 
$subject="$sender_name";
$txt="
Balance Received TrxID:$trx_id, 
From:$sender->log_id, 
Fee:0.00, 
Amount:+$amount, 
New Balance:$net";
$headers = "From:Balance Received<$receiver_member_profile->email>". "\r\n" . "Cc:$email";
mail($to,$subject,$txt,$headers);
			
$mobile=$receiver_member_profile->mobile;
$sms=$txt;			
require('../db/api_sms.php');
		$_SESSION['msgs']= "Transaction Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Transaction Failed";
		header("Location:$location");
		exit();		
		}
		
		}
	
	} */
	
	
	// Sender SMS
$to ="$receiver_name<$sender_member_profile->email>";
$email=$sender_member_profile->email; 
$subject="$receiver_name";
$message="
Balance Transaction 
TrxID:$trx_id, 
To:$receiver->log_id, 
Amount:-$amount, 
Fee:$taxamn, 
New Balance:$net";

include'../phpmailer/send_mail.php'; 

$mobile=$sender_member_profile->mobile;
$sms=$message;			
require('../db/api_sms.php');
		$spot_ref=$recid;
		require('../db/cal_mem.php');
		
// Receiver SMS
$to ="$sender_name<$receiver_member_profile->email>"; 
$email=$receiver_member_profile->email;
$subject="$sender_name";
$message="
Balance Received TrxID:$trx_id, 
From:$sender->log_id, 
Fee:0.00, 
Amount:+$amount, 
New Balance:$net";
/* $headers = "From:Balance Received<$receiver_member_profile->email>". "\r\n" . "Cc:$email";
mail($to,$subject,$txt,$headers); */

include'../phpmailer/send_mail.php'; 
			
$mobile=$receiver_member_profile->mobile;
$sms=$message;			
require('../db/api_sms.php');
		$_SESSION['msgs']= "Transaction Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Transaction Failed";
		header("Location:$location");
		exit();		
		}
		
		}
	
	}
	
?>