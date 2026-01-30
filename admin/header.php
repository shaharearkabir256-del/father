<header class="main-header">
        <a href="home.php" class="logo">
		<?php 
		$id=$_SESSION['AdminUserId'];
		$adm=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` where `user_id`='$id'"));
		$pro = mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='$id' "));
		if($adm->type==1){
			echo "<b>Super Admin</b>";			
		}elseif($adm->type==2){
			echo "<b>Accounts </b>Panel";
		}elseif($adm->type==3){
			echo "<b>Product Manager</b>";
		}else{
			echo "<b>Admin </b>Panel";
		} 
		?></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!--
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                   
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
					  
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
         
			  <?php 
			  if($paychk>0){
				  $p='1';
			  }
			  if($memchk>0){
				  $m='1';
			  }
			$nall=$p+$m;
			if($paychkall>0){
				  $pall='1';
			  }
			  if($memchkall>0){
				  $mall='1';
			  }
			  $nall2=$pall+$mall;
			  ?>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <?php if($nall>0){ ?><span class="label label-warning"><?php echo $nall;?></span><?php } ?>
                </a>
				<?php if($nall>0){ ?>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $nall;?> notifications</li>
                  <li>
              
                    <ul class="menu">
					<?php if($paychk>0){ ?>
                      <li>
                        <a href="payments.php">
                          <i class="fa fa-users text-aqua"></i> <?php echo $paychk;?> new withdraw request today
                        </a>
                      </li>
					<?php } ?>
					<?php if($memchk>0){ ?>
                      <li>
                        <a href="member.php">
                          <i class="fa fa-users text-aqua"></i> <?php echo $memchk;?> new members joined today
                        </a>
                      </li>
					<?php } ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
				<?php } ?>
              </li>
           
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <?php if($nall2>0){ ?><span class="label label-danger"><?php echo $nall2;?></span><?php } ?>
                </a>
				<?php if($nall2>0){ ?>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $nall2;?> pending payment</li>
                  <li>
              
                    <ul class="menu">
					   <?php 
				$n=1;
				$query=$mysqli->query("SELECT * FROM `withdraw` where `type`='1' and `rec_id`='$adminId' and `account`='3' and `status`='0' order by serial desc");
				while($trx=mysqli_fetch_object($query)){
				
			?>
                      <li>
                        <a href="payments.php">
						 <?php 	$mem=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `member` where `team`=0 and `user_id`='$trx->send_id'")); ?>
		<i class="fa fa-money text-aqua"></i> <b><?php echo $mem->log_id; ?></b> request for
						<b> <?php echo $trx->amount; ?></b><?php echo $bdt;?> 						
						
                        </a>
                      </li>
					  <?php } ?>
					  	<?php 
				$n=1;
				$query=$mysqli->query("SELECT * FROM member where `team`=0 and `active`='0' ORDER BY serial desc ");
				while($mem=mysqli_fetch_object($query)){
				
			?>
					 <li>
                        <a href="member.php">
                          <i class="fa fa-user text-aqua"></i> <b><?php echo $mem->log_id;?></b> join <?php echo $mem->date;?> <span class="label label-success">Active</span> it
                        </a>
                      </li>
					  <?php } ?>
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="payments.php"> Pay Now </a>
                  </li>
                </ul>
				<?php } ?>
              </li>-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <img class="user-image" src="photo/<?php echo $pro->photo; ?>" alt="<?php echo $pro->fname; ?> <?php echo $pro->lname; ?>" title="<?php echo $pro->fname; ?> <?php echo $pro->lname; ?>">
                  <span class="hidden-xs"><?php
						$id=$_SESSION['AdminUserId'];
						$adm=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` where `user_id`='$id'"));
						echo $adm->user;
				  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $adm->user; ?>
                      <small>Last Login: <?php echo $adm->logout;?></small>
                      <small>Login IP: <?php echo $adm->ip;?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
             
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php?page=User Profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>