<?php
	error_reporting(0);
	ini_set('display_errors','off');
	session_start();
	require_once("db/db.php");
	$csrc=$_SESSION['MemLogId'];
	$cc=$mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."'");
	$carr=mysqli_num_rows($cc);
	?>
<span class="uk-icon-shopping-basket"></span>

