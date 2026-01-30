<?php ob_start();
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
    if(!isset($_SESSION['MemLogId']))
	{
    	header("Location:logout.php");
    	exit();
    }
	else
	{
	require('../db/db.php');
		$member=$_SESSION["MemLogId"];
		
		$serial = $_POST['serial'];
		$name=$_POST['name'];
		$mobile1=$_POST['mobile1'];
		$mobile2=$_POST['mobile2'];
		$mobile3=$_POST['mobile3'];
		$email=$_POST['email'];
		
		if($serial!=''){
		//SELECT `serial`, `user_id`, `name`, `mobile1`, `mobile2`, `mobile3`, `email`, `mdate`, `chk` FROM `phonebook` WHERE 1
			$mysqli->query("UPDATE `phonebook` SET `name`='".$name."',`mobile1`='".$mobile1."',`mobile2`='".$mobile2."',`mobile3`='".$mobile3."',`email`='".$email."',`chk`='$chk' WHERE `serial`='".$serial."' ");
			$_SESSION['msgs'] = "Your phonebook Successfully Updated.";       
			header("Location:phonebook.php");
			exit();	
		}else{
		$_SESSION['msg'] = "Failed.";       
			header("Location:phonebook_add.php");
			exit();		
		}
		
	}
		
		?>