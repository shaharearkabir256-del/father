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
	
		
	
		$acc=$mysqli->real_escape_string(strtolower($_POST['acc']));
		$trxId=$mysqli->real_escape_string(strtolower($_POST['userid']));
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		$location="bal_shopping_trx.php?page=Transfer%20Shopping%20Balance";
		
		$sender=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$memId."'"));
		$bal=mysqli_fetch_object($mysqli->query("SELECT `shopping` FROM `balance` WHERE `user_id`='".$memId."'"));
		$pinchk=$sender->pin;
		$net=$bal->shopping;
		
		if($acc==''){
			$_SESSION['msg'] = "Please Select One ";
			header("Location:$location");
			exit();
			}
			
			if($trxId==''){
			$_SESSION['msg'] = "Please Enter User id ";
			header("Location:$location");
			exit();
			}
			if($amount==''){
			$_SESSION['msg'] = "Please Enter Amount ";
			header("Location:$location");
			exit();
			}
			if($amount<0){
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			


			if($sender->log_id==$trxId){ //Shop to Cash
			$taxamn=$amount*$setting->mem_trx_shop_tax/100;
			$installmentwallet=$setting->mem_trx_shop_lim;
			}
			if($amount<$installmentwallet){
			$_SESSION['msg'] = "Transaction Amount Minimum  $installmentwallet point ";
			header("Location:$location");
			exit();
			}

			$totalamount=$amount+$taxamn;
			if($totalamount>$net){
			$_SESSION['msg'] = "Insufficient Balance";
			header("Location:$location");
			exit();
			}
	
			if($pin==''){
			$_SESSION['msg'] = "Please Enter pin Number";
			header("Location:$location");
			exit();
			}
			if($pinchk!=$pin){
			$_SESSION['msg'] = "Wrong pin Number ";
			header("Location:$location");
			exit();
			}
			$sender_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$memId."'"));	
	if($acc=="dealer"){	
		$q3=$mysqli->query("SELECT * FROM `dealer` WHERE `log_id`='".$trxId."' ");
		$chk_dealer=mysqli_num_rows($q3);
		$acts_dealer=mysqli_fetch_object($q3);
		$receiver=$acts_dealer->user_id;
		
		if($chk_dealer==1){ //mem to Dealer/Merchant For Shopping
		$taxamn=$amount*$setting->mem_trx_shop_lim/100;
		$installmentwallet=$setting->mem_trx_shop_lim;
		}

		$receiver_dealer_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_info` WHERE `user_id`='".$receiver."'"));
		if($chk_dealer==1){	
			if(($_SESSION['last_trx_time3']!=time())&&($amount>=$installmentwallet)&&($pinchk==$pin)&&($memId!=$receiver)&&($trxId!='')&&($pin!='')&&($amount!='')&&($totalamount<=$net)){
			$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`tax`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
			VALUES('".$trx_id."','".$memId."','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','".$receiver."','3','0','1','3','1')");
			
			$to ="<$sender_member_profile->email>"; 
			$subject="$sender_member_profile->fname";
			$txt = "
			Transfer
			
			Form: $sender_member_profile->fname
			Member Id: $sender->log_id
			
			To: $receiver_dealer_profile->fname
			Agent Id: $receiver->log_id
			Tax: $taxamn
			Amount: $amount
			Total: $totalamount



			Request Date: $day $time $date
			";
			$headers = "From: Shopping Balance Transaction<$email>". "\r\n" . "BCC:$receiver_dealer_profile->email";
			mail($to,$subject,$txt,$headers);
$mobile=$receiver_dealer_profile->mobile;
$sms=$txt;			
require('../db/api_sms.php');
			$spot_ref=$acts->user_id; 
			include('../db/cal_mem.php');
			$_SESSION['last_trx_time3']=time();
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
if($acc=="admin"){
	
		$q2=$mysqli->query("SELECT * FROM `admin` WHERE `user`='".$trxId."' ");
		$chk_admin=mysqli_num_rows($q2);
		$actsadmin=mysqli_fetch_object($q2);
		$receiver=$actsadmin->user_id;
		
		if($chk_admin==1){ //mem to ad
		$taxamn=5;
		$installmentwallet=5;
		$totalamount=$taxamn+$amount;
		}

		if($chk_admin==1){	
		if(($_SESSION['last_trx_time2']!=time())&&($amount>=$installmentwallet)&&($pinchk==$pin)&&($memId!=$receiver)&&($trxId!='')&&($pin!='')&&($amount!='')&&($totalamount<=$net)){
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`tax`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$memId."','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','".$receiver."','3','0','1','3','1')");
		
			$to ="<$sender_member_profile->email>"; 
			$subject="$sender_member_profile->fname";
			$txt = "
			Transfer
			
			Form: $sender_member_profile->fname
			Member Id: $sender->log_id
			
			To: Admin
			Admin Id: $receiver->user
			Tax: $taxamn
			Amount: $amount
			Total: $totalamount



			Request Date: $day $time $date
			";
			$headers = "From: Shopping Balance Transaction<$email>". "\r\n" . "BCC:$email";
			mail($to,$subject,$txt,$headers);
			
		$_SESSION['last_trx_time2']=time();
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
if($acc=="member"){	

		$q1=$mysqli->query("SELECT * FROM `member` WHERE `log_id`='".$trxId."' ");
		$check_mem=mysqli_num_rows($q1);
		$acts=mysqli_fetch_object($q1);
		$receiver=$acts->user_id;


$receiver_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$receiver."'"));
if($check_mem==1){
	if($memId!=$receiver){
		$taxamn=10;
		$installmentwallet=1;
		
		if(($_SESSION['last_trx_time']!=time())&&($amount>=$installmentwallet)&&($pinchk==$pin)&&($trxId!='admin')&&($trxId!='')&&($pin!='')&&($amount!='')&&($totalamount<=$net)){
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`tax`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$memId."','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','".$receiver."','3','0','1','3','1')");
				
			$to ="<$sender_member_profile->email>"; 
			$subject="$sender_member_profile->fname";
			$txt = "
			Transfer
			
			Form: $sender_member_profile->fname
			Member Id: $sender->log_id
			
			To: $receiver_member_profile->fname
			Agent Id: $receiver->log_id
			Tax: $taxamn
			Amount: $amount
			Total: $totalamount



			Request Date: $day $time $date
			";
			$headers = "From: Shopping Balance Transaction<$email>". "\r\n" . "BCC:$receiver_member_profile->email";
			mail($to,$subject,$txt,$headers);
			
		$spot_ref=$receiver;
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
	}else{
		if(($_SESSION['last_trx_time']!=time())&&($amount>=$installmentwallet)&&($pinchk==$pin)&&($trxId!='admin')&&($trxId!='')&&($pin!='')&&($amount!='')&&($totalamount<=$net)){
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`tax`,`date`,`time`,`day`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$memId."','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','3','0','1','3','1')");
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$amount."','".$date."','".$time."','".$day."','".$receiver."','0','0','1','3','1')");
			
			$to ="<$sender_member_profile->email>"; 
			$subject="$sender_member_profile->fname";
			$txt = "
			Transfer
			
			Form: $sender_member_profile->fname
			Member Id: $sender->log_id
			
			To: $receiver_member_profile->fname
			Agent Id: $trxId
			Tax: $taxamn
			Amount: $amount
			Total: $totalamount



			Request Date: $day $time $date
			";
			$headers = "From: Shopping Balance Transaction<$email>". "\r\n" . "BCC:$receiver_member_profile->email";
			mail($to,$subject,$txt,$headers);
		$spot_ref=$receiver;
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
}
}

	
	}
	
?>