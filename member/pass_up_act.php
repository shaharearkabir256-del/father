<?php 
session_start();
	if( $_SESSION['MemLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: ../member/logout.php");
		exit();
	}
	else{
		require '../db/db.php';
		$memId=$_SESSION['MemLogId'];
			
		$dpass=$mysqli->real_escape_string($_POST['password1']);
		$pass=md5($dpass);		
		$epass=$mysqli->real_escape_string($_POST['password2']);
		$cpass=md5($epass);

		$location="pass.php";
		

			if($dpass==''){
			$_SESSION['msg'] = "Please Enter Password ";
			header("Location:$location");
			exit();
			}
			if($epass==''){
			$_SESSION['msg'] = "Please Enter Confirm Password ";
			header("Location:$location");
			exit();
			}
			if($dpass!=$epass){
			$_SESSION['msg'] = "Not Match ";
			header("Location:$location");
			exit();
			}
		
		if(($dpass==$epass)&&($dpass!='')&&($epass!='')){			
		$mysqli->query("update `member` set `pass`='".$cpass."', `pdate`='".$date."' where `user_id`='".$memId."'");
		$_SESSION['msgs']= "Password Updated";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Failed";
		header("Location:$location");
		exit();
		}
		

	
	}
	
?>