<?php ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start();
	
	/* 	if($_SESSION["CSRM"]==$_COOKIE["CSRM"]){ */
		require('db/db.php');
		require('browser.php');
		$ua=getBrowser();
		$browser=$ua['platform'].$ua['name'].$ua['version'];
		$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
		$country = "$xml->geoplugin_countryName";
		$city = "$xml->geoplugin_regionName";
		//$mysqli->query("update `member` set `active`=0 WHERE `team`=1 and `cdate`<(NOW()-INTERVAL 30 DAY)"); // Customer Inactivation
		$mysqli->query("DELETE FROM `hacker` WHERE `date`<(NOW()-INTERVAL 30 DAY)");
	$fname =$mysqli->real_escape_string($_POST['fname']);
	$lname =$mysqli->real_escape_string($_POST['lname']);
	$logIdP =$mysqli->real_escape_string(strtolower($_POST['userid']));
	$pass=$mysqli->real_escape_string($_POST['passOne']);
	$dpass=md5($pass);
	$dpin =$mysqli->real_escape_string($_POST['pinOne']);
	//dpin=md5($pin0);

	$mobile =$mysqli->real_escape_string($_POST['mobile']);
	$gmail =$mysqli->real_escape_string(strtolower($_POST['email']));
	$address =$mysqli->real_escape_string(strtolower($_POST['address']));
	$postal =$mysqli->real_escape_string($_POST['postal']);

	$agent =$mysqli->real_escape_string($_POST['agent']);
	
		$stmt = $mysqli->prepare("SELECT `log_id` FROM `member` where `log_id`=?");
		$stmt->bind_param('s', $logIdP);
		$result = $stmt->execute();
		$stmt->store_result();
		$count=$stmt->num_rows;	
		//($country=='Bangladesh') && (
	if($count==0){
		if($logIdP!='' && $pass!='' && $mobile!='' && $gmail!='' && $address!='' && $postal!=''){
		$logId=time();
		$d=strtotime("+3 Months");$expin=date("Y-m-d", $d);
		$mysqli->query("INSERT INTO `member`(`agent_id`,`user_id`,`log_id`,`pass`,`pin`,`cdate`,`date`,`team`) 
		VALUES('$agent','".$logId."','".$logIdP."','".$dpass."','".$dpin."','".$date."','".$date."','1')"); //team: 1=Customer;0=Member;
	
		$mysqli->query("INSERT INTO `profile`(`address`,`postal`,`user_id`,`fname`,`lname`,`email`,`mobile`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex` ) 
		VALUES ('".$address ."','".$postal ."','".$logId ."','".$fname."','".$lname."','".$gmail."','".$mobile."','".$city."','".$country."','".$bday."','".$bmonth."','".$byear."','".$sex."')");

$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
VALUES ('".$logIdP."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".CustomerSignUpSuccess."','".$date."','".$time."','".$day."')"); 


$to = "$fname $lname<$gmail>"; 
$subject=$title;
$txt = "
Your Login Information

UserId: $logIdP
Password: $pass
Pin: $dpin
Registration Date: $day $time $date

Login Customer Panel (https://$url/checkout.php)
";

$headers = "From:Customer Registration<$email>". "\r\n" . "BCC:$gmail";
mail($to,$subject,$txt,$headers); 
$mobile=$mobile;
$sms="কাস্টমার হিসেবে স্বাগতম,আপনার User:$logIdP, Password:$pass,Pin:$dpin";	
require('db/api_sms.php');


				
				$_SESSION['msgs2']="You are now registered customer <br> UserId: $logIdP <br> Password:$pass";
				header("Location:checkout.php");
				exit();
			}else{
			$_SESSION['msg2']= "Failed";
			header("Location:checkout.php");
			exit();
		}
			
		}else{
			$_SESSION['msg2']= "Try Another User ID";
			header("Location:checkout.php");
			exit();
		}

?>