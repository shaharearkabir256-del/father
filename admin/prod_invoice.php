<?php
	session_start();
	error_reporting(0);
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$page=$_GET['page'];
		
		//invoice delete
	$location="prod_invoice.php";
	if(isset($_GET['delete'])){
		$delete=$_GET['delete'];		
		$mysqli->query("DELETE FROM `invoice` WHERE `serial`='".$delete."' LIMIT 1");
		$_SESSION['msg']="Your invoice Deleted Successfully";
		header("Location: $location");
		exit();
	} 

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page.' '.$date;?></title>
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
            <?php echo $page;?>
            <small> <?php
								if($_SESSION['msg']){echo "<font color='red'>".$_SESSION['msg']."</font>";}
								if($_SESSION['msgs']){echo "<font color='green'>".$_SESSION['msgs']."</font>";}
							?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
            <li class="active"><?php echo $page;?></li>
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
                  <h3 class="box-title"><a href="prod_invoice_add.php?page=Create New Invoice">Create New Invoice</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				
						
				<div class="col-md-12 col-sm-12 col-xs-12">

                                        <table id="example1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
													<th>Invoice</th>
													<th>User Name</th>
													<th>Items</th>
													<th>Status</th>
													<th>Date</th><th>Delivery Type</th>
													<th>Action</th>
													<th>Invoice</th>
													<th>Invoice Panel`</th>
													
                                                </tr>
                                            </thead>
											<tbody>
<?php  //INSERT INTO `invoice`(`serial`, `invoice`, `user_id`, `name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`, `type`, `ack`)
				$n=1;
				$query=$mysqli->query("SELECT * FROM `invoice` WHERE  `agent_id`='$id' and `type`='1' order by serial desc");
				while($inv=mysqli_fetch_object($query)){
				$mem=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='$inv->user_id' "));
				$invoice=mysqli_fetch_object($mysqli->query("SELECT count(invoice) AS `items` FROM `invoice` WHERE `invoice`='$inv->invoice' and `type`='0'"));
				$res=mysqli_fetch_object($mysqli->query("select `get` from `tree` where `user_id`='$inv->user_id' "));
			?>
   <tr>
        <th class="center"  scope="row"><?php echo $n++; ?></th>
      
        <td class="center"><?php echo $inv->invoice; ?></td>
        <td class="center"><?php echo $mem->log_id; ?></td>
        <td class="center"><?php echo $invoice->items; ?></td>
		<td class="center">
		<?php //echo $res->get; ?>
		<?php if($inv->paid==1){ ?> 
		<span class="btn btn-info">Paid<span>
		<?php }else{ ?>
		<a href="prod_invoice_paid_act.php?serial=<?php echo $inv->invoice ;?>&&memberUserId=<?php echo $inv->user_id;?>"><span class="btn btn-danger">Unpaid<span></a>
		<?php }	?>
		
</td>
        <td class="center"><?php echo $inv->sdate; ?></td>
		 <td class="center">
		<?php if($inv->delivery==1){ ?> 
		<!--<a href="report_my_invoice_act.php?invoice=<?php echo $inv->serial; ?>&&chk=0">-->
		<span class="label label-info">Home Delivery</span>
		<!--</a>-->
		<?php }else{ ?>
		<span class="label label-danger">Shop Delivery</span>
		<?php }	?>
		</td>
        <td class="center">
		<a href="prod_add_to_invoice.php?invoice=<?php echo $inv->invoice;?>&&UserName=<?php echo $mem->log_id;?>">
		<span class="label label-success">Add<span>
		</a>
		</td>
		 <td class="center">
		<a target="_blank" href="prod_invoice_print.php?invoice=<?php echo $inv->invoice;?>&&userid=<?php echo $mem->user_id;?>">
		<span class="label label-primary">View<span>
		</a>
		</td>
		<td class="center">

			<a href="?delete=<?php echo $inv->serial; ?>"><span class='label label-danger'>Delete</span></a>
		</td>
		
    </tr>
                                           
<?php } ?>
											 </tbody>
											  <tfoot>
       
                                            </tfoot>
                                        </table>

                                    </div>
				
				
				
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
<?php unset($_SESSION['msg']);unset($_SESSION['msgs']);?>
<?php } ?>