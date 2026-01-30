<?php error_reporting(0);
if(isset($_POST['cartup'])){
	require_once("db/db.php");
	if(isset($_SESSION['MemLogId'])){
	$csrc=$_SESSION['MemLogId'];
	$ser=$mysqli->real_escape_string($_POST['serial']);
	$qty=$mysqli->real_escape_string($_POST['qty']);
		if($ser>0){
					$precar=mysqli_fetch_object($mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."' AND `serial`='".$ser."'"));
					$tpoint=$qty*$precar->point;
					$total=$qty*$precar->price;
					$mysqli->query("UPDATE `cart` SET `qty`='".$qty."',`total`='".$total."',`tpoint`='".$tpoint."' WHERE  `csrc`='".$csrc."' AND `serial`='".$ser."'");
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