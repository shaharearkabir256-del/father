<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location:logout.php");
		exit();
	}
	else{
		require '../db/db.php';
		$catId=$mysqli->real_escape_string($_GET['prodser']);
		$catchk=$mysqli->real_escape_string($_GET['active']);
		
		if($catchk==1){
			$mysqli->query("update `product` set `chk`='0' where `serial`='".$catId."' ");
			$_SESSION['msgs']="Inactivation Success";
			header("Location:product.php");
		}
		elseif($catchk==0){
			$mysqli->query("update `product` set `chk`='1' where `serial`='".$catId."' ");
			$_SESSION['msgs']="Activation Success";
			header("Location:product.php");
		}
		else{
			$_SESSION['msg']="Failed";
			header("Location:product.php");
		}
		
	}
	
	?>