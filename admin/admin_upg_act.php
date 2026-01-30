<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
	//require_once 'function.php';
		$admin=$_SESSION["AdminUserId"]; 
	
		
		$user_id=$mysqli->real_escape_string($_POST['user_id']);
		$dname=$mysqli->real_escape_string($_POST['dname']);
		$mobile=$mysqli->real_escape_string($_POST['mobile']);
		$mbank=$mysqli->real_escape_string($_POST['mbank']);
		$pmaccount=$mysqli->real_escape_string($_POST['pmaccount']);
		$address=$mysqli->real_escape_string($_POST['address']);
		$sponsor=$mysqli->real_escape_string($_POST['sponsor']);
		$type=$mysqli->real_escape_string($_POST['type']);
		$zone=$mysqli->real_escape_string($_POST['zone']);
		$upozela=$mysqli->real_escape_string($_POST['upozela']);
		$union=$mysqli->real_escape_string($_POST['union']);
		$ward=$mysqli->real_escape_string($_POST['ward']);
		$agent=$mysqli->real_escape_string($_POST['agent']);		
		$user=$mysqli->real_escape_string(strtolower($_POST['mUserid']));		
		$dpass=$mysqli->real_escape_string($_POST['mPass']);
		$pass=md5($dpass);		
		$epass=$mysqli->real_escape_string($_POST['mCpass']);
		$cpass=md5($epass);
		$cpin=$mysqli->real_escape_string($_POST['mPin']);	
		$pin=md5($cpin);
		$mail=$mysqli->real_escape_string(strtolower($_POST['mMail']));
		
		$location="admin_add.php?userid=$user_id";
		
		$del_sql=$mysqli->query("SELECT * FROM `admin` WHERE `user_id`='".$user_id."'");
		
				$delchk=mysqli_num_rows($del_sql);
		$delinfochk=mysqli_num_rows($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$user_id."'"));
		if($delinfochk==0){
		$mysqli->query("INSERT INTO `profile`(`user_id`,`fname`,`lname`,`email`,`mobile`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex`,address )VALUES ('".$user_id ."','".$dname."','".$lname."','".$mail."','".$mobile."','".$city."','".$country."','".$bday."','".$bmonth."','".$byear."','".$sex."','".$address."')");			
		}
		$adminbalchk=mysqli_num_rows($mysqli->query("SELECT * FROM `balance` WHERE `user_id`='".$user_id."'"));
		if($adminbalchk==0){
		$mysqli->query("INSERT INTO `balance` (`user_id`) VALUES ('".$user_id."')");
		}
		if(isset($_POST['proup'])){
			if($delchk==1){
				$mysqli->query("update `profile` set 
				`fname`='".$dname."',
				`mobile`='".$mobile."', 
				`mbank`='".$mbank."', 
				`pmaccount`='".$pmaccount."', 
				`address`='".$address."', 
				`email`='".$mail."' 
				where `user_id`='".$user_id."' ");
				$_SESSION['msgs'] = "Upgrade Successful ";
				header("Location:$location");
				exit();
			}else{
				$_SESSION['msg'] = "Failed ";
				header("Location:$location");
				exit();	
			}
		}
		if(isset($_POST['passup'])){
			if($delchk==1){
				$mysqli->query("update `admin` set 
				`type`='".$type."',
				`pass`='".$cpass."',
				`pdate`='".$date."',
				`pin`='".$pin."',
				`pndate`='".$date."'
				where `user_id`='".$user_id."' ");
				$_SESSION['msgsp'] = "Upgrade Successful ";
				header("Location:$location");
				exit();
			}else{
				$_SESSION['msgp'] = "Failed ";
				header("Location:$location");
				exit();	
			}
		}
		
	}
	
?>