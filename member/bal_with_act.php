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
		$acc=$mysqli->real_escape_string($_POST['acc']);
		$userid=$mysqli->real_escape_string(strtolower($_POST['userid']));
		$methodtitle=$mysqli->real_escape_string($_POST['method']);
		$method=$mysqli->real_escape_string($_POST['pm']);
		$acc_no=$mysqli->real_escape_string($_POST['account_no']);
		$bank=$mysqli->real_escape_string($_POST['bank']);
		$branch=$mysqli->real_escape_string($_POST['branch']);
		$account=$mysqli->real_escape_string($_POST['account']);
		$contact=$mysqli->real_escape_string($_POST['contact']);
		$mobile=$mysqli->real_escape_string($_POST['mobile']);
		$contact_type=$mysqli->real_escape_string($_POST['contact_Type']);
		$wallet=$mysqli->real_escape_string($_POST['wallet']);
		
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		$pagelocation=$mysqli->real_escape_string($_POST['location']);
		$location="$pagelocation?page=Withdraw Balance&&Payment_Mathod=$methodtitle";

		$member=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$memId."'"));
		$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` WHERE `user_id`='".$memId."'"));
		$pinchk=$member->pin;
		if($wallet=="cash"){
		$net=$bal->net_bal;
		$type=1; // Cash
		$taxamn=$amount*$setting->mem_wit_tax/100;
		}
		if($wallet=="shop"){
		$net=$bal->shopping;
		$type=3; // Shopping
		$taxamn=$amount*5/100;
		}
		
			if($method==''){
			$_SESSION['msg'] = "Select Payment Method ";
			header("Location:$location");
			exit();
			}
			if($userid==''){
			$_SESSION['msg'] = "Please Enter User Name ";
			header("Location:$location");
			exit();
			}
			if($amount==''){
			$_SESSION['msg'] = "Please Enter Amount ";
			header("Location:$location");
			exit();
			}
			if($method==1){ $wit_lim=20;}
			elseif($method==4){ 
			$mobile=$contact;
			$wit_lim=100;}
			elseif($method==5){ $wit_lim=20;}
			else{ $wit_lim=50;}
				
			if($amount<$wit_lim){
			$_SESSION['msg'] = "Withdraw Amount Minimum $wit_lim $t";
			header("Location:$location");
			exit();
			}
			if($amount<0){
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			if($net<0){
			$_SESSION['msg'] = "Invalid Cash Wallet ";
			header("Location:$location");
			exit();
			}
			
			
			
			$agent_com=$amount*$setting->mem_wit_agent_com/100;
			$totalamnt=$taxamn+$amount;
			if($totalamnt>$net){
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
			
 			$q1=$mysqli->query("SELECT `user_id` FROM `admin` where `user`='".$userid."' ");
 			$q2=$mysqli->query("SELECT `user_id`,`log_id` FROM `dealer` where `log_id`='".$userid."' and `type`=5 ");
/* 			$chk=mysqli_num_rows($q1);
			if($chk==0){
			$_SESSION['msg'] = "Invalid Adminid";
			header("Location:$location");
			exit();	
			}  */
			$row_admin=mysqli_num_rows($q1);
			$admin=mysqli_fetch_object($q1);
			$row_dealer=mysqli_num_rows($q2);
			$dealer=mysqli_fetch_object($q2);
			if($acc=="admin"){
			$reicever=$admin->user_id;
			if($row_admin==0){
			$_SESSION['msg'] = "Invalid Accounts User Name ";
			header("Location:$location");
			exit();
			}else{ $chk=1; }
			}
			if($acc=="dealer"){
			$reicever=$dealer->user_id;
			$email=$receiver_dealer_info->email;
			if($row_dealer==0){
			$_SESSION['msg'] = "Invalid Agent User Name ";
			header("Location:$location");
			exit();
			}else{ $chk=1; }
			}
		$sender_member_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$memId."'"));
		$receiver_dealer_info=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_info` where `user_id`='".$dealer->user_id."' "));
		if(($chk==1)&&($userid!='')&&($net>0)&&($pinchk==$pin)&&($pin!='')&&($amount!='')&&($totalamnt<=$net)&&($amount>=$wit_lim)){
		$mysqli->query("INSERT INTO `withdraw`(`wallet`,`trx_id`,`send_id`,`amount`,`tax`,`agent_com`,`date`,`time`,`day`,`rec_id`,`type`,`status`,`account`,`method`,`acc_no`, `bank`, `branch`,`bankaccno`, `mobile`, `mobile_type`) 
		VALUES('$wallet','".$trx_id."','".$memId."','".$amount."','".$taxamn."','".$agent_com."','".$date."','".$time."','".$day."','$reicever','$type','0','3','".$method."','".$acc_no."','".$bank."','".$branch."','".$account."','".$mobile."','$contact_type')");
/* 		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`tax`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','".$memId."','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','".$reicever."','1','$method','1','3','1')"); */
		
		// Sender SMS
$to ="<$sender_member_profile->email>"; 
$email=$sender_member_profile->email;
$subject="$sender_member_profile->fname";
$message ="
Withdraw Request 
Form:
MemberID:$member->log_id, 
To:
AgentID:$dealer->log_id, 
Tax:$taxamn, 
Amount:$amount, 
Total:$totalamnt, 
Date:$time $date";

/* $headers = "From: Withdraw Request<$sender_member_profile->email>". "\r\n" . "BCC:$email";
mail($to,$subject,$txt,$headers); */

include'../phpmailer/send_mail.php';

$mobile=$receiver_dealer_info->mobile;
$sms=$message;			
require('../db/api_sms.php');

$mobile=$mobile;
$sms=$message;			
require('../db/api_sms.php');
		$_SESSION['msgs']= "Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>