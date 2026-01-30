<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
   <title><?php echo $title;?> Invoice_<?php echo $inv=$_GET['INVOICE']; ?> Date_<?php echo $date;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
    <div class="wrapper">
      
     <?php require_once 'header.php';?>
      <!-- Left side column. contains the logo and sidebar -->
		<?php require_once 'side.php';?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

				<table class="table table-bordered table-striped">
													<?php require_once 'inv_header.php';?>
													
													<tr>
													<td colspan=""  align="">
													<?php
													/*turkey`(`inv`, `refofficer`, `packqty`, `pname`, `turkeyage`, `cname`, `vill`, `uni`, `ps`, `district`,
													`mobile`, `nid`, `packamn`, `unitp`, `dis`, `total`, `cmnt`
													*/
													$id=$_SESSION['Accounts'];
													$inv=$_GET['INVOICE'];
													if($inv){
													$invoice=mysqli_fetch_object($mysqli->query("select * from `invoice` where `invoice`='$inv' "));
													$profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$invoice->user_id."'"));
													$sel=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_info` WHERE `user_id`='".$invoice->agent_id."'"));
		
													
													}else{}
													?>
													<p>Invoice #<?php echo $inv; ?></p>
													</td>
												
													<td align="right">Date : <?php echo $invoice->indate;?> Time: <?php echo $invoice->intime;?></td>
													</tr>
													<tr height="">
													<td width="50%">
													
													<h4>To: </h4>
													<h5><?php echo $profile->fname.''.$profile->lname;?></h5>
													<h6><?php echo $profile->address;?></h6>
													<p>Cell:<?php echo $profile->mobile; ?>
													</p>
													</td>
													
													<td width="50%"> 
													<h4>From: </h4>
													<h5><?php if($sel->fname!=''){echo $sel->fname;}else{echo 'Balukona Limited';}?></h5>
													<h6><?php if($sel->address!=''){echo $sel->address;}else{echo 'Mouchak Tower, 5th Floor, Suite-610, 83/B, New Circular Road, Malibagh, Dhaka-1217';}?></h6>
													<p>Cell:<?php if($sel->mobile!=''){echo $sel->mobile;}else{echo '+880 1772-696207, +880 1884-880513';} ?>
													</td>
													</tr>
													<tr>
													<td colspan="2">
													<div class="table-responsive">
														  <table class="table table-bordered">
															<tr>
															<thead>
																  <th class="">SL No</th>
																  <th class="">Code</th>
																  <th class="">Description</th>
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
																  $p=mysqli_fetch_object($mysqli->query("select sum(trp)as `trp`, sum(total)as `tp` from `order` where `invoice`='$inv' "));
																  $exeprod=$mysqli->query("select * from `order` where `invoice`='$inv' ");
																  while($prod=mysqli_fetch_object($exeprod)){
																   ?>
																<tr>  
																  <td class="" width="10%"><?php echo $n++; ?></td>
																  <td class="" width="10%"><?php echo $prod->model; ?></td>
																  <td class="" width="30%"><?php echo $prod->name; ?></td>
																  <td class="" width="10%"><?php echo $prod->rp; ?></td>
																  <td class="" width="10%"><?php echo $prod->price.$bdt; ?> </td>
																  <td class="" width="10%"><?php echo $prod->qty; ?> </td>
																  <td class="" width="10%"><?php echo $trp=($prod->rp*$prod->qty); ?> </td>
																  <td class="" width="10%"><?php echo $trp1=($prod->price*$prod->qty);.$bdt; ?> </td>
																  
																 
																</tr>
																  <?php } ?>
																<tr><td colspan="8" align="center" >&nbsp;</td></tr>
																<tr><td colspan="6" align="center" ></td><td>Total point: </td><td><?php echo $p->trp; ?> </td></tr>
																
																<tr><td colspan="6" align="center" ></td><td>Grand Total: </td><td><?php echo $p->tp.$bdt; ?> </td></tr>
																<tr>
																  																 
																  <td class="" style="font-style:upercach;" colspan="8" ><b>IN WORD</b>:
															 <?php echo strtoupper(numberTowords($p->tp))." TAKA ONLY"; ?>

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
													
													<?php //require_once 'inv_footer.php';?>
													<tr><td border="0" colspan="" height=""></td>
													<td align="right"><a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Print</a></td>
													</tr>
											
				
											</table>

            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php //require_once 'footer.php';?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
<?php
		unset($_SESSION['msg']);
		unset($_SESSION['msgs']);
		?>
  </body>
</html>
