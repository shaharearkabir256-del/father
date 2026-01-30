<?php ob_start();
	session_start();
	if( $_SESSION['DealerLogId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location:logout.php");
		exit();
	}
	else{
		require '../db/db.php';

		$mem=$_SESSION["DealerLogId"]; 
		$serial=$mysqli->real_escape_string($_GET['sn']);

		$location='prod_req_list.php';


		if($serial==''){
			$_SESSION['msg']="Invalid Request";       
			header("Location:$location");
			exit();	
		}
		$chk=mysqli_fetch_object($mysqli->query("SELECT * FROM `prod_req` where `serial`='".$serial."' "));
		if(($serial!='')&&($chk>0)){
			$mysqli->query("update `prod_req` set `chk`='2' where `serial`='".$serial."' "); 
			$_SESSION['msg']="Request Canceled.";       
			header("Location:$location");
			exit();	
			}
			else{
				$_SESSION['msgs']="Request Not Cancel.";       
				header("Location:$location");
				exit();
			}
}


?>