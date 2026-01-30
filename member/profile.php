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
                                <h1 class="title"><?php echo $page;?></h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Profile</a>
                                    </li>
                                    <li class="active">
                                        <strong><?php echo $page;?></strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    
							<div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="uprofile-image">
                                            <a href="photo.php?page=User%20Photo"><img src="images/avatar/<?php echo $pro->photo; ?>" alt="<?php echo $tre->user; ?>" title="<?php echo $tre->user; ?>" class="img-responsive"></img></a>
                                        </div>
                                        <div class="uprofile-name">
                                            <h3>
                                                <a href="#"><?php echo $pro->fname.' '.$pro->lname;?></a>
                                                <!-- Available statuses: online, idle, busy, away and offline -->
                                                <span class="uprofile-status online"></span>
                                            </h3>
                                            <p class="uprofile-title">
												<?php 
			require('star.php');
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
			?>
											</p>
                                        </div>
                                        <div class="uprofile-info">
                                            <ul class="list-unstyled">
                                                <li><i class='fa fa-home'></i> <?php echo $pro->address; ?></li>
                                                <li><i class='fa fa-user'></i> <?php echo $pro->mobile; ?></li>
                                                <!--<li><i class='fa fa-suitcase'></i> Tech Lead, YIAM</li>-->
                                            </ul>
                                        </div>
                                       <!-- <div class="uprofile-buttons">
                                            <a class="btn btn-md btn-primary">Send Message</a>
                                            <a class="btn btn-md btn-primary">Add as Friend</a>
                                        </div>
                                        <div class=" uprofile-social">

                                            <a href="#" class="btn btn-primary btn-md facebook"><i class="fa fa-facebook icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md twitter"><i class="fa fa-twitter icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md dribbble"><i class="fa fa-dribbble icon-xs"></i></a>

                                        </div> -->

                                    </div><!-- /.col-3 -->
                                    <div class="col-md-9 col-sm-8 col-xs-12">

                                        <div class="uprofile-content">
                                            
<div class="row">
							<div class="col-xs-10">
								<form action="profile_action.php" method="post" class="form-horizontal">
									<div class="form-group">
										<?php if(isset($_SESSION['msg1'])){ echo "<button class='btn btn-success btn-block'>".$_SESSION['msg1']."</button> ";} ?>
					<?php if(isset($_SESSION['msg'])){ echo "<button class='btn btn-danger btn-block'>".$_SESSION['msg']."</button> "; } ?>				
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Level<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php
		if($cus->team==0){ 
			require('star.php');
			if($tre->package==1){$lavelcolor='info';}
			if($tre->package==2){$lavelcolor='primary';}
			if($tre->package==3){$lavelcolor='success';}
			if($tre->package==4){$lavelcolor='warning';}
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
		echo"</span>"; } ?>
										</div>
								
										<label class="col-sm-3 control-label">Package<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php
		if($planupchk>0){
				if($pla->name=="Silver"){$packcolor='primary';}
				if($pla->name=="Bronze"){$packcolor='orange';}
				if($pla->name=="Gold"){$packcolor='warning';}
				if($pla->name=="Diamond"){$packcolor='purple';}
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
					
					echo" <span class='badge badge-$packcolor'>";
					if($tre->plan==$res_plan->serial){echo $res_plan->name;}
					echo"</span>";
				}
			} ?>
										</div>
										</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Joining Category<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php
		if($mem->stype==1){$clubcolor='primary'; $club_name='Happy';}
			if($mem->stype==2){$clubcolor='success'; $club_name='Regular';}
			if($mem->stype==3){$clubcolor='warning'; $club_name='Lucky';}
echo" <span class='badge badge-$clubcolor'>";
					echo $club_name."-".$mem->position;
					echo"</span>";
			?>
										</div>
									
										<label class="col-sm-3 control-label">Club<font color="#990000">*</font></label>
										<div class="col-sm-3">	
												<?php
		if($tre->club<3){$clubcolor='primary'; $club_name='Happy';}
			if($tre->club>2 && $tre->club<5){$clubcolor='success'; $club_name='Regular';}
			if($tre->club>4){$clubcolor='warning'; $club_name='Lucky';}
echo" <span class='badge badge-$clubcolor'>";
					echo $tre->club;
					echo"</span>";
			?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Sponsor Id<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php echo $spo->log_id;?>
										</div>
								
										<label class="col-sm-3 control-label">Upline Id<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php echo $tre->upline;?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Dealer Id<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php echo $agn->log_id;?>
										</div>
								
										<label class="col-sm-3 control-label">Joining Date<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php echo $mem->date;?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">NID<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php echo $pro->nid;?>
										</div>
								
										<label class="col-sm-3 control-label">Mobile<font color="#990000">*</font></label>
										<div class="col-sm-3">	
										<?php echo $pro->mobile;?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">E-Mail<font color="#990000">*</font></label>
										<div class="col-sm-9">				
											<?php echo $pro->email;?>
											<?php if($pro->email_verify==0){ ?>
											<a href="profile_email_verify.php"><font color="red">Verify</font></a>  
											<?php }else{ ?>
											<b><a>Verified</a></b>
											<?php } ?>
										</div>
									</div>
			
									
								<div class="form-group">
										<label class="col-sm-3 control-label">First Name</label>
										<div class="col-sm-<?php if($pro->fnamec==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="fname" class="col-sm-3 form-control" placeholder="name" value="<?php echo $pro->fname;?>" />
										</div>
										<?php if($pro->fnamec==0){?>
										<button type="submit" name="fnamec" class="btn btn-success btn-lg btn-xs">Update</button>
										<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-<?php if($pro->lnamec==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="lname" class="form-control" placeholder="name" value="<?php echo $pro->lname;?>" />
										</div>
										<?php if($pro->lnamec==0){?>
										<button type="submit" name="lnamec" class="btn btn-success btn-lg btn-xs">Update</button> 
									<?php } ?>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Father&rsquo;s Name</label>
										<div class="col-sm-<?php if($pro->fatherc==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="father" class="form-control" placeholder="Father Name" value="<?php echo $pro->father;?>" />
										</div>
										<?php if($pro->fatherc==0){?>
										<button type="submit" name="fatherc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Mother&rsquo;s Name</label>
										<div class="col-sm-<?php if($pro->motherc==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="mother" class="form-control" placeholder="Mother Name" value="<?php echo $pro->mother;?>" />
										</div>
										<?php if($pro->motherc==0){?>
										<button type="submit" name="motherc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Date Of Birth</label>
										<div class="col-sm-<?php if($pro->birthc==0){echo "5";}else{echo "3";}?>">
											<select name="bday" class="form-control">
											<option value="">Day</option>
											<?php  
												for ($bday = 1; $bday <= 31; $bday++) { ?>
												  <option <?php if($pro->bday==$bday){echo"selected";} ?>  ><?php echo $bday; ?> </option>
												<?php } ?> 
											
											</select>
										</div>
										<div class="col-sm-<?php if($pro->birthc==0){echo "4";}else{echo "3";}?>">	
			<select name="bmonth"  class="form-control" id="month">
			<option value="">Month</option>
			<?php if($pro->bmonth!=''){ ?>
			<option selected><?php echo $pro->bmonth?></option>
			<?php }
			/* for($m=1; $m<=12; ++$m){
			echo '<option>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>';
			} */
			/* $months = array();
			for ($i = 0; $i < 8; $i++) {
			$timestamp = mktime(0, 0, 0, date('n') - $i, 1);
			echo '<option>'.$months[date('n', $timestamp)] = date('F', $timestamp).'</option>';
			} */
			$months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
			$transposed = array_slice($months, date('n'), 12, true) + array_slice($months, 0, date('n'), true);
			$last8 = array_reverse(array_slice($transposed, -8, 12, true), true);
			foreach ($months as $num => $name) {
			printf('<option>%s</option>',$name);//value="%u" $num 
			}
			?>
			</select>								
										
										</div>
									<?php if($pro->birthc==0){ ?>	
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>	
									<?php } ?>
									<div class="col-sm-<?php if($pro->birthc==0){echo "6";}else{echo "3";}?>">	
											
											<select name="byear" class="form-control">
											<option value="">Year</option>
											<?php  
												for ($byear = 1950; $byear <= 2005; $byear++) { ?>
												  <option <?php if($pro->byear==$byear){echo"selected";} ?>  ><?php echo $byear; ?> </option>
												<?php } ?> 
											
											</select>
										</div>
										<?php if($pro->birthc==0){?>
									<button type="submit" name="birthc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Address<font color="#990000">*</font></label>
										<div class="col-sm-<?php if($pro->addressc==0){echo "6";}else{echo "9";}?>">				
											<textarea rows="3" type="text" name="address" class="form-control" placeholder="Address"><?php echo $pro->address;?></textarea>
										</div>
										<?php if($pro->addressc==0){?>
										<button type="submit" name="addressc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Zip Code</label>
										<div class="col-sm-<?php if($pro->zipc==0){echo "6";}else{echo "9";}?>">				
											<input type="number" name="zip" class="form-control" placeholder="Zip Code" value="<?php echo $pro->zip;?>" />
										</div>
										<?php if($pro->zipc==0){?>
										<button type="submit" name="zipc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Post Code</label>
										<div class="col-sm-<?php if($pro->postalc==0){echo "6";}else{echo "9";}?>">				
											<input type="number" name="postal" class="form-control" placeholder="Post Code" value="<?php echo $pro->postal;?>" />
										</div>
										<?php if($pro->postalc==0){?>
										<button type="submit" name="postalc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
									
									<div class="col-sm-4"></div>
									<div class="col-sm-4">
									<?php if($pro->profilec==0){?>
										<button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Update All</button>
									<?php } ?>
									</div>
									</div>
								</form>
								
							</div><!-- /.col-xs-10 -->
						</div><!-- /.row -->
					</div><!-- /.uprofile-content -->
                                        </div><!-- /.col-md-9 -->
                                    </div><!-- /.row -->
                                </div><!-- /.content-body -->
                            </div><!-- /.col-12 -->
                        </section></div>


                </section><!-- /.wrapper main-wrapper -->
            </section><!-- /.main-content -->
            <!-- END CONTENT -->
            <div class="page-chatapi hideit">

                <div class="search-bar">
                    <input type="text" placeholder="Search" class="form-control">
                </div>

                <div class="chat-wrapper">
                    <h4 class="group-head">Groups</h4>
                    <ul class="group-list list-unstyled">
                        <li class="group-row">
                            <div class="group-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Work</a></h4>
                            </div>
                        </li>
                        <li class="group-row">
                            <div class="group-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Friends</a></h4>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">Favourites</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_1' data-user-id='1'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clarine Vassar</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_2' data-user-id='2'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Brooks Latshaw</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_3' data-user-id='3'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clementina Brodeur</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">More Contacts</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_4' data-user-id='4'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Carri Busey</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_5' data-user-id='5'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Melissa Dock</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_6' data-user-id='6'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Verdell Rea</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_7' data-user-id='7'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Linette Lheureux</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_8' data-user-id='8'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Araceli Boatright</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_9' data-user-id='9'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clay Peskin</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_10' data-user-id='10'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Loni Tindall</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_11' data-user-id='11'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Tanisha Kimbro</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_12' data-user-id='12'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Jovita Tisdale</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>


            <div class="chatapi-windows ">


            </div>    </div>
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
        <script src="assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 













        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Section Settings</h4>
                    </div>
                    <div class="modal-body">

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>

<?php
unset($_SESSION['msg1']);
unset($_SESSION['msg']);
?>

