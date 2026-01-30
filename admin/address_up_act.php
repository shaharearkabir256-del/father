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
		$toptitle = $_POST['toptitle'];
		$title = $_POST['title'];
		$title2 = $_POST['title2'];
		$info = $_POST['info'];
		$chk = $_POST['chk'];
		
		if($serial!=''){
			
			$mysqli->query("UPDATE `address` SET `title`='".$title."',`msg`='".$info."',`chk`='$chk' WHERE serial='".$serial."' ");
			$_SESSION['msgs'] = "Your address Successfully Updated.";       
			header("Location: address.php");
			exit();	
		}else{
		$_SESSION['msg'] = "Failed.";       
			header("Location: address_add.php");
			exit();		
		}
		
	}
		
		?>