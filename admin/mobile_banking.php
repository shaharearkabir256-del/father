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
    <title><?php echo $page="All Mobile Banking";?></title>
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
      
      <?php require_once('header.php');?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
     
<?php require_once('side.php');?>
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
            <li class="active"> <?php echo $page ?></li>
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
                  <h3 class="box-title"><?php echo $page ?> List | <a href="mobile_banking_add.php"> Add New</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				<table class="table table-striped table-bordered">
										<thead>
											
											<tr>
										
												<th>Serial</th>
												<th>Name</th>
												<th>Date</th>
												<th>Status</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
									   <?php $n=1;
									   //SELECT `serial`, `user_id`, `title`, `img`, `msg`, `mdate`, `chk` FROM `notice` WHERE 1
											$query =$mysqli->query("SELECT * FROM `mobile_banking` where `chk`='1'");
											while($slide = mysqli_fetch_object($query)){
										?>
										<tbody>
											<tr>
											
											<td class="center">
													<p><?php echo $n++; ?></p>
											</td>								
											<td class="center"><p title="<?php echo $slide->serial; ?>"><?php echo $slide->name; ?></p></td>
											<td class="center"><p><?php echo $slide->date; ?></p></td>
											<td class="center">
													<p><?php if($slide->chk==1){echo"Active";}else{echo"Dective";} ?></p>
											</td>
											<td class="center" width="10%">
													<a class="btn btn-info" href="mobile_banking_add.php?slide=<?php echo $slide->serial; ?>">Edit</a>
											</td>
											<td class="center" width="10%">
													<a class="btn btn-danger" href="mobile_banking_del.php?id=<?php echo $slide->serial; ?>">Delete</a>
											</td>
											</tr>
										</tbody>
										<?php } ?>
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

<?php } ?>