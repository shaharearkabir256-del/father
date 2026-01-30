<?php
	error_reporting(0);
	ini_set('display_errors','off');
	session_start(); 
	$server="localhost";
	$user="rangdhon_atrcris_db_user";
	$pass="Ab7ZY60k-u1bR2uGpB(ZIR91S";
	$dbname="rangdhon_atcris_db";	
	$mysqli=new mysqli("$server","$user","$pass","$dbname");
	
	$ad_info=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='1536835893' "));
	
 	if (substr($ad_info->mobile,0,4)=='+880'){$fmobile=substr($ad_info->mobile,3,15);}
	elseif (substr($ad_info->mobile,0,3)=='880'){$fmobile=substr($ad_info->mobile,2,15);}
	elseif (substr($ad_info->mobile,0,1)=='0'){$fmobile=substr($ad_info->mobile,1,15);}
	elseif (substr($ad_info->mobile,0,1)=='1'){$fmobile=substr($ad_info->mobile,0,15);}	
	sleep(1); 
	
	$from="880$fmobile";


	$exe=$mysqli->query("SELECT * FROM `sms_out` WHERE `status`=0");	
	while($res= mysqli_fetch_object($exe))	
	{
	global $mysqli;
?>
	
<?php		
	if (substr($res->mobile,0,4)=='+880'){$tmobile=substr($res->mobile,3,15);}
	elseif (substr($res->mobile,0,3)=='880'){$tmobile=substr($res->mobile,2,15);}
	elseif (substr($res->mobile,0,1)=='0'){$tmobile=substr($res->mobile,1,15);}
	elseif (substr($res->mobile,0,1)=='1'){$tmobile=substr($res->mobile,0,15);}	
	sleep(1);
	$cell="880$tmobile";	
	$mysqli->query("UPDATE `sms_out` SET `status` = '0' WHERE `sms_out`.`serial`='$res->serial' ");
?> 
	
<?php	
	//$url="https://api.mobireach.com.bd/SendTextMessage?Username=xxxxxxxx&Password=xxxxxxxxx&From=xxxxxxxxxxxxx&To=xxxxxxxxxxxxx&Message=testmessage";
	//$url="https://api.mobireach.com.bd/SendTextMessage?Username=dibs&Password=Atcris843931@#&&From=8801684025412&To=8801766996853&Message=testmessage";

	$url="https://api.mobireach.com.bd/SendTextMessage";
	$variables = array(
		'Username' => "dibs",
		'Password' => "Atcris843931@#&",
		'From=' => "$from",
		'To' => "$cell",	
		'Message' => "$res->sms",
	);
	$options = array(
		'https' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($variables),
		),
	);
	$context  = stream_context_create($options);
	echo $result = file_get_contents($url, false, $context);
	}
?>