<?php 
error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
if(isset($_POST['Submit'])){
	require 'db/db.php';
	
	$log_id=$_POST['lid'];
	$sendpincode=$_POST['PinCode'];
	
	if($log_id==''){
	$_SESSION['msg']="Enter Your  User ID";
	header("location:checkout_forgot_pass.php");
	exit();		
	}
	
	$query=$mysqli->query("SELECT * FROM `member` where `log_id`='$log_id'");
	$member=mysqli_fetch_object($query);
	$member_chk=mysqli_num_rows($query);
	$profile=mysqli_fetch_object($query=$mysqli->query("SELECT `mobile`,`email` FROM `profile` where `user_id`='$member->user_id'"));
	$member_email=$profile->email;
	if($member_email==''){
	$_SESSION['msg']="User ID empty";
	header("location:checkout_forgot_pass.php");
	exit();		
	}

	
	if(($member_email!='') && ($member_chk==1)){
		$pincode=0;
		$gcode=time();
		$pincode=substr($gcode , 6, 10);
		
$to = "OTP<$member_email>";
$subject="OTP";
$txt = "
<html>
<body>
<h1>OTP</h1>
<h4>Your New OTP: $pincode</h4>
</body>
</html>
";
$sms="
OTP
Your New OTP:$pincode, 
";
$from = $email;
$headers = "From:$title<$email>". "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to,$subject,$txt,$headers);
$mobile=$profile->mobile;
require('db/api_sms.php');
	$_SESSION['msgs']="A New OTP Send to your mobile Successfull";
	$_SESSION['log_id']=$log_id;
	$_SESSION['pincode']=$pincode;
	$_SESSION['member_email']=$member_email;
	$_SESSION['mobile']=$mobile;
	header("location:checkout_pincode.php");
	exit();
	}else{
	$_SESSION['msg']="Failed!";
	header("location:checkout_forgot_pass.php");
	exit();	
	}
}

?>