<?php
session_start();
if( $_SESSION['DealerLogId'] == ''){ 
		$msg="Please Verify login!";
		header("Location:logout.php");
		exit();
	}
	else{
	    require '../db/db.php';
		$recid=$_SESSION['DealerLogId'];
		require '../db/cal_del.php';
	    $id=$_SESSION['DealerLogId'];
	    $user=$_SESSION['DealerLogId'];
		$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `user_id`='$user'"));
		$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_balance` where `user_id`='".$user."'"));
		$info=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_info` where `user_id`='$user'"));
		//$rec=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_trx` where `rec_id`='$user' type=0 and take=1"));
		//$trx=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_trx` where `send_id`='$user' type=1 and take=1"));
		
	    //$dqty=mysqli_num_rows($mysqli->query("SELECT * FROM dealer"));
		//$ddate=mysqli_num_rows($mysqli->query("SELECT * FROM dealer where date='".$date."'"));
		
		$pqty=mysqli_num_rows($mysqli->query("SELECT * FROM product where chk=1"));
		//$pdate=mysqli_num_rows($mysqli->query("SELECT * FROM product where chk=1 and date='$date'"));
		
		$oqty=mysqli_num_rows($mysqli->query("SELECT * FROM `prod_req` WHERE  `rec_id`='".$user."' "));
		//$orderdate=mysqli_num_rows($mysqli->query("SELECT * FROM `prod_req` where  `rec_id`='".$user."' and `date`='".$date."' WHERE chk='1' "));
		//$sqty=mysqli_num_rows($mysqli->query("SELECT * FROM `invoice`  WHERE type='0' "));
		//$sbal=mysqli_fetch_object($mysqli->query("SELECT SUM(price) as sale FROM `order` WHERE chk='0'"));
		//$sdate=mysqli_num_rows($mysqli->query("SELECT * FROM `order` where `date`='".$date."' WHERE chk='0' "));
	    
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dealer Panel</title>
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
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
		

        <!-- Main content -->
        <section class="content">
		
		 <!-- Small boxes (Stat box) -->
          <div class="row">
		  <?php 
		  $mer_prod=mysqli_fetch_object($mysqli->query("SELECT count(`user_id`)as `prod`, sum(rp*stock)as ppoint  FROM `product` where `user_id`='$id' "));
		  $mer_inv=mysqli_num_rows($mysqli->query("SELECT * FROM `invoice` WHERE `agent_id`='$id' and `type`='1'"));
		  $mer_sale=mysqli_fetch_object($mysqli->query("SELECT count(sponsor)as `salesprod`, sum(tprice)as `salesamnt`, sum(tpoint)as `salespoint` FROM `invoice` WHERE `agent_id`='$id' and `type`='0'"));
		  if($del->type==6){ // Merchant ?>
		  	<!-- ./Stair 1 Product > Order > Sales > Profit-->		
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php echo $mer_prod->ppoint*1; ?></h4>
                  <p>Products(<?php echo $mer_prod->prod; ?>) </p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="merchant_prod_list.php?pageName=Product%20List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php echo $mer_inv?></h4>
                  <p>Invoice </p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="prod_invoice.php?pageName=Invoice%20List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php echo $mer_sale->salespoint.$t; ?></h4>
                  <p>Sales Product(<?php echo $mer_sale->salesprod; ?>)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="merchant_sales_list.php?pageName=Sales%20List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php echo $mer_sale->salesamnt; ?> Taka</h4>
                  <p>Sales Amount</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="merchant_sales_list.php?pageName=Sales%20List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><?php echo $bal->customer; ?> <sup style="font-size: 20px"></sup></h4>
                  <p> Customer(<?php echo $rows_cutomer; ?>)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col 3-->
			<!-- ./col 
			
			<div class="col-lg-3 col-xs-6 hidden">
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><?php //echo $totalsales->agntcom.$t; ?></h4>
                  <p>Merchant Commission</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i> 
                </div>
                <a href="merchant_sales_list.php?pageName=Sales%20List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
			./col -->
			<!-- ./col -->
		  <?php } // Merchant ?>
<?php if($del->type!=6){  // Not Merchant?>		  
		  	<!-- ./Stair 1 Product > Order > Sales > Profit-->					
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php echo $pqty?></h4>
                  <p>Products </p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="prod_req.php?pageName=Products(Company)&&stockActive=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php echo $oqty?></h4>
                  <p>Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="prod_order_list.php?pageName=Product%20Order%20List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php if($totalsales->totalpoin){ echo $totalsales->totalpoin;}else{ echo '0'; }?></h4>
                  <p>Total Sales Point</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="prod_invoice.php?pageName=Invoice%20List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
	<!-- ./Stair 1 -->
	 <?php }  // Not Merchant ?>
		  <!--Staire 2 Balance-->
		   <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><?php echo $rec->amount.$t;  ?> <sup style="font-size: 20px"></sup></h4>
                  <p>Received Balance</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="bal_rec.php?pageName=Received&&BalanceActive=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col 1-->
			<div style="display:block;" class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><?php 
				  if($rec_shop->shop){ echo $rec_shop->shop.$t;}else{ echo '0'.$t; }
				  //echo $rec_shop->shop.$t;  ?> <sup style="font-size: 20px"></sup></h4>
                  <p>Received Balance(Shop)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="bal_rec_shop.php?pageName=Received(Shop)&&BalanceActive=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col 1-->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><?php echo $bal->pay_bal.$t;  ?> <sup style="font-size: 20px"></sup></h4>
                  <p>Payment Balance</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="bal_trx.php?pageName=Transaction&&BalanceActive=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col 2-->
		<?php if($del->type==5){  // Agent ?>	
		<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><?php echo $bal->customer; ?> <sup style="font-size: 20px"></sup></h4>
                  <p> Customer(<?php echo $rows_cutomer; ?>)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col 3-->
		<div style="display:none;" class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php echo $totalsales->agntcom?></h4>
                  <p>Agent Sales Commission</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div style="display:none;" class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><?php echo $bal->dsd.$t;  ?> <sup style="font-size: 20px"></sup></h4>
                  <p>Agent Commission)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col 4-->
			            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><?php echo $with->agntcom.$t; ?></h4>
                  <p>Agent Withdraw Commission</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="com_wit_agent.php?pageName=com&&Commission=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><?php echo $pay->agntcom.$t; ?></h4>
                  <p>Agent Transaction Commission</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="com_trx_agent.php?pageName=com&&Commission=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
<?php }  // Agent ?>
<!-- Stair 3 Commission -->	
<?php if($del->type!=5){  // Not Agent?>	
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><?php if($del->type==6){echo $totalsales->agntcom.$t; }else{echo $bal->royalty.$t; } ?> <sup style="font-size: 20px"></sup></h4>
                  <p><?php 
			  if($del->type==6){echo "Merchant";}
		elseif($del->type==5){echo "Agent";}
		elseif($del->type==4){echo "Ward/Union";}
		elseif($del->type==3){echo "Upazila";}
		elseif($del->type==2){echo "District";}
		elseif($del->type==1){echo "Zone";} 
		else{echo "Not Set";}
			 ?> Royalty Commission</p> 
				   
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
				<?php if($del->type==6){ // Merchant ?>
                <a href="merchant_com.php?pageName=Sales%20Commission%20Chart" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                <?php }else{ ?>
				<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				<?php } ?>
			 </div>
            </div><!-- ./col -->
			 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><?php 
				  if($com){ echo $com.$t;}else{ echo '0'.$t; } ?></h4>
                  <p>Transaction Commission</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="bal_trx.php?pageName=Transaction&&BalanceActive=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><?php 
				  if($com_pay_virtual){ echo $com_pay_virtual.$t;}else{ echo '0'.$t; } ?></h4>
                  <p>Payment Commission(Virtual)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="bal_virtual_to_del.php?pageName=Payment(Virtual)&&BalanceActive=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><?php 
				  if($com_pay_cash){ echo $com_pay_cash.$t;}else{ echo '0'.$t; } ?></h4>
                  <p>Payment Commission(Cash)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<?php }  // Not Agent ?>
			<?php if($del->type!=6){  // Not Merchant?>	
	<!-- Member Joining Commission for all dealer -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><?php echo $mem_join->com.$t; ?></h4>
                  <p>Member Joining Commission</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="com_mem_join.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
	<?php }  // Not Merchant ?>
          
			
			
			
			
			
			
			
			
          </div><!-- /.row1 -->
		  <?php if(!isset($user)){ ?>
		   <div class="row">
		   <section class="col-lg-7 connectedSortable">
		    <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">To Do List</h3>
                  <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list">
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <!-- checkbox -->
                      <input type="checkbox" value="" name=""/>
                      <!-- todo text -->
                      <span class="text">Design a nice theme</span>
                      <!-- Emphasis label -->
                      <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name=""/>
                      <span class="text">Make the theme responsive</span>
                      <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name=""/>
                      <span class="text">Let theme shine like a star</span>
                      <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name=""/>
                      <span class="text">Let theme shine like a star</span>
                      <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name=""/>
                      <span class="text">Check your messages and notifications</span>
                      <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name=""/>
                      <span class="text">Let theme shine like a star</span>
                      <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                  <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                </div>
              </div><!-- /.box -->
			  
			    
			  
		   </section>
		    <section class="col-lg-5 connectedSortable">
			<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Quick Email</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </form>
                </div>
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
			 
			
			</section>
					   
		     </div><!-- /.row2 -->

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Title</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              Start creating your amazing application!
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
		  <?php } ?>
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