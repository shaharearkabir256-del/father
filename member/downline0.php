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
                                        <strong><?php echo $page;?></strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                    <!-- ********************************************** -->
											<?php
				$n=1;
				$query=$mysqli->query("SELECT * FROM `tree` where `upline`='$mem->log_id' order by `serial` asc");
				while($res=mysqli_fetch_object($query)){
				$d_mem=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` where `user_id`='$res->sponsor'"));	
				$d_tre=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` where `user_id`='$res->user_id'"));	
				$d_pro=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` where `user_id`='$res->user_id'"));	
					if($res->stype==1){$d_clubcolor='primary'; $d_club_name='Happy';}
					if($res->stype==2){$d_clubcolor='success'; $d_club_name='Regular';}
					if($res->stype==3){$d_clubcolor='warning'; $d_club_name='Lucky';}
					if($res->stype==4){$d_clubcolor='info'; $d_club_name='freedom';}
			?>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
									
                                        <div class="wid-uprofile bg-<?php echo $d_clubcolor;?>">

                                            <div class="uprofile-image">
                                                <img src="images/avatar/<?php echo $d_pro->photo; ?>" class="img-responsive">
                                            </div>
                                            <div class="uprofile-name">
                                                <h3>
                                                    <a href="#"><?php echo $d_tre->user;?></a>
                                                    <!-- Available statuses: online, idle, busy, away and offline -->
                                                    <span class="uprofile-status online"></span>
                                                </h3>
                                                <p class="uprofile-title"><?php echo $d_pro->fname." ".$d_pro->lname; ?></p>
                                            </div>
                                            <div class="uprofile-info text-center">
                                                <ul class="list-unstyled">
                                                    <li rel="tooltip" data-color-class="danger" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Sponsor ID" data-placement="top">
													<i class="fa fa-users"></i> <?php echo $d_mem->log_id; ?></li>
                                                    <li><i class="fa fa-inbox"></i> <?php echo $d_pro->email; ?></li>
                                                    <li><i class="fa fa-phone"></i> <?php echo $d_pro->mobile; ?></li>
                                                </ul>
                                            </div>
                                            <div class=" uprofile-social">

                                                
												<?php
									echo"<a class='btn btn-$d_clubcolor btn-sm btn-block'>";
											echo $d_club_name."-".$res->position;
											echo"</a>";
									   ?>
						
                                       

                                            </div> 






                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>
						<?php  } ?>

                                        <!-- ********************************************** -->
                        </section></div>






                </section>
            </section>
            <!-- END CONTENT -->
			 <?php require_once("chatapi.php")?>
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
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 


        <!-- General section box modal start -->
       
        <!-- modal end -->
    </body>
</html>