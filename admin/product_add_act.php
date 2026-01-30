<?php
	ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
	if( $_SESSION['AdminUserId'] == ''){
		$_SESSION['msg']="Please login first";
		header("Location:logout.php");
		exit();
	}
	else{
		require '../db/db.php';
		$admin=$_SESSION["AdminUserId"]; 
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
		$location="product_add.php";
		
		if(($sPrice!='')&&($cost!='')){
		$price=$oPrice+$cost;
		}
		if(($sPrice!='')&&($price!='')){
		$profit =$sPrice-$price;
		}
		if(($price!='')&&($sPrice!='')&&($profit!='')){
		$pv = $profit*.25;
		}
		if($offer==1){
			$discount =$sPrice*$offerV/100;
			$dPrice=$sPrice-$discount;
		}
		
		$stock = $mysqli->real_escape_string($_POST['stock']);
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
			
		if($name==''){
				$_SESSION['msg'] = "Please Submit Product Name";       
				header("Location:$location");
				exit();	
			}	
		if($img1==''){
				$_SESSION['msg'] = "Please Submit Product  Image";       
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
		$rename1=time();

		if(($name!='')&&($oPrice!='')&&($sPrice!='')&&($img1!='')){
				move_uploaded_file($temp_name1,"../product/$img1");
				move_uploaded_file($temp_name2,"../product/$img2");
				move_uploaded_file($temp_name3,"../product/$img3");
				move_uploaded_file($temp_name4,"../product/$img4");
				//SELECT `serial`, `cat_id`, `scat_id`, `brand_id`, `model`, `name`, `price`, `discount_price`, `sale_price`, `cost`, `profit`, `rp`, `offer`, `offer_value`, `img1`, `img2`, `img3`, `img4`, `info`, `date`, `condition`, `stock`, `place`, `chk` FROM `product` WHERE 1
				$mysqli->query("INSERT INTO `product` (`cat_id`,`scat_id`,`name`,`model`,`brand_id`,`price`,`sale_price`,`cost`,`profit`,`rp`,`discount_price`,`offer`,`offer_value`,`img1`,`img2`,`img3`,`img4`,`info`,`place`,`stock`,`date`) 
										VALUES ('".$catId."','".$scatId."','".$name."','".$model."','".$brandId."','".$oPrice."','".$sPrice."','".$cost."','".$profit."','".$pv."','".$dPrice."','".$offer."','".$offerV."','".$img1."','".$img2."','".$img3."','".$img4."','".$info."','".$place."','".$stock."','".$rdate."')");
			
	$mysqli->query("update `cat` set `chk`='1' where `cat_id`='".$catId."' ");
	$_SESSION['msgs']="All items are successfully submitted.";       
	header("Location:product.php");
	exit();			
			}
			else{
				unlink($temp_name1,"../product/$img1");
				unlink($temp_name2,"../product/$img2");
				unlink($temp_name3,"../product/$img3");
				unlink($temp_name4,"../product/$img4");
				$_SESSION['msg']="Something Missing.";       
				header("Location:product.php");
				exit();
			}	
			
		
	

	}
?>