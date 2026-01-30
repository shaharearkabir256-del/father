<?php require('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Products</title>
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
  <body class="skin-<?php echo $admin_panel_color ?>">
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
            Products Management
            <small>Products</small>
			<?php 	if(isset($_SESSION['msg'])){ echo "<font color='red'>".$_SESSION['msg']."</font>";}
					if(isset($_SESSION['msgs'])){ echo "<font color='green'>".$_SESSION['msgs']."</font>";}
			?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Product Management</li>
            <li class="active">Products</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
		<div class="row">
        <!-- left column -->
       
		  <div class="col-md-12">
		  
		  <div class="box box-danger">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product | <a href="product_add.php"> Add New Product</a></h3>
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive">
                   <table  id="example1" class="table  table-bordered ">
    <thead>
	
    <tr>
        <th>Picture</th>
		<th>Name</th>
		<th>Merchant User ID</th>
		
		
		
		<th>Point</th>
		<th>Stock</th>
		<th>P.Price</th>
		<th>S.Price</th>
		<th>Offer</th>
	
		<th>D.Price</th>
		<th>Cost</th>
		<th>Profit</th>
       
		<th>Status</th>
        <th>Delete</th>
    </tr>
    </thead>
	    <tbody>
	       <?php 
			  $query=$mysqli->query("SELECT * FROM product ORDER BY serial DESC");
			  while($product=mysqli_fetch_object($query)){ 
			  $dealer=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `dealer` where `user_id`='$product->user_id' "));
		   ?>

    <tr>
        <td><img  class="img-thumbnail" width="50px" src="../product/<?php echo $product->img1; ?>" alt=""></td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $dealer->log_id; ?></td>
		
		
		
		<td class="center"  width="">
		<form action="prod_rp_up_act.php" method="POST">
				<input type="number" hidden name="serial" value="<?php echo $product->serial; ?>"/>
				<input type="number"  width="" name="pv"  class="form-control" value="<?php echo $product->rp; ?>" /> 
				<input hidden name="pvval" type="submit" />
				</form>	
		</td>

				
	
		
		<td class="center" width="">
			<form action="product_update.php" method="POST">
				<input type="number" style="display: none;" name="serial" value="<?php echo $product->serial; ?>"/>
				<input type="number"  width="" name="stock"  class="form-control" value="<?php echo $product->stock; ?>" /> 
				<input style="display:none;" name="stockval" type="submit" />
				</form>	
        </td>
		<td><?php echo $product->price.$bdt; ?></td>
		<td><?php echo $product->sale_price.$bdt; ?></td>
		
		<td class="center"  width="">
		<?php //if($product->offer==1){echo $product->offer_value."%";} ?>
		
		<form action="pro_of_up_act.php" method="POST">
		<select class="form-control"   width="" name="offer" >
		<option value="1" <?php if($product->offer==1){echo "selected";} ?> >Yes</option>
		<option value="0" <?php if($product->offer==0){echo "selected";} ?> >No</option>
		</select>
				<input type="number" hidden name="prods" value="<?php echo $product->serial; ?>"/>
				<input type="number"  width="10%" name="offv"  class="form-control" value="<?php echo $product->offer_value; ?>" /> 
				<input hidden name="offerval" type="submit" />
			</form>
        </td>				
		<td><?php echo $product->discount_price.$bdt; ?></td>
       <td><?php echo $product->cost.$bdt; ?></td>
		<td><?php echo $product->profit.$bdt; ?></td>
		<td class="center">
		<a href="product_chk.php?active=<?php echo $product->chk; ?>&prodser=<?php echo $product->serial; ?>"><?php if($product->chk==1){echo"<span class='label-success label label-default'>Active</span>";}else{echo"<span class='label-danger label label-default'>Inactive</span>";} ?></a>
            
        </td>
		<td class="center" width="">
			<a class="label label-warning" href="product_del.php?id=<?php echo $product->serial; ?>&chk=<?php echo $product->chk; ?>">Delete</a>
        </td>
    </tr>
  
						<?php } ?>

                        </tbody>
                    </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>
          <!-- /.box -->
		  
		   
		  
		  </div>
		  </div>
		
         
		   

          <!-- Default box -->
  

        </section><!-- /.content -->
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
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<?php 	unset($_SESSION['msg']);
		unset($_SESSION['msgs']);
?>
  </body>
</html>
