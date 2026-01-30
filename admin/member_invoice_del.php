<?php
ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location: ../admin/index.php");
		exit();
	}
	else{
		require '../db/db.php';
		$invoice=$mysqli->real_escape_string($_GET['invoice']);

		$location="prod_invoice.php";
		
		if($invoice==1){
			$mysqli->query("delete from `invoice` where `type`= '1' order by serial desc");
			$_SESSION['msgs']="Delete Success";
			header("Location:$location");
		}else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}