<?php ob_start();
	session_start();
	if($_SESSION['DealerLogId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location:index.php");
		exit();
	}else{
	require '../db/db.php';
	require '../db/function.php';
	$id=$_SESSION['DealerLogId'];
	$agent =$mysqli->real_escape_string($_POST['agent']);
	$serial =$mysqli->real_escape_string($_POST['plan']);
	$pln=mysqli_fetch_object($query=$mysqli->query("SELECT * FROM `plan` where `serial`='$serial' "));
	$plnsn=$pln->serial;
	$plan=$pln->plan; 
	$stype1 =$mysqli->real_escape_string($_POST['memcat']);
	$nid =$mysqli->real_escape_string($_POST['nid']);
	$fname =$mysqli->real_escape_string($_POST['fname']);
	$lname =$mysqli->real_escape_string($_POST['lname']);
	$logIdP =$mysqli->real_escape_string(strtolower($_POST['userid']));
	$pass=$mysqli->real_escape_string($_POST['passOne']);
	$dpass=md5($pass);
	$dpin =$mysqli->real_escape_string($_POST['pinOne']);
	//dpin=md5($pin0);
	$sponsor=$mysqli->real_escape_string(strtolower($_POST['sponsor']));
	$memef=$mysqli->query("select * from `member` where `log_id`='".$sponsor."' ");
	$chk_sponsor=mysqli_num_rows($memef);	
	$member=mysqli_fetch_object($memef);	
	$rid=$member->log_id;
	$uplink=$mysqli->real_escape_string(strtolower($_POST['plcmnt']));


    $city =$mysqli->real_escape_string($_POST['city']);
	$country =$mysqli->real_escape_string($_POST['country']);
	$mobile =$mysqli->real_escape_string($_POST['mobile']);
	$gmail =$mysqli->real_escape_string(strtolower($_POST['email']));
	$bday=$mysqli->real_escape_string($_POST['bday']);
	$bmonth=$mysqli->real_escape_string($_POST['bmonth']);
	$byear=$mysqli->real_escape_string($_POST['byear']);
	$sex =$mysqli->real_escape_string($_POST['sex']);

	$location="member_add.php";
	
	if($agent==''){
		$_SESSION['msg']="Please Enter Agent ID";
		header("Location:$location");
		exit();
	}
	
	// Placement Id
	if($uplink!=''){		
		$exeupline=$mysqli->query("select * from `tree` where `user`='".$uplink."' ");
		$chkuplink=mysqli_num_rows($exeupline);
		$upline=mysqli_fetch_object($exeupline);
		if($chkuplink==0){		
			$_SESSION['msg']="Invalid Placement Id";		
			header("Location:$location");		
			exit();		
		}else{
			$uplineUser=$upline->user;
			$uplineUserId=$upline->user_id;
			$stype=$upline->stype;
		}
	}else{
			$_SESSION['msg']="Enter Placement Id";		
			header("Location:$location");		
			exit();
	}
	
// NID
	$chk_nid=mysqli_num_rows($mysqli->query("select * from `profile` where `nid`='$nid' and `stype`='$stype' "));
	if($chk_nid==1){
		$_SESSION['msg']="This NID Number Already Taken. Please Try Another NID Number";		
		header("Location:$location");		
		exit();		
	}

// User Id
		if($logIdP==''){
		$_SESSION['msg']="Please Enter The User Id";
		header("Location:$location");
		exit();
		}else{
			$chkm=mysqli_num_rows($mysqli->query("select * from `member` where `log_id`='".$logIdP."' "));	
			if($chkm==1){
				$_SESSION['msg']="This User Name Already Taken. Please Try Another User Name";		
				header("Location:$location");		
				exit();		
			}
			
		}
	if($chk_sponsor==0){
		$_SESSION['msg']="Invalid Sponsor User Name";
		header("Location:$location");
		exit();
	}
	if($nid==''){
		$_SESSION['msg']="Please Enter NID Number";
		header("Location:$location");
		exit();
	}
	if($nid<0){
		$_SESSION['msg']="Invalid NID Number";
		header("Location:$location");
		exit();
	}
	
// Password
	if($dpass==''){
		$_SESSION['msg']="Please Enter The Password";
		header("Location:$location");
		exit();
	}

// Pin
	if($dpin==''){
		$_SESSION['msg']="Please Enter The Pin Code";
		header("Location:$location");
		exit();
	}

// Sponsor Id
		$q2=$mysqli->query("select * from `tree` where `user`='".$sponsor."' and `active`='1' ");	
		$tree2=mysqli_fetch_object($q2);
		if($tree2->active==0){		
				$_SESSION['msg']="Sponsor Id Suspended";		
				header("Location:$location");		
				exit();		
			} 
		$spot_ref=$tree2->user_id;
		$spPack=$tree2->package;
		$check=mysqli_num_rows($q2);

//SELECT `serial`, `user_id`, `sponsor`, `royalty`, `dsd`, `rec_bal`, `pay_bal`, `sales`, `tax`, `net_bal` FROM `dealer_balance` WHERE 1
			$bal=mysqli_fetch_object($mysqli->query("select `net_bal` from `dealer_balance` where `user_id`='".$id."' "));
			$spbal=$bal->net_bal;	
	
			if($spbal<$plan){		
				$_SESSION['msg']="Need Registration Fee $plan Point";		
				header("Location:$location");		
				exit();		
			} 		

			
// Commission Distribute Sponsor And Submition Limit Check

   // Happy mem join lim 2 
	if($stype==1){ $chk_upline=mysqli_num_rows($mysqli->query("select * from `tree` where `stype`=1 AND `upline`='".$uplineUser."' "));
	if($chk_upline>=2){ 
	$_SESSION['msg']="Happy Submittion Complete"; 
	header("Location:$location"); 
	exit();	
	}else{ $spCom=$plan*$setting->mem_join_spot_com2/100;
	if($chk_upline==0){$placecode=1;} 
	if($chk_upline==1){$placecode=2;}
	}
	}
	
	// Regular mem join lim 2
	if($stype==2){ 
	$chk_upline=mysqli_num_rows($mysqli->query("select * from `tree` where `stype`=2 AND `upline`='".$uplineUser."' "));
	if($chk_upline>=2){	
	$_SESSION['msg']="Regular Submittion Complete";	
	header("Location:$location"); 
	exit(); 
	}else{ 
		$spotcom=$plan*$setting->mem_join_spot_com/100;
		$spCom=$spotcom*$setting->mem_join_spot_cash_wallet/100;
		$stCom=$spotcom*$setting->mem_join_spot_upgrade_wallet/100;
		$shopping=$spotcom*$setting->mem_join_spot_shopping_wallet/100;
	if($chk_upline==0){$placecode=3;} 
	if($chk_upline==1){$placecode=4;}
	}    
	}
	
	
	// Lucky mem join lim 2
	if($stype==3){ 
	$chk_upline=mysqli_num_rows($mysqli->query("select * from `tree` where `stype`=3 AND `upline`='".$uplineUser."' "));
	if($chk_upline>=2){	
	$_SESSION['msg']="Lucky Submittion Complete";
	header("Location:$location"); 
	exit(); 
	}else{ 
	    $spotcom=$plan*$setting->mem_join_spot_com3/100;
    	$spCom=$spotcom*$setting->mem_join_spot_cash_wallet/100;
    	$stCom=$spotcom*$setting->mem_join_spot_upgrade_wallet/100;
    	$shopping=$spotcom*$setting->mem_join_spot_shopping_wallet/100;
	if($chk_upline==0){$placecode=5;} 
	if($chk_upline==1){$placecode=6;}
	    
	}
	}
		$totlamembers=mysqli_num_rows($mysqli->query("select * from `member` "));
		if($totlamembers>=$setting->mem_join_lim){		
				$_SESSION['msg']="Can't Submit More Than Maximum Submittion";		
				header("Location:$location");		
				exit();		
			}
			
	$chkplace=mysqli_num_rows($mysqli->query("select * from `tree` where `upline`='".$uplineUser."' and `position`='$placecode'  "));
	if($chkplace==1){		
		$_SESSION['msg']="Position Not Empty";		
		header("Location:$location");		
		exit();		
	}
		//1. | 2. | 3.Profile | 4.Member | 5.Tree | 6.Balance | 7.Generation | 8. | 9. Invest ***
		// $chkm= Member Id | $check= reffer permition | $check1= placement Id | $chkUpline= placement Code 

	if(($chkplace==0)&&($chk_upline<2)&&($agent!='')&&($spbal>=$plan)&&($chk_sponsor==1)&&($totlamembers<$setting->mem_join_lim)&&($tree2->active==1)&&($chkm==0)&&($check==1)){
			$logId=time();
//SELECT `serial`, `user_id`, `log_id`, `pass`, `pdate`, `password`, `pin`, `pndate`, `name`, `type`, `zone_id`, `upozela_id`, `union_id`, `ward_id`, `agent_id`, 
//`mobile`, `active`, `date`, `sponsor`, `refer`, `team`, `royalty`, `dsd`, `sales`, `invest`, `direct`, `weekly`, `monthly`, 
//`rank`, `admin_in`, `admin_out`, `member_in`, `member_out`, `net_bal`, `last_login`, `ip`, `browser`, `city`, `country`, `chk` FROM `dealer` WHERE 1
		$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$id."'"));
		$age=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `agent_id`='$del->agent_id' and `type`='5' "));
		$war=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `ward_id`='$del->ward_id' and `type`='4' "));
		$uni=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `union_id`='$del->union_id' and `type`='3' "));
		$upz=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `upozela_id`='$del->upozela_id' and `type`='2' "));
		$zon=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `zone_id`='$del->zone_id' and `type`='1' "));
		$agent_com=($plan*$setting->mem_join_agent_com/100);
		$uw_id=$war->user_id; 
		$uw_com=($plan*$setting->mem_join_uw_com/100);
		$upazila_id=$uni->user_id;
		$upazila_com=($plan*$setting->mem_join_upazila_com/100);
		$district_id=$upz->user_id;
		$district_com=($plan*$setting->mem_join_district_com/100);
		$zone_id=$zon->user_id;
		$zone_com=($plan*$setting->mem_join_zone_com/100); 
		$fund_donation=($plan*$setting->mem_join_donation_fund/100); 
		$fund_company=($plan*$setting->mem_join_company_fund/100); 
		//gen crn_gen
		$mysqli->query("INSERT INTO `member`(`user_id`,`log_id`,`pass`,`pin`,`sponsor`,`position`,`point`,`upline`,`agent_id`,`date`) 
		VALUES('".$logId."','".$logIdP."','".$dpass."','".$dpin."','".$spot_ref."','".$placecode."','".$plan."','".$uplineUser."','".$id."','".$date."')");
		
        //match || crn_daily || crn_match
		$mysqli->query("INSERT INTO `tree`(`plan`,`point`,`stype`,`user_id`,`user`,`position`,`upline`,`sponsor`,`agent_id`,`date`) 
		VALUES ('$plnsn','".$plan."','$stype','".$logId."','".$logIdP."','".$placecode."','".$uplineUser."','".$spot_ref."','".$id."','".$date."')");
	
		$mysqli->query("INSERT INTO `profile`(`stype`,`nid`,`user_id`,`fname`,`lname`,`email`,`mobile`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex` ) 
		VALUES ('$stype','".$nid ."','".$logId ."','".$fname."','".$lname."','".$gmail."','".$mobile."','".$city."','".$country."','".$bday."','".$bmonth."','".$byear."','".$sex."')");
		$mysqli->query("INSERT INTO `balance` (`user_id`) VALUES ('".$logId."')");

		// sponsor com | Agent Com | Daily Payment from here
		$mysqli->query("INSERT INTO `invest`(`fund_donation`,`fund_company`,`trx_id`, `agent_id`, `agent_com_percent`, `agent_com`, `uw_id`, `uw_com_percent`, `uw_com`, `upazila_id`, `upazila_com_percent`, `upazila_com`, `district_id`, `district_com_percent`, `district_com`, `zone_id`, `zone_com_percent`, `zone_com`, `user_id`, `invest`, `invest_id`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`, `club`)
		VALUES ('".$fund_donation."','".$fund_company."','".$trx_id."','$id','$setting->mem_join_agent_com','".$agent_com."','$uw_id','$setting->mem_join_uw_com','".$uw_com."','$upazila_id','$setting->mem_join_upazila_com','".$upazila_com."','$district_id','$setting->mem_join_district_com','".$district_com."','$zone_id','$setting->mem_join_zone_com','".$zone_com."','".$logId."','".$plan."','$id','".$spCom."','".$spot_ref."','".$stCom."','".$uplineUserId."','".$shopping."','".$date."','$placecode')");
			$tree=mysqli_fetch_object($mysqli->query("SELECT `get` FROM `tree` WHERE `user_id`='$spot_ref' "));
    		$get=$tree->get+30;
    		$mysqli->query("update `tree` set `get`='".$get."' where `user_id`='$spot_ref' ");
    		$mysqli->query("update `tree` set `club`='$placecode' where `user`='$uplineUser' ");
		require('../db/cal_mem.php');
$to = "$fname $lname<$gmail>";
$subject=$title;
$txt = "
Your Login Information
UserId: $logIdP
Password: $pass
Pin: $dpin

Your Affiliate Information
Your SponsorId: $rid
Your UplineId: $uplineUser
Your Position: $placecode

Registration Date: $day $time $date

Login Member Panel (https://$url/member)
";

$headers = "From:Registration By Agent:$totlamembers<$email>". "\r\n" . "BCC:$gmail";
mail($to,$subject,$txt,$headers);
$mobile=$mobile;
$sms=$txt;			
require('../db/api_sms.php');
		$_SESSION['msgs']="Registration Successful";
		header("Location:$location"); 
		exit();

	}else{
		session_destroy();
		$_SESSION['msg'] = "Failed";
		header("Location:$location");
		exit();
	}
}
ob_end_flush();
?>