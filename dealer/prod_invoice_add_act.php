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
		
		$invoice=$mysqli->real_escape_string($_POST['invoice']);

		
		$qty=$mysqli->real_escape_string($_POST['qty']);
		$sdate=$mysqli->real_escape_string($_POST['sdate']);
		$qinv=$mysqli->query("SELECT * FROM `invoice` WHERE `invoice`='$invoice' and `type`='1'  ");
		$chkinv=mysqli_num_rows($qinv);
		$invuser=mysqli_fetch_object($qinv);
		$bal=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `dealer_balance` WHERE `user_id`='$id' "));
			
		$location="prod_invoice_add.php?pageName=Create New Invoice";
		$locationup="prod_add_to_invoice.php?invoice=$invoice";
		
						if(isset($_POST['prodAddToInvoice'])){
				$serial=$mysqli->real_escape_string($_POST['productSerial']);
				$q=$mysqli->query("SELECT * FROM `product` WHERE `serial`='$serial' ");
				$chkproduct=mysqli_num_rows($q);
				$product=mysqli_fetch_object($q);
				if($product->offer==1){$price2=$product->discount_price;}else{$price2=$product->sale_price;}
				$tprice2=$price2*$qty;
				$tpoint2=$product->rp*$qty;
				$agent_com=$tpoint2*2/100;
				$stock=$product->stock-$qty;
				if($serial==''){
				$_SESSION['msg']= "Select One in Consumer Product List";
				header("Location:$locationup");
				exit();	
				}
				if($bal->net_bal < $tpoint2){
				$_SESSION['msg']= "Balance is low";
				header("Location:$locationup");
				exit();	
				}
				if($product->stock<$qty){
				$_SESSION['msg']= "Product Stock is low";
				header("Location:$locationup");
				exit();	
				}
				if(($product->stock>$qty)&&($bal->net_bal >= $tpoint2)&&($chkinv==1)&&($chkproduct==1)){
				
				$mysqli->query("INSERT INTO `invoice`(`product_id`,`agent_id`,`account`,`invoice`,`user_id`,`sponsor`,`agent_com`,`name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`,`type`) 
				VALUES('$product->serial','$id','1','".$invoice."','".$invuser->user_id."','$id','$agent_com','".$product->name."','".$price2."','".$qty."','".$tprice2."','".$product->rp."','".$tpoint2."','".$date."','0')");
				$mysqli->query("update `product` set `stock`='".$stock."' where `serial`='$product->serial' ");
				$invAllProduct=mysqli_fetch_object($mysqli->query("SELECT sum(tpoint)as `totalpoin`, sum(agent_com)as `agntcom` FROM `invoice` WHERE `invoice`='$invoice' and `type`=0 "));
				$mysqli->query("update `invoice` set `tpoint`='".$invAllProduct->totalpoin."',`agent_com`='".$invAllProduct->agntcom."' where `invoice`='$invoice' and `type`=1 "); 
				$puchasechk2=mysqli_num_rows($mysqli->query("SELECT * FROM `invoice` WHERE `user_id`='$invuser->user_id' and `type`=0 and `sdate`='".$date."' "));
				if($puchasechk2==1){
					$tree2=mysqli_fetch_object($mysqli->query("SELECT `get` FROM `tree` WHERE `user_id`='$invuser->user_id' "));
					$get2=$tree2->get+1;
					$mysqli->query("update `tree` set `get`='".$get2."' where `user_id`='$invuser->user_id' ");
				}
				require '../db/cal_del.php';
				$_SESSION['msgs']= "Product Add Successful";
				header("Location:$locationup");
				exit();
				}else{
				$_SESSION['msg']= "Upgrade Failed";
				header("Location:$locationup");
				exit();		
				}
			}
		
			if(isset($_POST['prodAdd'])){
				
				
				$prodsn=$mysqli->real_escape_string($_POST['prodSn']);
				$q=$mysqli->query("SELECT * FROM `prod` WHERE `serial`='$prodsn' ");
				$chkprod=mysqli_num_rows($q);
				$prod=mysqli_fetch_object($q);
				
				$tprice=$prod->price*$qty;
				$tpoint=$prod->point*$qty;
				$agent_com=$tpoint*2/100;
				
				if($prodsn==''){
				$_SESSION['msg']= "Select One in General Product List";
				header("Location:$locationup");
				exit();	
				}
				if($bal->net_bal < $tpoint){
				$_SESSION['msg']= "Balance is low";
				header("Location:$locationup");
				exit();	
				}
				
				if(($bal->net_bal >= $tpoint)&&($chkinv==1)&&($chkprod==1)){

				$mysqli->query("INSERT INTO `invoice`(`prod_id`,`agent_id`,`account`,`sponsor`,`agent_com`,`invoice`,`user_id`,`name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`,`type`) 
				VALUES('$prod->serial','$id','1','$id','$agent_com','".$invoice."','".$invuser->user_id."','".$prod->name."','".$prod->price."','".$qty."','".$tprice."','".$prod->point."','".$tpoint."','".$date."','0')");
				
				$invAllProd=mysqli_fetch_object($mysqli->query("SELECT sum(tpoint)as `totalpoin`, sum(agent_com)as `agntcom` FROM `invoice` WHERE `invoice`='$invoice' and `type`=0 "));
				$mysqli->query("update `invoice` set `tpoint`='".$invAllProd->totalpoin."',`agent_com`='".$invAllProd->agntcom."' where `invoice`='$invoice' and `type`=1 "); 
				
				$puchasechk=mysqli_num_rows($mysqli->query("SELECT * FROM `invoice` WHERE `user_id`='$invuser->user_id' and `type`=0 and `sdate`='".$date."' "));
				if($puchasechk==1){
					$tree=mysqli_fetch_object($mysqli->query("SELECT `get` FROM `tree` WHERE `user_id`='$invuser->user_id' "));
					$get=$tree->get+1;
					$mysqli->query("update `tree` set `get`='".$get."' where `user_id`='$invuser->user_id' ");
				}
				require '../db/cal_del.php';
				$_SESSION['msgs']= "Product Add Successful";
				header("Location:$locationup");
				exit();
				}else{
				$_SESSION['msg']= "Upgrade Failed";
				header("Location:$locationup");
				exit();		
				}
			}
		
		
		
		if(isset($_POST['invAdd'])){
			$userid=$mysqli->real_escape_string(strtolower($_POST['userid']));
			$q1=$mysqli->query("SELECT * FROM `member` WHERE `log_id`='$userid' ");
			$chkmem=mysqli_num_rows($q1);
			$mem=mysqli_fetch_object($q1);
			if($sdate==''){$subdate=$date;}else{$d=strtotime($sdate);$subdate=date("d-M-Y", $d);}
			if($userid==''){
			$_SESSION['msg'] = "Please Enter Name ";
			header("Location:$location");
			exit();
			}
			if($userid<0){
			$_SESSION['msg'] = "Invalid User Id Type ";
			header("Location:$location");
			exit();
			}
				if($chkmem==0){
				$_SESSION['msg'] = "Invalide User Name";
				header("Location:$location");
				exit();
				}else{
			    $inv=time(); //Type: 1=Invoice; 0=Product;
			//INSERT INTO `invoice`(`serial`, `invoice`, `user_id`, `name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`, `type`, `chk`)
				$mysqli->query("INSERT INTO `invoice`(`agent_id`,`account`,`invoice`,`name`,`user_id`,`sponsor`,`sdate`,`type`) VALUES('$id','1','".$inv."','".invoice."','".$mem->user_id."','$id','".$subdate."','1')"); // Merchant: account=1
				$_SESSION['msgs']= "Invoice Submission Successful";
				header("Location:$location");
				exit();
				}
			}
			

	
		
		

	
	}
	
?>