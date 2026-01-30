<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';
		
		$id=$_SESSION['DealerLogId'];
		$invoice=$_GET['invoice'];
		$memId=$_GET['memberUserId'];
		$location="prod_invoice.php?pageName=Invoice%20List";
		if($invoice!=''){
		$mysqli->query("update `invoice` set `paid`='1' WHERE `invoice`='".$invoice."' and `agent_id`='$id' ");
		$inv_chk=mysqli_num_rows($mysqli->query("select * from `invoice` where `user_id`='$memId' and `invoice`='$invoice' and `sdate`='$date' and `type`=0 "));
		if($inv_chk==1){
		$res=mysqli_fetch_object($mysqli->query("select `get` from `tree` where `user_id`='$memId' "));
		$get=($res->get+1); $mysqli->query("update `tree` set `get`='$get' where `user_id`='$memId' ");
		}
		
		/* SELECT `serial`, `paid`, `delivery`, `delivery_charge_percent`, `delivery_charge`, `invoice`, `prod_id`, `product_id`, `user_id`, `sponsor`, 
		`agent_id`, `agent_com`, `account`, `name`, `price`, `qty`, `tprice`, `point`, `previous_point`, `tpoint`, `sdate`, `type`, `chk`
		FROM `invoice` WHERE 1 
		
		SELECT `serial`, `user_id`, `log_id`, `pass`, `pdate`, `password`, `pin`, `pndate`, `name`, `type`, `zone_id`, `upozela_id`, `union_id`,
		`ward_id`, `agent_id`, `mobile`, `active`, `date`, `sponsor`, `refer`, `team`, `royalty`, `dsd`, `sales`, `invest`, `direct`, `weekly`, 
		`monthly`, `rank`, `admin_in`, `admin_out`, `member_in`, `member_out`, `net_bal`, `last_login`, `ip`, `browser`, `city`, `country`,
		`chk` FROM `dealer` WHERE 1
		
		SELECT `serial`, `user_id`, `cat_id`, `scat_id`, `brand_id`, `model`, `name`, `price`, `discount_price`, `sale_price`, `cost`, `profit`, 
		`rp`, `offer`, `offer_value`, `img1`, `img2`, `img3`, `img4`, `info`, `date`, `condition`, `qty`, `stock`, `place`, `chk` 
		FROM `product` WHERE 1
		
		
		*/
		
		$invoice=mysqli_fetch_object($mysqli->query("select * from `invoice` where `agent_id`='".$id."' and `invoice`='".$invoice."' and `type`=0 "));
		$dealer=mysqli_fetch_object($mysqli->query("select * from `dealer` where `user_id`='$id' "));
		//echo "del: ".$dealer->type;
		//echo "Inv_qty: ".$invoice->qty;
		if($dealer->type==6){ 
			$product=mysqli_fetch_object($mysqli->query("SELECT * FROM `product` where `serial`='".$invoice->product_id."' "));
			$qtyup=$product->stock-$invoice->qty;
			//echo "del: ".$invoice->agent_id;
			$mysqli->query("update `product` set `stock`='".$qtyup."' where `user_id`='$id' and `serial`='".$invoice->product_id."' ");
		}
		$_SESSION['msgs']= "Paid";
		header("Location:$location");
		exit();	
		}else{
		$_SESSION['msg']= "Failed!";
		header("Location:$location");
		exit();		
		}
		

	
	}
ob_end_flush();
?>