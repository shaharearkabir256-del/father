<?php  		
/* session_start();	
	$_SESSION['token']='ab12345gh';	
	require 'db.php'; */
	global $mysqli;
// Club Setting For One Star
	$q1=$mysqli->query("SELECT * from `tree` ");  
	while($res1=mysqli_fetch_object($q1)){
	
		// Upgrade Two Star - Ten Star
		$balance=mysqli_fetch_object($mysqli->query("SELECT * from `balance` where `user_id`='$res1->user_id' "));
	
		if($res1->package==1 && $balance->stepup>=$upgradewallet1){
			$stepupbal=$upgradewallet1-$level_update_cost;
			$packageupto=2;
			$chkstepup2=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup2==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet1','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		}
		if($res1->package==2 && $balance->stepup>=$upgradewallet2){
			$stepupbal=$upgradewallet2-$level_update_cost;
			$packageupto=3;
			$chkstepup3=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup3==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet2','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		}
		if($res1->package==3 && $balance->stepup>=$upgradewallet3){
			$stepupbal=$upgradewallet3-$level_update_cost;
			$packageupto=4;
			$chkstepup4=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup4==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet3','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		}
	 	if($res1->package==4 && $balance->stepup>=$upgradewallet4){
			$stepupbal=$upgradewallet4-$level_update_cost;
			$packageupto=5;
			$chkstepup5=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup5==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet4','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		}
		if($res1->package==5 && $balance->stepup>=$upgradewallet5){
			$stepupbal=$upgradewallet5-$level_update_cost;
			$packageupto=6;
			$chkstepup6=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup6==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet5','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		}
		if($res1->package==6 && $balance->stepup>=$upgradewallet6){
			$stepupbal=$upgradewallet6-$level_update_cost;
			$packageupto=7;
			$chkstepup7=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup7==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet6','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		}
		if($res1->package==7 && $balance->stepup>=$upgradewallet7){
			$stepupbal=$upgradewallet7-$level_update_cost;
			$packageupto=8;
			$chkstepup8=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup8==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet7','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		}
		if($res1->package==8 && $balance->stepup>=$upgradewallet8){
			$stepupbal=$upgradewallet8-$level_update_cost;
			$packageupto=9;
			$chkstepup9=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup9==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet8','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		}
		if($res1->package==9 && $balance->stepup>=$upgradewallet9){
			$stepupbal=$upgradewallet9-$level_update_cost;
			$packageupto=10;
			$chkstepup10=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
			if($chkstepup10==0){ 
				$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$upgradewallet9','$packageupto','".$date."')");
				$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
				$commission=($stepupbal*$setting->mem_join_spot_com/100);
				$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
				$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
				$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
				$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
				VALUES ('".$res1->user_id."','".$stepupbal."','".$sptCom."','".$res1->sponsor."','".$stpCom."','".$res1->upline."','".$shopping."','".$ydate."')");
			}
		} 
	}
?>
<?php		
// Comission Distribution For One Star	
	$s=1;
	$b=2;
	$g=5;
	$d=10;
	
	$silver0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`=1 and `plan`=1 "));
	$bronze0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`=1 and `plan`=2 "));
	$gold0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`=1 and `plan`=5 "));
	$diamond0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`=1 and `plan`=10 "));
	$st0=($silver0*$s);	$bt0=($bronze0*$b);	$gt0=($gold0*$g); $dt0=($diamond0*$d); $plan0=($st0+$bt0+$gt0+$dt0);
	
	$silver1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=1 and `plan`=1 "));
	$bronze1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=1 and `plan`=2 "));
	$gold1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=1 and `plan`=5 "));
	$diamond1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=1 and `plan`=10 "));
	$st1=($silver1*$s);	$bt1=($bronze1*$b);	$gt1=($gold1*$g); $dt1=($diamond1*$d); $plan1=($st1+$bt1+$gt1+$dt1);
	
	$silver2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=1 and `plan`=1 "));
	$bronze2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=1 and `plan`=2 "));
	$gold2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=1 and `plan`=5 "));
	$diamond2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=1 and `plan`=10 "));
	$st2=($silver2*$s);	$bt2=($bronze2*$b);	$gt2=($gold2*$g); $dt2=($diamond2*$d); $plan2=($st2+$bt2+$gt2+$dt2);
	
	$silver3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=1 and `plan`=1 "));
	$bronze3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=1 and `plan`=2 "));
	$gold3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=1 and `plan`=5 "));
	$diamond3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=1 and `plan`=10 "));
	$st3=($silver3*$s);	$bt3=($bronze3*$b);	$gt3=($gold3*$g); $dt3=($diamond3*$d); $plan3=($st3+$bt3+$gt3+$dt3);
	
	$silver4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=1 and `plan`=1 "));
	$bronze4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=1 and `plan`=2 "));
	$gold4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=1 and `plan`=5 "));
	$diamond4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=1 and `plan`=10 "));
	$st4=($silver4*$s);	$bt4=($bronze4*$b);	$gt4=($gold4*$g); $dt4=($diamond4*$d); $plan4=($st4+$bt4+$gt4+$dt4);
	
	$silver5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=1 and `plan`=1 "));
	$bronze5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=1 and `plan`=2 "));
	$gold5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=1 and `plan`=5 "));
	$diamond5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=1 and `plan`=10 "));
	$st5=($silver5*$s);	$bt5=($bronze5*$b);	$gt5=($gold5*$g); $dt5=($diamond5*$d); $plan5=($st5+$bt5+$gt5+$dt5);
	
	$silver6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=1 and `plan`=1 "));
	$bronze6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=1 and `plan`=2 "));
	$gold6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=1 and `plan`=5 "));
	$diamond6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=1 and `plan`=10 "));
	$st6=($silver6*$s);	$bt6=($bronze6*$b);	$gt6=($gold6*$g); $dt6=($diamond6*$d); $plan6=($st6+$bt6+$gt6+$dt6);
	
	$club0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`=1 "));
	$club1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=1 "));
	$club2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=1 "));
	$club3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=1 "));
	$club4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=1 "));
	$club5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=1 "));
	$club6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=1 "));
	$tmem=($club0+$club1+$club2+$club3+$club4+$club5+$club6);
	
	$happy=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `club`<3 and `date`='".$ydate."' and `chkdate`!='".$date."' ")); 			
  $regular=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `club`>2 and `club`<5 and `date`='".$ydate."' and `chkdate`!='".$date."' "));
	$lucky=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `club`>4 and `date`='".$ydate."' and `chkdate`!='".$date."' "));
	
	$q2=$mysqli->query("SELECT `plan`,`expdate`,`get`,`user_id`,`club` from `tree` where `package`=1 "); //get: 0=Not Get Com; 1=Get Com
	while($res2=mysqli_fetch_object($q2)){
		if($res2->get>0){
			$chkdailycom=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$res2->user_id' and `cdate`='".$date."' "));	
			$msg="Daily Comission";	
			if($res2->club==0){
				$memberclub0=($happy->totalsales+$regular->totalsales+$lucky->totalsales);
				$totalcom0=($memberclub0*$setting->mem_club0/100);
				$comclub0=($totalcom0/$plan0);
				if(($chkdailycom==0)&&($comclub0>0)){
					$complan0=($comclub0*$res2->plan);
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `plan`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$res2->plan','$complan0','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==1){
				$totalcom1=($happy->totalsales*$setting->mem_club1/100);
				$comclub1=($totalcom1/$plan1);
				if(($chkdailycom==0)&&($comclub1>0)){
					$complan1=($comclub1*$res2->plan);
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$complan1','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==2){ 
			$totalcom2=($happy->totalsales*$setting->mem_club2/100);
			$comclub2=($totalcom2/$plan2);
				if(($chkdailycom==0)&&($comclub2>0)){
					$complan2=($comclub2*$res2->plan);
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$complan2','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==3){
			$totalcom3=($regular->totalsales*$setting->mem_club3/100);
			$comclub3=($totalcom3/$plan3);
				if(($chkdailycom==0)&&($comclub3>0)){
					$complan3=($comclub3*$res2->plan);
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$complan3','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==4){
			$totalcom4=($regular->totalsales*$setting->mem_club4/100);
			$comclub4=($totalcom4/$plan4);
				if(($chkdailycom==0)&&($comclub4>0)){
					$complan4=($comclub4*$res2->plan);
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$complan4','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==5){
			$totalcom5=($lucky->totalsales*$setting->mem_club5/100);
			$comclub5=($totalcom5/$plan5);
				if(($chkdailycom==0)&&($comclub5>0)){
					$complan5=($comclub5*$res2->plan);
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$complan5','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==6){
			$totalcom6=($lucky->totalsales*$setting->mem_club6/100);
			$comclub6=($totalcom6/$plan6);
				if(($chkdailycom==0)&&($comclub6>0)){
					$complan6=($comclub6*$res2->plan);
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$complan6','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}
			
        	$get2=($res2->get-1);
            $mysqli->query("update `tree` set `get`='".$get2."' where `user_id`='$res2->user_id' and get>0 ");
		
		}else{
			$bal1=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$res2->user_id' "));
    		if($bal1->shopping>=1){
				$mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
				VALUES ('$res2->user_id','1','$res2->club','".$date."','".$time."','".$day."' )");
				$mysqli->query("update `tree` set `get`='1' where `user_id`='$res2->user_id' and `package`=1 and `get`=0 "); 
    		}
		}

}
	$exinvest=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`=1 and `type`=1 and `cdate`='".$date."' "));
	$exinvestchk=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=10 and `cdate`='".$date."' "));
	$mem_club_all=($setting->mem_club0+$setting->mem_club1+$setting->mem_club2+$setting->mem_club3+$setting->mem_club4+$setting->mem_club5+$setting->mem_club6);
	$extotalsales=$invest->totalsales*$mem_club_all/100;
	$extotal=$extotalsales-$exinvest->examount;
	If($exinvestchk==0 && $extotal>0){
		$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`,`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)VALUES ('$extotalsales','$tmem','0','1547287135','$extotal','10','".$date."','".$time."','".$day."' )");
	}
	$q=$mysqli->query("SELECT `expdate`,`user_id` from `tree` ");
	while($res=mysqli_fetch_object($q)){
	$expdate=($res->expdate-1);
	$mysqli->query("update `tree` set `expdate`='".$expdate."' where `user_id`='$res->user_id' and expdate>0 ");
	}
	$mysqli->query("update `invest` set `chkdate`='".$date."' ");
?>
<?php				
// Club Setting For Two Star
		$package=2;
		 $p2=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`=2 ");  
		while($pares=mysqli_fetch_object($p2)){
			$club2=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares->user."' and `package`='$package' "));
			if($club2==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares->user_id' and `package`='$package' "); 
			}elseif($club2==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares->user_id' and `package`='$package' "); 
			}elseif($club2==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares->user_id' and `package`='$package' "); 
			}elseif($club2==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares->user_id' and `package`='$package' "); 
			}elseif($club2==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares->user_id' and `package`='$package' "); 
			}elseif($club2>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Two Star	
			$clubpa0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem2=$clubpa0+$clubpa1+$clubpa2+$clubpa3+$clubpa4+$clubpa5+$clubpa6;
		
	$invest2=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp2=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares2=mysqli_fetch_object($qp2)){
	    if($pares2->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares2->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares2->club==0){
				$totalcom2=($invest2->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa0);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==1){
				$totalcom2=($invest2->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa1);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==2){ 
			$totalcom2=($invest2->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa2);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==3){
			$totalcom2=($invest2->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa3);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==4){
			$totalcom2=($invest2->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa4);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==5){
			$totalcom2=($invest2->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa5);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares2->club==6){
			$totalcom2=($invest2->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa6);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget2=$pares2->get-1;
    $mysqli->query("update `tree` set `get`='".$paget2."' where `user_id`='$pares2->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal2=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares2->user_id' "));
    		if($bal2->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares2->user_id','1','$pares2->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares2->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest2=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk2=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=20 and `cdate`='".$date."' "));
			$extotalsales2=$invest2->totalsales*57/100;
			$extotal2=$extotalsales2-$exinvest2->examount;
			If($exinvestchk2==0 && $extotal2>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales2','$tmem2','0','1547287135','$extotal2','20','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>
<?php				
// Club Setting For Three Star
		$package=3;
		 $p3=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`='$package' ");  
		while($pares31=mysqli_fetch_object($p3)){
			$club3=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares31->user."' and `package`='$package' "));
			if($club3==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares31->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Three Star	
			$clubpa03=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa13=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa23=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa33=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa43=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa53=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa63=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem3=$clubpa03+$clubpa13+$clubpa23+$clubpa33+$clubpa43+$clubpa53+$clubpa63;
		
	$invest3=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp3=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares32=mysqli_fetch_object($qp3)){
	    if($pares32->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares32->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares32->club==0){
				$totalcom2=($invest3->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa03);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==1){
				$totalcom2=($invest3->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa13);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==2){ 
			$totalcom2=($invest3->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa23);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==3){
			$totalcom2=($invest3->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa33);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==4){
			$totalcom2=($invest3->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa43);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==5){
			$totalcom2=($invest3->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa53);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares32->club==6){
			$totalcom2=($invest3->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa63);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget3=$pares32->get-1;
    $mysqli->query("update `tree` set `get`='".$paget3."' where `user_id`='$pares32->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal3=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares32->user_id' "));
    		if($bal3->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares32->user_id','1','$pares32->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares32->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest3=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk3=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=30 and `cdate`='".$date."' "));
			$extotalsales3=$invest3->totalsales*57/100;
			$extotal3=$extotalsales3-$exinvest3->examount;
			If($exinvestchk3==0 && $extotal3>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales3','$tmem3','0','1547287135','$extotal3','30','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>
<?php				
// Club Setting For Three Star
		$package=4;
		 $p3=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`='$package' ");  
		while($pares31=mysqli_fetch_object($p3)){
			$club3=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares31->user."' and `package`='$package' "));
			if($club3==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares31->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Three Star	
			$clubpa03=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa13=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa23=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa33=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa43=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa53=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa63=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem3=$clubpa03+$clubpa13+$clubpa23+$clubpa33+$clubpa43+$clubpa53+$clubpa63;
		
	$invest3=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp3=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares32=mysqli_fetch_object($qp3)){
	    if($pares32->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares32->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares32->club==0){
				$totalcom2=($invest3->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa03);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==1){
				$totalcom2=($invest3->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa13);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==2){ 
			$totalcom2=($invest3->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa23);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==3){
			$totalcom2=($invest3->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa33);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==4){
			$totalcom2=($invest3->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa43);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==5){
			$totalcom2=($invest3->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa53);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares32->club==6){
			$totalcom2=($invest3->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa63);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget3=$pares32->get-1;
    $mysqli->query("update `tree` set `get`='".$paget3."' where `user_id`='$pares32->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal3=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares32->user_id' "));
    		if($bal3->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares32->user_id','1','$pares32->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares32->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest3=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk3=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=30 and `cdate`='".$date."' "));
			$extotalsales3=$invest3->totalsales*57/100;
			$extotal3=$extotalsales3-$exinvest3->examount;
			If($exinvestchk3==0 && $extotal3>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales3','$tmem3','0','1547287135','$extotal3','30','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>
<?php				
// Club Setting For Three Star
		$package=5;
		 $p3=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`='$package' ");  
		while($pares31=mysqli_fetch_object($p3)){
			$club3=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares31->user."' and `package`='$package' "));
			if($club3==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares31->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Three Star	
			$clubpa03=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa13=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa23=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa33=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa43=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa53=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa63=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem3=$clubpa03+$clubpa13+$clubpa23+$clubpa33+$clubpa43+$clubpa53+$clubpa63;
		
	$invest3=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp3=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares32=mysqli_fetch_object($qp3)){
	    if($pares32->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares32->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares32->club==0){
				$totalcom2=($invest3->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa03);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==1){
				$totalcom2=($invest3->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa13);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==2){ 
			$totalcom2=($invest3->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa23);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==3){
			$totalcom2=($invest3->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa33);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==4){
			$totalcom2=($invest3->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa43);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==5){
			$totalcom2=($invest3->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa53);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares32->club==6){
			$totalcom2=($invest3->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa63);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget3=$pares32->get-1;
    $mysqli->query("update `tree` set `get`='".$paget3."' where `user_id`='$pares32->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal3=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares32->user_id' "));
    		if($bal3->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares32->user_id','1','$pares32->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares32->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest3=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk3=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=30 and `cdate`='".$date."' "));
			$extotalsales3=$invest3->totalsales*57/100;
			$extotal3=$extotalsales3-$exinvest3->examount;
			If($exinvestchk3==0 && $extotal3>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales3','$tmem3','0','1547287135','$extotal3','30','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>
<?php				
// Club Setting For Six Star
		$package=6;
		 $p3=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`='$package' ");  
		while($pares31=mysqli_fetch_object($p3)){
			$club3=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares31->user."' and `package`='$package' "));
			if($club3==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares31->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Six Star	
			$clubpa03=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa13=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa23=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa33=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa43=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa53=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa63=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem3=$clubpa03+$clubpa13+$clubpa23+$clubpa33+$clubpa43+$clubpa53+$clubpa63;
		
	$invest3=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp3=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares32=mysqli_fetch_object($qp3)){
	    if($pares32->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares32->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares32->club==0){
				$totalcom2=($invest3->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa03);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==1){
				$totalcom2=($invest3->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa13);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==2){ 
			$totalcom2=($invest3->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa23);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==3){
			$totalcom2=($invest3->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa33);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==4){
			$totalcom2=($invest3->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa43);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==5){
			$totalcom2=($invest3->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa53);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares32->club==6){
			$totalcom2=($invest3->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa63);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget3=$pares32->get-1;
    $mysqli->query("update `tree` set `get`='".$paget3."' where `user_id`='$pares32->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal3=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares32->user_id' "));
    		if($bal3->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares32->user_id','1','$pares32->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares32->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest3=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk3=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=30 and `cdate`='".$date."' "));
			$extotalsales3=$invest3->totalsales*57/100;
			$extotal3=$extotalsales3-$exinvest3->examount;
			If($exinvestchk3==0 && $extotal3>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales3','$tmem3','0','1547287135','$extotal3','30','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>
<?php				
// Club Setting For Three Star
		$package=7;
		 $p3=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`='$package' ");  
		while($pares31=mysqli_fetch_object($p3)){
			$club3=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares31->user."' and `package`='$package' "));
			if($club3==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares31->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Three Star	
			$clubpa03=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa13=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa23=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa33=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa43=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa53=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa63=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem3=$clubpa03+$clubpa13+$clubpa23+$clubpa33+$clubpa43+$clubpa53+$clubpa63;
		
	$invest3=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp3=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares32=mysqli_fetch_object($qp3)){
	    if($pares32->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares32->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares32->club==0){
				$totalcom2=($invest3->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa03);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==1){
				$totalcom2=($invest3->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa13);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==2){ 
			$totalcom2=($invest3->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa23);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==3){
			$totalcom2=($invest3->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa33);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==4){
			$totalcom2=($invest3->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa43);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==5){
			$totalcom2=($invest3->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa53);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares32->club==6){
			$totalcom2=($invest3->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa63);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget3=$pares32->get-1;
    $mysqli->query("update `tree` set `get`='".$paget3."' where `user_id`='$pares32->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal3=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares32->user_id' "));
    		if($bal3->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares32->user_id','1','$pares32->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares32->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest3=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk3=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=30 and `cdate`='".$date."' "));
			$extotalsales3=$invest3->totalsales*57/100;
			$extotal3=$extotalsales3-$exinvest3->examount;
			If($exinvestchk3==0 && $extotal3>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales3','$tmem3','0','1547287135','$extotal3','30','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>
<?php				
// Club Setting For Three Star
		$package=8;
		 $p3=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`='$package' ");  
		while($pares31=mysqli_fetch_object($p3)){
			$club3=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares31->user."' and `package`='$package' "));
			if($club3==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares31->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Three Star	
			$clubpa03=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa13=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa23=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa33=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa43=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa53=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa63=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem3=$clubpa03+$clubpa13+$clubpa23+$clubpa33+$clubpa43+$clubpa53+$clubpa63;
		
	$invest3=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp3=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares32=mysqli_fetch_object($qp3)){
	    if($pares32->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares32->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares32->club==0){
				$totalcom2=($invest3->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa03);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==1){
				$totalcom2=($invest3->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa13);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==2){ 
			$totalcom2=($invest3->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa23);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==3){
			$totalcom2=($invest3->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa33);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==4){
			$totalcom2=($invest3->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa43);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==5){
			$totalcom2=($invest3->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa53);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares32->club==6){
			$totalcom2=($invest3->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa63);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget3=$pares32->get-1;
    $mysqli->query("update `tree` set `get`='".$paget3."' where `user_id`='$pares32->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal3=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares32->user_id' "));
    		if($bal3->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares32->user_id','1','$pares32->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares32->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest3=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk3=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=30 and `cdate`='".$date."' "));
			$extotalsales3=$invest3->totalsales*57/100;
			$extotal3=$extotalsales3-$exinvest3->examount;
			If($exinvestchk3==0 && $extotal3>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales3','$tmem3','0','1547287135','$extotal3','30','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>
<?php				
// Club Setting For Three Star
		$package=9;
		 $p3=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`='$package' ");  
		while($pares31=mysqli_fetch_object($p3)){
			$club3=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares31->user."' and `package`='$package' "));
			if($club3==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares31->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Three Star	
			$clubpa03=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa13=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa23=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa33=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa43=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa53=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa63=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem3=$clubpa03+$clubpa13+$clubpa23+$clubpa33+$clubpa43+$clubpa53+$clubpa63;
		
	$invest3=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp3=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares32=mysqli_fetch_object($qp3)){
	    if($pares32->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares32->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares32->club==0){
				$totalcom2=($invest3->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa03);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==1){
				$totalcom2=($invest3->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa13);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==2){ 
			$totalcom2=($invest3->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa23);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==3){
			$totalcom2=($invest3->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa33);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==4){
			$totalcom2=($invest3->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa43);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==5){
			$totalcom2=($invest3->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa53);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares32->club==6){
			$totalcom2=($invest3->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa63);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget3=$pares32->get-1;
    $mysqli->query("update `tree` set `get`='".$paget3."' where `user_id`='$pares32->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal3=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares32->user_id' "));
    		if($bal3->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares32->user_id','1','$pares32->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares32->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest3=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk3=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=30 and `cdate`='".$date."' "));
			$extotalsales3=$invest3->totalsales*57/100;
			$extotal3=$extotalsales3-$exinvest3->examount;
			If($exinvestchk3==0 && $extotal3>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales3','$tmem3','0','1547287135','$extotal3','30','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>
<?php				
// Club Setting For Three Star
		$package=10;
		 $p3=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`='$package' ");  
		while($pares31=mysqli_fetch_object($p3)){
			$club3=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares31->user."' and `package`='$package' "));
			if($club3==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}elseif($club3>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares31->user_id' and `package`='$package' "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares31->user_id' and `package`='$package' ");
			}

		}
// Comission Distribution For Three Star	
			$clubpa03=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`='$package' "));
			$clubpa13=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`='$package' "));
			$clubpa23=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`='$package' "));
			$clubpa33=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`='$package' "));
			$clubpa43=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`='$package' "));
			$clubpa53=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`='$package' "));
			$clubpa63=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`='$package' "));
			$tmem3=$clubpa03+$clubpa13+$clubpa23+$clubpa33+$clubpa43+$clubpa53+$clubpa63;
		
	$invest3=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`='$package' and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp3=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`='$package' "); 
	while($pares32=mysqli_fetch_object($qp3)){
	    if($pares32->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares32->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares32->club==0){
				$totalcom2=($invest3->totalsales*2/100);
				$comclub2=($totalcom2/$clubpa03);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==1){
				$totalcom2=($invest3->totalsales*5/100);
				$comclub2=($totalcom2/$clubpa13);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==2){ 
			$totalcom2=($invest3->totalsales*6/100);
			$comclub2=($totalcom2/$clubpa23);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==3){
			$totalcom2=($invest3->totalsales*7/100);
			$comclub2=($totalcom2/$clubpa33);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==4){
			$totalcom2=($invest3->totalsales*8/100);
			$comclub2=($totalcom2/$clubpa43);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares32->club==5){
			$totalcom2=($invest3->totalsales*9/100);
			$comclub2=($totalcom2/$clubpa53);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares32->club==6){
			$totalcom2=($invest3->totalsales*20/100);
			$comclub2=($totalcom2/$clubpa63);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares32->user_id','$comclub2','$pares32->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget3=$pares32->get-1;
    $mysqli->query("update `tree` set `get`='".$paget3."' where `user_id`='$pares32->user_id' and `package`='$package' and `get`>0 ");
    
		}else{
		    $bal3=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares32->user_id' "));
    		if($bal3->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares32->user_id','1','$pares32->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares32->user_id' and `package`='$package' and `get`=0 "); 
    		}
		}
}				
			$exinvest3=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`='$package'` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk3=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=30 and `cdate`='".$date."' "));
			$extotalsales3=$invest3->totalsales*57/100;
			$extotal3=$extotalsales3-$exinvest3->examount;
			If($exinvestchk3==0 && $extotal3>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales3','$tmem3','0','1547287135','$extotal3','30','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`='$package' ");

?>