<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		
        $catid=$mysqli->real_escape_string($_GET['catid']);
        $location="cat.php";

if($catid!=''){
	
    //$mysqli->query("DELETE FROM `cat` WHERE `cat_id`='".$catid."' ");
	$_SESSION["msgs"]="DELETE Successful";
	header("Location:$location");

}
else{
	$_SESSION["msg"]="DELETE Fail";
	header("Location:$location");
	
}

}

	 
?>