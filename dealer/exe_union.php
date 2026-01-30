<?php
if(isset($_GET['scat_id'])){
	require '../db/db.php';
	if($_GET['scat_id']=="brand"){
		$sub_catid=$_GET['refb_id'];
		echo "<option>Select</option>";
		$result=$mysqli->query("SELECT * FROM `union` WHERE `upozela_id`='".$sub_catid."' order by `union` ");
		while($res = mysqli_fetch_object($result)){
			
		echo "<option value='$res->union_id'>"; echo $res->union; echo "</option>";
		} 
	}
}
?>