<?php
if(isset($_GET['scat_id'])){
	require '../db/db.php';
	if($_GET['scat_id']=="brand"){
		$sub_catid=$_GET['refb_id'];
		echo "<option value=''>Select</option>";
		$result=$mysqli->query("SELECT * FROM `dealer` WHERE `type`=5 AND `active`=1 AND `ward_id`='".$sub_catid."'   ");
		while($res = mysqli_fetch_object($result)){
			
		echo "<option value='$res->user_id'>"; echo $res->log_id; echo "</option>";
		} 
	}
}
?>