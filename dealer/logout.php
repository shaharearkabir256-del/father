<?php ob_start();
	session_start();
       require '../db/db.php';
	$memberid=$_SESSION['DealerLogId'];
     $mysqli->query("UPDATE `dealer` SET `last_login`='".$day."<br>".$time."<br>".$date."'  WHERE `user_id`='".$memberid."'");	
	session_unset($_SESSION['DealerLogId']);
	session_destroy();
	header("Location: index.php"); 
	exit;
?>
