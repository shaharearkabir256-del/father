<?php
	session_start();
	if( $_SESSION['AdminUserId'] == '')
	{ $msg="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		
		$UpCatId=$_GET['upcatid'];
		if($UpCatId!=''){
		$upcat=mysqli_fetch_object($mysqli->query("select * from `cat` where `cat_id`='".$UpCatId."'"));
	}
	
	$location="cat.php";
	if(isset($_GET['delete'])){
		$delete=$_GET['delete'];		
		$mysqli->query("DELETE FROM `cat` WHERE `cat_id`='".$delete."' LIMIT 1");
		$_SESSION['msg']="Deleted Successfully";
		header("Location: $location");
		exit();
	}
	
	if(isset($_GET['scat01'])){
		$deletes=$_GET['scat01'];		
		$mysqli->query("DELETE FROM `scat` WHERE `scat_id`='".$deletes."' LIMIT 1");
		$_SESSION['msg']="Deleted Successfully";
		header("Location: $location");
		exit();
	}
	if(isset($_GET['brand01'])){
		$del=$_GET['brand01'];		
		$mysqli->query("DELETE FROM `brand` WHERE `brand_id`='".$del."' LIMIT 1");
		$_SESSION['msg']="Deleted Successfully";
		header("Location: $location");
		exit();
	}

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Page</title>
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
		   <?php
				if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
				
			?>
		  
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
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
                  <h3 class="box-title">Page</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				
				<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="margin-top:10px">
												<!--Cat Update-->
	<?php if($UpCatId!=''){ ?>
			<tr>
			<td><?php echo $UpCatId;?></td>
			<td align="center">
			<form class="form-horizontal" action="cat_up.php" method="POST">
		<input type="hidden" class="form-control" name="cat_id"  value="<?php echo $UpCatId;?>" id="exampleInputCategory" placeholder="cat id" />
				</td>
				
				<td><input type="text" class="form-control" name="cat" value="<?php echo $upcat->cat;?>" id="exampleInputCategory" placeholder="Category" required /></td>
				<td>
				<button type="submit" name="update_cat" class="btn btn-primary">
				<i class="glyphicon glyphicon-repeat"></i></button>
				</form>
				</td>
			</tr>
	<?php } ?>
	
	       <?php 	$catbgc="style='background-color:#FFFACD;'";
					$scatbgc="style='background-color:#FFF8DC;'";
					$brandbgc="style='background-color:#FFF5EE;'";
					$nbgc="style='background-color:#FFFFE0;'";
					//$addbgc="style='background-color:#FFF8DC;'";
				$query1=$mysqli->query("SELECT * FROM `cat` ORDER BY cat_id DESC");
				$chk1=mysqli_num_rows($query1);
				if($chk1!=''){echo "
					
					   <thead>
						<tr style='background-color:#FFDEAD;'>
						<th>#</th>
						<th></th>
						<th>Category</th>
						<th>Status</th>
						</tr>
						</thead>
					<tbody>
				";}
				$n=1;
				while($cat=mysqli_fetch_object($query1)){

		 ?>
													
    <tr>
		<td <?php echo $nbgc; ?>><?php echo $n++; ?></td> 
		<td align="center">
		</td>
        <td <?php echo $catbgc; ?>><?php echo $cat->cat; ?>
		&nbsp; &nbsp;<a href="?delete=<?php echo $cat->cat_id; ?>"><font color="red"><i class="glyphicon glyphicon-remove"></i></font></a>
		&nbsp; &nbsp;<a href="cat.php?upcatid=<?php echo $cat->cat_id; ?>"><i class="glyphicon glyphicon-repeat"></i></a>
		</td>
		<td><a href="cat_chk.php?catser=<?php echo $cat->cat_id; ?>&chk=<?php echo $cat->chk; ?>"><?php if($cat->chk==1){echo "<apan class='label label-success'>Active</span>";}else{echo"<apan class='label label-danger'>Inactive</span>";} ?></a></td>
		
		</tr>
		
			
			
		
		<?php } ?>
												<!--Cat Add-->
			<tr <?php echo $addbgc; ?>>
				<td>
					
				</td>
				<td>
				<form class="form-horizontal" action="cat_act.php" method="POST" enctype="multipart/form-data">
				
				</td>
				<td>
				<input type="text" class="form-control" name="cat" id="exampleInputCategory" placeholder="Category" required /></td>
				<td>
				
				<button type="submit" name="cat_submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></button>
				
				 
				
				
				</form></td>
				</tr>
	
	   </tbody>

	 <?php 		
				$n=1;
				$query2=$mysqli->query("SELECT * FROM `scat` ORDER BY scat_id DESC");
				$chk2=mysqli_num_rows($query2);
				if($chk2!=''){echo "
					   <thead>
						 <tr style='background-color:#FFE4C4;'>
						<th>#</th>
						  <th></th>
						<th></th>
						<th>Sub Category</th>
					   
				   
					</tr>
					</thead>
					 <tbody>
				";}
				while($scat=mysqli_fetch_object($query2)){
		 ?>
	   <tr>
		<td <?php echo $nbgc; ?>><?php echo $n++; ?></td>
		<td></td>
		<td <?php echo $catbgc; ?>><?php $query22=$mysqli->query("SELECT * FROM `cat` where `cat_id`='".$scat->cat_id."'");
		
		 while($cat2=mysqli_fetch_object($query22)){echo $cat2->cat;}  ?></td>
        <td <?php echo $scatbgc; ?>><?php echo $scat->scat; ?>&nbsp; &nbsp;<a href="?scat01=<?php echo $scat->scat_id; ?>"><font color="red"><i class="glyphicon glyphicon-remove"></i></font></a>
		</td>
		
		
		</tr> 
		<?php } ?> 
          <tr <?php echo $addbgc; ?>> <form class="form-horizontal" action="cat_sub_act.php" method="POST" enctype="multipart/form-data"> 
			<td></td>		  
			<td></td>		  
			<td>
			<select name="cat_id" size="" class="form-control">
								<option value="select">Select a Category</option>
									<?php
										$sql1=$mysqli->query("SELECT * FROM `cat` ");		
										while($res1=mysqli_fetch_object($sql1)){	?>
										<option value="<?php echo $res1->cat_id;?>"> <?php echo $res1->cat;?></option>
									<?php } ?> 
							</select>
			</td>		  
			<td>
			<input type="text" class="form-control"  name="sub_cat_name" id="exampleInputsubCategory" placeholder="Sub Category">
			<a></a>
			</td>
				<td>
				<button type="Submit" name="sub_add" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></button>
				</td>
          </tr> </form>        
	
	 </tbody>

		 <?php 
				$n=1;
				$query3=$mysqli->query("SELECT * FROM `brand` ORDER BY brand_id DESC");
				$chk3=mysqli_num_rows($query3);
				if($chk3!=''){echo "
					 	   <thead>
							 <tr style='background-color:#FFE4E1;'>
							<th>#</th>
							<th></th>
							<th></th>
							<th></th>
							<th>Brand</th>
       
   
							</tr>
							</thead>
							 <tbody>
				";}
				while($brand=mysqli_fetch_object($query3)){
		 ?>
	   <tr>
		<td <?php echo $nbgc; ?>><?php echo $n++; ?></td>
		<td ></td>
		<td <?php echo $catbgc; ?>><?php $query33=$mysqli->query("SELECT * FROM `cat` where `cat_id`='".$brand->cat_id."' "); 
		 while($cat33=mysqli_fetch_object($query33)){echo $cat33->cat; } ?></td>
		<td <?php echo $scatbgc; ?>><?php $query333=$mysqli->query("SELECT * FROM `scat` where `scat_id`='".$brand->scat_id."' "); 
		 while($scat333=mysqli_fetch_object($query333)){echo $scat333->scat; } ?></td>
        <td <?php echo $brandbgc; ?>><?php echo $brand->brand; ?>&nbsp; &nbsp;<a href="?brand01=<?php echo $brand->brand_id; ?>"><font color="red"><i class="glyphicon glyphicon-remove"></i></font></a></td>
		
		</tr>
		<?php } ?>
          <tr <?php echo $addbgc; ?>><form class="form-horizontal" action="cat_brand_act.php" method="POST">
			<td></td>		  
			<td></td>		  
			<td>
			<select name="cat_id" size="" id="category" class="form-control">
									<option value="select" >Select a Category</option>
									<?php
										$sql2 = $mysqli->query("SELECT * FROM `cat` ");		
										while($res2=mysqli_fetch_object($sql2)){	?>
										<option value="<?php echo $res2->cat_id;?>"> <?php echo $res2->cat;?></option>
									<?php } ?> 
							</select>
			</td>		  
			<td>
			 <div class="col-sm-12 " id="usb" style="display:none;">
							
								  <select name="sub_cat_id" size="" id="sub_category" class="form-control">
								           <option>Select a Sub-Category</option>
			 
										   
								  </select>
						   </div>
			</td>		  
			<td><input type="text" class="form-control" id="usb" name="brand" id="exampleInputCategory" placeholder="Brand Name"/></td>		  
			<td> <button type="Submit" name="brand_add" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></button></td>		  
          </tr>         
	
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
<?php } ?>