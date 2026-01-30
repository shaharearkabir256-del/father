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
    <title>Fund</title>
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
            Fund
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Fund</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
	<div class="row">
        <!-- left column -->
       
		<div class="col-md-12">
		  
		 <div class="box box-info">
             <div class="box">
  
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
<div class="col-md-6 col-sm-6 col-xs-6">

									<table class="table table-hover">
									<thead><th><h1>Instant Pay</h1></th></thead>
										<?php 
									$com=mysqli_fetch_object($mysqli->query("SELECT * FROM commission"));
									
				
			?>
										<tr><th>spot</th><td>%</td><td> <?php echo $com->spot?></td></tr>
										<tr><th>Matching</th><td>%</td><td> <?php echo $com->matching?></td></tr>
										<tr><th>Generation</th><td>%</td><td> <?php echo $com->gen?></td></tr>
										<tr><th>Monthly</th><td>%</td><td> <?php echo $com->monthly?></td></tr>
										   
										<tr><th>Incentive</th><td>%</td><td> <?php echo $com->incentive?></td></tr>
										
										
										
										<tr><th>Dealer Stockist</th><td>%</td><td> <?php echo $com->dsd?></td></tr>
										<tr><th>Dealer Royalty</th><td>%</td><td> <?php echo $com->royality?></td></tr><!--When Stock Share-->
										
										 <tr><td>Zone</td><td>%</td><td> <?php echo $z=0.20;?></td></tr>
										<tr><td>District</td><td>%</td><td> <?php echo $d=0.30?></td></tr>
										<tr><td>Upozela</td><td>%</td><td> <?php echo $u=0.50?></td></tr>
										<tr><td>Ward/Union</td><td>%</td><td> <?php echo $w=1.00?></td></tr>
										
										
										<tr><th>Dealer Online</th><td>%</td><td><?php echo $online=$com->sponsor+$com->division+$com->district+$com->ps+$com->union+$com->ward?> </td></tr>
                                        <tr><td>Sponsor</td><td>%</td><td> <?php echo $com->sponsor?></td></tr><!--Get Member-->
                                        <tr><td>Zone</td><td>%</td><td> <?php echo $com->division?></td></tr>
										<tr><td>District</td><td>%</td><td> <?php echo $com->district?></td></tr>
										<tr><td>Upozela</td><td>%</td><td> <?php echo $com->ps?></td></tr>
										<tr><td>Ward/Union</td><td>%</td><td> <?php echo $com->union?></td></tr>
										<tr><td>Agent</td><td>%</td><td> <?php echo $com->ward?></td></tr>
                                  
									</table>

								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">

									<table class="table table-hover">
									
										<thead><th><h1>Fund</h1></th></thead>
                                        <tr><th>PSC</th><td>%</td><td> <?php echo $com->psc?></td></tr>
                                        <tr><th>Yearly</th><td>%</td><td> <?php echo $com->yearly?></td></tr>
                                        <tr><th>Distributor</th><td>%</td><td> <?php echo $com->distributor?></td></tr>
                                        <tr><th>Leader Code</th><td>%</td><td> <?php echo $com->lc?></td></tr>
                                        <tr><th>Imagine Achieve Dealer</th><td>%</td><td> <?php echo $com->iad?></td></tr>
                                        <tr><th>Legal Advisor</th><td>%</td><td> <?php echo $com->la?></td></tr>
                                        <tr><th>Welfare Etc</th><td>%</td><td> <?php echo $com->welfare?></td></tr>
										<tr><th>Carrying Charge</th><td>%</td><td> <?php echo $com->caring?></td></tr>
										<tr><th>Medical Fund</th><td>%</td><td> <?php echo $com->medical?></td></tr>
										<tr><th>Advertising</th><td>%</td><td> <?php echo $com->ad?></td></tr>
										<tr><th>Company Fund</th><td>%</td><td> <?php echo $com->company?></td></tr>
							
										
										
									</table>

								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
								<table class="table table-hover">
								<tr><td width="300" colspan="3"></td><th>Total</th><td>%</td><td> 
								<!--SELECT `serial`, `spot`, `matching`,  `royality`, `monthly`, 
									`yearly`, `gen`, `psc`, `incentive`, `distributor`, `lc`, `iad`, `dsd`, `sponsor`, `division`, `district`,
									`ps`, `union`, `ward`, `la`, `welfare`, `caring`, `medical`, `ad`, `company`, `chk` FROM `commission` WHERE 1-->
								
								<?php 
								echo $total=$com->spot+$com->matching+$com->gen+$com->monthly+$com->psc+$com->yearly+$com->incentive+$com->distributor+
								$com->lc+$com->royality+$com->iad+$com->dsd+$online+$com->la+$com->welfare+$com->caring+$com->medical+$com->ad+$com->company;
								?></td></tr>
								</table>
								</div>

							
				
				
				
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

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>

<?php } ?>