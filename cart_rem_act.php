<?php

	require_once("db/db.php");
	$sed=$mysqli->real_escape_string($_GET['serial']);
	//$ret=strlen($sed);
	//$seri=substr($sed, 10,$ret);
	//settype($seri, "integer");
	$seri=$sed;
	$mysqli->query("DELETE FROM `cart` WHERE `serial`='".$seri."'");
	header('location:cart_view.php');


?>