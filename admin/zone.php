<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$upCatId=$_GET['upcatid'];  
		if($upCatId!=''){
		$upcat=mysqli_fetch_object($mysqli->query("select * from `zone` where `zone_id`='".$upCatId."'"));
	}
	
	
	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Zone</title>
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
            Zone
            <small>Add</small>
			<?php 	if($_SESSION['msg']){ echo $_SESSION['msg'];}
					if($_SESSION['msgs']){ echo $_SESSION['msgs'];}
			?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Zone</li>
            <li class="active">Add</li>
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
                  <h3 class="box-title">Zone</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="margin-top:10px">
												<!--Zone Update-->
	<?php if($upCatId!=''){ ?>
			<tr>
			<td><?php  $upCatId;?></td>
			<td align="center">
			<form class="form-horizontal" action="zone_up.php" method="POST">
		<input type="hidden" class="form-control" name="cat_id"  value="<?php echo $upCatId;?>" id="exampleInputCategory" placeholder="zone id" />
				</td>
				
				<td><input type="text" class="form-control" name="cat" value="<?php echo $upcat->zone;?>" id="exampleInputCategory" placeholder="Category" required /></td>
				<td>
				<button type="submit" name="update_cat" class="btn btn-primary">
				<i class="glyphicon glyphicon-repeat"></i></button>
				</form>
				</td>
			</tr>
	<?php } ?>						<!--Zone List-->
	
	       <?php 	$catbgc="style='background-color:#FFFACD;'";
					$scatbgc="style='background-color:#FFF8DC;'";
					$brandbgc="style='background-color:#FFF5EE;'";
					$nbgc="style='background-color:#FFFFE0;'";
					//$addbgc="style='background-color:#FFF8DC;'";
				$query1=$mysqli->query("SELECT * FROM `zone` ORDER BY zone asc");
				$chk1=mysqli_num_rows($query1);
				if($chk1!=''){echo "
					
					   <thead>
						<tr style='background-color:#FFDEAD;'>
						<th>#</th>
						<th></th>
						<th>Zone($chk1 Division)</th>
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
        <td <?php echo $catbgc; ?>><?php echo $cat->zone; ?>
		&nbsp; &nbsp;<a href="zone_del.php?catid=<?php echo $cat->zone_id; ?>"><font color="red"><i class="glyphicon glyphicon-remove"></i></font></a>
		&nbsp; &nbsp;<a href="zone.php?upcatid=<?php echo $cat->zone_id; ?>"><i class="glyphicon glyphicon-repeat"></i></a>
		</td>
		<td><a href="zone_chk.php?catser=<?php echo $cat->zone_id; ?>&chk=<?php echo $cat->chk; ?>"><?php if($cat->chk==1){echo "<apan class='label label-success'>Active</span>";}else{echo"<apan class='label label-danger'>Inactive</span>";} ?></a></td>
		
		</tr>
		
			
			
		
		<?php } ?>
												<!--Zone Add-->
			<tr <?php echo $addbgc; ?>>
				<td>
					
				</td>
				<td>
				<form class="form-horizontal" action="zone_act.php" method="POST" enctype="multipart/form-data">
				
				</td>
				<td>
				<input type="text" class="form-control" name="cat" id="exampleInputCategory" placeholder="Zone" required /></td>
				<td>
				
				<button type="submit" name="cat_submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></button>
				
				 
				
				
				</form></td>
				</tr>
	
	   </tbody>
								<!--district List-->
	 <?php 		
				$n=1;
				$query2=$mysqli->query("SELECT * FROM `upozela`");
				$chk2=mysqli_num_rows($query2);
				if($chk2!=''){echo "
					   <thead>
						 <tr style='background-color:#FFE4C4;'>
						<th>#</th>
						  <th></th>
						<th></th>
						<th>District($chk2)</th>
					   
				   
					</tr>
					</thead>
					 <tbody>
				";}
				while($scat=mysqli_fetch_object($query2)){
		 ?>
	   <tr>
		<td <?php echo $nbgc; ?>><?php echo $n++; ?></td>
		<td></td>
		<td <?php echo $catbgc; ?>><?php $query22=$mysqli->query("SELECT * FROM `zone` where `zone_id`='".$scat->zone_id."' order by zone");
		
		 while($cat2=mysqli_fetch_object($query22)){echo $cat2->zone;}  ?></td>
        <td <?php echo $scatbgc; ?>><?php echo $scat->upozela; ?>&nbsp; &nbsp;<a href="upozela_del.php?scatid=<?php echo $scat->upozela_id; ?>"><font color="red"><i class="glyphicon glyphicon-remove"></i></font></a>
		</td>
		
		
		</tr> 
		<?php } ?> 					<!--district Add-->
          <tr <?php echo $addbgc; ?>> <form class="form-horizontal" action="upozeal_act.php" method="POST" enctype="multipart/form-data"> 
			<td></td>		  
			<td></td>	
			
			<td>
			<select name="cat_id" size="" class="form-control">
								<option value="select">Select a Zone</option>
									<?php
										$sql1=$mysqli->query("SELECT * FROM `zone` order by `zone` ");		
										while($res1=mysqli_fetch_object($sql1)){	?>
										<option value="<?php echo $res1->zone_id;?>"> <?php echo $res1->zone;?></option>
									<?php } ?> 
							</select>
			</td>		  
			<td>
			<input type="text" class="form-control"  name="sub_cat_name" id="exampleInputsubCategory" placeholder="District Name">
			<a></a>
			</td>
				<td>
				<button type="Submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></button>
				</td>
          </tr> </form>        
	
	 </tbody>
											<!--upozela list-->
		 <?php 
				$n=1;
				$query3=$mysqli->query("SELECT * FROM `union`");
				$chk3=mysqli_num_rows($query3);
				if($chk3!=''){echo "
					 	   <thead>
							 <tr style='background-color:#FFE4E1;'>
							<th>#</th>
							<th></th>
							<th></th>
							<th></th>
							<th>Upazila($chk3)</th>
       
   
							</tr>
							</thead>
							 <tbody>
				";}
				while($brand=mysqli_fetch_object($query3)){
		 ?>
	   <tr>
		<td <?php echo $nbgc; ?>><?php echo $n++; ?></td>
		<td ></td>
		<td <?php echo $catbgc; ?>><?php $query33=$mysqli->query("SELECT * FROM `zone` where `zone_id`='".$brand->zone_id."' order by zone "); 
		 while($cat33=mysqli_fetch_object($query33)){echo $cat33->zone; } ?></td>
		<td <?php echo $scatbgc; ?>><?php $query333=$mysqli->query("SELECT * FROM `upozela` where `upozela_id`='".$brand->upozela_id."' "); 
		 while($scat333=mysqli_fetch_object($query333)){echo $scat333->upozela; } ?></td>
        <td <?php echo $brandbgc; ?>><?php echo $brand->union; ?>&nbsp; &nbsp;<a href="union_del.php?brandid=<?php echo $brand->union_id; ?>"><font color="red"><i class="glyphicon glyphicon-remove"></i></font></a></td>
		
		</tr>
		<?php } ?>							<!--upozela Add-->
          <tr <?php echo $addbgc; ?>><form class="form-horizontal" action="union_act.php" method="POST">
			<td></td>		  
			<td></td>		  
			<td>
			<select name="cat_id" size="" id="category" class="form-control">
									<option value="select" >Select a Zone</option>
									<?php
										$sql2 = $mysqli->query("SELECT * FROM `zone`  order by `zone` ");		
										while($res2=mysqli_fetch_object($sql2)){	?>
										<option value="<?php echo $res2->zone_id;?>"> <?php echo $res2->zone;?></option>
									<?php } ?> 
							</select>
			</td>		  
			<td>
			 <div class="col-sm-12 " id="usb" style="display:none;">
							
								  <select name="sub_cat_id" size="" id="sub_category" class="form-control">
								           <option>District</option>
			 
										   
								  </select>
						   </div>
			</td>		  
			<td><input type="text" class="form-control" id="usb" name="brand" id="exampleInputCategory" placeholder="Upazila Name"/></td>		  
			<td> <button type="Submit" name="brand_add" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></button></td>		  
          </tr>  </form>         
	
	 </tbody> 
									<!--Ward / Union list-->
		 <?php 
				$n=1;
				$query3=$mysqli->query("SELECT * FROM `ward` ");
				$chk4=mysqli_num_rows($query3);
				if($chk4!=''){echo "
					 	   <thead>
							 <tr style='background-color:#FFE4E1;'>
							<th>#</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Ward / Union($chk4)</th>
       
   
							</tr>
							</thead>
							 <tbody>
				";}
				while($ward=mysqli_fetch_object($query3)){
		 ?>
	   <tr>
		<td <?php echo $nbgc; ?>><?php echo $n++; ?></td>
		<td ></td>
		<td <?php echo $catbgc; ?>><?php $query33=$mysqli->query("SELECT * FROM `zone` where `zone_id`='".$ward->zone_id."' order by zone "); 
		 while($cat33=mysqli_fetch_object($query33)){echo $cat33->zone; } ?></td>
		<td <?php echo $scatbgc; ?>><?php $query333=$mysqli->query("SELECT * FROM `upozela` where `upozela_id`='".$ward->upozela_id."' "); 
		 while($scat333=mysqli_fetch_object($query333)){echo $scat333->upozela; } ?></td>
		 <td <?php echo $scatbgc; ?>><?php $q1=$mysqli->query("SELECT * FROM `union` where `union_id`='".$ward->union_id."' "); 
		 while($union=mysqli_fetch_object($q1)){echo $union->union; } ?></td>
        <td <?php echo $brandbgc; ?>><?php echo $ward->ward; ?>&nbsp; &nbsp;<a href="ward_del.php?brandid=<?php echo $ward->ward_id; ?>"><font color="red"><i class="glyphicon glyphicon-remove"></i></font></a></td>
		
		</tr>
		<?php } ?>							<!--Ward / Union Add-->
          <tr <?php echo $addbgc; ?>><form class="form-horizontal" action="ward_act.php" method="POST">
			<td></td>		  
			<td></td>		  
			<td>
			               <select name="cat_id" size="" id="cat" class="form-control">
									<option value="select" >Select a Zone</option>
									<?php
										$sql2 = $mysqli->query("SELECT * FROM `zone` order by zone ");		
										while($res2=mysqli_fetch_object($sql2)){	?>
										<option value="<?php echo $res2->zone_id;?>"> <?php echo $res2->zone;?></option>
									<?php } ?> 
				           </select>
			</td>		  
			<td>
			 <div class="col-sm-12 " id="usb1" style="display:none;">
							
								  <select name="scat_id" size="" id="scat" class="form-control">
								           <option>District</option>
			 
										   
								  </select>
			</div>
			</td>
			<td>
			 <div class="col-sm-12 " id="usb2" style="display:none;">
							
								  <select name="brand_id" size="" id="brand" class="form-control">
								           <option>Upazila</option>
			 
										   
								  </select>
						   </div>
			</td>
			<td><input type="text" class="form-control" name="brand" id="exampleInputCategory" placeholder="Ward / Union Name"/></td>		  
			<td> <button type="Submit" name="brand_add" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></button></td>		  
          </tr></form>           
	
	 </tbody> 
											
	 
 </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>
          <!-- /.box -->
		  
		   
		  
		  </div>
		  

		  
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

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<?php 	unset($_SESSION['msg']);
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
				url: "upozela_ex.php?cat_id=sub_cat&ref_id="+cat_id,             
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
		$("#cat").on('change', function(){
			var cat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "upozela_ex.php?cat_id=sub_cat&ref_id="+cat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#scat").html(response);
					//console.log(response);
				}
			});
		$("#usb1").show(300);
		});
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#scat").on('change', function(){
			var scat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "union_ex.php?scat_id=brand&refb_id="+scat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#brand").html(response);
					//console.log(response);
				}
			});
		$("#usb2").show(300);
		});
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#zone").on('change', function(){
			var cat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "upozela_ex.php?cat_id=sub_cat&ref_id="+cat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#dis").html(response);
					//console.log(response);
				}
			});
		$("#dis1").show(300);
		});
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#dis").on('change', function(){
			var scat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "union_ex.php?scat_id=brand&refb_id="+scat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#upazila").html(response);
					//console.log(response);
				}
			});
		$("#upazila2").show(300);
		});
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#upazila").on('change', function(){
			var scat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "ward_ex.php?scat_id=brand&refb_id="+scat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#agent").html(response);
					//console.log(response);
				}
			});
		$("#agent3").show(300);
		});
		
	});
</script>
<?php } ?>