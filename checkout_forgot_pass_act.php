<?php 
error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
if(isset($_POST['Submit'])){
	require 'db/db.php';
	

	$sendpincode=$_POST['PinCode'];
	$log_id=$_SESSION['log_id'];
	if($sendpincode==''){
	$_SESSION['msg']="Enter Your  Pincode";
	header("location:checkout_forgot_pass.php");
	exit();		
	}
	$member_email=$_SESSION['member_email'];
	if($member_email==''){
	$_SESSION['msg']="User ID empty";
	header("location:checkout_forgot_pass.php");
	exit();		
	}

	
	if(($member_email!='') && ($sendpincode==$_SESSION['pincode'])){
		$pincode=0;
		$gcode=time();
		$pincode=substr($gcode , 6, 10);
		//$pass=bin2hex(openssl_random_pseudo_bytes(2));
		$pass=substr($gcode , 4, 10);
		$password=md5($pass);
		$mysqli->query("update `member` set `pass`='$password' where `log_id`='$log_id' ");
		
$to = "Password Reset<$member_email>";
$subject="Password Reset";
$txt = "
<html>
<body>
<h1>Password Reset</h1>
<h4>Your New Password: $pass</h4>


<p><a target='blank' href='$url/checkout.php?token=$password'>Login</a></p>

</body>
</html>
";
$sms="
Password Reset
Your New Password:$pass, 
Login Link:$url/checkout.php?token=$password
";
$from = $email;
$headers = "From:$title<$email>". "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to,$subject,$txt,$headers);
$mobile=$_SESSION['mobile'];
require('db/api_sms.php');
	$_SESSION['msgs']="A New Password Send Successfull";
	header("location:checkout_forgot_pass.php");
	exit();
	}else{
	$_SESSION['msg']="Failed!";
	header("location:checkout_forgot_pass.php");
	exit();	
	}
}

?>