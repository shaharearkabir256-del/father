<?php require_once('session.php'); ?>
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
    
		<div class="col-md-4">
          <!-- /.box -->
          <!-- Profile Information -->
          <div class="box box-primary">
            <div class="box-body box-profile">
			 <!-- /*INSERT INTO `profile`(`serial`, `user_id`, `sex`, `fname`, `lname`, `photo`, `cover`, `father`, `mother`, `mobile`, `email`, `city`, `state`, `postal`, `voter`, `country`, `vill`, `upozela`, `union`, `address`, `national`, `mbank`, `perfectmoney`, `pmaccount`, `blood`, `bday`, `bmonth`, `byear`, `bank`, `branch`, `account`, `terms`, `swift`, `rank`, `epin`, `last_login`	*/  -->
             <img class="profile-user-img img-responsive img-circle" src="dist/img/user2-160x160.jpg" alt="<?php echo $info->fname; ?> <?php echo $info->lname; ?>" title="<?php echo $info->fname; ?> <?php echo $info->lname; ?>"></img>
              <h3 class="profile-username"><?php echo $info->fname; ?> <?php echo $info->lname; ?></h3>

              <p class="text-muted"><?php echo $info->email; ?></p>
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
                <?php echo $info->mobile; ?> <br>
				<?php echo $info->email; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $info->address; ?></p>

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		<div class="col-md-8">
		<?php if($_SESSION['msg']){ ?>
		<div class="box box-primary">
			<div class="box-body">
			<?php
						if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
						if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
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
											<input type="text" name="fname" class="form-control" placeholder="name" value="<?php echo $info->fname;?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-9">				
											<input type="text" name="lname" class="form-control" placeholder="name" value="<?php echo $info->lname;?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">NID<font color="#990000">*</font></label>
										<div class="col-sm-9">	
											<input type="text" name="nid" class="form-control" placeholder="Enter NID Number" value="<?php echo $info->nid;?>"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Mobile<font color="#990000">*</font></label>
										<div class="col-sm-9">	
											
											<!--<div class="input-group-addon" id="sub_category_error" ></div>-->
											
											<input type="text" name="mobile" class="form-control" placeholder="Contact No" value="<?php echo $info->mobile;?>" <?php if($info->mobile!=''){echo"readonly";} ?> />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">E-Mail<font color="#990000">*</font></label>
										<div class="col-sm-9">				
											<input <?php if((isset($_GET['f']))&&($_GET['f']=='email')){ ?>style="border-color: #dd4b39;" <?php } ?> type="text" name="email" class="form-control" placeholder="E-Mail" value="<?php echo $info->email;?>" <?php if($info->email!=''){echo"readonly";} ?> />
										</div>
									</div>
			
									
								
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Father&rsquo;s Name</label>
										<div class="col-sm-9">				
											<input type="text" name="father" class="form-control" placeholder="Father Name" value="<?php echo $info->father;?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Mother&rsquo;s Name</label>
										<div class="col-sm-9">				
											<input type="text" name="mother" class="form-control" placeholder="Mother Name" value="<?php echo $info->mother;?>" />
										</div>
									</div>
<div class="form-group">
<label class="col-sm-3 control-label">Date of Birth</label>
	
		<div class="col-sm-3">
	
			<select name="bday" class="form-control" id="day">
			<option>Day</option>
			<option selected><?php echo $info->bday?></option>
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
			<option selected><?php echo $info->bmonth?></option>
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
			<option selected><?php echo $info->byear?></option>
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
											<textarea rows="3" type="text" name="address" class="form-control" placeholder="Address"><?php echo $info->address;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Zip Code</label>
										<div class="col-sm-9">				
											<input type="text" name="zip" class="form-control" placeholder="Zip Code" value="<?php echo $info->zip;?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Post Code</label>
										<div class="col-sm-9">				
											<input type="text" name="postal" class="form-control" placeholder="Post Code" value="<?php echo $info->postal;?>" />
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
								if($_SESSION['psmsg']){echo "<button class='btn-danger btn-block'>".$_SESSION['psmsg']."</button>";}
								if($_SESSION['psmsgs']){echo "<button class='btn-success btn-block'>".$_SESSION['psmsgs']."</button>";}
							?>
               <form class="form-horizontal" action="pass_up_act.php" method="post">
			     <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <label>
                          Last Update <i class="fa fa-clock-o"></i> <a href="#"><?php echo $del->pdate;?></a>
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
								if($_SESSION['pnmsg']){echo "<button class='btn-danger btn-block'>".$_SESSION['pnmsg']."</button>";}
								if($_SESSION['pnmsgs']){echo "<button class='btn-success btn-block'>".$_SESSION['pnmsgs']."</button>";}
							?>
                <form class="form-horizontal" action="pin_up_act.php" method="post">
			     <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <label>
                          Last Update <i class="fa fa-clock-o"></i> <a href="#"><?php echo $del->pndate;?></a>
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
      </div><!-- /.content-wrapper -->

     <?php require_once 'footer.php';
	 unset($_SESSION['psmsg']);
	 unset($_SESSION['psmsgs']);
	 unset($_SESSION['pnmsg']);
	 unset($_SESSION['pnmsgs']);
	 ?>
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