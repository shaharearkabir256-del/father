<?php
		session_start();
	require '../db/db.php';
			$db=1;
		if($db==1){
			$mysqli->query("BACKUP DATABASE `rangdhon_atcris_db` TO DISK = 'E:\backup\testDB.BAK' WITH DIFFERENTIAL GO");
			$_SESSION['msgs']= "DATABASE Backup Successful";
			header("Location:backup_db.php");
		}
		//$mysqli->query-close();

	
	
?>