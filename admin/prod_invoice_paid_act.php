<?php ob_start();
	session_start();
	error_reporting(0);
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
	    require '../db/db.php';
		
		$id=$_SESSION['AdminUserId'];
		$serial=$_GET['serial'];
		$memId=$_GET['memberUserId'];
		$location="prod_invoice.php?page=Invoice%20List";
		if($serial!=''){ 
		$mysqli->query("update `invoice` set `paid`='1' WHERE `invoice`='".$serial."' and `agent_id`='$id' ");
		/* SELECT `serial`, `paid`, `delivery`, `delivery_charge_percent`, `delivery_charge`, `invoice`, `prod_id`, `product_id`, 
		`user_id`, `sponsor`, `agent_id`, `agent_com`, `account`, `name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`, `type`,
		`chk` FROM `invoice` WHERE 1 */
		$inv_chk=mysqli_num_rows($mysqli->query("select * from `invoice` where `user_id`='".$memId."' and `sdate`='".$date."' and `type`='0' "));
		if($inv_chk==1){
		$res=mysqli_fetch_object($mysqli->query("select `get` from `tree` where `user_id`='$memId' "));
		$get=($res->get+1); $mysqli->query("update `tree` set `get`='$get' where `user_id`='$memId' ");
		}
		$_SESSION['msgs']= "Paid";
		header("Location:$location");
		exit();	
		}else{
		$_SESSION['msg']= "Failed!";
		header("Location:$location");
		exit();		
		}
		

	
	}
ob_end_flush();	
?>