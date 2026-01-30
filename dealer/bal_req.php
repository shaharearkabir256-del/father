<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Balance Request</title>
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
            <small>Request</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Balance</a></li>
            <li class="active">Request</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-9">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Balance Request</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>#</th><th>Trans ID</th>
													<th>Request Date</th>
													<th>Request To</th>
													<th>Request Amount</th>
													<th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
				$n=1;
				$id=$_SESSION["DealerLogId"];
				$query=$mysqli->query("SELECT * FROM `dealer_trx` where `rec_id`='".$id."' and `type`='2' order by serial desc");
				while($mem=mysqli_fetch_object($query)){
				
			?>
                                           
                                              
                                           <tr>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class=""><?php echo $mem->trx_id; ?></td>
        <td class="center"><?php echo $mem->day; ?></br>
		<?php echo $mem->time; ?></br>
		<?php echo $mem->date; ?></td>

		<td class="center"><?php
$delinfo=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$mem->send_id' "));
		echo $delinfo->log_id; ?></td>
        <td class="center">BDT <?php echo $mem->amount; ?></td>
    
       
        <td class="center"><?php if($mem->status==1){?><span class="label label-success">Succes<span><?php }else{ ?><span class="label label-warning">Pending<span><?php } ?></td>
       
     


    </tr>
											<?php } ?>
            

             
             
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th><th>Trans ID</th>
													<th>Request Date</th>
													<th>Request To</th>
													<th>Request Amount</th>
													<th>Status</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="col-md-3 col-sm-3 col-xs-3">
				<div class="box box-info">
				<div class="box-header">
				<?php if(isset($_SESSION['msg'])){echo "ErrMsg:<font color='red'>".$_SESSION['msg']."</font>";} if(isset($_SESSION['msgs'])){echo "<font color='green'>".$_SESSION['msgs']."</font>";}?>
				</div>
					<div class="box-body">
                                        <form role="form"  action="bal_req_act.php" method="POST">
										<?php 
										$memId=$_SESSION["DealerLogId"]; 
								$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$memId' "));
								
									if($del->type==6){
										$type=" `type`='5' ";
										}elseif($del->type==5){
										$type=" `type`='4' ";
										}elseif($del->type==4){
											$type=" `type`='3' ";
											}elseif($del->type==3){
											$type=" `type`='2' ";	
											}elseif($del->type==2){
											$type=" `type`='1' ";	
											}
											if($del->type!=1){	
												?>
												<div class="form-group">
                                                <label class="form-label" for="password-1">Userid</label>
												<select name="recid" class="form-control">
												
													<?php 
												$q=$mysqli->query("SELECT * FROM `dealer` WHERE $type");
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
												<input type="number" value="<?php
								$memId=$_SESSION["DealerLogId"]; 
								$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$memId' "));
					
												echo $del->type; ?>" name="dtype" hidden>
                                                <label class="form-label" for="password-1">Amount:</label>
                                                <input type="number" class="form-control"  name="amount" placeholder="Enter Amount">
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="password-1">Pin:</label>
                                                <input type="password" class="form-control" name="pin" placeholder="Enter your pin">
                                            </div>

                                           

                                            <div class="form-group">
                                               
											
                                                <button type="submit" class="btn btn-primary  pull-right">Submit</button>
												<br>
                                            </div>

                                        </form>
										 </div>
                                    </div>
								</div>
			
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
