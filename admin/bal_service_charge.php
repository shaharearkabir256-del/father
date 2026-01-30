<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$recid=$_SESSION['AdminUserId'];
		require '../db/cal_ad.php';
		$admin=$_SESSION['AdminUserId'];

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageName=$_GET['pageName']; ?></title>
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
            <?php echo $pageName; ?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $pageName; ?></li>
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
                  <h3 class="box-title">Transaction <?php echo $pageName; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
		
				 <table id="example1" class="table table-bordered table-striped">
				 <thead>
				 <?php echo $label="
												<tr>
                                                     <th>#</th>
                                                    <th><i class='glyphicon glyphicon-compressed'></i> Trans ID</th>
                                                    <th><i class='glyphicon glyphicon-compressed'></i> Type</th>
													<th><i class='glyphicon glyphicon-time'></i> Date</th>
													<th><i class='glyphicon glyphicon-user'></i> User Name</th>
													<th><i class='glyphicon glyphicon-compressed'></i> Method</th>
													<th><i class='glyphicon glyphicon-usd'></i> Amount</th>

                                                </tr>
												";
												?>
				 </thead>
				 <?php 
				$n=1;
				$query=$mysqli->query("SELECT * FROM `trx` where `tax`>0 order by serial desc");
				while($trx=mysqli_fetch_object($query)){
				
			?>
				  <tr>
    
        <td class="center"  scope="row"><?php echo $n++; ?></td>
		<td class="center"><?php echo $trx->trx_id; ?></td>
		 <td class="center">
		 <?php
		 if($trx->type==0){echo"Transfer";}
		 if($trx->type==1){echo"Withdraw";}
		 if($trx->type==2){echo"Request";}
		 if($trx->type==3){echo"Shopping";}
		 if($trx->type==4){echo"Upgrade";}
		  ?></td>
        <td class="center"><?php echo $trx->date; ?></td>
        <td class="center"><?php 
		$mem=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `member` where `user_id`='$trx->send_id'"));
		echo $mem->log_id; ?></td>
        <td class="center">
		<?php 
			$mobile_banking=mysqli_fetch_object($mysqli->query("SELECT * FROM `mobile_banking` where `serial`='$trx->method'"));
			echo $mobile_banking->name;
		?>
		<?php 
/* 		if($trx->method==0){ echo 'Virtual';}
		elseif($trx->method==2){ 
		echo '<br>'.'Acc: '.$trx->bkash;
		}
		elseif($trx->method==3){ 
		echo '<br>'.'Acc: '.$trx->rocket;
		} 
		elseif($trx->method==4){ 
		echo '<br>'.'Acc: '.$trx->bankaccno;
		}
		else{} */ 
		?>
		</td>
        <td class="center"><?php echo $trx->tax.$bdt; $t_trx=$t_trx+$trx->tax; ?></td>
   	    


    </tr>
				   <?php } ?> 
				 <tfoot>
					<tr>
                                                     <th></th>
                                                     <th></th>
                                                     <th></th>
													<th></th>
													<th> </th>
													<th>Total </th>
													<th><?php echo $t_trx.$t; ?></th>
												
                                                </tr>
                    <?php echo $label; ?>
                    </tfoot>
				 </table>
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
<?php unset($_SESSION['msg']);unset($_SESSION['msgs']);?>
<?php } ?>