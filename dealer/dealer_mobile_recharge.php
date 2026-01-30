<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Balance Withdraw</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
	<div class="wrapper">
    <?php require_once 'header.php';?>
      <!-- Left side column. contains the logo and sidebar -->
	<?php require_once 'side.php';?>
      <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
				Balance
				<small>Recharge</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Balance</a></li>
				<li class="active">Recharge</li>
			</ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-3">
					<div class="box box-info">
						<div class="box-header">
						<?php 
								if(isset($_SESSION['msg']) || isset($_SESSION['msgs'])){
		if(isset($_SESSION['msg'])){echo "<font color='red'>".$_SESSION['msg']."</font>";} 
		if(isset($_SESSION['msgs'])){echo "<font color='green'>".$_SESSION['msgs']."</font>";}
		}else{echo $page;}
							$acc=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `dealer_balance` WHERE `user_id`='".$id."'"));
								?>
						</div>
						<div class="box-body" style=" height: 385px;">
							<h5>Balance: <?php echo "<b>".$acc->net_bal."</b>".$t;?></h5>
							    <form role="form"  action="dealer_mobile_recharge_act.php" method="POST"  name="dealer">
							    <input name="pm" value="5" type="radio" id="left5" checked hidden>
								<div class="form-group">
									<label class="form-label" for="password-1">Recharge Number</label>
								   
									<input type="text" class="form-control"  name="contact" placeholder=" "/>
								</div>
								<div class="form-group">
									<label class="form-label" for="password-1">Select Type</label>
									<select name="contact_Type" class="form-control">
									<option value="1"> Prepaid</option>
									<option value="2"> Postpaid</option>
									<option value="3"> Skitto</option> 
							
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="password-1">Amount</label>
									<input type="number" class="form-control"  name="amount" placeholder="Minimum <?php if($method=='cash'){echo "20"; }elseif($method=='mobile_banking'){echo "50"; }elseif($method=='bank'){echo "100";}else{echo "20";}  ?> Point">
								</div>
								<div class="form-group">
									<label class="form-label" for="password-1">Pin</label>
									<input type="password" class="form-control" name="pin" placeholder="Enter your pin">
								</div>
								<div class="form-group">
								<a href=""><button type="reset" class="pull-right btn btn-primary">Reset</button></a>
									<button type="submit" class="btn btn-success  pull-left">Submit</button>
								</div>
							</form>
					 </div>
				</div>
			</div>
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Balance Recharge</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
						<thead>
						<?php echo $label="
							<tr>
							   
								 <th>Type</th>
								 <th>#</th>
								 <th>Trans ID</th>
								<th>Date</th>
							
				
								<th>Mobile</th>
								<th>Amount</th>
							
								<th>Status</th>
								
							</tr>
							";?>
						</thead>
						<tbody>
						<?php $total=0;
							$n=1;
							$query=$mysqli->query("SELECT * FROM `dealer_trx` where `send_id`='".$id."' and `type`='5' and `method`='5' order by `serial` desc");
							while($dealer=mysqli_fetch_object($query)){

						?>
					    <tr>
							<td>Mobile <br>Recharge</td>
                            <td><?php echo $n++; ?></td>
							<td class=""><?php echo $dealer->trx_id; ?></td>
							<td class=""><?php echo $dealer->day; ?></br>
							<?php echo $dealer->time; ?></br>
							<?php echo $dealer->date; ?></td>
							<?php
							$q2=$mysqli->query("SELECT `user` FROM `admin` WHERE `user_id`='".$dealer->rec_id."'");
							$actsadmin=mysqli_fetch_object($q2);
							$actsadmin->user; ?>

							<td class=""><?php echo $dealer->mobile; ?>
							<br>
							<?php 
							if($dealer->mobile_type==0){
							echo "Prepaid";
							}elseif($dealer->mobile_type==1){
							echo "Postpaid";
							}elseif($dealer->mobile_type==2){
							echo "Skitto";
							}else{ }
							?>
							</td>

							<td class=""><?php echo $dealer->amount.$bdt; ?></td>
							<td class=""><span class="label label-success">Succes<span></td>
						</tr>
							<?php 
							$total=$total+$dealer->amount;
							$totalcharge=$totalcharge+$dealer->tax;
							?>
					   
						<?php } ?>
						 </tbody>
						 <tfoot>
						 <?php echo $label?>
							<tr>
								 <th></th>
								 <th></th>
							 
								 <th></th>
								<th></th>
								<th>Total</th>
				
								<th><?php echo $total.$bdt; ?></th>
								<th><?php echo $totalcharge.$bdt; ?></th>
								<th></th>
								
							</tr>
						<!--<tr>
								 <th></th>
							 
								 <th></th>
								<th></th>
								
								<th>Sub Total</th>
				<th></th>
								<th></th>
								<th><?php echo $sb=$total+$totalcharge.$bdt; ?></th>
								<th></th>
								
							</tr>-->
						</tfoot>     
					</table>
				</div><!-- /.box-body -->
		  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php require_once 'footer.php';?>
</div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- page script -->
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
<?php
		unset($_SESSION['msg']);
		unset($_SESSION['msgs']);
		?>
  </body>
</html>
<script>		  function check_cash()
	{
	if(document.member.left1.checked){
		document.getElementById("2").style.display="none";
		document.getElementById("3").style.display="none";
		document.getElementById("4").style.display="none";
		
		}
	if(document.member.left2.checked){
		document.getElementById("2").style.display="block";
		document.getElementById("3").style.display="none";
		document.getElementById("4").style.display="none";
		}
	if(document.member.left3.checked){
		document.getElementById("3").style.display="block";
		document.getElementById("2").style.display="none";
		document.getElementById("4").style.display="none";
		}
	if(document.member.left4.checked){
		document.getElementById("4").style.display="block";
		document.getElementById("2").style.display="none";
		document.getElementById("3").style.display="none";
		
		}
	
		
	}
</script>