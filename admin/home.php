<?php require('session.php'); require('auth_ad.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Panel | Dashboard</title>
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
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
		

        <!-- Main content -->
        <section class="content">
		<div class="row">
		<div class="col-md-4">
          <!-- Info Boxes Style 2 -->
		 <?php if($adm->type==0 || $adm->type==1 || $adm->type==2){ ?>
		<a href="transfer.php"> 
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Topup Balance</span>
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
		  </a>
          <!-- /.info-box -->
		  <?php } if($adm->type==0 || $adm->type==1){ ?>
		
		  <a href="recharge.php"> 
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Recharge Balance</span>
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
		  </a>
		  <?php } ?>
		  <?php if($adm->type==0 || $adm->type==1 || $adm->type==2){ ?>
          <!-- /.info-box -->
		  <a href="payments.php"> 
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Cash Payments</span>
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
		  </a>
          <!-- /.info-box -->
		  <a href="bal_service_charge.php?pageName=Service Charge"> 
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Service Charge</span>
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
		  </a>
		  <?php } ?>
          <!-- /.info-box -->

        </div>
		<div class="col-md-4">
          <!-- Info Boxes Style 2 -->
		  <?php if($adm->type==0 || $adm->type==1){ ?>
		<a href="member_customer.php"> 
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Customer Point</span>
              <span class="info-box-number"><?php echo $cus->cpoint*1;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  </a>
          <!-- /.info-box -->
		  <a href="member_customer_to_member.php"> 
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Customer To Member</span>
              <span class="info-box-number"><?php echo $customem->ctmpoint*1;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  </a>
		   <?php } ?>
          <!-- /.info-box -->
		  <?php if($adm->type==0 || $adm->type==1 || $adm->type==2){ ?>
		  <a href="#"> 
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Donation Fund</span>
              <span class="info-box-number"><?php echo $fund->donation;?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  </a>
          <!-- /.info-box -->
		  <a href="#"> 
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Company Fund / Gift</span>
              <span class="info-box-number"><?php echo $gift=($fund->company-$gift->trxamnt);?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  </a>
          <!-- /.info-box -->
		  <?php }?>
        </div>
		
		<div class="col-md-4">
          <!-- Info Boxes Style 2 -->
		  <?php if($adm->type==0 || $adm->type==1 || $adm->type==2){ ?>
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
         
		  <a href="mlm_generation.php?pageName=Generation"> 
          <div style="display:block;" class="info-box bg-green">
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
            
          </div>
		  </a>
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
		  <?php } ?>
          <!-- /.info-box -->
          <div style="display:block;" class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Product Sales Amount</span>
              <span class="info-box-number"><?php echo $sales->amnt*1;?></span>

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
		</div>

          <!-- Default box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     <?php require_once 'footer.php';?>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->

    <!-- FastClick -->

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

  </body>
</html>