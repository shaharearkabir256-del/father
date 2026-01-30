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
    <title>Member Iformation Update</title>
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
       
		<div class="col-md-4">
		  
		 <div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">  <a href="member.php">Member Iformation Update</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
				
				 <form role="form"  action="member_edit_act.php" method="POST">
				 <?php
				 $userid=$mysqli->real_escape_string($_GET['userid']);
		         $user=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` WHERE `user_id`='".$userid."'"));
		         $sponsor=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` WHERE `user_id`='".$user->sponsor."'"));
		         $profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$user->user_id."'"));
		         

				 ?>
		<input style="display:none;" type="text" name="userid" value="<?php echo $user->user_id; ?>"/>
												<div class="form-group">
                                                <label class="form-label" for="email-1">User id:</label>
                                                <input type="text" class="form-control" name="user" value="<?php echo $user->user; ?>" />
                                                <input type="text" class="form-control" name="olduser" value="<?php echo $user->user; ?>" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="email-1">Sponsor id:</label>
                                                <input type="text" class="form-control" value="<?php echo $sponsor->user; ?>" name="sponsor" placeholder="Enter your Sponsor id…"/>
                                            </div>
 
                                            <div class="form-group">
                                                <label class="form-label" for="password-1">Placement id:</label>
                                                <input type="text" class="form-control" value="<?php echo $user->upline; ?>" name="placement" placeholder="Enter your Placement id"/>
                                            </div>
											
											
                      <div class="form-group">
                        <label class="control-label">Member Categories</label>
                        <select name="stype" type="number" class="form-control">
						<option <?php if($user->stype==1){echo "selected"; }?>  value="1">Happy</option>
						<option <?php if($user->stype==2){echo "selected"; }?> value="2">Regular</option>
						<option <?php if($user->stype==3){echo "selected"; }?> value="3">Lucky</option>
						<option <?php if($user->stype==4){echo "selected"; }?> value="4">Freedom</option>
						</select>
	
                      </div>
          
											
											<div class="form-group">
                                                <label class="form-label" for="password-1">position:</label>
                                                <input type="number" class="form-control" value="<?php echo $user->position; ?>" name="position" placeholder="Enter your position"/>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Club:</label>
                                                <input type="number" class="form-control" value="<?php echo $user->club; ?>" name="club" placeholder="Enter your club"/>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Mobile:</label>
                                                <input type="number" class="form-control" value="<?php echo $profile->mobile; ?>" name="mobile" placeholder="Enter your Mobile Number">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Email:</label>
                                                <input type="email" class="form-control" value="<?php echo $profile->email; ?>" name="email" placeholder="Enter your email…"/>
                                            </div>

                                           <div class="form-group">
                                                <label class="form-label" for="email-1">Earn Date Increment:
                                                    <?php
                                                        if($user->get>0){
                                               
                                                        $d=strtotime("+".$user->get." day");
                                                        echo "<font color='green'>".date('d-M-Y', $d)."</font";
                                                        }else{
                                                        echo "<font color='red'>Expired </font>";    
                                                        }                    ?>
                                                                            </label>
                                                <input type="number" class="form-control" value="<?php echo $user->get; ?>" name="earndate" placeholder="Enter Value"/>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Expired Date Increment:
                                                    <?php
                                                        if($user->expdate>0){
                                               
                                                        $d=strtotime("+".$user->expdate." day");
                                                        echo "<font color='green'>".date('d-M-Y', $d)."</font";
                                                        }else{
                                                        echo "<font color='red'>Expired </font>";    
                                                        }                    ?>
                                                                            </label>
                                                <input type="number" class="form-control" value="<?php echo $user->expdate; ?>" name="expireddate" placeholder="Enter Value"/>
                                            </div>

                                            <div class="form-group">
                                                <button type="reset" class="btn btn-primary ">Reset</button>
											
                                                <button type="submit" name="update1" class="btn btn-primary  pull-right">Update</button>
                                            </div>

                                        </form>
				
				
				<!-- /. Main Content Area  -->
				</div>
			</div>
		</div>
	  </div>
	  
	  <div class="col-md-8">
		  
		 <div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">  <a href="member.php">Member Tree</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				
				  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <!-- Post Content
              ================================================= -->
							<?php
	if($_GET['userid']!=''){ 
		$res=mysqli_fetch_object($mysqli->query("select `user` from `tree` where `user`='".$user->upline."'"));
		$user=$res->user;
		}else{		
		$res=mysqli_fetch_object($mysqli->query("select `user` from `tree` where `user`='".$user->upline."'"));
		$user=$res->user;
	
		}
	?>
<?php $star1="<span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star2="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star3="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star4="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star5="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star6="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star7="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star8="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star9="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<?php $star10="<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'></span>"; ?>
<table class="table table-responsive" width="100%" align="center"><tr><td>
<div class="tree">
	<ul>
		<li>                         <!--Root-->
		<?php
			$res1=mysqli_fetch_object($mysqli->query("select * from `tree` where `user`='".$user."'"));
			$pro1=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res1->user_id."'"));
			$mem1=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res1->user_id."'"));
			?>	
			<a href="member_edit.php?userid=<?php echo $res1->user_id; ?>"><font color=blue><?php $b='Empty' ; if($res1->user==''){echo $b ;}else{echo $res1->user;} ?></font>
			<br><img height="50" src="../member/images/avatar/<?php if($pro1->photo!=''){echo $pro1->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro1->fname!=''){echo $pro1->fname;}else{echo $mem1->log_id;}?>" title="<?php if($pro1->fname!=''){echo $pro1->fname.' '.$pro1->lname;}else{echo $mem1->log_id;}?>" class="profile-photo-md" />
			<?php echo "<br>";
				if($res1->package==1){echo $star1;}
			elseif($res1->package==2){echo $star2;}
			elseif($res1->package==3){echo $star3;}
			elseif($res1->package==4){echo $star4;}
			elseif($res1->package==5){echo $star5;}
			elseif($res1->package==6){echo $star6;}
			elseif($res1->package==7){echo $star7;}
			elseif($res1->package==8){echo $star8;}
			elseif($res1->package==9){echo $star9;}
		    elseif($res1->package==10){echo $star10;}
								   else{}
			?>
			</a>
			<ul>
			<?php	$query1=$mysqli->query("select * from `tree` where `upline`='".$res1->user."' order by position");
					while($res2=mysqli_fetch_object($query1)){
					$pro2=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res2->user_id."'"));
					$mem2=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res2->user_id."'"));	
					?>
				<li> P<?php echo $res2->position; ?> C<?php echo $res2->club; ?><br>                                      <!--P 1-->
					<a href="member_edit.php?userid=<?php echo $res2->user_id; ?>"><font color=blue>
					<?php $b='Empty' ; if($res2->user==''){echo $b ;}else{echo $res2->user;}?></font>
					<br><img <?php if($res2->user_id==$_GET['userid']){ ?>height="25"<?php }else{ ?>height="15" <?php } ?> src="../member/images/avatar/<?php if($pro2->photo!=''){echo $pro2->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro2->fname!=''){echo $pro2->fname;}else{echo $mem2->log_id;}?>" title="<?php if($pro2->fname!=''){echo $pro2->fname.' '.$pro2->lname;}else{echo $mem2->log_id;}?>" class="profile-photo-md" />
								<?php echo "<br>";
				if($res2->package==1){echo $star1;}
			elseif($res2->package==2){echo $star2;}
			elseif($res2->package==3){echo $star3;}
			elseif($res2->package==4){echo $star4;}
			elseif($res2->package==5){echo $star5;}
			elseif($res2->package==6){echo $star6;}
			elseif($res2->package==7){echo $star7;}
			elseif($res2->package==8){echo $star8;}
			elseif($res2->package==9){echo $star9;}
		    elseif($res2->package==10){echo $star10;}
								   else{}
			?>
					</a>
				
				</li> 
					<?php } ?>
					
			</ul>
		</li>
	</ul>
</div>
</td></tr></table>


            </div>
			
                             
                            </div>	
				<!-- /. Main Content Area  -->
				</div>
			</div>
			<div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">  <a href="member.php">Member Profile Update</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<div class="col-lg-12">

                                        <div class="uprofile-content">
                                            
<div class="row">
							<div class="col-xs-12">
								<form action="member_edit_act.php" method="post" class="form-horizontal">
									<div class="form-group">
										<?php if(isset($_SESSION['msg1'])){ echo "<button class='btn btn-success btn-block'>".$_SESSION['msg1']."</button> ";} ?>
					<?php if(isset($_SESSION['msg0'])){ echo "<button class='btn btn-danger btn-block'>".$_SESSION['msg0']."</button> "; } ?>				
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Level<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php
$userid=$mysqli->real_escape_string($_GET['userid']);
$pro=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='".$userid."'"));
$tre=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` WHERE `user_id`='".$userid."'"));
		if($cus->team==0){ 
			require('../member/star.php');
			if($tre->package==1){$lavelcolor='info';}
			if($tre->package==2){$lavelcolor='primary';}
			if($tre->package==3){$lavelcolor='success';}
			if($tre->package==4){$lavelcolor='warning';}
			echo"<span class='badge badge-$lavelcolor'>";
			if($tre->package==1){echo $star1;}
			elseif($tre->package==2){echo $star2;}
			elseif($tre->package==3){echo $star3;}
			elseif($tre->package==4){echo $star4;}
			elseif($tre->package==5){echo $star5;}
			elseif($tre->package==6){echo $star6;}
			elseif($tre->package==7){echo $star7;}
			elseif($tre->package==8){echo $star8;}
			elseif($tre->package==9){echo $star9;}
		    elseif($tre->package==10){echo $star10;}
			else{}
		echo"</span>"; } ?>
										</div>
								
										<label class="col-sm-3 control-label">Package<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php
	$planup=mysqli_fetch_object($mysqli->query("select * from `planup` where `user_id`='".$userid."' order by serial desc limit 1 "));
	$pla=mysqli_fetch_object($mysqli->query("select * from `plan` where `serial`='$planup->plan'"));
	$planupchk=mysqli_num_rows($mysqli->query("select * from `planup` where `user_id`='".$userid."'"));
	$mem = mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$userid."' "));	
		if($planupchk>0){
				if($pla->name=="Silver"){$packcolor='primary';}
				if($pla->name=="Bronze"){$packcolor='orange';}
				if($pla->name=="Gold"){$packcolor='warning';}
				if($pla->name=="Diamond"){$packcolor='purple';}
				echo" <span class='badge badge-$packcolor'>";
				if($pla->name!=''){echo $pla->name;}
				echo"</span>";
			}else{
				
				
				$q_plan=$mysqli->query("select * from `plan`");
				while($res_plan=mysqli_fetch_object($q_plan)){
					if($res_plan->name=="Silver"){$packcolor='primary';}
					if($res_plan->name=="Bronze"){$packcolor='orange';}
					if($res_plan->name=="Gold"){$packcolor='warning';}
					if($res_plan->name=="Diamond"){$packcolor='purple';}
					
					echo" <span class='badge badge-$packcolor'>";
					if($mem->point==$res_plan->plan){echo $res_plan->name;}
					echo"</span>";
				}
			} ?>
										</div>
										</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Joining Category<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php
		if($mem->stype==1){$clubcolor='primary'; $club_name='Happy';}
			if($mem->stype==2){$clubcolor='success'; $club_name='Regular';}
			if($mem->stype==3){$clubcolor='warning'; $club_name='Lucky';}
echo" <span class='badge badge-$clubcolor'>";
					echo $club_name."-".$mem->position;
					echo"</span>";
			?>
										</div>
									
										<label class="col-sm-3 control-label">Club<font color="#990000">*</font></label>
										<div class="col-sm-3">	
												<?php
		if($tre->club<3){$clubcolor='primary'; $club_name='Happy';}
			if($tre->club>2 && $tre->club<5){$clubcolor='success'; $club_name='Regular';}
			if($tre->club>4){$clubcolor='warning'; $club_name='Lucky';}
echo" <span class='badge badge-$clubcolor'>";
					echo $tre->club;
					echo"</span>";
			?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Sponsor Id<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php
$spo = mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$mem->sponsor."' "));
											echo $spo->log_id;?>
										</div>
								
										<label class="col-sm-3 control-label">Upline Id<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php echo $tre->upline;?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Dealer Id<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php 
							$agn = mysqli_fetch_object($mysqli->query("select * from `dealer` where `user_id`='".$mem->agent_id."' "));	
											echo $agn->log_id;?>
										</div>
								
										<label class="col-sm-3 control-label">Joining Date<font color="#990000">*</font></label>
										<div class="col-sm-3">	
											<?php echo $mem->date;?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">NID<font color="#990000">*</font></label>
										<div class="col-sm-3">	
										<input type="number" name="nid" class="col-sm-3 form-control" placeholder="Enter your NID" value="<?php echo $pro->nid;?>" />
										</div>
								
										<label class="col-sm-3 control-label">Mobile<font color="#990000">*</font></label>
										<div class="col-sm-3">	
										<?php echo $pro->mobile;?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">E-Mail<font color="#990000">*</font></label>
										<div class="col-sm-9">				
											<?php echo $pro->email;?>
										</div>
									</div>
			
									
								<div class="form-group">
										<label class="col-sm-3 control-label">First Name</label>
										<div class="col-sm-<?php if($pro->fnamec==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="fname" class="col-sm-3 form-control" placeholder="name" value="<?php echo $pro->fname;?>" />
										</div>
										<?php if($pro->fnamec==0){?>
										<button type="submit" name="fnamec" class="btn btn-success btn-lg btn-xs">Update</button>
										<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-<?php if($pro->lnamec==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="lname" class="form-control" placeholder="name" value="<?php echo $pro->lname;?>" />
										</div>
										<?php if($pro->lnamec==0){?>
										<button type="submit" name="lnamec" class="btn btn-success btn-lg btn-xs">Update</button> 
									<?php } ?>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Father&rsquo;s Name</label>
										<div class="col-sm-<?php if($pro->fatherc==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="father" class="form-control" placeholder="Father Name" value="<?php echo $pro->father;?>" />
										</div>
										<?php if($pro->fatherc==0){?>
										<button type="submit" name="fatherc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Mother&rsquo;s Name</label>
										<div class="col-sm-<?php if($pro->motherc==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="mother" class="form-control" placeholder="Mother Name" value="<?php echo $pro->mother;?>" />
										</div>
										<?php if($pro->motherc==0){?>
										<button type="submit" name="motherc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Date Of Birth</label>
										<div class="col-sm-5">
											<select name="bday" class="form-control">
											<?php  
												for ($bday = 1; $bday <= 31; $bday++) { ?>
												  <option <?php if($pro->bday==$bday){echo"selected";} ?>  ><?php echo $bday; ?> </option>
												<?php } ?> 
											
											</select>
										</div>
										<div class="col-sm-4">	
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
										
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>	
									<div class="col-sm-<?php if($pro->birthc==0){echo "6";}else{echo "9";}?>">	
	
											<select name="byear" class="form-control">
											<?php  
												for ($byear = 1950; $byear <= 2005; $byear++) { ?>
												  <option <?php if($pro->byear==$byear){echo"selected";} ?>  ><?php echo $byear; ?> </option>
												<?php } ?> 
											
											</select>
										</div>
										<?php if($pro->birthc==0){?>
									<button type="submit" name="birthc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Address<font color="#990000">*</font></label>
										<div class="col-sm-<?php if($pro->addressc==0){echo "6";}else{echo "9";}?>">				
											<textarea rows="3" type="text" name="address" class="form-control" placeholder="Address"><?php echo $pro->address;?></textarea>
										</div>
										<?php if($pro->addressc==0){?>
										<button type="submit" name="addressc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Zip Code</label>
										<div class="col-sm-<?php if($pro->zipc==0){echo "6";}else{echo "9";}?>">				
											<input type="number" name="zip" class="form-control" placeholder="Zip Code" value="<?php echo $pro->zip;?>" />
										</div>
										<?php if($pro->zipc==0){?>
										<button type="submit" name="zipc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Post Code</label>
										<div class="col-sm-<?php if($pro->postalc==0){echo "6";}else{echo "9";}?>">				
											<input type="text" name="postal" class="form-control" placeholder="Post Code" value="<?php echo $pro->postal;?>" />
										</div>
										<?php if($pro->postalc==0){?>
										<button type="submit" name="postalc" class="btn btn-success btn-lg btn-sm">Update</button> 
									<?php } ?>
									</div>
									<div class="form-group">
									
									<div class="col-sm-4"></div>
									<div class="col-sm-4">
									<?php if($pro->profilec==0){?>
										<button type="submit" name="update2" class="btn btn-success btn-lg btn-block">Update All</button>
									<?php } ?>
									<input type="number" name="memberid" value="<?php echo $userid;?>" hidden />
									
									<button type="submit" name="adminUpBtn" class="btn btn-success btn-lg btn-block">Admin Update Button</button>
									</div>
									</div>
								</form>
								
							</div><!-- /.col-xs-10 -->
						</div><!-- /.row -->
					</div><!-- /.uprofile-content -->
                 </div><!-- /.col-md-9 -->
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
<?php unset($_SESSION['msg0']);unset($_SESSION['msg1']);?>
<?php } ?>