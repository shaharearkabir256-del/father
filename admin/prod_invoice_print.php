<?php require('session.php');
$ins=$_GET['invoice'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Invoice-<?php echo $ins;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-<?php echo $admin_panel_color?>">
        <!-- START TOPBAR -->
        <?php //require_once("topbar.php")?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <!--<div class="page-container row-fluid">-->

            <!-- SIDEBAR - START -->
            <?php //require_once("sidebar.php")?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->

                  
                    <div class="col-lg-12">
                        <section class="box ">
  
                            <div class="content-body table-responsive">   
      <!-- ********************************************** -->

                                
											<table class="table table-bordered table-striped">
														
													
													
													<tr>
													<td colspan="2">
													<table width="100%"><tr>
													<td align="center"><img width="100" style="display:none;" src="assets/images/logo-folded.png"></td>
													<td>
													
													<h1 align="center"><?php echo $title?> Limited</h1>
													<p align="center">E-mail:<?php echo $email?> </p>
													<p align="center">Store Cell:<?php 
													$ad_info=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='1536835893' "));
												
													echo $ad_info->mobile;
													?></p> 
													<p align="center">Website: <?php echo $url?></p>

													</td></tr>
												
													</table>										
													</td> 
													</tr>


													
													<tr>
													<td colspan=""  align="">
													<?php
													/*turkey`(`inv`, `refofficer`, `packqty`, `pname`, `turkeyage`, `cname`, `vill`, `uni`, `ps`, `district`,
													`mobile`, `nid`, `packamn`, `unitp`, `dis`, `total`, `cmnt`
													*/
													//$id=$_SESSION['Accounts'];
													$inv=$_GET['invoice'];
													$userid=$_GET['userid'];
													if($inv){
													$type=mysqli_fetch_object($mysqli->query("select * from `invoice` where `invoice`='$inv' and type=1 "));
													$invoice=mysqli_fetch_object($mysqli->query("select * from `invoice` where `invoice`='$inv' "));
													$pro=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$userid."'"));
													$mem=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$userid."'"));
													$sel=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$id."'"));

													}else{}
													?>
													<p>Invoice #<?php echo $inv; ?></p>
													</td>
													<td align="right">Date : <?php echo $invoice->sdate;?></td>
													</tr>
													<tr height="">
													<td width="50%">
													<h4>To: </h4>
													<h5>User Name: <?php echo $pro->fname.' '.$pro->lname;?></h5>
													<h5>User Id: <?php echo $mem->log_id;?></h5>
													<p>Cell: <?php echo $pro->mobile; ?></p>
													<p>Address: <?php echo $pro->address; ?></p> 
													
													</td>
													
													<td width="50%"> 
													<h4>From: </h4>
													<h5>Product Manager Name: <?php if($sel->fname!=''){echo $sel->fname;}else{echo '';}?></h5>
													<h5>User Id: <?php echo $adm->user;?></h5>
													<p>Cell: <?php if($sel->mobile!=''){echo $sel->mobile;}else{echo '';} ?></p>
													<p>Address: <?php echo $sel->address; ?></p> 
												
													
													</td>
													</tr>
													<tr>
													<td colspan="2">
													<div class="table-responsive">
														  <table class="table table-bordered">
															<tr>
															<thead>
																  <th class="">Serial Number</th>
																  <th class="">Product Name</th>
																  <th class="">Point</th> 
																  <th class="">Price</th> 
																  <th class="">Quantity</th> 
																  <th class="">Total Point</th>
																  <th class="">Total Price</th> 
																    
																 </thead>
																</tr>
																<?php 
																  /*turkey`(`inv`, `refofficer`, `packqty`, `pname`, `turkeyage`, `cname`, `vill`, `uni`, `ps`, `district`,
																  `mobile`, `nid`, `packamn`, `unitp`, `dis`, `total`, `cmnt`*/
																  $n=1;
																  $recent_point=mysqli_fetch_object($mysqli->query("select sum(tpoint)as `ptp` from `invoice` where `user_id`='$userid' and `paid`='1' and `type`='0' "));
																  $p_point=mysqli_fetch_object($mysqli->query("select `previous_point` from `invoice` where `invoice`='$inv' and `type`='1' "));
																  $p=mysqli_fetch_object($mysqli->query("select sum(tpoint)as `trp`, sum(tprice)as `tp` from `invoice` where `invoice`='$inv' and `type`='0' "));
																  $exeprod=$mysqli->query("select * from `invoice` where `invoice`='$inv' and `type`='0' ");
																  while($prod=mysqli_fetch_object($exeprod)){
																   ?>
																<tr>  
																  <td class="" width="10%"><?php echo $n++; ?></td>
																  <td class="" width="30%"><?php echo $prod->name; ?></td>
																  <td class="" width="10%"><?php echo $prod->point; ?></td>
																  <td class="" width="10%"><?php echo $prod->price; ?> </td>
																  <td class="" width="10%"><?php echo $prod->qty; ?> </td>
																  <td class="" width="10%"><?php echo $prod->tpoint;?> </td>
																  <td class="" width="10%"><?php echo $prod->tprice;?> </td>
																  
																 
																</tr>
																  <?php } ?>
																<tr><td colspan="7" align="center" >&nbsp;</td></tr>
																<tr><td colspan="5" align="center" ></td><td>Previouse Point: </td><td><?php echo $p_point->previous_point; ?> </td></tr>
																<tr><td colspan="5" align="center" ></td><td>New point: </td><td><?php echo $p->trp; ?> </td></tr>
																<?php if($type->paid==1){ ?> 
																<tr><td colspan="5" align="center" ></td><td>Total point: </td><td><?php echo $recent_point->ptp; ?> </td></tr>
																<?php } ?>
																<?php if($type->delivery==1){ ?> 
																<?php if($p->trp<1000){ ?>  
																<?php if($type->delivery_charge_percent>0){ ?>
																<tr><td colspan="5" align="center" ></td><td>Home Delivery Discount: </td><td><?php echo "-".$type->delivery_charge_percent."%"; ?> </td></tr>		
																<?php } ?>
																<tr><td colspan="5" align="center" ></td><td>Home Delivery: </td><td>
																<?php echo $type->delivery_charge;?> 
																</td></tr>
																<?php }else{  ?> 
																<tr><td colspan="5" align="center" ></td><td colspan="2">--Free Delivery--</td></tr>
																<?php } } ?>
																<tr><td colspan="5" align="center" ></td><td>Total Price: </td><td><?php if($type->tprice>0){ echo $stp=$type->tprice;}else{ echo $stp=$p->tp;} ?></td></tr>
																<tr>
																  																 
																  <td class="" style="font-style:upercach;" colspan="8" ><b>IN WORD</b>:

																<?php 
																$nf = new NumberFormatter("en", NumberFormatter::SPELLOUT);
																echo $nf->format($p->tp)." taka only";
																
																//echo strtoupper(numberTowords($p->tp))." TAKA ONLY"; ?>
																  </td>
																 
																</tr>
																
																 </table>
													</div>
																<div class="table-responsive">
														  <table class="table table-bordered">
																<tr>
																<td  valign="bottom" width="" border="0" align="center" colspan="2" height="100"> 
																															
																<br/>															
																<br/>															
																<h4 style="text-decoration: overline;"><b>Receiver`s Signature</b></h4>
																</td>
																
																<td border="0" valign="bottom" width="" colspan="2" align="center" height="100">
																														
																<br/>															
																<br/>															
																<h4 style="text-decoration: overline;"><b>Store Incharge Signature</b></h4>
																</td>
																
																<td border="0" valign="bottom" width="" colspan="2" align="center" height="100">
																														
																<br/>															
																<br/>															
																<h4 style="text-decoration: overline;"><b>Authorized Signature</b></h4>
																</td>
																</tr>
														  </table>
													</div>
													</td>
													</tr>
													
													<tr style="display:none;"><td align="center" colspan="5"><hr style="border-style: inset">
																<p>Address: </p>
																<p>Contact No:</p>
																<p>Email: contact@.com, Website: .com</p>
																<br>
																<?php echo $day." ".$time; ?>
																</td></tr>
													<tr><td border="0" colspan="" height=""><a href = "javascript:history.back()"style="text-decoration:none;"><button class="btn btn-primary" type="submit"  value="Back">< Back</button> </a></td>
													<td align="right"><a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Print</a></td>
													</tr>
											
				
											</table>
			
                       
                                        <!-- ********************************************** -->

                               
                            </div>
                        </section></div>

            <!-- END CONTENT -->
             <?php require_once('chatapi.php');?> 
			
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
