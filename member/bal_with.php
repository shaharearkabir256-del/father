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
                                <h1 class="title">
								<?php 
								if(isset($_SESSION['msg']) || isset($_SESSION['msgs'])){
		if(isset($_SESSION['msg'])){echo "<font color='red'>".$_SESSION['msg']."</font>";} 
		if(isset($_SESSION['msgs'])){echo "<font color='green'>".$_SESSION['msgs']."</font>";}
		}else{echo $page;}
								?></h1>                            </div>

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
<a href="bal_with.php?page=Withdraw%20Balance&&Payment_Mathod=cash" ><span class="label label-info">Cash</span></a>
<a href="bal_with.php?page=Withdraw%20Balance&&Payment_Mathod=mobile_banking" ><span class="label label-success">Mobile Banking</span></a>
<!--<a href="bal_with.php?page=Withdraw%20Balance&&Payment_Mathod=rocket" ><span class="label label-warning">Rockect</span></a>-->
<a href="bal_with.php?page=Withdraw%20Balance&&Payment_Mathod=bank" ><span class="label label-danger">Bank</span></a>
<a href="bal_with.php?page=Withdraw%20Balance&&Payment_Mathod=recharge" ><!--span class="label label-info">Recharge</span--></a>
								</h2>
                               <!-- <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>-->
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->
<div class="row">
								
                                    <div class="col-md-3 col-sm-12 col-xs-12">

                                        <form role="form"  action="bal_with_act.php" method="POST"  name="member">
										
                                           <div class="form-group"><br>
                                                <label class="form-label" for="email-1">Payment Method:</label><br>
												<?php $method=$_GET['Payment_Mathod'];
												if($method=='cash'){ ?>
												<input name="pm" value="1" type="radio" id="left1" checked >Cash
												<?php } if($method=='bank'){ ?>
												<input name="pm" value="4" type="radio" id="left4" checked>Bank
												<?php } if($method=='recharge'){ ?>
												<input name="pm" value="5" type="radio" id="left5" checked>Recharge
												<?php } ?>
                                            </div>
										<div id="2"  style="display:<?php if($method=='mobile_banking'){echo 'block'; }else{ echo 'none';} ?>">	
											<div class="form-group">
                                                <label class="form-label" for="password-1">Mobile Banking</label>
                                                <select name="pm" class="form-control">
											
											<?php if($method=='cash'){ ?>
												<option value="1"> Cash</option>
												<?php }elseif($method=='bank'){ ?>
												<option value="4"> Bank</option>
												<?php }elseif($method=='recharge'){ ?>
												<option value="5"> Recharge</option>
												<?php }else{ ?>
												<?php
											$mb=$mysqli->query("SELECT * FROM `mobile_banking` where `chk`='1' ");
											while($mb1=mysqli_fetch_object($mb)){
											?>
												<option value="<?php echo $mb1->serial;?>"> <?php echo $mb1->name;?></option>
											<?php } ?>
											<?php } ?>
										
												</select>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Account No.</label>
                                                <input type="text" name="location" value="<?php echo $_SERVER['PHP_SELF'];?>" hidden>
                                                <input type="text" name="method" value="<?php echo $method;?>" hidden>
                                                <input type="text" class="form-control"  name="account_no" placeholder=" ">
                                            </div>
										</div>
										
										<div id="4"  style="display:<?php if($method=='bank'){echo 'block'; }else{ echo 'none';} ?>">	
											<div class="form-group">
                                                <label class="form-label" for="password-1">Bank Name</label>
                                                <input type="text" class="form-control"  name="bank" placeholder="">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Branch</label>
                                                <input type="text" class="form-control"  name="branch" placeholder=" ">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Bank Account No</label>
                                                <input type="text" class="form-control"  name="account" placeholder=" ">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Contact Number</label>
                                                <input type="text" class="form-control"  name="contact" placeholder=" ">
                                            </div>
										</div>
										<div id="5"  style="display:<?php if($method=='recharge'){echo 'block'; }else{ echo 'none';} ?>">	
											<div class="form-group">
                                                <label class="form-label" for="password-1">Wallet</label>
                                                <select name="wallet" class="form-control">
											
												<option value="cash"> Cash</option>
											
												<option value="shop"> Shopping</option>
										
												</select>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Recharge Number</label>
                                                <input type="text" class="form-control"  name="mobile" placeholder=" ">
                                            </div>
											<div style="display:<?php if($method=='recharge'){echo 'block'; }else{ echo 'none';} ?>" class="form-group">
                                                <label class="form-label" for="password-1">Select Type</label>
                                                <select name="contact_Type" class="form-control">
												<option value="0"> Prepaid</option>
												<option value="1"> Postpaid</option>
												<option value="2"> Skitto</option>
										
												</select>
                                            </div>
										</div>										
										 <div style="display:<?php if($method=='recharge'){echo 'block'; }else{ echo 'block';} ?>" class="form-group">
                                                <label class="form-label" for="password-1">Via</label>
                                                <select name="acc" class="form-control">
											
												<option value="admin"> Accounts</option>
											
												<option value="dealer"> Agent</option>
										
												</select>
                                            </div>
											<div style="display:<?php if($method=='recharge'){echo 'block'; }else{ echo 'block';} ?>" class="form-group">
                                                <label class="form-label" for="password-1">User Name</label>
                                                <input type="text" class="form-control"  name="userid" placeholder="Enter Acc/Agent User Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password-1">Amount</label>
                                                <input type="number" class="form-control"  name="amount" placeholder="Minimum <?php if($method=='cash'){echo "20"; }elseif($method=='mobile_banking'){echo "50"; }elseif($method=='bank'){echo "100";}else{echo "20";}  ?> Point">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Pin</label>
                                                <input type="password" class="form-control" name="pin" placeholder="Enter your pin">
                                            </div>
                                            <div class="form-group">
											<a href="bal_withdraw.php"><button type="reset" class="pull-right btn btn-primary">Reset</button></a>
                                                <button type="submit" class="btn btn-success  pull-left">Submit</button>
                                            </div>

                                        </form>

                                    </div>
									<div class="table-responsive col-md-9 col-sm-12 col-xs-12">

                                        <table class="table table-hover" id="example1">
                                            <thead>
                                                <tr>
                                                     <th>From</th>
                                                     <th>#</th>
                                                     <th>Trans ID</th>
													<th>Date</th>
													<th>User Name</th>
													<th>Payment Method</th>
							
													<th>Service Charge</th>
													<th>Getable</th>
													<th>Status</th>
													
													
                                                </tr>
                                            </thead>
										
                                            <tbody>
                                            	<?php 
												$query=$mysqli->query("SELECT * FROM `withdraw` where `type`='1' ");
				while($withdraw=mysqli_fetch_object($query)){
					$mysqli->query("update `withdraw` set `wallet`='shop' where `type`='3' and `wallet`='' ");
					$amount=$withdraw->amount;
					$agent_com=$amount*$setting->mem_wit_agent_com/100;
					$tax=$amount*$setting->mem_wit_tax/100;
				$mysqli->query("update `withdraw` set `tax`='$tax',`agent_com`='$agent_com' where `serial`='".$withdraw->serial."' and `type`='1' ");	
				}
												$total=0;
												$totalt=0;
				$n=1;
				$query=$mysqli->query("SELECT * FROM `withdraw` where `send_id`='".$id."' and (`type`='1' or `type`='3') and `account`='3' order by serial desc");
				while($mem=mysqli_fetch_object($query)){
				
											
			?>  
                                           <tr>
    
        <td class=""><?php echo $mem->wallet; ?> wallet</td>
        <th class="" scope="row"><?php echo $n++; ?></th>
        <td class=""><?php echo $mem->trx_id; ?></td>
        <td class=""><?php echo $mem->day; ?></br>
		<?php echo $mem->time; ?></br>
		<?php echo $mem->date; ?></td>
		<td class=""><?php 
		$admin=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` where `user_id`='".$mem->rec_id."'"));
		$dealer=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `user_id`='".$mem->rec_id."'"));
		echo $admin->user; 
		echo $dealer->log_id; 
		
		?></td>
        <td class="">
		<?php require('../inc/payment_method.php'); ?>
		</td>
    
        <td class=""><?php echo $mem->tax.$bdt; ?></td>
        <td class=""><?php echo $mem->amount.$bdt; ?></td>
    
       
        <td class=""><?php if($mem->status==1){ ?><span class="label label-success">Success<span><?php }else{ ?><span class="label label-warning">Pending<span><?php } ?></td>
      
     


    </tr>
	<?php 
	$total=$total+$mem->amount;
	$totalt=$totalt+$mem->tax;

	?>
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
													<th>Total</th>
							
													<th><?php echo $totalt.$bdt; ?></th>
													<th><?php echo $total.$bdt; ?></th>
													<th></th>
													
													
                                                </tr>
                                            </tfoot>
										
                                        </table>

                                    </div>
									
									 
									
                                </div>

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

	  <script>	/* 	  function check_cash()
	{
	if(document.member.left1.checked){
		document.getElementById("2").style.display="none";
		document.getElementById("3").style.display="none";
		document.getElementById("4").style.display="none";
		
		}
	if(document.member.left2.checked){
		document.getElementById("2").style.display="block";
		document.getElementById("3").style.display="none";
		document.getElementById("4").style.display="none";
		}
	if(document.member.left3.checked){
		document.getElementById("3").style.display="block";
		document.getElementById("2").style.display="none";
		document.getElementById("4").style.display="none";
		}
	if(document.member.left4.checked){
		document.getElementById("4").style.display="block";
		document.getElementById("2").style.display="none";
		document.getElementById("3").style.display="none";
		
		}
	
		
	} */
</script>
<?php
unset($_SESSION['msg']);
unset($_SESSION['msgs']);
?>
