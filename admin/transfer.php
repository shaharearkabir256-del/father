<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		$recid=$_SESSION['AdminUserId'];
		require '../db/cal_ad.php';
		$admin=$_SESSION['AdminUserId'];
		$transfer=0.00;
	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Transaction</title>
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
            Transaction
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Transaction</li>
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
                  <h3 class="box-title">Transaction</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
				
			<div class="col-md-4 col-sm-12 col-xs-12">

                                        <form role="form"  action="transfer_act.php" autocomplete="off" method="POST">
											<div class="form-group">
                                                <label class="form-label" for="email-1">To:</label>
                                                <select name="acc" class="form-control">
												<option value="admin">Accounts</option>
												<option value="dealer">Dealer</option>
												<option value="member" selected>Member</option>
                                                </select>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="email-1">Type:</label>
                                                <select name="trxtype" class="form-control">
												<option value="0" selected>Transfer</option>
												<option value="3">Shopping</option>
												<option value="4">Upgrade</option>
												<option value="10">Gift</option>
											
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="email-1">User Name:</label>
                                                <input type="text" class="form-control"  name="userid" placeholder="Enter UserId…">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="password-1">Amount:</label>
                                                <input type="number" class="form-control"  name="amount" placeholder="Enter Amount">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Pin:</label>
                                                <input type="password" class="form-control" name="pin" placeholder="Enter your pin">
                                            </div>

                                           

                                            <div class="form-group">
                                               
											
                                                <button type="submit" class="btn btn-primary  pull-right">Transfer</button>
                                            </div>

                                        </form>

                                    </div>
								
								<div class="col-md-8 col-sm-12 col-xs-12">

                                        <table id="example1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                     <th>#</th> <th>Trans ID</th>
													<th>Date</th>
													<th>Receive ID</th>
													<th>Amount</th>
													<th>Type</th>
													<th>Status</th>
													
                                                </tr>
                                            </thead>
											<tbody>
											<?php 
				$n=1;
				$query=$mysqli->query("SELECT * FROM `trx` where `send_id`='".$admin."' and `account`='0' order by serial desc");
				while($mem=mysqli_fetch_object($query)){
				
			?>
                                            
                                              
                                           <tr>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class="center"><?php echo $mem->trx_id; ?></td>
        <td class="center"><?php echo $mem->day; ?></br>
		<?php echo $mem->time; ?></br>
		<?php echo $mem->date; ?></td>

        <td class="center"><?php
			$member=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` WHERE `user_id`='".$mem->rec_id."'"));
			$dealer=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$mem->rec_id."'"));
			$accounts=mysqli_fetch_object($mysqli->query("SELECT * FROM `admin` WHERE `user_id`='".$mem->rec_id."'"));
		echo $member->log_id; 
		echo $dealer->log_id; 
		echo $accounts->user; 
		
		?></td>
        <td class="center"><?php echo $bdt.' '.$mem->amount; ?></td>
        <td class="center">
		<?php 
		if($mem->type==0){echo "<span class='label label-info'>Transaction</span>";}
		elseif($mem->type==3){echo "<span class='label label-warning'>Shopping</span>";}
		elseif($mem->type==4){echo "<span class='label label-primary'>Upgrade</span>";}
		elseif($mem->type==10){echo "<span class='label label-danger'>Gift</span>";}
		else{echo"Not Define";} ?>
		</td>
    
       
        <td class="center"><span class="label label-success">Succes<span></td> 
       
     


    </tr>
                                           
											<?php
$transfer=$transfer+$mem->amount;
											} ?>
											 </tbody>
											  <tfoot>
                                                <tr>
                                                     <th></th>
                                                     <th></th>
													<th></th>
													<th>Total</th>
													<th><?php echo $bdt.' '.$transfer; ?></th>
													<th></th>
													<th></th>
													
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>

				<!-- /. Main Content Area  -->
				</div>
			</div>
		</div>
	  </div>
	</div>
<?php if($adm->type==1 || $adm->type==2){ ?>	
	<div class="row">
        <!-- left column -->
       
		<div class="col-md-12">
		  
		 <div class="box box-info">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Dealer Transaction Statement</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
          
					<div class="col-md-12">

                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr>
                                                     <th>#</th> <th>Trans ID</th>
													<th>Date</th>
													<th>Receive ID</th>
													<th>Amount</th>
													<th>Type</th>
													<th>Status</th>
													
                                                </tr>
                                            </thead>
											<tbody>
											<?php 
				$n=1;
				$query=$mysqli->query("SELECT * FROM `dealer_trx` where `send_id`='".$admin."' and `account`='0' order by serial desc");
				while($trx_acc_del=mysqli_fetch_object($query)){
				
			?>
                                            
                                              
                                           <tr>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class="center"><?php echo $trx_acc_del->trx_id; ?></td>
        <td class="center"><?php echo $trx_acc_del->day; ?></br>
		<?php echo $trx_acc_del->time; ?></br>
		<?php echo $trx_acc_del->date; ?></td>

        <td class="center"><?php
			$dealer=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$trx_acc_del->rec_id."'"));
			//$dealer=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$mem->rec_id."'"));
			//$accounts=mysqli_fetch_object($mysqli->query("SELECT * FROM `accounts` WHERE `user_id`='".$mem->rec_id."'"));
		echo $dealer->log_id; 
		//echo $dealer->log_id; 
		//echo $accounts->log_id; 
		
		?></td>
        <td class="center"><?php echo $bdt.' '.$trx_acc_del->amount; ?></td>
        <td class="center">
		<?php 
		if($trx_acc_del->type==0){echo "<span class='label label-info'>Transaction</span>";}
		elseif($trx_acc_del->type==3){echo "<span class='label label-warning'>Shopping</span>";}
		elseif($trx_acc_del->type==4){echo "<span class='label label-primary'>Upgrade</span>";}
		else{echo"Not Define";} ?>
		</td>
    
       
        <td class="center"><span class="label label-success">Succes<span></td>
       
     


    </tr>
                                           
											<?php
$transfer=$transfer+$mem->amount;
											} ?>
											 </tbody>
											  <tfoot>
                                                <tr>
                                                     <th></th>
                                                     <th></th>
													<th></th>
													<th>Total</th>
													<th><?php echo $bdt.' '.$transfer; ?></th>
													<th></th>
													<th></th>
													
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>				
									 
									
                            
				
				
				<!-- /. Main Content Area  -->
				</div>
			</div>
		</div>
	  </div>
	</div>
<?php } ?>	
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