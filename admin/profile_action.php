<?php ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
	if(($_SESSION['AdminUserId']=='')||(!isset($_SESSION['AdminUserId']))){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';  
	$memberid=$_SESSION['AdminUserId'];  


	$nid=$mysqli->real_escape_string($_POST['nid']);
	$mobile=$mysqli->real_escape_string($_POST['mobile']);
	$fname=$mysqli->real_escape_string($_POST['fname']);	
	$lname=$mysqli->real_escape_string($_POST['lname']);	
	$email=$mysqli->real_escape_string($_POST['email']);	
	$country=$mysqli->real_escape_string($_POST['country']);	
	$father=$mysqli->real_escape_string($_POST['father']);	
	$mother=$mysqli->real_escape_string($_POST['mother']);	
	//$blood=$mysqli->real_escape_string($_POST['blood']);	
	$address=$mysqli->real_escape_string($_POST['address']);	
	$bday=$mysqli->real_escape_string($_POST['bday']);	
	$bmonth=$mysqli->real_escape_string($_POST['bmonth']);	
	$byear=$mysqli->real_escape_string($_POST['byear']);	
	$postal=$mysqli->real_escape_string($_POST['postal']);	
	
    /*INSERT INTO `profile`(`serial`, `user_id`, `sex`, `fname`, `lname`, `photo`, `cover`, `father`, `mother`, `mobile`, `email`, `city`, `state`, `postal`, `voter`, `country`, `vill`, `upozela`, `union`, `address`, `national`, `mbank`, `perfectmoney`, `pmaccount`, `blood`, `bday`, `bmonth`, `byear`, `bank`, `branch`, `account`, `terms`, `swift`, `rank`, `epin`, `last_login`	*/ 
 $prochk=mysqli_num_rows($mysqli->query("SELECT * from `profile` where `user_id`='$memberid' "));
    if($prochk==1){
		if($memberid!=''){   
		$mysqli->query("UPDATE `profile` SET 
		`fname`='".$fname."',
		`lname`='".$lname."',
		`nid`='".$nid."',
		`mobile`='".$mobile."',
		`email`='".$email."',
		`country`='".$country."',
		`father`='".$father."',
		`mother`='".$mother."',
		`address`='".$address."',
		`postal`='".$postal."',
		`bday`='".$bday."',
		`bmonth`='".$bmonth."',
		`byear`='".$byear."'
		WHERE `user_id`='".$memberid."' ");	       
			

		$_SESSION['msgs']="Profile Update Successful";
		header("Location:profile.php?page=User Profile");
		exit();
		}
		else
		{	
		$_SESSION['msg']="Profile Update Failed";
		header("Location:profile.php?page=User Profile");
		exit();
		}
	}else{
		$mysqli->query("INSERT INTO `profile`(`user_id`)values('$memberid') ");
		$_SESSION['msgs']="Profile Created Successful";
		header("Location:profile.php?page=User Profile");
		exit();
	}	
}	
?>