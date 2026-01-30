<?php
	$recid=$_SESSION['AdminUserId']; 
	$adminId=$_SESSION['AdminUserId'];
	//$cus->cpoint
	$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` WHERE `user_id`='$recid'"));
	$acc=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `dailycomAcc` FROM `comdaily` WHERE `user_id`='1547287135'")); // accounts
	$cus=mysqli_fetch_object($mysqli->query("SELECT sum(point)as cpoint FROM `member` WHERE `team`='1' ")); //Customer: `team`='1'
	$fund=mysqli_fetch_object($mysqli->query("SELECT sum(fund_company)as company,sum(fund_donation)as donation FROM `invest` "));
	

?>