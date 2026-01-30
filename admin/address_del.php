<?php
if(isset($_GET['id'])){
	require '../db/db.php';
	$id = $_GET['id'];
	$mysqli->query("DELETE FROM `address` WHERE `serial`='".$id."' LIMIT 1");
	$_SESSION['msgs']="Deleted Successfully";
	header("Location: address.php");
	exit();
}




?>