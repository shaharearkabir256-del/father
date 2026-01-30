<?php
ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
else{
require '../db/db.php';
$memberid=$mysqli->real_escape_string($_POST['memberid']);
if(isset($_POST['adminUpBtn'])){ 
	$memberid=$mysqli->real_escape_string($_POST['memberid']);
	$nid=$mysqli->real_escape_string($_POST['nid']);
	$mobile=$mysqli->real_escape_string($_POST['mobile']);
	$fname=$mysqli->real_escape_string($_POST['fname']);	
	$lname=$mysqli->real_escape_string($_POST['lname']);	
	$email=$mysqli->real_escape_string($_POST['email']);	
	$country=$mysqli->real_escape_string($_POST['country']);	
	$father=$mysqli->real_escape_string($_POST['father']);	
	$mother=$mysqli->real_escape_string($_POST['mother']);	
	//$blood=$mysqli->real_escape_string($_POST['blood']);	
	$address=$mysqli->real_escape_string($_POST['address']);	
	$bday=$mysqli->real_escape_string($_POST['bday']);	
	$bmonth=$mysqli->real_escape_string($_POST['bmonth']);	
	$byear=$mysqli->real_escape_string($_POST['byear']);	
	$postal=$mysqli->real_escape_string($_POST['postal']);
	$zip=$mysqli->real_escape_string($_POST['zip']);
if($memberid!=''){ 
	$mysqli->query("UPDATE `profile` SET 
	`nid`='".$nid."',
	`fname`='".$fname."',`fnamec`=1,
	`lname`='".$lname."',`lnamec`=1,
	`father`='".$father."',`fatherc`=1,
	`mother`='".$mother."',`motherc`=1,
	`address`='".$address."',`addressc`=1,
	`zip`='".$zip."',`zipc`=1,
	`postal`='".$postal."',`postalc`=1,
	`bday`='".$bday."',
	`bmonth`='".$bmonth."',
	`byear`='".$byear."',`birthc`=1,profilec=1
	WHERE `user_id`='$memberid' ");	       
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
	else
	{	
	$_SESSION['msg0']="Profile Update Failed";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
}
if(isset($_POST['fnamec'])){
	$fname=$mysqli->real_escape_string($_POST['fname']);
	$mysqli->query("UPDATE `profile` SET `fname`='".$fname."',`fnamec`=1,profilec=1 WHERE `fnamec`=0 and `user_id`='".$memberid."' ");
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
if(isset($_POST['lnamec'])){
	$lname=$mysqli->real_escape_string($_POST['lname']);
	$mysqli->query("UPDATE `profile` SET `lname`='".$lname."',`lnamec`=1,profilec=1 WHERE `lnamec`=0 and `user_id`='".$memberid."' ");
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
if(isset($_POST['fatherc'])){
		$father=$mysqli->real_escape_string($_POST['father']);
	$mysqli->query("UPDATE `profile` SET `father`='".$father."',`fatherc`=1,profilec=1 WHERE `fatherc`=0 and `user_id`='".$memberid."' ");
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
if(isset($_POST['motherc'])){
		$mother=$mysqli->real_escape_string($_POST['mother']);
	$mysqli->query("UPDATE `profile` SET `mother`='".$mother."',`motherc`=1,profilec=1 WHERE `motherc`=0 and `user_id`='".$memberid."' ");
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
if(isset($_POST['addressc'])){
		$address=$mysqli->real_escape_string($_POST['address']);
	$mysqli->query("UPDATE `profile` SET `address`='".$address."',`addressc`=1,profilec=1 WHERE `addressc`=0 and `user_id`='".$memberid."' ");
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
if(isset($_POST['birthc'])){
		$bday=$mysqli->real_escape_string($_POST['bday']);
		$bmonth=$mysqli->real_escape_string($_POST['bmonth']);
		$byear=$mysqli->real_escape_string($_POST['byear']);
	$mysqli->query("UPDATE `profile` SET `bday`='".$bday."',`bmonth`='".$bmonth."',`byear`='".$byear."',`birthc`=1,profilec=1 WHERE `birthc`=0 and `user_id`='".$memberid."' ");
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
if(isset($_POST['postalc'])){
		$postal=$mysqli->real_escape_string($_POST['postal']);
	$mysqli->query("UPDATE `profile` SET `postal`='".$postal."',`postalc`=1,profilec=1 WHERE `postalc`=0 and `user_id`='".$memberid."' ");
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	} 
if(isset($_POST['zipc'])){
		$zip=$mysqli->real_escape_string($_POST['zip']);
	$mysqli->query("UPDATE `profile` SET `zip`='".$zip."',`zipc`=1,profilec=1 WHERE `zipc`=0 and `user_id`='".$memberid."' ");
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	} 

	if(isset($_POST['update2'])){ 
	$memberid=$mysqli->real_escape_string($_POST['memberid']);
	$nid=$mysqli->real_escape_string($_POST['nid']);
	$mobile=$mysqli->real_escape_string($_POST['mobile']);
	$fname=$mysqli->real_escape_string($_POST['fname']);	
	$lname=$mysqli->real_escape_string($_POST['lname']);	
	$email=$mysqli->real_escape_string($_POST['email']);	
	$country=$mysqli->real_escape_string($_POST['country']);	
	$father=$mysqli->real_escape_string($_POST['father']);	
	$mother=$mysqli->real_escape_string($_POST['mother']);	
	//$blood=$mysqli->real_escape_string($_POST['blood']);	
	$address=$mysqli->real_escape_string($_POST['address']);	
	$bday=$mysqli->real_escape_string($_POST['bday']);	
	$bmonth=$mysqli->real_escape_string($_POST['bmonth']);	
	$byear=$mysqli->real_escape_string($_POST['byear']);	
	$postal=$mysqli->real_escape_string($_POST['postal']);	 
	$zip=$mysqli->real_escape_string($_POST['zip']);	 

   if($memberid!=''){ 
	$mysqli->query("UPDATE `profile` SET 
	`fname`='".$fname."',`fnamec`=1,
	`lname`='".$lname."',`lnamec`=1,
	`father`='".$father."',`fatherc`=1,
	`mother`='".$mother."',`motherc`=1,
	`address`='".$address."',`addressc`=1,
	`postal`='".$postal."',`postalc`=1,
	`zip`='".$zip."',`zipc`=1,
	`bday`='".$bday."',
	`bmonth`='".$bmonth."',
	`byear`='".$byear."',`birthc`=1,profilec=1
	WHERE `user_id`='".$memberid."' and profilec=0 ");	       
	$_SESSION['msg1']="Profile Update Successful";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}
	else
	{	
	$_SESSION['msg0']="Profile Update Failed";
	header("Location:member_edit.php?userid=$memberid");
	exit();
	}	
}
	if(isset($_POST['update1'])){
		$earndate=$mysqli->real_escape_string($_POST['earndate']);
		$expireddate=$mysqli->real_escape_string($_POST['expireddate']);
		$memberuserid=$mysqli->real_escape_string($_POST['userid']);
		$memberuserold=$mysqli->real_escape_string($_POST['olduser']);
		$memberuser=$mysqli->real_escape_string($_POST['user']);
		$sponsor=$mysqli->real_escape_string($_POST['sponsor']);
		$placement=$mysqli->real_escape_string($_POST['placement']);
		$position=$mysqli->real_escape_string($_POST['position']);
		$club=$mysqli->real_escape_string($_POST['club']);
		$stype=$mysqli->real_escape_string($_POST['stype']);
		$mobile=$mysqli->real_escape_string($_POST['mobile']);
		$email=$mysqli->real_escape_string($_POST['email']);
		$location="member_edit.php?userid=$memberuserid";
		
		$chk_mem_user=mysqli_num_rows($mysqli->query("SELECT `user_id` FROM `member` WHERE `log_id`='".$memberuser."'"));
		$chk_tree_user=mysqli_num_rows($mysqli->query("SELECT `user_id` FROM `tree` WHERE `user`='".$memberuser."'"));
		if(($chk_mem_user==0)&&($chk_tree_user==0)){
			$mysqli->query("update `tree` set `user`='".$memberuser."' where `user_id`='".$memberuserid."' ");
			$mysqli->query("update `tree` set `upline`='".$memberuser."' where `upline`='".$memberuserold."' ");
			$mysqli->query("update `member` set `log_id`='".$memberuser."' where `user_id`='".$memberuserid."' ");
			$_SESSION['msgs']="User Name Updated Successful!";
			//header("Location:$location");
			//exit();
		}
		$query1=$mysqli->query("SELECT `user_id` FROM `tree` WHERE `user`='".$sponsor."'");
		$chk_sponsor=mysqli_num_rows($query1);
		$sponsor_username=mysqli_fetch_object($query1);

		if($mobile<0){ 
			$_SESSION['msg']="Invalid mobile Value";
			header("Location:$location");
			exit();
		}
		if($mobile!=''){ 
				//$mysqli->query("INSERT INTO `profile`(`user_id`,`fname`,`lname`,`email`,`mobile`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex` ) 
			$mysqli->query("update `profile` set `mobile`='".$mobile."' where `user_id`='".$memberuserid."' ");
		}else{
			$_SESSION['msg']="Enter Mobile Number";
			header("Location:$location");
			exit();
		}
		if($email<0){ 
			$_SESSION['msg']="Invalid email Value";
			header("Location:$location");
			exit();
		}
		if($email!=''){ 
				//$mysqli->query("INSERT INTO `profile`(`user_id`,`fname`,`lname`,`email`,`mobile`,`city`,`country`,`bday`,`bmonth`,`byear`,`sex` ) 
			$mysqli->query("update `profile` set `email`='".$email."' where `user_id`='".$memberuserid."' ");
		}else{
			$_SESSION['msg']="Enter Email Address";
			header("Location:$location");
			exit();
		}
		if($sponsor==''){
			$_SESSION['msg']="Enter Sponsor User Name";
			header("Location:$location");
			exit();
		}
		if($sponsor<0){ 
			$_SESSION['msg']="Invalid Sponsor Value";
			header("Location:$location");
			exit();
		}
		if($chk_sponsor==0){
			$_SESSION['msg']="Invalid Sponsor User Name";
			header("Location:$location");
			exit();
		}
		
		if($placement==''){
			$_SESSION['msg']="Enter Placement User Name";
			header("Location:$location");
			exit();
		}
		if($placement<0){ 
			$_SESSION['msg']="Invalid Placement Value";
			header("Location:$location");
			exit();
		}
		$query2=$mysqli->query("SELECT `user_id` FROM `tree` WHERE `user`='".$placement."'");
		$placement_username=mysqli_fetch_object($query2);
		$chk_placement=mysqli_num_rows($query2);
		if($chk_placement==0){
			$_SESSION['msg']="Invalid Placement User Name";
			header("Location:$location");
			exit();
		}
		if($position==''){
			$_SESSION['msg']="Enter Position";
			header("Location:$location");
			exit();
		}
		if($position<0){ 
			$_SESSION['msg']="Invalid Position Value";
			header("Location:$location");
			exit();
		}
		if(($chk_sponsor==1)&&($sponsor!='')&&($chk_placement==1)&&($placement!='')&&($position!='')){
			
		//$mysqli->query("INSERT INTO `tree`(`user_id`,`user`,`position`,`upline`,`sponsor`,`package`,`date`) 
			$mysqli->query("update `tree` set `get`='$earndate',`expdate`='$expireddate', `sponsor`='".$sponsor_username->user_id."',`upline`='".$placement."',`position`='".$position."',`club`='".$club."',`stype`='$stype' where `user_id`='".$memberuserid."' ");
			
		
		//INSERT INTO `member`(`user_id`,`log_id`,`pass`,`pin`,`sponsor`,`position`,`point`,`upline`,`confirm`,`active`,`date`) 
			$mysqli->query("update `member` set `sponsor`='".$sponsor_username->user_id."',`upline`='".$placement."',`position`='$position',`stype`='$stype' where `user_id`='".$memberuserid."' ");
			
		//$mysqli->query("INSERT INTO `invest`(`user_id`, `invest`, `payable`, `sponsor`, `stepup`, `upline`, `shopping`, `date`)
			$mysqli->query("update `invest` set `sponsor`='".$sponsor_username->user_id."',`upline`='".$placement_username->user_id."',`position`='$position' where `user_id`='".$memberuserid."' ");
			
			$_SESSION['msgs']="Success";
			header("Location:$location");
			exit();
		}else{
			$_SESSION['msg']="Failed";
			header("Location:$location");
			exit();
		}
	}
}
	?>