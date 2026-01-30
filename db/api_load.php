<?php
error_reporting(0);
ini_set('display_errors','off');
session_start();
/* 
$mobile_type=0;
$amount=10; */
if(($valid==1)&&($mobile!='')&&($amount>0)){
//require 'db.php';	
$url = "http://load16.com/db/api_bd.php";
$ch = curl_init();
$variables = array(
'api' => urlencode("DAILYBAZAR"), //dailybazar
'pass' => urlencode("$setting->api_recharge"),
'mobile' => urlencode("$mobile"), //$res->mobile
'type' => urlencode("$mobile_type"), //$res->type 0 = prepaid 1 = Postpaid
'amt' => urlencode("$amount"), //$res->amount
'domain' => urlencode("dailyincomebazar.com"), // Your Domain
);
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $variables);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
curl_setopt($ch,CURLOPT_TIMEOUT, 20);
$result = curl_exec($ch);
curl_close ($ch);

if($result=="Success"){
//echo $_SESSION['msg'] = "Send your customer a message";
$_SESSION['msgs']= "Recharge Successful";
}else{
//echo $_SESSION['msg'] = "Recharge Server not responding Reason $result";
$_SESSION['msg']= "Recharge Failed $result";
}
//echo $_SESSION['msgs']= "L S";
}else{
$_SESSION['msg']= "Invalid mobile number or amount";
}

?>