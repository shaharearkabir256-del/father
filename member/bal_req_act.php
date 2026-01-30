<?php
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
	
		

		$dealerusername=$mysqli->real_escape_string(strtolower($_POST['dealerusername']));
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		$location="bal_req.php?page=Request%20For%20Balance";

		
		$sender=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$memId."'"));
		$sender_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$memId."'"));
		$pinchk=$sender->pin;
		$order=mysqli_fetch_object($mysqli->query("SELECT * FROM `order` WHERE `user_id`='".$memId."'"));

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
			if($amount==0){
			$_SESSION['msg'] = "Invalid Amount Type ";
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
		$query=$mysqli->query("SELECT * FROM `dealer` where `log_id`='".$dealerusername."' and `type`='5'");
		$receiver=mysqli_fetch_object($query);
		$chk_del=mysqli_num_rows($query);
		if($chk_del==0){
			$_SESSION['msg'] = "Invalid Agent ID ";
			header("Location:$location");
			exit();
			}else{
			$receiver_dealer_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_info` WHERE `user_id`='".$receiver->user_id."'"));			
			}
		
		if(($chk_del==1)&&($pinchk==$pin)&&($pin!='')&&($amount!='')){
		$mysqli->query("INSERT INTO `withdraw`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`status`,`account`) 
		VALUES('".$trx_id."','".$memId."','".$amount."','".$date."','".$time."','".$day."','$receiver->user_id','0','0','3')");
		
$to ="<$sender_member_profile->email>"; 
$email=$sender_member_profile->email;
$subject="$sender_member_profile->fname";
$message = "
Transfer

Form: $sender_member_profile->fname
Member Id: $sender->log_id

To: $receiver_dealer_profile->fname
Agent Id: $receiver->log_id
Amount: $amount




Request Date: $day $time $date
";

/* $headers = "From: Shopping Balance Transaction<$email>". "\r\n" . "BCC:$receiver_dealer_profile->email";
mail($to,$subject,$txt,$headers); */

include'../phpmailer/send_mail.php';
			
$mobile=$receiver_dealer_profile->mobile;
$sms=$message;			
require('../db/api_sms.php');
		$_SESSION['msgs']= "Request Send";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Request Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>