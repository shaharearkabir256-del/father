<?php
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
    session_start(); 
    if(!isset($_SESSION['MemLogId']))
     	{
    	header("Location:logout.php");
    	exit();
    	}
	else
	{
	
	require '../db/db.php';
	$memberid=$_SESSION["MemLogId"];   
	$location="photo.php";

	$FileName=$_FILES['image']['name'];
	$ExtPos=strrpos($FileName,".");
	$Extension=strtolower(substr($FileName,$ExtPos+1,strlen($FileName)-$ExtPos));
	$ImageName="$memberid.".jpg;
	$FinalName = "images/".$ImageName;
		
/* 	if ($_FILES['image']['size'] > 1000000) 
	{
	$allow=0;
	$_SESSION['msg']="Image size more than 1 MB";
	header("Location:$location");
	exit();		 
	} */
	
	$ExtPos=strrpos($FileName,".");
	$Extension=strtolower(substr($FileName,$ExtPos+1,strlen($FileName)-$ExtPos));
	$mime=$Extension;		
	if(($mime=='jpg')||($mime=='png')||($mime=='gif')||($mime=='jpeg'))
	{
	$allow=1;
	}
	else
	{
	$allow=0;
	$_SESSION['msg']="Image type not valid must be png, jpg, gif";
	header("Location:$location");	
	exit();	
	}
			
	if ($FileName=='') 
	{
	$allow=0;
	$_SESSION['msg']="Please Select your Photo";
	header("Location:$location");
	exit();	
	}		


	if(($allow!=0)&&( ($FileName!='') ))	
	{
	move_uploaded_file($_FILES['image']['tmp_name'], $FinalName );        
	$src_file = "images/".$ImageName;
	$resource = @imagecreatefromstring(file_get_contents($src_file));
	if($resource!== false)
	{
	$dest_file = "images/avatar/".$ImageName;
	$img_quality = 70;	
	$im = imagecreatefromstring(file_get_contents($src_file));
	$im_w = imagesx($im);
	$im_h = imagesy($im);
	$newheight = 320; 
	$newwidth=($im_w/$im_h)*$newheight;	
	$tn = imagecreatetruecolor($newwidth,$newheight);
	imagecopyresampled ( $tn , $im, 0, 0, 0, 0, $newwidth, $newheight, $im_w, $im_h );
	imagejpeg($tn,$dest_file,$img_quality);        
	unlink($src_file);
	
	       
	$mysqli->query("UPDATE profile SET	photo='".$ImageName."' WHERE `user_id`='".$memberid."' ");
		
	$_SESSION['msg1']="Photo change Successful";
	header("Location:$location");
	exit();	
	}
	else
	{
	unlink($src_file);
	$_SESSION['msg']="This Photo is not a real image file"; 
	header("Location:$location");
	exit();	
	}
	
	}
	else
	{
	$_SESSION['msg']="Photo Upload error try later"; 
	header("Location:$location"); 
	exit();		
	}
	
	}   
?> 