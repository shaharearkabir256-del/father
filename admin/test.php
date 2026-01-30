<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		
		$query=$mysqli->query("SELECT * FROM `balance` ");	
	while($bal=mysqli_fetch_object($query)){
		$member=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` where `user_id`!='$bal->user_id'"));
		echo $member->user_id;
	} 
		
	}?>
	
	
		    