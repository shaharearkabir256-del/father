<?php
	set_time_limit(0);
	ini_set('memory_limit','1024M');
	session_start();	
	$_SESSION['token']='547345gh';	
	require 'db.php';	
?>

<?php  
		$exe=$mysqli->query("SELECT * FROM `tree` where `stype`='3' ORDER BY `serial` ASC");
		while($res=mysqli_fetch_object($exe)){
		global $mysqli;
		global $date;

		$res1=mysqli_fetch_object($mysqli->query("SELECT SUM(`match`) as `match` FROM `matching` WHERE `user_id`='$res->user_id'"));
		$amount=$res1->match;	
		//$res2=mysqli_fetch_object($mysqli->query("SELECT SUM(`invest`) as `invest` FROM `invest` WHERE `user_id`='$res->user_id' AND `type`='yearly'"));
		//$invest=$res2->invest;	
		if(($amount>=10000)&&($res->rank==0)){ // One Star left 5,000 and right 5,000
			$mysqli->query("UPDATE `tree` SET `rank`='1', `rank_date`='$date' WHERE `user_id`='$res->user_id'");
			$gift="Crass And Tour";
			$gift_amount=0.00;
			$rank="One Star";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`) VALUES('".$res->user_id."','".$gift_amount."','".$date."','".$gift."','".$rank."')");
			}
			
		if(($amount>=20000)&&($res->rank==1)){	// Two Star  left 10,000 and right 10,000 >>> Left rank 2 and Right rank 2
			$mysqli->query("UPDATE `tree` SET `rank`='2', `rank_date`='$date' WHERE `user_id`='$res->user_id'");
			$gift="Mobile";
			$gift_amount=0.00;
			$rank="Two Star";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`) VALUES('".$res->user_id."','".$gift_amount."','".$date."','".$gift."','".$rank."')");
			}
			
		if(($amount>=40000)&&($res->rank==2)){	
			$mysqli->query("UPDATE `tree` SET `rank`='3',`rank_date`='$date' WHERE `user_id`='$res->user_id'");
			$gift="TV";
			$gift_amount=0.00;
			$rank="Three Star";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`) VALUES('".$res->user_id."','".$gift_amount."','".$date."','".$gift."','".$rank."')");
			}
			
		if(($amount>=80000)&&($res->rank==3)){	
			$mysqli->query("UPDATE `tree` SET `rank`='4',`rank_date`='$date' WHERE `user_id`='$res->user_id'");
			$gift="Laptop";
			$gift_amount=0.00;
			$rank="Four Star";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`) VALUES('".$res->user_id."','".$gift_amount."','".$date."','".$gift."','".$rank."')");
			}

		if(($amount>=160000)&&($res->rank==4)){	
			$mysqli->query("UPDATE `tree` SET `rank`='5',`rank_date`='$date' WHERE `user_id`='$res->user_id'");
			$gift="Freeze";
			$gift_amount=0.00;
			$rank="Five Star";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`) VALUES('".$res->user_id."','".$gift_amount."','".$date."','".$gift."','".$rank."')");
			}
				
		if(($amount>=320000)&&($res->rank==5)){	
			$mysqli->query("UPDATE `tree` SET `rank`='6',`rank_date`='$date' WHERE `user_id`='$res->user_id'");
			$gift="AC";
			$gift_amount=0.00;
			$rank="Six Star";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`) VALUES('".$res->user_id."','".$gift_amount."','".$date."','".$gift."','".$rank."')");
			}
			
		if(($amount>=640000)&&($res->rank==6)){	
			$mysqli->query("UPDATE `tree` SET `rank`='7',`rank_date`='$date' WHERE `user_id`='$res->user_id'");
			$gift="Motorcycle";
			$gift_amount=0.00;
			$rank="Seven Star";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`) VALUES('".$res->user_id."','".$gift_amount."','".$date."','".$gift."','".$rank."')");
			}
			
		if(($amount>=1280000)&&($res->rank==7)){	
			$mysqli->query("UPDATE `tree` SET `rank`='8',`rank_date`='$date' WHERE `user_id`='$res->user_id'");
			$gift="Car";
			$gift_amount=0.00;
			$rank="Ambassador";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`) VALUES('".$res->user_id."','".$gift_amount."','".$date."','".$gift."','".$rank."')");
			}
			
	
		}	

?>
