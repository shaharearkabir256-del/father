<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		                    $sponsor=0.00;
							$steup=0.00;
							$matching=0.00;
							$gen=0.00;
							$rayality=0.00;
							$rec_bal=0.00;
							$pay_bal=0.00;
							$Product=0.00;
							$net=0.00;

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Daily Comission</title>
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
          Daily Comission
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Daily Comission</li>
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
                  <h3 class="box-title"><a href="#">Daily Comission</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				
											 <table id="example1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
													<th>User Name</th>
													<th>Amount</th>
													<th>Date</th>
													<th>Status</th>
													
                                                </tr>
                                            </thead> <tbody> 
			  <?php $n=1; $total=0; 
			  //$d30=strtotime("-30 Day");
			//$start=date("d-M-Y", $d30); // 30 Days Back 
		$q1=$mysqli->query("SELECT * FROM `comdaily` where `type`=0"); //SELECT * FROM `comdaily` where `cdate`='".$date."' or `cdate`='".$ydate."'
		while($daily=mysqli_fetch_object($q1)){
		//$member3=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `member` where `user_id`='".$trx->user_id."' "));
		?>								                                           
                                              
        <tr <?php if($daily->package==2){ ?> class="success" <?php } ?><?php if($daily->package==3){ ?> class="warning" <?php } ?><?php if($daily->package==4){ ?> class="danger" <?php } ?><?php if($daily->package==5){ ?> class="success" <?php } ?><?php if($daily->package==6){ ?> class="warning" <?php } ?><?php if($daily->package==7){ ?> class="danger" <?php } ?><?php if($daily->package==8){ ?> class="success" <?php } ?><?php if($daily->package==9){ ?> class="warning" <?php } ?><?php if($daily->package==10){ ?> class="danger" <?php } ?> > 
        <th class=""  scope="row"><?php echo $n++;?></th>
        <td class=""><?php  
		$member3=mysqli_fetch_object($mysqli->query("SELECT `user` FROM `admin` where `user_id`='".$daily->user_id."' "));
		echo $member3->user;
		?></td>

	
        <td class=""><?php echo $daily->amount.$bdt?></td>
		<td class=""><?php echo $daily->cdate;?></td>
        <td class=""><span class="label label-success">Succes<span></td>
        </tr>
<?php $total=$total+$daily->amount; } ?>
	</tbody>
	<tfoot>
                                                <tr>
                                                     
													<th></th>
													<th>Total</th>
													<th><?php echo $total;?></th>
													<th></th>
													
                                                </tr>
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