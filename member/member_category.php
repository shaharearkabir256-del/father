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
                                        <a href="#"><?php echo $page;?></a>
                                    </li>
                                    <li class="active">
                                        <strong>All <?php echo $page;?></strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

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
                                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->
<table id="" class="display table table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                  							<?php
					   $p1clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`>0 and `club`='0' and `package`=1 ")); 
							$p1club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=1 and `club`='1' and `package`=1 ")); 
							$p1club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=1 and `club`='2' and `package`=1 ")); 
							$p1club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=2 and `club`='3' and `package`=1 ")); 
							$p1club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=2 and `club`='4' and `package`=1 ")); 
							$p1club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=3 and `club`='5' and `package`=1 ")); 
							$p1club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=3 and `club`='6' and `package`=1 ")); 
							$p1club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=4 and `club`='7' and `package`=1 "));
							$p1club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=4 and `club`='8' and `package`=1 "));
							$p1club9=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=5 and `club`='9' and `package`=1 "));
							$p1club10=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=4 and `club`='10' and `package`=1 ")); 
							// Comission Distribution For One Star	
	$s=1;
	$b=2;
	$g=5;
	$d=10;
	$f=13;
	$e=14;
	
	$silver0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`>0 and `club`='0' and `package`=1 and `plan`=1 "));
	$bronze0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`>0 and `club`='0' and `package`=1 and `plan`=2 "));
	$gold0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`>0 and `club`='0' and `package`=1 and `plan`=5 "));
	$diamond0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`>0 and `club`='0' and `package`=1 and `plan`=10 "));$platinum0=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`>0 and `club`='0' and `package`=1 and `plan`=13 "));
	//$st0=($silver0*$s);	$bt0=($bronze0*$b);	$gt0=($gold0*$g); $dt0=($diamond0*$d); $plan0=($st0+$bt0+$gt0+$dt0);

	$silver1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='1' and `package`=1 and `plan`=1 "));
	$bronze1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='1' and `package`=1 and `plan`=2 "));
	$gold1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='1' and `package`=1 and `plan`=5 "));
	$diamond1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='1' and `package`=1 and `plan`=10 "));$platinum1=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='1' and `package`=1 and `plan`=13 "));
	//$st1=($silver1*$s);	$bt1=($bronze1*$b);	$gt1=($gold1*$g); $dt1=($diamond1*$d); $plan1=($st1+$bt1+$gt1+$dt1);
	
	$silver2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='2' and `package`=1 and `plan`=1 "));
	$bronze2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='2' and `package`=1 and `plan`=2 "));
	$gold2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='2' and `package`=1 and `plan`=5 "));
	$diamond2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='2' and `package`=1 and `plan`=10 "));$platinum2=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=1 and `club`='2' and `package`=1 and `plan`=13 "));
	//$st2=($silver2*$s);	$bt2=($bronze2*$b);	$gt2=($gold2*$g); $dt2=($diamond2*$d); $plan2=($st2+$bt2+$gt2+$dt2);
	
	$silver3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='3' and `package`=1 and `plan`=1 "));
	$bronze3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='3' and `package`=1 and `plan`=2 "));
	$gold3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='3' and `package`=1 and `plan`=5 "));
	$diamond3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='3' and `package`=1 and `plan`=10 "));$platinum3=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='3' and `package`=1 and `plan`=13 "));
	//$st3=($silver3*$s);	$bt3=($bronze3*$b);	$gt3=($gold3*$g); $dt3=($diamond3*$d); $plan3=($st3+$bt3+$gt3+$dt3);
	
	$silver4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='4' and `package`=1 and `plan`=1 "));
	$bronze4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='4' and `package`=1 and `plan`=2 "));
	$gold4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='4' and `package`=1 and `plan`=5 "));
	$diamond4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='4' and `package`=1 and `plan`=10 "));$platinum4=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=2 and `club`='4' and `package`=1 and `plan`=13 "));
	//$st4=($silver4*$s);	$bt4=($bronze4*$b);	$gt4=($gold4*$g); $dt4=($diamond4*$d); $plan4=($st4+$bt4+$gt4+$dt4);
	
	$silver5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='5' and `package`=1 and `plan`=1 "));
	$bronze5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='5' and `package`=1 and `plan`=2 "));
	$gold5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='5' and `package`=1 and `plan`=5 "));
	$diamond5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='5' and `package`=1 and `plan`=10 "));$platinum5=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='5' and `package`=1 and `plan`=13 "));
	//$st5=($silver5*$s);	$bt5=($bronze5*$b);	$gt5=($gold5*$g); $dt5=($diamond5*$d); $plan5=($st5+$bt5+$gt5+$dt5);
	
	$silver6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='6' and `package`=1 and `plan`=1 "));
	$bronze6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='6' and `package`=1 and `plan`=2 "));
	$gold6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='6' and `package`=1 and `plan`=5 "));
	$diamond6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='6' and `package`=1 and `plan`=10 "));$platinum6=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=3 and `club`='6' and `package`=1 and `plan`=13 "));
	
	$silver7=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='7' and `package`=1 and `plan`=1 "));
	$bronze7=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='7' and `package`=1 and `plan`=2 "));
	$gold7=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='7' and `package`=1 and `plan`=5 "));
	$diamond7=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='7' and `package`=1 and `plan`=10 "));$platinum7=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='7' and `package`=1 and `plan`=13 "));
	
	$silver8=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='8' and `package`=1 and `plan`=1 "));
	$bronze8=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='8' and `package`=1 and `plan`=2 "));
	$gold8=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='8' and `package`=1 and `plan`=5 "));
	$diamond8=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='8' and `package`=1 and `plan`=10 "));$platinum8=mysqli_num_rows($mysqli->query("SELECT `user_id` from `tree` where `stype`=4 and `club`='8' and `package`=1 and `plan`=13 "));
	//$st6=($silver6*$s);	$bt6=($bronze6*$b);	$gt6=($gold6*$g); $dt6=($diamond6*$d); $plan6=($st6+$bt6+$gt6+$dt6);
							?>                      
                                                      <td></td>
                                                   <td align="center"><span class="btn btn-info"><?php echo $p1clubmember;?><br>Daily Club</span></td>  
                                                    <td colspan="2" align="center"><span class="btn btn-primary"><?php echo $happy=$p1club1+$p1club2;?><br>Happy Club </span> </td>
                                                    <td colspan="2" align="center"><span class="btn btn-success"><?php echo $regular=$p1club3+$p1club4;?><br>Regular Club </span> </td>
                                                    <td colspan="2" align="center"><span class="btn btn-warning"><?php echo $lucky=$p1club5+$p1club6;?><br>Lucky Club </span> </td>
													<td colspan="2" align="center"><span class="btn btn-danger"><?php echo $freedom=$p1club7+$p1club8;?><br>Freedom</span> </td>
                                                </tr>
                                                 </thead>
                                                <tr>
		 <th><hr>Category</th>
	
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:rgba(35, 183, 229, 1.0);'";?>>
		 <span class="label label-info">Club Member <?php echo $setting->mem_club0;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:rgba(31, 181, 172, 1.0);'";?>>
		 <span class="label label-primary">First Club <?php echo $setting->mem_club1;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:rgba(31, 181, 172, 1.0);'";?>>
		 <span class="label label-primary">Second Club <?php echo $setting->mem_club2;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:rgba(102, 189, 120, 1.0);'";?>>
		 <span class="label label-success">Third Club <?php echo $setting->mem_club3;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:rgba(102, 189, 120, 1.0);'";?>>
		 <span class="label label-success">Fourth Club <?php echo $setting->mem_club4;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:#e9a048;'";?>>
		 <span class="label label-warning">Fifth Club <?php echo $setting->mem_club5;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:#e9a048;'";?>>
		 <span class="label label-warning">Sixth Club <?php echo $setting->mem_club6;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:#e9a048;'";?>>
		 <span class="label label-danger">seventh Club <?php echo $setting->mem_club7;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:#e9a048;'";?>>
		 <span class="label label-danger">Eighth Club <?php echo $setting->mem_club8;?>%</span>
		 </th>

												
                                                </tr>
                                            <tbody>
						                                           
                                        
        <tr class="primary">
        <th class="">Silver</th>
		<th class=""><?php echo $silver0;?></th>
		<th class=""><?php echo $silver1;?></th>
        <th class=""><?php echo $silver2;?></th>
        <th class=""><?php echo $silver3;?></th>
        <th class=""><?php echo $silver4;?></th>
        <th class=""><?php echo $silver5;?></th>
        <th class=""><?php echo $silver6;?></th>
		<th class=""><?php echo $silver7;?></th>
        <th class=""><?php echo $silver8;?></th>
        </tr>
	<?php
							$p2clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`=2 ")); 
							$p2club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`=2 ")); 
							$p2club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`=2 ")); 
							$p2club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`=2 ")); 
							$p2club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`=2 ")); 
							$p2club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`=2 ")); 
							$p2club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`=2 "));
							$p2club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`=2 "));
							$p2club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`=2 ")); 
							?> 
	<tr class="orange">
        <th class="">Bronze</th>
		<td class=""><?php echo $bronze0;?></td>
		<td class=""><?php echo $bronze1;?></td>
        <td class=""><?php echo $bronze2;?></td>
        <td class=""><?php echo $bronze3;?></td>
        <td class=""><?php echo $bronze4;?></td>
        <td class=""><?php echo $bronze5;?></td>
        <td class=""><?php echo $bronze6;?></td>
		<td class=""><?php echo $bronze7;?></td>
		<td class=""><?php echo $bronze8;?></td>
    </tr>
	<?php
							$p3clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`=3 ")); 
							$p3club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`=3 ")); 
							$p3club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`=3 ")); 
							$p3club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`=3 ")); 
							$p3club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`=3 ")); 
							$p3club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`=3 ")); 
							$p3club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`=3 ")); 
							?> 
	<tr class="warning">
        <th class="">Gold</th>
		<td class=""><?php echo $gold0;?></td>
		<td class=""><?php echo $gold1;?></td>
        <td class=""><?php echo $gold2;?></td>
        <td class=""><?php echo $gold3;?></td>
        <td class=""><?php echo $gold4;?></td>
        <td class=""><?php echo $gold5;?></td>
        <td class=""><?php echo $gold6;?></td>
		<td class=""><?php echo $gold7;?></td>
		<td class=""><?php echo $gold8;?></td>
    </tr>
	<?php
							$p4clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`=4 ")); 
							$p4club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`=4 ")); 
							$p4club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`=4 ")); 
							$p4club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`=4 ")); 
							$p4club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`=4 ")); 
							$p4club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`=4 ")); 
							$p4club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`=4 "));
							$p4club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`=4 "));
							$p4club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`=4 ")); 
							?> 
	<tr class="purple">
        <th class="">Diamond</th>
		<td class=""><?php echo $diamond0;?></td>
		<td class=""><?php echo $diamond1;?></td>
        <td class=""><?php echo $diamond2;?></td>
        <td class=""><?php echo $diamond3;?></td>
        <td class=""><?php echo $diamond4;?></td>
        <td class=""><?php echo $diamond5;?></td>
        <td class=""><?php echo $diamond6;?></td> 
		<td class=""><?php echo $diamond7;?></td>
        <td class=""><?php echo $diamond8;?></td>
    </tr>
	<tr class="info">
        <th class="">Platinum</th>
		<td class=""><?php echo $platinum0;?></td>
		<td class=""><?php echo $platinum1;?></td>
        <td class=""><?php echo $platinum2;?></td>
        <td class=""><?php echo $platinum3;?></td>
        <td class=""><?php echo $platinum4;?></td>
        <td class=""><?php echo $platinum5;?></td>
        <td class=""><?php echo $platinum6;?></td> 
		<td class=""><?php echo $platinum7;?></td>
        <td class=""><?php echo $platinum8;?></td>
    </tr>
		
	</tbody>
											
                                        </table>

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
    </body>
</html>