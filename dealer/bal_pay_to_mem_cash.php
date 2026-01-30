<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Balance Payments</title>
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
        <section class="content-header">
          <h1>
            Balance
            <small>Payments</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Balance</a></li>
            <li class="active">Payments</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Balance Request List 
<?php
								if($_SESSION['msg']){echo "| <span class='label-danger'>".$_SESSION['msg']."</span>";}
								if($_SESSION['msgs']){echo "| <span class='label-success'>".$_SESSION['msgs']."</span>";}
							?>
				  </h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                     <th>#</th><th>Trans ID</th>
													<th>Date</th>
													<th>User Name</th>
													<th>Payment Method</th>
													<th>Commission</th>
													<th>Service Charge</th>
													<th>Payable</th>
													<th>Status</th>
													<th>Action</th>
												
													
                                                </tr>
                                            </thead>
										
                                            <tbody>
                                            	<?php 
				$n=1; $total=0;
				$accounts=$_SESSION['DealerLogId'];
				$query=$mysqli->query("SELECT * FROM `withdraw` where `rec_id`='".$accounts."' and (`type`='1' or `type`='3') and `account`='3' order by serial desc");
				while($mem=mysqli_fetch_object($query)){
				
			?>  
                                           <tr>
    
        <td class="center"  scope="row"><?php echo $n++; ?></td>
		<td class=""><?php echo $mem->trx_id; ?></td>
		  <td class="center"><?php echo $mem->day; ?></br>
		<?php echo $mem->time; ?></br>
		<?php echo $mem->date; ?></td>
        <td class="center">
		<?php 
		$member=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `member` where `user_id`='".$mem->send_id."'"));
		$profile=mysqli_fetch_object($mysqli->query("SELECT `fname`,`lname`,`mobile`,`address` FROM `profile` where `user_id`='".$mem->send_id."'"));
		echo $member->log_id; echo "<br>";
		echo $profile->fname.' '.$profile->lname; echo "<br>";
		echo $profile->mobile; echo "<br>";
		//echo $profile->address; echo "<br>";
		?>
		</td>
      

        <td class="">
		<?php require('../inc/payment_method.php'); ?>
		</td>
        <td class="center"><?php echo $mem->agent_com.$bdt; $totalc=$totalc+$mem->agent_com; ?></td>
        <td class="center"><?php echo $mem->tax.$bdt;  $ttax=$ttax+$mem->tax; ?></td>
        <td class="center"><?php echo $payable=$mem->amount; echo $bdt; $totalp=$totalp+$payable; ?></td>
    
       
        <td class="center"><?php if($mem->status==1){ ?><span class="label label-success">Success<span><?php }else{ ?><span class="label label-warning">Pending<span><?php } ?></td>
     <?php if($mem->status==0){?>
		<td class="center">
		<a href="bal_pay_y_to_mem_cash.php?serial=<?php echo $mem->serial;?>"><button  type="submit" class="btn btn-sm btn-success">Yes</button></a>	
		<a href="bal_pay_n_to_mem_cash.php?serial=<?php echo $mem->serial;?>"><button  type="submit" class="btn btn-sm btn-danger">No&nbsp;</button></a> 
		</td>
        <?php }else{ ?>
		<td class="center">
		<span class="label label-primary">
		<i class="glyphicon glyphicon-ok"></i>
		<span>
		</td>
       <?php } ?>
     


    </tr>
		<?php } ?>
                                            </tbody>
											 <tfoot>
                                                <tr>
                                                     <th>#</th><th>Trans ID</th>
													<th></th>
													<th> </th>
													<th>Total:</th>
													<th><?php echo $totalc;?></th>
													<th><?php echo $ttax;?></th>
													<th><?php echo $totalp;?></th>
													<th></th>
													<th></th>
												
													
                                                </tr>
                                            </tfoot>
										
                                        </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php require_once 'footer.php';?>
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
