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
		$price=$mysqli->real_escape_string($_POST['price']);
		$qty=$mysqli->real_escape_string($_POST['qty']);
		$recid=$mysqli->real_escape_string($_POST['recid']);
		$location=$mysqli->real_escape_string($_POST['location']);
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

		
		$exe1=$mysqli->query("SELECT * FROM `product` where `serial`='".$pi."' ");
		$res1=mysqli_fetch_object($exe1);
			
		if(($pi!='')&&($qty>0)&&($qty!='')){
			$mysqli->query("INSERT INTO `prod_req`(`send_id`, `rec_id`, `p_id`, `division`, `district`,`upozela`, `dunion`, `ward`, `dsd`, `name`, `price`, `rp`, `img1`, `qty`, `date`, `chk`) 
			VALUES ('".$mem."','".$recid."','".$pi."','".$res1->division."','".$res1->district."','".$res1->ps."','".$res1->dunion."','".$res1->ward."','".$res1->dsd."','".$res1->name."','".$price."','".$res1->rp."','".$res1->img1."','".$qty."','".$date."','0')");	
			
	
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