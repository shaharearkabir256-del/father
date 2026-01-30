<?php ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
	session_start();
if(isset($_GET['fd'])){
	require_once("db/db.php");

	if(isset($_SESSION['MemLogId'])){
		$csrc=$_SESSION['MemLogId'];
		$ser=$mysqli->real_escape_string($_GET['serial']);
		$addprice=$mysqli->real_escape_string($_GET['fd']);
		$prod_uid=$mysqli->real_escape_string($_GET['puid']);
		$browser=$mysqli->real_escape_string($_GET['utype']);
		
		$ret=strlen($ser);
		$seri=substr($ser, 10,$ret); 
		settype($seri, "integer"); 
	 	if($seri>0){
			//SELECT `serial`, `p_id`, `ip_add`, `browser`, `color`, `size`, `qty`, `price`, `total`, `date` FROM `cart` WHERE 1
	 		$pro=mysqli_fetch_object($mysqli->query("SELECT * FROM `product` WHERE `serial`='".$seri."'"));
	 		$cart=$mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."' AND `p_id`='".$seri."'");
	 		$roew=mysqli_num_rows($cart);
	 		if($roew>0){
	 			$precar=mysqli_fetch_object($mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."' AND `p_id`='".$seri."'"));
	 			$qty=$precar->qty+1;
	 			$price=$qty*$addprice;
	 			$point=$qty*$pro->rp;
	 			$mysqli->query("UPDATE `cart` SET `qty`='".$qty."',`total`='".$price."',`tpoint`='".$point."' WHERE  `csrc`='".$csrc."' AND `p_id`='".$seri."'");
	 		}else{
	 			$qty=1;
	 			$price=($qty*$addprice);
				$point=$qty*$pro->rp;				
				//INSERT INTO `cart`(`serial`, `p_id`, `ip_add`, `browser`, `color`, `size`, `qty`, `price`, `profit`, `rp`, `date`)
	 			$mysqli->query("INSERT INTO `cart` (`browser`,`prod_uid`,`csrc`,`p_id`,`qty`,`price`,`total`,`point`,`tpoint`) VALUES ('".$browser."','".$prod_uid."','".$csrc."','".$seri."','".$qty."','".$price."','".$price."','".$point."','".$point."')");
	 		}
	 	}
	}
}
ob_end_flush();
?>