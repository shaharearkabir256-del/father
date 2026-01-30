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
						 $color=array("primary","orange","warning","purple");
						$query=$mysqli->query("SELECT * FROM `plan` where `chk`='1' ");
						foreach ($color as $coloract){
						$plan=mysqli_fetch_object($query);
					?>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="r4_counter db_box">
								<i class="pull-left icon-md icon-rounded icon-<?php echo $coloract;?>"><?php echo substr($plan->name,0,1); ?></i>
								<div class="stats">
									<h4><?php if($tre->plan>=$plan->serial){echo"<strong>";}?><?php echo $plan->name; ?><?php if($tre->plan>=$plan->serial){echo"</strong>";}?></h4>
									<span><?php if($tre->plan>=$plan->serial){echo"<strong>";}?><?php echo $plan->plan.$t; ?><?php if($tre->plan>=$plan->serial){echo"</strong>";}?></span><br>
									<span><?php if($tre->plan>=$plan->serial){?><strong>Actived</strong><?php }else{ ?>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pincode-req<?php echo $plan->serial ?>">Active</button><?php } ?></span>
								</div>
							</div>
						</div>
				<?php }  ?>	
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
		<?php
		$query=$mysqli->query("SELECT * FROM `plan` where `chk`='1' ");
		$planchk=mysqli_num_rows($query);
		for ($xd = 1; $xd <= $planchk; $xd++) {
		$plan=mysqli_fetch_object($query);
		?>
        <div class="modal" id="pincode-req<?php echo $plan->serial ?>" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pin Code</h4>
                    </div>
                    <div class="modal-body">
					<form action="plan_act.php" method="post" class="">
					<div class="col-sm-12">  
                      <div class="form-group">
                        <input type="number" name="planId" value="<?php echo $plan->serial; ?>" class="hidden" /> 
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
		<?php }	?>
        <!-- modal end -->
    </body>
</html>