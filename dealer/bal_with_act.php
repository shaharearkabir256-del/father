<?php ob_start();
	session_start();
	if($_SESSION['DealerLogId'] == '')
	{
	$_SESSION['msg']="Please login first";
	header("Location:logout.php");
	exit();}
	else
	{
	require '../db/db.php';
	require '../db/function.php';
	$memId=$_SESSION['DealerLogId']; 
	
		
	
	
		$recid=$mysqli->real_escape_string($_POST['recid']);
		$method=$mysqli->real_escape_string($_POST['pm']);
		$method_info=$mysqli->real_escape_string($_POST['method_info']);

		
		$amount=$mysqli->real_escape_string($_POST['amount']);
		$pin=$mysqli->real_escape_string($_POST['pin']);
		$location="bal_with.php";

		
		$pc=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$memId."'"));
		$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_balance` WHERE `user_id`='".$memId."'"));
		$pinchk=$pc->pin;
		
		$stkst=mysqli_fetch_object($mysqli->query("SELECT sum(price)as sktp,sum(qty)as skqty,sum(total)as skst,sum(rp)as skrp, sum(trp)as sktrp FROM `stock` where `rec_id`='$memId' "));
		
		$net=$bal->net_bal-$stkst->skst;

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
			if($net<0){
			$_SESSION['msg'] = "You Can not Withdraw ";
			header("Location:$location");
			exit();
			}
			if($net==0){
			$_SESSION['msg'] = "Your Withdraw Amount Nil ";
			header("Location:$location");
			exit();
			}
			
			if($amount>$net){
			$_SESSION['msg'] = "Insufficient Balance";
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
			//$tax=$amount*8/100;
			$total=$amount;
			
		if(($pinchk==$pin)&&($pin!='')&&($amount!='')&&($amount<=$net)){
		$mysqli->query("INSERT INTO `dealer_trx`(`trx_id`,`send_id`,`amount`,`tax`,`total`,`date`,`time`,`day`,`rec_id`,`type`,`status`,`account`,`method`,`method_info`) 
		VALUES('".$trx_id."','".$memId."','".$amount."','".$tax."','$total','".$date."','".$time."','".$day."','$recid','1','0','$pc->type','".$method."','".$method_info."')");
	
		$_SESSION['msgs']= "Successful";
		header("Location:$location");
		exit();
		}else{
		$_SESSION['msg']= "Failed";
		header("Location:$location");
		exit();		
		}
		

	
	}
	
?>