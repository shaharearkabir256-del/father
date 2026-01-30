<?php ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location: ../admin/index.php?msg=$msg");
	exit();
	}
	else{
       require('../db/db.php');
		$memberid = $_SESSION["AdminUserId"];
		$mysqli->query("UPDATE `admin` SET `logout`='$day$time$date',`active`='0'  WHERE `user_id`='".$memberid."'");	
	session_unset($_SESSION['AdminUserId']);
	session_destroy();
	
	header("Location: index.php");
	exit();
	}
?>
