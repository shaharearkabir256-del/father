<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){
		$_SESSION['msg']="Please login first!";
		header("Location:logout.php");
		exit(); 
	}else{
		require '../db/db.php';
		$admin = $_SESSION["AdminUserId"];

		$name = $_POST['name'];
		
	
		
		//SELECT `serial`, `user_id`, `title`, `img`, `msg`, `mdate`, `chk` FROM `notice` WHERE 1
		if($name!=''){
			$mysqli->query("INSERT INTO `mobile_banking`(`name`,`chk`) VALUES('".$name."','1')");
			
		
			$_SESSION['msg'] = "Your Notice Successfully Submitted.";       
			header("Location: mobile_banking.php");
			exit();	
		}
		else{
			$_SESSION['msg'] = "Failed"; 
			header("Location: mobile_banking_add.php");
			exit();	
		}

	}
?>