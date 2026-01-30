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
                                <h2 class="title pull-left">
								<?php 
		if(isset($_SESSION['msg']) || isset($_SESSION['msgs'])){
		if(isset($_SESSION['msg'])){echo "<font color='red'>".$_SESSION['msg']."</font>";} 
		if(isset($_SESSION['msgs'])){echo "<font color='green'>".$_SESSION['msgs']."</font>";}
		}else{echo "All ".$page;}
		?>
								</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->
									<div class="col-md-3">

                                        <form role="form"  action="bal_req_act.php" method="POST">
								                <div class="form-group">
                                                <label class="form-label" for="password-1">Agent ID:</label>
                                                <input type="text" class="form-control"  name="dealerusername" placeholder="Enter Amount">
                                            </div>
											 <div class="form-group">
                                                <label class="form-label" for="password-1">Amount:</label>
                                                <input type="number" class="form-control"  name="amount" placeholder="Enter Amount">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Pin:</label>
                                                <input type="password" class="form-control" name="pin" placeholder="Enter your pin">
                                            </div>

                                           

                                            <div class="form-group">
                                               
											
                                                <button type="submit" class="btn btn-primary  pull-right">Submit</button>
                                            </div>

                                        </form>

                                    </div>	
										
									<div class="table-responsive col-md-9">
                                        <table class="table table-hover" id="example1">
                                            <thead>
											<?php echo $label="
                                                <tr>
                                                     <th>Type</th>
                                                     <th>#</th>
													  <th>Trans ID</th>
													<th>Request Date</th>
													<th>Request Amount</th>
													<th>Request To</th>
													<th>Status</th>
													
                                                </tr>
												";?>
                                            </thead><tbody>
											<?php $total=0;
				$n=1;
				$query=$mysqli->query("SELECT * FROM `withdraw` where `send_id`='".$id."' and `type`='0' and `account`='3' order by `serial` desc");
				while($mem=mysqli_fetch_object($query)){
				
			?>
                                            
                                              
                                           <tr>
    
        <th class="center"  scope="row">Req</th>
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class=""><?php echo $mem->trx_id; ?></td>
        <td class="center"><?php echo $mem->day; ?></br>
		<?php echo $mem->time; ?></br>
		<?php echo $mem->date; ?></td>
        <td class="center"><?php echo $mem->amount.$bdt; ?></td>
		<td class="center"><?php
		$dealer=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$mem->rec_id."'"));// and `type`='5' 
		echo $dealer->log_id;
		?></td>
       
        <td class="center"><?php if($mem->status==1){ ?><span class="label label-success">Success<span><?php }else{ ?><span class="label label-warning">Pending<span><?php } ?></td>
       
     
<?php $total=$total+$mem->amount; ?>

    </tr>
                                            
											<?php } ?></tbody>
											  <tfoot>
											  <?php echo $label?>
                                                <tr>
                                                     <th></th>
                                                     <th></th>
                                                     <th></th>
													<th>Total</th>
													
												
													<th><?php echo $total.$bdt; ?></th>
													
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    
									 
							


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

<?php 
unset($_SESSION['msg']);
unset($_SESSION['msgs']);
?>

