<?php ob_start();
if(isset($_GET['slide'])){
	require '../db/db.php';
	$id=$_GET['slide'];
	$mysqli->query("DELETE FROM `phonebook` WHERE `serial`='".$id."' LIMIT 1");
	$_SESSION['msgs']="Deleted Successfully";
	header("Location: phonebook.php");
	exit();
}
?>