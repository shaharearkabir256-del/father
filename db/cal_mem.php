<?php   session_start();  
        // trx | type: 0 = Transfer; 1 = withdraw; 2 = Request; 3 = shopping; 4 = Upgrade;
		$generation=mysqli_fetch_object($mysqli->query("SELECT `g_all` FROM `gen` WHERE `user_id`='".$spot_ref."'"));
		//$matching=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `amnt` FROM `matching` WHERE `user_id`='".$spot_ref."'"));
		$invest=mysqli_fetch_object($mysqli->query("SELECT SUM(invest) AS `product` FROM `invest` WHERE `invest_id`='".$spot_ref."' and `team`=0")); // 0=Member; 1=Customer; 2=PP	
		$invest_cust_to_mem=mysqli_fetch_object($mysqli->query("SELECT SUM(invest) AS `product` FROM `invest` WHERE `user_id`='".$spot_ref."' and `team`=1")); // Cutomer To Member
		$investpoint=mysqli_fetch_object($mysqli->query("SELECT SUM(invest) AS `product` FROM `invest` WHERE `invest_id`='".$spot_ref."' and `team`=1")); // 0=Member; 1=Customer; 2=PP
		$investPurchasePoint=mysqli_fetch_object($mysqli->query("SELECT SUM(invest) AS `product` FROM `invest` WHERE `invest_id`='".$spot_ref."' and `team`=2")); // 0=Member; 1=Customer; 2=PP
		$spn=mysqli_fetch_object($mysqli->query("SELECT SUM(invest) AS `product`,sum(payable)as spamnt, sum(stepup)as stepup, sum(shopping)as shoppingamnt FROM `invest` WHERE `sponsor`='".$spot_ref."'"));
		$spn2=mysqli_fetch_object($mysqli->query("SELECT SUM(invest) AS `product`,sum(payable)as spamnt, sum(stepup)as stepup, sum(shopping)as shoppingamnt FROM `invest2` WHERE `sponsor`='".$spot_ref."'"));
		$daily=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `dailyincom` FROM `comdaily` WHERE `user_id`='".$spot_ref."'"));
		
		$pp=mysqli_fetch_object($mysqli->query("SELECT SUM(amount) AS `amnt` FROM `pp` WHERE `user_id`='".$spot_ref."'"));
		
		$pay=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxamnt`,sum(tax)as `taxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`=0 ")); //Transfer
		$payshopping=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxshopamnt`,sum(tax)as `taxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`='3' "));  //Shopping
		$payupgrade=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxupamnt`,sum(tax)as `taxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`='4' "));  //Upgrade
		$with=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `withdrawamnt`,sum(tax)as `wittaxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`='1' ")); //Withdraw
		$with_b=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `withdrawamnt`,sum(tax)as `wittaxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`='1' and method=2 ")); //Withdraw via bkash
		$with_ro=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `withdrawamnt`,sum(tax)as `wittaxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`='1' and method=3 ")); //Withdraw via rocket
		$with_re=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `withdrawamnt`,sum(tax)as `wittaxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`='1' and method=5 ")); //Withdraw via recharge
		$trx_pp_mobile_recharge=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxamnt`,sum(tax)as `taxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`='5' and method=5 ")); //PP To Mobile Recharge
		$trx_pp=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `trxamnt`,sum(tax)as `taxt` FROM `trx` WHERE `send_id`='".$spot_ref."' and `type`='5' and method!=5 ")); //PP To Upgarde Wallet
		$with_p=$with_b->withdrawamnt+$with_ro->withdrawamnt+$with_re->withdrawamnt;
		$rec=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `recamnt`, sum(amount/100)AS `customercreate` FROM `trx` WHERE `rec_id`='".$spot_ref."' and `type`='0'"));
		$fund=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `recamnt` FROM `trx` WHERE `rec_id`='".$spot_ref."' and `type`='10'"));
		//$prod_req=mysqli_fetch_object($mysqli->query("SELECT sum(total)as `goods` FROM `prod_req` WHERE `send_id`='".$spot_ref."' and `chk`='1'"));
		$rows_cutomer=mysqli_num_rows($mysqli->query("select * from `member` WHERE `member_id`='$spot_ref' and `team`='1' ")); // Cutomer
		$dss=mysqli_fetch_object($mysqli->query("select sum(spot)as `amnt` from `member` WHERE `sponsor`='$spot_ref' ")); // DSS
		$recshopping=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `recshopamnt` FROM `trx` WHERE `rec_id`='".$spot_ref."' and `type`='3' ")); 
		$recupgrade=mysqli_fetch_object($mysqli->query("SELECT sum(amount)as `recupamnt` FROM `trx` WHERE `rec_id`='".$spot_ref."' and `type`='4' "));
        $stepupcost=mysqli_fetch_object($mysqli->query("SELECT SUM(amnt) AS `cost` FROM `stepup` WHERE `user_id`='".$spot_ref."'"));		
        $planupcost=mysqli_fetch_object($mysqli->query("SELECT SUM(amnt) AS `cost` FROM `planup` WHERE `user_id`='".$spot_ref."'"));		
        $expdateupcost=mysqli_fetch_object($mysqli->query("SELECT SUM(amnt) AS `cost` FROM `expdate` WHERE `user_id`='".$spot_ref."'"));		
		$gencom=$generation->g_all*$setting->mem_join_spot_cash_wallet/100;
		$genstepup=$generation->g_all*$setting->mem_join_spot_upgrade_wallet/100;
		$genshopping=$generation->g_all*$setting->mem_join_spot_shopping_wallet/100;
		$dailyincom=$daily->dailyincom*$setting->mem_join_spot_cash_wallet/100; 
		$dailyincomstepup=$daily->dailyincom*$setting->mem_join_spot_upgrade_wallet/100;
		$dailyincomhoppinh=$daily->dailyincom*$setting->mem_join_spot_shopping_wallet/100;
		$spot=($dailyincomhoppinh*5/100);
// shopping = Shopping 10% + DailyCom 10% + Gen 10% + Received Shopping Balance From Admin/Member
    	$shopping=($dss->amnt+$spn->shoppingamnt+$spn2->shoppingamnt+$dailyincomhoppinh+$recshopping->recshopamnt+$genshopping)-($payshopping->trxshopamnt+$payshopping->taxt+$pp->amnt);
// Upgrade = Upgrade 10% + DailyCom 10% + Gen 10% + Received Upgrade Balance From Admin/Member
		$stepup=($spn->stepup+$spn2->stepup+$dailyincomstepup+$recupgrade->recupamnt+$genstepup)-($payupgrade->trxupamnt+$payupgrade->taxt+$stepupcost->cost);
		$direct=$spn->spamnt; //+$spn2->spamnt
		$inv=mysqli_fetch_object($mysqli->query("select sum(tpoint)as `trp` from `invoice` where `user_id`='".$spot_ref."' and `paid`='1' and `type`='0' ")); // 0 = Invoice; 1 = Product
		$point=($with_b->withdrawamnt+$with_ro->withdrawamnt+$with_re->withdrawamnt+$inv->trp+$pp->amnt)-($investpoint->product+$investPurchasePoint->product+$trx_pp->trxamnt+$trx_pp->taxt+$trx_pp_mobile_recharge->trxamnt);//$invest_cust_to_mem->product
		$mysqli->query("UPDATE `member` SET `point`='".$point."' WHERE `user_id`='".$spot_ref."' and `team`=1 "); // Customer PP
		$taxt=$pay->taxt+$with->wittaxt; //+$payupgrade->taxt
		$customer=($rec->customercreate-$rows_cutomer);

		// spot: Daily Shop Spot Com
		$mysqli->query("UPDATE `member` SET `spot`='".$spot."' WHERE `user_id`='".$spot_ref."'");
		$mysqli->query("UPDATE `balance` SET 
		`customer`='".$customer."',
		`pay_bal`='".$pay->trxamnt."', 
		`tax`='".$taxt."', 
		`rec_bal`='".$rec->recamnt."',   
		`direct`='".$direct."', 
		`spot`='".$dss->amnt."', 
		`gen`='".$gencom."', 
		`matching`='".$matching->amnt."', 
		`shopping`='".$shopping."',
	    `balance_purchase_point`='".$point."',
		`stepup`='".$stepup."', 
		`daily`='".$dailyincom."', 
		`withdraw`='".$with->withdrawamnt."', 
		`product`='".$invest->product."' 
		WHERE `user_id`='".$spot_ref."'"); 			
		$cal=mysqli_fetch_object($mysqli->query("SELECT `gen`,`spot`,`daily`,`rec_bal`,`direct`,`pay_bal`,`product`, `withdraw`, `tax` FROM `balance` WHERE `user_id`='".$spot_ref."'"));
		
		$net=(($cal->rec_bal+$cal->direct+$cal->daily+$cal->gen+$fund->recamnt)-($cal->pay_bal+$cal->product+$cal->withdraw+$cal->tax+$planupcost->cost+$expdateupcost->cost+$prod_req->goods)); 		
		$mysqli->query("UPDATE `balance` SET `net_bal`='".$net."' WHERE `user_id`='".$spot_ref."'");
		if($net<0){
			$mysqli->query("UPDATE `balance` SET `active`='0' WHERE `user_id`='".$spot_ref."'");
			$mysqli->query("UPDATE `tree` SET `active`='0' WHERE `user_id`='".$spot_ref."'");
		}else{
			$mysqli->query("UPDATE `balance` SET `active`='1' WHERE `user_id`='".$spot_ref."'");
			$mysqli->query("UPDATE `tree` SET `active`='1' WHERE `user_id`='".$spot_ref."'");
		}
		
	
	?>	 
		