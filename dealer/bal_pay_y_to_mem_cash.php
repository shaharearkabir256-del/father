<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';
		require '../db/function.php';
		$id=$_SESSION['DealerLogId']; 
		
		$serial=$mysqli->real_escape_string($_GET['serial']);
		$location="bal_pay_to_mem_cash.php";
		
		$q1=$mysqli->query("SELECT * FROM `withdraw` WHERE  `serial`='".$serial."' ");
		$check=mysqli_num_rows($q1);
		$with=mysqli_fetch_object($q1);
		$amount=$with->amount;
		$serial=$with->serial;
		$recid=$with->send_id;
		$type=$with->type;
		$tax=$with->tax;
			$ad=mysqli_fetch_object($mysqli->query("SELECT `net_bal`,`shopping` FROM `balance` WHERE `user_id`='".$recid."'"));
		
			if($type==1){
			$netbal=$ad->net_bal;
			}
			if($type==3){
			$netbal=$ad->shopping;
			}
			
			if($amount>=$netbal){
			$_SESSION['msg'] = "Balance is Low!";
			header("Location:$location");
			exit();
			}
			
			if($amount==''){
			$_SESSION['msg'] = "withdraw Amount is Empty";
			header("Location:$location");
			exit();
			}
			
			if($amount<0){
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			if($check==0){
			$_SESSION['msg'] = "Invalid UserId";
			header("Location:$location");
			exit();
			}
			
			$com1=$amount*$setting->mem_wit_zone_com/100;
			$com2=$amount*$setting->mem_wit_district_com/100;
			$com3=$amount*$setting->mem_wit_upazila_com/100;
			$com4=$amount*$setting->mem_wit_uw_com/100;
			$com5=$amount*$setting->mem_wit_agent_com/100;
		
		//Trx= Type: trx-0,with-1,Req-2	Method: virtual-0, cash-1, Bkash-2, Rocket-3 
		if(($check==1)&&($amount!='')&&($amount>0)&&($amount<=$netbal)){

		$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`tax`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`com1`,`com2`,`com3`,`com4`,`com5`,`take`) 
		VALUES('".$trx_id."','".$recid."','".$amount."','".$tax."','".$date."','".$time."','".$day."','".$id."','$with->type','$with->method','1','3','$com1','$com2','$com3','$com4','$com5','1')");
		$mysqli->query("update `withdraw` set `status`='1' where `serial`='".$serial."' ");
					if($method==2 || $method==3 || $method==5){
			$tree=mysqli_fetch_object($mysqli->query("SELECT `get` FROM `tree` WHERE `user_id`='$recid' "));
    		$get=$tree->get+1;
    		$mysqli->query("update `tree` set `get`='".$get."' where `user_id`='$recid' ");
			}
		$spot_ref=$recid;
		require('../db/cal_mem.php');
		$_SESSION['msgs']= "Payment Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Payment Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>