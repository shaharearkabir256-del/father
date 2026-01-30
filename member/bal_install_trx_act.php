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
	$memId=$_SESSION['MemLogId']; 
	
		
	
		$trxId=$mysqli->real_escape_string($_POST['userid']);
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		$location="bal_install_trx.php?page=Transfer%20Installment%20Balance";
		
		$q1=$mysqli->query("SELECT * FROM `member` WHERE `log_id`='".$trxId."' ");
		$check=mysqli_num_rows($q1);
		$receiver=mysqli_fetch_object($q1);
		$recid=$receiver->user_id;
		
		$sender=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$memId."'"));
		$tre=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` WHERE `user_id`='".$memId."'"));
		$valid=1;
		if($tre->expdate<1){
			$valid=0;
			$_SESSION['msg'] = "Your ID is Expired ";
			header("Location:$location");
			exit();
		}
		$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` WHERE `user_id`='".$memId."'"));
		$pinchk=$sender->pin;
		$net=$bal->shopping;
		
		
			if($trxId==''){
				$valid=0;
			$_SESSION['msg'] = "Please Enter User id ";
			header("Location:$location");
			exit();
			}
			if($amount==''){
				$valid=0;
			$_SESSION['msg'] = "Please Enter Amount ";
			header("Location:$location");
			exit();
			}
			if($amount<0){
				$valid=0;
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			if($amount<$installmentwallet){
				$valid=0;
			$_SESSION['msg'] = "Transaction Amount Minimum $t $installmentwallet ";
			header("Location:$location");
			exit();
			}
			if($amount>$net){
				$valid=0;
			$_SESSION['msg'] = "Insufficient Balance";
			header("Location:$location");
			exit();
			}
	
			if($pin==''){
				$valid=0;
			$_SESSION['msg'] = "Please Enter pin Number";
			header("Location:$location");
			exit();
			}
			if($pinchk!=$pin){
				$valid=0;
			$_SESSION['msg'] = "Wrong pin Number ";
			header("Location:$location");
			exit();
			}
			if($check==''){
				$valid=0;
			$_SESSION['msg'] = "Invalid UserId";
			header("Location:$location");
			exit();
			}
			
			if($memId==$recid){
				$valid=0;
				$_SESSION['msg'] = "You can not Transaction your own id";
				header("Location:$location");
				exit();
			}
		
			//$balup=$net-$amount;
			//$taxamn=$amount*12.50/100;

			
			
		$sender_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$sender."'"));	
		$receiver_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$receiver."'"));	
		if(($_SESSION['last_trx_time']!=time())&&($valid==1)&&($check==1)){
		$mysqli->query("INSERT INTO `trx`(`send_id`,`amount`,`tax`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$memId."','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','".$recid."','3','0','1','3','1')");
		
			$to ="<$sender_member_profile->email>"; 
			$subject="$sender_member_profile->fname";
			$txt = "
			Transfer
			
			Form: $sender_member_profile->fname
			Member Id: $sender->log_id
			
			To: $receiver_member_profile->fname
			Agent Id: $receiver->log_id
			Amount: $amount




			Request Date: $day $time $date
			";
			$headers = "From: Shopping Balance Transaction<$email>". "\r\n" . "BCC:$receiver_member_profile->email";
			mail($to,$subject,$txt,$headers);
$mobile=$receiver_member_profile->mobile;
$sms=$txt;			
require('../db/api_sms.php');
		$spot_ref=$recid;
		require('../db/cal_mem.php');
		$_SESSION['last_trx_time']=time();
		$_SESSION['msgs']= "Transaction Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Transaction Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>