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
										

                                        <table id="example" class=" display table table-hover table-condensed" cellspacing="0" width="100%">
                                      
                                            <thead>
                                                <tr>
                                                  
													<th>Date</th>
													<th>#</th>
													<th>Team A</th>
													<th>Team B</th>
													<th>Team A Advance</th>
													<th>Team B Advance</th>
													<th>Flash</th>
													<th>Match</th>
													<th>Amount</th>
													
                                                </tr>
                                            </thead> <tbody> 
			  <?php 
//SELECT `user`, `left_point`, `right_point`, `left_cary`, `right_cary`, `match`, `flash`, `amount`, `tax`, `date` FROM `matching` WHERE 1
			  $n=1; $total1=0;
		$q1=$mysqli->query("SELECT * FROM `matching` where `user_id`='".$id."' order by serial desc "); 
		$daily_chk=mysqli_num_rows($q1);
		if($daily_chk>0){
		while($daily=mysqli_fetch_object($q1)){
		//$member3=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `member` where `user_id`='".$trx->user_id."' "));
		?>								                                           
                                              
        <tr <?php if($daily->date==$date){ ?> class="info" <?php } ?> > 
        <td class=""><?php echo $daily->date;?></td>
        <td class=""><?php echo $n++;?></td>
        <td class=""><?php echo $daily->left_point;?></td>
        <td class=""><?php echo $daily->right_point;?></td>
        <td class=""><?php echo $daily->left_cary;?></td>
        <td class=""><?php echo $daily->right_cary;?></td>
        <td class=""><?php echo $daily->flash;?></td>
        <td class=""><?php echo $daily->match;?></td>
        <td class=""><?php echo $daily->amount;?></td>


        </tr>
<?php 
$total1=$total1+$daily->amount;
}
 }else{ ?>
 <tr><td colspan="9">
 Data Not Found
 </td></tr>
  <?php } ?>
	</tbody>
	<tfoot>
                                                <tr>
                                                   
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th>Total</th>
													<th><?php echo $total1.$t;?></th>

													
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
    </body>
</html>