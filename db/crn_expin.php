<?php  	
	ob_start();
	$timing_start = explode(' ', microtime());
	error_reporting(-1);
	set_time_limit(0);
	ini_set('memory_limit','1024M');
	error_reporting(0);
	require('db.php');
			
?>
			
<?php
			$query_mem=$mysqli->query("SELECT `cdate` from `member` where `team`='1' "); // Customer Inactive After 3m=90days
			while($res_mem=mysqli_fetch_object($query_mem)){

			}
			
?>
