<?php ob_start();
	session_start();
	if($_SESSION['DealerLogId'] == '')
	{
	$_SESSION['msg']="Please login first";
	header("Location:index.php");
	exit();}
	else
	{
	require '../db/db.php';
	require '../db/function.php';
	$id=$_SESSION["DealerLogId"]; 
		$acc=$mysqli->real_escape_string($_POST['acc']);
		$trxId=$mysqli->real_escape_string(strtolower($_POST['userid']));
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		if($acc=="member"){
		$q1=$mysqli->query("SELECT * FROM `member` WHERE `log_id`='".$trxId."' ");
		}
		if($acc=="dealer"){
			$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$id' "));
			if($del->type==6){$type=" `type`='5' ";}
			 elseif($del->type==5){$type=" `type`='6' ";}
			 elseif($del->type==4){$type=" `type`='5' ";}
			 elseif($del->type==3){$type=" `type`='4' ";}
			 elseif($del->type==2){$type=" `type`='3' ";}
			 elseif($del->type==1){$type=" `type`='2' ";}
		$q1=$mysqli->query("SELECT * FROM `dealer` WHERE $type and `log_id`='".$trxId."' ");
		
		

		}
		$q2=$mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$id."' ");
		$user=mysqli_fetch_object($q2);
		$check=mysqli_num_rows($q1);
		$acts=mysqli_fetch_object($q1);
		$cid=$acts->user_id;
		$pinchk=$user->pin;
	
			// 12. Member Joining Commission
			if($user->type==1){ // zone 
				$com1=$amount*$setting->mem_trx_zone_com/100;
			}elseif($user->type==2){// District 
				$com2=$amount*$setting->mem_trx_district_com/100;
			}elseif($user->type==3){// Upazila 
				$com3=$amount*$setting->mem_trx_upazila_com/100;
			}elseif($user->type==4){// W/u 
				$com4=$amount*$setting->mem_trx_uw_com/100;
			}elseif($user->type==5){// Agent 
/* 				if($acc=="dealer"){
					$com5=$amount*$setting->mem_trx_agent_com/100;
				} */
				if($acc=="member"){
					$com1=$amount*$setting->mem_trx_zone_com/100;
					$com2=$amount*$setting->mem_trx_district_com/100;
					$com3=$amount*$setting->mem_trx_upazila_com/100;
					$com4=$amount*$setting->mem_trx_uw_com/100;
					$com5=$amount*$setting->mem_trx_agent_com/100;
				}
			}

		$location="bal_trx.php";
		
			if($trxId==''){
			$_SESSION['msg'] = "Please Enter User id ";
			header("Location:$location");
			exit();
			}
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
			
			$ad=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `dealer_balance` WHERE `user_id`='".$id."'"));
			$netbal=$ad->net_bal;
			
			if($amount>$netbal){
			$_SESSION['msg'] = "Balance is Low! Please Recharge Balance";
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
			
			if($cid==$id){
				$_SESSION['msg'] = "Invalid UserId";
				header("Location:$location");
				exit();
			}
		$customers=$amount/100;
		$agent_com=$amount*$setting->mem_trx_agent_com/100;	
		if(($check==1)&&($pinchk==$pin)&&($cid!=$id)&&($trxId!='')&&($pin!='')&&($amount!='')){
			if($acc=="dealer"){
		$mysqli->query("INSERT INTO `dealer_trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`status`,`account`,`com1`,`com2`,`com3`,`com4`,`com5`, `customer`, `take`) 
		VALUES('".$trx_id."','".$id."','".$amount."','".$date."','".$time."','".$day."','".$cid."','1','".$user->type."','$com1','$com2','$com3','$com4','$com5','$customers','1')");
				// For Dealer
		include('../db/cal_del.php');
		}
		if($acc=="member"){
		$mysqli->query("INSERT INTO `dealer_trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`status`,`account`,`com1`,`com2`,`com3`,`com4`,`com5`,`take`) 
		VALUES('".$trx_id."','".$id."','".$amount."','".$date."','".$time."','".$day."','".$cid."','1','".$user->type."','$com1','$com2','$com3','$com4','$com5','1')");
				// For Dealer
		include('../db/cal_del.php');
		$mysqli->query("INSERT INTO `trx`(`trx_id`,`agent_com`,`send_id`,`amount`,`tax`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`, `customer`,`take`) 
		VALUES('".$trx_id."','$agent_com','".$id."','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','".$cid."','0','0','1','4','$customers','1')");
		// For Member
		$bid=$acts->user_id; 
		include('../db/cal_mem.php');
		}
		$_SESSION['msgs']= "Transaction Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Transaction Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>