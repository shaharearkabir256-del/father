<?php
session_start();
error_reporting(0);
require '../db/db.php';
if(isset($_GET['id'])){
	$product_id = $_GET['id'];
	$chk = $_GET['chk'];
	if($chk==0){
	$mysqli->query("DELETE FROM `product` WHERE serial='".$product_id."' and chk=0 LIMIT 1");
	$_SESSION['msgs'] = "Your Product Deleted Successfully";
	header("Location: product.php");
	exit();
	}else{
	$_SESSION['msg'] = "Can not delete active product";
	header("Location: product.php");
	exit();	
	}
}


?>