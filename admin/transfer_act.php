<?php ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require('../db/db.php');
		$recid=$_SESSION['AdminUserId'];
		require('../db/cal_ad.php');
		require('../db/function.php');
		
		$admin=$_SESSION["AdminUserId"]; 
	
		
		$acc=$mysqli->real_escape_string($_POST['acc']);
		$type=$mysqli->real_escape_string($_POST['trxtype']);
		$trxId=$mysqli->real_escape_string($_POST['userid']);
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pinCode=$mysqli->real_escape_string($_POST['pin']);
		$pin=md5($pinCode);
		if($acc=='admin'){
			$q1=$mysqli->query("SELECT * FROM $acc WHERE `user`='$trxId' ");
		}else{
			$q1=$mysqli->query("SELECT * FROM $acc WHERE `log_id`='$trxId' ");
		}
		$check=mysqli_num_rows($q1);
		$receiver=mysqli_fetch_object($q1);
		$recid=$receiver->user_id;
		$sender=mysqli_fetch_object($mysqli->query("SELECT `pin` FROM `admin` WHERE `user_id`='$admin' "));
		$pinchk=$sender->pin;
		$location="transfer.php";
			$valid=1;
			if($trxId==''){ $valid=0;
			$_SESSION['msg'] = "Please Enter User id ";
			header("Location:$location");
			exit();
			}
			if($amount==''){ $valid=0;
			$_SESSION['msg'] = "Please Enter Amount ";
			header("Location:$location");
			exit();
			}
			if($amount<1){ $valid=0;
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			
			$ad=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `balance` WHERE `user_id`='".$admin."'"));
			$netbal=$ad->net_bal;
			
			if($amount>$netbal){ $valid=0;
			$_SESSION['msg'] = "Balance is Low! Please Recharge Balance";
			header("Location:$location");
			exit();
			}
			
			if($pin==''){ $valid=0;
			$_SESSION['msg'] = "Please Enter pin Number";
			header("Location:$location");
			exit();
			}
			if($pinchk!=$pin){ $valid=0;
			$_SESSION['msg'] = "Wrong pin Number ";
			header("Location:$location");
			exit();
			}
			if($check==0){ $valid=0;
			$_SESSION['msg'] = "Invalid UserId";
			header("Location:$location");
			exit();
			}
			
			if($recid==$admin){ $valid=0;
				$_SESSION['msg'] = "Invalid UserId";
				header("Location:$location");
				exit();
			}
		if($acc=='admin'){
			$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
			VALUES('".$trx_id."','".$admin."','".$amount."','".$date."','".$time."','".$day."','".$recid."','0','0','1','0','1')");
			require('../db/cal_ad.php');
			$_SESSION['msgs']= "Transaction To Accounts Successful";
			header("Location:$location");
			exit();
		}elseif($acc=='dealer'){
			//SELECT `serial`, `send_id`, `rec_id`, `amount`, `tax`, `type`, `method`, `status`, `account`, `day`, `date`, `time`, `take` FROM `dealer_trx` WHERE 1
			$mysqli->query("INSERT INTO `dealer_trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
			VALUES('".$trx_id."','".$admin."','".$amount."','".$date."','".$time."','".$day."','".$recid."','0','0','1','0','1')");
			require('../db/cal_del.php');
			$_SESSION['msgs']= "Transaction To Dealer Successful";
			header("Location:$location");
			exit();
		}elseif($acc=='member'){
			if(($valid==1)&&($recid!=$admin)){
			$mysqli->query("INSERT INTO `trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`method`,`status`,`account`,`take`) 
			VALUES('".$trx_id."','".$admin."','".$amount."','".$date."','".$time."','".$day."','".$recid."','".$type."','0','1','0','1')");
			$spot_ref=$recid;
			require('../db/cal_mem.php');	
			$_SESSION['msgs']= "Transaction Successful";
			header("Location:$location");
			exit();
			}else{
			$_SESSION['msg']= "Transaction Failed";
			header("Location:$location");
			exit();		
			}
		}else{}
	
	}
	
?>