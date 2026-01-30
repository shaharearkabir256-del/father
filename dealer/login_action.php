<?php 
ob_start();
	session_start();
	
		if(isset($_SESSION['num_login_fail'])){
	  if($_SESSION['num_login_fail']>3){
	     if(time() - $_SESSION['last_login_time'] < 3*60 ) 
	      {  
			$_SESSION['msg']="Please wait for 3 minutes";
			header("Location: logout.php");
			exit();

	      }
	      else
	      {
	        //after 10 minutes
	         $_SESSION['num_login_fail'] = 0;
	      }
	   }      
	}
	
if(($_SESSION['num_login_fail']<4)&&($_POST["CSRD"]==$_COOKIE["CSRD"])){
	require ("../db/db.php");
	require 'browser.php';
	$ua=getBrowser();
	$browser=$ua['platform'].$ua['name'].$ua['version'];
	
	$url = 'location.xml'; 
	$xml = simpleXML_load_file("$url");
	$country = "$xml->geoplugin_countryName";
	$city = "$xml->geoplugin_regionName";
	
	$user =$mysqli->real_escape_string(strtolower($_POST['userid']));
	$loginpass =$mysqli->real_escape_string($_POST['userPassOne']);
	$pin =$mysqli->real_escape_string($_POST['CSRD']);
	$dpass=md5($loginpass);
	
	$stmt = $mysqli->prepare("SELECT `log_id`,`pass` FROM `dealer` where `log_id`=? and `pass`=? ");
	$stmt->bind_param('ss', $user, $dpass);
	$result = $stmt->execute();
	$stmt->store_result();
	$count=$stmt->num_rows;	

	if($count==1){	
		$result=$mysqli->query("select `log_id`,`user_id`,`pass`,`chk` from `dealer` where `log_id`='".$user."' and `pass`='".$dpass."' and `chk`='1'");
		$row=$result->fetch_array();
		$check= mysqli_num_rows($result);
		$result->close();
		
		if($check==1){
		$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
		VALUES ('".$user."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".AdmLogInSuccess."','".$date."','".$time."','".$day."')"); 
		
			$id=$row['user_id'];
			$_SESSION['DealerLogId'] =$id;
			$_SESSION['pin']=$pin;
			session_write_close();
			$mysqli->query("update `dealer` SET `active`=1,`last_login`='$date',`ip`='$ip',`browser`='$browser',`city`='$city',`country`='$country' where `log_id`='$user' ");
			$_SESSION['msgs']= "Wellcome";
			header("Location: home.php"); 
			exit();
		}else{
			$_SESSION['num_login_fail'] ++;
			$_SESSION['last_login_time'] = time();
			$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
			VALUES ('".$user."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".AdmLogInFailedForUserSuspended."','".$date."','".$time."','".$day."')"); 
			$_SESSION['msg']= "You Are Suspended";
			header("Location:index.php"); 
			exit();
		}
	}else{
		$_SESSION['num_login_fail'] ++;
		$_SESSION['last_login_time'] = time();
		$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
		VALUES ('".$user."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".AdmLogInFailedForInvalidUserPass."','".$date."','".$time."','".$day."')"); 
		$_SESSION['msg'] = "Invalid ID or Password";
		header("Location:index.php"); 
		exit();
	}
	
}else{
		$_SESSION['num_login_fail'] ++;
		$_SESSION['last_login_time'] = time();	
		$_SESSION['msg']="Unauthorize Access for login !!!";
		header("Location:index.php");
		exit();
	}
?>