<?php
ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$id=$_SESSION['AdminUserId'];
		$recid=$_SESSION['AdminUserId'];
		require('../db/cal_ad.php');
		require('../db/function.php');
	

		$username=$mysqli->real_escape_string(strtolower($_POST['username']));
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pinCode=$mysqli->real_escape_string($_POST['pin']);
		$pin=md5($pinCode);
		$q1=$mysqli->query("SELECT `user_id` FROM `admin` WHERE `user`='".$username."' ");
		$check=mysqli_num_rows($q1);
		$acts=mysqli_fetch_object($q1);
		$recid=$acts->user_id;
		$pc=mysqli_fetch_object($mysqli->query("SELECT `pin` FROM `admin` WHERE `user_id`='".$id."' "));
		$pinchk=$pc->pin;
		$location="recharge.php";
		

			if($amount==''){
			$_SESSION['msg'] = "Please Enter Amount ";
			header("Location:$location");
			exit();
			}
			if($amount<0){
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
	
			if($pin==''){
			$_SESSION['msg'] = "Please Enter pin Number";
			header("Location:$location");
			exit();
			}
			if($pinchk!=$pin){
			$_SESSION['msg'] = "Wrong pin Number ";
			header("Location:$location");
			exit();
			}
			if($check==0){
			$_SESSION['msg'] = "Invalid UserId";
			header("Location:$location");
			exit();
			}
			
	
		if(($check==1)&&($pinchk=$pin)&&($pin!='')&&($amount!='')){
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$trx_id."','9','".$amount."','".$date."','".$time."','".$day."','".$recid."','0','0','1','5','1')"); 
		require('../db/cal_ad.php');
		$_SESSION['msgs']= "Recharge Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Recharge Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>