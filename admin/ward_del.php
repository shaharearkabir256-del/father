<?php
session_start(); 
require '../db/db.php';

$scatid=$mysqli->real_escape_string($_GET['brandid']);
$location="zone.php";

if($scatid!=''){
	
    $mysqli->query("DELETE FROM `ward` WHERE `ward_id`='".$scatid."' ");
	$_SESSION["msgs"]="DELETE Successful";
	header("Location:$location");
	exit();
}else{
	$_SESSION["msg"]="DELETE Fail";
	header("Location:$location");
	exit();
}
?>