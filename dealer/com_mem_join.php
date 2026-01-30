<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageName=$_GET['pageName'];?></title>
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
            <?php echo $pageName; ?>
            <small>Chart</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         
            <li class="active"><?php echo $pageName;?> </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $pageName;?></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                                                     <th>#</th>
													 <th>Trans ID</th>	
													<th>Date</th>													
													<th>User ID</th>	
													<th>Amount</th>														
													<th>%</th>													
													<th>Com</th>													
																						

												
                                                </tr>
                                            </thead>
											  <tbody>
											<?php 
									
	$n=1; $tcom=0;
if($del->type==1){ 
	$query=$mysqli->query("SELECT * FROM `invest` where `zone_id`='$id' and `zone_com`>0 order by serial desc ");
}elseif($del->type==2){
	$query=$mysqli->query("SELECT * FROM `invest` where `district_id`='$id' and `district_com`>0 order by serial desc ");
}elseif($del->type==3){
	$query=$mysqli->query("SELECT * FROM `invest` where `upazila_id`='$id' and `upazila_com`>0 order by serial desc ");
}elseif($del->type==4){
	$query=$mysqli->query("SELECT * FROM `invest` where `uw_id`='$id' and `uw_com`>0 order by serial desc ");
}elseif($del->type==5){
	$query=$mysqli->query("SELECT * FROM `invest` where `agent_id`='$id' and `agent_com`>0 order by serial desc ");	
}else{}
				while($mem=mysqli_fetch_object($query)){
			?>
                                          
                                              
                                           <tr <?php if($mem->date==$date){echo"class='info'"; } ?> >
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class="center"><?php echo $mem->trx_id; ?></td>
		  <td class="center"><?php echo $mem->date; ?></td>
		<td class="center"><?php 
		$member=mysqli_fetch_object($mysqli->query("select `log_id` from `member` where `user_id`='".$mem->user_id."' "));
		echo $member->log_id; ?></td>
			<td class="center"><?php echo $mem->invest.$t; ?></td>
	<?php if($del->type==1){ ?>
		<td class="center"><?php echo $mem->zone_com_percent; ?> %</td>
		<td class="center"><?php echo $mem->zone_com.$t; $tcom=$tcom+$mem->zone_com; ?></td>
	<?php }elseif($del->type==2){ ?>
			<td class="center"><?php echo $mem->district_com_percent; ?> %</td>
		<td class="center"><?php echo $mem->district_com.$t; $tcom=$tcom+$mem->district_com; ?></td>
	<?php }elseif($del->type==3){ ?>
			<td class="center"><?php echo $mem->upazila_com_percent; ?> %</td>
		<td class="center"><?php echo $mem->upazila_com.$t; $tcom=$tcom+$mem->upazila_com; ?></td>
	<?php }elseif($del->type==4){ ?>
			<td class="center"><?php echo $mem->uw_com_percent; ?> %</td>
		<td class="center"><?php echo $mem->uw_com.$t; $tcom=$tcom+$mem->uw_com; ?></td>
	<?php }elseif($del->type==5){ ?>
			<td class="center"><?php echo $mem->agent_com_percent; ?> %</td>
		<td class="center"><?php echo $mem->agent_com.$t; $tcom=$tcom+$mem->agent_com; ?></td>
	<?php }else{} ?>
    </tr>
                                          
									<?php } ?>		
            

             
             
                    </tbody>
                    <tfoot>
                      <tr>
													<th></th>
													 <th></th>	
													<th></th>													
													<th></th>	
													<th></th>														
													<th>Total</th>													
													<th><?php echo $tcom.$t;?></th>													
										
													
													
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
