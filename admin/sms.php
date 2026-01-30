<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$pageName=$_GET['pageName'];
	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageName;?></title>
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
            <?php echo $pageName;?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $pageName;?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
	<div class="row">
        <!-- left column -->
       
		<div class="col-md-12">
		 <!-- 
		 <div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $pageName;?></h3>
                </div>
                <div class="box-body">
			
				<?php
				
		/* 		if(isset($_POST['To'])&&isset($_POST['Message'])){
				$mobile=$mysqli->real_escape_string($_POST['To']);
				$sms=$mysqli->real_escape_string($_POST['Message']);	
				require('../db/api_sms.php');
				unset($_POST['To']);
				unset($_POST['Message']);
				} */
				?>
				<form class="form-horizontal" action="" method="POST">
				
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Username <font color="red">[Required]</font></label> 
						<div class="col-sm-4">
							<input type="text" class="form-control" required  name="Username"  value="dibs" />
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Password <font color="red">[Required]</font></label> 
						<div class="col-sm-4">
							<input type="text" class="form-control"  required name="Password"  value="Atcris843931@#&" />
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">From <font color="red">[Required]</font></label> 
						<div class="col-sm-4">
							<input type="text" class="form-control"  required name="From"  value="8801711234989" />
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Recipients <font color="red">[Required]</font></label> 
						<div class="col-sm-4">
							<input type="number" class="form-control" required name="To" placeholder="88017********" />
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Message <font color="red">[Required]</font></label>
						<div class="col-sm-4">			
							<textarea class="textarea" name="Message" required style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-6 col-sm-6">
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
				</div>
				</div>
				</div>
				-->
				<div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $pageName;?></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<table id="example1" class="table table-striped table-bordered">
										<thead>
											
											<tr>
											<th>#</th>
												<th>Recipients</th>
												<th>Message</th>
												<th>Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
									   <?php 
									   $n=1;
									   //SELECT `serial`, `info`, `image`, `text_color`, `slink`, `background`, `date`, `left`, `top`, `right`, `toptitle`, `title`, `title2`, `offer`, `type`, `chk` FROM `slide` WHERE 1
											$query =$mysqli->query("SELECT * FROM `sms_out` ORDER BY serial DESC");
											while($slide = mysqli_fetch_object($query)){
										?>
										
											<tr>
										
											<td><?php echo $n++; ?></td>
											<td><?php echo $slide->mobile; ?></td>
											<td><p><?php echo $slide->sms; ?></p></td>
											<td><?php echo $slide->date; ?></td>
											<td><?php echo $slide->status; ?></td>
											</tr>
											<?php } ?>
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
  </body>
</html>
<?php unset($_SESSION['msg']);unset($_SESSION['msgs']);?>
<?php } ?>