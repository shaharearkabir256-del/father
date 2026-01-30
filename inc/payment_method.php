<?php if($mem->method==4){ ?>
		<span class="label label-primary">Bank</span><br>
		Bank Name: <?php echo $mem->bank."<br>"; ?>
		Branch Name: <?php echo $mem->branch."<br>"; ?>
		Bank Account No: <?php echo $mem->bankaccno."<br>"; ?>
		Contact Number: <?php echo $mem->mobile."<br>"; ?>
		<?php }elseif($mem->method==5){ ?>
		<span class="label label-primary">Recharge</span><br>
		 <?php echo $mem->mobile."<br>";
			if($mem->mobile_type==0){
				echo "Prepaid";
			}elseif($mem->mobile_type==1){
				echo "Postpaid";
			}elseif($mem->mobile_type==2){
				echo "Skitto";
			}else{ }
		 ?>
		 <?php }elseif($mem->method==1){ ?>
		<span class="label label-primary">Cash</span>
		<?php }else{ ?>
		<span class="label label-primary"><?php
		$mb2=mysqli_fetch_object($mysqli->query("SELECT * FROM `mobile_banking` where `serial`='$mem->method' and `chk`='1' "));
		echo $mb2->name;?></span><br>
		<?php echo $mem->acc_no; ?>
<?php } ?>