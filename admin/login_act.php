<?php 
	session_start();
	require ("../db/db.php");
	require 'browser.php';
	$ua=getBrowser();
	$browser=$ua['platform'].$ua['name'].$ua['version'];
	
	$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
	$country = "$xml->geoplugin_countryName";
	$city = "$xml->geoplugin_regionName"; 
	
	$user =$mysqli->real_escape_string(strtolower($_POST['userId']));
	$loginpass =$mysqli->real_escape_string($_POST['userPassOne']);
	$pin =$mysqli->real_escape_string($_POST['CSRA']);
	$dpass=md5($loginpass);
	
	$stmt = $mysqli->prepare("SELECT `user`,`pass` FROM `admin` where `user`=? and `pass`=? ");
	$stmt->bind_param('ss', $user, $dpass);
	$result = $stmt->execute();
	$stmt->store_result();
	$count=$stmt->num_rows;	

	if($count==1){	
		$result=$mysqli->query("select `user`,`user_id`,`pass`,`chk` from `admin` where `user`='".$user."' and `pass`='".$dpass."' and `chk`='1'");
		$row=$result->fetch_array();
		$check= mysqli_num_rows($result);
		$result->close();
		
		if($check==1){
			$id=$row['user_id'];
			$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
			VALUES ('$id','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".AdminLoInSuccess."','".$date."','".$time."','".$day."')"); 
 
			
			$_SESSION['AdminUserId'] =$id;
			$_SESSION['pin']=$pin;
			session_write_close();
			$mysqli->query("update `admin` SET `active`=1,`llog`='$date',`ip`='$ip',`browser`='$browser',`city`='$city',`country`='$country' where `user`='$user' ");
/* $customer_profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` where `user_id`='$id' "));
$mobile=$customer_profile->mobile;
$sms="
Admin Login Information

IP: $ip

Date: $datef
";	 */		
require('../db/api_sms.php');
			$_SESSION['msgs']= "Wellcome";
			header("Location: home.php"); 
			exit();
		}else{
			$_SESSION['num_login_fail'] ++;
			$_SESSION['last_login_time'] = time();
			$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
			VALUES ('".$id."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".AdmLogInFailedForUserSuspended."','".$date."','".$time."','".$day."')"); 
			$_SESSION['msg']= "You Are Suspended";
			header("Location:index.php?msg=You Are Suspended"); 
			exit();
		}
	}else{
		$_SESSION['num_login_fail'] ++;
		$_SESSION['last_login_time'] = time();
		$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
		VALUES ('".$id."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".AdmLogInFailedForInvalidUserPass."','".$date."','".$time."','".$day."')"); 
		$_SESSION['msg'] = "Invalid ID or Password";
		header("Location:index.php?msg=Invalid ID or Password"); 
		exit();
	}
	
?>