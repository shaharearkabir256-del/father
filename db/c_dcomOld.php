<?php  		$d=strtotime("-1 Day");	$ydate=date("d-M-Y", $d);     
			$q1=$mysqli->query("SELECT `user_id`,`user` from `tree` where `package`=1 ");  
			while($res1=mysqli_fetch_object($q1)){
			$club=mysqli_num_rows($mysqli->query("SELECT * from `tree` where `upline`='".$res1->user."' and `package`=1 "));
			if($club==1){
				$mysqli->query("update `tree` set `club`='1' where `user_id`='$res1->user_id' and `package`=1 "); 
			}elseif($club==2){ 
				$mysqli->query("update `tree` set `club`='2' where `user_id`='$res1->user_id' and `package`=1"); 
			}elseif($club==3){
				$mysqli->query("update `tree` set `club`='3' where `user_id`='$res1->user_id' and `package`=1"); 
			}elseif($club==4){
				$mysqli->query("update `tree` set `club`='4' where `user_id`='$res1->user_id' and `package`=1 "); 
			}elseif($club==5){
				$mysqli->query("update `tree` set `club`='5' where `user_id`='$res1->user_id' and `package`=1 "); 
			}elseif($club>=6){
				$mysqli->query("update `tree` set `club`='6' where `user_id`='$res1->user_id' and `package`=1 "); 
			}else{
				$mysqli->query("update `tree` set `club`='0' where `user_id`='$pares->user_id' and `package`=1 ");
			}  
// Upgrade To Two Star
				$balance=mysqli_fetch_object($mysqli->query("SELECT `stepup` from `balance` where `user_id`='$res1->user_id' "));
				$tree=mysqli_fetch_object($mysqli->query("SELECT * from `tree` where `user_id`='$res1->user_id' "));
					if(($balance->stepup>=25)&&($tree->package==1)){
						$stepupbal=25;
						$packageupto=2;
						$chkstepup=mysqli_fetch_object($mysqli->query("SELECT * from `stepup` where `user_id`='$res1->user_id' and `package`='$packageupto' "));
						if($chkstepup==0){ 
							$mysqli->query("INSERT INTO `stepup`(`user_id`, `user`, `amnt`, `package`, `sdate`) VALUES('$res1->user_id','".$res1->user."','$stepupbal','$packageupto','".$date."')");
							$mysqli->query("update `tree` set `club`='0', `package`='$packageupto' where `user_id`='$res1->user_id'");
							$commission=($stepupbal*10/100);
							$sptCom=($commission*80/100);
							$stpCom=($commission*10/100);
							$shopping=($commission*10/100);
	$mysqli->query("INSERT INTO `invest2`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`) 
	VALUES ('".$tree->user_id."','".$stepupbal."','".$sptCom."','".$tree->sponsor."','".$stpCom."','".$tree->upline."','".$shopping."','".$ydate."')");
						}
					}else{		}
			}
?>
<?php			
			$club1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=1 "));
			$club2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=1 "));
			$club3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=1 "));
			$club4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=1 "));
			$club5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=1 "));
			$club6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=1 "));
			
	$q2=$mysqli->query("SELECT `user_id`,`club` from `tree` where `package`=1  "); 
	while($res2=mysqli_fetch_object($q2)){
			$invest=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `date`='".$ydate."' and `chkdate`!='".$date."' ")); 
	$chkdailycom=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$res2->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($res2->club==1){
				$totalcom1=($invest->totalsales*5/100);
				$comclub1=($totalcom1/$club1);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub1','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==2){ 
			$totalcom1=($invest->totalsales*6/100);
			$comclub1=($totalcom1/$club2);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub1','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==3){
			$totalcom1=($invest->totalsales*7/100);
			$comclub1=($totalcom1/$club3);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub1','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==4){
			$totalcom1=($invest->totalsales*8/100);
			$comclub1=($totalcom1/$club4);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub1','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}elseif($res2->club==5){
			$totalcom1=($invest->totalsales*9/100);
			$comclub1=($totalcom1/$club5);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub1','$res2->club','".$date."','".$time."','".$day."' )");	
				}
			}elseif($res2->club==6){
			$totalcom1=($invest->totalsales*20/100);
			$comclub1=($totalcom1/$club6);
				if(($chkdailycom==0)&&($comclub1>0)){
					$mysqli->query("INSERT INTO `comdaily`(`user_id`, `amount`, `club`, `cdate`, `ctime`, `cday`) VALUES ('$res2->user_id','$comclub1','$res2->club','".$date."','".$time."','".$day."' )");
				}
			}else{
				//echo "null <br>";
			}
		}
				$mysqli->query("update `invest` set `chkdate`='".$date."' ");
?>
<?php				
// Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2

// Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2 Package 2

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
			$clubpa1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='1' and `package`=2 "));
			$clubpa2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='2' and `package`=2 "));
			$clubpa3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='3' and `package`=2 "));
			$clubpa4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='4' and `package`=2 "));
			$clubpa5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='5' and `package`=2 "));
			$clubpa6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `club`='6' and `package`=2 "));
$qp2=$mysqli->query("SELECT `user_id`,`club` from `tree` where `package`=2  "); 
	while($pares2=mysqli_fetch_object($qp2)){
			$d=strtotime("-1 Day");
			$ydate=date("d-M-Y", $d);
			$invest2=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest2` where `package`=2 and `date`='".$ydate."' and `chkdate`!='".$date."' ")); 
	$chkdailycom2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `comdaily` where `user_id`='$pares2->user_id' and `cdate`='".$date."' "));	
		$msg="Daily Comission";	
			if($pares2->club==1){
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
		}
				$mysqli->query("update `invest2` set `chkdate`='".$date."' where `package`=2 ");

?>