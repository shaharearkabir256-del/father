<?php require_once('session.php'); ?>
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
            Order
            <small>List</small>
			<?php 
			if($_SESSION['msg']){echo $_SESSION['msg']; }
			if($_SESSION['msgs']){echo $_SESSION['msgs']; }
			?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         
            <li class="active">Order List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Order List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				 <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
        <th>#</th>
        <th>Ordered </br>By</th>

        <th>Pic</th>
        <th>Product Name</th>
		<th>Unit</br>Price</th>
		<th>Unit</br>Point</th>
		<th>Quantity</th>
		<th>Total</br>Price</th>
		<th>Total</br>Point</th>
		<th>Stock</th>
		<th>Order Date</th>
        <th>Status</th>

		

    </tr>
    </thead>
	<tbody>
			<?php 
				$n=1;
				if($agentid!=''){
					$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `log_id`='$agentid'"));
					$myid=$del->user_id;
					}else{
					$myid=$_SESSION['DealerLogId'];	
					}
				$query=$mysqli->query("SELECT * FROM `prod_req` where `rec_id`='".$myid."' order by serial desc ");
				while($product=mysqli_fetch_object($query)){ 
			?>
    
    <tr <?php if($date==$product->date){ ?> bgcolor="#e6f2ff" <?php } ?> >
        
		
        <td><?php echo $n++; ?></td>
        <td><?php 
		$mem=mysqli_fetch_object($mysqli->query("SELECT * FROM member where `user_id`='$product->send_id' "));
		echo $mem->log_id; ?></td> 
       
        <td align="center"><img height="50" src="../../product/<?php echo $product->img1; ?>" alt=""></td>
        <td><?php echo $product->name; ?></td>

		<td><?php  echo $product->price; ?></td>
			<td><?php  echo $product->rp; ?></td>
			<td><?php echo $product->qty; ?></td> 
			<td><?php echo $tot=$product->qty*$product->price; ?></td> 
			<td><?php echo $tot1=$product->qty*$product->rp; ?></td> 
			<td><?php 
	if($del->type==5){
		$chkstk=mysqli_num_rows($mysqli->query("select * from `stock` where `rec_id`='$myid' and `p_id`='".$product->p_id."' "));

		if($chkstk==0){echo "<span class='label label-danger'>Stock Out</span>";}
		 	$stockchk=mysqli_fetch_object($mysqli->query("select `qty` from `stock` where `rec_id`='$myid' and `p_id`='".$product->p_id."' "));
		 	$q2=$mysqli->query("select `qty` from `stock` where `rec_id`='$myid' and `p_id`='".$product->p_id."' ");
			while($stock=mysqli_fetch_object($q2)){
			
			if($stock->qty>0){echo $stock->qty;}
			else{ echo "<span class='label label-danger'>Stock Out</span>";}
			
			 }
	}
if($del->type==6){
	$chkstk=mysqli_num_rows($mysqli->query("select * from `product` where `user_id`='$myid' and `serial`='".$product->p_id."' "));	
	if($chkstk==0){echo "<span class='label label-danger'>Stock Out</span>";}
			 $stockchk=mysqli_fetch_object($mysqli->query("select `stock` from `product` where `user_id`='$myid' and `serial`='".$product->p_id."' "));
		 	$q2=$mysqli->query("select `stock` from `product` where `user_id`='$myid' and `serial`='".$product->p_id."' ");
			while($stock=mysqli_fetch_object($q2)){
			
			if($stock->stock>0){echo $stock->stock;}
			else{ echo "<span class='label label-danger'>Stock Out</span>";}  
			
			}
}	
			 
		?></td>
		<td><?php  echo $product->date;
		$invoice=mysqli_fetch_object($mysqli->query("SELECT * FROM `invoice` WHERE `agent_id`='$myid' and 'product_id'='$product->p_id' "));
		?></td>
		<td>
		<?php if($product->chk==0){ ?>
		<?php $memId=$_SESSION["DealerLogId"]; 
			  $del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$memId' "));
			if($del->type==5 && $chkstk==1 && $stockchk->qty>0){ ?> 
		<a href='prod_order_review.php?sn=<?php echo $product->serial ?>'><span class='btn btn-warning'>Review</span></a>

		<?php }else{ ?>
		<span class='btn btn-warning'>Ok</span>

		
		<?php } }else{ ?>
			<span class='label label-success'>Ok</span>
		<?php } ?>
		</td>

    </tr>

    
       
					<?php } ?>	
            

          
             
                    </tbody>
                    <tfoot>
                        <tr>
        
        <th>Order No.</th>
        <th>Ordered By</th>

        <th>Pic</th>
        <th>Product Name</th>
		<th>Unit</br>Price</th>
		<th>Unit</br>Point</th>
		<th>Quantity</th>
		<th>Total</br>Price</th>
		<th>Total</br>Point</th>
		<th>Stock</th>
		<th>Order Date</th>
        <th>Status</th>

		

    </tr>
                    </tfoot>
                  </table>
				
				<!--
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
        <th>#</th>
        <th>Ordered </br>By</th>

        <th>Pic</th>
        <th>Product Name</th>
		<th>Unit</br>Price</th>
		<th>Unit</br>Point</th>
		<th>Quantity</th>
		<th>Total</br>Price</th>
		<th>Total</br>Point</th>
		<th>Stock</th>
		<th>Order Date</th>
        <th>Status</th>

		

    </tr>
    </thead>
	<tbody>
			<?php 
				
				if($agentid!=''){
					$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `log_id`='$agentid'"));
					$myid=$del->user_id;
					}else{
					$myid=$_SESSION['DealerLogId'];	
					}
				$query=$mysqli->query("SELECT * FROM `order` where `agent_id`='".$myid."' and chk=1 order by serial desc ");
				while($product=mysqli_fetch_object($query)){ 
			?>
    
    <tr <?php if($date==$product->date){ ?> bgcolor="#e6f2ff" <?php } ?> >
        
		
        <td><?php echo $product->serial; ?></td>
        <td><?php 
		$mem=mysqli_fetch_object($mysqli->query("SELECT * FROM member where `user_id`='$product->user_id' "));
		echo $mem->log_id; ?></td>
       
        <td align="center"><img height="50" src="../../product/<?php echo $product->img1; ?>" alt=""></td>
        <td><?php echo $product->name; ?></td>

		<td><?php  echo $product->price; ?></td>
			<td><?php  echo $product->rp; ?></td>
			<td><?php echo $product->qty; ?></td> 
			<td><?php echo $tot=$product->qty*$product->price; ?></td> 
			<td><?php echo $tot1=$product->qty*$product->rp; ?></td> 
			<td><?php 
		$chkstk=mysqli_num_rows($mysqli->query("select * from `stock` where `rec_id`='$myid' and `p_id`='".$product->product_id."' "));
		if($chkstk==0){echo "<span class='label label-danger'>Stock Out</span>";}
		 	$stockchk=mysqli_fetch_object($mysqli->query("select `qty` from `stock` where `rec_id`='$myid' and `p_id`='".$product->product_id."' "));
		 	$q2=$mysqli->query("select `qty` from `stock` where `rec_id`='$myid' and `p_id`='".$product->product_id."' ");
			while($stock=mysqli_fetch_object($q2)){
			
			if($stock->qty>0){echo $stock->qty;}
			else{ echo "<span class='label label-danger'>Stock Out</span>";}
			
			 } 
			 
		?></td>
		<td><?php  echo $product->date; ?><br><?php  echo $product->otime; ?></td>
		<td>
		
		<?php 

		if($product->chk==1){ ?>
		<?php $memId=$_SESSION["DealerLogId"]; 
			  $del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$memId' "));
			if($del->type==5 && $chkstk==1 && $stockchk->qty>0){ ?> 
		<span class='label label-warning'><a href='prod_order_review.php?sn=<?php echo $product->serial ?>'>Review</a></span>
		<?php }else{ ?>
		<span class='label label-warning'>Review</span>
		<?php } ?>
		<?php }else{ ?>
			<span class='label label-success'>Delivered</span>
		<?php } ?>
		</td>

    </tr>

    
       
					<?php } ?>	
            

          
             
                    </tbody>
                    <tfoot>
                        <tr>
        
        <th>Order No.</th>
        <th>Ordered By</th>

        <th>Pic</th>
        <th>Product Name</th>
		<th>Unit</br>Price</th>
		<th>Unit</br>Point</th>
		<th>Quantity</th>
		<th>Total</br>Price</th>
		<th>Total</br>Point</th>
		<th>Stock</th>
		<th>Order Date</th>
        <th>Status</th>

		

    </tr>
                    </tfoot>
                  </table>
				  -->
				  
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
