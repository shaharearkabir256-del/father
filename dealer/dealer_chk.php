<?php ob_start();
	session_start();
	if( $_SESSION['DealerLogId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location: ../admin/index.php");
		exit();
	}
	else{
		require '../db/db.php';
		
		$catId=$mysqli->real_escape_string($_GET['userid']);
		$catchk=$mysqli->real_escape_string($_GET['chk']);
		$location="dealer.php";
		
		if($catchk==1){
			$mysqli->query("update `dealer` set `chk`='0' where `user_id`='".$catId."' ");
			$_SESSION['msgs']="Inactivation Success";
			header("Location:$location");
		}
		elseif($catchk==0){
			$mysqli->query("update `dealer` set `chk`='1' where `user_id`='".$catId."' ");
			$_SESSION['msgs']="Activation Success";
			header("Location:$location");
		}
		else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
		}
		
	}