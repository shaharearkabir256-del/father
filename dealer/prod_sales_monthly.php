<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Stock Out</title>
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
            <li class="active">Stock Out</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
		     <?php 
              	$id=$_GET['deluserid'];						
							$sd=$_GET['start'];
							if($sd!=''){
							$mds=strtotime($sd);
							$start=date('d-M-Y',$mds);
							}
							$ed=$_GET['end'];
							if($ed!=''){
							$mde=strtotime($ed);
							$end=date('d-M-Y',$mde);
							}
              ?>
            <div class="col-md-9">
               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">  Stock Out List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="<?php if(($sd!='')||($ed!='')){}else{echo "example1";} ?>" class="table table-bordered table-hover">
                    <thead>
                      <tr>
        <th>#</th>
        <th>Pic</th>
        <th>Product Name</th>
		<th>Price</th>	
		<th>Point</th>
		<th>Sales To</th>
        <th>Qty</th>
        <th>Date</th>

		

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
if(($sd!='')||($ed!='')){ $sql=" and `date` between '$start' and '$end' "; }
$totalsal=mysqli_fetch_object($mysqli->query("SELECT sum(price)as tp, sum(rp)as tr, sum(qty)as tq FROM `sales` where `seller_id`='$myid' and `chk`='1' $sql "));
																				
		$query=$mysqli->query("SELECT * FROM `sales`  where `seller_id`='$myid' and `chk`='1' $sql ");
				while($sal=mysqli_fetch_object($query)){ 
			?>
    
    <tr>
        <td><?php echo $n++; ?></td>
   
       
        <td><img height="50" src="../../product/<?php echo $sal->img1; ?>" alt=""></td>
        <td><?php echo $sal->name; ?></td>

		<td><?php echo $sal->price.$tk; ?></td> 	<td><?php  echo $sal->rp; ?></td>
		
							
		<td><?php
		$mem=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='$sal->user_id' "));
		echo $mem->log_id; ?></td>
		<td><?php echo $sal->qty; ?></td>
		<td><?php echo $sal->date; ?></td>

    </tr>
    
       
					<?php } ?>	
            

             
             
                    </tbody>
                    <tfoot>
                        <tr>
        <th></th>
        <th></th>
        <th></th>
		<th>Total Price: <br><?php  echo $totalsal->tp.$tk; ?></th>	
		<th>Total Point: <br><?php  echo $totalsal->tr; ?></th>
		<th></th>
        <th>Total Qty: <br><?php  echo $totalsal->tq; ?></th>
        <th></th>
    </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			  <div class="col-md-3">
          <!-- general form elements -->
		  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                  
                <!--<div class="form-group">
                  <label for="exampleInputEmail1">Dealer Name</label>
                  <select name="deluserid" class="form-control">
                  	<?php 	
							//$q =  $mysqli->query("SELECT * FROM `dealer`  where `chk`=1  ORDER BY `name` asc");
						//	while($del= mysqli_fetch_object($q))  {					?>
					    <option value="<?php // echo $del->user_id; ?>"> <?php // echo $del->name; ?>(<?php // if($del->type==1){echo 'Union';}elseif($del->type==2){echo 'Upazila';}elseif($del->type==3){echo 'District';}else{echo 'Not Set';} ?>)</option>
													
                 <?php // } ?>
                  </select>
                </div>-->
                <form role="form" action="">
				<div class="form-group">
                  <label for="exampleInputEmail1">Start Date  </label>
                  <input type="date" name="start" class="form-control" <?php if(($sd!='')&&($ed!='')){ ?> value="<?php echo $sd ?>"<?php } ?>id="exampleInputEmail1" placeholder="Enter Package Quantity">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">End Date   </label>
                  <input type="date" name="end" class="form-control" <?php if(($sd!='')&&($ed!='')){ ?> value="<?php echo $ed ?>"<?php } ?> id="exampleInputEmail1" placeholder="Enter Turkey Age">
                </div>
			  
			 <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                 <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.box-body -->
            </form>
          </div>
			
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
