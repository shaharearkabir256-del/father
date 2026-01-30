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
							$package=1;
					   $p1clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`>0 and `club`='0' and `package`='$package' ")); 
							$p1club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=1 and `club`='1' and `package`='$package' ")); 
							$p1club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=1 and `club`='2' and `package`='$package' ")); 
							$p1club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=2 and `club`='3' and `package`='$package' ")); 
							$p1club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=2 and `club`='4' and `package`='$package' ")); 
							$p1club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=3 and `club`='5' and `package`='$package' ")); 
							$p1club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=3 and `club`='6' and `package`='$package' ")); $p1club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=4 and `club`='7' and `package`='$package' "));$p1club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `stype`=4 and `club`='8' and `package`='$package' ")); 
							?>                      
                                                      <td></td>
                                                   <td align="center"><span class="btn btn-info"><?php echo $p1clubmember;?><br>Daily Club</span></td>  
                                                    <td colspan="2" align="center"><span class="btn btn-primary"><?php echo $happy=$p1club1+$p1club2;?><br>Happy Club </span> </td>
                                                    <td colspan="2" align="center"><span class="btn btn-success"><?php echo $regular=$p1club3+$p1club4;?><br>Regular Club </span> </td>
                                                    <td colspan="2" align="center"><span class="btn btn-warning"><?php echo $lucky=$p1club5+$p1club6;?><br>Lucky Club </span> </td> 
													<td colspan="2" align="center"><span class="btn btn-danger"><?php echo $freedom=$p1club7+$p1club8;?><br>Freedom Club </span> </td>
                                                </tr>
                                                 </thead>
                                                <tr>
		 <th><hr>Level</th>
	
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
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:#f05050;'";?>>
		 <span class="label label-danger">Seventh Club <?php echo $setting->mem_club7;?>%</span>
		 </th>
		 <th><hr <?php echo $hr="style='height:1px; border:none; color:#f00; background-color:#f05050;'";?>>
		 <span class="label label-danger">Eighth Club <?php echo $setting->mem_club8;?>%</span>
		 </th>

												
                                                </tr>
                                            <tbody>
						                                           
                                        
        <tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class="">1st</th>
		<th class="<?php if($tre->club==0){echo "info"; }?>"><?php echo $p1clubmember;?></th>
		<th class="<?php if($tre->club==1){echo "info"; }?>"><?php echo $p1club1;?></th>
        <th class="<?php if($tre->club==2){echo "info"; }?>"><?php echo $p1club2;?></th>
        <th class="<?php if($tre->club==3){echo "info"; }?>"><?php echo $p1club3;?></th>
        <th class="<?php if($tre->club==4){echo "info"; }?>"><?php echo $p1club4;?></th>
        <th class="<?php if($tre->club==5){echo "info"; }?>"><?php echo $p1club5;?></th>
        <th class="<?php if($tre->club==6){echo "info"; }?>"><?php echo $p1club6;?></th>
		<th class="<?php if($tre->club==7){echo "info"; }?>"><?php echo $p1club7;?></th>
		<th class="<?php if($tre->club==8){echo "info"; }?>"><?php echo $p1club8;?></th>
        </tr>
	<?php					$package=2;
							$p2clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p2club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p2club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p2club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p2club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p2club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p2club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p2club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p2club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class="">2nd</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p2clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p2club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p2club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p2club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p2club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p2club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p2club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p2club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p2club8;?></td>
    </tr>
	<?php					$package=3;
							$p3clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p3club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p3club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p3club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p3club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p3club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p3club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p3club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p3club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class="">3rd</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p3clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p3club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p3club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p3club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p3club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p3club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p3club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p3club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p3club8;?></td>
    </tr>
	<?php					$package=4;
							$p4clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p4club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p4club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p4club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p4club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p4club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p4club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p4club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p4club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class="">4th</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p4clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p4club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p4club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p4club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p4club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p4club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p4club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p4club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p4club8;?></td>
    </tr>
	<?php					
							$package=5;
							$p4clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p4club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p4club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p4club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p4club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p4club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p4club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p4club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p4club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class=""><?php echo $package;?>th</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p4clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p4club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p4club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p4club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p4club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p4club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p4club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p4club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p4club8;?></td>
    </tr>
	<?php					
							$package=6;
							$p4clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p4club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p4club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p4club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p4club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p4club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p4club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p4club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p4club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class=""><?php echo $package;?>th</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p4clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p4club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p4club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p4club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p4club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p4club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p4club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p4club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p4club8;?></td>
    </tr>
	<?php					
							$package=7;
							$p4clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p4club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p4club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p4club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p4club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p4club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p4club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p4club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p4club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class=""><?php echo $package;?>th</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p4clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p4club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p4club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p4club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p4club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p4club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p4club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p4club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p4club8;?></td>
    </tr>
	<?php					
							$package=8;
							$p4clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p4club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p4club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p4club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p4club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p4club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p4club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p4club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p4club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class=""><?php echo $package;?>th</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p4clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p4club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p4club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p4club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p4club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p4club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p4club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p4club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p4club8;?></td>
    </tr>
	<?php					
							$package=9;
							$p4clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p4club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p4club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p4club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p4club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p4club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p4club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p4club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p4club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class=""><?php echo $package;?>th</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p4clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p4club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p4club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p4club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p4club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p4club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p4club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p4club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p4club8;?></td>
    </tr>
	<?php					
							$package=10;
							$p4clubmember=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='0' and `package`='$package' ")); 
							$p4club1=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='1' and `package`='$package' ")); 
							$p4club2=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='2' and `package`='$package' ")); 
							$p4club3=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='3' and `package`='$package' ")); 
							$p4club4=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='4' and `package`='$package' ")); 
							$p4club5=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='5' and `package`='$package' ")); 
							$p4club6=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='6' and `package`='$package' "));
							$p4club7=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='7' and `package`='$package' "));
							$p4club8=mysqli_num_rows($mysqli->query("SELECT `club` FROM `tree` where `club`='8' and `package`='$package' ")); 
							?> 
	<tr class="<?php if($tre->package==$package){echo ""; }else{ echo "warning"; } ?>">
        <th class=""><?php echo $package;?>th</th>
		<td class="<?php if($tre->club==0){echo "success"; }?>"><?php echo $p4clubmember;?></td>
		<td class="<?php if($tre->club==1){echo "success"; }?>"><?php echo $p4club1;?></td>
        <td class="<?php if($tre->club==2){echo "success"; }?>"><?php echo $p4club2;?></td>
        <td class="<?php if($tre->club==3){echo "success"; }?>"><?php echo $p4club3;?></td>
        <td class="<?php if($tre->club==4){echo "success"; }?>"><?php echo $p4club4;?></td>
        <td class="<?php if($tre->club==5){echo "success"; }?>"><?php echo $p4club5;?></td>
        <td class="<?php if($tre->club==6){echo "success"; }?>"><?php echo $p4club6;?></td>
		<td class="<?php if($tre->club==7){echo "success"; }?>"><?php echo $p4club7;?></td>
		<td class="<?php if($tre->club==8){echo "success"; }?>"><?php echo $p4club8;?></td>
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