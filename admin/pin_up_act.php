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
		$pin=md5($dpass);
		$epass=$mysqli->real_escape_string($_POST['password2']);
	

		$location="profile.php?page=User Profile&active=pin";
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
			$_SESSION['pnmsg'] = "Please Enter Pin Code ";
			header("Location:$location");
			exit();
			}
			if($epass==''){
			$_SESSION['pnmsg'] = "Please Enter Confirm Pin Code ";
			header("Location:$location");
			exit();
			}
			if($dpass!=$epass){
			$_SESSION['pnmsg'] = "Not Match ";
			header("Location:$location");
			exit();
			}
		
		if(($gmail!='')&&($dpass==$epass)&&($dpass!='')&&($epass!='')){			
		$mysqli->query("update `admin` set `pin`='".$pin."',`pndate`='".$date."' where `user_id`='".$memId."'");
		$to = "$fname $lname<$gmail>";
			$subject=$title;
			$txt = "
			Pin Code Updated
			
			Your Login Information:
			
			User Name: $adm->user
			Pin Code: $dpass
			
			Pin Code Updated Date: $day $time $date
			
			Login Admin Panel (https://$url/admin)
			";
			
			$headers = "From:Pin Code Updated<$email>";
			mail($to,$subject,$txt,$headers);
$mobile=$pro->mobile;
$sms=$txt;			
require('../db/api_sms.php');
		$_SESSION['pmnsgs']= "Pin Code Updated";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['pnmsg']= "Failed";
		header("Location:$location");
		exit();
		}
		

	
	}
	
?>