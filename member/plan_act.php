<?php
  	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
    if(($_SESSION['MemLogId']== '')||(!isset($_SESSION['MemLogId']))){
    	header("Location:logout.php");
    	exit();
    }else{
		require('../db/db.php');
		require('auth.php');
		$location="plan.php";
		$package_id=$mysqli->real_escape_string($_POST['planId']);
		$pincode=$mysqli->real_escape_string($_POST['pinCode']);
		
		if($pincode==''){
			$_SESSION['msg']= "Enter Your Pin Code";
			header("Location:$location");
			exit();	
		}
		if($pincode<0 || $pincode==null){
			$_SESSION['msg']= "Invalid Pin Code";
			header("Location:$location");
			exit();	
		}
		
		if($pincode!=$mem->pin){
			$_SESSION['msg']= "Wrong Pin Code";
			header("Location:$location");
			exit();	
		}
	
		
		$q1=$mysqli->query("SELECT * FROM `plan` WHERE `serial`='".$package_id."' ");
		$check=mysqli_num_rows($q1);
		$res_package=mysqli_fetch_object($q1);
		
			if($bal->net_bal<$res_package->plan){
			$_SESSION['msg']= "Insufficient Balance";
			header("Location:$location");
			exit();	
		}
		if($check==1){
			if($planup->plan==$res_package->serial){
				$_SESSION['msg'] = "This Package Already Actived ";
				header("Location:$location");
				exit();
				}else{
					if(($_SESSION['last_transaction_time']!=time())&&($check==1)&&($pincode==$mem->pin)&&($planup->plan!=$res_package->serial)&&($planup->plan<$res_package->serial)&&($bal->net_bal>=$res_package->plan)){
						$msgs="You have successfully upgrade to <b>$res_package->name</b> Package";
						$spotcom=$res_package->plan*$setting->mem_join_spot_com/100;
						$agent_com=$res_package->plan*$setting->mem_join_agent_com/100;
						$mysqli->query("INSERT INTO `planup`(`user_id`,`user`,`sponsor`,`sponsor_com`,`plan`, `amnt`, `agent_id`, `agent_com`, `sdate`)
						VALUES ('$id','$tre->user','$inv->sponsor','$spotcom','$res_package->serial','$res_package->plan','$inv->agent_id','$agent_com','$date') ");
		$tree=mysqli_fetch_object($mysqli->query("SELECT `get` FROM `tree` WHERE `user_id`='$id' "));
		$get=$tree->get+30;
		$mysqli->query("update `tree` set `plan`='".$res_package->serial."',`get`='".$get."' where `user_id`='$id' ");
						$message="Congratulation! You have successfully upgrade to $res_package->name Package";
						$mysqli->query("INSERT INTO `msg`(`user_id`, `msg`,`chk`) VALUES ('".$id."','".$message."','2')");
						$spot_ref=$id;
						require('../db/cal_mem.php');
							$to="$pro->fname $pro->lname<$pro->gmail>";
							$subject=$title;
							$txt="$message
							
							Upgrade Date: $day $time $date
							
							Login Member Panel (https://$url/member)
							";
							$headers="From:Package Upgrade To $res_package->name<$email>". "\r\n" . "BCC:shaang002@gmail.com";
							mail($to,$subject,$txt,$headers);
							$customer_profile=mysqli_fetch_object($query=$mysqli->query("SELECT * FROM `profile` where `user_id`='$id' "));
							$mobile=$customer_profile->mobile;
							$sms=$txt;			
							require('../db/api_sms.php');
							
						$_SESSION['last_transaction_time'] = time(); 
						$_SESSION['msgs']=$msgs;
						header("Location:$location");
						exit();
					
					}else{
						
						$_SESSION['msg']= "Package Upgraded Failed";
						header("Location:$location");
						exit();	
						
					}
				}
		}
		
	
//SSELECT `serial`, `user_id`, `user`, `amnt`, `plan`, `sponsor`, `sponsor_com`, `agent_id`, `agent_com`, `sdate`, `chkdate` FROM `planup` WHERE 1

//SELECT `serial`, `name`, `amount`, `sponsor`, `gen`, `stype`, `dailylink`, `comlink`, `dailyapps`, `comapps`, 
//`dailyvideo`, `comvideo`, `active`, `sdate` FROM `package` WHERE 1

//SELECT `serial`, `user_id`, `invest`, `invest_id`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, 
//`package`, `sdate`, `chkdate` FROM `invest` WHERE 1
	
	}
?>