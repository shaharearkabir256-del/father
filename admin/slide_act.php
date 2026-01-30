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
		
		$toptitle = $_POST['toptitle'];
		$title = $_POST['title'];
		$title2 = $_POST['title2'];
		$info = $_POST['info'];
		$chk = $_POST['chk'];
		$images1 =  $_FILES['img1']["name"];
		
 //SELECT `serial`, `info`, `image`, `text_color`, `slink`, `background`, `date`, `left`, `top`, `right`, `toptitle`, `title`, `title2`, `offer`, `type`, `chk` FROM `slide` WHERE 1
		if($images1!=''){
			$mysqli->query("INSERT INTO `slide`(`image`,`toptitle`,`title`,`title2`,`info`,`chk`) VALUES('".$images1."','".$toptitle."','".$title."','".$title2."','".$info."','$chk')");
			$temp_name1 = $_FILES['img1']["tmp_name"];
			move_uploaded_file($temp_name1,"../slide/$images1");
			$_SESSION['msg'] = "Your Slide successfully Submitted.";       
			header("Location: slide.php");
			exit();	
		}
		else{
			$_SESSION['msg'] = "Failed"; 
			header("Location: slide_add.php");
			exit();	
		}

	}
?>