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
	
		
		$invoice=$mysqli->real_escape_string($_POST['invoice']);
		$userid=$mysqli->real_escape_string(strtolower($_POST['userid']));
		$prodsn=$mysqli->real_escape_string($_POST['prodSn']);
		//SELECT `serial`, `name`, `price`, `point`, `sdate`, `active` FROM `prod` WHERE 1
		$q=$mysqli->query("SELECT * FROM `prod` WHERE `serial`='$prodsn' ");
		$chkprod=mysqli_num_rows($q);
		$prod=mysqli_fetch_object($q);
		
		$qty=$mysqli->real_escape_string($_POST['qty']);
		$sdate=$mysqli->real_escape_string($_POST['sdate']);
		$qinv=$mysqli->query("SELECT * FROM `invoice` WHERE `invoice`='$invoice' and `type`='1'  ");
		$chkinv=mysqli_num_rows($qinv);
		$invuser=mysqli_fetch_object($qinv);
		$q1=$mysqli->query("SELECT * FROM `member` WHERE `log_id`='$userid' ");
		$chkmem=mysqli_num_rows($q1);
		$mem=mysqli_fetch_object($q1);
			
		$location="prod_invoice_add.php?page=Create New Invoice";
		$locationup="prod_add_to_invoice.php?invoice=$invoice";
		

			
			if(isset($_POST['submit'])){
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
				$mysqli->query("INSERT INTO `invoice`(`agent_id`,`invoice`,`name`,`user_id`,`sdate`,`type`) VALUES('$admin','".$inv."','".invoice."','".$mem->user_id."','".$subdate."','1')");
				$_SESSION['msgs']= "Submission Successful";
				header("Location:$location");
				exit();
				}
			}
			if(isset($_POST['prodAdd'])){
				if(($chkinv==1)&&($chkprod==1)){
					
				$tprice=$prod->price*$qty;
				$tpoint=$prod->point*$qty;
				$mysqli->query("INSERT INTO `invoice`(`agent_id`,`invoice`,`user_id`,`name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`,`type`) 
				VALUES('$admin','".$invoice."','".$invuser->user_id."','".$prod->name."','".$prod->price."','".$qty."','".$tprice."','".$prod->point."','".$tpoint."','".$date."','0')");

				$puchasechk=mysqli_num_rows($mysqli->query("SELECT * FROM `invoice` WHERE `user_id`='$invuser->user_id' and `type`=0 and `sdate`='".$date."' "));
				if($puchasechk==1){
					$tree=mysqli_fetch_object($mysqli->query("SELECT `get` FROM `tree` WHERE `user_id`='$invuser->user_id' "));
					$get=$tree->get+1;
					$mysqli->query("update `tree` set `get`='".$get."' where `user_id`='$invuser->user_id' ");
				}
				
				$_SESSION['msgs']= "Product Add Successful";
				header("Location:$locationup");
				exit();
				}else{
				$_SESSION['msg']= "Upgrade Failed";
				header("Location:$locationup");
				exit();		
				}
			}
			
			$invoice2=$mysqli->real_escape_string($_POST['invoice2']);
			$productsn=$mysqli->real_escape_string($_POST['productSn']);
			$qty2=$mysqli->real_escape_string($_POST['qty2']);
			$locationup2="prod_add_to_invoice.php?invoice=$invoice2";
			//SELECT `serial`, `cat_id`, `scat_id`, `brand_id`, `model`, `name`, `price`, `discount_price`, `sale_price`, `cost`, `profit`,
			//`rp`, `offer`, `offer_value`, `img1`, `img2`, `img3`, `img4`, `info`, `date`, `condition`, `stock`, `place`,
			//`chk` FROM `product` WHERE 1
			$q2=$mysqli->query("SELECT * FROM `product` WHERE `serial`='$productsn' ");
			$chkproduct=mysqli_num_rows($q2);
			$product=mysqli_fetch_object($q2);
			$qinv2=$mysqli->query("SELECT * FROM `invoice` WHERE `invoice`='$invoice2' and `type`='1'  ");
			$chkinv2=mysqli_num_rows($qinv2);
			$invuser2=mysqli_fetch_object($qinv2);
			
			if(isset($_POST['productAdd'])){
				if(($chkinv2==1)&&($chkproduct==1)){
				if($product->offer==1){$price2=$product->discount_price;}else{$price2=$product->sale_price;}
				$tprice2=$price2*$qty2;
				$tpoint2=$product->rp*$qty2;
				$mysqli->query("INSERT INTO `invoice`(`agent_id`,`invoice`,`user_id`,`name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`,`type`) 
				VALUES('$admin','".$invoice2."','".$invuser2->user_id."','".$product->name."','".$price2."','".$qty2."','".$tprice2."','".$product->rp."','".$tpoint2."','".$date."','0')");

				$puchasechk2=mysqli_num_rows($mysqli->query("SELECT * FROM `invoice` WHERE `user_id`='$invuser2->user_id' and `type`=0 and `sdate`='".$date."' "));
				if($puchasechk2==1){
					$tree2=mysqli_fetch_object($mysqli->query("SELECT `get` FROM `tree` WHERE `user_id`='$invuser2->user_id' "));
					$get2=$tree2->get+1;
					$mysqli->query("update `tree` set `get`='".$get2."' where `user_id`='$invuser2->user_id' ");
				}
				
				$_SESSION['msgs']= "Product Add Successful";
				header("Location:$locationup2");
				exit();
				}else{
				$_SESSION['msg']= "Upgrade Failed";
				header("Location:$locationup2");
				exit();		
				}
			}
			
		}
	
?>