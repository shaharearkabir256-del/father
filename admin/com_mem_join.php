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
    <title>Comission</title>
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
          Comission
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Comission</li>
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
                  <h3 class="box-title"><a href="#">Comission</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				
											  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <?php echo $label="<tr>
                                                     <th>#</th>
													 <th>Trans ID</th>	
													<th>Date</th>													
													<th>User ID</th>	
													<th>Amount</th>	
													<th>Agent</th>														
													<th>%</th>													
													<th>Agent Com</th>
													<th>%</th>													
													<th>DSO Com</th>
																							
													<th>%</th>													
													<th>SDH Com</th>
																									
													<th>%</th>													
													<th>DH Com</th>
																										
													<th>%</th>													
													<th>MDH Com</th>
																						

												
                                                </tr>
												"; ?>
                                            </thead>
											  <tbody>
											<?php 
/*
SELECT `serial`, `club`, `trx_id`, `team`, `user_id`, `invest`, `sponsor`, `payable`, `stepup`, `shopping`,
 `package`, `upline`, `date`, `chkdate`, `invest_id`, `agent_id`, `agent_com_percent`, `agent_com`, `uw_id`, 
 `uw_com_percent`, `uw_com`, `upazila_id`, `upazila_com_percent`, `upazila_com`, `district_id`, `district_com_percent`,
 `district_com`, `zone_id`, `zone_com_percent`, `zone_com`, `fund_donation`, `fund_company` FROM `invest` WHERE 1
*/									
				$n=1;
				$query=$mysqli->query("SELECT * FROM `invest` where serial order by serial desc ");
				while($mem=mysqli_fetch_object($query)){
				$dealer=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `dealer` where `type`=5 and `user_id`='$mem->agent_id' "));	
			?>
                                          
                                              
                                           <tr>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class="center"><?php echo $mem->trx_id; ?></td>
		<td class="center"><?php echo $mem->date; ?></td>
		<td class="center"><?php echo $mem->user_id; ?></td>
		<td class="center"><?php echo $mem->invest; ?></td>
		<td class="center"><?php echo $dealer->log_id; ?>(<?php echo $mem->agent_id; ?>)</td>
		<td class="center"><?php echo $mem->agent_com_percent; ?></td>
		<td class="center"><?php echo $mem->agent_com; ?></td>
		<td class="center"><?php echo $mem->uw_com_percent; ?></td>
		<td class="center"><?php echo $mem->uw_com; ?></td>
		<td class="center"><?php echo $mem->upazila_com_percent; ?></td>
		<td class="center"><?php echo $mem->upazila_com; ?></td>
		<td class="center"><?php echo $mem->district_com_percent; ?></td>
		<td class="center"><?php echo $mem->district_com; ?></td>
		<td class="center"><?php echo $mem->zone_com_percent; ?></td>
		<td class="center"><?php echo $mem->zone_com; ?></td>
		

      

	


    </tr>
                                          
									<?php } ?>		
                         
             
                    </tbody>
                    <tfoot>
                    <?php echo $label; ?>
                    </tfoot>
                  </table>


				
				
				
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

<?php } ?>