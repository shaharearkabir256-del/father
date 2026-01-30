<?php
ob_start();
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
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
    <title>Customer Iformation Update</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	    <!-- My CSS--> 
	 <link rel="stylesheet" href="../member/tree.css" />
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
            <small></small>
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
                  <h3 class="box-title">  <a href="member_customer.php">Customer Iformation Update</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
				
				 <form role="form"  action="member_customer_edit_act.php" method="POST">
				 <?php
				 $userid=$mysqli->real_escape_string($_GET['userid']);
		         $user=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$userid."'"));
		         $profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$user->user_id."'"));

				 ?>
		<input style="display:none;" type="text" name="userid" value="<?php echo $user->user_id; ?>"/>
												<div class="form-group">
                                                <label class="form-label" for="email-1">User id:</label>
												 <input type="text" class="form-control" name="user" value="<?php echo $user->log_id; ?>" />
                                                <input type="text" class="form-control" name="olduser" value="<?php echo $user->log_id; ?>" readonly />
                                            </div>
					
											<div class="form-group">
                                                <label class="form-label" for="password-1">First Name:</label>
                                                <input type="text" class="form-control" value="<?php echo $profile->fname; ?>" name="fname" placeholder="Enter First Name ">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Last Name:</label>
                                                <input type="text" class="form-control" value="<?php echo $profile->lname; ?>" name="lname" placeholder="Enter your Last Name">
                                            </div>
                                      		<div class="form-group">
                                                <label class="form-label" for="password-1">Mobile:</label>
                                                <input type="text" class="form-control" value="<?php echo $profile->mobile; ?>" name="mobile" placeholder="Enter your Mobile Number">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Email:</label>
                                                <input type="email" class="form-control" value="<?php echo $profile->email; ?>" name="email" placeholder="Enter your email…"/>
                                            </div>

                                      

                                            <div class="form-group">
                                                <button type="reset" class="btn btn-primary ">Reset</button>
											
                                                <button type="submit" class="btn btn-primary  pull-right">Update</button>
                                            </div>

                                        </form>
				
				
				<!-- /. Main Content Area  -->
				</div>
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