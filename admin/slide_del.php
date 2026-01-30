<?php error_reporting(0);
if(isset($_GET['id'])){
	require '../db/db.php';
	$id = $_GET['id'];
	$mysqli->query("DELETE FROM `slide` WHERE serial='".$id."' LIMIT 1");
	$_SESSION['msgs']="Deleted Successfully";
	header("Location: slide.php");
	exit();
}




?>