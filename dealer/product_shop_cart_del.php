<?php
session_start();
error_reporting(0);
require '../db/db.php';
if(isset($_GET['id'])){
	$product_id = $_GET['id'];
	$mysqli->query("DELETE FROM `cart` WHERE `serial`='".$product_id."' LIMIT 1");
	$_SESSION['msg'] = "Your Product Deleted Successfully";
	header("Location: product_shop_cart.php");
	exit();
}


?>