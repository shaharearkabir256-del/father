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
    <title><?php echo $page='Setting';?></title>
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
            Developer Portal
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"> Developer Portal</li>
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
				 <?php
					  $id=$_SESSION['AdminUserId'];
						$setting=mysqli_fetch_object($mysqli->query("SELECT * FROM `setting` where `user_id`='$id'")); ?>
	<h3 class="box-title">Setting Changed | Last Update: <?php echo $setting->sdate;?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<!-- Main Content Area -->
				
				
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
/*
SELECT `serial`, `user_id`, `mem_prod_delivery_charge`, `mem_prod_delivery_charge1`, `mem_prod_delivery_charge1p`, `mem_prod_delivery_charge2`, 
`mem_prod_delivery_charge2ps`, `mem_prod_delivery_charge3`, `mem_prod_delivery_charge3ps`, `mem_prod_delivery_charge_discount`, `mem_join_lim`, 
`mem_join_spot_cash_wallet`, `mem_join_spot_upgrade_wallet`, `mem_join_spot_shopping_wallet`, `mem_trx_lim`, `mem_trx_tax`, `mem_trx_shop_lim`, 
`mem_trx_shop_tax`, `mem_trx_agent_com`, `mem_trx_uw_com`, `mem_trx_upazila_com`, `mem_trx_district_com`, `mem_trx_zone_com`, `mem_trx_donation_fund`,
 `mem_trx_company_fund`, `mem_trx_account`, `mem_wit_lim`, `mem_wit_tax`, `mem_wit_agent_com`, `mem_wit_uw_com`, `mem_wit_upazila_com`, 
 `mem_wit_district_com`, `mem_wit_zone_com`, `mem_wit_donation_fund`, `mem_wit_company_fund`, `mem_wit_account`, `mem_join_spot_com`, 
 `mem_join_spot_com2`, `mem_join_spot_com3`, `mem_join_agent_com`, `mem_join_uw_com`, `mem_join_upazila_com`, `mem_join_district_com`, 
 `mem_join_zone_com`, `mem_join_donation_fund`, `mem_join_company_fund`, `mem_join_account`, `mem_matching_lim`, `mem_matching_sponsor_royalty`,
 `mem_club0`, `mem_club1`, `mem_club2`, `mem_club3`, `mem_club4`, `mem_club5`, `mem_club6`, `mem_level_up_cost`, `mem_level_up1`, `mem_level_up2`,
 `mem_level_up3`, `mem_level_up4`, `mem_level_up5`, `mem_level_up6`, `mem_level_up7`, `mem_level_up8`, `mem_level_up9`, `g1`, `g2`, `g3`, `g4`, `g5`,
 `g6`, `g7`, `g8`, `g9`, `g10`, `g11`, `g12`, `g13`, `g14`, `g15`, `sdate` FROM `setting` WHERE 1
*/
							?>
				
				
    <form class="form-horizontal" action="setting_act.php" method="post">
	<fieldset>
      <legend>Member Joining:</legend>
        <div class="form-group">
             <label for="password" class="col-sm-2 control-label">Regular Spot Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_spot_com" value="<?php echo $setting->mem_join_spot_com;?>" class="form-control">
            </div>
        
             <label for="password" class="col-sm-2 control-label">Happy Spot Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_spot_com2" value="<?php echo $setting->mem_join_spot_com2;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">Lucky Spot Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_spot_com3" value="<?php echo $setting->mem_join_spot_com3;?>" class="form-control">
            </div>
             </div>
        <div class="form-group">
             <label for="password" class="col-sm-2 control-label">Cash Wallet %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_spot_cash_wallet" value="<?php echo $setting->mem_join_spot_cash_wallet;?>" class="form-control">
            </div>
        
             <label for="password" class="col-sm-2 control-label">Upgrade Wallet %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_spot_upgrade_wallet" value="<?php echo $setting->mem_join_spot_upgrade_wallet;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">Shopping Wallet %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_spot_shopping_wallet" value="<?php echo $setting->mem_join_spot_shopping_wallet;?>" class="form-control">
            </div>
             </div>
			 </fieldset>
			 <fieldset>
      <legend>Member Joining Dealer Commission:</legend>
         <div class="form-group">
		 <label for="password" class="col-sm-2 control-label">Merchant Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_merchant_com" value="<?php echo $setting->mem_join_merchant_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">Agent Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_agent_com" value="<?php echo $setting->mem_join_agent_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">DSO Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_uw_com" value="<?php echo $setting->mem_join_uw_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">SDH Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_upazila_com" value="<?php echo $setting->mem_join_upazila_com;?>" class="form-control">
            </div>
            </div>
        <div class="form-group">
             <label for="password" class="col-sm-2 control-label">DH Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_district_com" value="<?php echo $setting->mem_join_district_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">MDH Commission %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_zone_com" value="<?php echo $setting->mem_join_zone_com;?>" class="form-control">
            </div>
            </div>
		<div class="form-group">
             <label for="password" class="col-sm-2 control-label">Donation Fund %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_donation_fund" value="<?php echo $setting->mem_join_donation_fund;?>" class="form-control">
            </div>
          
        
             <label for="password" class="col-sm-2 control-label">Company /Gift  Fund %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_join_company_fund" value="<?php echo $setting->mem_join_company_fund;?>" class="form-control">
            </div>
			<label for="password" class="col-sm-2 control-label">Total %:</label>
            <div class="col-sm-2">
                <p class="form-control"><?php echo $mjdcTotal=($setting->mem_join_agent_com+$setting->mem_join_uw_com+$setting->mem_join_upazila_com+$setting->mem_join_district_com+$setting->mem_join_zone_com+$setting->mem_join_donation_fund+$setting->mem_join_company_fund);?>
           </p> </div>
             <!--<label for="password" class="col-sm-2 control-label">Matching limit</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_matching_lim" value="<?php echo $setting->mem_matching_lim;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">Matching Spot Royalty</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_matching_sponsor_royalty" value="<?php echo $setting->mem_matching_sponsor_royalty;?>" class="form-control">
            </div>-->
             
         </div>
		 </fieldset>
    <fieldset>
      <legend>Member Balance Transaction Limit & Service Charge:</legend>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Transaction limit</label>
            <div class="col-sm-2">
			<input id="password" type="number" name="mem_join_lim" value="<?php echo $setting->mem_join_lim;?>" hidden >
                <input id="password" type="number" name="mem_trx_lim" value="<?php echo $setting->mem_trx_lim;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">Transaction Service Charge %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_tax" value="<?php echo $setting->mem_trx_tax;?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
             <label for="password" class="col-sm-2 control-label"> Withdraw limit</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_lim" value="<?php echo $setting->mem_wit_lim;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">Withdraw Service Charge %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_tax" value="<?php echo $setting->mem_wit_tax;?>" class="form-control">
            </div>
			
             </div>
			 <div class="form-group">
             <label for="password" class="col-sm-2 control-label">Shopping limit</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_shop_lim" value="<?php echo $setting->mem_trx_shop_lim;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">Shopping>Cash Service Charge %</label> 
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_shop_tax" value="<?php echo $setting->mem_trx_shop_tax;?>" class="form-control">
            </div>
			
             </div>
    </fieldset>
    
		 <fieldset>
      <legend>Point Sale Dealer Commission:</legend>
         <div class="form-group">
             <label for="password" class="col-sm-2 control-label">Agent  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_agent_com" value="<?php echo $setting->mem_trx_agent_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">DSO  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_uw_com" value="<?php echo $setting->mem_trx_uw_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">SDH  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_upazila_com" value="<?php echo $setting->mem_trx_upazila_com;?>" class="form-control">
            </div>
            </div>
        <div class="form-group">
             <label for="password" class="col-sm-2 control-label">DH  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_district_com" value="<?php echo $setting->mem_trx_district_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">MDH  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_zone_com" value="<?php echo $setting->mem_trx_zone_com;?>" class="form-control">
            </div>
			
         </div>
		
		  <div class="form-group">
		 <label for="password" class="col-sm-2 control-label">Donation Fund %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_donation_fund" value="<?php echo $setting->mem_trx_donation_fund;?>" class="form-control">
            </div>

             <label for="password" class="col-sm-2 control-label">Company /Gift  Fund %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_trx_company_fund" value="<?php echo $setting->mem_trx_company_fund;?>" class="form-control">
            </div>
			<label for="password" class="col-sm-2 control-label">Total %:</label>
            <div class="col-sm-2">
               <p class="form-control"> <?php echo $dtcTotal=($setting->mem_trx_agent_com+$setting->mem_trx_uw_com+$setting->mem_trx_upazila_com+$setting->mem_trx_district_com+$setting->mem_trx_zone_com+$setting->mem_trx_donation_fund+$setting->mem_trx_company_fund);?>
            </p></div>
            </div>
		 </fieldset>
		  <fieldset>
      <legend>Member Withdraw Dealer Commission:</legend>
         <div class="form-group">
             <label for="password" class="col-sm-2 control-label">Agent  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_agent_com" value="<?php echo $setting->mem_wit_agent_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">DSO  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_uw_com" value="<?php echo $setting->mem_wit_uw_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">SDH  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_upazila_com" value="<?php echo $setting->mem_wit_upazila_com;?>" class="form-control">
            </div>
            </div>
        <div class="form-group">
             <label for="password" class="col-sm-2 control-label">DH  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_district_com" value="<?php echo $setting->mem_wit_district_com;?>" class="form-control">
            </div>
             <label for="password" class="col-sm-2 control-label">MDH  %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_zone_com" value="<?php echo $setting->mem_wit_zone_com;?>" class="form-control">
            </div>
         </div>
		  <div class="form-group">
		 <label for="password" class="col-sm-2 control-label">Donation Fund %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_donation_fund" value="<?php echo $setting->mem_wit_donation_fund;?>" class="form-control">
            </div>

             <label for="password" class="col-sm-2 control-label">Company /Gift  Fund %</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_wit_company_fund" value="<?php echo $setting->mem_wit_company_fund;?>" class="form-control">
            </div>
			<label for="password" class="col-sm-2 control-label">Total %: </label>
            <div class="col-sm-2">
              <p class="form-control">  <?php echo $mwcTotal=($setting->mem_wit_agent_com+$setting->mem_wit_uw_com+$setting->mem_wit_upazila_com+$setting->mem_wit_district_com+$setting->mem_wit_zone_com+$setting->mem_wit_donation_fund+$setting->mem_wit_company_fund);?>
            </p></div>
            </div>
		 </fieldset>
         <fieldset>
      <legend>Member Daily Payment:</legend>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Club Member</label>
            <div class="col-sm-10">
                <input id="password" type="number" name="mem_club0" value="<?php echo $setting->mem_club0;?>" class="form-control">
            </div>
        </div>
         <div class="form-group">
            <label for="password" class="col-sm-2 control-label">First Club</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_club1" value="<?php echo $setting->mem_club1;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">Second Club</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_club2" value="<?php echo $setting->mem_club2;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">Third Club</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_club3" value="<?php echo $setting->mem_club3;?>" class="form-control">
            </div>
        </div>
         <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Fourth Club</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_club4" value="<?php echo $setting->mem_club4;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">Fifth Club</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_club5" value="<?php echo $setting->mem_club5;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">Sixth Club</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_club6" value="<?php echo $setting->mem_club6;?>" class="form-control">
            </div>
        </div>
		<div class="form-group">
            <label for="password" class="col-sm-2 control-label">Level Up Cost</label>
            <div class="col-sm-10">
                <input id="password" type="number" name="mem_level_up_cost" value="<?php echo $setting->mem_level_up_cost;?>" class="form-control">
            </div>
		</div>	
		
			<div class="form-group">
            <label for="password" class="col-sm-2 control-label">2nd Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up1" value="<?php echo $setting->mem_level_up1;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">3rd Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up2" value="<?php echo $setting->mem_level_up2;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">4th Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up3" value="<?php echo $setting->mem_level_up3;?>" class="form-control">
            </div>
        </div>
		
		<div class="form-group">
		 <label for="password" class="col-sm-2 control-label">5th Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up4" value="<?php echo $setting->mem_level_up4;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">6th Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up5" value="<?php echo $setting->mem_level_up5;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">7th Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up6" value="<?php echo $setting->mem_level_up6;?>" class="form-control">
            </div>
        </div>
		<div class="form-group">
            <label for="password" class="col-sm-2 control-label">8th Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up7" value="<?php echo $setting->mem_level_up7;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">9th Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up8" value="<?php echo $setting->mem_level_up8;?>" class="form-control">
            </div>
			<label for="password" class="col-sm-2 control-label">10th Level</label>
            <div class="col-sm-2">
                <input id="password" type="number" name="mem_level_up9" value="<?php echo $setting->mem_level_up9;?>" class="form-control">
            </div>
        </div>
    </fieldset>   
    <fieldset>
      <legend>Generation Commisssion:</legend>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">1st</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g1" value="<?php echo $setting->g1;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">2nd</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g2" value="<?php echo $setting->g2;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">3rd</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g3" value="<?php echo $setting->g3;?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">4th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g4" value="<?php echo $setting->g4;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">5th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g5" value="<?php echo $setting->g5;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">6th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g6" value="<?php echo $setting->g6;?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">7th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g7" value="<?php echo $setting->g7;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">8th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g8" value="<?php echo $setting->g8;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">9th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g9" value="<?php echo $setting->g9;?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">10th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g10" value="<?php echo $setting->g10;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">11th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g11" value="<?php echo $setting->g11;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">12th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g12" value="<?php echo $setting->g12;?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">13th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g13" value="<?php echo $setting->g13;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">14th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g14" value="<?php echo $setting->g14;?>" class="form-control">
            </div>
            <label for="password" class="col-sm-2 control-label">15th</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="g15" value="<?php echo $setting->g15;?>" class="form-control">
            </div>
        </div>
        </fieldset> 
		 <fieldset>
      <legend>Member Product Delivery Charge:</legend>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Charge</label>
            <div class="col-sm-2">
                <input  type="double" name="mem_prod_delivery_charge" value="<?php echo $setting->mem_prod_delivery_charge;?>" class="form-control">
            </div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label"> Point >= <?php echo $setting->mem_prod_delivery_charge1p;?></label>
            <div class="col-sm-2">
                <input  type="double" name="mem_prod_delivery_charge1p" value="<?php echo $setting->mem_prod_delivery_charge1p;?>" class="form-control">
            </div>
			<label for="password" class="col-sm-2 control-label">Discount One %</label>
            <div class="col-sm-2">
                <input  type="double" name="mem_prod_delivery_charge1" value="<?php echo $setting->mem_prod_delivery_charge1;?>" class="form-control">
            </div>
        </div>
		<div class="form-group">	
			<label for="password" class="col-sm-2 control-label">Point >= <?php echo $setting->mem_prod_delivery_charge2ps;?></label>
            <div class="col-sm-2">
                <input  type="double" name="mem_prod_delivery_charge2ps" value="<?php echo $setting->mem_prod_delivery_charge2ps;?>" class="form-control">
            </div>
			<label for="password" class="col-sm-2 control-label">Discount Two %</label>
            <div class="col-sm-2">
                <input  type="double" name="mem_prod_delivery_charge2" value="<?php echo $setting->mem_prod_delivery_charge2;?>" class="form-control">
            </div>
			
            <!--<label for="password" class="col-sm-2 control-label">Discount</label>
            <div class="col-sm-2">
                <input id="password" type="double" name="mem_prod_delivery_charge_discount" value="<?php echo $setting->mem_prod_delivery_charge_discount;?>" class="form-control">
            </div>-->
             
        </div>
		<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Point>=<?php echo $setting->mem_prod_delivery_charge3ps;?></label>
            <div class="col-sm-2">
                <input  type="double" name="mem_prod_delivery_charge3ps" value="<?php echo $setting->mem_prod_delivery_charge3ps;?>" class="form-control">
            </div>
			<label for="password" class="col-sm-2 control-label">Discount Three %</label>
            <div class="col-sm-2">
                <input  type="double" name="mem_prod_delivery_charge3" value="<?php echo $setting->mem_prod_delivery_charge3;?>" class="form-control">
            </div>
        </div>
        
        </fieldset> 
        <fieldset><legend>API:</legend>
        	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">SMS</label>
            <div class="col-sm-4">
                <input  type="password" name="sms" value="<?php echo $setting->api_sms; ?>" class="form-control">
            </div>
			<label for="password" class="col-sm-2 control-label">Recharge</label>
            <div class="col-sm-4">
                <input  type="password" name="recharge" value="<?php echo $setting->api_recharge;?>" class="form-control">
            </div>
        </div>
        
        </fieldset>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Pin</label>
            <div class="col-sm-10">
                <input id="password" type="password" name="password" class="form-control">
            </div>
        </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-block btn-primary">Upgrade</button>
    </div>
  </div>
</form>
				
				
				
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
<?php unset($_SESSION['msg']);unset($_SESSION['msgs']);?>
<?php unset($_SESSION['pmsg']);unset($_SESSION['pmsgs']);?>
<?php } ?>