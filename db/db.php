<?php 
	ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	if(!isset($_SESSION['token']))
	{
	header("Location:../index.php");
	exit();
	}
	else
	{
	

	// read user ip adress:
	$ip = isset($_SERVER['REMOTE_ADDR']) ? trim($_SERVER['REMOTE_ADDR']) : '';
	// search current IP in $deny_ips array
	
		$host="localhost";
		$user="daily_us"; 
		$password="pZv2h328@"; 
		$database="daily_db";
		$mysqli= new mysqli("$host","$user","$password","$database");
		if ($mysqli->connect_error){
		die("Connection failed: " . $mysqli->connect_error);
		if ($mysqli->connect_errno()) 
		{
		header("Location:../notfound.php");
		exit();
		}	
		}
		
	$_POST=str_replace(array('\'', '"', '*', '$'), '', $_POST);
	$_GET=str_replace(array('\'', '"', '*', '$'), '', $_GET);
	$_COOKIE=str_replace(array('\'', '"', '*', '$'), '', $_COOKIE);
	$_REQUEST=str_replace(array('\'', '"', '*', '$'), '', $_REQUEST);

	$setting=mysqli_fetch_object($mysqli->query("select * from `setting` where `user_id`='1536835893'"));
	$title="Daily Income Bazar";
	$url="https://www.dailyincomebazar.com";
	$pro = mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='1536835893' "));
	$email=$pro->email; //
	$transactionamount=$setting->mem_trx_lim;
	$withdrawamount=$setting->mem_wit_lim;
	$taxamount=$setting->mem_trx_tax;
	$upgradewallet1=$setting->mem_level_up1; // Level 2
	$level_update_cost=$setting->mem_level_up_cost;
	$upgradewallet2=$setting->mem_level_up2; // Level 3
	$upgradewallet3=$setting->mem_level_up3; // Level 4
	$upgradewallet4=$setting->mem_level_up4; // Level 5
	$upgradewallet5=$setting->mem_level_up5; // Level 6
	$upgradewallet6=$setting->mem_level_up6; // Level 7
	$upgradewallet7=$setting->mem_level_up7; // Level 8
	$upgradewallet8=$setting->mem_level_up8; // Level 9
	$upgradewallet9=$setting->mem_level_up9; // Level 10

	$sponsorcommission=5;
	$clubmembercommission=2;
	$club1commission=5;
	$club2commission=6;
	$club3commission=7;
	$club4commission=8;
	$club5commission=9;
	$club6commission=20;
	$cashWallet=$setting->mem_join_spot_cash_wallet;
	$upgradehWallet=$setting->mem_join_spot_upgrade_wallet;
	$shoppingWallet=$setting->mem_join_spot_shopping_wallet;
	
	$panel3='Delivery';
	$panel3_color='green';
    $admin_panel_color='purple';
	$accounts_panel_color='blue';
	$dealer_panel_color='red';
	
	function sanitize($value)
	{
	global $mysqli;
	return $mysqli->real_escape_string($value);
	}
	if($_POST){$_POST=array_map('sanitize', $_POST);}
	if($_GET){$_GET=array_map('sanitize', $_GET);}
	if($_COOKIE){$_COOKIE=array_map('sanitize', $_COOKIE);}
	if($_REQUEST){$_REQUEST=array_map('sanitize', $_REQUEST);}
	
	if((isset($_GET['limit']))&&(is_numeric($_GET['limit']))){$limit=$_GET['limit'];}	
	if((isset($_GET['page']))&&(is_numeric($_GET['page']))){$page=$_GET['page'];}
	if((isset($_GET['type']))&&(is_numeric($_GET['type']))){$type=$_GET['type'];}	
	if((isset($_GET['item']))&&(is_string($_GET['item']))){$item=$_GET['item'];}	
	if((isset($_GET['search']))&&(is_string($_GET['search']))){$search=$_GET['search'];}
	if((isset($_GET['start']))&&(DateTime::createFromFormat('d-M-Y', $_GET['start'])!==FALSE)){$start=$_GET['start'];}
	if((isset($_GET['end']))&&(DateTime::createFromFormat('d-M-Y', $_GET['end'])!==FALSE)){$end=$_GET['end'];}	
	
	$timezone = "Asia/Dacca"; 
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);	
	$d30=strtotime("-30 Day");
	$start30=date("Y-m-d", $d30); // 30 Days Back
	$d1=strtotime("-1 Day");	
	$ydate=date("Y-m-d", $d1);
	$sdate=date("d-M-Y"); 
	$date=date("Y-m-d"); 
	$datef=date("Y-m-d H:i"); 
	$dob=date("M-d-Y"); 
	$time=date("h:ia"); 
	$timef=time(); 
	$day=date("l");
	$bdt=" <i class='fa fa-rub'></i> ";//<b>&#2547;</b>
	$tk=" <i class='fa fa-rub'></i> "; //<b>&#x9f3;</b>
	$t=" <i class='fa fa-rub'></i> "; //&#2547;
	}
	?>