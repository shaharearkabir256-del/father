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
    <title><?php echo $page="Add New Agent";?></title>
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
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $page;?></li>
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
                  <h3 class="box-title"><?php echo $page;?> | <a href="member_agent.php"><i class="fa fa-users"></i>All Agent</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>

				 <form name="registration_form" action="member_add_act.php" name="member" onsubmit="return process()" method="post" id='registration_form' class="form-horizontal">
                <div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="firstname" class="control-label">Agent Name</label>
                        <input id="firstname" class="form-control" type="text" name="fname" title="Enter Agent name" placeholder="Enter Agent name"/>
                      </div>
                 </div>
				  <div class="col-sm-6">  
                      <div class="form-group">
                        <label for="lastname" class="control-label">Name</label>
                        <input id="lastname" class="form-control" type="text" name="lname" title="Enter name" placeholder="Enter Your Full name"/>
                      </div>
                  </div>
                </div>
				
				<div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Email<font color="#990000">*</font></label>
                        <input required id="email" class="form-control" type="email" name="email"  onblur="this.value=removeSpaces(this.value); title="Enter Email" placeholder="Your Email Address"/>
                      </div>
                  </div>
				<div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Mobile<font color="#990000">*</font></label>
                        <input required id="mobile" class="form-control" type="text" name="mobile" title="Enter Mobile" placeholder="Your Mobile"/>
                      </div>
                </div>
              </div>
                 
			<div class="col-sm-12">
				<div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">User ID<font color="#990000">*</font></label>
                        <input required class="form-control" type="text" name="userid" id="User_ID" onchange="return check_user_id();" onblur="this.value=removeSpaces(this.value);" onkeyup="return check_user_id();"  title="Enter Usre ID" placeholder="Your User Id"/>
						</div>
				</div>
					<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="user_id_error"></div>
					 </div>
					 </div>
					 
			</div>
				<div class="col-sm-12">
				  <div class="col-sm-6">	  
					   <div class="form-group">
                        <label for="email" class="control-labely">Sponsor ID<font color="#990000">*</font></label>
                        <input class="form-control" type="text" name="sponsor" id="Reference" onchange="return check_ref_id();" onblur="this.value=removeSpaces(this.value);"  onkeyup="return check_ref_id();" title="Enter Sponsor ID" placeholder="Your Sponsor Id"/>
					  </div>
				  </div>
				  	<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="ref_error"></div>
					 </div>
					 </div>
					 
			</div>
			
                <div class="col-sm-12">
				  <div class="col-sm-6">    
                      <div class="form-group">
                        <label for="password" class="control-labely">Password<font color="#990000">*</font></label>
                        <input required class="form-control" type="password" name="passOne" title="Enter password" placeholder="Password"/>
                      </div>
                  </div>
					<div class="col-sm-6"> 
                        <div class="form-group">
                        <label for="pinn" class="control-labely">Pin<font color="#990000">*</font></label>
                        <input required class="form-control" type="password" name="pinOne" title="Enter Pin Code" placeholder="Pin Code"/>
					  </div>
					</div>
				</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
						 </div>
	
               <!--Registration Form Contents Ends-->
                
                <!--Login-->
              </div>

						<!--End-->
                       
                            
						
								 </form><!--Register Now Form Ends-->
				
				
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