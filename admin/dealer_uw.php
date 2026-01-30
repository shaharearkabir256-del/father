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
    <title>dealer List</title>
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
            dealer List
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">dealer List</li>
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
                  <h3 class="box-title"><a href="dealer_add.php"><button type="button" class="btn btn-success" onclick="treedata_create();">
								<i class="fa fa-asterisk"></i> Create New</button>
								</a></h3>
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
                                                     <th>ReferId</th>
													<th>UserId</th>												
													<th>Password</th>
													<th>Pin</th>
												
													<th>Join_Date</th>
													<th>Type</th>
													<th>Balance</th>
													
													
													
													<th>Zone</th>
													<th>District</th>
													<th>Upazila</th>
													<th>Union/Ward</th>
													
													<th>Status</th>
													<th>Action</th>
													<th>Panel</th>
													
													
                                                </tr>
                                            </thead>
											 <tbody>
											<?php 
				$n=1;
				$query=$mysqli->query("SELECT * FROM `dealer` where serial and `type`=4 order by serial desc ");
				while($mem=mysqli_fetch_object($query)){
				$bal=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer_balance` where `user_id`='".$mem->user_id."' "));
			?>
                                           
                                              
                                           <tr>
    
        <td class="center"  scope="row"><?php echo $n++; ?></td>
      
               <td class="center"><?php echo $mem->refer; ?></td>
               <td class="center"><?php echo $mem->log_id; ?></td>
        <td class="center"><?php echo $mem->password; ?></td>
        <td class="center"><?php echo $mem->pin; ?></td>
      
        <td class="center"><?php echo $mem->date; ?></td>
       
		
        <td class="center">
		<?php
		if($mem->type==6){echo "Merchant";}
		elseif($mem->type==5){echo "Agent";}
		elseif($mem->type==4){echo "Ward/Union";}
		elseif($mem->type==3){echo "Upazila";}
		elseif($mem->type==2){echo "District";}
		elseif($mem->type==1){echo "Zone";}
		else{echo "Not Set";}
		 ?>
		</td>
		 <td class="center"><?php echo $bal->net_bal; ?></td>
		 
		
		
        <td class="center">	
<?php
		$zone=mysqli_fetch_object($mysqli->query("SELECT * FROM `zone` where `zone_id`='".$mem->zone_id."' "));
		$upozela=mysqli_fetch_object($mysqli->query("SELECT * FROM `upozela` where `upozela_id`='".$mem->upozela_id."' "));
		$union=mysqli_fetch_object($mysqli->query("SELECT * FROM `union` where `union_id`='".$mem->union_id."' "));
		$ward=mysqli_fetch_object($mysqli->query("SELECT * FROM `ward` where `ward_id`='".$mem->ward_id."' "));

		
		echo 	$zone->zone;
?>	    
		</td>
        <td class="center"><?php echo $upozela->upozela; ?></td>
        <td class="center"><?php echo $union->union; ?></td>
        <td class="center"><?php echo $ward->ward; ?></td>
		
		<td class="center"><?php if($mem->chk==1){ ?>
		<a href="dealer_uw_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $mem->chk; ?>"><span class='label label-success'>Active</span></a>
		<?php }else{?>
		<a href="dealer_uw_chk.php?userid=<?php echo $mem->user_id; ?>&chk=<?php echo $mem->chk; ?>"><span class='label label-danger'>Inactive</span> </a>
		<?php } ?></td>
         <td class="center">
		<a href="dealer_add.php?userid=<?php echo $mem->user_id; ?>"><span class='label label-info'>Edit</span></a>
		</td>
		<td class="center">
		<a href="dealer_login.php?dealer=<?php echo $mem->user_id; ?>"><span class='label label-primary'>Login</span></a>
		</td>
       
		 
     


    </tr><?php } ?>
                                            </tbody>
											
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