<?php ob_start();
	session_start();
	error_reporting(0);
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require('../db/db.php');
		$recid=$_SESSION['AdminUserId'];
		require('../db/cal_ad.php');
		
		$admin=$_SESSION["AdminUserId"]; 
	
		
		$sn=$mysqli->real_escape_string($_POST['serial']);
		$Name=$mysqli->real_escape_string($_POST['Name']);
		$Price=$mysqli->real_escape_string($_POST['Price']);
		$Point=$mysqli->real_escape_string($_POST['Point']);
		$chksn=mysqli_num_rows($mysqli->query("SELECT * FROM `prod` WHERE `serial`='$sn' "));
		$q1=$mysqli->query("SELECT * FROM `prod` WHERE `name`='$Name' ");
		$chk=mysqli_num_rows($q1);
		$prod=mysqli_fetch_object($q1);
		
		$location="prod_add.php?page=Add New Product";
		$locationup="prod_add.php?serial=$sn";
		
			if($Name==''){
			$_SESSION['msg'] = "Please Enter Name ";
			header("Location:$location");
			exit();
			}
			if($Price==''){
			$_SESSION['msg'] = "Please Enter Price ";
			header("Location:$location");
			exit();
			}
			if($Point==''){
			$_SESSION['msg'] = "Please Enter Point ";
			header("Location:$location");
			exit();
			}
			if($Price<0){
			$_SESSION['msg'] = "Invalid Price Type ";
			header("Location:$location");
			exit();
			}
			if($Point<0){
			$_SESSION['msg'] = "Invalid Point Type ";
			header("Location:$location");
			exit();
			}
			if(isset($_POST['submit'])){
				if($chk==1){
				$_SESSION['msg'] = "This Product Name Already Taken";
				header("Location:$location");
				exit();
				}
				
				if(($chk==0)&&($Name!='')&&($Price!='')&&($Point!='')){
				$mysqli->query("INSERT INTO `prod`(`name`,`price`,`point`,`sdate`) 
				VALUES('".$Name."','".$Price."','".$Point."','".$date."')");
				
				$_SESSION['msgs']= "Submission Successful";
				header("Location:$location");
				exit();
				}else{
				$_SESSION['msg']= "Submission Failed";
				header("Location:$location");
				exit();		
				}
			}
			if(isset($_POST['upgrade'])){
				if(($chksn==1)&&($Name!='')&&($Price!='')&&($Price>0)&&($Point!='')&&($Point>0)){
				$mysqli->query("UPDATE `prod` SET 
				`name`='".$Name."',
				`price`='".$Price."',
				`point`='".$Point."' where `serial`='$sn' ");
				$_SESSION['msgs']= "Upgrade Successful";
				header("Location:$locationup");
				exit();
				}else{
				$_SESSION['msg']= "Upgrade Failed";
				header("Location:$locationup");
				exit();		
				}
			}
			
	}
?>