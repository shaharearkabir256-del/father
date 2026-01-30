<?php ob_start();
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
		if(($_SESSION['num_login_fail']<4)&&($_POST["CSRM"]==$_COOKIE["CSRM"]))
{
	require ("../db/db.php");
	require 'browser.php';
	$ua=getBrowser();
	$browser=$ua['platform'].$ua['name'].$ua['version'];
	$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
	$country = "$xml->geoplugin_countryName";
	$city = "$xml->geoplugin_regionName";
	
	$user =$mysqli->real_escape_string(strtolower($_POST['userid']));
	$loginpass =$mysqli->real_escape_string($_POST['userPassOne']);
	$pin =$mysqli->real_escape_string($_POST['CSRM']);
	$dpass=md5($loginpass);
	$mysqli->query("update `member` set `active`=0 WHERE `team`=1 and `cdate`<(NOW()-INTERVAL 30 DAY)"); // Customer Inactivation
/* 	$conchk=mysqli_num_rows($mysqli->query("select `log_id`,`user_id`,`pass`,`active` from `member` where `log_id`='".$user."' and `pass`='".$dpass."' and `confirm`='1'"));
	if($conchk==0){
			$errm="You Are Not Confirmed By Your Sponsor";
			header("Location:index.php?Error=invalid&&errm=$errm");	
			exit();
	} */
	$stmt = $mysqli->prepare("SELECT `log_id`,`pass` FROM `member` where `log_id`=? and `pass`=? ");
	$stmt->bind_param('ss', $user, $dpass);
	$result = $stmt->execute();
	$stmt->store_result();
	$count=$stmt->num_rows;	

	if($count==1){	
		$result=$mysqli->query("select `log_id`,`user_id`,`pass`,`active` from `member` where `log_id`='".$user."' and `pass`='".$dpass."' and `active`=1 ");
		$row=$result->fetch_array();
		$check= mysqli_num_rows($result);	
		$result->close();
		$mysqli->query("DELETE FROM `hacker` WHERE `date`<(NOW()-INTERVAL 10 DAY)");
		if($check==1){
			$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
		VALUES ('".$user."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".MemInLogInSuccess."','".$date."','".$time."','".$day."')"); 
		
			$id=$row['user_id'];
			$_SESSION['MemLogId']=$id;
			$_SESSION['pin'] = $pin;
			session_write_close();
			header("Location:home.php?page=Dashboard");
			exit();
			}else{
				$_SESSION['num_login_fail'] ++;
				$_SESSION['last_login_time'] = time();	
				$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
				VALUES ('".$user."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".MemInLogInFailed."','".$date."','".$time."','".$day."')"); 
				$_SESSION['msg']="You Are Suspended";
				header("Location:index.php");				
			}
		
	}else{
		$_SESSION['num_login_fail'] ++;
		$_SESSION['last_login_time'] = time();	
		$mysqli->query("INSERT INTO `hacker`(`user_id`,`pass`, `ip`, `city`, `country`, `browser`, `status`, `date`, `time`, `day`) 
		VALUES ('".$user."','".$dpass."','".$ip."','".$city."','".$country."','".$browser."','".MemInLogInFailed."','".$date."','".$time."','".$day."')"); 
		$_SESSION['msg']= "Invalid ID or Password";
		header("Location:index.php");
		exit();
	}

	
}else 
	{
		$_SESSION['num_login_fail'] ++;
		$_SESSION['last_login_time'] = time();	
		$_SESSION['msg']="Unauthorize Access for login !!!";
		header("Location:index.php");
		exit();
	}

?>