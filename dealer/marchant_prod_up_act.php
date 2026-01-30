<?php ob_start();
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location: logout.php");
		exit();
	}
	else{
	    require '../db/db.php';
		$id=$_SESSION["DealerLogId"]; 
		$location="merchant_prod_list.php?pageName=Product List"; 
		
		if(isset($_POST['pvval'])){
		$serial=$mysqli->real_escape_string($_POST['serial']);
		$rp=$mysqli->real_escape_string($_POST['pv']);
		$mysqli->query("update `product` set `rp`='$rp' where `serial`='".$serial."' ");
				$_SESSION['msgs']="Product Value Upgrade Success";
				header("Location:$location");
		}
		if(isset($_POST['stockval'])){
		$serial=$mysqli->real_escape_string($_POST['serial']);
		$stock=$mysqli->real_escape_string($_POST['stock']);
		$mysqli->query("update `product` set `stock`='$stock' where `serial`='".$serial."' ");
				$_SESSION['msgs']="Stock Upgrade Success";
				header("Location:$location");
		}
		if(isset($_POST['offerval'])){
		$serial=$mysqli->real_escape_string($_POST['serial']);
		$offer=$mysqli->real_escape_string($_POST['offer']);
		$offer_value=$mysqli->real_escape_string($_POST['offv']);
		$mysqli->query("update `product` set `offer`='$offer',`offer_value`='$offer_value' where `serial`='".$serial."' ");
				$_SESSION['msgs']="Offer Upgrade Success";
				header("Location:$location");
		}
		if(isset($_GET['active'])){
			$serial=$mysqli->real_escape_string($_GET['serial']);
			$catchk=$mysqli->real_escape_string($_GET['active']);
			
			if($catchk==1){
				$mysqli->query("update `product` set `chk`='0' where `serial`='".$serial."' ");
				$_SESSION['msgs']="Inactivation Success";
				header("Location:$location");
			}
			elseif($catchk==0){
				$mysqli->query("update `product` set `chk`='1' where `serial`='".$serial."' ");
				$_SESSION['msgs']="Activation Success";
				header("Location:$location");
			}
			else{
				$_SESSION['msg']="Failed";
				header("Location:$location");
			}
		}

		if(isset($_GET['productid'])){
			$serial = $_GET['productid'];
			$mysqli->query("DELETE FROM `product` WHERE serial='".$serial."' LIMIT 1");
			$_SESSION['msgs'] = "Your Product Deleted Successfully";
			header("Location:$location");
			exit();
		}
		if(isset($_GET['delProdFInvoice'])){
			$serial = $_GET['delProdFInvoice'];
			$invoice = $_GET['invoice'];
			$mysqli->query("DELETE FROM `invoice` WHERE serial='".$serial."' LIMIT 1");
			$invoice=mysqli_fetch_object($mysqli->query("SELECT `invoice` FROM `invoice` WHERE `invoice`='$invoice' "));
			$invAllProduct=mysqli_fetch_object($mysqli->query("SELECT sum(tpoint)as `totalpoin`, sum(agent_com)as `agntcom` FROM `invoice` WHERE `invoice`='$invoice->invoice' and `type`=0 "));
			$mysqli->query("update `invoice` set `tpoint`='".$invAllProduct->totalpoin."',`agent_com`='".$invAllProduct->agntcom."' where `invoice`='$invoice->invoice' and `type`=1 ");
			require '../db/cal_del.php';
			$_SESSION['msgs'] = "Your Product Deleted Successfully";
			header("Location:merchant_sales_list.php?pageName=Sales%20List");
			exit();
		}

	
	}
	ob_end_flush();
?>