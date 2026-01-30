<?php ob_start();
	session_start();
	error_reporting(0);
	ini_set('display_errors','off');
	if($_SESSION['MemLogId'] == '')
	{
	$_SESSION['msg']="Please login first";
	header("Location:logout.php");
	exit();}
	else
	{
	require '../db/db.php';
	$id=$_SESSION['MemLogId'];
	
	$inv=$mysqli->real_escape_string($_GET['invoice']);
	$chk=$mysqli->real_escape_string($_GET['chk']);
	$location="report_my_invoice.php?page=My%20Invoice&&menu=Products";
		if($inv>0){
			$type=mysqli_fetch_object($mysqli->query("select * from `invoice` where `invoice`='$inv' and `type`=1 "));
			$p=mysqli_fetch_object($mysqli->query("select sum(tpoint)as `trp`, sum(tprice)as `tp` from `invoice` where `invoice`='$inv' and `type`='0' "));
			
			if(($p->trp) >= ($setting->mem_prod_delivery_charge1p)){ // 0tk point>=1000 
			 
			 $deliveryCharge=(($setting->mem_prod_delivery_charge)-($setting->mem_prod_delivery_charge1));
			$delivery_charge_percent=$setting->mem_prod_delivery_charge1;
			
			}elseif(($p->trp >= $setting->mem_prod_delivery_charge2ps) && ($p->trp < $setting->mem_prod_delivery_charge1p)){ // 50tk point >= 500 & point<1000
				
				$deliveryCharge=(($setting->mem_prod_delivery_charge) - ($setting->mem_prod_delivery_charge2));
				 $delivery_charge_percent=$setting->mem_prod_delivery_charge2;
			
			}elseif(($p->trp >= $setting->mem_prod_delivery_charge3ps) && ($p->trp < $setting->mem_prod_delivery_charge2ps)){ // 75tk

					 $deliveryCharge=($setting->mem_prod_delivery_charge-$setting->mem_prod_delivery_charge3);
					 $delivery_charge_percent=$setting->mem_prod_delivery_charge3;

			}else{  
			$deliveryCharge=$setting->mem_prod_delivery_charge; // 100tk
			$delivery_charge_percent=0;
			}
			$tprice=$p->tp+$deliveryCharge;
			$mysqli->query("update`invoice` set `delivery`='$chk',`delivery_charge`='$deliveryCharge',`delivery_charge_percent`='$delivery_charge_percent',`tprice`='$tprice' WHERE `invoice`='".$inv."' and `type`='1'");
			$_SESSION['msgs'] = "Success ";
			header("Location:$location");
			exit();
		}else{
			$_SESSION['msg'] = "Failed ";
			header("Location:$location");
			exit();
		}
	}
	ob_end_flush();
?>