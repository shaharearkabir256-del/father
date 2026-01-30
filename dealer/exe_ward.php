<?php
if(isset($_GET['scat_id'])){
	require '../db/db.php';
	if($_GET['scat_id']=="brand"){
		$sub_catid=$_GET['refb_id'];
		echo "<option>Select</option>";
		$result=$mysqli->query("SELECT * FROM `ward` WHERE `union_id`='".$sub_catid."'");
		while($res = mysqli_fetch_object($result)){
			
		echo "<option value='$res->ward_id'>"; echo $res->ward; echo "</option>";
		} 
	}
}
?>