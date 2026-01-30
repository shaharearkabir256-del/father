<?php
error_reporting(0);
ini_set('display_errors','off');
session_start();
require 'db.php';

//Send SMS  from your database using php
$username="01711234989";
$password="9TRYKXVD";

$query = $mysqli->query("SELECT * FROM `sms_out` WHERE `status`='Pending' LIMIT 500");
$row = mysqli_num_rows($query );
$x = '';
while($val = mysqli_fetch_object($query)){	

$smsid= $val->id;
$number = $val->number;
$x = $x.$number.","; //number separated by comma
$text=$val->message; 
$mysqli->query("UPDATE `sms_out` SET `status`='DELIVRD' WHERE `serial`='$smsid'");

}

$url = "http://66.45.237.70/api.php";
$data= array(
'username'=>"$username",
'password'=>"$password",
'number'=>"$x",
'message'=>"$text"
);

$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$smsresult = curl_exec($ch);
$p = explode("|",$smsresult);
$sendstatus = $p[0];


?>



