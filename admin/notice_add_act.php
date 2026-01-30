<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){
		$_SESSION['msg']="Please login first!";
		header("Location:logout.php");
		exit(); 
	}else{
		require '../db/db.php';
		$admin = $_SESSION["AdminUserId"];

		$title = $_POST['title'];
		$info = $_POST['info'];
		$chk = $_POST['chk'];
		$images1 = $_FILES['img1']["name"];
		
		//SELECT `serial`, `user_id`, `title`, `img`, `msg`, `mdate`, `chk` FROM `notice` WHERE 1
		if($info!=''){
			$mysqli->query("INSERT INTO `notice`(`img`, `title`, `msg`,`mdate`, `chk`) VALUES('".$images1."','".$title."','".$info."','".$date."','$chk')");
			$temp_name1 = $_FILES['img1']["tmp_name"];
			move_uploaded_file($temp_name1,"../notice/$images1");
			$_SESSION['msg'] = "Your Notice Successfully Submitted.";       
			header("Location: notice.php");
			exit();	
		}
		else{
			$_SESSION['msg'] = "Failed"; 
			header("Location: notice_add.php");
			exit();	
		}

	}
?>