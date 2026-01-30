<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Commission Chart</title>
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
            Commission 
            <small> Chart</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Commission</a></li>
            <li class="active">Commission Chart</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
      
	   <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Commission Chart</h3>
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
		<th>Receive By</th>
		<th>Commission</th>
		
       

		

    </tr>
    </thead>
	<tbody>
			<?php $n=1;
			$total=0;
		$tot=0;
					$myid=$_SESSION['DealerLogId'];	
				$delrec=mysqli_fetch_object($mysqli->query("SELECT `type` FROM `dealer` where `user_id`='".$myid."'"));
				$com=mysqli_fetch_object($mysqli->query("SELECT sum(qty)as qtycom,sum(division)as divcom,sum(district)as discom,sum(upozela)as upcom,sum(dunion)as uncom,sum(ward)as wardcom,sum(dsd)as dsdcom FROM `prod_req` where `send_id`='$myid' and `chk`=1 "));
				$query=$mysqli->query("SELECT * FROM `prod_req` where `send_id`='$myid' order by serial desc ");
				while($product=mysqli_fetch_object($query)){ 
			?>
    
    <tr>
        <td><?php echo $n++; ?></td>
        <td><img height="50" src="../../product/<?php echo $product->img1; ?>" alt=""></td>
        <td><?php echo $product->name; ?></td>
		<td><?php  echo $product->price.$tk; ?></td>
		<td><?php  echo $product->rp; ?></td>	
		<td><?php echo $product->qty; ?></td>
		<td><?php
		$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$product->send_id' "));
		if($del->log_id){echo $del->log_id;}else{echo'Admin';} ?></td>
		<td><?php  
		
		if($delrec->type==1){
			echo $comdiv=$product->division*$product->qty;
			$total=$total+$comdiv;} 
		elseif($delrec->type==2){
			echo $comdis=$product->district*$product->qty; 
			$total=$total+$comdis;}
		elseif($delrec->type==3){
			echo $comup=$product->upozela*$product->qty;
			$total=$total+$comup;}
		elseif($delrec->type==4){
			echo $comwu=$product->dunion*$product->qty; 
			$total=$total+$comwu;}
		elseif($delrec->type==5){
			echo "Royalty: ".$comagn=$product->ward*$product->qty."<br>"; 
			echo "    DSD: ".$comdsd=$product->dsd*$product->qty; 
			$total=$total+$comagn;
			$tot=$tot+$comdsd;}
		else{echo'0.00';}
		?>
		</td>			
		
		

    </tr>
    
       
					<?php } ?>	
            

             
             
                    </tbody>
                    <tfoot>
                        <tr>
        <th colspan="6"></th>
		 <th>Total: </th>
        <th><?php
		if($delrec->type==1){
			echo $total;} 
		elseif($delrec->type==2){
			echo $total;}
		elseif($delrec->type==3){
			echo $total;}
		elseif($delrec->type==4){
			echo $total;}
		elseif($delrec->type==5){
			 echo "Royality :".$total;
			 echo '<br> DSD:'.$tot;
			 }
		else{echo'0.00';}
		?></th>

		

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
