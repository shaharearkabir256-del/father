<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dealer List</title>
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
            Dealer
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         
            <li class="active">Dealer List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Dealer List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                                                     <th>#</th>
                                                     <th>ReferId</th>
													<th>UserId</th>												
											
												
													<th>Join Date</th>
													<th>Type</th>
													<th>Zone</th>
													<th>District</th>
													<th>Upazila</th>
													<th>Union/Ward</th>
										
													<th>Status</th>
													<th>Last Login</th>
													<th>Order List</th>
													<th>Member List</th>
														
                                                </tr>
                                            </thead>
											 <tbody>
											<?php 
											$memId=$_SESSION["DealerLogId"]; 
								$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$memId' "));
								if($del->type==1){
									$type="`type`='2' or `type`='3' or `type`='4' or `type`='5' ";
								}elseif($del->type==2){
									$type="`type`='3' or `type`='4' or `type`='5' ";
									}elseif($del->type==3){
										$type="`type`='4' or `type`='5' ";
										}elseif($del->type==4){
											$type="`type`='5' ";
											}else{
											$type="`type`='5' ";	
											}
										
									
				$n=1;
				$query=$mysqli->query("SELECT * FROM `dealer` where $type order by `serial` asc");
				while($mem=mysqli_fetch_object($query)){
				
			?>
                                           
                                              
                                           <tr>
    
        <td class="center"  scope="row"><?php echo $n++; ?></td>
      
               <td class="center"><?php echo $mem->refer; ?></td>
               <td class="center"><?php echo $mem->log_id; ?></td>
 
      
        <td class="center"><?php echo $mem->date; ?></td>
		
        <td class="center">
		<?php
		$zone=mysqli_fetch_object($mysqli->query("SELECT * FROM `zone` where `zone_id`='".$mem->zone_id."' "));
		$upozela=mysqli_fetch_object($mysqli->query("SELECT * FROM `upozela` where `upozela_id`='".$mem->upozela_id."' "));
		$union=mysqli_fetch_object($mysqli->query("SELECT * FROM `union` where `union_id`='".$mem->union_id."' "));
		$ward=mysqli_fetch_object($mysqli->query("SELECT * FROM `ward` where `ward_id`='".$mem->ward_id."' "));
		
		if($mem->type==5){echo "Agent";}
		elseif($mem->type==4){echo "Ward/Union";}
		elseif($mem->type==3){echo "Upazila";}
		elseif($mem->type==2){echo "District";}
		elseif($mem->type==1){echo "Zone";}
		else{echo "Not Set";}
		 ?>
		</td>
        <td class="center">
		<?php
		echo $zone->zone;
		  ?>
		</td>
        <td class="center"><?php echo $upozela->upozela; ?></td>
        <td class="center"><?php echo $union->union; ?></td>
        <td class="center"><?php echo $ward->ward; ?></td>
       
		<?php if($del->type!=5){ ?> 
		<td class="center"><?php if($mem->chk==1){ ?>
		<a href="dealer_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $mem->chk; ?>"><span class='label label-success'>Active</span></a>
		<?php }else{?>
		<a href="dealer_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $mem->chk; ?>"><span class='label label-danger'>Inactive</span> </a>
		<?php } ?></td>
		<?php } ?>
		
    <td class="center"><?php echo $mem->last_login; ?></td>
	
<?php if($mem->type==5){ ?>
		<td><a href='prod_order_list.php?agentid=<?php echo $mem->log_id ?>'>View</a></td>
		<td> <a href='member.php?agentid=<?php echo $mem->log_id ?>'>View</a></td>
	<?php } ?>

		
			
			
    </tr><?php } ?>

             
             
                    </tbody>
                    <tfoot>
                      <tr>
													<th>#</th>
                                                     <th>ReferId</th>
													<th>UserId</th>												
											
												
													<th>Join Date</th>
													<th>Type</th>
													<th>Zone</th>
													<th>District</th>
													<th>Upazila</th>
													<th>Union/Ward</th>
												
													<th>Status</th>
													<th>Last Login</th>
													<th>Order List</th>
													<th>Member List</th>
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
