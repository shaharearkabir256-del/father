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
           <a href="merchant_prod_add.php"><i class="fa fa-plus"></i> Add New Product</a>
            <small> </small>
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
                  <h3 class="box-title"><?php echo $pageName; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                 <form class="form-horizontal" action="merchant_prod_add_act.php" method="POST" enctype="multipart/form-data" style="margin-top:20px;">
 <table class="table table-bordered table-responsive">
 
			<div class="form-group">
				<h5 style="margin: 0; color: red; text-align: center;"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}?></h5>
				<h5 style="margin: 0; color: green; text-align: center;"><?php if(isset($_SESSION['msgs'])){echo $_SESSION['msgs'];}?></h5>
			</div> 
    <tr>
     <td> 
		<label for="exampleInputBrand" style="margin-left:15px;">Category</label> 
	 </td>
	 <td>  
		<select name="cat_id" size="" id="category" class="form-control">
			<option>Select Category</option>
			<?php
               	$sql2 = $mysqli->query("SELECT * FROM `cat` ");		
				while($res=mysqli_fetch_object($sql2)){	?>
				<option value="<?php echo $res->cat_id;?>"> <?php echo $res->cat;?></option>
			<?php } ?> 
			</select>
			
		</td>
		</tr>
		
 <tr  id="usb" style="display:none;">
     <td> <label for="exampleInputBrand">Sub Category</label></td>
        <td> 
				<select name="scat_id" size="" id="sub_category" class="form-control">
					<option>Select a Sub-Category</option>
				</select>
		</td>
    </tr>
	
   	<tr  id="usb3"  style="display:none;">
       <td>  <label for="exampleInputBrand" style="margin-left:15px;">Brand</label></td>
	 
       <td>
	   <select name="brandID"  class="form-control" id="brand">
			<option>Select a Brand</option>
    </tr>
	
	<tr>
       <td> <label for="exampleInputmodel" style="margin-left:15px;">Name</label><font color="red">*</font></td>
		<td>
			<input type="text" class="form-control" name="Name" id="exampleInputEmail1" placeholder="Product/Service Name">
	   </td>
    </tr>
	
	<tr>
       <td> <label for="exampleInputmodel" style="margin-left:15px;">Model No</label></td>
		<td>
			<input type="text" class="form-control" name="model" id="exampleInputEmail1" placeholder="Model No">
	   </td>
    </tr>
	

	<tr>
      <td>
		<label for="exampleInputEmail1" style="margin-left:15px;">Original Image</label><font color="red">*</font></td>
       <td>
	   <input class="control-label" type="file" name="img1" id="exampleInputfile" placeholder="file" >
	   
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="margin-top:6px">
			   Add More Images
		</button>
			<div class="collapse" id="collapseExample">
			  <div class="well">
				
						  <div class="form-group">
						   <div class="col-sm-12">
							<label for="exampleInputEmail1" style="margin-left:15px;">Original Image</label>
							<input type="file" class="control-label" name="img2" id="exampleInputfile" placeholder="file">
						   </div>
						  </div>
						 
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" style="margin-top:15px;">
					    Add More Images
						</button>
				
			  </div>
			</div>
			
			<div class="collapse" id="collapseExample2">
			  <div class="well">
					<div class="form-group">
					 <div class="col-sm-12">
					<label for="exampleInputEmail1" style="margin-left:15px;">Original Image</label>
					<input type="file" class="control-label" name="img3" id="exampleInputfile" placeholder="file" >
					 </div>
					</div>
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample" style="margin-top:6px;">
					    Add More Images
					</button>
				
			  </div>
			</div>
			<div class="collapse" id="collapseExample3">
			  <div class="well">
				
					
						  <div class="form-group">
						   <div class="col-sm-12">
							<label for="exampleInputEmail1" style="margin-left:15px;">Original Image</label>
							<input type="file" class="control-label" name="img4" id="exampleInputfile" placeholder="file">
						   </div>
						  </div>
						 <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
					   Hide
					</button>
				
			  </div>
			</div>
	   </td>
    </tr>
	
	<tr>
      <td> <label for="exampleInputBrand" style="margin-left:15px;">Short Description</label><font color="red">*</font></td>
       <td>
	   <textarea type="text" class="form-control" placeholder="Text here" rows="3" name="info" ></textarea>
	   </td>
    </tr>
    
	<tr> 
		<td> <label for="exampleInputPrice" style="margin-left:15px;">Purchase Price</label> <font color="red">*</font></td>
		<td><input type="float" class="form-control" name="oPrice" id="exampleInputPrice" placeholder="Price(Purchase)"></td>
	</tr>
	
	<tr>
		<td><label for="exampleInputPrice"style="margin-left:15px;">Sale Price</label><font color="red">*</font></td>	
		<td><input type="float" class="form-control" name="sPrice" id="exampleInputPrice" placeholder="Price(sales)"></td>	
	</tr>
	<tr>
		<td><label for="exampleInputPrice"style="margin-left:15px;">Service Cost</label><font color="red">*</font></td>	
		<td><input type="float" class="form-control" name="sCost" id="exampleInputPrice" placeholder="Cost(Service)"></td>	
	</tr>
	

	<tr>
		<td><label for="exampleInputAvailability"style="margin-left:15px;">Stock</label><font color="red">*</font></td>
		<td> <input type="number" class="form-control" name="stock" id="exampleInputAvailability" placeholder="Stock"></td>
	</tr>
	    <tr>
      <td> <label for="exampleInputBrand" style="margin-left:15px;">Offer</label></td>
      <td> 
	  <label class="radio-inline">
				 <input type="radio" name="offer" value="1"> Yes</label>
					<label class="radio-inline">
				 <input type="radio" name="offer" checked value="0" /> NO </label>
	  <input type="text" class="form-control" name="offerV" placeholder="Enter offer %">
			</td>
    </tr>
	<tr>
		<td>  <label for="exampleInputCondition"style="margin-left:15px;">Placement</label></td>
		<td> <select name="place">
		<option value="1">1. The new version of fashion style</option>
		<option value="2">2. Deal of the week </option>
		<option value="3">3. Hot best sellers</option>
		<option value="4">4. Easy basics on Fashion</option>
		<option value="6">6. Recommended For You!(3)</option>
		
		</select> </td>
	</tr>
	
    </table>
                              
	 <div class="row">
			<div class="col-md-8">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-info" style="margin-bottom:10px">
					Submit
				</button>
			</div>
		</div>   
</form>
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
<script>
	$(document).ready(function(){
		$("#category").on('change', function(){
			var cat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "../admin/cat_sub_ex.php?cat_id=sub_cat&ref_id="+cat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#sub_category").html(response);
					//console.log(response);
				}
			});
		$("#usb").show(300);
		});
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#sub_category").on('change', function(){
			var scat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "../admin/brand_ex.php?scat_id=brand&refb_id="+scat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#brand").html(response);
					//console.log(response);
				}
			});
		$("#usb3").show(300);
		});
		
	});
</script>