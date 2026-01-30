<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
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
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
	<div class="row">
        <!-- left column -->
       
		<div class="col-md-6">
		  
		 <div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add New Product</h3>
                </div><!-- /.box-header -->
                <div class="box-body  table-responsive">
				<!-- Main Content Area -->
				
				<form class="form-horizontal" action="product_add_act.php" method="POST" enctype="multipart/form-data" style="margin-top:20px;">

 
			<div class="form-group">
				<h5 style="margin: 0; color: red; text-align: center;"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}?></h5>
				<h5 style="margin: 0; color: green; text-align: center;"><?php if(isset($_SESSION['msgs'])){echo $_SESSION['msgs'];}?></h5>
			</div> 

	 <div class="form-group">
		<label class="form-label" for="exampleInputBrand" style="margin-left:15px;">Category</label> 
 
		<select name="cat_id" size="" id="category" class="form-control">
			<option>Select Category</option>
			<?php
               	$sql2 = $mysqli->query("SELECT * FROM `cat` ");		
				while($res=mysqli_fetch_object($sql2)){	?>
				<option value="<?php echo $res->cat_id;?>"> <?php echo $res->cat;?></option>
			<?php } ?> 
			</select>
			</div> 
		<div id="usb" style="display:none;">
	<div class="form-group">	

      <label class="form-label" for="exampleInputBrand">Sub Category</label>
     
				<select name="scat_id" size="" id="sub_category" class="form-control">
					<option>Select a Sub-Category</option>
				</select>
		
    </div>
    </div>
	
   	<div  id="usb3"  style="display:none;">
	<div class="form-group">	
       <label class="form-label" for="exampleInputBrand" style="margin-left:15px;">Brand</label>
	 
       
	   <select name="brandID"  class="form-control" id="brand">
			<option>Select a Brand</option>
			</select>
    </div>
    </div>
	
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
		<td><input type="number" class="form-control" name="oPrice" id="exampleInputPrice" placeholder="Price(Purchase)"></td>
	</tr>
	
	<tr>
		<td><label for="exampleInputPrice"style="margin-left:15px;">Sale Price</label><font color="red">*</font></td>	
		<td><input type="number" class="form-control" name="sPrice" id="exampleInputPrice" placeholder="Price(sales)"></td>	
	</tr>
	<tr>
		<td><label for="exampleInputPrice"style="margin-left:15px;">Service Cost</label><font color="red">*</font></td>	
		<td><input type="number" class="form-control" name="sCost" id="exampleInputPrice" placeholder="Cost(Service)"></td>	
	</tr>
	

	<tr>
		<td><label for="exampleInputAvailability"style="margin-left:15px;">Stock</label><font color="red">*</font></td>
		<td> <input type="number" class="form-control" name="stock" id="exampleInputAvailability" placeholder="Stock"></td>
	</tr>
	   
       <label for="exampleInputBrand" style="margin-left:15px;">Offer</label>

	  <label class="radio-inline">
				 <input type="radio" name="offer" value="1"> Yes</label>
					<label class="radio-inline">
				 <input type="radio" name="offer" checked value="0" /> NO </label>
	  <input type="text" class="form-control" name="offerV" placeholder="Enter offer %">
	
	<label for="exampleInputCondition"style="margin-left:15px;"></label>
	

	

                              
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

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
<script>
	$(document).ready(function(){
		$("#category").on('change', function(){
			var cat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "cat_sub_ex.php?cat_id=sub_cat&ref_id="+cat_id,             
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
				url: "brand_ex.php?scat_id=brand&refb_id="+scat_id,             
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
<?php } ?>