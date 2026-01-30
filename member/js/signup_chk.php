<?php
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
  	
	require '../../db/db.php';
	$action=$_GET['action'];
	
	if($action=="nid_check")
		{
		$nid=$_GET['nid'];
		$uplink=$_GET['pid'];
		$exeupline=$mysqli->query("select * from `tree` where `user`='".$uplink."' ");
		$upline=mysqli_fetch_object($exeupline);
		$stype=$upline->stype;
		if($nid!="" && $nid!=NULL ){
			$chkNid=mysqli_num_rows($mysqli->query("SELECT `nid`,`stype` FROM `profile` WHERE `nid`='$nid' and `stype`='$stype'"));
			if($chkNid>0){ ?>
			<p> &nbsp; <img src="js/cross.png" height="" width="10" /><font color="red"> &nbsp; Not Available</font></p> 
			<?php }else{ 
			
				$nid_happy=mysqli_num_rows($mysqli->query("SELECT * FROM `profile` WHERE `stype`=1 and `nid`='$nid'"));
				$nid_regular=mysqli_num_rows($mysqli->query("SELECT * FROM `profile` WHERE `stype`=2 and `nid`='$nid'"));
				$nid_lucky=mysqli_num_rows($mysqli->query("SELECT * FROM `profile` WHERE `stype`=3 and `nid`='$nid'"));
				$nid_freedom=mysqli_num_rows($mysqli->query("SELECT * FROM `profile` WHERE `stype`=4 and `nid`='$nid'"));
					
					?>
						<p>
						<?php if($nid_happy==0){ ?>
						&nbsp; Happy <img src="js/right.png" height="" width="10" /> 
						<?php }else{ ?> 
						&nbsp; Happy <img src="js/cross.png" height="" width="10" />
						<?php } 
				
						if($nid_regular==0){ ?> &nbsp; Regular <img src="js/right.png" height="" width="10" /> <?php } 
						else{ ?> &nbsp; Regular <img src="js/cross.png" height="" width="10" /> <?php } 

						if($nid_lucky==0){ ?> &nbsp; Lucky <img src="js/right.png" height="" width="10" /> <?php }
						else{ ?> &nbsp; Lucky <img src="js/cross.png" height="" width="10" /> <?php } 

						if($nid_freedom==0){ ?> &nbsp; Freedom <img src="js/right.png" height="" width="10" /> <?php }
						else{ ?> &nbsp; Freedom <img src="js/cross.png" height="" width="10" /> 
						
						
						
						
						
					<?php } ?>  
					</p>
					<?php   
		 }
			
			}else{ ?><font color="red"> &nbsp; Enter NID</font><?php }
		}
	// Sponsor	
	if($action=="ref_check")
		{
		$reference=$_GET['ref_id'];
		if($reference!="" && $reference!=NULL ){
			$chkRef=mysqli_num_rows($mysqli->query("SELECT * FROM `tree` WHERE `user`='$reference'"));
			if($chkRef>0){ 
						$q2=$mysqli->query("select `active`,`stype` from `tree` where `user`='".$reference."' and `active`='1' ");	
						$tree2=mysqli_fetch_object($q2);
						if($tree2->active==0){ ?> <p><img src="js/cross.png" height="" width="10" /> <font color="red"> &nbsp; Sponsor Id Suspended</font></p><?php 
						}else{
			?> &nbsp; <font color="green"> <?php if($tree2->stype==1){ echo"Happy";}elseif($tree2->stype==2){ echo"Regular";}elseif($tree2->stype==3){ echo"Lucky";}?>&nbsp; <img src="js/right.png" height="" width="10" />&nbsp; Valid</font><?php }
			}
			else
				{ ?><p> &nbsp; <img src="js/cross.png" height="" width="10" /> <font color="red"> &nbsp; Invalid Sponsor Id</font></p><?php }
				
			}else{ ?><font color="red"> &nbsp; Enter Sponsor ID</font><?php }
		}
		
	if($action=="user_id_check")
		{		
		$user=$_GET['ref_id'];
		if($user!="" && $user!=NULL){
			$chkUserId=mysqli_num_rows($mysqli->query("SELECT `log_id` FROM `member` WHERE `log_id`='$user'"));
			if($chkUserId>0)
				{ ?> &nbsp; <img src="js/cross.png" height="" width="10" /><font color="red"> &nbsp; Not Available</font><?php }
			else
				{ ?> &nbsp; <img src="js/right.png" height="" width="10" /><font color="green"> &nbsp; Available</font><?php }
				
			}else{ ?><font color="red"> &nbsp; Enter User ID</font><?php } 
				
			}	
	
	// Upline
	 if($action=="spon_check"){		
		$sponsor=$_GET['ref_id'];
		if($sponsor!="" && $sponsor!=NULL ){
			$query1="SELECT `user_id` FROM `member` WHERE `log_id`='".$sponsor."' and `team`=0 ";
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