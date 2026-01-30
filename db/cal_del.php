<?php
session_start(); 
$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$recid."'"));	
		$invest=mysqli_fetch_object($mysqli->query("SELECT SUM(invest) AS `product`,SUM(agent_com) AS `agntcom` FROM `invest` WHERE `invest_id`='".$recid."' and `team`=0"));
		// DSD = Point Sales Com + Withdraw Com / Cashout Com
		$pay=mysqli_fetch_object($mysqli->query("SELECT SUM(agent_com) AS `agntcom` FROM `trx` WHERE `send_id`='".$recid."' and `take`='1' "));
		$with=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `amount`, SUM(agent_com) AS `agntcom` FROM `withdraw` WHERE `rec_id`='".$recid."' and `type`='1' and `status`='1' "));
		$with_del=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `amount` FROM `dealer_trx` WHERE `rec_id`='".$recid."' and `type`='1' "));
		$get_cash=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `amount` FROM `dealer_trx` WHERE `send_id`='".$recid."' and `type`='1'"));
		$rec=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `amount`, sum(customer)AS `customercreate`, SUM(tax) AS `tax` FROM `dealer_trx` WHERE `rec_id`='".$recid."' and `type`='0' and `take`='1' "));
		$rec_shop=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `shop` FROM `trx` WHERE `rec_id`='".$recid."' and `type`='3' ")); // From Mem Shop
		$rows_cutomer=mysqli_num_rows($mysqli->query("select * from `member` WHERE `agent_id`='$recid' and `team`='1' ")); // Cutomer
		$trx=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `amount`,SUM(com1) AS `commission1`,SUM(com2) AS `commission2`,SUM(com3) AS `commission3`,SUM(com4) AS `commission4`,SUM(com5) AS `commission5`, SUM(tax) AS `tax` FROM `dealer_trx` WHERE `send_id`='".$recid."' and `type`='0' and `account`='$del->type'"));		
		$totalsales=mysqli_fetch_object($mysqli->query("SELECT sum(tpoint)as `totalpoin`, sum(agent_com)as `agntcom` FROM `invoice` WHERE `agent_id`='$recid' and `type`=0 and `paid`=1 "));
		// Point Sales Com / Member Joining Com / Royality
		if($del->type==1){ // Zon / Mother Distribution House / MDH Com
			$mem_join=mysqli_fetch_object($mysqli->query("SELECT sum(zone_com)as `com` FROM `invest` where `zone_id`='$recid' "));
			$com=$trx->commission1;
			$agent=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `type`='5' and `zone_id`='$del->zone_id' "));	
			$pay_cash=mysqli_fetch_object($mysqli->query("SELECT SUM(com1) AS `commission1` FROM `trx` WHERE `rec_id`='".$agent->user_id."' and `type`='1' and `take`='1'"));		
			$pay_virtual=mysqli_fetch_object($mysqli->query("SELECT SUM(com1) AS `commission1` FROM `dealer_trx` WHERE `send_id`='".$agent->user_id."' and `type`='0' and `account`='$agent->type'"));		
			$com_pay_cash=$pay_cash->commission1;
			$com_pay_virtual=$pay_virtual->commission1;
		}elseif($del->type==2){ // District / Dipu Delaer / Distribution House / DH Com
			$mem_join=mysqli_fetch_object($mysqli->query("SELECT sum(district_com)as `com` FROM `invest` where `district_id`='$recid' "));
			$com=$trx->commission2;
			$agent=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `type`='5' and `zone_id`='$del->zone_id' and `upozela_id`='$del->upozela_id' "));	
			$pay_cash=mysqli_fetch_object($mysqli->query("SELECT SUM(com2) AS `commission2` FROM `trx` WHERE `rec_id`='".$agent->user_id."' and `type`='1' and `take`='1'"));		
			$pay_virtual=mysqli_fetch_object($mysqli->query("SELECT SUM(com2) AS `commission2` FROM `dealer_trx` WHERE `send_id`='".$agent->user_id."' and `type`='0' and `account`='$agent->type'"));
			$com_pay_cash=$pay_cash->commission2;
			$com_pay_virtual=$pay_virtual->commission2;
		}elseif($del->type==3){ // Upozela / Sub Distribution House / SDH Com
			$mem_join=mysqli_fetch_object($mysqli->query("SELECT sum(upazila_com)as `com` FROM `invest` where `upazila_id`='$recid' "));
			$com=$trx->commission3;
			$agent=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `type`='5' and `zone_id`='$del->zone_id' and `upozela_id`='$del->upozela_id' and `union_id`='$del->union_id' "));	
			$pay_cash=mysqli_fetch_object($mysqli->query("SELECT SUM(com3) AS `commission3` FROM `trx` WHERE `rec_id`='".$agent->user_id."' and `type`='1' and `take`='1'"));		
			$pay_virtual=mysqli_fetch_object($mysqli->query("SELECT SUM(com3) AS `commission3` FROM `dealer_trx` WHERE `send_id`='".$agent->user_id."' and `type`='0' and `account`='$agent->type'"));
			$com_pay_cash=$pay_cash->commission3;
			$com_pay_virtual=$pay_virtual->commission3;
		}elseif($del->type==4){ // Union Word Dealer / DSO
			$mem_join=mysqli_fetch_object($mysqli->query("SELECT sum(uw_com)as `com` FROM `invest` where `uw_id`='$recid' "));
			$com=$trx->commission4;
			$agent=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `type`='5' and `zone_id`='$del->zone_id' and `upozela_id`='$del->upozela_id' and `union_id`='$del->union_id' and `ward_id`='$del->ward_id' "));	
			$pay_cash=mysqli_fetch_object($mysqli->query("SELECT SUM(com4) AS `commission4` FROM `trx` WHERE `rec_id`='".$agent->user_id."' and `type`='1' and `take`='1'"));		
			$pay_virtual=mysqli_fetch_object($mysqli->query("SELECT SUM(com4) AS `commission4` FROM `dealer_trx` WHERE `send_id`='".$agent->user_id."' and `type`='0' and `account`='$agent->type'"));
			$com_pay_cash=$pay_cash->commission4;
			$com_pay_virtual=$pay_virtual->commission4;
		}elseif($del->type==5){ // Agent
		$mem_join=mysqli_fetch_object($mysqli->query("SELECT sum(agent_com)as `com` FROM `invest` where `agent_id`='$recid' "));
			//$com=$trx->commission5;	
		}else{ 	}
		$receive=$rec->amount+$with->amount+$with_del->amount+$rec_shop->shop;
		$tax=($rec->tax+$trx->tax);
		// Agent Com
		$dsd=($pay->agntcom+$with->agntcom); 
		// Delaer Com from dtrxSend/trxReceived/dtrxSend
		$royalty=($com+$com_pay_cash+$com_pay_virtual);
		$customer=$rec->customercreate-$rows_cutomer;
		
		$pay_rc=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `amt`, SUM(comi) AS `com` FROM `dealer_trx` WHERE `send_id`='$recid' and `type`='5' and `account`='3'"));		
		
		$mysqli->query("UPDATE `dealer_balance` SET 
		`customer`='".$customer."',
		`rec_bal`='".$receive."',
		`pay_bal`='".$trx->amount."',
		`royalty`='".$royalty."',
		`product`='".$invest->product."',
		`dsd`='".$dsd."'
		WHERE `user_id`='".$recid."'");
		$cal=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_balance` WHERE `user_id`='".$recid."'"));
		$net=(($cal->sponsor+$cal->royalty+$cal->rec_bal+$cal->dsd+$totalsales->agntcom+$mem_join->com+$pay_rc->com)-($cal->pay_bal+$cal->tax+$cal->product+$totalsales->totalpoin+$get_cash->amount+$pay_rc->amt)); 		
		$mysqli->query("UPDATE `dealer_balance` SET `net_bal`='".$net."' WHERE `user_id`='".$recid."'");
?>