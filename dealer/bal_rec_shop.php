<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Received Balance</title>
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
            Received
            <small>Balance</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Received</a></li>
            <li class="active">Balance</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Received Balance</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       <th>#</th><th>Trans ID</th>
													<th>Date</th>
													<th>Sender</th>
													<th>Amount</th>
													<th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
					 $accounts=$_SESSION['DealerLogId'];
				$n=1; $total=0.00;
				$query=$mysqli->query("SELECT * FROM `trx` where `rec_id`='".$accounts."' and `type`='3' ");
				while($trx=mysqli_fetch_object($query)){
				
			?>
               <?php

		$chkdel=mysqli_num_rows($q2); ?>                            
                                              
       <tr <?php if($chkdel==1){ echo "style='background-color: #ecf4f9;'";} ?>>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class=""><?php echo $trx->trx_id; ?></td>
        <td class="center"><?php echo $trx->day; ?></br>
		<?php echo $trx->time; ?></br>
		<?php echo $trx->date; ?></td>

        <td class="center">	
		
		<?php
			$q1=$mysqli->query("SELECT `log_id` FROM `member` WHERE `user_id`='".$trx->send_id."'");
		$acts=mysqli_fetch_object($q1);
		echo $acts->log_id; ?>
		<?php
			$q2=$mysqli->query("SELECT `user` FROM `admin` WHERE `user_id`='".$trx->send_id."'");
		$actsadmin=mysqli_fetch_object($q2);
		echo $actsadmin->user; ?>
		<?php
		$q3=$mysqli->query("SELECT `log_id` FROM `dealer` WHERE `user_id`='".$trx->send_id."'");
		$acts_dealer=mysqli_fetch_object($q3);
		echo $acts_dealer->log_id; ?>
		
		</td>
        <td class="center">BDT <?php echo $trx->amount; ?></td>
    
       
        <td class="center"><span class="label label-success">Succes<span></td>
       
     


    </tr>
											<?php $total=$total+$trx->amount; } ?>
            

             
             
                    </tbody>
                    <tfoot>
                      <tr>
                       <th>#</th>
													<th></th>
													<th></th>
													<th>Total:</th>
													<th><?php echo $total;?></th>
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
