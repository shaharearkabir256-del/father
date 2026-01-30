<?php require_once('session.php'); 
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
  <body class="skin-blue">
    <!-- Site wrapper -->
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
													
													<h1 align="center"><?php echo $title?> Limited</h1>
													<p align="center">E-mail:<?php echo $email?> </p>
													
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
													$id=$_SESSION['DealerLogId'];
													$inv=$_GET['invoice'];
													$userid=$_GET['userid'];
													if($inv){
													$type=mysqli_fetch_object($mysqli->query("select * from `invoice` where `invoice`='$inv' and type=1 "));
													$invoice=mysqli_fetch_object($mysqli->query("select * from `invoice` where `invoice`='$inv' "));
													$pro=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$userid."'"));
													$mem=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$userid."'"));
													$sel=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_info` WHERE `user_id`='".$id."'"));
													$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$id."'"));

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
													<h5><?php
		if($del->type==6){echo "Merchant";}
		elseif($del->type==5){echo "Agent";}
		elseif($del->type==4){echo "Ward/Union";}
		elseif($del->type==3){echo "Upazila";}
		elseif($del->type==2){echo "District";}
		elseif($del->type==1){echo "Zone";}
		else{echo "Not Set";}
		 ?> Name: <?php if($sel->fname!=''){echo $sel->fname;}else{echo '';}?></h5>
													<h5>User Id: <?php echo $del->log_id;?></h5>
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
																/* SELECT `serial`, `paid`, `delivery`, `delivery_charge_percent`, `delivery_charge`, `invoice`, `prod_id`, `product_id`, `user_id`, 
																`sponsor`, `agent_id`, `agent_com`, `account`, `name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`, `type`, `chk` FROM `invoice` WHERE 1 */
																	$n=1;
																  $previouse_point=mysqli_fetch_object($mysqli->query("select sum(tpoint)as `ptp` from `invoice` where `user_id`='$userid' and `type`='0' "));
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
																<tr><td colspan="5" align="center" ></td><td>Previouse Point: </td><td><?php echo $ptp=$previouse_point->ptp-$p->trp; ?> </td></tr>
																<tr><td colspan="5" align="center" ></td><td>New point: </td><td><?php echo $p->trp; ?> </td></tr>
			
																<tr><td colspan="5" align="center" ></td><td>Total point: </td><td><?php echo $previouse_point->ptp; ?> </td></tr>
																<?php if($type->delivery==1){ ?> 
																<?php if($p->trp<1000){ ?>  
																<tr><td colspan="5" align="center" ></td><td>Home Delivery Discount: </td><td><?php echo "-".$type->delivery_charge_percent."%"; ?> </td></tr>		
																<tr><td colspan="5" align="center" ></td><td>Home Delivery: </td><td>
																<?php echo $type->delivery_charge;?> 
																</td></tr>
																<?php } } ?>
																<tr><td colspan="5" align="center" ></td><td>Total Price: </td><td><?php if($type->tprice>0){ echo $stp=$type->tprice;}else{ echo $stp=$p->tp;} ?> </td></tr>
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
																<?php
		if($del->type==6){echo "Merchant";}
		elseif($del->type==5){echo "Agent";}
		elseif($del->type==4){echo "Ward/Union";}
		elseif($del->type==3){echo "Upazila";}
		elseif($del->type==2){echo "District";}
		elseif($del->type==1){echo "Zone";}
		else{echo "Not Set";}
		 ?>
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

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
    <!-- SlimScroll -->

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>