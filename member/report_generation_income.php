<?php require('session.php');?>
<!DOCTYPE html>
<html class=" ">
<?php require_once("head.php")?>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
        <!-- START TOPBAR -->
        <?php require_once("topbar.php")?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <?php require_once("sidebar.php")?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">All <?php echo $page;?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->


                                        <table class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                   
													<th>Generation</th>
													<th>Sponsor Users</th>
													<th>Commission</th>
													<th>Income</th>

													
                                                </tr>
                                            </thead>
                                            <tbody>
                                           <?php
										   $fa_group="<i class='fa fa-group'></i> ";
		$generation=mysqli_fetch_object($mysqli->query("SELECT * FROM `gen` where `user_id`='".$id."' ")); 
		?>     
                                           <tr>
          <td class="">1st</td>
        <td class=""><?php if($generation->c1>0){echo $fa_group.$generation->c1;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=1">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g1;?>%</td>
        <td class=""><?php if($generation->g1>0){echo $generation->g1."<b>$bdt</b>";}else{echo"0";} ?></td>
		    </tr>
		<tr>
		        <td class="">2nd</td>
        <td class=""><?php  if($generation->c2>0){echo $fa_group.$generation->c2;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=2">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g2;?>%</td>
         <td class=""><?php if($generation->g2>0){echo $generation->g2."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
			<tr>
		        <td class="">3rd</td>
        <td class=""><?php if($generation->c3>0){echo $fa_group.$generation->c3;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=3">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g3;?>%</td>
         <td class=""><?php if($generation->g3>0){echo $generation->g3."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
			<tr>
		        <td class="">4th</td>
        <td class=""><?php  if($generation->c4>0){echo $fa_group.$generation->c4;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=4">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g4;?>%</td>
         <td class=""><?php if($generation->g4>0){echo $generation->g4."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
			<tr>
		        <td class="">5th</td>
        <td class=""><?php if($generation->c5>0){echo $fa_group.$generation->c5;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=5">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g5;?>%</td>
         <td class=""><?php if($generation->g5>0){echo $generation->g5."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
			<tr>
		        <td class="">6th</td>
        <td class=""><?php if($generation->c6>0){echo $fa_group.$generation->c6;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=6">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g6;?>%</td>
         <td class=""><?php if($generation->g6>0){echo $generation->g6."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
			<tr>
		        <td class="">7th</td>
        <td class=""><?php if($generation->c7>0){echo $fa_group.$generation->c7;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=7">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g7;?>%</td>
        <td class=""><?php if($generation->g7>0){echo $generation->g7."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
			<tr>
		        <td class="">8th</td>
        <td class=""><?php if($generation->c8>0){echo $fa_group.$generation->c8;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=8">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g8;?>%</td>
        <td class=""><?php if($generation->g8>0){echo $generation->g8."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
			<tr>
		        <td class="">9th</td>
        <td class=""><?php if($generation->c9>0){ echo $fa_group.$generation->c9;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=9">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g9;?>%</td>
         <td class=""><?php if($generation->g9>0){echo $generation->g9."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
	<tr>
		<td class="">10th</td>
        <td class=""><?php if($generation->c10>0){ echo $fa_group.$generation->c10;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=10">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g10;?>%</td>
        <td class=""><?php if($generation->g10>0){echo $generation->g10."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
    <tr>
		<td class="">11th</td>
        <td class=""><?php if($generation->c11>0){ echo $fa_group.$generation->c11;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=11">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g11;?>%</td>
         <td class=""><?php if($generation->g11>0){echo $generation->g11."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
    <tr>
		<td class="">12th</td>
        <td class=""><?php if($generation->c12>0){ echo $fa_group.$generation->c12;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=12">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g12;?>%</td>
        <td class=""><?php if($generation->g12>0){echo $generation->g12."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
    <tr>
		<td class="">13th</td>
        <td class=""><?php if($generation->c13>0){ echo $fa_group.$generation->c13;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=13">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g13;?>%</td>
        <td class=""><?php if($generation->g13>0){echo $generation->g13."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
    <tr>
		<td class="">14th</td>
        <td class=""><?php if($generation->c14>0){ echo $fa_group.$generation->c14;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=14">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g14;?>%</td>
         <td class=""><?php if($generation->g14>0){echo $generation->g14."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
    <tr>
		<td class="">15th</td>
        <td class=""><?php if($generation->c15>0){ echo $fa_group.$generation->c15;?> <a href="report_generation_income.php?page=<?php echo $page;?>&&Generation=15">View</a><?php }else{echo"0";} ?></td> <td class=""><?php echo $setting->g15;?>%</td>
         <td class=""><?php if($generation->g15>0){echo $generation->g15."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
	<tr>
    <td class=""><hr>Total</td>
        <td class=""><hr><?php 
		$tc=($generation->c1+$generation->c2+$generation->c3+$generation->c4+$generation->c5+$generation->c6+$generation->c7+$generation->c8+$generation->c9+$generation->c10+$generation->c12+$generation->c13+$generation->c14+$generation->c15);
		if($tc>0){echo $fa_group.$tc;}else{echo"0";}
		?></td>
        <td class=""><hr><b><?php echo $tg=($setting->g1+$setting->g2+$setting->g3+$setting->g4+$setting->g5+$setting->g6+$setting->g7+$setting->g8+$setting->g9+$setting->g10+$setting->g11+$setting->g12+$setting->g13+$setting->g14+$setting->g15); ?>%</b></td>
		<td class=""><hr><?php if($generation->g_all>0){echo $generation->g_all."<b>$bdt</b>";}else{echo"0";} ?></td>
    </tr>
                                            </tbody>
                                        </table>
										<hr>
										<?php if($_GET['Generation']>0){ ?>
										<h2>Generation <?php if(isset($_GET['Generation'])){echo $_GET['Generation'];} ?><p align="right"><a href="report_generation_income.php?page=Generation%20Income">Hidden</a></p></h2>
										  <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%"> 
                                            <thead>
											
                                                <tr>
			
													<th>Date</th>
													<th>#</th>
													<th>User Name</th>
													<th>Sponsor</th>
													
													<th>Point</th>
													<th>Percent</th>
													<th>Earn</th>
                                                </tr>
												
                                            </thead>
                                            <tbody>
<?php $n=1;
	if($_GET['Generation']==1){ 
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select user_id from member where member.sponsor='$id')");
	}elseif($_GET['Generation']==2){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id'))");	
	}elseif($_GET['Generation']==3){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id')))");	
	}elseif($_GET['Generation']==4){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id'))))");	
	}elseif($_GET['Generation']==5){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id')))))");	
	}elseif($_GET['Generation']==6){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id'))))))");	
	}elseif($_GET['Generation']==7){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id')))))))");	
	}elseif($_GET['Generation']==8){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id'))))))))");	
	}elseif($_GET['Generation']==9){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id')))))))))");	
	}elseif($_GET['Generation']==10){
		$exe1 = $mysqli->query("select `user_id`, `log_id`, `sponsor`, `upline`, `point`, `date` SUM(point) as price16, from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where member.sponsor in (select member.user_id from member where sponsor in (select member.user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor in (select user_id from member where member.sponsor='$id'))))))))))");	
	}

				if($_GET['Generation']==1){  $g=$setting->g1;}
				if($_GET['Generation']==2){  $g=$setting->g2;}
				if($_GET['Generation']==3){  $g=$setting->g3;}
				if($_GET['Generation']==4){  $g=$setting->g4;}
				if($_GET['Generation']==5){  $g=$setting->g5;}
				if($_GET['Generation']==6){  $g=$setting->g6;}
				if($_GET['Generation']==7){  $g=$setting->g7;}
				if($_GET['Generation']==8){  $g=$setting->g8;}
				if($_GET['Generation']==9){  $g=$setting->g9;}
				if($_GET['Generation']==10){  $g=$setting->g10;}
				if($_GET['Generation']==11){  $g=$setting->g11;}
				if($_GET['Generation']==12){  $g=$setting->g12;}
				if($_GET['Generation']==13){  $g=$setting->g13;}
				if($_GET['Generation']==14){  $g=$setting->g14;}
				if($_GET['Generation']==15){  $g=$setting->g15;}

		while($res1=mysqli_fetch_object($exe1)){ 
$daily=mysqli_fetch_object($mysqli->query("SELECT `package` FROM `tree` where `user_id`='".$res1->user_id."' "));
		?>
			<tr>
<td><?php echo $res1->date; ?></td>
			<th class=""  scope="row"><?php echo $n++;?></th>
				<td> <?php echo $res1->log_id; ?></td>
				<td> <?php 
						$exe12=mysqli_fetch_object($mysqli->query("SELECT `user` FROM `tree` where `user_id`='".$res1->sponsor."'"));
						echo $exe12->user;
						?>
				</td>
				
				<td><?php echo $res1->point; ?></td>
				<td><?php 
				if(isset($_GET['Generation'])){ echo $g;}
				?>%</td>
				<td><?php 
				if(isset($_GET['Generation'])){  echo $earn=($res1->point*$g/100); }
				?></td>
			</tr>
			<?php $total=$total+$earn; } ?>
											</tbody>
											<tfoot>
											
                                                <tr>
			
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													
													<th></th>
													<th>Total:</th>
													<th><?php echo $total; ?></th>
                                                </tr>
												
                                            </tfoot>
                                        </table>
										<?php } ?>
                                        <!-- ********************************************** -->




                                    </div>
                                </div>
                            </div>
                        </section></div>






                </section>
            </section>
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
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
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