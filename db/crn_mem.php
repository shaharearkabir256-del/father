<?php
	error_reporting(-1);
	set_time_limit(0);
	ini_set('memory_limit','2048M');
	session_start();	
	$_SESSION['token']='ab12345gh';	
	require 'db.php';
?>
<?php
		
$q1=$mysqli->query("SELECT `user_id` from `tree` "); 
while($res1=mysqli_fetch_object($q1)){
$spot_ref=$res1->user_id;	
require('cal_mem.php');
}

?>	