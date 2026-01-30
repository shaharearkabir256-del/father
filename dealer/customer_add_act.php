<?php ob_start();
	session_start();
	if($_SESSION['DealerLogId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location:index.php");
		exit();
	}else{
	require '../db/db.php';
	require '../db/cal_del.php';
	//require 'browser.php';
	//$ua=getBrowser();
	//$browser=$ua['platform'].$ua['name'].$ua['version'];
	
	//$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
	//$country = "$xml->geoplugin_countryName";
	//$city = "$xml->geoplugin_regionName";
	$id=$_SESSION['DealerLogId'];
	$fname =$mysqli->real_escape_string($_POST['fname']);
	$lname =$mysqli->real_escape_string($_POST['lname']);
	$logIdP =$mysqli->real_escape_string(strtolower($_POST['userid']));
	$pass=$mysqli->real_escape_string($_POST['passOne']);
	$dpass=md5($pass);
	$dpin =$mysqli->real_escape_string($_POST['pinOne']);
	//dpin=md5($pin0);
    $city =$mysqli->real_escape_string($_POST['city']);
	$country =$mysqli->real_escape_string($_POST['country']);
	$mobile =$mysqli->real_escape_string($_POST['mobile']);
	$gmail =$mysqli->real_escape_string(strtolower($_POST['email']));
	$bday=$mysqli->real_escape_string($_POST['bday']);
	$bmonth=$mysqli->real_escape_string($_POST['bmonth']);
	$byear=$mysqli->real_escape_string($_POST['byear']);
	$sex =$mysqli->real_escape_string($_POST['sex']);

	$location="customer_add.php";
	
/* User Id */
		if($logIdP==''){
		$_SESSION['msg']="Please Enter The User Id";
		header("Location:$location");
		exit();
		}else{
			$chkm=mysqli_num_rows($mysqli->query("select `log_id` from `member` where `log_id`='".$logIdP."' "));	
			if($chkm==1){
				$_SESSION['msg']="This User Name Already Taken. Please Try Another User Name";		
				header("Location:$location");		
				exit();		
			}
			
		}

	
/* Password */
	if($dpass==''){
		$_SESSION['msg']="Please Enter The Password";
		header("Location:$location");
		exit();
	}

/* Pin */
	if($dpin==''){
		$_SESSION['msg']="Please Enter The Pin Code";
		header("Location:$location");
		exit();
	}


// $chkm = Member Id  
//if($chkm==0 && $rec->customercreate>0 && $net>=100){
	if($chkm==0){
		$logId=time(); 
		$mysqli->query("INSERT INTO `member`(`user_id`,`log_id`,`pass`,`pin`,`agent_id`,`cdate`,`date`,`team`) 
									VALUES('".$logId."','".$logIdP."','".$dpass."','".$dpin."','".$id."','".$date."','".$date."','1')"); //team: 1=Customer;0=Member;
	
		$mysqli->query("INSERT INTO `profile`(`user_id`,`fname`,`lname`,`email`,`mobile`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex` ) 
		VALUES ('".$logId ."','".$fname."','".$lname."','".$gmail."','".$mobile."','".$city."','".$country."','".$bday."','".$bmonth."','".$byear."','".$sex."')");

	/* 	$to = "$fname $lname<$gmail>"; 
			$subject=$title;
			$txt = "
			Your Login Information
			  UserId: $logIdP
			Password: $pass
			     Pin: $dpin
			
			Your Affiliate Information
			Your SponsorId: $rid
			Your UplineId: $uplineUser
			 Your Position: $placecode

			Registration Date: $day $time $date
			
			Login Member Panel (https://$url/member)
			";
			
			$headers = "From:Customer Registration<$email>". "\r\n" . "BCC:$gmail";
			mail($to,$subject,$txt,$headers);
$mobile=$mobile; */

$email=$gmail;		
$subject= $title; //"Signup Confirmation Bird's Eye Helicopter & Air Service";					
$message="
Your Login Information
UserId: $logIdP
Password: $pass
Pin: $dpin

Your Affiliate Information
Your SponsorId: $rid
Your UplineId: $uplineUser
Your Position: $placecode

Registration Date: $day $time $date

Login Member Panel (https://$url/member)
";
include'../phpmailer/send_mail.php'; 


		//$sms=$txt;
		$sms="DIBOSAH: কাস্টমার হিসেবে স্বাগতম। UserID:$logIdP Password:$pass Pin:$dpin https://$url/member";	
		
		require('../db/api_sms.php');
		
		$_SESSION['msgs']="Registration Successful";
		header("Location:$location"); 
		exit();

	}else{
		//session_destroy();
		$_SESSION['msg'] = "Failed";
		header("Location:$location");
		exit();
	}
}
ob_end_flush();
?>