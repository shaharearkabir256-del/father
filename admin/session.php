<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$recid=$_SESSION['AdminUserId']; 
		require('../db/cal_ad.php');
		$id=$_SESSION['AdminUserId'];
		$admin=$_SESSION['AdminUserId'];
		$adm=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` where `user_id`='$id'"));
		$cog=mysqli_fetch_object($mysqli->query("select * from cog where `serial`=2 "));
		$page=$_GET['page'];
	}
		
	?>