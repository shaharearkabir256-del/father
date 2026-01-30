<?php require('session.php');?>
<!DOCTYPE html>
<html class=" ">
<?php require_once('head.php')?>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <?php require_once('topbar.php')?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <?php require_once('sidebar.php')?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">
                            <div class="pull-left"> 
                                <h1 class="title"><?php echo $page;?> | <a href="../index.php" target="_blank">Go To Shop</a></h1>
							</div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <section class="box nobox">
                            <div class="content-body">


                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">

                                        <div class="r1_graph1 db_box db_box_large">
                                            <span class='bold'>+<?php echo $bal->rec_bal.$t?></span>
                                            <span class='pull-right'><small><a href="bal_rec.php?page=Received%20Balance&&menu=Balance">Received Amount</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_dynamicbar">Loading...</span>
                                        </div>
                                    </div>
									<div class="col-md-4 col-sm-6 col-xs-12">

                                        <div class="r1_graph1 db_box db_box_large">
                                            <span class='bold'>+<?php echo $bal->direct.$t?></span>
                                            <span class='pull-right'><small><a href="report_sponsor_income.php?page=Sponsor%20income&&menu=Affiliate">Sponsor Income</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_dynamicbar">Loading...</span>
                                        </div>
                                    </div>
									<div class="col-md-4 col-sm-6 col-xs-12">

                                        <div class="r1_graph1 db_box db_box_large">
                                            <span class='bold'>+<?php echo $bal->daily.$t?></span>
                                            <span class='pull-right'><small><a href="report_daily_income.php?page=Daily%20Income&&menu=Affiliate">Daily Income</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_dynamicbar">Loading...</span>
                                        </div>
                                    </div>
									<div style="display:block;" class="col-md-4 col-sm-6 col-xs-12">

                                        <div class="r1_graph1 db_box db_box_large">
                                            <span class='bold'>+<?php echo $bal->gen.$t?></span>
                                            <span class='pull-right'><small><a href="report_generation_income.php?page=Generation%20Income&&menu=Affiliate">Generation Income</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_dynamicbar">Loading...</span>
                                        </div>
                                    </div>
									<div style="display:none;" class="col-md-4 col-sm-6 col-xs-12">

                                        <div class="r1_graph1 db_box db_box_large">
                                            <span class='bold'><?php echo $bal->matching.$t?></span>
                                            <span class='pull-right'><small><a href="report_matching_income.php?page=Matching%20Income&&menu=Affiliate">Matching Income</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_dynamicbar">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">

                                        <div class="r1_graph2 db_box db_box_large">
                                            <span class='bold'>-<?php echo $bal->pay_bal.$t?></span>
                                            <span class='pull-right'><small><a href="bal_trx.php?page=Transfer%20Balance&&menu=Balance">Transaction Amount</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_linesparkline">Loading...</span>
                                        </div>

                                    </div>
									
									  <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="r1_graph2 db_box db_box_large">
                                            <span class='bold'>-<?php echo $bal->withdraw.$t?></span>
                                            <span class='pull-right'><small><a href="bal_with.php?page=Withdraw%20Balance&&menu=Balance">Withdraw Amount</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_linesparkline">Loading...</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 hidden-sm col-sm-12 col-xs-12">

                                        <div class="r1_graph1 db_box db_box_large">
                                            <span class='bold'>-<?php echo $bal->product.$t?></span>
                                            <span class='pull-right'><small><a href="report_join_cost.php?page=Member%20Joining%20Cost&&menu=Statement">Joinning Cost</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_linesparkline">Loading...</span>
                                        </div>
                                    </div>
									  <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="r1_graph2 db_box db_box_large">
                                            <span class='bold'><?php echo $bal->stepup.$t?></span>
                                            <span class='pull-right'><small><a href="report_upgrade_wallet.php?page=Upgrade%20Wallet&&menu=Affiliate">Upgrade Wallet</a></small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_linesparkline">Loading...</span>
                                        </div>
                                    </div>
									  <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="r1_graph2 db_box db_box_large">
                                            <span class='bold'><?php echo $bal->shopping.$t?></span>
                                            <span class='pull-right'>
											<small><a href="report_shopping_wallet.php?page=Shopping%20Wallet&&menu=Affiliate">Shopping Wallet: <?php $tshop=(($spn->shoppingamnt+$spn2->shoppingamnt+$dailyincomhoppinh+$genshopping+$recshopping->recshopamnt)-($payshopping->trxshopamnt+$payshopping->taxt+$pp->amnt)); if($tshop>0){echo "+".substr($tshop,0,6);}else{echo"0.00";} ?></a></small><br>
											<small><a href="report_dss.php?page=Sponsor Daily income Shopping Royality&&menu=Affiliate">Sponsor Daily income Shopping Royality Wallet: <?php if($cal->spot>0){echo "+".$cal->spot;}else{echo"0.00";}?></a></small><br>
											</span>
                                            <div class="clearfix"></div>
                                            <div class="clearfix"></div>
                                            <div class="clearfix"></div>
                                          
                                        </div>
                                    </div>
								<div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="r1_graph2 db_box db_box_large">
                                            <span class='bold'><?php echo $bal->balance_purchase_point.$t?></span>
                                            <span class='pull-right'>
											<small><a href="report_my_purchase_list.php?page=My%20Purchase%20List&&menu=Products">Shop PP: <?php if($inv->trp>0){echo "+".$inv->trp;}else{echo"0.00";}?></a></small><br>
											<!--<small>With PP: <?php if($with_p>0){echo "+".$with_p;}else{echo"0.00";}?></small><br>-->
											<small><a href="report_credite_pp.php?page=Credite%20Purchase%20Point&&menu=Statement">Credite PP: <?php if($pp->amnt>0){echo "+".$pp->amnt;}else{echo"0.00";}$pp->amnt;?></small><br>
											<small><a href="report_join_cost.php?page=Member%20Joining%20Cost&&menu=Statement">Joining Cost: <?php $debit_pp=$investpoint->product; if($debit_pp>0){echo "-".$debit_pp;}else{echo"0.00";}?></a></small><br>
											<?php if($cus->team==0){?> 
											<small><a href="bal_mobile_recharge.php?page=Mobile%20Recharge&&Payment_Mathod=recharge&&menu=Balance">Mobile Recharge: <?php if($trx_pp_mobile_recharge->trxamnt>0){echo "-".$trx_pp_mobile_recharge->trxamnt;}else{echo"0.00";}?></a></small><br>
											<?php } ?> 
											<?php if($cus->team==1){?> 
											<small><a href="bal_mobile_recharge_customer.php?page=Mobile%20Recharge&&Payment_Mathod=recharge&&menu=Balance">Mobile Recharge: <?php if($trx_pp_mobile_recharge->trxamnt>0){echo "-".$trx_pp_mobile_recharge->trxamnt;}else{echo"0.00";}?></a></small><br>
											<?php } ?>
											<small><a href="bal_trx_pp.php?page=Transfer%20PP%20Balance&&menu=Balance">Trx to Upgrade wallet: <?php if($trx_pp->trxamnt>0){echo "-".$trxpp=$trx_pp->trxamnt+$trx_pp->taxt;}else{echo"0.00";}?></a></small><br>
											<small><a href="report_member_join_cost_pp.php?page=Member Joining Cost(PP)&&menu=Statement">Member Join: <?php if($investPurchasePoint->product>0){echo "-".$investPurchasePoint->product;}else{echo"0.00";}?></a></small>
											</span>
                                        
                                        </div>
                                    </div>
			<?php 
					 $exe =$mysqli->query("SELECT * FROM `tree` where `user_id`='$memberid' ");
					 $res5=mysqli_fetch_object($mysqli->query("SELECT COALESCE(SUM(amount)) AS `amount` FROM `matching` WHERE `user`='$mem->log_id'"));
					 $res6=mysqli_fetch_object($mysqli->query("SELECT COALESCE(SUM(amount)) AS `left_point` FROM `matching` WHERE `user`='$mem->log_id'")); 
					 $res7=mysqli_fetch_object($mysqli->query("SELECT COALESCE(SUM(amount)) AS `right_point` FROM `matching` WHERE `user`='$mem->log_id'"));
					$res4=mysqli_fetch_object($exe);{
					 /* $exe =$mysqli->query("SELECT * FROM `tree` where `user`='$mem->log_id' ORDER BY `serial` DESC ");
					while($res4=mysqli_fetch_object($exe)); */
				?>
									
									
									
									<div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="r1_graph2 db_box db_box_large">
                                            <span class='bold'><?php echo $res5->amount.$t?></span>
                                            <span class='pull-right'>
											<small><a href="">Matching:<?php echo $res5->amount ?> </a></small><br>
											<!--<small>With PP: <?php if($with_p>0){echo "+".$with_p;}else{echo"0.00";}?></small><br>-->
											<small><a href="">Left Point:<?php echo $res4->left_point?> </a></small><br>
											<small><a href="">Right Point:<?php echo $res4->right_point?>  </a></small><br>
											
											<small><a href="">Total Matching point:<?php echo ""?>   </a></small><br>
											</span>
                                      
                                         
                                       
                                        
                                        </div>
                                    </div>
									
									<?php } ?>
									
										<div class="col-md-12 col-sm-6 col-xs-12">
										<?php 
									   //SELECT `serial`, `user_id`, `title`, `img`, `msg`, `mdate`, `chk` FROM `notice` WHERE 1
											$query =$mysqli->query("SELECT * FROM `notice` where `chk`=1 ORDER BY `serial` DESC");
											while($slide = mysqli_fetch_object($query)){
										?>
                                        <div class="r1_graph2 db_box db_box_large">
                                            <span class='bold'> <?php echo $slide->title; ?>
											<?php if($slide->img){ ?><br>
											<img width="80px" src="../notice/<?php echo $slide->img; ?>" alt="">
											<?php } ?>
											</span>
                                            <span class='pull-right'>
											<small><a><?php echo $slide->msg; ?></a></small><br>
											<small><a><?php echo $slide->mdate; ?></a></small>
											</span>
                                        </div>
											<?php } ?>
                                    </div>
                                </div> <!-- End .row -->    

                                <div class="row" style="display:none;">

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="r1_maingraph db_box">
                                            <span class='pull-left'>
                                                <i class='icon-purple fa fa-square icon-xs'></i>&nbsp;<small>Page Views</small>
                                                &nbsp; &nbsp;<i class='fa fa-square icon-xs icon-primary'></i>&nbsp;
                                                <small>Unique Visitors</small>
                                            </span>
                                            <div id="db_morris_bar_graph" style="height:auto;width:100%;"></div>
                                        </div>
                                    </div>


                                </div> <!-- End .row -->

                            </div>
                        </section></div>
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 hidden">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="wid-weather">

                                            <div class="today col-md-12 col-sm-12 col-xs-12 bg-primary">
                                                <div class="location pull-left">
												<?php
					   $club_total=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `package`=1 ")); 
							$oldclub0=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=0 and `club`='0' and `package`=1 ")); 
							$oldclub1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=0 and `club`='1' and `package`=1 ")); 
							$oldclub2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=0 and `club`='2' and `package`=1 ")); 
							$oldclub3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=0 and `club`='3' and `package`=1 ")); 
							$oldclub4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=0 and `club`='4' and `package`=1 ")); 
							$oldclub5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=0 and `club`='5' and `package`=1 ")); 
							$oldclub6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=0 and `club`='6' and `package`=1 "));
					   
					   $club_old_total=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=0 and `package`=1 ")); 
					   $club_new_total=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`>0 and `package`=1 ")); 
							$newclub0=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`>0 and `club`='0' and `package`=1 ")); 
							$newclub1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=1 and `club`='1' and `package`=1 ")); 
							$newclub2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=1 and `club`='2' and `package`=1 ")); 
							$newclub3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=2 and `club`='3' and `package`=1 ")); 
							$newclub4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=2 and `club`='4' and `package`=1 ")); 
							$newclub5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=3 and `club`='5' and `package`=1 ")); 
							$newclub6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=3 and `club`='6' and `package`=1 "));
												
												?>
                                                    <h3>Live Club Display</h3>
                                                    <span>Today, <?php echo date("d"); ?><sup>th</sup> <?php echo date("M"); ?> <?php echo date("Y"); ?></span>
                                                </div>
                                                <div class="degree pull-right">
                                                    <span>Total</span><h3><?php echo $club_total;?></h3>
                                                    <div class="clearfix"></div>
													<span>Happy</span><h3><?php echo $happy=($newclub0+$newclub1+$newclub2);?></h3>
                                                    <div class="clearfix"></div>
													<span>Regular</span><h3><?php echo $regular=($newclub3+$newclub4);?></h3>
                                                    <div class="clearfix"></div>
													<span>Lucky</span><h3><?php echo $lucky=($newclub5+$newclub6);?></h3>
                                                    <div class="clearfix"></div>
                                                    </div>
                                                <div class="clearfix"></div>
                                                <div class="timings">
                                                    <ul class="list-inline list-unstyled">
                                                        <li><span class="time"><?php echo $club_old_total;?></span>New<h4 class="temp"><?php echo $club_new_total;?></h4></li>
                                                        <li><span class="time"><?php echo $oldclub0; ?></span>Club0<h4 class="temp"><?php echo $newclub0; ?></h4></li>
                                                        <li><span class="time"><?php echo $oldclub1; ?></span>Club1<h4 class="temp"><?php echo $newclub1; ?></h4></li>
                                                        <li><span class="time"><?php echo $oldclub2; ?></span>Club2<h4 class="temp"><?php echo $newclub2; ?></h4></li>
                                                        <li><span class="time"><?php echo $oldclub3; ?></span>Club3<h4 class="temp"><?php echo $newclub3; ?></h4></li>
                                                        <li><span class="time"><?php echo $oldclub4; ?></span>Club4<h4 class="temp"><?php echo $newclub4; ?></h4></li>
                                                        <li><span class="time"><?php echo $oldclub5; ?></span>Club5<h4 class="temp"><?php echo $newclub5; ?></h4></li>
                                                        <li><span class="time"><?php echo $oldclub6; ?></span>Club6<h4 class="temp"><?php echo $newclub6; ?></h4></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="wid-uprofile bg-warning">

                                            <div class="uprofile-image">
                                                <img src="images/avatar/<?php echo $pro->photo; ?>" class="img-responsive">
                                            </div>
                                            <div class="uprofile-name">
                                                <h3>
                                                    <a href="#"><?php echo $tre->user; ?></a>
                                                    <!-- Available statuses: online, idle, busy, away and offline -->
                                                    <span class="uprofile-status online"></span>
                                                </h3>
                                                <p class="uprofile-title"><?php echo $pro->fname." ".$pro->lname; ?></p>
                                            </div>
                                            <div class="uprofile-info">
                                                <ul class="list-unstyled">
                                                    <li rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Upline ID" data-placement="top">
													<i class="fa fa-upload"></i> <?php echo $tre->upline; ?></li>
                                                    <li><i class="fa fa-inbox"></i> <?php echo $pro->email; ?></li>
                                                    <li><i class="fa fa-phone"></i> <?php echo $pro->mobile; ?></li>
                                                </ul>
                                            </div>
                                            <div class=" uprofile-social hidden">

                                                <a href="#" class="btn btn-primary btn-sm facebook"><i class="fa fa-facebook icon-xs"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm twitter"><i class="fa fa-twitter icon-xs"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm dribbble"><i class="fa fa-dribbble icon-xs"></i></a>

                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>
					
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title pull-left">New Users</h2>
                                        <div class="actions panel_actions pull-right">
                                            <i class="box_toggle fa fa-chevron-down"></i>
                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                            <i class="box_close fa fa-times"></i>
                                        </div>
                                    </header>
                                    <div class="content-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width:60%">Name</th>
                                                    <th style="width:30%">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php
											$q1=$mysqli->query("SELECT * FROM `tree` ORDER BY `serial` desc limit 5");
										while($res1= mysqli_fetch_object($q1))	
										{
										?>
                                                <tr <?php if($res1->date==$date){echo "class='info'";} ?>>

                                                    <td><?php echo $res1->user; ?></td>
                                                    <td><?php echo $res1->date; ?></td>
                                                </tr>
												 <?php } ?>
                                               
                                            </tbody>
                                        </table>


                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title pull-left">Received Amount</h2>
                                        <div class="actions panel_actions pull-right">
                                            <i class="box_toggle fa fa-chevron-down"></i>
                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                            <i class="box_close fa fa-times"></i>
                                        </div>
                                    </header>
                                    <div class="content-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width:60%">Sender</th>
                                                    <th style="width:30%">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               	<?php
											$q2=$mysqli->query("SELECT * FROM `trx` where `rec_id`='".$id."' ORDER BY `serial` desc limit 5");
										while($res2= mysqli_fetch_object($q2))	
										{
										?>
                                                <tr <?php if($res2->date==$date){echo "class='info'";} ?>>

                                                    <td>
													<?php
													if($res2->send_id==0){
													if($res2->type==0){
													echo "Shopping Wallet";
													}
													if($res2->type==4){
													echo "PP Wallet";
													}
													
													}
													?>
													<?php
		$memsender=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$res2->send_id."'"));
		$delsender=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$res2->send_id."'"));
		echo $memsender->log_id; 
		echo $delsender->log_id; 
		$adsender=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` WHERE `user_id`='".$res2->send_id."'"));
		echo $adsender->user;
		?>
													</td>
                                                    <td><?php echo $res2->amount; ?></td>
                                                </tr>
												 <?php } ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title pull-left">Daily Income</h2>
                                        <div class="actions panel_actions pull-right">
                                            <i class="box_toggle fa fa-chevron-down"></i>
                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                            <i class="box_close fa fa-times"></i>
                                        </div>
                                    </header>
                                    <div class="content-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width:60%">Date</th>
                                                    <th style="width:30%">Earn</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                 	<?php
											$q3=$mysqli->query("SELECT * FROM `comdaily` where `user_id`='".$id."' ORDER BY `serial` desc limit 5");
										while($res3= mysqli_fetch_object($q3))	
										{
										?>
                                                <tr <?php if($res2->cdate==$date){echo "class='info'";} ?>>

                                                    <td><?php echo $res3->cdate; ?></td>
                                                    <td><?php echo substr($res3->amount,0,6); ?></td>
                                                </tr>
												 <?php } ?>
 
                                            </tbody>
                                        </table>


                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>


                </section>
            </section>
            <!-- END CONTENT -->
           <?php //require_once('chatapi.php');?>
		   </div>
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> 
		<script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
		<script src="assets/plugins/easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
		<script src="assets/plugins/morris-chart/js/raphael-min.js" type="text/javascript"></script>
		<script src="assets/plugins/morris-chart/js/morris.min.js" type="text/javascript"></script>
		<script src="assets/js/eco-dashboard.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

    </body>
</html>