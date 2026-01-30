<?php require('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Order List</title>
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
            Order List
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Order List</li>
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
                  <h3 class="box-title">Order List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
				<table  id="example1" class="table table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
		<th>Order Date</th>
        <th>Request By</th>

        <th>Pic</th>
        <th>Name</th>
 
		<th>Point</th>
		<th>Price</th>
	
        <th>Quantity</th>
		<th>Total</th>
        <th>Status</th>
		

    </tr>
    </thead>
	 <tbody>
			<?php $n=1;
				
				
				$query=$mysqli->query("SELECT * FROM `prod_req` where `rec_id`='$id' order by `serial` desc ");
				while($product=mysqli_fetch_object($query)){ 
			?>
   
    <tr <?php if($date==$product->date){ ?> bgcolor="#ffffcc" <?php } ?> >
        <td><?php echo $n++; ?></td>
		<td><?php  echo $product->date; ?></td>
        <td><?php 
		$q1=$mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$product->send_id."'");
		$q2=$mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$product->send_id."'");
		$del=mysqli_fetch_object($q1);
		$mem=mysqli_fetch_object($q2);
		echo $del->log_id;
		echo $mem->log_id;
		?>
		</td>
		
 
        <td><img height="50" src="../../product/<?php echo $product->img1; ?>" alt=""></td>
        <td><?php echo $product->name; ?></td>
    
 
		<td><?php  echo $product->rp; ?></td>
		<td><?php  echo $product->price.$tk; ?></td>
	
		<td><?php echo $product->qty; ?></td> 
			<td><?php $total=$product->price*$product->qty; echo $total.$tk ?></td>	
		<td>

		<?php if($product->chk==0){ ?>
		<a href="prod_req_accept_act.php?sn=<?php echo $product->serial; ?>"><button type="submit" class='btn btn-warning'>Accept</button></a>
		<?php }else{ ?>
		
			<span class='label label-success'>Ok</span>
		<?php } ?>
		 
		</td>

    </tr>
    
     
					<?php } ?>	
					    </tbody>
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
<?php unset($_SESSION['msg']);unset($_SESSION['msgs']);?>
