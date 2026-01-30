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
		}else{echo $page;}
								?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                             <div class="col-md-12">


                                        <!-- ********************************************** -->

                                <div class="col-md-3">
							<h5>Balance: <?php echo "<b>".$bal->balance_purchase_point."</b>".$t;?></h5>
                                        <form role="form"  action="bal_trx_pp_act.php" method="POST">
											<!--
											<div class="form-group">
                                                <label class="form-label" for="email-1">To:</label>
 												<select name="acc" class="form-control">
												<option value="member"> Member</option>
												
												<option value="dealer"> Dealer/Merchant</option>
												<option value="admin"> Admin</option>
												
												
												</select>
                                            </div>
											-->
											<!--
                                            <div class="form-group">
                                                <label class="form-label" for="email-1"> User Id:</label>
                                                <input type="text" class="form-control"  name="userid" placeholder="Enter UserId…">
                                            </div>
											-->
                                            <div class="form-group">
                                                <label class="form-label" for="password-1">Amount:</label>
                                                <input type="number" class="form-control"  name="amount" value="<?php echo $setting->mem_trx_shop_lim; ?>" placeholder="Enter Amount">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Pin:</label>
                                                <input type="password" class="form-control" name="pin" placeholder="Enter your pin">
                                            </div>

                                           

                                            <div class="form-group">
											 <input type="text" name="acc" value="member" hidden>
											 <input type="text" name="userid" value="<?php echo $mem->log_id?>" hidden>
                                                <button type="submit" class="btn btn-purple  pull-right">Transfer</button>
                                            </div>

                                        </form>

                                    </div>
								<div class="table-responsive col-md-9">
		<table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
											<?php echo $label="
                                                <tr>
                                                     <th>Type</th>
                                                     <th>#</th>
													 <th>Trans ID</th>
													<th>Date</th>
													<th>Receive ID</th>
									
													<th>Amount</th>
													<th>Service Charge</th>
													<th>Status</th>
													
                                                </tr>
												";?>
                                            </thead>
											<tbody>
											<?php $total=0;
				$n=1;
				$query=$mysqli->query("SELECT * FROM `trx` where `send_id`='".$id."' and `type`='5' and `method`!='5' and `account`='3' order by `serial` desc");
				while($mem=mysqli_fetch_object($query)){
				
			?>
                                            
                                              
                                           <tr>
    
        <th>Trx</th>
        <td><?php echo $n++; ?></td>
		<td class=""><?php echo $mem->trx_id; ?></td>
        <td class=""><?php echo $mem->day; ?></br>
		<?php echo $mem->time; ?></br>
		<?php echo $mem->date; ?></td>

        <td class="">
		<?php
		if($mem->rec_id==0){
		/* $q1=$mysqli->query("SELECT `log_id` FROM `member` WHERE `user_id`='".$mem->send_id."'");
		$acts=mysqli_fetch_object($q1);
		echo $acts->log_id; */
		echo "Upgarde Wallet";
		}
		?>
		<?php
			$q1=$mysqli->query("SELECT `log_id` FROM `member` WHERE `user_id`='".$mem->rec_id."'");
		$acts=mysqli_fetch_object($q1);
		echo $acts->log_id; ?>
		<?php
			$q2=$mysqli->query("SELECT `user` FROM `admin` WHERE `user_id`='".$mem->rec_id."'");
		$actsadmin=mysqli_fetch_object($q2);
		echo $actsadmin->user; ?>
		<?php
		$q3=$mysqli->query("SELECT `log_id` FROM `dealer` WHERE `user_id`='".$mem->rec_id."'");
		$acts_dealer=mysqli_fetch_object($q3);
		echo $acts_dealer->log_id; ?>
		</td>

        <td class=""><?php echo $mem->amount.$bdt; ?></td>
        <td class=""><?php echo $mem->tax.$bdt; ?></td>
    
       
        <td class=""><span class="label label-success">Succes<span></td>
    </tr>
	<?php 
	$total=$total+$mem->amount;
	$totalcharge=$totalcharge+$mem->tax;
	?>
                                           
											<?php } ?>
											 </tbody>
											 <tfoot>
											 <?php echo $label?>
                                                <tr>
                                                     <th></th>
                                                     <th></th>
                                                 
                                                     <th></th>
													<th></th>
													<th>Total</th>
									
													<th><?php echo $total.$bdt; ?></th>
													<th><?php echo $totalcharge.$bdt; ?></th>
													<th></th>
													
                                                </tr>
												 <tr>
                                                     <th></th>
                                                 
                                                     <th></th>
													<th></th>
													
													<th>Sub Total</th>
									<th></th>
													<th></th>
													<th><?php echo $sb=$total+$totalcharge.$bdt; ?></th>
													<th></th>
													
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                   
									
									 
									
                             

                          
  

                                        <!-- ********************************************** -->




                                    </div>
                                </div>
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


