<?php ob_start();
	session_start();
	if($_SESSION['MemLogId'] == '')
	{
	$_SESSION['msg']="Please login first";
	header("Location:logout.php");
	exit();}
	else
	{
	require '../db/db.php';
	require '../db/function.php';
	$memId=$_SESSION['MemLogId']; 

		$mobile=$mysqli->real_escape_string($_POST['contact']);
		$mobile_type=$mysqli->real_escape_string($_POST['contact_Type']);
		
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		$location="bal_mobile_recharge_customer.php?page=Mobile%20Recharge&&Payment_Mathod=recharge&&menu=Balance";
		
		$member=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$memId."'"));
		$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` WHERE `user_id`='".$memId."'"));
		$pinchk=$member->pin;

		$valid=1;
		
		$net=$member->point;
		$type=5; // Purchase point
		$taxamn=0;
	
			if($amount==''){ $valid=0;
			$_SESSION['msg'] = "Please Enter Amount ";
			header("Location:$location");
			exit();
			}
			$wit_lim=20;
				
			if($amount<$wit_lim){  $valid=0;
			$_SESSION['msg'] = "Withdraw Amount Minimum $wit_lim $t";
			header("Location:$location");
			exit();
			}
			if($amount<0){ $valid=0;
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			if($net<=119){ $valid=0;
			$_SESSION['msg'] = "Invalid Cash Wallet ";
			header("Location:$location");
			exit();
			}
			$totalamnt=$taxamn+$amount;
			if($totalamnt>$net){ $valid=0;
			$_SESSION['msg'] = "Insufficient Balance";
			header("Location:$location");
			exit();
			}
	
			if($pin==''){  $valid=0;
			$_SESSION['msg'] = "Please Enter pin Number";
			header("Location:$location");
			exit();
			}
			if($pinchk!=$pin){ $valid=0;
			$_SESSION['msg'] = "Wrong pin Number ";
			header("Location:$location");
			exit();
			}
		
	if(($valid==1)&&($mobile!='')&&($amount>0)){
		
			$prefix=substr($mobile,0,3);
			if($mobile_type=="3"){
				$op_id=1;	
				$net="gp";
				$opname="grameen";
			}else{
				$nmmp=mysqli_fetch_object($mysqli->query("SELECT * FROM `flexy_api` WHERE `prefix`='$prefix'"));
				$op_id=$nmmp->op_id;
				$net=$nmmp->short;
				$opname=$nmmp->name;				
			}
			$mobile_types=($mobile_type-1);

			$uniq_id=time();
			$json = array(
			"method" => "execute_request",
			"tag_name" => "$opname",
			"opt_id" => "$op_id",
			"number" => "$mobile",
			"prefix" => "$prefix",
			"amount" => "$amount",
			"type_id" => "$mobile_type",
			"uniq_id" => "$uniq_id",	
			"api_pass" => "Sadek@123",
			"api_string" => "b647dc04ce928aa6f7a20efc4e17e407",
			);
			
			$json = json_encode($json);
			$url = "https://attcrias.xyz/api/communication/public_api.php";
			$curl = curl_init($url);
			curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);	
			$rsl_api = curl_exec($curl);
			if(curl_errno($curl)){echo curl_error($curl);}
			curl_close($curl);
			
			if($rsl_api != null){
				$obj = json_decode($rsl_api);
				if(trim($obj->{'status'}) == "Success"){					
					$mysqli->query("INSERT INTO `trx`(`mobile`, `mobile_type`, `trx_id`, `send_id`, `rec_id`,`amount`, `tax`, `date`,`time`,`day`,`type`,`method`,`status`, `account`, `take`,`uniq_id`) 	VALUES('".$mobile."','".$mobile_types."','".$trx_id."','".$memId."','1547287135','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','5','5','1','3','1','$uniq_id')");
					
					$_SESSION['msgs']= "Recharge Successful";
					header("Location:$location");
					exit();
				}else{
					$result=$obj->{'reason'};
					$_SESSION['msg']= "Recharge Failed: $result";
					header("Location:$location");
					exit();
				}
			}

				
		
		
		
		
		
		
		
/* 	//require 'db.php';	
	$url = "http://load16.com/db/api_bd.php";
	$ch = curl_init();
	$variables = array(
	'api' => urlencode("DAILYBAZAR"), //dailybazar
	'pass' => urlencode("$setting->api_recharge"),
	'mobile' => urlencode("$mobile"), //$res->mobile
	'type' => urlencode("$mobile_type"), //$res->type 0 = prepaid 1 = Postpaid
	'amt' => urlencode("$amount"), //$res->amount
	'domain' => urlencode("dailyincomebazar.com"), // Your Domain
	);
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $variables);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
	curl_setopt($ch,CURLOPT_TIMEOUT, 20);
	$result = curl_exec($ch);
	curl_close ($ch);

	if($result=="Success"){
		$mysqli->query("INSERT INTO `trx`(`mobile`,`mobile_type`,`trx_id`,`send_id`,`rec_id`,`amount`,`tax`,`date`,`time`,`day`,`type`,`method`,`status`,`account`,`take`) 
		VALUES('".$mobile."','".$mobile_type."','".$trx_id."','".$memId."','1547287135','".$amount."','".$taxamn."','".$date."','".$time."','".$day."','5','5','1','3','1')");	
		

		block
		$getpp=mysqli_num_rows($mysqli->query("select * from `trx` where `date`='".$date."' and `send_id`='$memId' and `type`='5' and `method`='5' "));
		if($getpp==1){
		$res=mysqli_fetch_object($mysqli->query("select `get` from `tree` where `user_id`='$memId' "));
		$get=($res->get+$getpp); $mysqli->query("update `tree` set `get`='$get' where `user_id`='$memId' ");
		} 
		
		
		
		
		
		
		$_SESSION['msgs']= "Recharge Successful";
		header("Location:$location");
		exit();
	}else{
		$_SESSION['msg']= "Recharge Failed: $result";
		header("Location:$location");
		exit();
	} */
	}
}
?>