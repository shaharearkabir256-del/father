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
    <title><?php echo $page="Add New Mobile Banking";?></title>
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
            <?php echo $page ?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $page ?></li>
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
                  <h3 class="box-title"><?php echo $page ?> | <a href="mobile_banking.php"> All Mobile Banking</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<!-- Main Content Area -->
				
				<?php
			if(isset($_GET['slide'])){
				$serial=$_GET['slide'];
				$query_slide=mysqli_fetch_assoc($mysqli->query("SELECT * FROM `mobile_banking` WHERE `serial`='".$serial."'"));
			}else{}
			
				 //SELECT `serial`, `user_id`, `title`, `img`, `msg`, `mdate`, `chk` FROM `notice` WHERE 1
			?>
				<form class="form-horizontal" action="<?php if($serial!=''){ ?>mobile_banking_up_act.php<?php }else{ ?>mobile_banking_add_act.php<?php } ?>" method="post" enctype="multipart/form-data">
					<p style="color: red; text-align: center;">
					<?php 	if(isset($_SESSION['msg'])){ echo $_SESSION['msg'];}
					if(isset($_SESSION['msgs'])){ echo $_SESSION['msgs'];}
			?> </p>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  name="name" max-length="100" value="<?php echo $query_slide['name']; ?>" />
						</div>
					</div>

					<input type="hidden" name="serial" value="<?php echo $serial; ?>">
					
					
					
				
					<?php if($serial!=''){ ?>
					<div class="form-group">
						<div class="col-sm-offset-6 col-sm-6">
					
							<button type="submit" name="update" class="btn btn-success">Update</button>
							
						</div>
					</div>
					<?php }else{ ?>
					<div class="form-group">
						<div class="col-sm-offset-6 col-sm-6">
	
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-info">Refersh</button>
	
						</div>
					</div>
					<?php } ?>
					
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

<?php
unset($_SESSION['msg']);
unset($_SESSION['msgs']);
 } ?>