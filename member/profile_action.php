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
	$memberid=$_SESSION['MemLogId'];  


	$nid=$mysqli->real_escape_string($_POST['nid']);
	$mobile=$mysqli->real_escape_string($_POST['mobile']);
	$fname=$mysqli->real_escape_string($_POST['fname']);	
	$lname=$mysqli->real_escape_string($_POST['lname']);	
	$email=$mysqli->real_escape_string($_POST['email']);	
	$country=$mysqli->real_escape_string($_POST['country']);	
	$father=$mysqli->real_escape_string($_POST['father']);	
	$mother=$mysqli->real_escape_string($_POST['mother']);	
	//$blood=$mysqli->real_escape_string($_POST['blood']);	
	$address=$mysqli->real_escape_string($_POST['address']);	
	$bday=$mysqli->real_escape_string($_POST['bday']);	
	$bmonth=$mysqli->real_escape_string($_POST['bmonth']);	
	$byear=$mysqli->real_escape_string($_POST['byear']);	
	$postal=$mysqli->real_escape_string($_POST['postal']);	 
	$zip=$mysqli->real_escape_string($_POST['zip']);	 
	
    /*INSERT INTO `profile`(`serial`, `user_id`, `sex`, `fname`, `lname`, `photo`, `cover`, `father`, `mother`, `mobile`, `email`, `city`, `state`, `postal`, `voter`, `country`, `vill`, `upozela`, `union`, `address`, `national`, `mbank`, `perfectmoney`, `pmaccount`, `blood`, `bday`, `bmonth`, `byear`, `bank`, `branch`, `account`, `terms`, `swift`, `rank`, `epin`, `last_login`	*/ 
if(isset($_POST['fnamec'])){
	if($fname!=''){
	$mysqli->query("UPDATE `profile` SET `fname`='".$fname."',`fnamec`=1,profilec=1 WHERE `fnamec`=0 and `user_id`='".$memberid."' ");
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}
	}
if(isset($_POST['lnamec'])){
	if($lname!=''){
	$mysqli->query("UPDATE `profile` SET `lname`='".$lname."',`lnamec`=1,profilec=1 WHERE `lnamec`=0 and `user_id`='".$memberid."' ");
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}
	}
if(isset($_POST['fatherc'])){
	if($father!=''){
	$mysqli->query("UPDATE `profile` SET `father`='".$father."',`fatherc`=1,profilec=1 WHERE `fatherc`=0 and `user_id`='".$memberid."' ");
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}
	}
if(isset($_POST['motherc'])){
	if($mother!=''){
	$mysqli->query("UPDATE `profile` SET `mother`='".$mother."',`motherc`=1,profilec=1 WHERE `motherc`=0 and `user_id`='".$memberid."' ");
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}
	}
if(isset($_POST['addressc'])){
	if($address!=''){
	$mysqli->query("UPDATE `profile` SET `address`='".$address."',`addressc`=1,profilec=1 WHERE `addressc`=0 and `user_id`='".$memberid."' ");
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}
	}
if(isset($_POST['birthc'])){
	if($bday!='' && $bmonth!='' && $byear!=''){
	$mysqli->query("UPDATE `profile` SET `bday`='".$bday."',`bmonth`='".$bmonth."',`byear`='".$byear."',`birthc`=1,profilec=1 WHERE `birthc`=0 and `user_id`='".$memberid."' ");
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}
	}
if(isset($_POST['postalc'])){
	if($postal!=''){
	$mysqli->query("UPDATE `profile` SET `postal`='".$postal."',`postalc`=1,profilec=1 WHERE `postalc`=0 and `user_id`='".$memberid."' ");
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}
	} 
if(isset($_POST['zipc'])){
	if($zip!=''){
	$mysqli->query("UPDATE `profile` SET `zip`='".$zip."',`zipc`=1,profilec=1 WHERE `zipc`=0 and `user_id`='".$memberid."' ");
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}
	} 
 if(!isset($_POST['submit'])){
$_SESSION['msg1']="Profile Update Successful";
	header("Location:profile.php");
	exit();
 }
	
 if(isset($_POST['submit'])){
    if($fname!='' && $lname!='' && $father!='' && $mother!='' && $address!='' && $bday!='' && $bmonth!='' && $byear!='' && $zip!='' && $postal!=''){ 
	$mysqli->query("UPDATE `profile` SET 
	`fname`='".$fname."',`fnamec`=1,
	`lname`='".$lname."',`lnamec`=1,
	`father`='".$father."',`fatherc`=1,
	`mother`='".$mother."',`motherc`=1,
	`address`='".$address."',`addressc`=1,
	`postal`='".$postal."',`postalc`=1,
	`zip`='".$zip."',`zipc`=1,
	`bday`='".$bday."',
	`bmonth`='".$bmonth."',
	`byear`='".$byear."',`birthc`=1,profilec=1
	WHERE `user_id`='".$memberid."' and profilec=0 ");	       
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:profile.php");
	exit();
	}else{	
	$_SESSION['msg']="You have no new update";
	header("Location:profile.php");
	exit();
	}	
}	
}	
?>