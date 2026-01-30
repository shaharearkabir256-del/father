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
    <title><?php echo $page;?></title>
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
                  <h3 class="box-title"><?php echo $page;?></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
				
			<?php 
				if(isset($_GET['userid'])){$sql1=" AND `user_id`='".$_GET['userid']."' ";}
				$n=1;
				$count =mysqli_num_rows($mysqli->query("SELECT * FROM `member`"));
				$total_items= mysqli_num_rows($t);									
				if((!$limit)||(is_numeric($limit)==false)){$limit=3;}
				if((!$page)||(is_numeric($page)==false)){$page=1;}
				$total=ceil($count/$limit);
				$set=(($page*$limit)-$limit);
				$query=$mysqli->query("SELECT * FROM `member` where `team`!=1 $sql1 ORDER BY serial DESC LIMIT $set, $limit ");
				while($mem=mysqli_fetch_object($query)){
				$bal = mysqli_fetch_object($mysqli->query("select * from `balance` where `user_id`='".$mem->user_id."' "));
				$pro = mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$mem->user_id."' "));
				$tre = mysqli_fetch_object($mysqli->query("select `package` from `tree` where `user_id`='".$mem->user_id."' "));
				$inv=mysqli_fetch_object($mysqli->query("select sum(invest)AS amnt from `invest` where `invest_id`='".$mem->user_id."' "));
				$planup=mysqli_fetch_object($mysqli->query("select * from `planup` where `user_id`='".$mem->user_id."' order by serial desc limit 1 "));
				$pla=mysqli_fetch_object($mysqli->query("select * from `plan` where `serial`='$planup->plan'"));
				$planupchk=mysqli_num_rows($mysqli->query("select * from `planup` where `user_id`='".$mem->user_id."'"));
			?>
  
        <div class="col-md-4" style="border:1px solid #f0f5f5;">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <div class="widget-user-image text-center">
                <img class="img-circle" src="../member/images/avatar/<?php echo $pro->photo; ?>" width="30%" class="img-thumbnail" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username text-center"><?php echo $pro->fname." ".$pro->lname; ?></h3>
              <h5 class="widget-user-desc text-center"><?php echo $mem->log_id; ?></h5>
              <h5 class="widget-user-desc text-center"><?php echo $pro->mobile; ?></h5>
              <h5 class="widget-user-desc text-center"><?php echo $pro->email; ?></h5>
            </div>
			<div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $bal->product;?></h5>
                    <span class="description-text">SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $bal->balance_purchase_point; ?></h5>
                    <span class="description-text">PURCHASE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $profit=($bal->direct+$bal->gen+$bal->daily+$bal->matching); ?></h5>
                    <span class="description-text">PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Level 
				<?php 
				require('../member/star.php');
				if($tre->package==1){$lavelcolor='aqua';}
			if($tre->package==2){$lavelcolor='blue';}
			if($tre->package==3){$lavelcolor='green';}
			if($tre->package==4){$lavelcolor='yellow';}
			echo"<span class='pull-right badge bg-$lavelcolor'>";
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
			else{} ?>
				</span></a></li>
                <li><a href="#">Package <?php 
				if($planupchk>0){
				if($pla->name=="Silver"){$packcolor='aqua';}
				if($pla->name=="Bronze"){$packcolor='orange';}
				if($pla->name=="Gold"){$packcolor='yellow';}
				if($pla->name=="Diamond"){$packcolor='purple';}
				echo" <span class='pull-right badge bg-$packcolor'>";
				if($pla->name!=''){
					
					echo $pla->name;
					
					}
				echo"</span>";
			}else{
				
				
				$q_plan=$mysqli->query("select * from `plan`");
				while($res_plan=mysqli_fetch_object($q_plan)){
					if($res_plan->name=="Silver"){$packcolor='aqua';}
					if($res_plan->name=="Bronze"){$packcolor='orange';}
					if($res_plan->name=="Gold"){$packcolor='yellow';}
					if($res_plan->name=="Diamond"){$packcolor='purple';}
					
					echo" <span class='pull-right badge bg-$packcolor'>";
					if($mem->point==$res_plan->plan){
						
						echo $res_plan->name;
						
						}
					echo"</span>";
				}
			} ?>
				</span></a></li>
                <li><a href="#">Club
				<?php
				if($mem->stype==1){$clubcolor='aqua'; $club_name='Happy';}
			if($mem->stype==2){$clubcolor='green'; $club_name='Regular';}
			if($mem->stype==3){$clubcolor='yellow'; $club_name='Lucky';}

			echo" <span class='pull-right badge bg-$clubcolor'>";
					echo $club_name."-".$mem->position;
					echo"</span>";
				?>
				</span></a></li>

              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
		<?php if(isset($_GET['userid'])){ ?>
		<div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Transaction</span>
              <span class="info-box-number"><?php echo $bal->pay_bal;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Received</span>
              <span class="info-box-number"><?php echo $bal->rec_bal;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Withdraw</span>
              <span class="info-box-number"><?php echo $bal->withdraw;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tax</span>
              <span class="info-box-number"><?php echo $bal->tax;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

        </div>
		<div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sponsor Com</span>
              <span class="info-box-number"><?php echo $bal->direct;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Generation Com</span>
              <span class="info-box-number"><?php echo $bal->gen;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Daily Com</span>
              <span class="info-box-number"><?php echo $bal->daily;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Matching</span>
              <span class="info-box-number"><?php echo $bal->matching;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

        </div>
   		<?php
$sponsor=mysqli_fetch_object($mysqli->query("SELECT count(user_id) AS `member` FROM `tree` WHERE `sponsor`='".$mem->user_id."' "));
$downline=mysqli_fetch_object($mysqli->query("SELECT count(user_id) AS `member` FROM `tree` WHERE `upline`='".$mem->log_id."' "));
$gen=mysqli_fetch_object($mysqli->query("SELECT * FROM `gen` WHERE `user_id`='".$mem->user_id."' "));
?>
		 <div class="col-md-12"> 
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sponsor</span>
              <span class="info-box-number"><?php echo $sponsor->member;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Generation</span>
              <span class="info-box-number"><?php if($gen->c_all>0){echo $gen->c_all;}else{echo"0";}?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->

        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downline</span>
              <span class="info-box-number"><?php echo $downline->member;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Customer</span>
              <span class="info-box-number"><?php echo $bal->customer;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cash Wallet</span>
              <span class="info-box-number"><?php echo $bal->net_bal;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Shopping  Wallet</span>
              <span class="info-box-number"><?php echo $bal->shopping;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cloud-upload-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Upgrade Wallet</span>
              <span class="info-box-number"><?php echo $bal->stepup;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Available Customer</span>
              <span class="info-box-number"><?php echo $bal->customer;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
        <!-- /.col -->

	<?php 	}  } ?>

	<?php if(!isset($_GET['userid'])){ include("pagination.php");}?>	
	
				
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