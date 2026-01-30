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
		$catId=$mysqli->real_escape_string($_POST['cat_id']);
		$scatId = $mysqli->real_escape_string($_POST['scat_id']);
		$offer = $mysqli->real_escape_string($_POST['offer']);
		$offerV = $mysqli->real_escape_string($_POST['offerV']);
		$brandId = $mysqli->real_escape_string($_POST['brandID']);
		$model = $mysqli->real_escape_string($_POST['model']);
		$name = $mysqli->real_escape_string($_POST['Name']);
		$info = $mysqli->real_escape_string($_POST['info']);

		$oPrice = $mysqli->real_escape_string($_POST['oPrice']);
		$sPrice = $mysqli->real_escape_string($_POST['sPrice']);
		$cost = $mysqli->real_escape_string($_POST['sCost']);
		$location="merchant_prod_add.php?pageName=Product Add";
		if($name==''){
				$_SESSION['msg'] = "Please Submit Product Name";       
				header("Location:$location");
				exit();	
		}
		$prod_rows=mysqli_num_rows($mysqli->query("SELECT `name` FROM `product` where `name`='".$name."'"));
		
		if($prod_rows==1){
				$_SESSION['msg'] = "Enter Another Product Name";       
				header("Location:$location");
				exit();	
		}
		if($oPrice==''){
				$_SESSION['msg'] = "Please Submit Product Orginal Price";       
				header("Location:$location");
				exit();	
			}
		if($sPrice==''){
				$_SESSION['msg'] = "Please Submit Product Sale Price";       
				header("Location:$location");
				exit();	
			}
		if($cost==''){
				$_SESSION['msg'] = "Please Submit Product Cost Amount";       
				header("Location:$location");
				exit();	
		}
		$stock = $mysqli->real_escape_string($_POST['stock']);
		if($stock==''){
				$_SESSION['msg'] = "Please Submit stock qty";       
				header("Location:$location");
				exit();	
		}
		
		if($offer==1 && $offerV>0){
			if(($oPrice!='')&&($cost!='')){ $price=$oPrice+$cost; }
			$discount =$sPrice*$offerV/100;
			$dPrice=$sPrice-$discount;
			if(($dPrice!='')&&($price!='')){ $profit =$dPrice-$price; }
			if($profit!=''){$pv = $profit*25/100; }
		}else{
		if(($oPrice!='')&&($cost!='')){	 $price=$oPrice+$cost;	}
		if(($sPrice!='')&&($price!='')){ $profit =$sPrice-$price; }
		if($profit!=''){ $pv = $profit*25/100; }
		}
		
		$acc=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `dealer_balance` WHERE `user_id`='".$id."'"));
		$log=1;
		$pv_limit=$pv*$stock;
		if($acc->net_bal<$pv_limit){
			$log=0;
			$_SESSION['msg'] = "Can not upload product point more then $acc->net_bal";       
			header("Location:$location");
			exit();	
			
		}
		
		$place= $mysqli->real_escape_string($_POST['place']);
		$rdate=date('Y-m-d');

		   
		$img1=$_FILES['img1']["name"];
		$temp_name1 = $_FILES['img1']["tmp_name"];

		$img2=$_FILES['img2']["name"];
		$temp_name2 = $_FILES['img2']["tmp_name"];

		$img3=$_FILES['img3']["name"];
		$temp_name3 = $_FILES['img3']["tmp_name"];
	
		$img4=$_FILES['img4']["name"];
		$temp_name4 = $_FILES['img4']["tmp_name"];
			
		
				
		if($img1==''){
				$_SESSION['msg'] = "Please Submit Product  Image";       
				header("Location:$location");
				exit();	
			}
		
		$rename1=time();

		if(($log==1) && ($prod_rows==0)&&($name!='')&&($oPrice!='')&&($sPrice!='')&&($cost!='')&&($stock>0)&&($img1!='')){
				move_uploaded_file($temp_name1,"../product/$img1");
				move_uploaded_file($temp_name2,"../product/$img2");
				move_uploaded_file($temp_name3,"../product/$img3");
				move_uploaded_file($temp_name4,"../product/$img4");
				//SELECT `serial`, `cat_id`, `scat_id`, `brand_id`, `model`, `name`, `price`, `discount_price`, `sale_price`, `cost`, `profit`, `rp`, `offer`, `offer_value`, `img1`, `img2`, `img3`, `img4`, `info`, `date`, `condition`, `stock`, `place`, `chk` FROM `product` WHERE 1
				$mysqli->query("INSERT INTO `product` (`user_id`,`cat_id`,`scat_id`,`name`,`model`,`brand_id`,`price`,`sale_price`,`cost`,`profit`,`rp`,`discount_price`,`offer`,`offer_value`,`img1`,`img2`,`img3`,`img4`,`info`,`place`,`stock`,`date`) 
										VALUES ('".$id."','".$catId."','".$scatId."','".$name."','".$model."','".$brandId."','".$oPrice."','".$sPrice."','".$cost."','".$profit."','".$pv."','".$dPrice."','".$offer."','".$offerV."','".$img1."','".$img2."','".$img3."','".$img4."','".$info."','".$place."','".$stock."','".$rdate."')");
			
	//$mysqli->query("update `cat` set `chk`='1' where `cat_id`='".$catId."' ");
	$_SESSION['msgs']="All items are successfully submitted.";       
	header("Location:merchant_prod_list.php?pageName=Product List");
	exit();			
			}
			else{
				unlink($temp_name1,"../product/$img1");
				unlink($temp_name2,"../product/$img2");
				unlink($temp_name3,"../product/$img3");
				unlink($temp_name4,"../product/$img4");
				$_SESSION['msg']="Something Missing.";       
				header("Location:merchant_prod_list.php?pageName=Product List");
				exit();
			}		

	
	}
?>