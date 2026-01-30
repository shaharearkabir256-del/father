<?php
	session_start();
	error_reporting(0);
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
			
			$mysqli->query("UPDATE `slide` SET `toptitle`='".$toptitle."',`title`='".$title."',`title2`='".$title2."',`info`='".$info."',`chk`='$chk' WHERE serial='".$serial."' ");
			$_SESSION['msgs'] = "Your Slide successfully Updated.";       
			header("Location: slide.php");
			exit();	
		}else{
		$_SESSION['msg'] = "Failed.";       
			header("Location: slide_add.php");
			exit();		
		}
		
	}
		
		?>