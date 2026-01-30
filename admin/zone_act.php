<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else
	{
	require '../db/db.php';


	$cat_name=$mysqli->real_escape_string(strtolower($_POST['cat']));
	$location="zone.php";
	
	if($cat_name ==''){
			$_SESSION['msg'] ="Please Enter Zone Name";
			header("Location:$location");
			exit();
			}	
 
	
	$chk=mysqli_num_rows($mysqli->query("SELECT * FROM `zone` "));
	if($chk==16){ 
	$_SESSION['msg']="You Can Not Added More then 16 Zone";
	header("Location:$location");
	exit();	
	}
	if(($cat_name!='')&&($chk!=16)){
	$mysqli->query("INSERT INTO `zone`(`zone`) VALUES ('".$cat_name."')");
	$_SESSION['msgs']="zone Added Successful";
	header("Location:$location");
	exit();
	}else{
		$_SESSION['msg']="Failed";
		header("Location:$location");
	}
	
	

}
	
?>