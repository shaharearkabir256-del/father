<?php

 //require("db.php"); 

/* $pack=100;
$left_po=1100;
echo "limit: ".$income_limit=$pack*10; echo "<br>";
			if($income_limit>=$left_po){echo $left_po;}else{echo "f".$f=($left_po-$income_limit); } */
/*   require("class.php");

  $a = new theClass($mysqli);;
  $a->runQuery(); */
/*  
  	$q1=$mysqli->query("SELECT * from `tree` ");  
	while($res1=mysqli_fetch_object($q1)){
		$mysqli->query("update `profile` set `stype`='".$res1->stype."' where `user_id`='$res1->user_id' ");
	}
	
	
		$invest=mysqli_fetch_object($mysqli->query("select * from `invest` where  `upline`='".$res1->user_id."' order by serial desc limit 1 "));
		
		if($invest->club==1){  
		$mysqli->query("update `member` set `stype`='1',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `stype`='1',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `club`='$invest->club' where `user`='".$res1->user."' ");
		}
		if($invest->club===2){
		$mysqli->query("update `member` set `stype`='1',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `stype`='1',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `club`='$invest->club' where `user`='".$res1->user."' ");
		}
		if($invest->club===3){
		$mysqli->query("update `member` set `stype`='2',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `stype`='2',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `club`='$invest->club' where `user`='".$res1->user."' ");
		}
		if($invest->club===4){
		$mysqli->query("update `member` set `stype`='2',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `stype`='2',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `club`='$invest->club' where `user`='".$res1->user."' ");
		}
		if($invest->club===5){
		$mysqli->query("update `member` set `stype`='3',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `stype`='3',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `club`='$invest->club' where `user`='".$res1->user."' ");
		}
		if($invest->club===6){
		$mysqli->query("update `member` set `stype`='3',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `stype`='3',`position`=$invest->club where `user_id`='".$res1->user_id."' ");
		$mysqli->query("update `tree` set `club`='$invest->club' where `user`='".$res1->user."' ");
		}  */
		
/* 		echo "user= ".$res1->user; echo " stype= ".$res1->stype; echo " Position= ".$res1->position; echo "<br>";
		
		$q2=$mysqli->query("SELECT * from `tree` where `upline`='$res1->user' "); 
	
		while($res2=mysqli_fetch_object($q2)){
			echo "------user= ".$res2->user; echo " stype= ".$res2->stype; echo " Position= ".$res2->position; echo "<br>";
			} 
		
	}
*/			
		
/* 		$stype=$res1->stype;
		$uplineUser=$res1->user;
		if($stype==1){ $chk_upline=mysqli_num_rows($mysqli->query("select * from `tree` where `stype`=1 AND `upline`='".$uplineUser."' "));
			if($chk_upline==0){	$placecode=1;} if($chk_upline==1){$placecode=2;}
		}
		if($stype==2){ $chk_upline=mysqli_num_rows($mysqli->query("select * from `tree` where `stype`=2 AND `upline`='".$uplineUser."' "));
			if($chk_upline==0){$placecode=3;} if($chk_upline==1){$placecode=4;}
		}
		if($stype==3){ $chk_upline=mysqli_num_rows($mysqli->query("select * from `tree` where `stype`=3 AND `upline`='".$uplineUser."' "));
			if($chk_upline==0){$placecode=5;} if($chk_upline==1){$placecode=6;}
		}
		$mysqli->query("update `member` set `position`='$placecode' where `upline`='$uplineUser' ");
		$mysqli->query("update `tree` set `position`='$placecode' where `upline`='$uplineUser' ");
		$mysqli->query("update `invest` set `club`='$placecode' where `upline`='$uplineUser' ");
		$mysqli->query("update `tree` set `club`='$placecode' where `user`='$uplineUser' "); 
	} */
	

	

/* 			$userid=152054646;
			$gift_amount=1000;
			$gift="Crass And Tour";
			$rank="One Star";
			$mysqli->query("INSERT INTO `incentive`(`rec_id`,`amount`,`date`,`gift`,`rank`)VALUES('".$userid."','".$gift_amount."','".$date."','".$gift."','".$rank."')"); */
/* 
class table {
	 const label1 = "<thead>
		  <tr>
		  <th>Serail</th>
		  <th>Date</th>
		  <th>Amount</th>
		  </tr>
		  </thead>
		  ";
	const table1="<tbody>
					  <tr>
						<td>1</td>
					  <td>2019-10-07</td>
					  <td>100 Point</td>
					  </tr>
					  </tbody>
					  ";

	const footer1 = "<tfoot>
		  <tr>
		  <th>Serail</th>
		  <th>Date</th>
		  <th>Amount</th>
		  </tr>
		  </tfoot>
		  ";

   public function mem_trx_cash_data() {
	echo self::label1;  
	echo self::table1;
    echo self::footer1;
  }
}

$table = new table();
echo"<table>";
	$table->mem_trx_cash_data();
echo"</table>"; */


/* 
	$n=0;
    $q1=$mysqli->query("select * from `invest` ");
    while($res=mysqli_fetch_object($q1)){ 
	$chk=mysqli_num_rows($mysqli->query("select * from `invest` where `trx_id`='".$res->trx_id."' "));
	if($chk>1){
	//echo $n.". ID:".$res->trx_id."<br>";	
    //$mysqli->query("UPDATE `invest` SET `trx_id`='".$trx_id."' WHERE `user_id`='$res->user_id'");
	//$page = $_SERVER['PHP_SELF'];$sec = "1"; header("Refresh: $sec; url=$page");
	}
    }  */

	
/* $member=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `log_id`='".sohag1."'"));
echo "Test: ".$member->log_id."<br>";

		function dealer($dealerid){
		$dealer=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `log_id`='".$dealerid."'"));	
		echo $dealerid=$dealer->log_id;
		return $dealerid;
		}
		dealer("sohag"); */

/*
    $q1=$mysqli->query("select * from `invest` ");
    while($res=mysqli_fetch_object($q1)){ 
    $mysqli->query("UPDATE `member` SET `team`=0 WHERE `user_id`='$res->user_id'");
    }

 	$logIdP="atcris";
	$pass="atcris11234989017@#$";
	$dpass=md5($pass);
	$dpin =11234989017;
	$gmail =$email;
	$chkm=mysqli_num_rows($mysqli->query("select `log_id` from `member` where `log_id`='".$logIdP."' "));
	if($chkm==0){
			$logId=time(); 
		$mysqli->query("INSERT INTO `member`(`user_id`,`log_id`,`pass`,`pin`,`sponsor`,`position`,`point`,`upline`,`confirm`,`active`,`date`) 
		VALUES('".$logId."','".$logIdP."','".$dpass."','".$dpin."','".$spot_ref."','".$placecode."','$plan','".$uplineUser."','0','1','".$date."')");

		$mysqli->query("INSERT INTO `tree`(`user_id`,`user`,`position`,`upline`,`sponsor`,`package`,`date`) 
		VALUES ('".$logId."','".$logIdP."','".$placecode."','".$uplineUser."','".$spot_ref."','1','".$date."')");
	
		$mysqli->query("INSERT INTO `profile`(`user_id`,`fname`,`lname`,`email`,`mobile`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex` ) 
		VALUES ('".$logId ."','".$fname."','".$lname."','".$gmail."','".$mobile."','".$city."','".$country."','".$bday."','".$bmonth."','".$byear."','".$sex."')");
		$mysqli->query("INSERT INTO `balance` (`user_id`) VALUES ('".$logId."')");
		$mysqli->query("INSERT INTO `invest`(`user_id`, `invest`, `invest_id`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`)  
		VALUES ('".$logId."','$plan','$id','".$spCom."','".$spot_ref."','".$stCom."','".$uplineUserId."','".$shopping."','".$date."')");// Cut 1k from SponsorId
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
			
			$headers = "From:Registration:$totlamembers<$email>". "\r\n" . "BCC:shaang002@gmail.com";
			mail($to,$subject,$txt,$headers);
		echo "Registration Successful";
		exit();

	}else{
		echo $logIdP."Tacken";
		exit();
	} */
/*  $user="admin"; 
 $userid=time();
$password="atcris469176@#$";
 $pass=md5($password);
$trxpin="469176";
$pin=md5($trxpin);
echo 'UserId: '.time();echo "<br>";

$chkres=mysqli_num_rows($mysqli->query("SELECT * FROM `admin` WHERE `user`='".$user."'"));
if($chkres==0){
	$msqli_query("INSERT INTO `admin`(`user`, `user_id`, `pass`, `pdate`, `pin`, `pndate`, `email`, `active`, `chk`, `city`, `country`)	VALUES('".$user."', '".$userid."', '".$pass."', '".$date."', '".$pin."', '".$date."', '".$email."', 1, 1, 'Dhaka', 'Bangladesh')");
	echo "Submission Done!";
}else{echo $user."Tacken!";} */

	//$d30=strtotime("-30 Day");
	//echo $start30=date("d-M-Y", $d30);
				/* $q1=$mysqli->query("SELECT `user_id` FROM `comdaily` WHERE `cdate`='".$date."' order by serial desc"); 
$chkres=mysqli_num_rows($q1);
while($res=mysqli_fetch_object($q1)){ 
if($chkres>1){
	//$mysqli->query("DELETE FROM `comdaily` WHERE `user_id`='$res->user_id' limit 1");
}	
} */

	?>
