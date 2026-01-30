<?php
ob_start();
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
    <title>Member Management</title>
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
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Member Management</li>
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
                  <h3 class="box-title">Member Management</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
				<table id="example1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
													<th>UserId</th>	
													<th>Mobile</th>	
													<th>ID</th>	
													<th>Level</th>	
													<th>Category</th>	
													<th>Club</th>	
													<th>Join</th>
													<th>Earning</th>
													<th>Balance</th>													
													<th>Status</th>
													<th>Transfer Status</th>
													<th>Sponsor Status</th>
									
													<th>Member Panel</th>
                                                </tr>
                                            </thead>    <tbody>
											<?php 
				$n=1;
				$query=$mysqli->query("SELECT * FROM `member` where `team`=0 or `team`=2 ORDER BY serial desc ");
				while($mem=mysqli_fetch_object($query)){
				$tree=mysqli_fetch_object($mysqli->query("SELECT * FROM `tree` where `user_id`='$mem->user_id' "));
				$downline=mysqli_fetch_object($mysqli->query("SELECT count(user_id)as mem FROM `tree` where `upline`='$mem->log_id' "));
				$balance=mysqli_fetch_object($mysqli->query("SELECT * FROM `balance` where `user_id`='$mem->user_id' "));
				$profile=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` where `user_id`='$mem->user_id' "));
			?>
                                        
                                              
                                           <tr <?php if($downline->mem>6){echo"class='red'";} ?>>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th> 
             
		<td class="center"><?php echo $mem->log_id; ?><br>
		<a href="member_edit.php?userid=<?php echo $mem->user_id; ?>" target="blank"><span class='label label-info'>Edit</span></a></td>
		<td class="center"><?php echo $profile->mobile; ?></th> 
		<td class="center"><?php echo $profile->nid; ?></th> 
		<td class="center"><?php echo $tree->package; ?></th> 
		<td class="center"><?php 
		  if($tree->stype==1){echo"Happy";}
		  if($tree->stype==2){echo"Regular";}
		  if($tree->stype==3){echo"Lucky";}
		  if($tree->stype==4){echo"freedom";}
		  if($tree->stype==5){echo"Extreme";}
		  ?></td>
		<td><?php echo $tree->club; ?></td>
		<td>
		<?php echo $mem->date; ?><br>
		<?php
								if($tree->expdate>0){
                              
                                $d=strtotime("+$tree->expdate days");
                                echo date("d-M-Y", $d);
                                }else{
                                echo "<font color='red'>Expired </font>&nbsp;";    
                                }
			
			 ?>
		</td>
		<td><?php 
		if($tree->get>0){
                                
                                $d=strtotime("+".$tree->get." day");
                                echo date("d-M-Y", $d);
                                }else{
                                echo "<font color='red'>Expired</font>&nbsp;";    
                                }
		?></td>
		<td><?php echo $balance->net_bal; ?></td>
        <td class="center"><?php if($mem->active==1){ ?>
		<a href="member_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $mem->active; ?>"><span class='label label-success'>Active</span></a>
		<?php }else{?>
		<a href="member_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $mem->active; ?>"><span class='label label-danger'>Inactive</span> </a>
		<?php } ?></td>
		 <td class="center"><?php if($balance->active==1){ ?>
		<a href="member_trx_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $balance->active; ?>"><span class='label label-success'>Active</span></a>
		<?php }else{ ?>
		<a href="member_trx_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $balance->active; ?>"><span class='label label-warning'>Suspended</span> </a>
		<?php } ?>
		<a  target="blank" href="member_profile.php?userid=<?php echo $mem->user_id; ?>"><span class='label label-warning'>Details</span> </a>
		</td>
		 <td class="center"><?php if($tree->active==1){ ?>
		<a href="member_sp_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $tree->active; ?>"><span class='label label-success'>Active</span></a>
		<?php }else{?>
		<a href="member_sp_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $tree->active; ?>"><span class='label label-warning'>Suspended</span> </a>
		<?php } ?></td>

		<td class="center">
		<a href="member_login.php?member_id=<?php echo $mem->user_id; ?>" target="blank">
	
		
		<button type="submit" class='label label-primary'>Login</button>
		</a>
		</td> 


    </tr>
                                          
											<?php } ?>  </tbody>
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