<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
	//require_once 'function.php';
		$admin=$_SESSION["AdminUserId"]; 
	
		
		$dname=$mysqli->real_escape_string($_POST['dname']);
		$mobile=$mysqli->real_escape_string($_POST['mobile']);
		$mbank=$mysqli->real_escape_string($_POST['mbank']);
		$pmaccount=$mysqli->real_escape_string($_POST['pmaccount']);
		$address=$mysqli->real_escape_string($_POST['address']);
		$nid=$mysqli->real_escape_string($_POST['nid']);
		$sponsor=$mysqli->real_escape_string(strtolower($_POST['sponsor']));
		$type=$mysqli->real_escape_string($_POST['type']);
		$zone=$mysqli->real_escape_string($_POST['zone']);
		$upozela=$mysqli->real_escape_string($_POST['upozela']);
		$union=$mysqli->real_escape_string($_POST['union']);
		$ward=$mysqli->real_escape_string($_POST['ward']);
		$agent=$mysqli->real_escape_string($_POST['agent']);		
		$user=$mysqli->real_escape_string(strtolower($_POST['mUserid']));		
		$dpass=$mysqli->real_escape_string($_POST['mPass']);
		$pass=md5($dpass);		
		$epass=$mysqli->real_escape_string($_POST['mCpass']);
		$cpass=md5($epass);
		$pin=$mysqli->real_escape_string($_POST['mPin']);		
		$mail=$mysqli->real_escape_string(strtolower($_POST['mMail']));
		
		$location="dealer_add.php";
		
		$check=mysqli_num_rows($mysqli->query("SELECT * FROM `dealer` WHERE `log_id`='".$user."'"));
		$check2=mysqli_num_rows($mysqli->query("SELECT * FROM `tree` WHERE `user`='".$sponsor."'"));
		$tree=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` WHERE `user`='".$sponsor."'"));
		$referId=$tree->user_id;
		
		
			
			if($sponsor==''){
			$_SESSION['msg'] = "Please Enter Dealer Refer id ";
			header("Location:$location");
			exit();
			}
			if($type==''){
			$_SESSION['msg'] = "Please Enter Dealer Type ";
			header("Location:$location");
			exit();
			}
			if($type==1){
			$zonechk=mysqli_num_rows($mysqli->query("SELECT * FROM `dealer` WHERE `zone_id`='".$zone."' and `upozela_id`='0' and `union_id`='0' and `ward_id`='0'"));
			if($zonechk==1){
			$_SESSION['msg'] = "Already Zonal Dealer Taken, Pleas Select Another Zone Name ";
			header("Location:$location");
			exit();
			}
			}elseif($type==2){
			$zonechk=mysqli_num_rows($mysqli->query("SELECT * FROM `dealer` WHERE `zone_id`='".$zone."' and `upozela_id`=''".$upozela."' and `union_id`='0' and `ward_id`='0'"));
			if($zonechk==1){
			$_SESSION['msg'] = "Already District Dealer Taken, Pleas Select Another District Name ";
			header("Location:$location");
			exit();
			}
			}elseif($type==3){
			$zonechk=mysqli_num_rows($mysqli->query("SELECT * FROM `dealer` WHERE `zone_id`='".$zone."' and `upozela_id`=''".$upozela."' and `union_id`='".$union."' and `ward_id`='0'"));
			if($zonechk==1){
			$_SESSION['msg'] = "Already Upozela Dealer Taken, Pleas Select Another Upozela Name ";
			header("Location:$location");
			exit();
			}
			}elseif($type==4){
			$zonechk=mysqli_num_rows($mysqli->query("SELECT * FROM `dealer` WHERE `zone_id`='".$zone."' and `upozela_id`=''".$upozela."' and `union_id`='".$union."' and `ward_id`='".$ward."'"));
			if($zonechk==1){
			$_SESSION['msg'] = "Already Ward/Union Dealer Taken, Pleas Select Another Ward/Union Name ";
			header("Location:$location");
			exit();
			}
			}else{}
			
			
			if($zone==''){
			$_SESSION['msg'] = "Please Enter Dealer Zone Name ";
			header("Location:$location");
			exit();
			}
			
			if($user==''){
			$_SESSION['msg'] = "Please Enter User id ";
			header("Location:$location");
			exit();
			}
			if($pass==''){
			$_SESSION['msg'] = "Please Enter Password ";
			header("Location:$location");
			exit();
			}
			if($cpass==''){
			$_SESSION['msg'] = "Please Enter Confirm Password ";
			header("Location:$location");
			exit();
			}
			if($pin==''){
			$_SESSION['msg'] = "Please Enter Confirm Password ";
			header("Location:$location");
			}
			if($mail==''){
			$_SESSION['msg'] = "Please Enter Confirm Password ";
			header("Location:$location");
			exit();
			}
			if($check==1){
			$_SESSION['msg'] = "This User id Already Taken, Pleas Choose Another User id";
			header("Location:$location");
			exit();
			}
			if($check2==0){
			$_SESSION['msg'] = "Invalid Referral id"; 
			header("Location:$location");
			exit();
			}
			if($pass!=$cpass){
				$_SESSION['msg'] = "Please Enter Password both are the same";
				header("Location:$location");
				exit();
			}
		
		if(($check==0)&&($check2==1)&&($pass=$cpass)&&($zone!='')&&($user!='')&&($pass!='')&&($cpass!='')&&($pin!='')&&($mail!='')){			
		$rtt=mysqli_num_rows($mysqli->query("SELECT * FROM `dealer`"));			
		$userId=time();
		$mysqli->query("INSERT INTO `dealer`( `name`,`sponsor`,`refer`,`type`, `zone_id`, `upozela_id`, `union_id`, `ward_id`,`agent_id`,`user_id`,`log_id`,`pass`,`password`,`pin`,`date`,`active`) 
		VALUES ('".$dname."','".$referId."','".$sponsor."','".$type."','".$zone."','".$upozela."','".$union."','".$ward."','".$agent."','".$userId."','".$user."','".$cpass."','".$epass."','".$pin."','".$date."','1')");
		$mysqli->query("INSERT INTO `dealer_info`(`type`,`user_id`,`fname`,`mobile`,`mbank`,`pmaccount`,`address`,`nid`,`email`,`date`) VALUES ('".$type."','".$userId."','".$dname."','".$mobile."','".$mbank."','".$pmaccount."','".$address."','".$nid."','".$mail."','".$date."')");
		$mysqli->query("INSERT INTO `dealer_balance`(`user_id`)values('".$userId."')");
		
$email=$$mail;		
$subject= $title; //"Signup Confirmation Bird's Eye Helicopter & Air Service";					
$message="
Your Login Information
UserID:$user
Password:$dpass
Pin:$pin

Registration Date:$time $date

Login Member Panel (https://$url/dealer)
";
include'../phpmailer/send_mail.php'; 	



		//$mobile="88$mobile";
		if($type==6){
			$sms="DIBOSAH: মার্চেন্ট   ডিলার  হিসেবে স্বাগতম। UserID:$user, Password:$dpass, Pin:$pin, https://$url/dealer";			
			require('../db/api_sms.php');
		}elseif($type==5){
			$sms="DIBOSAH: এজেন্ট  ডিলার হিসেবে স্বাগতম। UserID:$user, Password:$dpass, Pin:$pin, https://$url/dealer";			
			require('../db/api_sms.php');
		}elseif($type==4){
			$sms="DIBOSAH: ওয়ার্ড/ ইউনিয়ন  ডিলার হিসেবে স্বাগতম। UserID:$user, Password:$dpass, Pin:$pin, https://$url/dealer";			
			require('../db/api_sms.php');
		}elseif($type==3){
			$sms="DIBOSAH: উপজেলা/থানা ডিলার   হিসেবে স্বাগতম। UserID:$user, Password:$dpass, Pin:$pin, https://$url/dealer";			
			require('../db/api_sms.php');
		}elseif($type==2){
			$sms="DIBOSAH: জেলা   ডিলার  হিসেবে স্বাগতম। UserID:$user, Password:$dpass, Pin:$pin, https://$url/dealer";			
			require('../db/api_sms.php');
		}elseif($type==1){
			$sms="DIBOSAH: বিভাগীয়  ডিলার  হিসেবে স্বাগতম। UserID:$user, Password:$dpass, Pin:$pin, https://$url/dealer";			
			require('../db/api_sms.php');
		}else{
			$type=0;
		}
		
		if($type==0){
			$_SESSION['msg'] = "Please Enter Dealer Type ";
			header("Location:$location");
			exit();
		}
		
		
		$_SESSION['msgs']= "New Dealer Added Successful";
		header("Location:dealer.php");
		exit();
		}
		
/* SELECT `serial`, `user_id`, `log_id`, `pass`, `password`, `pin`, `name`, `type`, `zone_id`, `upozela_id`, `union_id`, `ward_id`, `mobile`, `active`, `date`, `sponsor`, `refer`, `team`, `royalty`, `dsd`, `sales`, `invest`, `direct`, `weekly`, `monthly`, `rank`, `admin_in`, `admin_out`, `member_in`, `member_out`, `net_bal`, `last_login` FROM `dealer` WHERE 1 */
	
	}
	
?>