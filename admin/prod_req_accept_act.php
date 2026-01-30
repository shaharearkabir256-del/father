<?php ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';

		$admin=$_SESSION["AdminUserId"]; 
		$pi=$mysqli->real_escape_string($_GET['sn']);
		$location='product_order.php';


		
		$res1=mysqli_fetch_object($mysqli->query("SELECT * FROM `prod_req` where `serial`='".$pi."' "));
		$q2=$mysqli->query("SELECT * FROM `product` where `serial`='".$res1->p_id."' ");
		$prod=mysqli_fetch_object($q2);
		$prodchk=mysqli_num_rows($q2);
		
		if($prodchk==0){
		$_SESSION['msg']="The Product is not in Stock write now.";       
		header("Location:$location");
		exit();	
		}
		
		if($prod->stock<$res1->qty){
		$_SESSION['msg']="Insufficient Stock.";       
		header("Location:$location");
		exit();	
		}
		$qtyup=$prod->stock-$res1->qty;
		$cash=$res1->price*$res1->qty;
		$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` where `user_id`='".$admin."'"));
		if($bal->net_bal<$cash){
		$_SESSION['msg']="Insufficient Balance.";       
		header("Location:$location");
		exit();	
		}	
		$q1=$mysqli->query("SELECT * FROM `stock` where `p_id`='".$res1->p_id."' and `rec_id`='$res1->send_id' ");
		$stk=mysqli_fetch_object($q1);
		$stkup=$stk->qty+$res1->qty;
		$stkchk=mysqli_num_rows($q1);
		//$delbal=mysqli_fetch_object($mysqli->query("SELECT `royalty` from `dealer_balance` where `user_id`='".$res1->send_id."' "));
		//$divission=$res1->division*$res1->qty;
		//$royaltyup=$delbal->royalty+$divission;
		//INSERT INTO `prod_req`(`send_id`, `rec_id`, `p_id`, `division`, `district`,`upozela`, `dunion`, `ward`, `dsd`, `name`, `price`, `rp`, `img1`, `qty`, `date`, `chk`) 
		if($stkchk==0){
			//$mysqli->query("update `dealer_balance` set `royalty`='".$royaltyup."' where `user_id`='".$res1->send_id."' ");
			$mysqli->query("update `prod_req` set `chk`='1' where `serial`='".$pi."' ");
			$mysqli->query("update `product` set `stock`='".$qtyup."' where `serial`='$res1->p_id' ");
			//$mysqli->query("update `stock` set `qty`='".$qtyup."' where `p_id`='".$res1->p_id."' and `rec_id`='".$admin."' "); 
			$mysqli->query("INSERT INTO `stock`(`send_id`, `rec_id`, `p_id`, `division`, `district`,`upozela`,`dunion`, `ward`, `dsd`, `name`, `price`, `rp`, `img1`, `qty`, `date`, `chk`) 
			VALUES ('".$res1->rec_id."','".$res1->send_id."','".$res1->p_id."','".$res1->division."','".$res1->district."','".$res1->upozela."','".$res1->dunion."','".$res1->ward."','".$res1->dsd."','".$res1->name."','".$res1->price."','".$res1->rp."','".$res1->img1."','".$res1->qty."','".$date."','1')");	
		/* 	$mysqli->query("INSERT INTO `dealer_trx`(`send_id`, `rec_id`, `amount`,`type`, `method`, `status`, `account`, `day`, `date`, `time`, `take`) 
			VALUES ('$admin','$res1->send_id','$cash','0','0','1','6','$day','$date','$time','1')"); */
			$_SESSION['msgs']="Stock Share Successful.";       
			header("Location:$location");
			exit();	
			}else{
				//$mysqli->query("update `dealer_balance` set `royalty`='".$royaltyup."' where `user_id`='".$res1->send_id."' ");
				$mysqli->query("update `stock` set `qty`='".$stkup."' where `p_id`='".$res1->p_id."' and `rec_id`='$res1->send_id' ");
				$mysqli->query("update `prod_req` set `chk`='1' where `serial`='".$pi."' ");
				
				$mysqli->query("update `product` set `stock`='".$qtyup."' where `serial`='$res1->p_id' ");
				//$mysqli->query("update `stock` set `qty`='".$qtyup."' where `p_id`='".$res1->p_id."' and `rec_id`='".$admin."' "); 
				/* $mysqli->query("INSERT INTO `dealer_trx`(`send_id`, `rec_id`, `amount`,`type`, `method`, `status`, `account`, `day`, `date`, `time`, `take`) 
				VALUES ('$admin','$res1->send_id','$cash','0','0','1','6','$day','$date','$time','1')"); */
				$_SESSION['msgs']="Stock Update Successful.";       
				header("Location:$location");
				exit();
			}
			$recid=$res1->send_id;
			require('../db/cal_del.php');
}


?>