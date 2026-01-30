<?php
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
  	
	require '../../db/db.php';
	$action=$_GET['action'];
	
		if($action=="nid_check")
		{
		$nid=$_GET['nid'];
		if($nid!="" && $nid!=NULL ){
			$chkNid=mysqli_num_rows($mysqli->query("SELECT `nid` FROM `profile` WHERE `nid`='$nid'"));
			if($chkNid>0){ ?>
			<p> &nbsp; <img src="js/cross.png" height="" width="10" /><font color="red"> &nbsp; Not Available</font></p> 
			<?php }else{ ?>
			<p> &nbsp; <img src="js/right.png" height="" width="10" /><font color="green"> &nbsp; Available</font></p><?php }
			}else{ ?><font color="red"> &nbsp; Enter NID</font><?php }
		}
	
	if($action=="ref_check")
		{
		$reference=$_GET['ref_id'];
		if($reference!="" && $reference!=NULL )
			{
			$chkRef=mysqli_num_rows($mysqli->query("SELECT `log_id` FROM `member` WHERE `log_id`='$reference' and `team`=0"));
			if($chkRef>0)
				{ 
						$q2=$mysqli->query("select `active` from `tree` where `user`='".$reference."' and `active`='1' ");	
						$tree2=mysqli_fetch_object($q2);
						if($tree2->active==0){ ?> <p><img src="js/cross.png" height="" width="10" /> Sponsor Id Suspended</p><?php 
						}else{
			?>&nbsp;&nbsp;<img src="js/right.png" height="" width="10" /><?php }
			}
			else
				{ ?><p>&nbsp;&nbsp;<img src="js/cross.png" height="" width="10" /> Invalid Sponsor Id</p><?php }
				
			}
		}
		
	if($action=="user_id_check")
		{		
		$user=$_GET['ref_id'];
		if($user!="" && $user!=NULL)
			{
			$chkUserId=mysqli_num_rows($mysqli->query("SELECT `log_id` FROM `member` WHERE `log_id`='$user'"));
			if($chkUserId>0)
				{ ?>&nbsp;&nbsp;<img src="js/cross.png" height="" width="10" /><?php }
			else
				{ ?>&nbsp;&nbsp;<img src="js/right.png" height="" width="10" /><?php }
				
			}
				
			}	
	
	// Upline
	 if($action=="spon_check"){		
		$sponsor=$_GET['ref_id'];
		if($sponsor!="" && $sponsor!=NULL ){
			$query1="SELECT `log_id` FROM `member` WHERE `log_id`='".$sponsor."' and `team`=0 ";
			$exe1=$mysqli->query($query1);
			$num_row1= mysqli_num_rows($exe1);
				if($num_row1>0){
					$upline=mysqli_fetch_object($mysqli->query("SELECT `stype` FROM `tree` WHERE `user`='".$sponsor."'")) ;
					
					if($upline->stype==1){
						$happy=mysqli_num_rows($mysqli->query("select `user_id` from `tree` where `upline`='".$sponsor."' "));
						if($happy<2){ ?> &nbsp; Happy <img src="js/right.png" height="" width="10" /> <?php } 
						else{ ?> &nbsp; Happy <img src="js/cross.png" height="" width="10" /> <?php } 
					}
					
					if($upline->stype==2){
						$regular=mysqli_num_rows($mysqli->query("select `user_id` from `tree` where `upline`='".$sponsor."' "));
						if($regular<2){ ?> &nbsp; Regular <img src="js/right.png" height="" width="10" /> <?php } 
						else{ ?> &nbsp; Regular <img src="js/cross.png" height="" width="10" /> <?php } 
					}
					
					if($upline->stype==3){
						$lucky=mysqli_num_rows($mysqli->query("select `user_id` from `tree` where `upline`='".$sponsor."' "));
						if($lucky<2){ ?> &nbsp; Lucky <img src="js/right.png" height="" width="10" /> <?php }
						else{ ?> &nbsp; Lucky <img src="js/cross.png" height="" width="10" /> <?php } 
					}
				}else{ ?><p> &nbsp; <img src="js/cross.png" height="" width="10" /><font color="red"> &nbsp; Invalide Placement Id</font></p><?php }
		}else{ ?><font color="red"> &nbsp; Enter Placement ID</font><?php }  
	} 
	

		

			

		

		
			
?>