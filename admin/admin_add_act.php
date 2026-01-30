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
	
		
		$fname=$mysqli->real_escape_string($_POST['dname']);
		$mobile=$mysqli->real_escape_string($_POST['mobile']);
		$mbank=$mysqli->real_escape_string($_POST['mbank']);
		$pmaccount=$mysqli->real_escape_string($_POST['pmaccount']);
		$address=$mysqli->real_escape_string($_POST['address']);
		//$sponsor=$mysqli->real_escape_string($_POST['sponsor']);
		$type=$mysqli->real_escape_string($_POST['type']);
		//$zone=$mysqli->real_escape_string($_POST['zone']);
		//$upozela=$mysqli->real_escape_string($_POST['upozela']);
		//$union=$mysqli->real_escape_string($_POST['union']);
		//$ward=$mysqli->real_escape_string($_POST['ward']);
		//$agent=$mysqli->real_escape_string($_POST['agent']);		
		$user=$mysqli->real_escape_string(strtolower($_POST['mUserid']));		
		$dpass=$mysqli->real_escape_string($_POST['mPass']);
		$pass=md5($dpass);		
		$epass=$mysqli->real_escape_string($_POST['mCpass']);
		$cpass=md5($epass);
		$pinCode=$mysqli->real_escape_string($_POST['mPin']);
		$pin=md5($pinCode);		
		$mail=$mysqli->real_escape_string(strtolower($_POST['mMail']));
		
		$location="admin_add.php";
		
		$check=mysqli_num_rows($mysqli->query("SELECT * FROM `admin` WHERE `user`='".$user."'"));

		
		

			if($type==''){
			$_SESSION['msg'] = "Please Enter Admin Type ";
			header("Location:$location");
			exit();
			}
			
			
			if($user==''){
			$_SESSION['msg'] = "Please Enter User id ";
			header("Location:$location");
			exit();
			}
			if($pass==''){
			$_SESSION['msg'] = "Please Enter Password ";
			header("Location:$location");
			exit();
			}
			if($cpass==''){
			$_SESSION['msg'] = "Please Enter Confirm Password ";
			header("Location:$location");
			exit();
			}
			if($pin==''){
			$_SESSION['msg'] = "Please Enter Confirm Password ";
			header("Location:$location");
			}
			if($mail==''){
			$_SESSION['msg'] = "Please Enter Confirm Password ";
			header("Location:$location");
			exit();
			}
			if($check==1){
			$_SESSION['msg'] = "This User id Already Taken, Pleas Choose Another User id";
			header("Location:$location");
			exit();
			}

			if($pass!=$cpass){
				$_SESSION['msg'] = "Please Enter Password both are the same";
				header("Location:$location");
				exit();
			}
		//SELECT `serial`, `user`, `user_id`, `pass`, `pdate`, `pin`, `pndate`, `email`, `type`, `jdate`, `active`, `chk`, `llog`, `logout`, `ip`, `browser`, `city`, `country` FROM `admin` WHERE 1
		
		if(($check==0)&&($pass=$cpass)&&($user!='')&&($pass!='')&&($cpass!='')&&($pin!='')&&($mail!='')){			
		$userId=time();
		//INSERT INTO `admin`(`serial`, `user`, `user_id`, `pass`, `pdate`, `pin`, `pndate`, `email`, `type`, `jdate`, `active`, `chk`, `llog`, `logout`, `ip`, `browser`, `city`, `country`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18])
		$mysqli->query("INSERT INTO `admin`(`type`,`user_id`,`user`,`pass`, `pdate`,`pin`, `pndate`,`jdate`,`chk`) 
		VALUES ('".$type."','".$userId."','".$user."','".$cpass."','".$date."','".$pin."','".$date."','".$date."','1')");
		
		//SELECT `serial`, `user_id`, `sex`, `fname`, `lname`, `photo`, `cover`, `father`, `mother`, `mobile`, `email`, `city`, `state`, `postal`, `voter`, `country`, `vill`, `upozela`, `union`, `address`, `national`, `mbank`, `perfectmoney`, `pmaccount`, `blood`, `bday`, `bmonth`, `byear`, `bank`, `branch`, `account`, `terms`, `swift`, `rank`, `epin`, `last_login` FROM `profile` WHERE 1
		$mysqli->query("INSERT INTO `profile`(`user_id`,`fname`,`lname`,`email`,`mobile`,`mbank`,`pmaccount`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex`,address )VALUES ('".$userId ."','".$fname."','".$lname."','".$mail."','".$mobile."','".$mbank."','".$pmaccount."','".$city."','".$country."','".$bday."','".$bmonth."','".$byear."','".$sex."','".$address."')");
		$mysqli->query("INSERT INTO `balance` (`type`,`user_id`) VALUES ('1','".$userId."')"); // Type: 1 = Admin ; 0 = Member
		
		$_SESSION['msgs']= "New Admin Added Successful";
		header("Location:admin.php");
		exit(); 
		}

	
	}
	
?>