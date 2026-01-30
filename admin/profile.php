<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$page=$_GET['page'];
	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page; echo $_SESSION['AdminUserId']?></title>
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
        <?php echo $page;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?php echo $page;?></a></li>
        <li class="active"><?php echo $page;?></li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
	<div class="row">
    
		<div class="col-md-3">
          <!-- /.box -->
          <!-- Profile Information -->
          <div class="box box-primary">
            <div class="box-body box-profile">
			 <!-- /*INSERT INTO `profile`(`serial`, `user_id`, `sex`, `fname`, `lname`, `photo`, `cover`, `father`, `mother`, `mobile`, `email`, `city`, `state`, `postal`, `voter`, `country`, `vill`, `upozela`, `union`, `address`, `national`, `mbank`, `perfectmoney`, `pmaccount`, `blood`, `bday`, `bmonth`, `byear`, `bank`, `branch`, `account`, `terms`, `swift`, `rank`, `epin`, `last_login`	*/  -->
             <!--<img class="profile-user-img img-responsive img-circle" src="photo/<?php //echo $pro->photo; ?>" alt="<?php //echo $pro->fname; ?> <?php //echo $pro->lname; ?>" title="<?php //echo $pro->fname; ?> <?php //echo $pro->lname; ?>"></img>-->
              <h3 class="profile-username text-center"><?php echo $pro->fname; ?> <?php echo $pro->lname; ?></h3>

              <p class="text-muted text-center"><?php echo $pro->email; ?></p>

              <ul class="list-group list-group-unbordered">
			  <li class="list-group-item">
                 <b>Last Login</b> <a class="pull-right"><?php echo $adm->llog;?></a>
                </li>
                <li class="list-group-item">
                  <b>Login Ip</b> <a class="pull-right"><?php echo $adm->ip;?></a>
                </li>
              </ul>

              <a target="blank" href="visitor_place.php?ip=<?php echo $adm->ip;?>" class="btn btn-primary btn-block"><b><?php echo $adm->ip;?></b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Contact Information</strong>

              <p class="text-muted">
                <?php echo $pro->mobile; ?> <br>
				<?php echo $pro->email; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $pro->address; ?></p>

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		<div class="col-md-9">
		<?php if(isset($_SESSION['msg'])){ ?>
		<div class="box box-primary">
			<div class="box-body">
			<?php
						if(isset($_SESSION['msg'])){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
						if(isset($_SESSION['msgs'])){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
           </div>
           </div>
		<?php } ?>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php if(!isset($_GET['active'])){echo"active";}?>"><a href="#profile" data-toggle="tab">Update Profile Info</a></li>
              <li class="<?php if($_GET['active']=='pass'){echo"active";}?>"><a href="#password" data-toggle="tab">Update Password</a></li>
              <li class="<?php if($_GET['active']=='pin'){echo"active";}?>"><a href="#pin" data-toggle="tab">Update Pin Code</a></li>
            </ul>
            <div class="tab-content">
              <div class="<?php if(!isset($_GET['active'])){echo"active";}?> tab-pane" id="profile">
                <form action="profile_action.php" method="post" class="form-horizontal">
										<div class="form-group">
										<label class="col-sm-3 control-label">First Name</label>
										<div class="col-sm-9">				
											<input type="text" name="fname" class="form-control" placeholder="name" value="<?php echo $pro->fname;?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-9">				
											<input type="text" name="lname" class="form-control" placeholder="name" value="<?php echo $pro->lname;?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">NID<font color="#990000">*</font></label>
										<div class="col-sm-9">	
											<input type="text" name="nid" class="form-control" placeholder="Enter NID Number" value="<?php echo $pro->nid;?>"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Mobile<font color="#990000">*</font></label>
										<div class="col-sm-9">	
											
											<!--<div class="input-group-addon" id="sub_category_error" ></div>-->
											
											<input type="text" name="mobile" class="form-control" placeholder="Contact No" value="<?php echo $pro->mobile;?>" <?php if($pro->mobile!=''){echo"";} ?> />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">E-Mail<font color="#990000">*</font></label>
										<div class="col-sm-9">				
											<input <?php if((isset($_GET['f']))&&($_GET['f']=='email')){ ?>style="border-color: #dd4b39;" <?php } ?> type="text" name="email" class="form-control" placeholder="E-Mail" value="<?php echo $pro->email;?>" <?php if($pro->email!=''){echo"";} ?> />
										</div>
									</div>
			
									
								
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Father&rsquo;s Name</label>
										<div class="col-sm-9">				
											<input type="text" name="father" class="form-control" placeholder="Father Name" value="<?php echo $pro->father;?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Mother&rsquo;s Name</label>
										<div class="col-sm-9">				
											<input type="text" name="mother" class="form-control" placeholder="Mother Name" value="<?php echo $pro->mother;?>" />
										</div>
									</div>
<div class="form-group">
<label class="col-sm-3 control-label">Date of Birth</label>
	
		<div class="col-sm-3">
	
			<select name="bday" class="form-control" id="day">
			<option>Day</option>
			<option selected><?php echo $pro->bday?></option>
			<?php  
			for ($x = 1; $x <= 31; $x++) {
			echo "<option>$x </option>";
			}
			?>
			</select>
		</div>
		<div class="col-sm-3">
		
			<select name="bmonth"  class="form-control" id="month">
			<option>Month</option>
			<option selected><?php echo $pro->bmonth?></option>
			<?php
			/* for($m=1; $m<=12; ++$m){
			echo '<option>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>';
			} */
			/* $months = array();
			for ($i = 0; $i < 8; $i++) {
			$timestamp = mktime(0, 0, 0, date('n') - $i, 1);
			echo '<option>'.$months[date('n', $timestamp)] = date('F', $timestamp).'</option>';
			} */
			$months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
			$transposed = array_slice($months, date('n'), 12, true) + array_slice($months, 0, date('n'), true);
			$last8 = array_reverse(array_slice($transposed, -8, 12, true), true);
			foreach ($months as $num => $name) {
			printf('<option>%s</option>',$name);//value="%u" $num
			}
			?>
			</select>
		</div>
		<div class="col-sm-3">
		
			<select  name="byear" class="form-control" id="year">
			<option>Year</option>
			<option selected><?php echo $pro->byear?></option>
			<?php  
			for ($x = date("Y")-60; $x <= date("Y"); $x++) {
			echo "<option>$x </option>";
			}
			?>
			</select>
		</div>
	
</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Address<font color="#990000">*</font></label>
										<div class="col-sm-9">				
											<textarea rows="3" type="text" name="address" class="form-control" placeholder="Address"><?php echo $pro->address;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Zip/Post Code</label>
										<div class="col-sm-9">				
											<input type="text" name="postal" class="form-control" placeholder="Zip/Post Code" value="<?php echo $pro->postal;?>" />
										</div>
									</div>
									<div class="form-group">
									
									<div class="col-sm-4"></div>
									<div class="col-sm-4">
										<button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
									</div>
									<div class="col-sm-4">
									<button type="reset" class="btn btn-danger btn-lg btn-block">Refresh</button>
									</div>
									</div>
								</form>
              </div>
              <!-- /.tab-pane -->
			  <div class="<?php if($_GET['active']=='pass'){echo"active";}?> tab-pane" id="password">
			  <?php
								if(isset($_SESSION['psmsg'])){echo "<button class='btn-danger btn-block'>".$_SESSION['psmsg']."</button>";}
								if(isset($_SESSION['psmsgs'])){echo "<button class='btn-success btn-block'>".$_SESSION['psmsgs']."</button>";}
							?>
               <form class="form-horizontal" action="pass_up_act.php" method="post">
			     <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <label>
                          Last Update <i class="fa fa-clock-o"></i> <a href="#"><?php echo $adm->pdate;?></a>
                        </label>
                     
                    </div>
                  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">New Password</label>
						<div class="col-sm-9">
						  <input type="password" name="password1"  class="form-control" id="inputPassword3" placeholder="New Password" required>
						</div>
					  </div>
						<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Confirm New Password</label>
						<div class="col-sm-9">
						  <input type="password" name="password2"  class="form-control" id="inputPassword3" placeholder="Confirm New Password" required>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">

						</div>
					  </div>
					
					  <div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
						  <button type="submit" class="btn btn-primary">Upgrade</button>
						</div>
					  </div>
				</form>
              </div>
			  <!-- /.tab-pane -->
			  <div class="<?php if($_GET['active']=='pin'){echo"active";}?> tab-pane" id="pin">
			  <?php
								if(isset($_SESSION['pnmsg'])){echo "<button class='btn-danger btn-block'>".$_SESSION['pnmsg']."</button>";}
								if(isset($_SESSION['pnmsgs'])){echo "<button class='btn-success btn-block'>".$_SESSION['pnmsgs']."</button>";}
							?>
                <form class="form-horizontal" action="pin_up_act.php" method="post">
			     <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <label>
                          Last Update <i class="fa fa-clock-o"></i> <a href="#"><?php echo $adm->pndate;?></a>
                        </label>
                     
                    </div>
                  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">New Pin Code</label>
						<div class="col-sm-9">
						  <input type="password" name="password1"  class="form-control" id="inputPassword3" placeholder="New Pin Code" required>
						</div>
					  </div>
						<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Confirm New Pin Code</label>
						<div class="col-sm-9">
						  <input type="password" name="password2"  class="form-control" id="inputPassword3" placeholder="Confirm New Pin Code" required>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">

						</div>
					  </div>
					
					  <div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
						  <button type="submit" class="btn btn-primary">Upgrade</button>

						</div>
					  </div>
				</form>
              </div>
			  <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
<?php unset($_SESSION['psmsg']);unset($_SESSION['psmsgs']);?>
<?php unset($_SESSION['pnmsg']);unset($_SESSION['pnmsgs']);?>
<?php } ?>