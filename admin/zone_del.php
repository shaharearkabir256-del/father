<?php
session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}else{	
		require '../db/db.php';
		$catid=$mysqli->real_escape_string($_GET['catid']);
		$location="zone.php";


		if($catid!=''){
			
			$mysqli->query("DELETE FROM `zone` WHERE `zone_id`='".$catid."' ");
			$mysqli->close();
			$_SESSION["msgs"]="DELETE Successful,$mysqli->affected_rows";
			header("Location:$location");

		}
		else{
			$_SESSION["msg"]="DELETE Fail";
			header("Location:$location");
			
		}

	}
?>