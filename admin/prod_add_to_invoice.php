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

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page;?></title>
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
          <h1><a href="prod_invoice.php?page=Invoice List">Invoice List</a><?php if(!empty($_GET['page'])){echo " | ".$page;}?>
            <small></small>
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
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php    $sn=$_GET['invoice'];
				 $q1=$mysqli->query("SELECT `invoice` FROM `invoice` WHERE `invoice`='$sn' and `type`='1' ");
		$chk=mysqli_num_rows($q1);
		$inv=mysqli_fetch_object($q1);
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
					<div class="col-md-6 col-sm-12 col-xs-12">
					
    <div class="panel panel-primary">
      <div class="panel-heading">General Products</div>
      <div class="panel-body">
	  <form role="form"  action="prod_invoice_add_act.php" method="POST">
			<input type="namber" name="invoice" value="<?php if($chk==1){echo $inv->invoice;}?>" hidden> 
                                            <div class="form-group">
                                                <label class="form-label" for="email-1">Product Name:</label>
												<select name="prodSn" class="form-control">
												<?php 
												$qprod=$mysqli->query("SELECT * FROM `prod` order by serial DESC");
												while($prod=mysqli_fetch_object($qprod)){
												?>
												<option value="<?php echo $prod->serial?>"><?php echo $prod->name?></option>
												<?php } ?>
												</select>
                                            </div>

											<div class="form-group">
                                                <label class="form-label" for="password-1">Qty</label>
                                                <input type="number" class="form-control" name="qty" value="1" placeholder="Enter Quantity">
                                            </div>
                                            <div class="form-group">
												<button type="submit" name="prodAdd" class="btn btn-primary  pull-right">Ok</button>
                                            </div>

                                        </form>
	  </div>
    </div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-primary">
      <div class="panel-heading">Consumer Products</div>
      <div class="panel-body">
		<form role="form"  action="prod_invoice_add_act.php" method="POST">
					<input type="namber" name="invoice2" value="<?php if($chk==1){echo $inv->invoice;}?>" hidden> 
                                            <div class="form-group">
                                                <label class="form-label" for="email-1">Product Name:</label>
												<select name="productSn" class="form-control">
												<?php 
												$qprod=$mysqli->query("SELECT * FROM `product` order by serial DESC");
												while($prod=mysqli_fetch_object($qprod)){
												?>
												<option value="<?php echo $prod->serial?>"><?php echo $prod->name?></option>
												<?php } ?>
												</select>
                                            </div>

											<div class="form-group">
                                                <label class="form-label" for="password-1">Qty</label>
                                                <input type="number" class="form-control" name="qty2" value="1" placeholder="Enter Quantity">
                                            </div>
                                            <div class="form-group">
												<button type="submit" name="productAdd" class="btn btn-primary  pull-right">Ok</button>
                                            </div>

                                        </form>
	</div>					
	</div>					
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