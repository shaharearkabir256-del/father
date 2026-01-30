<?php
	$timing_start = explode(' ', microtime());
	error_reporting(-1);
	set_time_limit(0);
	ini_set('memory_limit','2048M');
	session_start();	
	$_SESSION['token']='cd12345gh';	
	require 'db.php';
?>

<?php  
global $mysqli;
	$query_10="SELECT `user_id` FROM `member` WHERE `stype`='3'"; 
	$result_10=$mysqli->query( $query_10);
	while($row_10=mysqli_fetch_array($result_10)){
	
	

	$memberid = $row_10['user_id'];
	$Root_Member=$memberid;
	
?>

<?php 
	$genx=$mysqli->query("SELECT `user_id`,`date` FROM `gen` WHERE `user_id`='".$memberid."'");
	$rows=mysqli_num_rows($genx);
	if($rows==0){		
		$mysqli->query("INSERT INTO `gen` (`user_id`) VALUES ('".$memberid."')");
	}		
	$rows5=mysqli_fetch_array($genx);
	//if($rows5['date']!=$date){
?>

<?php 
	$exe11 = $mysqli->query("select sponsor, SUM(point) as price1, SUM(matching) as point1, COUNT(user_id) as `count1 from member where sponsor='$Root_Member'");	
	while($res11=mysqli_fetch_array($exe11)){  	
		$_SESSION['price_1'] = $res11['price1']*1;
		$_SESSION['count_1'] = $res12['count1']*1;
		$_SESSION['point_1'] = $res12['point1']*1;
	}
?>

<?php 			
	$exe12 = $mysqli->query("select user_id, sponsor,SUM(point) as price2, SUM(matching) as point2, COUNT(user_id) as `count2` from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member')");	
	while($res12=mysqli_fetch_array($exe12)){  	
		$_SESSION['price_2'] = $res12['price2']*1;
		$_SESSION['count_2'] = $res12['count2']*1;
		$_SESSION['point_2'] = $res12['point2']*1;
	}
?>


<?php 	
	$exe13 = $mysqli->query("select user_id, sponsor,SUM(point) as price3, SUM(matching) as point3, COUNT(user_id) as `count3` from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member'))");	
	while($res13=mysqli_fetch_array($exe13)){  	
		$_SESSION['price_3'] = $res13['price3']*1;
		$_SESSION['count_3'] = $res13['count3']*1;
		$_SESSION['point_3'] = $res13['point3']*1;
	}
?>


<?php 	
	$exe14 = $mysqli->query("select user_id, sponsor,SUM(point) as price4, SUM(matching) as point4, COUNT(user_id) as `count4` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member')))");	
	while($res14=mysqli_fetch_array($exe14)){  	
		$_SESSION['price_4'] = $res14['price4']*1;
		$_SESSION['count_4'] = $res14['count4']*1; 
		$_SESSION['point_4'] = $res14['point4']*1;
	}
?>


<?php 	
	$exe15 = $mysqli->query("select user_id, sponsor,SUM(point) as price5, SUM(matching) as point5, COUNT(user_id) as `count5` from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member'))))");	
	while($res15=mysqli_fetch_array($exe15)){  	
		$_SESSION['price_5'] = $res15['price5']*1;
		$_SESSION['count_5'] = $res15['count5']*1;
		$_SESSION['point_5'] = $res15['point5']*1;
	}	
?>


<?php 	
	$exe16 = $mysqli->query("select user_id, sponsor, SUM(point) as price6, SUM(matching) as point6, COUNT(user_id) as `count6` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member')))))");	
	while($res16=mysqli_fetch_array($exe16)){  	
		$_SESSION['price_6'] = $res16['price6']*1;
		$_SESSION['count_6'] = $res16['count6']*1;
		$_SESSION['point_6'] = $res16['point6']*1;
	}
?>


<?php 	
	$exe17 = $mysqli->query("select user_id, sponsor, SUM(point) as price7, SUM(matching) as point7, COUNT(user_id) as `count7` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member'))))))");	
	while($res17=mysqli_fetch_array($exe17)){  	
		$_SESSION['price_7'] = $res17['price7']*1;
		$_SESSION['count_7'] = $res17['count7']*1;	
		$_SESSION['point_7'] = $res17['point7']*1;		
	}	

?>


<?php 
	$exe18 = $mysqli->query("select user_id, sponsor, SUM(point) as price8,  SUM(matching) as point8, COUNT(user_id) as `count8` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member')))))))");	
	while($res18=mysqli_fetch_array($exe18)){  	
		$_SESSION['price_8'] = $res18['price8']*1;
		$_SESSION['count_8'] = $res18['count8']*1;
		$_SESSION['point_8'] = $res18['point8']*1;
	}	
?>


<?php 
	$exe19 = $mysqli->query("select user_id, sponsor, SUM(point) as price9, SUM(matching) as point9, COUNT(user_id) as `count9` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member'))))))))");	
	while($res19=mysqli_fetch_array($exe19)){  	
		$_SESSION['price_9'] = $res19['price9']*1;
		$_SESSION['count_9'] = $res19['count9']*1;
		$_SESSION['point_9'] = $res19['point9']*1;
	}	
?>


<?php 	
	$exe20 = $mysqli->query("select user_id, sponsor, SUM(point) as price10, SUM(matching) as point10, COUNT(user_id) as `count10` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member')))))))))");	
	while($res20=mysqli_fetch_array($exe20)){  	
		$_SESSION['price_10'] = $res20['price10']*1;
		$_SESSION['count_10'] = $res20['count10']*1;
		$_SESSION['point_10'] = $res20['point10']*1;		
	}
?>


<?php 	
	$exe21 = $mysqli->query("select user_id, sponsor, SUM(point) as price11, SUM(matching) as point11, COUNT(user_id) as `count11` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member'))))))))))");	
	while($res21=mysqli_fetch_array($exe21)){  	
		$_SESSION['price_11'] = $res21['price11']*1;
		$_SESSION['count_11'] = $res21['count11']*1;
		$_SESSION['point_11'] = $res21['point11']*1;
	}
?>


<?php 	
	$exe22 = $mysqli->query("select user_id, sponsor, SUM(point) as price12, SUM(matching) as point12, COUNT(user_id) as `count12` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$Root_Member')))))))))))");	
	while($res22=mysqli_fetch_array($exe22)){  	
		$_SESSION['price_12'] = $res22['price12']*1;
		$_SESSION['count_12'] = $res22['count12']*1;
		$_SESSION['point_12'] = $res22['point12']*1;
	}
?>


<?php 	
	$exe23 = $mysqli->query("select user, sponsor, SUM(point) as price13,COUNT(user_id) as `count13` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member'))))))))))))");	
	while($res23=mysqli_fetch_array($exe23)){  	
		$_SESSION['price_13'] = $res23['price13']*1;
		$_SESSION['count_13'] = $res23['count13']*1;
	}
?>


<?php 	
	$exe24 = $mysqli->query("select user, sponsor, SUM(point) as price14,COUNT(user_id) as `count14` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member')))))))))))))");	
	while($res24=mysqli_fetch_array($exe24)){  	
		$_SESSION['price_14'] = $res24['price14']*1;
		$_SESSION['count_14'] = $res24['count14']*1;
	}
?>


<?php 	
	$exe25 = $mysqli->query("select user, sponsor, SUM(point) as price15,COUNT(user_id) as `count15` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member')))))))))))))");	
	while($res25=mysqli_fetch_array($exe25)){  	
		$_SESSION['price_15'] = $res25['price15']*1;
		$_SESSION['count_15'] = $res25['count15']*1;
	}
?>


<?php 	
	$exe26 = $mysqli->query("select user, sponsor, SUM(point) as price16,COUNT(user_id) as `count16` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member'))))))))))))))");	
	while($res26=mysqli_fetch_array($exe26)){  	
		$_SESSION['price_16'] = $res26['price16']*1;
		$_SESSION['count_16'] = $res26['count16']*1;
	}
?>


<?php 	
	$exe27 = $mysqli->query("select user, sponsor, SUM(point) as price17,COUNT(user_id) as `count17` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member'))))))))))))))");	
	while($res27=mysqli_fetch_array($exe27)){
		$_SESSION['price_17'] = $res27['price17']*1;
		$_SESSION['count_17'] = $res27['count17']*1;
	}
?>


<?php 	
	$exe28 = $mysqli->query("select user, sponsor, SUM(point) as price18,COUNT(user_id) as `count18` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member')))))))))))))))");	
	while($res28=mysqli_fetch_array($exe28)){
		$_SESSION['price_18'] = $res28['price18']*1;
		$_SESSION['count_18'] = $res28['count18']*1;
	}
?>


<?php 	
	$exe29 = $mysqli->query("select user, sponsor, SUM(point) as price19,COUNT(user_id) as `count19` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member'))))))))))))))))");	
	while($res29=mysqli_fetch_array($exe29)){
		$_SESSION['price_19'] = $res29['price19']*1;
		$_SESSION['count_19'] = $res29['count19']*1;
	}
?>


<?php 	
	$exe30 = $mysqli->query("select user, sponsor, SUM(point) as price20,COUNT(user_id) as `count20` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member')))))))))))))))))");	
	while($res30=mysqli_fetch_array($exe30)){
		$_SESSION['price_20'] = $res30['price20']*1;
		$_SESSION['count_20'] = $res30['count20']*1;
	}
?>


<?php 	
	$exe31 = $mysqli->query("select user, sponsor, SUM(point) as price21,COUNT(user_id) as `count21` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member'))))))))))))))))))");	
	while($res31=mysqli_fetch_array($exe31)){
		$_SESSION['price_21'] = $res31['price21']*1;
		$_SESSION['count_21'] = $res31['count21']*1;
	}
?>


<?php 	
	$exe32 = $mysqli->query("select user, sponsor, SUM(point) as price22,COUNT(user_id) as `count22` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member')))))))))))))))))))");	
	while($res32=mysqli_fetch_array($exe32)){
		$_SESSION['price_22'] = $res32['price22']*1;
		$_SESSION['count_22'] = $res32['count22']*1;
	}
?>


<?php 	
	$exe33 = $mysqli->query("select user, sponsor, SUM(point) as price23,COUNT(user_id) as `count23` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member'))))))))))))))))))))");	
	while($res33=mysqli_fetch_array($exe33)){
		$_SESSION['price_23'] = $res33['price23']*1;
		$_SESSION['count_23'] = $res33['count23']*1;
	}
?>


<?php 	
	$exe34 = $mysqli->query("select user, sponsor, SUM(point) as price24,COUNT(user_id) as `count24` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member')))))))))))))))))))))");	
	while($res34=mysqli_fetch_array($exe34)){
		$_SESSION['price_24'] = $res34['price24']*1;
		$_SESSION['count_24'] = $res34['count24']*1;
	}
?>


<?php 	
	$exe35 = $mysqli->query("select user, sponsor, SUM(point) as price25,COUNT(user_id) as `count25` from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where member.sponsor in (select member.user from member where sponsor in (select member.user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor in (select user from member where member.sponsor='$Root_Member'))))))))))))))))))))))");	
	while($res35=mysqli_fetch_array($exe35)){
		$_SESSION['price_25'] = $res35['price25']*1;
		$_SESSION['count_25'] = $res35['count25']*1;
	}
?>


<?php 
	$c1=($_SESSION['count_2']);
	$c2=($_SESSION['count_3']);
	$c3=($_SESSION['count_4']);
	$c4=($_SESSION['count_5']);
	$c5=($_SESSION['count_6']);
	$c6=($_SESSION['count_7']);
	$c7=($_SESSION['count_8']);
	$c8=($_SESSION['count_9']);
	$c9=($_SESSION['count_10']);	
	$c10=($_SESSION['count_11']);
	$c11=($_SESSION['count_12']);
	$c12=($_SESSION['count_13']);
	$c13=($_SESSION['count_14']);
	$c14=($_SESSION['count_15']);
	$c15=($_SESSION['count_16']);

	
    $g1=($_SESSION['price_2']*$setting->g1/100);
	$g2=($_SESSION['price_3']*$setting->g2/100);
	$g3=($_SESSION['price_4']*$setting->g3/100);
	$g4=($_SESSION['price_5']*$setting->g4/100);
	$g5=($_SESSION['price_6']*$setting->g5/100);
	$g6=($_SESSION['price_7']*$setting->g6/100);
	$g7=($_SESSION['price_8']*$setting->g7/100);
	$g8=($_SESSION['price_9']*$setting->g8/100);
	$g9=($_SESSION['price_10']*$setting->g9/100);	
    $g10=($_SESSION['price_11']*$setting->g10/100);
    $g11=($_SESSION['price_12']*$setting->g11/100);
    $g12=($_SESSION['price_13']*$setting->g12/100);
    $g13=($_SESSION['price_14']*$setting->g13/100);
    $g14=($_SESSION['price_15']*$setting->g14/100);
    $g15=($_SESSION['price_16']*$setting->g15/100);

/*	$g1=($_SESSION['price_2']*0.4);
	$g2=($_SESSION['price_3']*0.3);
	$g3=($_SESSION['price_4']*0.2);
	$g4=($_SESSION['price_5']*0.1);
	$g5=($_SESSION['price_6']*0.1);
	$g6=($_SESSION['price_7']*0.1);
	$g7=($_SESSION['price_8']*0.1);
	$g8=($_SESSION['price_9']*0.1);
	$g9=($_SESSION['price_10']*0.1);	
	$g10=($_SESSION['price_11']*0.1); */

	
	
	
	$gen122=($g1+$g2+$g3+$g4+$g5+$g6+$g7+$g8+$g9+$g10+$g11+$g12+$g13+$g14+$g15);

?>


<?php 	
	
	
	$mysqli->query("UPDATE `gen` SET 
	`c1`='".$c1."',
	`c2`='".$c2."',
	`c3`='".$c3."',
	`c4`='".$c4."',
	`c5`='".$c5."',
	`c6`='".$c6."',
	`c7`='".$c7."',
	`c8`='".$c8."',
	`c9`='".$c9."',
	`c10`='".$c10."',
	`c11`='".$c11."',
	`c12`='".$c12."',
	`c13`='".$c13."',
	`c14`='".$c14."',
	`c15`='".$c15."',
	`g1`='".$g1."',
	`g2`='".$g2."',
	`g3`='".$g3."',
	`g4`='".$g4."',
	`g5`='".$g5."',
	`g6`='".$g6."',
	`g7`='".$g7."',
	`g8`='".$g8."',
	`g9`='".$g9."',
	`g10`='".$g10."',
	`g11`='".$g11."',
	`g12`='".$g12."',
	`g13`='".$g13."',
	`g14`='".$g14."',
	`g15`='".$g15."',
	`g_all`='".$gen122."',
	`date`='".$date."'
	WHERE `user_id`='".$memberid."'"); 
	//$gencom=$gen122*$setting->mem_join_spot_cash_wallet/100;
	//$mysqli->query("UPDATE `balance` SET `gen`='".$gencom."' WHERE `user_id`='".$memberid."'");
	
//Matching From Member
/* 	$m1=($_SESSION['point_1']*.3);
	$m2=($_SESSION['point_2']*.3);
	$m3=($_SESSION['point_3']*.3);
	$m4=($_SESSION['point_4']*.3);
	$m5=($_SESSION['point_5']*.3);
	$m6=($_SESSION['point_6']*.3);
	$m7=($_SESSION['point_7']*.3);
	$m8=($_SESSION['point_8']*.3);
	$m9=($_SESSION['point_9']*.3);
	$m10=($_SESSION['point_10']*.3);	
	//$m11=($_SESSION['point_11']*.0833);
	//$m12=($_SESSION['point_12']*.0833);
	
	$men2=($m1+$m2+$m3+$m4+$m5+$m6+$m7+$m8+$m9+$m10);

	
	
	
	$mysqli->query("UPDATE `balance` SET 
	`g1`='".$m1."',
	`g2`='".$m2."',
	`g3`='".$m3."',
	`g4`='".$m4."',
	`g5`='".$m5."',
	`g6`='".$m6."',
	`g7`='".$m7."',
	`g8`='".$m8."',
	`g9`='".$m9."',
	`g10`='".$m10."',
	`g_all`='".$men2."'
	WHERE `user_id`='".$memberid."'"); */
	
	
//}
$generation=$generation+$gen122;
} 
$to="<$email>"; 
$subject=$title; 
$txt="Total Genaration Income: $generation
Running Date :$day $time $date";
$headers="From:Generation Income:$generation<$email>";
mail($to,$subject,$txt,$headers);

?>
