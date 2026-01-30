<?php 
require('session.php');
$ins=$_GET['invoice'];
$page="Invoice-".$ins;
?>
<!DOCTYPE html>
<html class=" ">
<?php require_once("head.php")?>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
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
  
                            <div class="content-body">   
      <!-- ********************************************** -->

                                
											<table class="table table-bordered table-striped">
														
													
													
													<tr>
													<td colspan="2">
													<table width="100%"><tr>
													<td align="center"><img width="100" style="display:none;" src="assets/images/logo-folded.png"></td>
													<td>
													<?php
													/*turkey`(`inv`, `refofficer`, `packqty`, `pname`, `turkeyage`, `cname`, `vill`, `uni`, `ps`, `district`,
													`mobile`, `nid`, `packamn`, `unitp`, `dis`, `total`, `cmnt`
													*/
													
													$inv=$_GET['invoice'];
													if($inv){
													$type=mysqli_fetch_object($mysqli->query("select * from `invoice` where `invoice`='$inv' and type=1 "));
													$invoice=mysqli_fetch_object($mysqli->query("select * from `invoice` where `invoice`='$inv' "));
													$pro=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$id."'"));
													$qinfo1=$mysqli->query("SELECT * FROM `dealer_info` where user_id='$invoice->agent_id'");
													$qinfo2=$mysqli->query("SELECT * FROM `profile` where user_id='$invoice->agent_id'");
													$chkinfo1=mysqli_num_rows($qinfo1);
													$chkinfo2=mysqli_num_rows($qinfo2);
													if($chkinfo1>0){
													$info=mysqli_fetch_object($qinfo1);
													}
													if($chkinfo2>0){
													$info=mysqli_fetch_object($qinfo2);
													}
													}else{}
													?>
													<h1 align="center"><?php echo $title?> Limited</h1>
													<p align="center">E-mail:<?php echo $email?> </p>
													<?php if($chkinfo1>0){
														$dealer=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where user_id='$invoice->agent_id'"));
														if($dealer->type==5){
														?>
														
														<p align="center">Agent Cell: <?php echo $info->mobile;?></p>
														<?php }elseif($dealer->type==6){ ?>
														<p align="center">Mercent Cell: <?php echo $info->mobile;?></p> 
														<?php }else{} ?>
													<?php }else{ ?>
														<p align="center">Store Cell:<?php echo $cog->mobile;?></p> 
														<?php } ?>
													<p align="center">Website: <?php echo $url;?></p>

													</td></tr>
												
													</table>										
													</td> 
													</tr>


													
													<tr>
													<td colspan=""  align="">
													 
													<p>Invoice #<?php echo $inv; ?>, Payment Status: 
													<?php if($invoice->paid==1){ ?> 
													<font color="green">Paid</font>
													<?php }else{
													$mobile_banking=mysqli_fetch_object($mysqli->query("select `name` from `mobile_banking` where `serial`='$info->mbank'"));
														?>
													<font color="red">Unpaid</font> Pay <?php echo $mobile_banking->name;?>: <?php echo $info->pmaccount;?>
													<?php }	?>
													</p>
													</td>
													<td align="right">Date : <?php echo $invoice->sdate;?></td>
													</tr>
													<tr height="">
													<td width="50%">
													<h4>To: </h4>
													<h5><?php echo $pro->fname.' '.$pro->lname;?></h5>
													<p>Cell:<?php echo $pro->mobile; ?>
													<p>Address:<?php echo $pro->address; ?></p>
													</td>
													
													<td width="50%"> 
													<h4>From: </h4>
													<h5><?php if($info->fname!=''){echo $info->fname;}else{echo '';}?></h5>
													<p>Cell:<?php if($info->mobile!=''){echo $info->mobile;}else{echo '';} ?></p>
													<p>Address:<?php echo $info->address; ?></p>
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
																  <th class="">Order To</th>
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
																  $p=mysqli_fetch_object($mysqli->query("select sum(tpoint)as `trp`, sum(tprice)as `tp` from `invoice` where `invoice`='$inv' and `type`='0' "));
																  $exeprod=$mysqli->query("select * from `invoice` where `invoice`='$inv' and `type`='0' ");
																  while($prod=mysqli_fetch_object($exeprod)){
																$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where user_id='$prod->agent_id'"));
																$adm=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` where user_id='$prod->agent_id'"));
																   ?>
																<tr>  
																  <td class="" width="10%"><?php echo $n++; ?></td>
																  <td class="" width="30%"><?php echo $prod->name; ?></td>
																  <td class="" width="30%"><?php echo $del->log_id; ?><?php echo $adm->user; ?></td>
																  <td class="" width="10%"><?php echo $prod->point; ?></td>
																  <td class="" width="10%"><?php echo $prod->price; ?> </td>
																  <td class="" width="10%"><?php echo $prod->qty; ?> </td>
																  <td class="" width="10%"><?php echo $prod->tpoint;?> </td>
																  <td class="" width="10%"><?php echo $prod->tprice;?> </td>
																  
																 
																</tr>
																  <?php } ?>
																<tr><td colspan="8" align="center" >&nbsp;</td></tr>
																<tr><td colspan="6" align="center" ></td><td>Total point: </td><td><?php echo $p->trp; ?> </td></tr>		
																<?php if($type->delivery==1){ ?> 
																<?php if($p->trp<1000){ ?>  
																<?php if($type->delivery_charge_percent>0){ ?>
																<tr><td colspan="6" align="center" ></td><td>Home Delivery Discount: </td><td><?php echo "-".$type->delivery_charge_percent."%"; ?> </td></tr>		
																<?php } ?>
																<tr><td colspan="6" align="center" ></td><td>Home Delivery: </td><td>
																<?php echo $type->delivery_charge;?> 
																</td></tr>
																<?php }else{  ?> 
																<tr><td colspan="6" align="center" ></td><td colspan="2">--Free Delivery--</td></tr>
																<?php } }  ?>
																<tr><td colspan="6" align="center" ></td><td>Total Price: </td><td><?php if($type->tprice>0){ echo $stp=$type->tprice;}else{ echo $stp=$p->tp;} ?> </td></tr>
																<tr>
																  																 
																  <td class="" style="font-style:upercach;" colspan="8" ><b>IN WORD</b>:
																<?php 
																$nf = new NumberFormatter("en", NumberFormatter::SPELLOUT);
																echo $nf->format($stp)." taka only";
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
													<tr><td border="0" colspan="" height=""><!--<a href = "javascript:history.back()"style="text-decoration:none;"><button class="btn btn-primary" type="submit"  value="Back">< Back</button> </a>--></td>
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

<?php 
unset($_SESSION['msg']);
unset($_SESSION['msgs']);
?>

