<?php
	$id=$_SESSION['MemLogId'];
	$memberid=$_SESSION['MemLogId'];
	$cog=mysqli_fetch_object($mysqli->query("select * from `cog` where `serial`=2"));
	$planup=mysqli_fetch_object($mysqli->query("select * from `planup` where `user_id`='".$memberid."' order by serial desc limit 1 "));
	$pla=mysqli_fetch_object($mysqli->query("select * from `plan` where `serial`='$planup->plan'"));
	$planupchk=mysqli_num_rows($mysqli->query("select * from `planup` where `user_id`='".$memberid."'"));
	$pro = mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$memberid."' "));
	$tre = mysqli_fetch_object($mysqli->query("select * from `tree` where `user_id`='".$memberid."' "));
	$bal = mysqli_fetch_object($mysqli->query("select * from `balance` where `user_id`='".$memberid."' "));
	
	$mem = mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$memberid."' "));	
	$spo = mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$mem->sponsor."' "));	
	$agn = mysqli_fetch_object($mysqli->query("select * from `dealer` where `user_id`='".$mem->agent_id."' "));	
	$cus=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$memberid."' and `team`=1 "));// 0=Member 1=Customer	
	$gen=mysqli_fetch_object($mysqli->query("select * from `gen` where `user_id`='".$memberid."' "));			
	$inv_pla=mysqli_fetch_object($mysqli->query("SELECT `invest` from `invest` where `user_id`='".$memberid."' "));	
	$invest=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as `totalsales` from `invest` where `date`='".$date."' "));	
	$todaymember=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `date`='".$date."' and `team`=0 "));	
	$hd=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `team`=0 and stype=1 and date='$date' "));
	$h=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `team`=0 and stype=1 "));
	$rd=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `team`=0 and stype=2 and date='$date'"));
	$r=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `team`=0 and stype=2"));
	$ld=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `team`=0 and stype=3 and date='$date'"));
	$l=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `team`=0 and stype=3"));
	$fd=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `team`=0 and stype=4 and date='$date'"));
	$f=mysqli_num_rows($mysqli->query("SELECT `user_id` from `member` where `team`=0 and stype=4"));
	$shoprec=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxshopamnt`,sum(tax)as `taxt` FROM `trx` WHERE `rec_id`='".$memberid."' and `type`='3' "));
	$shoptrx=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxshopamnt`,sum(tax)as `taxt` FROM `trx` WHERE `send_id`='".$memberid."' and `type`='3' "));
	$page=$_GET['page'];
?>