<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';

	if(isset($_POST['brand_add'])){
	    $location="cat.php";
		$brand=$mysqli->real_escape_string($_POST['brand']);

		$cat_id=$mysqli->real_escape_string($_POST['cat_id']);
		$scat_id=$mysqli->real_escape_string($_POST['sub_cat_id']);
		if($brand  ==''){
			$_SESSION['msg'] = "Please Enter Union Name";
			header("Location:$location");
		}else{
		$mysqli->query("INSERT INTO `brand`(`cat_id`, `scat_id`, `brand`) VALUES ('$cat_id','$scat_id','$brand')");
	
		$_SESSION['msgs'] ="Added Successfully";
		header("Location:$location");}
	}
	}
?>