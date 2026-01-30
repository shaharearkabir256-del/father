<?php
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
    <title><?php echo $page="Admin";?></title>
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
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
	<div class="row">
        <!-- left column -->
       <?php
	   $del_id=$_GET['userid'];
								if($del_id!=''){
				$del_sql=$mysqli->query("SELECT * FROM `admin` WHERE `user_id`='".$del_id."'");
				$delchk=mysqli_num_rows($del_sql);
				if($delchk==1){
					$del=mysqli_fetch_object($del_sql);
					$del_info=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$del_id."'"));
					//$del_sponsor=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` WHERE `sponsor`='".$del->sponsor."'"));
					}
								}
	   ?>
		<div class="col-md-6">
		 <div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> <a href="admin.php"><?php if($delchk==0){echo "All ".$page." Users";}else{echo"Profile Upgrade";}?></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
								
							?>
				
<form role="form"  action="<?php if($delchk==1){?>admin_upg_act.php<?php }else{ ?>admin_add_act.php<?php } ?>" method="POST">
										<div class="form-group">
                                                <label class="form-label" for="email-1">Name:</label>
                                                <input type="text" class="form-control" name="dname" value="<?php echo $del_info->fname;?>" placeholder="Enter your Name…">
												<input type="number" name="user_id" value="<?php echo $del->user_id;?>" hidden>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Mobile:</label>
                                                <input type="text" class="form-control" name="mobile" value="<?php echo $del_info->mobile;?>" placeholder="Enter your mobile Number" required>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Mobile Banking:</label>
                                               <select required name="mbank"  class="form-control">
									  <option value="0">Select</option>
											<?php
											$mb=$mysqli->query("SELECT * FROM `mobile_banking` where `chk`='1' ");
											while($mb1=mysqli_fetch_object($mb)){
											?>
											<option <?php if($del_info->mbank==$mb1->serial){?>selected<?php }?> value="<?php echo $mb1->serial;?>"> <?php echo $mb1->name;?></option>
											<?php } ?>
									       </select>
                                          <label class="form-label" for="email-1">Mobile Banking Account:</label>
                                                <input type="text" class="form-control" name="pmaccount" value="<?php echo $del_info->pmaccount;?>" placeholder="Account Number" required>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Address:</label>
                                                <input type="text" class="form-control" name="address" value="<?php echo $del_info->address;?>" placeholder="Enter your Address" required>
                                            </div>
									<?php if($delchk==0){?>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Type</label>
                                               <select required name="type"  class="form-control">
									  
									  <?php if($del->type==1){ ?>
					
					 <option <?php if($del->type==1){echo "selected";}?> value="1">Super Admin</option>
									  <?php }else{ ?>
									  <option value="0">Select</option>
					<option <?php if($del->type==0){echo "selected";}?> value="0">Administrator</option>
					 <option <?php if($del->type==2){echo "selected";}?> value="2">Accounts</option> 
					 <option <?php if($del->type==3){echo "selected";}?> value="3">Product Manager</option>
					 <!--<option <?php //if($del->type==4){echo "selected";}?> value="4">Manager</option> 
					 <option <?php //if($del->type==5){echo "selected";}?> value="5">Assistant Manager</option>-->
											<?php } ?>
									       </select>
                                            </div>
									<?php } ?>
                                            <div class="form-group">
                                                <label class="form-label" for="email-1">User Id:</label>
                                                <input type="text" class="form-control" id="Userid" onblur="this.value=removeSpaces(this.value);" name="mUserid"  value="<?php echo $del->user;?>" placeholder="Enter your User id…">
                                            </div>
											<?php if($delchk==0){?>
                                            <div class="form-group">
                                                <label class="form-label" for="password-1">Password:</label>
                                                <input type="password" class="form-control" id="password-1" name="mPass" placeholder="Enter your password">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Confirm Password:</label>
                                                <input type="password" class="form-control" id="password-1" name="mCpass" placeholder="Enter your confirm password">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Pin:</label>
                                                <input type="password" class="form-control" id="password-1" name="mPin" placeholder="Enter your pin">
                                            </div>
											<?php } ?>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Email:</label>
                                              <input type="email" class="form-control" id="Userid" onblur="this.value=removeSpaces(this.value);" name="mMail" value="<?php echo $del_info->email;?>" placeholder="Enter your email…">
                                            </div>

                                           

                                            <div class="form-group">
                                                
											<?php
											if($delchk==1){
											?>
                                        <button type="submit" name="proup" class="btn btn-success  pull-left">Upgrade</button>
											<?php }else{?>
										<button type="submit" class="btn btn-primary  pull-left">Submit</button>
											<?php } ?>
												<button type="reset" class="btn btn-danger  pull-right ">Reset</button>
                                            </div>

                                        </form>
				
				
				<!-- /. Main Content Area  -->
				</div>
			</div>
		</div>
	  </div>
	  <!--Pass Up Start-->
	  <?php if($delchk==1){?>
	  <div class="col-md-6">
		  
		 <div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> <a href="admin.php">Password Upgrade</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				<?php
								if($_SESSION['msgp']){echo "<button class='btn-danger btn-block'>".$_SESSION['msgp']."</button>";}
								if($_SESSION['msgsp']){echo "<button class='btn-success btn-block'>".$_SESSION['msgsp']."</button>";}
								
							?>
<form role="form"  action="admin_upg_act.php" method="POST">
									
										
									
											<div class="form-group">
                                                <label class="form-label" for="email-1">Type</label>
                                               <select required name="type"  class="form-control">
									  
									  <?php if($del->type==1){ ?>
					
					 <option <?php if($del->type==1){echo "selected";}?> value="1">Super Admin</option>
									  <?php }else{ ?>
									  <option value="0">Select</option>
					<option <?php if($del->type==0){echo "selected";}?> value="0">Administrator</option>
					 <option <?php if($del->type==2){echo "selected";}?> value="2">Accounts</option> 
					 <option <?php if($del->type==3){echo "selected";}?> value="3">Product Manager</option>
					 <!--<option <?php //if($del->type==4){echo "selected";}?> value="4">Manager</option> 
					 <option <?php //if($del->type==5){echo "selected";}?> value="5">Assistant Manager</option>-->
											<?php } ?>
									       </select>
                                            </div>

                                           

                                            <div class="form-group">
                                                <label class="form-label" for="password-1">Password:</label>
                                                <input type="password" class="form-control" id="password-1" name="mPass" placeholder="Enter your password">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Confirm Password:</label>
                                                <input type="password" class="form-control" id="password-1" name="mCpass" placeholder="Enter your confirm password">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Pin:</label>
                                                <input type="password" class="form-control" id="password-1" name="mPin" placeholder="Enter your pin">
                                            </div>
											

                                           

                                            <div class="form-group">
                                                
										<input type="number" name="user_id" value="<?php echo $del->user_id;?>" hidden>
                                        <button type="submit" name="passup" class="btn btn-success  pull-left">Upgrade</button>
										
                                            </div>

                                        </form>
				
				
				<!-- /. Main Content Area  -->
				</div>
			</div>
		</div>
	  </div>
	  <?php } ?>
	  <!--Pass Up End-->
	</div>
        <!-- Default box -->
        </section> 
<!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php require_once 'footer.php';?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
	<script src="../member/js/signup.js"></script>
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
<?php unset($_SESSION['msgp']);unset($_SESSION['msgsp']);?>
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
		$("#brand").on('change', function(){
			var scat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "ward_ex.php?scat_id=brand&refb_id="+scat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#ward").html(response);
					//console.log(response);
				}
			});
		$("#usb3").show(300);
		});
		
	});
</script>
<?php } ?>