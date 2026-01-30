<?php ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
	if(($_SESSION['DealerLogId']=='')||(!isset($_SESSION['DealerLogId']))){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';  
	$memberid=$_SESSION['DealerLogId'];  


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
	
    /*SELECT `serial`, `user_id`, `sex`, `fname`, `lname`, `photo`, `father`, `mother`, `mobile`, `email`, `city`, `state`, 
	`postal`, `voter`, `country`, `vill`, `upozela`, `union`, `post`, `address`, `national`, `mbank`, `perfectmoney`, `pmaccount`, 
	`blood`, `birth`, `bank`, `branch`, `account`, `terms`, `swift`, `rank`, `epin`, `date`, `last_login` FROM `dealer_info` WHERE 1	*/ 
 $prochk=mysqli_num_rows($mysqli->query("SELECT * from `dealer_info` where `user_id`='$memberid' "));
    if($prochk==1){
		if($memberid!=''){   
		$mysqli->query("UPDATE `dealer_info` SET 
		`fname`='".$fname."',
		`lname`='".$lname."',
		`nid`='".$nid."',
		`mobile`='".$mobile."',
		`email`='".$email."',
		`father`='".$father."',
		`mother`='".$mother."',
		`address`='".$address."',
		`postal`='".$postal."',
		`zip`='".$zip."',
		`bday`='".$bday."',
		`bmonth`='".$bmonth."',
		`byear`='".$byear."'
		WHERE `user_id`='".$memberid."' ");	       
			

		$_SESSION['msgs']="Profile Update Successful";
		header("Location:profile.php?pageName=Profile");
		exit();
		}
		else
		{	
		$_SESSION['msg']="Profile Update Failed";
		header("Location:profile.php?pageName=Profile");
		exit();
		}
	}else{
		$mysqli->query("INSERT INTO `dealer_info`(`user_id`)values('$memberid') ");
		$_SESSION['msgs']="Profile Created Successful";
		header("Location:profile.php?pageName=Profile");
		exit();
	}	
}	
?>