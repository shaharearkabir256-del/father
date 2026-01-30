<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		
	$spserial=$mysqli->real_escape_string($_GET['brandid']);
	 $location="cat.php";
	if($spserial!='')
	{
		//$mysqli->query("DELETE FROM `brand` WHERE `brand_id`='".$spserial."' "); 

		$_SESSION["msgs"]="DELETE Successful";
		header("Location:$location");
		exit();
	}else{
		$_SESSION["msg"]="DELETE Fail";
		header("Location:$location");
		exit();
	}
	}    	
?>