<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Product Request</title>
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
            Product 
            <small> Request</small>
			<?php 
			if($_SESSION['msg']){echo $_SESSION['msg']; }
			if($_SESSION['msgs']){echo $_SESSION['msgs']; }
			?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li>Product Management</li>
            <li class="active">Product Request</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Product Request List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
        <th>#</th>
     

        <th>Pic</th>
        <th>Product Name</th>
		<th>Price</th>
		<th>Point</th>
		<th>Stock</th>
        <th>Quantity</th>
		<?php $myid=$_SESSION['DealerLogId'];	
			$delme=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `user_id`='$myid'"));
		if($delme->type!=1){ ?>
		<th>Request To</th><?php } ?>
		
        <th>Action</th>

		

    </tr>
    </thead>
	<tbody>
			<?php $n=1;
			if($delme->type!=1){
										if($delme->type==5){
										$typeme="and `type`='4' and `zone_id`='$delme->zone_id' and `upozela_id`='$delme->upozela_id' and `union_id`='$delme->union_id' and `ward_id`='$delme->ward_id' ";
										}elseif($delme->type==4){ // Upozela List If Ward/Union
											$typeme="and `type`='3' and `zone_id`='$delme->zone_id' and `upozela_id`='$delme->upozela_id' and `union_id`='$delme->union_id' ";
											}elseif($delme->type==3){ // District List If Upozela
											$typeme="and `type`='2' and `zone_id`='$delme->zone_id' and `upozela_id`='$delme->upozela_id' ";	
											}elseif($delme->type==2){ // Zone Product List If District
											$typeme="and `type`='1' and `zone_id`='$delme->zone_id' ";	 
											}
				$delupline=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where serial>0 $typeme "));
				
				$query=$mysqli->query("SELECT * FROM `stock` where `rec_id`='$delupline->user_id'  "); //and chk=1 order by serial desc
				while($stk=mysqli_fetch_object($query)){ 
			?>
    
    <tr>
        <td><?php echo $n++; ?></td>
   
       
        <td><img height="50" src="../../product/<?php echo $stk->img1; ?>" alt=""></td>
        <td><?php echo $stk->name; ?></td>

		<td><?php echo $stk->price.$tk; ?></td>
		<td><?php echo $stk->rp; ?></td>
		<td><?php echo $stk->qty; ?></td>
		<td>
		<form role="form"  action="prod_req_act.php" method="POST"> <!--prod_req_to_admin_act.php-->
		  <div class="form-group">
                                               
												 <input type="number" value="<?php echo $stk->serial ?>"  name="sn"  hidden>
												 <input type="number" value="<?php echo $delupline->user_id ?>"  name="upline"  hidden>
												 <input type="text" value="<?php echo $_SERVER["PHP_SELF"];?>"  name="location"  hidden>
												<input type="number" value="<?php echo $stk->price; ?>"  name="price"  hidden>
                                                <input type="number" class="form-control"  name="qty" placeholder="Enter Quantity" required>
                                             </div>
		</td> 
		<td><?php echo $delupline->log_id; ?><input type="number" value="<?php echo $delupline->user_id; ?>" name="recid" hidden></td>
		<td>

		<button type="submit" class='btn btn-success'>Request</button>
		</form>  
		</td>

    </tr>
    
       
					<?php } }else{ ?>	
					<?php $n=1;
				
				if($agentid!=''){
					$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `log_id`='$agentid'"));
					$myid=$del->user_id;
					}else{
					$myid=$_SESSION['DealerLogId'];	
					}
				$query=$mysqli->query("SELECT * FROM `product` where chk=1 order by serial desc ");
				while($product=mysqli_fetch_object($query)){ 
			?>
    
    <tr>
        <td><?php echo $n++; ?></td>
   
       
        <td><img height="50" src="../../product/<?php echo $product->img1; ?>" alt=""></td>
        <td><?php echo $product->name; ?></td>

		<td><?php  if($product->offer==1){ echo $product->discount_price.$tk;}else{echo $product->price.$tk; } ?></td>
		<td><?php echo $product->rp; ?></td>
		<td><?php echo $product->stock; ?></td>
		<td>
		<form role="form"  action="prod_req_to_admin_act.php" method="POST">
		  <div class="form-group">
                                               
												 <input type="number" value="<?php echo $product->serial ?>"  name="sn"  hidden>
												 	<input type="number" value="999" name="recid" hidden>
												<input type="number" value="<?php if($product->offer==1){ echo $product->discount_price;}else{echo $product->price; } ?>"  name="price"  hidden>
                                                <input type="number" class="form-control"  name="qty" placeholder="Enter Quantity" required>
                                             </div>
		</td> 

		<td>

		<button type="submit" class='btn btn-success'>Request</button>
		</form>  
		</td>

    </tr>
    
       
					<?php } ?>	
            
<?php }  ?>
             
             
                    </tbody>
                    <tfoot>
                        <tr>
        <th>#</th>
  

        <th>Pic</th>
        <th>Product Name</th>
		<th>Price</th>
		<th>Point</th>
		<th>Stock</th>
        <th>Quantity</th>
		<?php if($delme->type!=1){ ?>
		<th>Request To</th><?php } ?>
        <th>Action</th>

		

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
