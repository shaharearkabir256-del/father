<?php error_reporting(0);
if(isset($_GET['serial'])){
	require_once("db/db.php");
	if(isset($_SESSION['MemLogId'])){
	$csrc=$_SESSION['MemLogId'];
	$ser=$mysqli->real_escape_string($_GET['serial']);
		if($ser>0){

					$mysqli->query("DELETE FROM `cart` WHERE  `csrc`='".$csrc."' AND `serial`='".$ser."'");
					$_SESSION['msgs'] = "Cart Upgrade Successful";
					header("Location:cart_view.php");
					exit();		
			
		}else{
		$_SESSION['msg'] = "Invalide Product ID";
		header("Location:cart_view.php");
		exit();		
		}
	}else{
	header("Location:checkout.php?msg2=Please fillup the customer information");
	exit();		
	}
}
	?>