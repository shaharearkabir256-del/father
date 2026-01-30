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
		<?php require_once 'side.php';?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Balance
            <small>Withdraw</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Balance</a></li>
            <li class="active">Withdraw</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
		  <div class="col-md-3">
				<div class="box box-info">
				<div class="box-header">
				<?php if(isset($_SESSION['msg'])){echo "ErrMsg:<font color='red'>".$_SESSION['msg']."</font>";} if(isset($_SESSION['msgs'])){echo "<font color='green'>".$_SESSION['msgs']."</font>";}?>
				</div>
					<div class="box-body">
                                         <form role="form"  action="bal_with_act.php" method="POST"  name="member">
										
                                           <div class="form-group"><br>
                                                <label class="form-label" for="email-1">Payment Method:</label><br>
												<input name="pm" value="1" type="radio" id="left1" onclick="return check_cash();" checked >Cash
												<input name="pm" value="2" type="radio" id="left2" onclick="return check_cash();">Bkash
												<input name="pm" value="3" type="radio" id="left3" onclick="return check_cash();">Rocket
												<input name="pm" value="4" type="radio" id="left4" onclick="return check_cash();">Bank
                                            </div>
										<div id="2"  style="display:none">	
											<div class="form-group">
                                                <label class="form-label" for="password-1">Bkash Account No.</label>
                                                <input type="text" class="form-control"  name="method_info" placeholder="Enter Bkash Account No">
                                            </div>
										</div>
										<div id="3"  style="display:none">	
											<div class="form-group">
                                                <label class="form-label" for="password-1">Rocket Account No.</label>
                                                <input type="text" class="form-control"  name="method_info" placeholder="Enter Rocket Account No">
                                            </div>
										</div>	
										<div id="4"  style="display:none">	
											<div class="form-group">
                                                <label class="form-label" for="password-1">Bank Details</label>
                                                <textarea type="text" class="form-control"  name="method_info"></textarea>
                                            </div>
										</div>	
													<?php 
											$memId=$_SESSION["DealerLogId"]; 
								$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$memId' "));
								
									if($del->type==6){
										$type=" `type`='4' and `zone_id`='$del->zone_id' AND `upozela_id`='$del->upozela_id' AND `union_id`='$del->union_id' AND `ward_id`='$del->ward_id' ";
										}elseif($del->type==5){
										$type=" `type`='4' and `zone_id`='$del->zone_id' AND `upozela_id`='$del->upozela_id' AND `union_id`='$del->union_id' AND `ward_id`='$del->ward_id' ";
										}elseif($del->type==4){
											$type=" `type`='3' and `zone_id`='$del->zone_id' AND `upozela_id`='$del->upozela_id' AND `union_id`='$del->union_id' ";
											}elseif($del->type==3){
											$type=" `type`='2' and `zone_id`='$del->zone_id' AND `upozela_id`='$del->upozela_id' ";	
											}elseif($del->type==2){
											$type=" `type`='1' and `zone_id`='$del->zone_id' ";	
											}

											if($del->type!=1){	
												?>
										
										<div class="form-group">
                                                <label class="form-label" for="password-1">Userid</label>
												<select name="recid" class="form-control">
												
													<?php 
												$q=$mysqli->query("SELECT * FROM `dealer` WHERE `active`='1' AND $type ");
												while($del=mysqli_fetch_object($q)){
												?>
												<option value="<?php echo $del->user_id; ?>"><?php echo $del->log_id; ?> </option>
												<?php } ?>
												
												</select>
                                            </div>
											<?php }else{ ?>
											 <input type="number" value="10" name="recid" hidden>
											<?php } ?>
                                            <div class="form-group">
											<?php
											$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_balance` WHERE `user_id`='".$memId."'"));
											$stkst=mysqli_fetch_object($mysqli->query("SELECT sum(price)as sktp,sum(qty)as skqty,sum(total)as skst,sum(rp)as skrp, sum(trp)as sktrp FROM `stock` where `rec_id`='$memId' "));
		
											$net=$bal->net_bal-$stkst->skst;
											?>
                                                <label class="form-label" for="password-1">Available Balance <?php echo $net.$t; ?></label>
                                                <input type="number" class="form-control"  name="amount" placeholder="Enter Amount" required>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Pin</label>
                                                <input type="password" class="form-control" name="pin" placeholder="Enter your pin" required>
                                            </div>
                                            <div class="form-group">
											<a href="bal_with.php"><button type="reset" class="pull-right btn btn-primary">Reset</button></a>
                                                <button type="submit" class="btn btn-success  pull-left">Submit</button><br><br>
                                            </div>

                                        </form>
										 </div>
                                    </div>
								</div>
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Balance Withdraw</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       <th>#</th><th>Trans ID</th>
													<th>Date</th>
													<th>Receive ID</th>
													<th>Payment Method</th>
													<th>Amount</th>
													<th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                                              	<?php  $memId=$_SESSION['DealerLogId'];
												
		$q2=$mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='".$memId."' ");
		$user=mysqli_fetch_object($q2);
				$n=1;
				$query=$mysqli->query("SELECT * FROM `dealer_trx` where `send_id`='".$memId."' and `type`='1' and `account`='".$user->type."' order by serial desc");
				while($mem=mysqli_fetch_object($query)){
				
			?>  
                                           <tr>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class=""><?php echo $mem->trx_id; ?></td>
        <td class="center"><?php echo $mem->day; ?></br>
		<?php echo $mem->time; ?></br>
		<?php echo $mem->date; ?></td>
		 <td class="center">
		 
		 <?php
		 $q2=$mysqli->query("SELECT `log_id` FROM `dealer` WHERE `user_id`='".$mem->rec_id."' union SELECT `log_id` FROM `accounts` WHERE `user_id`='".$mem->rec_id."'");
		$del=mysqli_fetch_object($q2);
		echo $del->log_id;
		?>
		 </td>
        <td class="center"><?php if($mem->method==1){ ?>
		<span class="label label-success">Cash</span><br>
		<?php }elseif($mem->method==2){ ?>
		<span class="label label-info">Bkash</span><br>
		<table><tr><td>Acc No: </td><td>#<b>
		<?php echo $mem->method_info; ?></b></td></tr></table>
		<?php }elseif($mem->method==3){ ?>
		<span class="label label-warning">Rocket</span><br>
		<table><tr><td>Acc No: </td><td>#<b>
		<?php echo $mem->method_info; ?></b></td></tr></table>
		
		<?php }elseif($mem->method==4){ ?>
		<span class="label label-primary">Bank</span><br>
		<table>
		<tr><td><?php echo $mem->method_info; ?></td></tr>

		</table>
		<?php }else{ ?>
		<span class="label label-default">Virtual<span>
		<?php } ?>
		</td>
        <td class="center"><?php echo $mem->amount.$bdt; ?></td>

    
       
        <td class="center"><?php if($mem->status==1){ ?><span class="label label-success">Success<span><?php }else{ ?><span class="label label-warning">Pending<span><?php } ?></td>
       
     


    </tr>
		<?php } ?>
            

             
             
                    </tbody>
                    <tfoot>
                      <tr>
                           <tr>
                       <th>#</th><th>Trans ID</th>
													<th>Date</th>
													<th>Receive ID</th>
													<th>Payment Method</th>
													<th>Amount</th>
													<th>Status</th>
                      </tr>
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