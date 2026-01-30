<?php ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true);
	if((!isset($_SESSION['MemLogId']))||(!isset($_SESSION['pin']))){
		$_SESSION['msg']="Please Verify login!";
		header("Location:logout.php");
		exit();
	}else{ 
		require('../db/db.php');

		$id=$_SESSION["MemLogId"]; 
		$pi=$mysqli->real_escape_string($_POST['sn']);
		$upline=$mysqli->real_escape_string($_POST['upline']);
		$location=$mysqli->real_escape_string($_POST['location']);
		$price=$mysqli->real_escape_string($_POST['price']);
		$qty=$mysqli->real_escape_string($_POST['qty']);
		$recid=$mysqli->real_escape_string($_POST['recid']);
		//$location='prod_req.php';
		$del=mysqli_fetch_object($mysqli->query("select * from `dealer` where `user_id`='".$recid."'"));
		if($del->type==5){ $agn_mer_com=$setting->mem_join_agent_com; }
		if($del->type==6){ $agn_mer_com=$setting->mem_join_merchant_com; }
		if($qty==''){
			$_SESSION['msg']="Please Submit Quantity";       
			header("Location:$location");
			exit();	
		}
		if($qty<0){
			$_SESSION['msg']="Invalid Quantity";       
			header("Location:$location");
			exit();	
		}
		$exe1=$mysqli->query("SELECT * FROM `product` where `serial`='".$pi."'");	
		$res1=mysqli_fetch_object($exe1);
			
		if(($pi!='')&&($qty>0)&&($qty!='')){
			$mysqli->query("INSERT INTO `prod_req`(`send_id`, `rec_id`, `p_id`, `division`, `district`,`upozela`, `dunion`, `ward`, `dsd`, `name`, `price`, `rp`, `img1`, `qty`, `date`, `chk`) 
			VALUES ('".$id."','".$recid."','".$res1->serial."','".$res1->division."','".$res1->district."','".$res1->ps."','".$res1->dunion."','".$res1->ward."','".$res1->dsd."','".$res1->name."','".$price."','".$res1->rp."','".$res1->img1."','".$qty."','".$date.$time."','0')");	
			$sql=$mysqli->query("select * from `invoice` where `type`='1' and paid=0 and `agent_id`='$recid' and `sdate`='$date' ");
			$chkPrevousInv=mysqli_num_rows($sql);
			if($chkPrevousInv==0){
				
				$invoice=time();
				$tprice=$price*$qty;
				$tpoint=$res1->rp*$qty;
				$agent_com=$tpoint*$agn_mer_com/100;
				$mysqli->query("INSERT INTO `invoice`(`agent_id`,`agent_com`,`product_id`,`invoice`,`user_id`,`name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`,`type`) 
				VALUES('$recid','$agent_com','".$res1->serial."','".$invoice."','".$id."','".$res1->name."','".$price."','".$qty."','".$tprice."','".$res1->rp."','".$tpoint."','".$date."','0')");
			
				$checkinv= mysqli_num_rows($mysqli->query("select * from `invoice` where `type`='1' and `agent_id`='$recid' and `invoice`='".$invoice."'"));	

				if($checkinv==0){
				$inv=mysqli_fetch_object($mysqli->query("select sum(tpoint)as `trp` from `invoice` where `user_id`='".$id."' and `paid`='1' and `type`='0' "));
				$mysqli->query("INSERT INTO `invoice`(`previous_point`,`agent_id`,`agent_com`,`invoice`,`name`,`user_id`,`sdate`,`type`) 
				VALUES('$inv->trp','$recid','$agent_com','".$invoice."','".invoice."','".$id."','".$date."','1')");
				}
			}else{
			$prevousInv=mysqli_fetch_object($sql);
				$invoice=$prevousInv->invoice;
				$tprice=$price*$qty;
				$tpoint=$res1->rp*$qty;
				$agent_com=$tpoint*$agn_mer_com/100;
				$mysqli->query("INSERT INTO `invoice`(`agent_id`,`agent_com`,`product_id`,`invoice`,`user_id`,`name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`,`type`) 
				VALUES('$recid','$agent_com','".$res1->serial."','".$invoice."','".$id."','".$res1->name."','".$price."','".$qty."','".$tprice."','".$res1->rp."','".$tpoint."','".$date."','0')");
			
			}
			$_SESSION['msgs']="successful.";       
			header("Location:$location");
			exit();	
			}
			else{
				$_SESSION['msg']="Failed.";       
				header("Location:$location");
				exit();
			}
}


?>