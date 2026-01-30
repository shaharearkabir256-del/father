<?php 
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$memId=$_SESSION['AdminUserId'];
/*
SELECT `serial`, `user_id`, `mem_prod_delivery_charge`, `mem_prod_delivery_charge1`, `mem_prod_delivery_charge1p`, `mem_prod_delivery_charge2`, 
`mem_prod_delivery_charge2ps`, `mem_prod_delivery_charge3`, `mem_prod_delivery_charge3ps`, `mem_prod_delivery_charge_discount`, `mem_join_lim`, 
`mem_join_spot_cash_wallet`, `mem_join_spot_upgrade_wallet`, `mem_join_spot_shopping_wallet`, `mem_trx_lim`, `mem_trx_tax`, `mem_trx_shop_lim`, 
`mem_trx_shop_tax`, `mem_trx_agent_com`, `mem_trx_uw_com`, `mem_trx_upazila_com`, `mem_trx_district_com`, `mem_trx_zone_com`, `mem_trx_donation_fund`,
 `mem_trx_company_fund`, `mem_trx_account`, `mem_wit_lim`, `mem_wit_tax`, `mem_wit_agent_com`, `mem_wit_uw_com`, `mem_wit_upazila_com`, 
 `mem_wit_district_com`, `mem_wit_zone_com`, `mem_wit_donation_fund`, `mem_wit_company_fund`, `mem_wit_account`, `mem_join_spot_com`, 
 `mem_join_spot_com2`, `mem_join_spot_com3`, `mem_join_agent_com`, `mem_join_uw_com`, `mem_join_upazila_com`, `mem_join_district_com`, 
 `mem_join_zone_com`, `mem_join_donation_fund`, `mem_join_company_fund`, `mem_join_account`, `mem_matching_lim`, `mem_matching_sponsor_royalty`,
 `mem_club0`, `mem_club1`, `mem_club2`, `mem_club3`, `mem_club4`, `mem_club5`, `mem_club6`, `mem_level_up_cost`, `mem_level_up1`, `mem_level_up2`,
 `mem_level_up3`, `mem_level_up4`, `mem_level_up5`, `mem_level_up6`, `mem_level_up7`, `mem_level_up8`, `mem_level_up9`, `g1`, `g2`, `g3`, `g4`, `g5`,
 `g6`, `g7`, `g8`, `g9`, `g10`, `g11`, `g12`, `g13`, `g14`, `g15`, `sdate` FROM `setting` WHERE 1
*/			
       $sms=$_POST['sms'];
       $recharge=$_POST['recharge'];
        $mem_trx_shop_lim=$mysqli->real_escape_string($_POST['mem_trx_shop_lim']);
        $mem_trx_shop_tax=$mysqli->real_escape_string($_POST['mem_trx_shop_tax']);
        $mem_trx_agent_com=$mysqli->real_escape_string($_POST['mem_trx_agent_com']);
        $mem_trx_uw_com=$mysqli->real_escape_string($_POST['mem_trx_uw_com']);
        $mem_trx_upazila_com=$mysqli->real_escape_string($_POST['mem_trx_upazila_com']);
        $mem_trx_district_com=$mysqli->real_escape_string($_POST['mem_trx_district_com']);
        $mem_trx_zone_com=$mysqli->real_escape_string($_POST['mem_trx_zone_com']);
        $mem_trx_donation_fund=$mysqli->real_escape_string($_POST['mem_trx_donation_fund']);
        $mem_trx_company_fund=$mysqli->real_escape_string($_POST['mem_trx_company_fund']);
        $mem_trx_lim=$mysqli->real_escape_string($_POST['mem_trx_lim']);
        $mem_trx_tax=$mysqli->real_escape_string($_POST['mem_trx_tax']);
        $mem_wit_lim=$mysqli->real_escape_string($_POST['mem_wit_lim']);
        $mem_wit_tax=$mysqli->real_escape_string($_POST['mem_wit_tax']);
        $mem_wit_agent_com=$mysqli->real_escape_string($_POST['mem_wit_agent_com']);
        $mem_wit_uw_com=$mysqli->real_escape_string($_POST['mem_wit_uw_com']);
        $mem_wit_upazila_com=$mysqli->real_escape_string($_POST['mem_wit_upazila_com']);
        $mem_wit_district_com=$mysqli->real_escape_string($_POST['mem_wit_district_com']);
        $mem_wit_zone_com=$mysqli->real_escape_string($_POST['mem_wit_zone_com']);
        $mem_wit_donation_fund=$mysqli->real_escape_string($_POST['mem_wit_donation_fund']);
        $mem_wit_company_fund=$mysqli->real_escape_string($_POST['mem_wit_company_fund']);
		
        $mem_join_lim=$mysqli->real_escape_string($_POST['mem_join_lim']);
        $mem_join_spot_com=$mysqli->real_escape_string($_POST['mem_join_spot_com']);
        $mem_join_spot_com2=$mysqli->real_escape_string($_POST['mem_join_spot_com2']);
        $mem_join_spot_com3=$mysqli->real_escape_string($_POST['mem_join_spot_com3']);
        $mem_join_spot_cash_wallet=$mysqli->real_escape_string($_POST['mem_join_spot_cash_wallet']);
        $mem_join_spot_upgrade_wallet=$mysqli->real_escape_string($_POST['mem_join_spot_upgrade_wallet']);
        $mem_join_spot_shopping_wallet=$mysqli->real_escape_string($_POST['mem_join_spot_shopping_wallet']);
        $mem_join_merchant_com=$mysqli->real_escape_string($_POST['mem_join_merchant_com']);
        $mem_join_agent_com=$mysqli->real_escape_string($_POST['mem_join_agent_com']);
        $mem_join_uw_com=$mysqli->real_escape_string($_POST['mem_join_uw_com']);
        $mem_join_upazila_com=$mysqli->real_escape_string($_POST['mem_join_upazila_com']);
        $mem_join_district_com=$mysqli->real_escape_string($_POST['mem_join_district_com']);
        $mem_join_zone_com=$mysqli->real_escape_string($_POST['mem_join_zone_com']);
        $mem_join_donation_fund=$mysqli->real_escape_string($_POST['mem_join_donation_fund']);
        $mem_join_company_fund=$mysqli->real_escape_string($_POST['mem_join_company_fund']);
        $mem_matching_lim=$mysqli->real_escape_string($_POST['mem_matching_lim']);
        $mem_matching_sponsor_royalty=$mysqli->real_escape_string($_POST['mem_matching_sponsor_royalty']);
        $mem_club0=$mysqli->real_escape_string($_POST['mem_club0']);
        $mem_club1=$mysqli->real_escape_string($_POST['mem_club1']);
        $mem_club2=$mysqli->real_escape_string($_POST['mem_club2']);
        $mem_club3=$mysqli->real_escape_string($_POST['mem_club3']);
        $mem_club4=$mysqli->real_escape_string($_POST['mem_club4']);
        $mem_club5=$mysqli->real_escape_string($_POST['mem_club5']);
        $mem_club6=$mysqli->real_escape_string($_POST['mem_club6']);
        $mem_level_up_cost=$mysqli->real_escape_string($_POST['mem_level_up_cost']);
        $mem_level_up1=$mysqli->real_escape_string($_POST['mem_level_up1']);
        $mem_level_up2=$mysqli->real_escape_string($_POST['mem_level_up2']);
        $mem_level_up3=$mysqli->real_escape_string($_POST['mem_level_up3']);
        $mem_level_up4=$mysqli->real_escape_string($_POST['mem_level_up4']);
        $mem_level_up5=$mysqli->real_escape_string($_POST['mem_level_up5']);
        $mem_level_up6=$mysqli->real_escape_string($_POST['mem_level_up6']);
        $mem_level_up7=$mysqli->real_escape_string($_POST['mem_level_up7']);
        $mem_level_up8=$mysqli->real_escape_string($_POST['mem_level_up8']);
        $mem_level_up9=$mysqli->real_escape_string($_POST['mem_level_up9']);
        $g1=$mysqli->real_escape_string($_POST['g1']);
        $g2=$mysqli->real_escape_string($_POST['g2']);
        $g3=$mysqli->real_escape_string($_POST['g3']);
        $g4=$mysqli->real_escape_string($_POST['g4']);
        $g5=$mysqli->real_escape_string($_POST['g5']);
        $g6=$mysqli->real_escape_string($_POST['g6']);
        $g7=$mysqli->real_escape_string($_POST['g7']);
        $g8=$mysqli->real_escape_string($_POST['g8']);
        $g9=$mysqli->real_escape_string($_POST['g9']);
        $g10=$mysqli->real_escape_string($_POST['g10']);
        $g11=$mysqli->real_escape_string($_POST['g11']);
        $g12=$mysqli->real_escape_string($_POST['g12']);
        $g13=$mysqli->real_escape_string($_POST['g13']);
        $g14=$mysqli->real_escape_string($_POST['g14']);
        $g15=$mysqli->real_escape_string($_POST['g15']);
        $mem_prod_delivery_charge=$mysqli->real_escape_string($_POST['mem_prod_delivery_charge']);
        $mem_prod_delivery_charge1p=$mysqli->real_escape_string($_POST['mem_prod_delivery_charge1p']);
        $mem_prod_delivery_charge1=$mysqli->real_escape_string($_POST['mem_prod_delivery_charge1']);
        $mem_prod_delivery_charge2ps=$mysqli->real_escape_string($_POST['mem_prod_delivery_charge2ps']);
        $mem_prod_delivery_charge2=$mysqli->real_escape_string($_POST['mem_prod_delivery_charge2']);
		
        $mem_prod_delivery_charge3ps=$mysqli->real_escape_string($_POST['mem_prod_delivery_charge3ps']);
        $mem_prod_delivery_charge3=$mysqli->real_escape_string($_POST['mem_prod_delivery_charge3']);
		
        $mem_prod_delivery_charge_discount=$mysqli->real_escape_string($_POST['mem_prod_delivery_charge_discount']);
		
		$dpass=$mysqli->real_escape_string($_POST['password']);
		$pass=md5($dpass);
		$adm=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` WHERE `user_id`='".$memId."' and `type`=1 "));
        $pinchk=$adm->pin;
		$location="setting.php";
            
            if($dpass==''){
			$_SESSION['msg'] = "Please Enter Pin Code ";
			header("Location:$location");
			exit();
			}
			
			if($pass!=$pinchk){
			$_SESSION['msg'] = "Wrong Pin Number ";
			header("Location:$location");
			exit();
			}
		
		if(($dpass!='')&&($pass==$pinchk)){	
/*
SELECT `serial`, `user_id`, `mem_trx_lim`, `mem_trx_tax`, `mem_trx_agent_com`, `mem_wit_lim`, `mem_wit_tax`, `mem_wit_agent_com`,
`mem_join_lim`, `mem_join_spot_com`, `mem_join_spot_com2`, `mem_join_spot_com3`, `mem_join_spot_cash_wallet`, `mem_join_spot_upgrade_wallet`,
`mem_join_spot_shopping_wallet`, `mem_join_agent_com`, `mem_join_uw_com`, `mem_join_upazila_com`, `mem_join_district_com`, `mem_join_zone_com`, 
`mem_join_donation_fund`, `mem_join_company_fund`, `mem_matching_lim`, `mem_matching_sponsor_royalty`, `mem_club0`, `mem_club1`, `mem_club2`, 
`mem_club3`, `mem_club4`, `mem_club5`, `mem_club6`, `g1`, `g2`, `g3`, `g4`, `g5`, `g6`, `g7`, `g8`, `g9`, `g10`, `g11`, `g12`, `g13`, `g14`, 
`g15`, `sdate` FROM `setting` WHERE 1
*/		
		$mysqli->query("update `setting` set 
		`api_sms`='$sms', `api_recharge`='$recharge',
		`mem_wit_donation_fund`='$mem_wit_donation_fund',`mem_wit_company_fund`='$mem_wit_company_fund',
		`mem_wit_zone_com`='$mem_wit_zone_com',`mem_wit_district_com`='$mem_wit_district_com',
		`mem_wit_upazila_com`='$mem_wit_upazila_com',`mem_wit_uw_com`='$mem_wit_uw_com',`mem_wit_agent_com`='$mem_wit_agent_com',
		`mem_trx_donation_fund`='$mem_trx_donation_fund',`mem_trx_company_fund`='$mem_trx_company_fund',
		`mem_trx_zone_com`='$mem_trx_zone_com',`mem_trx_district_com`='$mem_trx_district_com',
		`mem_trx_upazila_com`='$mem_trx_upazila_com',`mem_trx_uw_com`='$mem_trx_uw_com',`mem_trx_agent_com`='$mem_trx_agent_com',
		`mem_prod_delivery_charge`='$mem_prod_delivery_charge',`mem_prod_delivery_charge_discount`='$mem_prod_delivery_charge_discount',
		`mem_prod_delivery_charge1`='$mem_prod_delivery_charge1',`mem_prod_delivery_charge2`='$mem_prod_delivery_charge2',`mem_prod_delivery_charge3`='$mem_prod_delivery_charge3',
		`mem_prod_delivery_charge1p`='$mem_prod_delivery_charge1p',`mem_prod_delivery_charge2ps`='$mem_prod_delivery_charge2ps',`mem_prod_delivery_charge3ps`='$mem_prod_delivery_charge3ps',
		`mem_trx_lim`='".$mem_trx_lim."',`mem_trx_tax`='".$mem_trx_tax."', 
		`mem_wit_lim`='".$mem_wit_lim."',`mem_wit_tax`='".$mem_wit_tax."',
		`mem_trx_shop_lim`='".$mem_trx_shop_lim."',`mem_trx_shop_tax`='".$mem_trx_shop_tax."',
		`mem_wit_agent_com`='".$mem_wit_agent_com."', 
		`mem_join_lim`='".$mem_join_lim."', 
		`mem_join_spot_com`='".$mem_join_spot_com."',`mem_join_spot_com2`='".$mem_join_spot_com2."',`mem_join_spot_com3`='".$mem_join_spot_com3."', 
		`mem_join_spot_cash_wallet`='".$mem_join_spot_cash_wallet."', 
		`mem_join_spot_upgrade_wallet`='".$mem_join_spot_upgrade_wallet."', 
		`mem_join_spot_shopping_wallet`='".$mem_join_spot_shopping_wallet."', 
		`mem_join_merchant_com`='".$mem_join_merchant_com."',`mem_join_agent_com`='".$mem_join_agent_com."',`mem_join_uw_com`='".$mem_join_uw_com."',`mem_join_upazila_com`='".$mem_join_upazila_com."',
		`mem_join_district_com`='".$mem_join_district_com."',`mem_join_zone_com`='".$mem_join_zone_com."', 
		`mem_join_donation_fund`='".$mem_join_donation_fund."',`mem_join_company_fund`='".$mem_join_company_fund."', 
		`mem_matching_lim`='".$mem_matching_lim."',`mem_matching_sponsor_royalty`='".$mem_matching_sponsor_royalty."', 
		`mem_club0`='".$mem_club0."', `mem_club1`='".$mem_club1."', `mem_club2`='".$mem_club2."', `mem_club3`='".$mem_club3."', `mem_club4`='".$mem_club4."',
		`mem_club5`='".$mem_club5."', `mem_club6`='".$mem_club6."', 
		`mem_level_up_cost`='".$mem_level_up_cost."', `mem_level_up1`='".$mem_level_up1."', `mem_level_up2`='".$mem_level_up2."', 
		`mem_level_up3`='".$mem_level_up3."', `mem_level_up4`='".$mem_level_up4."', `mem_level_up5`='".$mem_level_up5."', 
		`mem_level_up6`='".$mem_level_up6."', `mem_level_up7`='".$mem_level_up7."', `mem_level_up8`='".$mem_level_up8."', `mem_level_up9`='".$mem_level_up9."',
		`g1`='".$g1."', `g2`='".$g2."', `g3`='".$g3."', `g4`='".$g4."', `g5`='".$g5."', `g6`='".$g6."', `g7`='".$g7."', `g8`='".$g8."', `g9`='".$g9."', 
		`g10`='".$g10."', `g11`='".$g11."', `g12`='".$g12."', `g13`='".$g13."', `g14`='".$g14."',`g15`='".$g15."',`sdate`='".$date."' 
		where `user_id`='".$memId."'");
		  
		$to = "<$email>";
			$subject=$title;
			$txt = "
			You Change Your Settings:

			Settings Updated Date: $day $time $date
			
			Login Admin Panel (https://$url/admin)
			";
			$headers = "From:Settings Updated<$email>";
			mail($to,$subject,$txt,$headers);
$pro=mysqli_fetch_object($mysqli->query("SELECT * from `profile` where `user_id`='$memId' "));
$mobile=$pro->mobile;
$sms=$txt;			
require('../db/api_sms.php');
		$_SESSION['msgs']= "Settings Updated";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Failed";
		header("Location:$location");
		exit();
		}
		

	
	}
	
?>