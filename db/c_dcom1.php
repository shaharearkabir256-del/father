<?php  		
// Club Setting For One Star
			$d=strtotime("-1 Day");	$ydate=date("d-M-Y", $d);     
			$q1=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`=1 ");  
			while($res1=mysqli_fetch_object($q1)){
			$happy_club=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `stype`=1 and `upline`='".$res1->user."' and `package`=1 "));   // `stype`=1 Happy Club
			$regular_club=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `stype`=2 and `upline`='".$res1->user."' and `package`=1 ")); // `stype`=2 Regular Club
			$lucky_club=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `stype`=3 and `upline`='".$res1->user."' and `package`=1 "));   // `stype`=3 Lucky Club
			if(($happy_club==1)&&($regular_club==0)&&($lucky_club==0)){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$res1->user_id' and `package`=1 "); 
			}elseif(($happy_club>=2)&&($regular_club==0)&&($lucky_club==0)){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$res1->user_id' and `package`=1"); 
			}elseif(($regular_club==1)&&($happy_club==0)&&($lucky_club==0)){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$res1->user_id' and `package`=1"); 
			}elseif(($regular_club>=2)&&($happy_club==0)&&($lucky_club==0)){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$res1->user_id' and `package`=1 "); 
			}elseif(($lucky_club==1)&&($regular_club==0)&&($happy_club==0)){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$res1->user_id' and `package`=1 "); 
			}elseif(($lucky_club>=2)&&($regular_club==0)&&($happy_club==0)){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$res1->user_id' and `package`=1 "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$res1->user_id' and `package`=1 ");
			}  
// Upgrade To Two Star
				$balance=mysqli_fetch_object($mysqli->query("SELECT `stepup` from `balance` where `user_id`='$res1->user_id' "));
				$tree=mysqli_fetch_object($mysqli->query("SELECT * from `tree` where `user_id`='$res1->user_id' "));
					if(($balance->stepup>=$upgradewallet1)&&($tree->package==1)){
						$stepupbal=$upgradewallet1;
						$packageupto=2;
						$chkstepup=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
						if($chkstepup==0){ 
							$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$stepupbal','$packageupto','".$date."')");
							$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
							$commission=($plan1*$setting->mem_join_spot_com/100);
							$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
							$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
							$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
	$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
	VALUES ('".$tree->user_id."','".$plan1."','".$sptCom."','".$tree->sponsor."','".$stpCom."','".$tree->upline."','".$shopping."','".$ydate."')");
						}
					}elseif(($balance->stepup>=$upgradewallet2)&&($tree->package==2)){
						$stepupbal=$upgradewallet2;
						$packageupto=3;
						$chkstepup=mysqli_num_rows($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
						if($chkstepup==0){ 
							$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$stepupbal','$packageupto','".$date."')");
							$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
							$commission=($stepupbal*$setting->mem_join_spot_com/100);
							$sptCom=($commission*$setting->mem_join_spot_cash_wallet/100);
							$stpCom=($commission*$setting->mem_join_spot_upgrade_wallet/100);
							$shopping=($commission*$setting->mem_join_spot_shopping_wallet/100);
	$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`,`package`, `date`) 
	VALUES ('".$tree->user_id."','".$stepupbal."','".$sptCom."','".$tree->sponsor."','".$stpCom."','".$tree->upline."','".$shopping."','".$packageupto."','".$ydate."')");
						}
					}
					else{		}
			}
?>
<?php		
// Comission Distribution For One Star	
			$club0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`=1 ")); //get: 0=Not Count; 1=Count
			$club1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=1 "));
			$club2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=1 "));
			$club3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=1 "));
			$club4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=1 "));
			$club5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=1 "));
			$club6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=1 "));
			$tmem=$club0+$club1+$club2+$club3+$club4+$club5+$club6;
// happy Club
$happy=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `club`<3 and `date`='".$ydate."' and `chkdate`!='".$date."' "));
// Regular Club
$regular=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `club`>2 and `club`<5 and `date`='".$ydate."' and `chkdate`!='".$date."' "));
// Lucky Club
$lucky=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `club`>4 and `club`<7 and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$q2=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`=1 "); //get: 0=Not Get Com; 1=Get Com
while($res2=mysqli_fetch_object($q2)){
    if($res2->get>0){
	//$invest=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `club`<3 and `date`='".$ydate."' and `chkdate`!='".$date."' ")); 
	//$invest1=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `club`>2 and `date`='".$ydate."' and `chkdate`!='".$date."' "));
	$chkdailycom=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$res2->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($res2->club==0){
				$totalcom0=($happy->totalsales*$setting->mem_club0/100);
				$comclub0=($totalcom0/$club0);
				if(($chkdailycom==0)&&($comclub0>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub0','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==1){
				$totalcom1=($happy->totalsales*$setting->mem_club1/100);
				$comclub1=($totalcom1/$club1);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub1','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==2){ 
			$totalcom2=($happy->totalsales*$setting->mem_club2/100);
			$comclub2=($totalcom2/$club2);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub2','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==3){
			$totalcom3=($regular->totalsales*$setting->mem_club3/100);
			$comclub3=($totalcom3/$club3);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub3','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==4){
			$totalcom4=($regular->totalsales*$setting->mem_club4/100);
			$comclub4=($totalcom4/$club4);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub4','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==5){
			$totalcom5=($lucky->totalsales*$setting->mem_club5/100);
			$comclub5=($totalcom5/$club5);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub5','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==6){
			$totalcom6=($lucky->totalsales*$setting->mem_club6/100);
			$comclub6=($totalcom6/$club6);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub6','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}else{
				//echo "null <br>";
			}
			
        	$get2=$res2->get-1;
            $mysqli->query("update `tree` set `get`='".$get2."' where `user_id`='$res2->user_id' and `package`=1 and `get`>0 ");
		}else{
			$bal1=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$res2->user_id' "));
    		if($bal1->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$res2->user_id','1','$res2->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$res2->user_id' and `package`=1 and `get`=0 "); 
    		}
		}
}
// For Accounts Report
			$exinvest=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`=1 and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=10 and `cdate`='".$date."' "));
			$mem_club_all=($setting->mem_club0+$setting->mem_club1+$setting->mem_club2+$setting->mem_club3+$setting->mem_club4+$setting->mem_club5+$setting->mem_club6);
			$extotalsales=($invest->totalsales*$mem_club_all/100);
			$extotal=($extotalsales)-($exinvest->examount);
			If($exinvestchk==0 && $extotal>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`,`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales','$tmem','0','1547287135','$extotal','10','".$date."','".$time."','".$day."' )");
			}
			$mysqli->query("update `invest` set `chkdate`='".$date."' ");
?>
<?php				
// Club Setting For Two Star

		$p2=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`=2 ");  
		while($pares=mysqli_fetch_object($p2)){
			$club2=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$pares->user."' and `package`=2 "));
			if($club2==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$pares->user_id' and `package`=2 "); 
			}elseif($club2==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$pares->user_id' and `package`=2"); 
			}elseif($club2==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$pares->user_id' and `package`=2"); 
			}elseif($club2==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$pares->user_id' and `package`=2 "); 
			}elseif($club2==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$pares->user_id' and `package`=2 "); 
			}elseif($club2>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$pares->user_id' and `package`=2 "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares->user_id' and `package`=2 ");
			}

		}
// Comission Distribution For Two Star	
			$clubpa0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='0' and `package`=2 "));
			$clubpa1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=2 "));
			$clubpa2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=2 "));
			$clubpa3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=2 "));
			$clubpa4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=2 "));
			$clubpa5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=2 "));
			$clubpa6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=2 "));
			$tmem2=$clubpa0+$clubpa1+$clubpa2+$clubpa3+$clubpa4+$clubpa5+$clubpa6;
	$d=strtotime("-1 Day");
	$ydate=date("d-M-Y", $d);		
	$invest2=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`=2 and `date`='".$ydate."' and `chkdate`!='".$date."' "));
$qp2=$mysqli->query("SELECT `get`,`user_id`,`club` from `tree` where `package`=2 "); 
	while($pares2=mysqli_fetch_object($qp2)){
	    if($pares2->get>0){
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares2->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares2->club==0){
				$totalcom2=($invest2->totalsales*$setting->mem_club0/100);
				$comclub2=($totalcom2/$clubpa0);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==1){
				$totalcom2=($invest2->totalsales*$setting->mem_club1/100);
				$comclub2=($totalcom2/$clubpa1);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==2){ 
			$totalcom2=($invest2->totalsales*$setting->mem_club2/100);
			$comclub2=($totalcom2/$clubpa2);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==3){
			$totalcom2=($invest2->totalsales*$setting->mem_club3/100);
			$comclub2=($totalcom2/$clubpa3);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==4){
			$totalcom2=($invest2->totalsales*$setting->mem_club4/100);
			$comclub2=($totalcom2/$clubpa4);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}elseif($pares2->club==5){
			$totalcom2=($invest2->totalsales*$setting->mem_club5/100);
			$comclub2=($totalcom2/$clubpa5);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");	
				}
			}elseif($pares2->club==6){
			$totalcom2=($invest2->totalsales*$setting->mem_club6/100);
			$comclub2=($totalcom2/$clubpa6);
				if(($chkdailycom2==0)&&($comclub2>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `package`, `cdate`, `ctime`, `cday`) VALUES ('$pares2->user_id','$comclub2','$pares2->club','2','".$date."','".$time."','".$day."' )");
				}
			}else{
			}
	$paget2=$pares2->get-1;
    $mysqli->query("update `tree` set `get`='".$paget2."' where `user_id`='$pares2->user_id' and `package`=2 and `get`>0 ");
    
		}else{
		    $bal2=mysqli_fetch_object($mysqli->query("SELECT `shopping` from `balance` where `user_id`='$pares2->user_id' "));
    		if($bal2->shopping>=1){
            $mysqli->query("INSERT INTO `pp`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`)
            VALUES ('$pares2->user_id','1','$pares2->club','".$date."','".$time."','".$day."' )");
            $mysqli->query("update `tree` set `get`='1' where `user_id`='$pares2->user_id' and `package`=2 and `get`=0 "); 
    		}
		}
}				
			$exinvest2=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `examount` from `comdaily` where `package`=2` and `type`=1 and `cdate`='".$date."' "));
			$exinvestchk2=mysqli_num_rows($mysqli->query("SELECT * from `comdaily` where `user_id`='1547287135' and `type`=0 and `club`=20 and `cdate`='".$date."' "));
			$extotalsales2=$invest2->totalsales*$mem_club_all/100;
			$extotal2=$extotalsales2-$exinvest2->examount;
			If($exinvestchk2==0 && $extotal2>0){
			$mysqli->query("INSERT INTO `comdaily`(`tamnt`, `tmem`, `type`, `user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$extotalsales2','$tmem2','0','1547287135','$extotal2','20','".$date."','".$time."','".$day."' )");
			}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`=2 "); 

?>