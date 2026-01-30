<?php
	//error_reporting(0);
	//ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true);
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: ../dealer/index.php");
		exit();
	}
	else{
	    require '../db/db.php';
		$id=$_SESSION['DealerLogId'];	
		$recid=$_SESSION['DealerLogId'];
		require '../db/cal_del.php';
		if(isset($_GET['pageName'])){ $pageName=$_GET['pageName']; }else{ $pageName="Page"; }
		$agentid=$_GET['agentid'];
	}
	
	
	
?>