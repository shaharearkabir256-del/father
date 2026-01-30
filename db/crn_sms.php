<?php
session_start();
$_SESSION['token']="jhfgdstiu487438";
	include('api_sms.php');
	include "db.php";
	
	$SQL="select * from `sms_out` where `status`='0'";
	
	$res=$mysqli->query($SQL);
	while ($rs=mysqli_fetch_object($res))
	{
		sleep(1);
		SendSMS("Daily Income Bazar",$rs->mobile,$rs->sms);
		$SQL="Update `sms_out` set `status`='1' where serial=".$rs->serial;
		$mysqli->query($SQL);
	}
	
	
	
?>