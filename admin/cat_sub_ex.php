<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		
	if(isset($_GET['cat_id'])){

	if($_GET['cat_id']=="sub_cat"){
		$sub_catid=$_GET['ref_id'];
		echo "<option>Select</option>";
		$result=$mysqli->query("SELECT * FROM `scat` WHERE `cat_id`='".$sub_catid."'");
		while($res = mysqli_fetch_object($result)){
			
		echo "<option value='$res->scat_id'> "; echo $res->scat; echo "</option>";
		} 
	}
}
}
?>