<?php
error_reporting(0);
ini_set('display_errors','off');
session_start();
//require 'db.php';
if($mobile){
$mysqli->query("INSERT INTO `sms_out`(`pincode`,`mobile`, `sms`, `status`) VALUES ('$pincode','$mobile','$sms','Pending')");
}


$query = $mysqli->query("SELECT * FROM `sms_out` WHERE `status`='Pending' LIMIT 500");
$row = mysqli_num_rows($query);
if($row>0){
	while($val = mysqli_fetch_object($query)){	
		$smsid= $val->serial;
		
		$smsusername="IT99-dibosah";
		$smspassword="$setting->api_sms";
		$smssource="8801896025176";
		$smstype="2"; //1=english 2=bangla
		$smsmob="88$val->mobile";
		$smstxt=urlencode("$val->sms"); 
		$smsurl="http://dstbd-api.connectbind.com/bulksms/personalizedbulksms?username=".$smsusername."&password=".$smspassword."&source=".$smssource."&type=".$smstype."&destination=".$smsmob."&message=".$smstxt;	
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL, $smsurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close ($ch);
		$resu=explode("|", $response);
		$result=$resu[0];	
		if($result=="1701"){
			$mysqli->query("UPDATE `sms_out` SET `status`='DELIVERED' WHERE `serial`='$smsid'");
		}else{
			$mysqli->query("UPDATE `sms_out` SET  WHERE `serial`='$smsid'");	
		}
	}
}



/*
OLD
$query = $mysqli->query("SELECT * FROM `sms_out` WHERE `status`='Pending' LIMIT 500");
$row = mysqli_num_rows($query);
if($row>0){
	while($val = mysqli_fetch_object($query)){	
	$smsid= $val->serial;
	$number = $val->mobile;
	$message=$val->sms; 

	$url = "http://66.45.237.70/api.php";
	$username="01711234989";
	$password="$setting->api_sms";
	$data= array(
	'username'=>"$username",
	'password'=>"$password",
	'number'=>"$number",
	'message'=>"$message"
	);

	$ch = curl_init(); // Initialize cURL
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$smsresult = curl_exec($ch);
	$p = explode("|",$smsresult);
	$sendstatus = $p[0];
		if($sendstatus==1101){
			$mysqli->query("UPDATE `sms_out` SET `status`='DELIVERED',`ref_code`='$sendstatus' WHERE `serial`='$smsid'");
		}else{
		$mysqli->query("UPDATE `sms_out` SET `ref_code`='$sendstatus' WHERE `serial`='$smsid'");	
		}
	}
}
*/

?>



