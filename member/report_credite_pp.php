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
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->


                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                      
                                            <thead>
                                                <tr>
                                                  
													<th>Level</th>
													<th>#</th>
													<th>Date</th>
													<th>Rank</th>
													<th>Club</th>
													<th>Earning</th>
													<th>Status</th>
													
                                                </tr>
                                            </thead> <tbody> 
			  <?php $n=1; $total1=0; $total2=0; $total3=0; $total4=0;
		$q1=$mysqli->query("SELECT `amount`,`cdate`,`club`,`package` FROM `pp` where `user_id`='".$id."' order by serial desc "); 
		while($daily=mysqli_fetch_object($q1)){
		//$member3=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `member` where `user_id`='".$trx->user_id."' "));
		?>								                                           
                                              
        <tr <?php if($daily->package==2){ ?> class="success" <?php } ?><?php if($daily->package==3){ ?> class="warning" <?php } ?><?php if($daily->package==4){ ?> class="danger" <?php } ?><?php if($daily->package==5){ ?> class="success" <?php } ?><?php if($daily->package==6){ ?> class="warning" <?php } ?><?php if($daily->package==7){ ?> class="danger" <?php } ?><?php if($daily->package==8){ ?> class="success" <?php } ?><?php if($daily->package==9){ ?> class="warning" <?php } ?><?php if($daily->package==10){ ?> class="danger" <?php } ?> > 
        <td class=""><?php 
		if($daily->package==2){echo $star2;}
		elseif($daily->package==3){echo $star3;}
		elseif($daily->package==4){echo $star4;}
		elseif($daily->package==5){echo $star5;}
		elseif($daily->package==6){echo $star6;}
		elseif($daily->package==7){echo $star7;}
		elseif($daily->package==8){echo $star8;}
		elseif($daily->package==9){echo $star9;}
		elseif($daily->package==10){echo $star10;}
		else{echo $star1;}?></td>
        <td class=""><?php echo $n++;?></td>
        <td class=""><?php echo $daily->cdate;?></td>
        <td class=""><?php 
		if($daily->package==1){echo "One Level";} 
		 elseif($daily->package==2){echo "Two Level";}
		 elseif($daily->package==3){echo "Three Level";}
		 elseif($daily->package==4){echo "Four Level";}
		 elseif($daily->package==5){echo "Five Level";}
		 elseif($daily->package==6){echo "Six Level";}
		 elseif($daily->package==7){echo "Seven Level";}
		 elseif($daily->package==8){echo "Eight Level";}
		 elseif($daily->package==9){echo "Nine Level";}
		 elseif($daily->package==10){echo "Ten Level";}
			else{}
		?></td>
		<td class=""><?php echo $daily->club;?></td>
		        <td class=""><?php echo $daily->amount;?></td>
  

        <td class=""><span class="label label-success">Succes<span></td>
        </tr>
<?php 
$total1=$total1+$daily->amount;

 } ?>
	</tbody>
	<tfoot>
                                                <tr>
                                                   
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th>Total</th>
													<th><?php echo $total1.$bdt;?></th>
												
													<th></th>
													
                                                </tr>
                                            </tfoot>
											
                                        </table>
                                        <!-- ********************************************** -->




                                    </div>
                                </div>
                            </div>
                        </section></div>






                </section>
            </section>
            <!-- END CONTENT -->
<?php require_once('chatapi.php');?>            
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



