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
					<div class="row">
					<?php
						 $n=1;
						
					?>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="r4_counter db_box">
								<i class="pull-left icon-md icon-rounded icon-info">E</i>
								<div class="stats">
									<h4>Expire Date</h4>
								<span>
								<?php if($tre->expdate>0){
                                echo "<font color='yellow'></font>";
                                $d=strtotime("+$tre->expdate days");
                                echo date("d-M-Y", $d);
                                }else{
                                echo "<font color='red'>Expired </font>&nbsp;";    
                                }?>
								</span>
									<span><?php if($planupchk>0){ $planpoint=$pla->plan;}else{ $planpoint=$mem->point;}
									$planpointcheck=($planpoint*25/100); if($bal->net_bal>=$planpointcheck){?>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pincode-req">Upgrade</button><?php }else{echo "<font color='red'>Recharge Balance</font>";} ?>
									</span>
								</div>
							</div>
						</div>
						</div>
				<div>
							
						<?php if(isset($_SESSION['msgs'])){ ?>
						<div class="alert alert-success alert-dismissible fade in">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<strong>Congratulation!:</strong> <?php echo $_SESSION['msgs']; ?>
						</div>
						<?php } ?>
						
						<?php if(isset($_SESSION['msg'])){ ?>
						<div class="alert alert-danger alert-dismissible fade in">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<strong>Failed:</strong> <?php echo $_SESSION['msg']; ?>
						</div>
						<?php } ?>

	                    </div>
	                  
						
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
		
        <div class="modal" id="pincode-req" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pin Code</h4>
                    </div>
                    <div class="modal-body">
					<form action="expdate_act.php" method="post" class="">
					<div class="col-sm-12">  
                      <div class="form-group">
                        <input type="number" name="planpointcheck" value="<?php echo $planpointcheck; ?>" class="hidden" /> 
                        <input type="text" name="pinCode" required placeholder="Enter Your Pin Code" class="col-sm-12" /> 
						</div>
					</div>
					
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="submit" class="btn btn-success" type="button">Ok</button>
						</form>
                    </div>
                </div>
            </div>
        </div>
		
        <!-- modal end -->
    </body>
</html>