<?php
	error_reporting(-1);
	set_time_limit(0);
	ini_set('memory_limit','2048M');
	session_start();	
	$_SESSION['token']='ab12345gh';	
	require('db.php');

		$myfile = fopen("block_ip.txt", "w") or die("Unable to open file!");
		$sql = "SELECT DISTINCT `ip` FROM hacker WHERE `block`='1' ";
		$result = $mysqli->query($sql);
			if($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()){
				$deny_ips=$row["ip"].",\n";
				fwrite($myfile, $deny_ips);
			  }
			}
			//$deny_ips='203.78.146.9'.",\n";
			//fwrite($myfile, $deny_ips);
			$deny_ips='51.83.3.220';
			fwrite($myfile, $deny_ips);
		fclose($myfile);
		$mysqli->close();
?>