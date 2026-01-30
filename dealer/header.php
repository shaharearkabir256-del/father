  <?php 
			$user=$_SESSION['DealerLogId']; 
			  $q1=$mysqli->query("select * from `dealer_info` where `user_id`='".$user."' ");
			  $q2=$mysqli->query("select * from `dealer` where `user_id`='".$user."' ");
			  $chk1=mysqli_num_rows($q1);
			 $info=mysqli_fetch_object($q1);
			 $del=mysqli_fetch_object($q2);
			
			  ?>
<header class="main-header">
        <a href="home.php" class="logo">
		   <b>
		   <?php 
		    if($del->type==6){echo "Merchant";}
		elseif($del->type==5){echo "Agent";}
		elseif($del->type==4){echo "Ward/Union";}
		elseif($del->type==3){echo "Upazila";}
		elseif($del->type==2){echo "District";}
		elseif($del->type==1){echo "Zone";}
		else{echo "Not Set";}
			 ?> </b>Panel
		
		</a>
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
              <!-- Messages: style can be found in dropdown.less-->
             
			
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="photo/<?php echo $info->photo?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"> <?php  if($chk1==1){echo $info->fname." ".$info->lname;}else{ echo "James Bond"; }
			  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php 	 
			 if($chk1==1){echo $info->fname." ".$info->lname;}else{ echo "James Bond"; }
			  ?> - <?php 
			   if($del->type==6){echo "Merchant";}
		elseif($del->type==5){echo "Agent";}
		elseif($del->type==4){echo "Ward/Union";}
		elseif($del->type==3){echo "Upazila";}
		elseif($del->type==2){echo "District";}
		elseif($del->type==1){echo "Zone";}
		else{echo "Not Set";}
			 ?>
                      <small>Member since <?php echo $info->date;?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
             
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php?pageName=Profile"  target="blank" class="btn btn-default btn-flat">Profile</a>
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