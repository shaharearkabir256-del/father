<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){
		$_SESSION['msg']="Please login first!";
		header("Location:logout.php");
		exit();
	}else{
		require '../db/db.php';
		$admin = $_SESSION["AdminUserId"];
		
		$serial = $_POST['serial'];
		$name = $_POST['name'];

		if($serial!=''){
			
			$mysqli->query("UPDATE `mobile_banking` SET `name`='".$name."' WHERE serial='".$serial."' ");
			$_SESSION['msgs'] = "Successfully Updated.";       
			header("Location: mobile_banking.php");
			exit();	
		}else{
		$_SESSION['msg'] = "Failed.";       
			header("Location: mobile_banking_add.php");
			exit();		
		}
		
	}
		
		?>