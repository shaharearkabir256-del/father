<?php require_once('session.php'); 
		//$agentid=$_GET['agentid'];	

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add New <?php echo $page="Customer";?></title>
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
            Add New <?php echo $page;?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         
            <li class="active">Add New <?php echo $page;?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New <?php echo $page;?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p class="text-muted">
                   <font color="red">   <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?> </font>
				   <font color="green"> <?php if(isset($_SESSION['msgs'])){echo $_SESSION['msgs'];} ?> </font>
				  </p>
                  <!--Register Form-->
                  <form name="registration_form" action="customer_add_act.php" name="member" onsubmit="return process()" method="post" id='registration_form' class="form-horizontal">
                <div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="firstname" class="control-label">First Name</label>
                        <input id="firstname" class="form-control" type="text" name="fname" title="Enter first name" placeholder="First name"/>
                      </div>
                 </div>
				  <div class="col-sm-6">  
                      <div class="form-group">
                        <label for="lastname" class="control-label">Last Name</label>
                        <input id="lastname" class="form-control" type="text" name="lname" title="Enter last name" placeholder="Last name"/>
                      </div>
                  </div>
                </div>
				
				<div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Email<font color="#990000">*</font></label>
                        <input required id="email" class="form-control" type="email" name="email"  onblur="this.value=removeSpaces(this.value); title="Enter Email" placeholder="Your Email"/>
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
                        <label for="email" class="control-labely">Customer ID<font color="#990000">*</font></label>
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
                        <input class="form-control" type="text" name="sponsor" id="Reference" onchange="return check_ref_id();" onblur="this.value=removeSpaces(this.value);"  onkeyup="return check_ref_id();" title="Enter Sponsor ID" placeholder="Your Sponsor Id" readonly />
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
					   <?php $placement=$_GET['placement'];?>
                        <label for="email" class="control-labely">Placement ID<font color="#990000">*</font></label>
                        <input class="form-control" type="text" name="plcmnt" <?php if($placement!=''){?> value="<?php echo $placement;?>"<?php } ?> id="Uplink" onchange="return check_uplink_id();" onblur="this.value=removeSpaces(this.value);" onkeyup="return check_uplink_id();" title="Enter Placement ID" placeholder="Your Placement Id" readonly />
					  </div>
				   </div>
				   	<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="spon_error"></div>
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php require_once 'footer.php';?>
    </div><!-- ./wrapper -->
<script src="js/signup.js"></script>
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
