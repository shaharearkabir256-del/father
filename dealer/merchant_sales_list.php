<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageName=$_GET['pageName'];?></title>
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
		  <?php //require_once('prod_nav.php');?>
           
 
            <small>  </small>
			<?php 
			if($_SESSION['msg']){echo $_SESSION['msg']; }
			if($_SESSION['msgs']){echo $_SESSION['msgs']; }
			?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li>Product Management</li>
            <li class="active"><?php echo $pageName; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">  <?php echo $pageName; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
        <th>#</th>
			<th>UserId</th>
   
        <th>Product Name</th>
		<th>Price</th>	
		<th>Point</th>
        <th>Qty</th>
       <th>Total Price</th>	
		<th>Total Point</th>
        <th>Date</th>
        <th>Action</th>

		

    </tr>
    </thead>
	<tbody>
			<?php $n=1;
				
				if($agentid!=''){
					$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `log_id`='$agentid'"));
					$myid=$del->user_id;
					}else{
					$myid=$_SESSION['DealerLogId'];	
					}

//INSERT INTO `sales`(`serial`, `seller_id`, `invoice`, `user_id`, `product_id`, `brand`, `model`, `name`, `price`, `profit`,
// `rp`, `img1`, `info`, `date`, `qty`, `chk`
$totalsal=mysqli_fetch_object($mysqli->query("SELECT sum(tprice)as `tp`, sum(tpoint)as `tr`, sum(qty)as tq FROM `invoice` where `agent_id`='$id' and `type`='0'"));

				$query=$mysqli->query("SELECT * FROM `invoice` where `agent_id`='$id' and `type`='0' order by serial desc ");
				while($sal=mysqli_fetch_object($query)){
$mem=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `member` WHERE `user_id`='$sal->user_id' "));
			?>
    
    <tr <?php if($date==$sal->date){ ?> bgcolor="#e6f2ff" <?php } ?> >
        <td><?php echo $n++; ?></td>
   	<td><?php
		
		echo $mem->log_id; ?></td>
        <td><?php echo $sal->name; ?></td>

		<td><?php echo $sal->price; ?></td> 
		<td><?php  echo $sal->point; ?></td>
		<td><?php echo $sal->qty; ?></td>
		<td><?php echo $sal->tprice; ?></td>
		<td><?php echo $sal->tpoint; ?></td>
		<td><?php echo $sal->sdate; ?></td>
		<td><a class="label label-warning" href="marchant_prod_up_act.php?delProdFInvoice=<?php echo $sal->serial; ?>&&invoice=<?php echo $sal->invoice; ?>">Delete</a></td>

    </tr>
    
       
					<?php } ?>	
            
          
             
                    </tbody>
                    <tfoot>
                        <tr>
 
        <th></th>
       
		<th></th>
		<th></th>
        <th></th>
        <th>Sub Total</th>
		<th><?php  echo $totalsal->tq; ?></th>
		<th><?php  echo $totalsal->tp.$tk; ?></th>	
		<th><?php  echo $totalsal->tr; ?></th>
		<th></th>
		
		
        
        <th><a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a></th>
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
