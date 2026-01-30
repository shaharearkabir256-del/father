<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';
		require '../db/function.php';
	$rec_id=$_SESSION['DealerLogId']; 
	
		
		$send_id=$mysqli->real_escape_string($_POST['recid']);
		$dtype=$mysqli->real_escape_string($_POST['dtype']);
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		$location="bal_req.php";

		
		$pc=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$rec_id."'"));
		$pinchk=$pc->pin;


			if($amount==''){
			$_SESSION['msg'] = "Please Enter Amount ";
			header("Location:$location");
			exit();
			}
			if($amount<0){
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
			if($amount==0){
			$_SESSION['msg'] = "Invalid Amount Type ";
			header("Location:$location");
			exit();
			}
	
			if($pin==''){
			$_SESSION['msg'] = "Please Enter pin Number";
			header("Location:$location");
			exit();
			}
			if($pinchk!=$pin){
			$_SESSION['msg'] = "Wrong pin Number ";
			header("Location:$location");
			exit();
			}

			
		if(($pinchk==$pin)&&($pin!='')&&($amount!='')){
		$mysqli->query("INSERT INTO `dealer_trx`(`trx_id`,`send_id`,`amount`,`date`,`time`,`day`,`rec_id`,`type`,`account`) 
		VALUES('".$trx_id."','".$send_id."','".$amount."','".$date."','".$time."','".$day."','$rec_id','2','$dtype')");

		$_SESSION['msgs']= "Request Send";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Request Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>