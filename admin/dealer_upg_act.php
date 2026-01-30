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
	
		
		$user_id=$mysqli->real_escape_string($_POST['user_id']);
		$dname=$mysqli->real_escape_string($_POST['dname']);
		$mobile=$mysqli->real_escape_string($_POST['mobile']);
		$mbank=$mysqli->real_escape_string($_POST['mbank']);
		$pmaccount=$mysqli->real_escape_string($_POST['pmaccount']);
		$address=$mysqli->real_escape_string($_POST['address']);
		$sponsor=$mysqli->real_escape_string($_POST['sponsor']);
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
		
		$location="dealer_add.php?userid=$user_id";
		$userNamChk=mysqli_num_rows($mysqli->query("SELECT * FROM `dealer` WHERE `log_id`='".$user."'"));
		
		$del_sql=$mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$user_id."'");
				$delchk=mysqli_num_rows($del_sql);
		$delinfochk=mysqli_num_rows($mysqli->query("SELECT * FROM `dealer_info` WHERE `user_id`='".$user_id."'"));
		if($delinfochk==0){
		$mysqli->query("INSERT INTO `dealer_info`(`user_id`,`fname`,`mobile`,`address`,`email`,`date`) VALUES ('".$user_id."','".$dname."','".$mobile."','".$address."','".$mail."','".$date."')");			
		}
		if($userNamChk==0){
		$mysqli->query("update `dealer` set `log_id`='".$user."' where `user_id`='".$user_id."' ");	
		}
		if($delchk==1){
		$mysqli->query("update `dealer_info` set 
		`fname`='".$dname."',
		`mobile`='".$mobile."', 
		`mbank`='".$mbank."', 
		`pmaccount`='".$pmaccount."',
		`address`='".$address."',
		`email`='".$mail."' 
		where `user_id`='".$user_id."' ");
		
		$mysqli->query("update `dealer` set 
		`pass`='".$cpass."',		
		`password`='".$epass."',		
		`pin`='".$pin."'		
		where `user_id`='".$user_id."' ");
		$_SESSION['msgs'] = "Upgrade Successful ";
		header("Location:$location");
		exit();
		}else{

		$_SESSION['msg'] = "Failed ";
		header("Location:$location");
		exit();	
		}
		
	}
	
?>