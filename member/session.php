<?php  	 ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true);
	if((!isset($_SESSION['MemLogId']))||(!isset($_SESSION['pin']))){
		$_SESSION['msg']="Please Verify login!";
		header("Location:logout.php");
		exit();
	}else{ 
		require('../db/db.php');
		$spot_ref=$_SESSION['MemLogId'];
		require_once('../db/cal_mem.php');
		require_once('auth.php');
		$id=$_SESSION['MemLogId'];
	}  
	?>