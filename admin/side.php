 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $adm->user; ?></p>

              <?php if($adm->active==1){ ?><a href="#"><i class="fa fa-circle text-success"></i> Online</a><?php } ?>
            </div>
          </div>
          <!-- search form -->
        <?php 
		$adminId=$_SESSION['AdminUserId'];
		$adminAll=mysqli_num_rows($mysqli->query("SELECT `user_id` FROM `admin` ")); //Admin
	//SELECT `serial`, `user_id`, `log_id`, `pass`, `password`, `pin`, `name`, `type`, `zone_id`, `upozela_id`, `union_id`, `ward_id`, `agent_id`, `mobile`, `active`, `date`, `sponsor`, `refer`, `team`, `royalty`, `dsd`, `sales`, `invest`, `direct`, `weekly`, `monthly`, `rank`, `admin_in`, `admin_out`, `member_in`, `member_out`, `net_bal`, `last_login` FROM `dealer` WHERE 1
	$partnerAll=mysqli_num_rows($mysqli->query("SELECT `serial` FROM `dealer`"));
	$partnerZone1=mysqli_num_rows($mysqli->query("SELECT `type` FROM `dealer` where `type`='1' "));
	$partnerZone2=mysqli_num_rows($mysqli->query("SELECT `type` FROM `dealer` where `type`='2' "));
	$partnerZone3=mysqli_num_rows($mysqli->query("SELECT `type` FROM `dealer` where `type`='3' "));
	$partnerZone4=mysqli_num_rows($mysqli->query("SELECT `type` FROM `dealer` where `type`='4' "));
	$partnerZone5=mysqli_num_rows($mysqli->query("SELECT `type` FROM `dealer` where `type`='5' "));
	$zone1=mysqli_num_rows($mysqli->query("SELECT `type` FROM `dealer` where `type`='5' "));
	$partnerZone6=mysqli_num_rows($mysqli->query("SELECT `type` FROM `dealer` where `type`='6' "));

	$paychk=mysqli_num_rows($mysqli->query("SELECT * FROM `withdraw` where `date`='".$date."' and `type`='1' and `rec_id`='$recid' and `account`='3' and `status`='0' "));
	$paychkall=mysqli_num_rows($mysqli->query("SELECT * FROM `withdraw` where `type`='1' and `rec_id`='$recid' and `account`='3' and `status`='0' "));
	$memchk=mysqli_num_rows($mysqli->query("SELECT * FROM `member` where `team`=0 and `date`='".$date."' and `active`='0' "));
	$memchkall=mysqli_num_rows($mysqli->query("SELECT * FROM `member` where `team`=0 and `active`='0' "));
	$cuschkall=mysqli_num_rows($mysqli->query("SELECT * FROM `member` where `team`=1 and `active`='0' "));
	$adm=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` WHERE `user_id`='$adminId' "));
	$customerAll=mysqli_num_rows($mysqli->query("SELECT `user_id` FROM `member` WHERE `team`='1' ")); //Customer: `team`='1'
	$memberAll=mysqli_num_rows($mysqli->query("SELECT `user_id` FROM `member` WHERE `team`='0' ")); //Member: `team`='0'
	$ad=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `balance` WHERE `user_id`='".$adminId."'"));?>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           <li class="active"><a href="home.php"><i class="fa fa-usd"></i> <span><?php echo $ad->net_bal.$bdt; ?></span></i></a>
            <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></i></a>
              
            </li>
      
            <?php 
            //  0=Admin;   1=Super Admin; 2=Accounts; 3=Product Manager; 4=Manager; 5= Assistant Manager
            if($adm->type==1 || $adm->type==3){ // 1=Super Admin;  3=Product Manager; ?>
               <li>
                  <a href="#"><i class="fa fa-cart-plus"></i> <span> Products Management<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
				   <li><a href="product_order.php"><i class="fa fa-circle-o"></i>Order List</a></li>
				<li><a href="prod.php?page=All Products"><i class="fa fa-cart-plus"></i>General Products</a></li>
				 <li><a href="product.php"><i class="fa fa-circle-o"></i>Consumer Products</a></li>
                   <li><a href="prod_add.php?page=Add New Product"><i class="fa fa-cart-plus"></i> Add New Product</a></li>
                   <li><a href="prod_invoice.php?page=Invoice List"><i class="fa fa-circle-o text-info"></i> Invoice List</a></li>
                   <li><a href="prod_invoice_add.php?page=Create New Invoice"><i class="fa fa-circle-o text-info"></i> Create New Invoice</a></li>
				   <li><a href="product_shop_cart.php"><i class="fa fa-circle-o"></i>Shopping Cart</a></li>
				<!--<li><a href="block_ip.php"><i class="fa fa-circle-o"></i>Block IP</a></li>-->
                  </ul>
                </li>
			<?php } ?>
				<?php if($adm->type==1 || $adm->type==2){ // 1=Super Admin;  2=Accounts; ?>
			 
                <li>
                  <a href="#"><i class="fa fa-share"></i> <span> Pay chart<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
				<li><a href="mlm_daily.php?pageName=Daily Comission(Mem) "><i class="fa fa-usd"></i>Daily Comission(Mem)</a></li>
				<li><a href="com_mem_join.php?pageName=Join Commission(Del) "><i class="fa fa-usd"></i>Member Join Com(Del)</a></li>
                  <li><a href="mlm_generation.php?pageName=Generation"><i class="fa fa-circle-o text-warning"></i> Generation</a></li> 
                   <li><a href="mlm_tree.php?pageName=Tree"><i class="fa fa-cogs"></i> Tree</a></li>
                   <!--<li><a href="mlm_matching.php?pageName=Matching"><i class="fa fa-cogs"></i> Matching</a></li>-->
                 <!--   <li><a href="mlm_candidate.php"><i class="fa fa-circle-o"></i> Candidate</a></li>-->

				  
                  </ul>
                </li>
				<?php if($adm->type==2){ // 1=Super Admin;  2=Accounts; ?>
				<li><a href="payments.php"><i class="fa fa-money"></i> <span>Payments Member(Cash)</span><?php if($paychk>0){ ?><span title="Pending Payment" class="label label-warning pull-right"><?php echo $paychk;?></span><?php } ?> </a></li> 
				<?php } ?>
				<li>
                  <a href="#"><i class="fa fa-share"></i> <span> Balance<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
					          
					<li><a href="transfer.php?pageName=Topup Management"><i class="fa fa-share"></i> <span>Topup Management</span> </a></li>
					<!--<li><a href="account_daily_com.php?pageName=Accounts Daily Comission"><i class="fa fa-usd"></i> Daily Comission(Acc)</a></li>-->
					<li><a href="admin_bal.php?pageName=Admin Balance Sheet"><i class="fa fa-usd"></i>Balance Sheet(Adm)</a></li>
					<li><a href="mlm_bal.php?pageName=Balance Sheet(Member)"><i class="fa fa-usd"></i> Balance Sheet(Mem)</a></li>
					<li><a href="bal_service_charge.php?pageName=Service Charge"><i class="fa fa-usd"></i> Service Charge</a></li>
					   
	              </ul>
                </li>
			<?php } ?>
		
		<?php if($adm->type==0 || $adm->type==1){ // 1=Super Admin; ?>
			 <li><a href="recharge.php"><i class="fa fa-reply"></i> <span>Recharge Balance</span> </a></li> 
			  
			  <li>
                  <a href="#"><i class="fa fa-users"></i> <span> Users<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
<li><a href="admin.php"><i class="fa fa-user"></i> <span>Admin</span><span title="All Admin" class="label label-info pull-right"><?php echo $adminAll; ?></span></a></li>	

<li><a href="member_customer.php"><i class="fa fa-user"></i> <span>Customers</span><span title="All Customers" class="label label-info pull-right"><?php echo $customerAll; ?></span><?php if($cuschkall>0){ ?><span title="All Inactive Customer" class="label label-danger pull-right"><?php echo $cuschkall;?></span><?php } ?> </a></li> 

<li><a href="member.php"><i class="fa fa-user"></i> <span>Members</span> <span title="All Active Member" class="label label-info pull-right"><?php echo $memberAll; ?></span><?php if($memchkall>0){ ?><span title="All Inactive Member" class="label label-danger pull-right"><?php echo $memchkall;?></span><?php } ?><?php if($memchk>0){ ?><span title="Today Inactive Member" class="label label-warning pull-right"><?php echo $memchk;?></span><?php } ?></a></li> 

<li><a href="dealer_merchant.php"><i class="fa fa-user"></i> <span>Merchant</span><span title="All Merchant" class="label label-info pull-right"><?php echo $partnerZone6; ?></span> </a></li>
<li><a href="dealer_agent.php"><i class="fa fa-user"></i> <span>Agent</span><span title="All Agent" class="label label-info pull-right"><?php echo $partnerZone5; ?></span> </a></li>			  

<li><a href="dealer.php"><i class="fa fa-user"></i> <span>Partner</span><span title="All Partner" class="label label-info pull-right"><?php echo $partnerAll; ?></span> </a></li>
<li><a href="dealer_mdh.php"><i class="fa fa-user"></i> <span>MDH Partner</span><span title="All MDH Partner" class="label label-info pull-right"><?php echo $partnerZone1; ?></span> </a></li>
<li><a href="dealer_dh.php"><i class="fa fa-user"></i> <span>DH Partner</span><span title="All DH Partner" class="label label-info pull-right"><?php echo $partnerZone2; ?></span> </a></li>
<li><a href="dealer_sdh.php"><i class="fa fa-user"></i> <span>SDH Partner</span> <span title="All SDH Partner" class="label label-info pull-right"><?php echo $partnerZone3; ?></span></a></li>
<li><a href="dealer_uw.php"><i class="fa fa-user"></i> <span>DSO Partner</span><span title="All DSO Partner" class="label label-info pull-right"><?php echo $partnerZone4; ?></span> </a></li>


<!--<li><a href="member_agent.php"><i class="fa fa-users"></i> <span>Agent</span></a></li>-->
				  
                  </ul>
                </li>
	<?php } ?>
<?php if($adm->type==0){ //0=Admin ?>
<li><a href="dealer.php"><i class="fa fa-users"></i> <span>Partner</span> </a></li>
<li><a href="dealer_add.php"><i class="fa fa-plus"></i> <span>Add New Partner</span> </a></li>
<?php } ?>	


            	<?php if($adm->type==1 || $adm->type==3){ // 1= Super Admin 3=Product Manager; ?>
             <li class="treeview"><a href="#"><i class="fa fa-plus"></i> Add <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                          	<?php if($adm->type==1 || $adm->type==3){ // 3=Product Manager; ?>
             <li><a href="cat.php"><i class="fa fa-cog"></i> <span>Add Category</span> </a></li>            
            <li><a href="product_add.php"><i class="fa fa-cart-plus"></i> <span>Add New Product</span> </a></li> 
            <?php } ?>
                          <?php if($adm->type==1){ // 1= Super Admin ?>
						  <!--
			<li><a href="dealer_add.php"><i class="fa fa-plus"></i> <span>Add New Merchant</span></a></li>
			<li><a href="dealer_add.php"><i class="fa fa-plus"></i> <span>Add New Partner</span></a></li>
			<li><a href="zone.php"><i class="fa fa-cogs"></i> <span>Zone Setup</span> </a></li>
			-->
			<li><a href="admin_add.php"><i class="fa fa-plus"></i> <span>Add New Admin</span> </a></li>
		
			<li><a href="slide.php"><i class="fa fa-circle-o"></i> <span>Slider</span> </a></li>
			 <li><a href="slide_add.php"><i class="fa fa-plus"></i> <span>Add Slider</span> </a></li> 
			 <li><a href="notice.php"><i class="fa fa-plus"></i> <span>Notice</span> </a></li> 
			 <li><a href="notice_add.php"><i class="fa fa-plus"></i> <span>Add Notice</span> </a></li> 
			 <li><a href="address.php"><i class="fa fa-plus"></i> <span>Address</span> </a></li> 
			 <li><a href="address_add.php"><i class="fa fa-plus"></i> <span>Add Address</span> </a></li> 
			 
			 <li><a href="mobile_banking.php"><i class="fa fa-plus"></i> <span>Mobile Banking</span> </a></li> 
			 <li><a href="mobile_banking_add.php"><i class="fa fa-plus"></i> <span>Add Mobile Banking</span> </a></li> 
            
            	<?php } ?>	
                         </ul>
             </li>
		
		<?php } ?>
		<?php if($adm->type==1){ //  0=Admin; ?>
            <li><a href="zone.php"><i class="fa fa-cog"></i> <span>Zone Setup</span> </a></li> 
               <?php } ?> 
           <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-rss"  aria-hidden="true"></i> <span>Extra</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="page.php"><i class="fa fa-share"></i> <span> Page</a></li>
                <li><a href="table.php"><i class="fa fa-reply" aria-hidden="true"></i> Table</a></li>
				<li><a href="slide.php"><i class="fa fa-money"></i> <span>Slider</span> </a></li>
              </ul>
            </li>  
			<li><a href="visitor.php?page=Visitor&active=All"><i class="fa fa-user"></i>Visitor</a></li>
			<li><a href="backup_db.php"><i class="fa fa-database"></i>Backup Database</a></li>-->
			<?php if($adm->type==1){ //  1=Super Admin; ?>
			<li><a href="sms.php?pageName=SMS Report"><i class="fa fa-send"></i> <span>SMS Report</span> </a></li>
			<li><a href="log.php?pageName=Log"><i class="fa fa-th"></i> <span>Log</span> </a></li>
			<li><a href="setting.php"><i class="fa fa-cog"></i> <span>Settings</span> </a></li>
			<?php } ?> 
			<li><a href="logout.php"><i class="fa fa-user"></i> <span>Logout</span> </a></li>
           
          
			
			
			
         
         
            
            <li><a href="#">
				<i class="fa fa-circle-o text-danger"></i> 
				<i class="fa fa-circle-o text-warning"></i> 
				<i class="fa fa-circle-o text-info"></i>
				<span class="label label-primary pull-right">4</span>
				<small class="label pull-right bg-green">Hot</small>
				 <small class="label pull-right bg-red">3</small>
				   <small class="label pull-right bg-yellow">12</small>
			</a></li>
			<li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>