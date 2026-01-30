
<div class="page-sidebar ">

                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="profile.php">
                                <img src="images/avatar/<?php echo $pro->photo; ?>" alt="<?php echo $mem->log_id; ?>" title="<?php echo $mem->log_id; ?>" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="profile.php"><?php echo $mem->log_id; ?></a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title">
							<?php
		if($cus->team==0){ 
			require('star.php');
			if($tre->package==1){$lavelcolor='info';}
			if($tre->package==2){$lavelcolor='primary';}
			if($tre->package==3){$lavelcolor='success';}
			if($tre->package==4){$lavelcolor='warning';}
			if($tre->package==5){$lavelcolor='info';}
			if($tre->package==6){$lavelcolor='primary';}
			if($tre->package==7){$lavelcolor='success';}
			if($tre->package==8){$lavelcolor='warning';}
			if($tre->package==9){$lavelcolor='info';}
			if($tre->package==10){$lavelcolor='primary';}
			echo"<span class='badge badge-$lavelcolor'>";
			if($tre->package==1){echo $star1;}
			elseif($tre->package==2){echo $star2;}
			elseif($tre->package==3){echo $star3;}
			elseif($tre->package==4){echo $star4;}
			elseif($tre->package==5){echo $star5;}
			elseif($tre->package==6){echo $star6;}
			elseif($tre->package==7){echo $star7;}
			elseif($tre->package==8){echo $star8;}
			elseif($tre->package==9){echo $star9;}
		    elseif($tre->package==10){echo $star10;}
			else{}
			echo "-".$tre->club."</span>";
			if($planupchk>0){
				if($pla->name=="Silver"){$packcolor='primary';}
				if($pla->name=="Bronze"){$packcolor='orange';}
				if($pla->name=="Gold"){$packcolor='warning';}
				if($pla->name=="Diamond"){$packcolor='purple';}
				if($pla->name=="Platinum"){$packcolor='purple';}
				if($pla->name=="Titanium"){$packcolor='purple';}
				echo" <span class='badge badge-$packcolor'>";
				if($pla->name!=''){echo $pla->name;}
				echo"</span>";
			}else{
				
				
				$q_plan=$mysqli->query("select * from `plan`");
				while($res_plan=mysqli_fetch_object($q_plan)){
					if($res_plan->name=="Silver"){$packcolor='primary';}
					if($res_plan->name=="Bronze"){$packcolor='orange';}
					if($res_plan->name=="Gold"){$packcolor='warning';}
					if($res_plan->name=="Diamond"){$packcolor='purple';}
					if($res_plan->name=="Platinum"){$packcolor='warning';}if($res_plan->name=="Titanium"){$packcolor='warning';}
					
					echo" <span class='badge badge-$packcolor'>";
					if($tre->plan==$res_plan->serial){echo $res_plan->name;}
					echo"</span>";
				}
			}
			
			if($mem->stype==1){$clubcolor='primary'; $club_name='Happy';}
			if($mem->stype==2){$clubcolor='success'; $club_name='Regular';}
			if($mem->stype==3){$clubcolor='warning'; $club_name='Lucky';}
			if($mem->stype==4){$clubcolor='primary'; $club_name='Freedom';}if($mem->stype==5){$clubcolor='primary'; $club_name='Extreme';}

			echo" <span class='badge badge-$clubcolor'>";
					echo $club_name."-".$tre->position;
					echo"</span>";
		}else{
		echo" <span class='badge badge-info'>";
					echo "Customer";
					echo"</span>";	
		}
			?>
							</p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->


<?php if(isset($_GET['menu'])){$menu=$_GET['menu'];} ?>
                    <ul class='wraplist'>	
                        <li <?php if($menu=="Dashboard"){echo "class='open'";} ?>> 
                            <a href="home.php?page=Dashboard&&menu=Dashboard">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
<li <?php if($menu=="Profile"){echo "class='open'";} ?>> 
   <a href="javascript:;"><i class="fa fa-user"></i><span class="title">Profile</span><span class="arrow "></span></a>
	<ul class="sub-menu" >
		<li><a class="<?php if($page=="User Profile"){echo "active";} ?>" href="profile.php?page=User Profile&&menu=Profile"><i class="fa fa-user"></i> Profile Update</a></li>
		<li><a class="<?php if($page=="User Photo"){echo "active";} ?>" href="photo.php?page=User Photo&&menu=Profile"><i class="fa fa-reddit"></i> Photo Update</a></li>
		<li><a class="<?php if($page=="Change Password"){echo "active";} ?>" href="pass.php?page=Change Password&&menu=Profile"><i class="fa fa-refresh"></i> Password Change</a></li>
		<li><a class="<?php if($page=="Change Pin Code"){echo "active";} ?>" href="pin.php?page=Change Pin Code&&menu=Profile"><i class="fa fa-spinner"></i> Pin Code Change</a></li>
	</ul>
</li>
						 <?php if($cus->team==0){?> 
						 <li  <?php if($menu=="Affiliate"){echo "class='open'";} ?>> 
                            <a href="javascript:;">
                               <?php echo $t; ?>
                                <span class="title">Affiliate</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
		<li><a class="<?php if($page=="Daily Income"){echo "active";} ?>" href="report_daily_income.php?page=Daily Income&&menu=Affiliate"><i class="fa fa-stack-exchange"></i> Daily Income</a></li>
		<li><a class="<?php if($page=="Sponsor income"){echo "active";} ?>" href="report_sponsor_income.php?page=Sponsor income&&menu=Affiliate"><i class="fa fa-stack-exchange"></i> Sponsor income</a></li>
		<li><a class="<?php if($page=="Upgrade Wallet"){echo "active";} ?>" href="report_upgrade_wallet.php?page=Upgrade Wallet&&menu=Affiliate"><i class="fa fa-stack-exchange"></i> Upgrade Wallet</a></li>
		<li><a class="<?php if($page=="Shopping Wallet"){echo "active";} ?>" href="report_shopping_wallet.php?page=Shopping Wallet&&menu=Affiliate"><i class="fa fa-stack-exchange"></i> Shopping Wallet</a></li>
		<li><a class="<?php if($page=="DSS Wallet"){echo "active";} ?>" href="report_dss.php?page=DSS Wallet&&menu=Affiliate"><i class="fa fa-stack-exchange"></i> DSS Wallet</a></li>
		<li><a class="<?php if($page=="Generation Income"){echo "active";} ?>" href="report_generation_income.php?page=Generation Income&&menu=Affiliate"><i class="fa fa-stack-exchange"></i> Generation Income</a></li>
		
		<!--<li><a class="<?php if($page=="Matching Income"){echo "active";} ?>" href="report_matching_income.php?page=Matching Income&&menu=Affiliate"><i class="fa fa-stack-exchange"></i> Matching Income</a></li>
		<li><a class="<?php if($page=="Rank Incentive"){echo "active";} ?>" href="report_incentive.php?page=Rank Incentivee&&menu=Affiliate"><i class="fa fa-stack-exchange"></i> Rank Incentive</a></li>-->
		
							</ul>
                        </li>
							<li  <?php if($menu=="Balance"){echo "class='open'";} ?>> 
                            <a href="javascript:;">
                               <i class="fa fa-money"></i>
                                <span class="title">Balance</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li><a class="<?php if($page=="Transfer Balance"){echo "active";} ?>" href="bal_trx.php?page=Transfer Balance&&menu=Balance" ><i class="fa fa-mail-forward"></i> Transfer Balance</a></li>
								<li><a class="<?php if($page=="Transfer Shopping Balance"){echo "active";} ?>" href="bal_shopping_trx.php?page=Transfer Shopping Balance&&menu=Balance" ><i class="fa fa-mail-forward"></i> Transfer Shopping Balance</a></li>
								<li><a class="<?php if($page=="Transfer Upgrade Balance"){echo "active";} ?>" href="bal_upgrade_trx.php?page=Transfer Upgrade Balance&&menu=Balance" ><i class="fa fa-mail-forward"></i> Transfer Upgrade Balance</a></li>
								<li><a class="<?php if($page=="Transfer PP Balance"){echo "active";} ?>" href="bal_trx_pp.php?page=Transfer PP Balance&&menu=Balance" ><i class="fa fa-mail-forward"></i> Transfer PP Balance</a></li>
								
                                <li><a class="<?php if($page=="Request For Balance"){echo "active";} ?>" href="bal_req.php?page=Request For Balance&&menu=Balance"><i class="fa fa-mail-reply-all"></i> Request For Balance</a></li>
                                <li><a class="<?php if($page=="Received Balance"){echo "active";} ?>" href="bal_rec.php?page=Received Balance&&menu=Balance"><i class="fa fa-mail-reply "></i> Received Balance</a></li>
                                <li><a class="<?php if($page=="Received Gift Balance"){echo "active";} ?>" href="bal_rec_gift.php?page=Received Gift Balance&&menu=Balance"><i class="fa fa-mail-reply "></i> Received Gift Balance</a></li>
                                <li><a class="<?php if($page=="Received Shopping Balance"){echo "active";} ?>" href="bal_rec_shopping.php?page=Received Shopping Balance&&menu=Balance"><i class="fa fa-mail-reply "></i> Received Shopping Balance</a></li>
								<li><a class="<?php if($page=="Received Upgarde Balance"){echo "active";} ?>" href="bal_rec_upgrade.php?page=Received Upgarde Balance&&menu=Balance"><i class="fa fa-mail-reply"></i>Received Upgarde Balance</a></li>
								<li><a class="<?php if($page=="Withdraw Balance"){echo "active";} ?>" href="bal_with.php?page=Withdraw Balance&&Payment_Mathod=cash&&menu=Balance"><i class="fa fa-money "></i> Withdraw Balance</a></li>
								<li><a class="<?php if($page=="Mobile Recharge"){echo "active";} ?>" href="bal_mobile_recharge.php?page=Mobile Recharge&&Payment_Mathod=recharge&&menu=Balance"><i class="fa fa-money "></i> Mobile Recharge</a></li>
								
                            </ul>
                        </li>
						
						<?php } ?>
						<?php if($cus->team==1){?>
<li><a class="<?php if($page=="Mobile Recharge"){echo "active";} ?>" href="bal_mobile_recharge_customer.php?page=Mobile Recharge&&Payment_Mathod=recharge&&menu=Balance"><i class="fa fa-money "></i> Mobile Recharge</a></li>
						<?php } ?>
<li <?php if($menu=="Members"){echo "class='open'";} ?>> 
  <a href="javascript:;"><i class="fa fa-group"></i><span class="title">Members</span><span class="arrow "></span></a>
	<ul class="sub-menu" >
		<?php if($cus->team==0){?>  
		<li><a class="<?php if($page=="Member List"){echo "active";} ?>" href="member.php?page=Member List&&menu=Members"><i class="fa fa-user"></i> Member List</a></li> 
		<li><a class="<?php if($page=="Add Member"){echo "active";} ?>" href="member_add.php?page=Add Member&&menu=Members"><i class="fa fa-plus"></i> Add Member</a></li>
		<li><a class="<?php if($page=="Add Member(PP)"){echo "active";} ?>" href="member_purchase_add.php?page=Add Member(PP)&&menu=Members"><i class="fa fa-plus"></i> Add Member(PP)</a></li>
		<li><a class="<?php if($page=="Customer List"){echo "active";} ?>" href="customer_all.php?page=Customer List&&menu=Members"><i class="fa fa-child"></i> Customer List</a></li>
		<li><a class="<?php if($page=="Add Customer"){echo "active";} ?>" href="member_customer_add.php?page=Add Customer&&menu=Members"><i class="fa fa-plus"></i> Add Customer</a></li>
		<li><a class="<?php if($page=="Club Member List"){echo "active";} ?>" href="member_club.php?page=Club Member List&&menu=Members"><i class="fa fa-cubes"></i> Club Member List</a></li>
		<li><a class="<?php if($page=="Member Category List"){echo "active";} ?>" href="member_category.php?page=Member Category List&&menu=Members"><i class="fa fa-cubes"></i> Member Category List</a></li>
		<li><a class="<?php if($page=="Genealogy View"){echo "active";} ?>" href="tree.php?page=Genealogy View&&menu=Members"><i class="fa fa-sitemap"></i> Genealogy View</a></li>
		<!--<li><a class="<?php if($page=="Downline"){echo "active";} ?>" href="downline.php?page=Downline&&menu=Members"><i class="fa fa-sitemap"></i> Downline</a></li>-->
		<li><a class="<?php if($page=="Package Upgrade"){echo "active";} ?>" href="plan.php?page=Package Upgrade&&menu=Members"><i class="fa fa-cloud-upload"></i> Package Upgrade</a></li>
		<li><a class="<?php if($page=="Expire Date Upgrade"){echo "active";} ?>" href="expdate.php?page=Expire Date Upgrade&&menu=Members"><i class="fa fa-cloud-upload"></i> Expire Date Upgrade</a></li>
		<?php } ?>
		<?php if($cus->team==1){?>
		<li><a href="member_customer_to_member_add.php?page=Make Member&&menu=Members"><i class="fa fa-user"></i>Make Member</a></li>
		<?php }  ?> 
	
		<li><a class="<?php if($page=="Agent Information"){echo "active";} ?>" href="agent_list.php?page=Agent Information&&menu=Members"><i class="fa fa-user"></i>All Agent Information</a></li>
		<li><a class="<?php if($page=="Merchant Information"){echo "active";} ?>" href="merchant_list.php?page=Merchant Information&&menu=Members"><i class="fa fa-user"></i>All Merchant Information</a></li>
	</ul>
</li>
<li <?php if($menu=="Products"){echo "class='open'";} ?>> 
   <a href="javascript:;"><i class="fa fa-shopping-cart"></i><span class="title">Products</span><span class="arrow "></span></a>
	<ul class="sub-menu" > 
		<li><a class="<?php if($page=="Product List(Company)"){echo "active";} ?>" href="product_admin.php?page=Product List(Company)&&menu=Products" ><i class="fa fa-shopping-cart"></i> Product List(Company)</a></li>
		 <li><a class="<?php if($page=="Product List(Agent)"){echo "active";} ?>" href="product_agent.php?page=Product List(Agent)&&menu=Products" ><i class="fa fa-shopping-cart"></i> Product List(Agent)</a></li>
		 <li><a class="<?php if($page=="Product List(Merchant)"){echo "active";} ?>" href="product_merchant.php?page=Product List(Merchant)&&menu=Products" ><i class="fa fa-shopping-cart"></i> Product List(Merchant)</a></li>
		 <li><a class="<?php if($page=="Product List(Zip Code)"){echo "active";} ?>" href="product_agent_zip.php?page=Product List(Zip Code)&&menu=Products" ><i class="fa fa-shopping-cart"></i> Product List(Zip Code)</a></li>
		 <li><a class="<?php if($page=="Product List(Post Code)"){echo "active";} ?>" href="product_agent_postal.php?page=Product List(Post Code)&&menu=Products" ><i class="fa fa-shopping-cart"></i> Product List(Post Code)</a></li>
		<li><a class="<?php if($page=="Order List"){echo "active";} ?>" href="product_order.php?page=Order List&&menu=Products" ><i class="fa fa-newspaper-o"></i> Order List</a></li>
		<li><a class="<?php if($page=="My Purchase List"){echo "active";} ?>" href="report_my_purchase_list.php?page=My Purchase List&&menu=Products"><i class="fa fa-file"></i> My Purchase List</a></li>
		<li><a class="<?php if($page=="My Invoice"){echo "active";} ?>" href="report_my_invoice.php?page=My Invoice&&menu=Products"><i class="fa fa-file-text-o"></i> My Invoices</a></li>
	</ul>
</li>
<li <?php if($menu=="Phone Book"){echo "class='open'";} ?>> 
  <a href="javascript:;"><i class="fa fa-phone"></i><span class="title">Phone Book</span><span class="arrow "></span></a>
	<ul class="sub-menu" >
		<li><a class="<?php if($page=="Number"){echo "active";} ?>" href="phonebook.php?page=Number&&menu=Phone Book"><i class="fa fa-phone-square"></i> All Number</a></li>
		<li><a class="<?php if($page=="Add Number"){echo "active";} ?>" href="phonebook_add.php?page=Add Number&&menu=Phone Book"><i class="fa fa-plus"></i> Add New Number</a></li>
	</ul>
</li>
<?php if($cus->team==0){?>
<li <?php if($menu=="Statement"){echo "class='open'";} ?>> 
  <a href="javascript:;"><i class="fa fa-history"></i><span class="title">Statement</span><span class="arrow "></span></a>
	<ul class="sub-menu" >
		<li><a class="<?php if($page=="Package Upgrade"){echo "active";} ?>" href="report_plan_upgrade.php?page=Package Upgrade&&menu=Statement"><i class="fa fa-stack-exchange"></i> Package Upgrade</a></li>
		<li><a class="<?php if($page=="Member Joining Cost"){echo "active";} ?>" href="report_join_cost.php?page=Member Joining Cost&&menu=Statement"><i class="fa fa-stack-exchange"></i> Member Joining Cost</a></li>
		<li><a class="<?php if($page=="Member Joining Cost(PP)"){echo "active";} ?>" href="report_member_join_cost_pp.php?page=Member Joining Cost(PP)&&menu=Statement"><i class="fa fa-stack-exchange"></i> Member Joining Cost(PP)</a></li>
		<li><a class="<?php if($page=="Credite Purchase Point"){echo "active";} ?>" href="report_credite_pp.php?page=Credite Purchase Point&&menu=Statement"><i class="fa fa-stack-exchange"></i> Credite PP</a></li>
		<!--
		<li><a class="<?php //if($page=="Page"){echo "active";} ?>" href="page.php?page=Page"><i class="fa fa-caret-right"></i> Page</a></li>
		<li><a class="<?php //if($page=="Table"){echo "active";} ?>" href="page_table.php?page=Table"><i class="fa fa-caret-right"></i> Table</a></li>
		<li><a class="<?php //if($page=="Icon"){echo "active";} ?>" href="page_icon.php?page=Icon"><i class="fa fa-caret-right"></i> Icon</a></li>
	-->
	</ul>
</li>
						<?php } ?>
						<?php if($cus->team==0){?> 
             <li class=""><a href="#"><i class="fa fa-refresh"></i><span class="title">
			 <?php
								if($tre->get>0){
                                echo "<font color='green'> Earn: </font>";
                                $d=strtotime("+$tre->get days");
                                echo date("d-M-Y", $d);
                                }else{
                                echo "<font color='red'>Expired </font>&nbsp;";    
                                }
			
			 ?>
			 </span></a></li>     
<li class=""><a href="#"><i class="fa fa-refresh"></i><span class="title">
			 <?php
								if($tre->expdate>0){
                                echo "<font color='yellow'> Exp: </font>";
                                $d=strtotime("+$tre->expdate days");
                                echo date("d-M-Y", $d);
                                }else{
                                echo "<font color='red'>Expired </font>&nbsp;";    
                                }
			
			 ?>
			 </span></a></li> 
	<?php } ?>			 
<li class=""><a href="logout.php"><i class="fa fa-lock"></i><span class="title">Logout</span></a></li>       

                    </ul>

                </div>
                <!-- MAIN MENU - END -->



                <div class="project-info">

                    <div class="block1">
                        <div class="data">
                            <span class='title'>Today H/R/L/F</span>
                            <span class='total'><?php echo $hd; ?>/<?php echo $rd; ?>/<?php echo $ld; ?>/<?php echo $fd; ?></span>
                        </div>
                        <!--div class="graph">
                            <span class="sidebar_orders">...</span>
                        </div-->
                    </div>

                    <div class="block2">
                        <div class="data">
                            <span class='title'>Total H/R/L/F</span>
                              <span class='total'><?php echo $h; ?>/<?php echo $r; ?>/<?php echo $l; ?>/<?php echo $f; ?></span>
                        </div>
                    </div>

                </div>
				



            </div>