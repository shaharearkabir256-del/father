<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		                    $sponsor=0;
							$steup=0;
							$daily=0;
							$gen=0;
							$rayality=0;
							$rec_bal=0;
							$pay_bal=0;
							$product=0;
							$pp=0;
							$tax=0;
							$net=0;

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Balance Sheet</title>
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
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <?php require_once 'header.php';?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
     
<?php require_once 'side.php';?>
      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Balance Sheet
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Balance Sheet</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
	<div class="row">
        <!-- left column -->
       
		<div class="col-md-12">
		  
		 <div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Balance Sheet</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				
											<table id="example1" class="table table-bordered  table-hover">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
													<th>UserId</th>													
																								
													<th>Sponsor</th>
													<th>StepUp</th>
													<th>Daily</th>
													<!--<th>Generation</th>-->
													<th>Receive</th>
													<th>Payment</th>
													<th>Product</th>
													<th>PP</th>
													<th>Service Charge</th>
													<th>Net</th>
                                                </tr>
                                            </thead>
											 <tbody>
											<?php 
			/*SELECT `serial`, `user_id`, `direct`, `spot`, `weekly`, `monthly`, `matching`, `gen`, `royality`, `rank`, 
			`rec_bal`, `pay_bal`, `product`, `tax`, `net_bal`, 
			`g1`, `g2`, `g3`, `g4`, `g5`, `g6`, `g7`, `g8`, `g9`, `g10`, `g11`, `g12`, `g_all` FROM `balance` WHERE 1*/
				$n=1;
	$query=$mysqli->query("SELECT * FROM `balance` where `type`=1 ");	
	while($bal=mysqli_fetch_object($query)){	?>
		<tr <?php if($bal->net_bal<0){ ?>class="danger" <?php } ?>><th class="center"  scope="row"><?php echo $n++; ?></th>
        <td class="center"><?php
		//$tree=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` where `user_id`='$bal->user_id' "));
		//$profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` where `user_id`='$bal->user_id' "));
		$mem=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` where user_id='".$bal->user_id."'"));
		echo $mem->log_id;
$member3=mysqli_fetch_object($mysqli->query("SELECT `user` FROM `admin` where `user_id`='".$bal->user_id."' "));
		echo $member3->user;		
		//if($bal->user_id==99){ echo "<i class='label label-primary'>Admin</i>";	}elseif(($bal->user_id==10)){ echo "<i class='label label-success'>Accounts</i>";} ?></td>       
      
        <td class="center"><?php echo $bal->direct; ?></td>
        <td class="center"><?php echo $bal->stepup; ?></td>
        <td class="center"><?php echo $bal->daily; ?></td>
        <!--<td class="center"><?php echo $bal->gen; ?></td>-->
        <td class="center"><?php echo $bal->rec_bal; ?></td>
        <td class="center"><?php echo $bal->pay_bal; ?></td>
        <td class="center"><?php echo $bal->product; ?></td>
        <td class="center"><?php echo $bal->balance_purchase_point; ?></td>
        <td class="center"><?php echo $bal->tax; ?></td>
        <td class="center"><?php echo $bal->net_bal; ?></td>
    </tr>
                                           
					<?php $sponsor=$sponsor+$bal->direct;
							$stepup=$stepup+$bal->stepup;
							$daily=$daily+$bal->daily;
							$gen=$gen+$bal->gen;
							$rec_bal=$rec_bal+$bal->rec_bal;
							$pay_bal=$pay_bal+$bal->pay_bal;
							$product=$product+$bal->product;
							$pp=$pp+$bal->balance_purchase_point;
							$tax=$tax+$bal->tax;
							$net=$net+$bal->net_bal;
											} ?>
											 </tbody>
											  <tfoot>
                                                <tr>
                                                     <th>#</th>
													<th>UserId</th>													
																					
													<th>Sponsor</th>
													<th>StepUp</th>
													<th>Daily</th>
													<!--<th>Generation</th>-->
													<th>Receive</th>
													<th>Payment</th>
													<th>Product</th>
													<th>PP</th>
													<th>Service Charge</th>
													<th>Net</th>
                                                </tr>
												<!--<tr>
                                                    <th>#</th>
													<th>Total</th>													
													<th></th>													
													<th><?php //echo $sponsor;?></th>
													<th><?php //echo $stepup;?></th>
													<th><?php //echo $daily;?></th>
													<th><?php //echo $gen; ?></th>
													<th><?php //echo $rec_bal; ?></th>
													<th><?php //echo $pay_bal; ?></th>
													<th><?php //echo $product; ?></th>
													<th><?php //echo $pp; ?></th>
													<th><?php //echo $tax; ?></th>
													<th><?php //echo $net; ?></th>
                                                </tr>-->
												
                    </tfoot>
                                        </table>


				
				
				
				<!-- /. Main Content Area  -->
				</div>
			</div>
		</div>
	  </div>
	</div>
        <!-- Default box -->
        </section> 
<!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php require_once 'footer.php';?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
		    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
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

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>

<?php } ?>