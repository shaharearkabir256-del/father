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
		$location="expdate.php?page=Expire Date Upgrade&&menu=Members";
		$planpointcheck=$mysqli->real_escape_string($_POST['planpointcheck']);
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
		

		if(($_SESSION['last_transaction_time']!=time())&&($pincode==$mem->pin)&&($bal->net_bal>=$planpointcheck)){
						$msgs="You have successfully upgrade expire date";
						$spotcom=$planpointcheck*$setting->mem_join_spot_com/100;
						$agent_com=$planpointcheck*$setting->mem_join_agent_com/100;
						$mysqli->query("INSERT INTO `expdate`(`user_id`,`user`,`sponsor`,`sponsor_com`, `amnt`, `agent_id`, `agent_com`, `sdate`)
						VALUES ('$id','$tre->user','$inv->sponsor','$spotcom','$planpointcheck','$inv->agent_id','$agent_com','$date') ");
		
		$tree=mysqli_fetch_object($mysqli->query("SELECT `expdate` FROM `tree` WHERE `user_id`='$id' "));
		$expdate=$tree->expdate+90;
		$mysqli->query("update `tree` set `expdate`='".$expdate."' where `user_id`='$id' ");
						$message="Congratulation! You have successfully upgrade expire date";
						$mysqli->query("INSERT INTO `msg`(`user_id`, `msg`,`chk`) VALUES ('".$id."','".$message."','2')");
						$spot_ref=$id;
						require('../db/cal_mem.php');
							$to="$pro->fname $pro->lname<$pro->gmail>";
							$subject=$title;
							$txt="$message
							
							Expire Date: 90 day's Increment
							
							Login Member Panel (https://$url/member)
							";
							$headers="From:Expire Date Upgrade <$email>". "\r\n" . "BCC:shaang002@gmail.com";
							mail($to,$subject,$txt,$headers);
						$_SESSION['last_transaction_time'] = time(); 
						$_SESSION['msgs']=$msgs;
						header("Location:$location");
						exit();
					
					}else{
						
						$_SESSION['msg']= "Package Upgraded Failed";
						header("Location:$location");
						exit();	
						
					}
				
		
		
	
//SSELECT `serial`, `user_id`, `user`, `amnt`, `plan`, `sponsor`, `sponsor_com`, `agent_id`, `agent_com`, `sdate`, `chkdate` FROM `planup` WHERE 1

//SELECT `serial`, `name`, `amount`, `sponsor`, `gen`, `stype`, `dailylink`, `comlink`, `dailyapps`, `comapps`, 
//`dailyvideo`, `comvideo`, `active`, `sdate` FROM `package` WHERE 1

//SELECT `serial`, `user_id`, `invest`, `invest_id`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, 
//`package`, `sdate`, `chkdate` FROM `invest` WHERE 1
	
	}
?>