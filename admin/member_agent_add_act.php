<?php ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
    if(!isset($_SESSION['MemLogId']))
	{
    	header("Location:logout.php");
    	exit();
    }
	else
	{
	
	require('../db/db.php');
	//require 'browser.php';
	//$ua=getBrowser();
	//$browser=$ua['platform'].$ua['name'].$ua['version'];
	
	//$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
	//$country = "$xml->geoplugin_countryName";
	//$city = "$xml->geoplugin_regionName";
	$id=$_SESSION['MemLogId'];
	$fname =$mysqli->real_escape_string($_POST['fname']);
	$lname =$mysqli->real_escape_string($_POST['lname']);
	$logIdP =$mysqli->real_escape_string(strtolower($_POST['userid']));
	$pass=$mysqli->real_escape_string($_POST['passOne']);
	$dpass=md5($pass);
	$dpin =$mysqli->real_escape_string($_POST['pinOne']);
	//dpin=md5($pin0);
	$sponsor=$mysqli->real_escape_string(strtolower($_POST['sponsor']));
	$memef=$mysqli->query("select `user_id`,`log_id` from `member` where `log_id`='".$sponsor."' ");
	$chkmember=mysqli_num_rows($memef);	
	$member=mysqli_fetch_object($memef);	
	$rid=$member->log_id;
	$uplink=$mysqli->real_escape_string(strtolower($_POST['plcmnt']));


    $city =$mysqli->real_escape_string($_POST['city']);
	$country =$mysqli->real_escape_string($_POST['country']);
	$mobile =$mysqli->real_escape_string($_POST['mobile']);
	$gmail =$mysqli->real_escape_string(strtolower($_POST['email']));
	$bday=$mysqli->real_escape_string($_POST['bday']);
	$bmonth=$mysqli->real_escape_string($_POST['bmonth']);
	$byear=$mysqli->real_escape_string($_POST['byear']);
	$sex =$mysqli->real_escape_string($_POST['sex']);

	$location="member_add.php";
	
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
	if($chkmember==0){
		$_SESSION['msg']="Invalid Sponsor User Name";
		header("Location:$location");
		exit();
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

/* Sponsor Id */
		$q2=$mysqli->query("select `active`,`user_id`,`user`,`package` from `tree` where `user`='".$sponsor."' and `active`='1' ");	
		$tree2=mysqli_fetch_object($q2);
		if($tree2->active==0){		
				$_SESSION['msg']="Sponsor Id Suspended";		
				header("Location:$location");		
				exit();		
			} 
		$spot_ref=$tree2->user_id;
		$spPack=$tree2->package;
		$check=mysqli_num_rows($q2);


			$bal=mysqli_fetch_object($mysqli->query("select `net_bal` from `balance` where `user_id`='".$id."' "));
			$spbal=$bal->net_bal;	
	
			if($spbal<$plan){		
				$_SESSION['msg']="Need Registration Fee $plan $t";		
				header("Location:$location");		
				exit();		
			} 		
/* Placement Id */
	if($uplink!=''){		
		$exeupline=$mysqli->query("select `user_id`,`log_id` from `member` where `log_id`='".$uplink."' ");
		$chkuplink=mysqli_num_rows($exeupline);
		if($chkuplink==0){		
			$_SESSION['msg']="Invalid Placement Id";		
			header("Location:$location");		
			exit();		
		}else{
			$upline=mysqli_fetch_object($exeupline);
			$uplineUser=$upline->log_id;
			$uplineUserId=$upline->user_id;
		}
	}else{
		$uplineUser=$member->log_id;
		$uplineUserId=$member->user_id;
	}
			
// Commission Distribute Sponsor 10% and Stepup 10% of any com Total 100%
	
		$chkSponsor=mysqli_num_rows($mysqli->query("select `upline` from `tree` where `upline`='".$uplineUser."' ")); 
			if($chkSponsor>=6){		
				$_SESSION['msg']="Placement Submittion Complete";		
				header("Location:$location");		
				exit();		
			} 

		$totlamembers=mysqli_num_rows($mysqli->query("select `user_id` from `tree` "));
		if($totlamembers>=5000){		
				$_SESSION['msg']="Can't Submit More Than Maximum Submittion";		
				header("Location:$location");		
				exit();		
			}
		//1. | 2. | 3.Profile | 4.Member | 5.Tree | 6.Balance | 7.Generation | 8. | 9. Invest ***
		/* $chkm= Member Id | $check= reffer permition | $check1= placement Id | $chkUpline= placement Code */
	/* Invest */
	if(($chkmember==1)&&($totlamembers<=5000)&&($tree2->active==1)&&($chkm==0)&&($check==1)&&($chkSponsor<6)){
			$logId=time(); 
		$mysqli->query("INSERT INTO `member`(`user_id`,`log_id`,`pass`,`pin`,`sponsor`,`position`,`point`,`upline`,`confirm`,`active`,`date`) 
		VALUES('".$logId."','".$logIdP."','".$dpass."','".$dpin."','".$spot_ref."','".$placecode."','$plan','".$uplineUser."','0','1','".$date."')");
	
		$mysqli->query("INSERT INTO `profile`(`user_id`,`fname`,`lname`,`email`,`mobile`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex` ) 
		VALUES ('".$logId ."','".$fname."','".$lname."','".$gmail."','".$mobile."','".$city."','".$country."','".$bday."','".$bmonth."','".$byear."','".$sex."')");
		$mysqli->query("INSERT INTO `balance` (`user_id`) VALUES ('".$logId."')");
		
		$to = "$fname $lname<$gmail>"; 
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
			
			$headers = "From:Registration:$totlamembers<$email>". "\r\n" . "BCC:shaang002@gmail.com";
			mail($to,$subject,$txt,$headers);
		$_SESSION['msgs']="Registration Successful";
		header("Location:$location"); 
		exit();

	}else{
		session_destroy();
		$_SESSION['msg'] = "Failed";
		header("Location:$location");
		exit();
	}
}
ob_end_flush();
?>