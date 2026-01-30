<?php	 session_start(); 
        $rec=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `recamnt` FROM `trx` WHERE `rec_id`='".$recid."' and `type`=0 "));
		$pay=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxamnt` FROM `trx` WHERE `type`!=10 and `send_id`='".$recid."' and `method`=0 "));
		$gift=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxamnt` FROM `trx` WHERE `type`=10 and `send_id`='".$recid."' and `method`=0 "));
        $with=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `withdrawamnt` FROM `withdraw` WHERE `rec_id`='".$recid."' and `status`='1' and `type`='1' "));
		$daily=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `dailycom` FROM `comdaily` WHERE `user_id`='".$recid."'"));
		$balance=mysqli_fetch_object($mysqli->query("SELECT SUM(pay_bal) AS `trxamnt`, SUM(rec_bal) AS `recamnt`, SUM(direct) AS `sponsorcom`, SUM(gen) AS `gen`, SUM(shopping) AS `shoppingwallet`,SUM(balance_purchase_point)AS `pp`, SUM(stepup) AS `upgradewallet`, SUM(daily) AS `dailycom`, SUM(matching) AS `matching`, SUM(withdraw) AS `withdrawamnt`, SUM(product) AS `joiningcost`, SUM(tax) AS `taxt` FROM `balance` where `type`=0")); // type=0 : member; 1=admin
		$customem=mysqli_fetch_object($mysqli->query("SELECT sum(invest)as ctmpoint FROM `invest` WHERE `team`='1' ")); 
		$sales=mysqli_fetch_object($mysqli->query("SELECT sum(tprice)as amnt,sum(tpoint)as tp FROM `invoice` where type=0 ")); 
		$trx=mysqli_fetch_object($mysqli->query("SELECT SUM(tax)AS `t_trx` FROM `trx` where `tax`>0 order by serial desc"));
		//team: 1=Customer; 0=Member
		$mysqli->query("UPDATE `balance` SET  
		`pay_bal`='".$pay->trxamnt."', 
		`rec_bal`='".$rec->recamnt."',   
		`direct`='".$balance->sponsorcom."', 
		`shopping`='".$balance->shoppingwallet."',
		`balance_purchase_point`='".$balance->pp."',
		`stepup`='".$balance->upgradewallet."', 
		`daily`='".$balance->dailycom."', 
		`gen`='".$balance->gen."', 
		`matching`='".$balance->matching."', 
		`withdraw`='".$with->withdrawamnt."', 
		`product`='".$balance->joiningcost."',
		`tax`='".$trx->t_trx."'		
		WHERE `user_id`='".$recid."'"); 
		$cal=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` WHERE `user_id`='".$recid."'"));
		if($recid==1536835893){ // admin
			$net=(($rec->recamnt)-($pay->trxamnt+$customem->ctmpoint));
		}else{$net=(($rec->recamnt+$with->withdrawamnt)-$pay->trxamnt);} 		
		$mysqli->query("UPDATE `balance` SET `net_bal`='".$net."' WHERE `user_id`='".$recid."'"); 
		
		$query=$mysqli->query("SELECT * FROM `product` where `chk`=1 order by serial desc ");
		while($product=mysqli_fetch_object($query)){ 
			$inv=mysqli_fetch_object($mysqli->query("select sum(qty)as `tqty` from `invoice` where `product_id`='".$product->serial."' and `paid`='1' and `type`='0' "));
			$stock=$product->qty-$inv->tqty;
			$mysqli->query("update `product` set `stock`='$stock' where `serial`='".$product->serial."' and `chk`='1' ");
			$prodReq=mysqli_fetch_object($mysqli->query("select sum(qty)as `tqty` from `prod_req` where `p_id`='".$product->serial."' and `chk`='1' "));
			$stock1=$product->qty-$prodReq->tqty;
			$mysqli->query("update `product` set `stock`='$stock1' where `serial`='".$product->serial."' and `chk`='1' ");
		}
		
?>