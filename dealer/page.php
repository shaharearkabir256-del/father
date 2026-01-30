<?php require('session.php'); ?>
<!DOCTYPE html>
<html>
  <?php require_once('head.php'); ?>
  <body class="skin-blue">
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
            <small><?php echo $pageName; ?></small>
			<?php 
			if($_SESSION['msg']){echo $_SESSION['msg']; }
			if($_SESSION['msgs']){echo $_SESSION['msgs']; }
			?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
    <!-- SlimScroll -->
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>