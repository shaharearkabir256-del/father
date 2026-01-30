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
		$pi=$mysqli->real_escape_string($_POST['sn']);
		$upline=$mysqli->real_escape_string($_POST['upline']);
		$location=$mysqli->real_escape_string($_POST['location'])."?pageName=Products(Upline%20Dealer)&&stockActive=1";
		$price=$mysqli->real_escape_string($_POST['price']);
		$qty=$mysqli->real_escape_string($_POST['qty']);
		$recid=$mysqli->real_escape_string($_POST['recid']);
		//$location='prod_req.php';


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

		
		$exe1=$mysqli->query("SELECT * FROM `stock` where `serial`='".$pi."' and `rec_id`='$upline' ");
		$res1=mysqli_fetch_object($exe1);
			
		if(($pi!='')&&($qty>0)&&($qty!='')){
			$mysqli->query("INSERT INTO `prod_req`(`send_id`, `rec_id`, `p_id`, `division`, `district`,`upozela`, `dunion`, `ward`, `dsd`, `name`, `price`, `rp`, `img1`, `qty`, `date`, `chk`) 
			VALUES ('".$mem."','".$recid."','".$res1->p_id."','".$res1->division."','".$res1->district."','".$res1->ps."','".$res1->dunion."','".$res1->ward."','".$res1->dsd."','".$res1->name."','".$price."','".$res1->rp."','".$res1->img1."','".$qty."','".$date.$time."','0')");	
			
	
			$_SESSION['msgs']="Request Send successful.";       
			header("Location:$location");
			exit();	
			}
			else{
				$_SESSION['msg']="Request Send Failed.";       
				header("Location:$location");
				exit();
			}
}


?>