<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Invoice</title>
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
		  <?php require_once('prod_nav.php');?>
           
 
            <small>  </small>
			<?php 
			if($_SESSION['msg']){echo $_SESSION['msg']; }
			if($_SESSION['msgs']){echo $_SESSION['msgs']; }
			?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li>Product Management</li>
            <li class="active">Invoice</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">  Invoice</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                   <table id="example1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
										 <th>View</th>
                                            <th>Date</th>
											<th>UserId</th>
                                            <th>Invoice</th>
                                            <th>Product Item</th>
                                   
                                            <th>Received Date</th>
                                            <th>Delivery Date</th>
											 <th>Total Point</th>
                                            <th>Total Amount</th>
                                           
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
	
                        <?php 
			//SELECT  `user_id`, `ref_id`, `agent_id`, `invoice`, `item`, `indate`, `deldate`, 
			//`recdate`, `rp`, `total`, `chk` FROM `invoice` WHERE 1
			$memid=$_SESSION['DealerLogId'];
			$query=$mysqli->query("select * from `invoice` where `agent_id`='$memid'  order by `serial` desc ");
			  while($res1=mysqli_fetch_object($query)){
							?>  
                                        <tr class="even gradeC">
																					<td class="center">
		<a href="inv.php?INVOICE=<?php echo $res1->invoice; ?>">Invoice</a>
		</td>
											<td><?php echo $res1->indate?></td>
											<td><?php $mem=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$res1->user_id."'")); echo $mem->log_id;?></td>
                                            <td>#<?php echo $res1->invoice?></td>
                                            <td><?php echo $res1->item?></td>
                                            <td><?php echo $res1->recdate?></td>
                                            <td><?php echo $res1->deldate?></td>
                                           <td><?php echo $res1->rp?></td>
                                            <td>BDT <?php echo $res1->total?></td>

											   
                                         
                                        
                                          
                                        </tr>
					<?php } ?>
                                    </tbody>
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
