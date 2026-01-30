<?php
	session_start();
	if( $_SESSION['AdminUserId'] == ''){ 
	$_SESSION['msg']="Please Verify login!";
	header("Location:logout.php");
	exit();
	}
	else{
		require '../db/db.php';
		                    $sponsor=0.00;
							$steup=0.00;
							$matching=0.00;
							$gen=0.00;
							$rayality=0.00;
							$rec_bal=0.00;
							$pay_bal=0.00;
							$Product=0.00;
							$net=0.00;

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Daily Comission</title>
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
          Daily Comission
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Daily Comission</li>
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
                  <h3 class="box-title">
				  <a target="blank" href="invest2.php">Upgrade</a> | 
				  <a target="blank" href="mlm_daily_today.php">Today Daily Comission</a> | 
				  <a target="blank" href="../db/crn_dailycom.php">Hit Daily Comission</a>
				  </h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				
											 <table id="example1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
                                                     <th>DSN</th>
													<th>User ID</th>
													<th>Rank</th>
													<th>Club</th>
													
													<th>Package</th>
													<th>Total Amount</th>
													<th>Total Member</th>
													<th>Amount</th>
													<th>Date</th>
													<th>Status</th>
													
                                                </tr>
                                            </thead> <tbody> 
			  <?php $n=1; 
		$count =mysqli_num_rows($mysqli->query("SELECT * FROM `comdaily`"));
		$total_items= mysqli_num_rows($t);									
		if((!$limit)||(is_numeric($limit)==false)){$limit=100;}
		if((!$page)||(is_numeric($page)==false)){$page=1;}
		$total=ceil($count/$limit);
		$set=(($page*$limit)-$limit);
		$q1=$mysqli->query("SELECT * FROM `comdaily` where serial ORDER BY serial DESC LIMIT $set, $limit "); //SELECT * FROM `comdaily` where `cdate`='".$date."' or `cdate`='".$ydate."'
		while($daily=mysqli_fetch_object($q1)){
		?>								                                           
                                              
        <tr <?php if($daily->package==2){ ?> class="success" <?php } ?><?php if($daily->package==3){ ?> class="warning" <?php } ?><?php if($daily->package==4){ ?> class="danger" <?php } ?><?php if($daily->package==5){ ?> class="success" <?php } ?><?php if($daily->package==6){ ?> class="warning" <?php } ?><?php if($daily->package==7){ ?> class="danger" <?php } ?><?php if($daily->package==8){ ?> class="success" <?php } ?><?php if($daily->package==9){ ?> class="warning" <?php } ?><?php if($daily->package==10){ ?> class="danger" <?php } ?> > 
        <th class=""  scope="row"><?php echo $n++;?></th>
        <td><?php echo $daily->serial;?></td>
        <td class=""><?php  
		$member3=mysqli_fetch_object($mysqli->query("SELECT `log_id` FROM `member` where `user_id`='".$daily->user_id."' "));
		echo $member3->log_id;
		?></td>
        <td class=""><?php 
		require('../member/star.php');
		if($daily->package==1){echo $star1;} 
		 elseif($daily->package==2){echo $star2;}
		 elseif($daily->package==3){echo $star3;}
		 elseif($daily->package==4){echo $star4;}
		 elseif($daily->package==5){echo $star5;}
		 elseif($daily->package==6){echo $star6;}
		 elseif($daily->package==7){echo $star7;}
		 elseif($daily->package==8){echo $star8;}
		 elseif($daily->package==9){echo $star9;}
		 elseif($daily->package==10){echo $star10;}
			else{}
		?></td>
		<td class=""><?php echo $daily->club;?></td>
		
		<td class=""><?php echo $daily->plan;?></td>
		<td class=""><?php echo $daily->tamnt;?></td>
		<td class=""><?php echo $daily->tmem;?></td>
        <td class=""><?php echo $daily->amount*1?></td>
		<td class="">
		<?php echo $daily->cday;?><br>
		<?php echo $daily->ctime;?><br>
		<?php echo $daily->cdate;?>
		</td>
        <td class=""><span class="label label-success">Succes<span></td>
        </tr>
<?php //$tamnt=$tamnt+$daily->amount;
 } ?>
	</tbody>
	<tfoot>
                                                <tr>
                                                   
                                                     <th></th>
                                                     <th></th>
                                                     <th></th>
                                                     <th></th>
                                                     <th></th>
													<th></th>
													<th></th>
													<th></th>
													<th><?php //echo $tamnt;?></th>
													<th></th>
													
                                                </tr>
                                            </tfoot>
											
                                        </table>
<?php include("pagination.php");?>

				
				
				
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