<?php
ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';

		$memberuserid=$mysqli->real_escape_string($_POST['userid']);
		$memberuserold=$mysqli->real_escape_string($_POST['olduser']);
		$memberuser=$mysqli->real_escape_string($_POST['user']);
		$fname =$mysqli->real_escape_string($_POST['fname']);
		$lname =$mysqli->real_escape_string($_POST['lname']);
		$logIdP =$mysqli->real_escape_string(strtolower($_POST['userid']));
		$mobile=$mysqli->real_escape_string($_POST['mobile']);
		$email=$mysqli->real_escape_string($_POST['email']);
		$location="member_customer_edit.php?userid=$memberuserid";
		
		if($memberuser==''){
		$_SESSION['msg']="Please Enter Your User Id";
		header("Location:$location");
		exit();
		}
		if($fname==''){
		$_SESSION['msg']="Please Enter Your First Name";
		header("Location:$location");
		exit();
		}
		if($lname==''){
		$_SESSION['msg']="Please Enter Your Last Name";
		header("Location:$location");
		exit();
		}
		if($mobile==''){
		$_SESSION['msg']="Please Enter Your Mobile number";
		header("Location:$location");
		exit();
		}
		if($email==''){
		$_SESSION['msg']="Please Enter Your Email Address";
		header("Location:$location");
		exit();
		}
		
		$chk_mem_user=mysqli_num_rows($mysqli->query("SELECT `user_id` FROM `member` WHERE `log_id`='".$memberuser."'"));

		if($chk_mem_user==0){
			$mysqli->query("update `member` set `log_id`='".$memberuser."' where `user_id`='".$memberuserid."' ");
			$mysqli->query("update `profile` set `fname`='".$fname."',`lname`='".$lname."',`mobile`='".$mobile."',`email`='".$email."' where `user_id`='".$memberuserid."' ");
			$_SESSION['msgs']="User Name ";
			header("Location:$location");
			exit();
		}else{
			$mysqli->query("update `profile` set `fname`='".$fname."',`lname`='".$lname."',`mobile`='".$mobile."',`email`='".$email."' where `user_id`='".$memberuserid."' ");
			
			$_SESSION['msgs']="Updated Successful!";
			header("Location:$location");
			exit();
		}
		
	}
	?>