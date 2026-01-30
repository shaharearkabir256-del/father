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
    <title><?php echo $pageName=$_GET['pageName'];?></title>
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
            <?php echo $pageName;?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $pageName;?></li>
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
                  <h3 class="box-title"><a href="../db/gen.php">Hit The <?php echo $pageName;?></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
			
 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
                  <table id="example1" class="table table-bordered  table-hover">
                                            <thead>
                                             <?php echo $label="
											 <tr>
                                                     <th>#</th>
													<th>UserId</th>													
													<th>G1</th>
													<th>G2</th>
													<th>G3</th>
													<th>G4</th>
													<th>G5</th>
													<th>G6</th>
													<th>G7</th>
													<th>G8</th>
													<th>G9</th>
													<th>G10</th>
													<th>G11</th>
													<th>G12</th>
													<th>G13</th>
													<th>G14</th>
													<th>G15</th>
													<th>G_Total</th>
													<th>%</th>
													<th>G_Bal</th>
       												<th>Cal_Date</th>
                                                </tr>
												";
												?>
                                            </thead>
											<tbody>
											<?php 
/* SELECT `serial`, `user_id`, `c1`, `g1`, `c2`, `g2`, `c3`, `g3`, `c4`, `g4`, `c5`, `g5`, `c6`, `g6`, `c7`, `g7`, `c8`, `g8`, `c9`, `g9`, `c10`, `g10`,
 `c11`, `g11`, `c12`, `g12`, `c13`, `g13`, `c14`, `g14`, `c15`, `g15`, `c16`, `g16`, `c17`, `g17`, `c18`, `g18`, `c19`, `g19`, `c20`, `g20`, `c21`, `g21`,
 `c22`, `g22`, `c23`, `g23`, `c24`, `g24`, `g_all`, `date` FROM `gen` WHERE 1 */
				$n=1;
				$query=$mysqli->query("SELECT * FROM `gen` ORDER BY serial desc ");
				while($bal=mysqli_fetch_object($query)){
				$balance=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` where `user_id`='$bal->user_id'"));
			?>
                                            
                                              
                                           <tr <?php if($bal->date==''){ ?>class="info" <?php } ?> <?php if($bal->g_all==0){ ?>class="danger" <?php } ?>>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
		<td class="center"><?php
		$mem=mysqli_fetch_object($mysqli->query("SELECT * FROM `member` where user_id='".$bal->user_id."'"));
		//$profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` where `user_id`='$bal->user_id' "));
		echo $mem->log_id; 
		
		if($bal->user_id==999){
			echo "<i class='label label-primary'>Admin</i>";
		}elseif(($bal->user_id==10)){
			echo "<i class='label label-success'>Accounts</i>";
		}

			?></td> 
            
        <td class="center"><?php echo $bal->g1; ?></td>
        <td class="center"><?php echo $bal->g2; ?></td>
        <td class="center"><?php echo $bal->g3; ?></td>
        <td class="center"><?php echo $bal->g4; ?></td>
        <td class="center"><?php echo $bal->g5; ?></td>
        <td class="center"><?php echo $bal->g6; ?></td>
        <td class="center"><?php echo $bal->g7; ?></td>
        <td class="center"><?php echo $bal->g8; ?></td>
        <td class="center"><?php echo $bal->g9; ?></td>
        <td class="center"><?php echo $bal->g10; ?></td>
        <td class="center"><?php echo $bal->g11; ?></td>
        <td class="center"><?php echo $bal->g12; ?></td>
        <td class="center"><?php echo $bal->g13; ?></td>
        <td class="center"><?php echo $bal->g14; ?></td>
        <td class="center"><?php echo $bal->g15; ?></td>
        <td class="center"><?php echo $bal->g_all; ?></td>
        <td class="center"><?php echo $setting->mem_join_spot_cash_wallet; ?>%</td>
        <td class="center"><?php echo $balance->gen; ?></td>
        <td class="center"><?php echo $bal->date; ?></td>
       
     


    </tr>
                                           
											<?php } ?>
											 </tbody>
											 <tfoot>
                                                 <?php echo $label;?>
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
<?php unset($_SESSION['msg']);unset($_SESSION['msgs']);?>
<?php } ?>