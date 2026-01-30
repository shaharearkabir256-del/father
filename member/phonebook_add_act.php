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
		$name=$_POST['name'];
		$mobile1=$_POST['mobile1'];
		$mobile2=$_POST['mobile2'];
		$mobile3=$_POST['mobile3'];
		$email=$_POST['email'];
		
		if($name==''){
		$_SESSION['msg'] = "Enter Your Full Name"; 
		header("Location: phonebook_add.php?page=New Number"); 
		exit();	
		}
		if($mobile1==''){
		$_SESSION['msg'] = "Enter Your Mobile Number"; 
		header("Location: phonebook_add.php?page=New Number");
		exit();	
		}
		
		//SELECT `serial`, `user_id`, `name`, `mobile1`, `mobile2`, `mobile3`, `email`, `mdate`, `chk` FROM `phonebook` WHERE 1
		if($name!='' && $mobile1!=''){
		$mysqli->query("INSERT INTO `phonebook`( `user_id`, `name`, `mobile1`, `mobile2`, `mobile3`, `email`, `mdate`) VALUES('".$member."','".$name."','".$mobile1."','".$mobile2."','".$mobile3."','".$email."','".$date."')");
		$_SESSION['msgs'] = "Your Phonebook Successfully Submitted.";       
		header("Location: phonebook.php?page=Number");
		exit();	
		}
		else{
		$_SESSION['msg'] = "Failed"; 
		header("Location: phonebook_add.php?page=New Number");
		exit();	
		}
	}
?>