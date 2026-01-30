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
<?php echo $page;?>
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
<div class="row">
								
                                    <div class="col-md-3 col-sm-12 col-xs-12">
<h5>Balance: <?php echo "<b>".$mem->point."</b>".$t;?></h5>
                                        <form role="form"  action="bal_mobile_recharge_customer_act.php" method="POST"  name="member">
										<input name="pm" value="5" type="radio" id="left5" checked hidden>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Recharge Number</label>
                                               
                                                <input type="text" class="form-control"  name="contact" placeholder=" "/>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Select Type</label>
                                                <select name="contact_Type" class="form-control">
												<option value="1"> Prepaid</option>
												<option value="2"> Postpaid</option>
												<option value="3"> Skitto</option> 
										
												</select>
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
											<a href=""><button type="reset" class="pull-right btn btn-primary">Reset</button></a>
                                                <button type="submit" class="btn btn-success  pull-left">Submit</button>
                                            </div>

                                        </form>

                                    </div>
									<div class="table-responsive col-md-9 col-sm-12 col-xs-12">

                                       <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
											<?php echo $label="
                                                <tr>
                                                   
                                                     <th>Type</th>
                                                     <th>#</th>
													 <th>Trans ID</th>
													<th>Date</th>
												
									
													<th>Mobile</th>
													<th>Amount</th>
												
													<th>Status</th>
													
                                                </tr>
												";?>
                                            </thead>
											<tbody>
											<?php $total=0;
				$n=1;
				$query=$mysqli->query("SELECT * FROM `trx` where `send_id`='".$id."' and `type`='5' and `method`='5' order by `serial` desc");
				while($mem=mysqli_fetch_object($query)){
				
			?>
                                            
                                              
                                           <tr>
    
       
        <td>
		Mobile <br>Recharge
		</td>
        <td><?php echo $n++; ?></td>
		<td class=""><?php echo $mem->trx_id; ?></td>
        <td class=""><?php echo $mem->day; ?></br>
		<?php echo $mem->time; ?></br>
		<?php echo $mem->date; ?></td>

  
		
		
		<?php
			$q2=$mysqli->query("SELECT `user` FROM `admin` WHERE `user_id`='".$mem->rec_id."'");
		$actsadmin=mysqli_fetch_object($q2);
		 $actsadmin->user; ?>
		
	 <td class=""><?php echo $mem->mobile; ?>
		<br>
		<?php 
			if($mem->mobile_type==0){
				echo "Prepaid";
			}elseif($mem->mobile_type==1){
				echo "Postpaid";
			}elseif($mem->mobile_type==2){
				echo "Skitto";
			}else{ }
		?>
		</td>

        <td class=""><?php echo $mem->amount.$bdt; ?>
		
		</td>
  
    
       
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
											<!--<tr>
                                                     <th></th>
                                                 
                                                     <th></th>
													<th></th>
													
													<th>Sub Total</th>
									<th></th>
													<th></th>
													<th><?php echo $sb=$total+$totalcharge.$bdt; ?></th>
													<th></th>
													
                                                </tr>-->
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
