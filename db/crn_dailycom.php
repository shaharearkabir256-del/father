<?php
	error_reporting(-1);
	set_time_limit(0);
	ini_set('memory_limit','2048M');
	session_start();	
	$_SESSION['token']='ab12345gh';	
	require 'db.php';
?>
<?php
require('c_dcom.php');
$to="<$email>"; 
$subject=$title; 
$tdc=($happy->totalsales+$regular->totalsales+$lucky->totalsales);
$txt="
Today Total Daily Income: $tdc

Today happy:$happy->totalsales
Today regular:$regular->totalsales
Today lucky:$lucky->totalsales

com0: $comclub0 club0: $club0 tcom0: $totalcom0
com1: $comclub1 club1: $club1 tcom1: $totalcom1
com2: $comclub2 club2: $club2 tcom2: $totalcom2
com3: $comclub3 club3: $club3 tcom3: $totalcom3
com4: $comclub4 club4: $club4 tcom4: $totalcom4
com5: $comclub5 club5: $club5 tcom5: $totalcom5
com6: $comclub6 club6: $club6 tcom6: $totalcom6

Running Date :$day $time $date";
$headers="From:Daily Com:$tdc<$email>";
mail($to,$subject,$txt,$headers);		
?>
