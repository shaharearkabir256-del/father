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
		
		$epass=$mysqli->real_escape_string($_POST['password2']);
	

		$location="pin.php";
		

			if($dpass==''){
			$_SESSION['msg'] = "Please Enter Pin Code ";
			header("Location:$location");
			exit();
			}
			if($epass==''){
			$_SESSION['msg'] = "Please Enter Confirm Pin Code ";
			header("Location:$location");
			exit();
			}
			if($dpass!=$epass){
			$_SESSION['msg'] = "Not Match ";
			header("Location:$location");
			exit();
			}
		
		if(($dpass==$epass)&&($dpass!='')&&($epass!='')){			
		$mysqli->query("update `member` set `pin`='".$dpass."',`pndate`='".$date."' where `user_id`='".$memId."'");
		$_SESSION['msgs']= "Pin Code Updated";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Failed";
		header("Location:$location");
		exit();
		}
		

	
	}
	
?>