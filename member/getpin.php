<?php
    session_start(); 
    if((!isset($_SESSION['MemLogId']))||(!isset($_SESSION['pin']))){
    	header("Location:logout.php");
    	exit();
		
	}else{
		
	require '../db/db.php';
	$memberid=$_SESSION["MemLogId"];
	$loc=$_GET["loc"];
	
	if($loc==1){
		$location="withdraw.php";
		$pageName="Withdrawl";		
	}	
	if($loc==2){	
		$location="transfer_bal.php";
		$pageName="Transfer";		
	}
	if($loc==3){	
		$location="pakage.php";
		$pageName="Deposit";
	}	
	if($loc==4){	
		$location="active.php";
		$pageName="Aggremet";
	}	
	if($loc==5){
		$location="profile_edit.php";
		$pageName="Profile";		
	}
	if($loc==6){
		$location="add_fund.php";
		$pageName="Add Fund";		
	}
	if($loc==7){
		$location="bal_refund_deposit.php";
		$pageName="Refund Deposit";		
	}	
	if($loc==8){
		$location="bal_cancel_agreement.php";
		$pageName="Cancel Agreement";		
	}
	
	$profile=mysqli_fetch_object($mysqli->query("select * from profile where user_id='".$memberid."' "));					 
    $contact=$profile->mobile;
	

	$password=time();
	$pincode=substr($password, 5, 15);	
	$part2="Welcome to $www, Your Requested Pin for $pageName is :";
	$text="$part2$pincode";	
	
?>

<?php

	$mysqli->query("DELETE FROM `sms_out` WHERE `user_id`='".$memberid."'");

?>

<?php
	
	$mysqli->query("INSERT INTO `sms_out`(`user_id`, `mobile`, `pincode`, `sms`, `date`) VALUES ('$memberid','$contact','$pincode','".$text."','$date')");
	
	
	$email=strtolower($profile->email);
	require_once('../db/mail_getpin.php');
/* 	$subject = "$pageName verification code request";
		$message = "
			Welcome to $title  
			
			Your Requested verification Code for $pageName
			is $pincode
			
			Best Regards,
			$title 
		";
		
		$from =$support;
		$headers = "From:" . $from;
		mail($email,$subject,$message,$headers); */	

	if($memberid==10000){
	$_SESSION['msgs']="Verification code is:$pincode"; 
	}else{
	$_SESSION['msgs']="Verification code sent to:";	
	$_SESSION['email']="$email"; 
	}	
	header("Location: $location");
	exit;
	}
?>	