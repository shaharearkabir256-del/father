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
    <title>Candidate</title>
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
            Candidate
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Candidate</li>
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
                  <h3 class="box-title">Candidate</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				
				<div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div  class="table-responsive">
										 <div class="box-header">
											<h3 class="box-title">PSC Commission Candidate</h3>
											</div><!-- /.box-header -->
                                         <div class="box-body table-responsive">
                  <table  id="example1" class="table table-bordered  table-hover">
                                            <thead>
                                                  <tr>
                                                     <th>#</th>
													<th>UserId</th>													
													<th>Rank</th>													
													<th>Total Sales</th>
													<th>Point</th>
													<th>Joining Date</th>
													
                                                </tr>
                                            </thead>
											<tbody>
											<?php 
			/* SELECT `serial`, `user_id`, `user`, `position`, `rank`, `pack`, `price`, `direct`, `upline`, `sponsor`, `point`, 
			`left_user`, `right_user`, `left_point`, `right_point`, `match_today`, `flash_today`, `left_today`, `right_today`,
			`left_cary`, `right_cary`, `date`, `chkdate`, `time` FROM `tree` WHERE 1 */
			if(($start!='')&&($end!='')){$sql1=" and join_date BETWEEN '$start' AND '$end'";}
									if(($type==0)&&($search!='')){$sql2="";}
									if(($type==1)&&($search!='')){$sql3=" and user_id='$search'";}		
									if($item!=''){$sql4=" and rank='$item'";}
																		
									$n=1;
									$count =mysqli_num_rows($mysqli->query("SELECT * FROM tree "));
									$total_items= mysqli_num_rows($t);									
									if((!$limit)||(is_numeric($limit)==false)){$limit=50;}
									if((!$page)||(is_numeric($page)==false)){$page=1;}
									$total=ceil($count/$limit);
									$set=(($page*$limit)-$limit);
									$q = $mysqli->query("SELECT * FROM tree where rank>2  ORDER BY serial asc LIMIT $set, $limit ");
									while($mem= mysqli_fetch_object($q))	
								   {  ?>
 <tr>  
 <td class="center"  scope="row"><?php echo $n++; ?></td>
		<td class="center"><?php echo $mem->user;?></td> 
		<td class="center"><?php 
		$rank=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` where user_id='".$mem->user_id."'"));
	
		echo $rank->rank;
		
		?></td> 
		
		<td class="center">
		<?php 
		$sales=mysqli_fetch_object($mysqli->query("SELECT sum(invest) as sale,sum(point)as pv FROM `member` where `sponsor`='".$mem->user_id."'"));
		echo $sales->sale.$bdt;
		?>
		</td> 
		<td class="center">
		<?php 
		echo $sales->pv;
		?>
		</td> 
        <td class="center"><?php echo $mem->date; ?></td>
       
       
     


    </tr>
	<?php } ?>
											 </tbody>
                                        </table>

                                    </div>
                                    </div>
                                    </div>
                               
                           <div class="col-md-12 col-sm-12 col-xs-12">
						   
                                    <div  class="table-responsive">
									 <div class="box-header">
											<h3 class="box-title">Yearly Commission Candidate</h3>
											</div><!-- /.box-header -->
                                         <div class="box-body">
											<table id="example1" class="table table-bordered  table-hover">
                                            <thead>
                                                  <tr>
                                                     <th>#</th>
													<th>UserId</th>													
													<th>Rank</th>													
													<th>Total Sales</th>
													<th>Point</th>
													<th>Joining Date</th>
													
                                                </tr>
                                            </thead>
											<tbody>
											<?php 
			/* SELECT `serial`, `user_id`, `user`, `position`, `rank`, `pack`, `price`, `direct`, `upline`, `sponsor`, `point`, 
			`left_user`, `right_user`, `left_point`, `right_point`, `match_today`, `flash_today`, `left_today`, `right_today`,
			`left_cary`, `right_cary`, `date`, `chkdate`, `time` FROM `tree` WHERE 1 */
			if(($start!='')&&($end!='')){$sql1=" and join_date BETWEEN '$start' AND '$end'";}
									if(($type==0)&&($search!='')){$sql2="";}
									if(($type==1)&&($search!='')){$sql3=" and user_id='$search'";}		
									if($item!=''){$sql4=" and rank='$item'";}
																		
									$n=1;
									$count =mysqli_num_rows($mysqli->query("SELECT * FROM tree "));
									$total_items= mysqli_num_rows($t);									
									if((!$limit)||(is_numeric($limit)==false)){$limit=50;}
									if((!$page)||(is_numeric($page)==false)){$page=1;}
									$total=ceil($count/$limit);
									$set=(($page*$limit)-$limit);
									$q = $mysqli->query("SELECT * FROM tree where rank>3  ORDER BY serial asc LIMIT $set, $limit ");
									while($mem= mysqli_fetch_object($q))	
								   {  ?>
 <tr>  
 <td class="center"  scope="row"><?php echo $n++; ?></td>
		<td class="center"><?php echo $mem->user;?></td> 
		<td class="center"><?php 
		$rank=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` where user_id='".$mem->user_id."'"));
	
		echo $rank->rank;
		
		?></td> 
		
		<td class="center">
		<?php 
		$sales=mysqli_fetch_object($mysqli->query("SELECT sum(invest) as sale,sum(point)as pv FROM `member` where `sponsor`='".$mem->user_id."'"));
		echo $sales->sale.$bdt;
		?>
		</td> 
		<td class="center">
		<?php 
		echo $sales->pv;
		?>
		</td> 
        <td class="center"><?php echo $mem->date; ?></td>
       
       
     


    </tr>
	<?php } ?>
											 </tbody>
                                        </table>

                                    </div>
                                    </div>
                                    </div>
                       

      
	   
								 </div>
				
				
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