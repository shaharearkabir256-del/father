<?php ob_start();
	session_start();
	if( $_SESSION['DealerLogId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location:logout.php");
		exit();
	}
	else{
		require '../db/db.php';

		$mem=$_SESSION["DealerLogId"]; 
		$prser=$mysqli->real_escape_string($_GET['sn']);
		$location='prod_req_list2.php';
		$res1=mysqli_fetch_object($mysqli->query("SELECT * FROM `prod_req` where `serial`='".$prser."' "));
		$q2=$mysqli->query("SELECT * FROM `stock` where `p_id`='".$res1->p_id."' and `rec_id`='".$res1->rec_id."' "); // My Stock chk
		$stk=mysqli_fetch_object($q2);
		$stkchk=mysqli_num_rows($q2);
		
		if($stkchk==0){
		$_SESSION['msg']="The Product is not in Stock write now.";       
		header("Location:$location");
		exit();	
		}
		if($stk->qty<$res1->qty){
		$_SESSION['msg']="Insufficient Stock.";       
		header("Location:$location");
		exit();	
		}
		$qtyup=$stk->qty-$res1->qty;
		$cash=$res1->price*$res1->qty;
		$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_balance` where `user_id`='".$mem."'"));
/* 		if($bal->net_bal<$cash){
		$_SESSION['msg']="Insufficient Balance.";       
		header("Location:$location");
		exit();	
		} */
		$q1=$mysqli->query("SELECT * FROM `stock` where `p_id`='".$res1->p_id."' and `rec_id`='$res1->send_id' "); //RequestId Stock chk
		$reqstk=mysqli_fetch_object($q1);
		$reqstkup=$reqstk->qty+$res1->qty;
		$reqstkchk=mysqli_num_rows($q1);
		$delrec=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `user_id`='".$res1->send_id."'")); //RequestId Type chk
		
		$delbal=mysqli_fetch_object($mysqli->query("SELECT `royalty`,`dsd` from `dealer_balance` where `user_id`='".$res1->send_id."' "));
		
		if($delrec->type==1){
		$division=$res1->division*$res1->qty;
		$royaltyup=$delbal->royalty+$division;	//Royalty For Division Dealer
		
		$div=$res1->division*$res1->qty;
		$royaltyupreqstkchk=$reqstk->division+$div;
		
		}elseif($delrec->type==2){
		$district=$res1->district*$res1->qty;
		$royaltyup=$delbal->royalty+$district;	//Royalty For District Dealer
		
		$dis=$res1->district*$res1->qty;
		$royaltyupreqstkchk=$reqstk->district+$dis;
		
		}elseif($delrec->type==3){
		$upozela=$res1->upozela*$res1->qty;
		$royaltyup=$delbal->royalty+$upozela;	//Royalty For Upozela Dealer	
		
		$up=$res1->upozela*$res1->qty;
		$royaltyupreqstkchk=$reqstk->upozela+$up;
		
		}elseif($delrec->type==4){
		$dunion=$res1->dunion*$res1->qty;
		$royaltyup=$delbal->royalty+$dunion; //Royalty For Ward/Union Dealer	

		$un=$res1->dunion*$res1->qty;
		$royaltyupreqstkchk=$reqstk->dunion+$un;
		
		}elseif($delrec->type==5){
		$ward=$res1->ward*$res1->qty;
		$royaltyup=$delbal->royalty+$ward; //Royalty For Agent
		
		$wu=$res1->ward*$res1->qty;
		$royaltyupreqstkchk=$reqstk->ward+$wu;
		
		$dsd=$res1->dsd*$res1->qty;
		$dsdupreqstkchk=$reqstk->dsd+$dsd;
		
		$dsd=$res1->dsd*$res1->qty;
		$dsdup=$delbal->dsd+$dsd; //DSD For Agent
		}else{}

			/* 	`district`='".$royaltyupreqstkchk."',
				`upozela`='".$royaltyupreqstkchk."',
				`dunion`='".$royaltyupreqstkchk."',
				`ward`='".$royaltyupreqstkchk."',
				`dsd`='".$dsdupreqstkchk."' */
				
			//INSERT INTO `prod_req`(`send_id`, `rec_id`, `p_id`, `division`, `district`,`upozela`, `dunion`, `ward`, `dsd`, `name`, `price`, `rp`, `img1`, `qty`, `date`, `chk`) 
		if($reqstkchk==0){
			$mysqli->query("update `dealer_balance` set `royalty`='".$royaltyup."',`dsd`='".$dsdup."' where `user_id`='".$res1->rec_id."' "); // Get Com Who Sell
			$mysqli->query("INSERT INTO `stock`(`send_id`, `rec_id`, `p_id`, `division`, `district`,`upozela`,`dunion`, `ward`, `dsd`, `name`, `price`, `rp`, `img1`, `qty`, `date`, `chk`) 
			VALUES ('".$res1->rec_id."','".$res1->send_id."','".$res1->p_id."','".$res1->division."','".$res1->district."','".$res1->upozela."','".$res1->dunion."','".$res1->ward."','".$res1->dsd."','".$res1->name."','".$res1->price."','".$res1->rp."','".$res1->img1."','".$res1->qty."','".$date.$time."','1')");	
			$mysqli->query("update `prod_req` set `chk`='1' where `serial`='".$prser."' ");
			$mysqli->query("update `stock` set `qty`='$qtyup' where `p_id`='".$res1->p_id."' and `rec_id`='$res1->rec_id' "); // My Stock Up
/* 			$mysqli->query("INSERT INTO `dealer_trx`(`send_id`, `rec_id`, `amount`,`type`, `method`, `status`, `account`, `day`, `date`, `time`, `take`) 
			VALUES ('$res1->rec_id','$res1->send_id','$cash','0','0','1','$delrec->type','$day','$date','$time','1')"); */
			$_SESSION['msgs']="Stock Share Successful.";       
			header("Location:$location");
			exit();	
			}else{
				$mysqli->query("update `dealer_balance` set `royalty`='".$royaltyup."',`dsd`='".$dsdup."' where `user_id`='".$res1->rec_id."' "); // Get Com Who Sell
				$mysqli->query("update `stock` set `qty`='".$reqstkup."' where `p_id`='".$res1->p_id."' and `rec_id`='$res1->send_id' "); //RequestId Stock Up
				$mysqli->query("update `prod_req` set `chk`='1' where `serial`='".$prser."' ");
				$mysqli->query("update `stock` set `qty`='$qtyup' where `p_id`='".$res1->p_id."' and `rec_id`='$res1->rec_id' "); // My Stock Up
/* 				$mysqli->query("INSERT INTO `dealer_trx`(`send_id`, `rec_id`, `amount`,`type`, `method`, `status`, `account`, `day`, `date`, `time`, `take`) 
				VALUES ('$res1->rec_id','$res1->send_id','$cash','0','0','1','$del->type','$day','$date','$time','1')");
 */
				$_SESSION['msgs']="Stock Update Successful.";       
				header("Location:$location");
				exit();
			}
}


?>