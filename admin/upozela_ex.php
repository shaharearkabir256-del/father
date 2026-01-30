<?php
if(isset($_GET['cat_id'])){
	require '../db/db.php';
	if($_GET['cat_id']=="sub_cat"){
		$sub_catid=$_GET['ref_id'];
		echo "<option>Select</option>";
		$result=$mysqli->query("SELECT * FROM `upozela` WHERE `zone_id`='".$sub_catid."' order by upozela");
		while($res = mysqli_fetch_object($result)){
			
		echo "<option value='$res->upozela_id'> "; echo $res->upozela; echo "</option>";
		} 
	}
}
?>