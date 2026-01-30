<?php ob_start();
	session_start();
    require('../db/db.php');
	$memberid=$_SESSION['MemLogId'];
    $mysqli->query("UPDATE profile SET `last_login`='".$date."'  WHERE `user_id`='".$memberid."'");	
	$mysqli->close();
	//session_destroy(); // will delete ALL data associated with that user.
	session_unset($_SESSION['MemLogId']);
	session_destroy();
	session_write_close();
	//setcookie(session_name(),'',0,'/');
    //session_regenerate_id(true);
	header("Location:../checkout.php");
	exit();
?>