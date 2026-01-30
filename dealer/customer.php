<?php require_once('session.php');
		$agentid=$_GET['agentid'];	
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page="Customer";?> List</title>
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
            <?php echo $page;?>
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         
            <li class="active"><?php echo $page;?> List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $page;?> List</h3>
                </div><!-- /.box-header -->
                <div class="box-body  table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                                                     <th>#</th>
													<th>UserId</th>													
													<th>Photo</th>													
													<th>Name</th>													
													<th>Mobile</th>													
													<th>Email</th>													
													<th>Gender</th>													
													<th>DOB</th>													
													<th>Address</th>													
													<th>Rank</th>													
													<th>Join Date</th>
													<th>Status</th>
												
                                                </tr>
                                            </thead>
											  <tbody>
											<?php 
				$n=1;
	/* 			if($agentid!=''){
					$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` where `log_id`='$agentid'"));
					$myid=$del->user_id;
					}else{
					$myid=$_SESSION['DealerLogId'];	
					} */
				$query=$mysqli->query("SELECT * FROM `member` where `agent_id`='$id' and `team`='1' ");
				while($mem=mysqli_fetch_object($query)){ 
				
			?>
                                          
                                              
                                           <tr>
    
        <th class="center"  scope="row"><?php echo $n++; ?></th>
             
		<td class="center"><?php echo $mem->log_id; ?></td>
		<td class="center">
		
		<?php $query2=$mysqli->query("SELECT * FROM `profile` where user_id='$mem->user_id'");
		while($pro=mysqli_fetch_object($query2)){ ?> 
		
		<img src="../pic/<?php echo $pro->photo ?>" class="media-object img-thumbnail user-img" width="60" height="80" alt="User Picture" />
			<?php } ?>
		</td>

        
        <td class="center">
		<?php 
		$pro1=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` where user_id='$mem->user_id'"));
		echo $pro1->fname." ".$pro1->lname; ?>
		</td>
        <td class="center"><?php echo $pro1->mobile; ?></td>
        <td class="center"><?php echo $pro1->email; ?></td>
        <td class="center"><?php echo $pro1->sex; ?></td>
        <td class="center"><?php echo $pro1->birth; ?></td>
        <td class="center">
		<?php echo $pro1->vill; ?>,
		 <?php echo $pro1->upozela; ?>,
		<?php echo $pro1->union; ?>,
		<?php echo $pro1->post; ?>,
		 <?php echo $pro1->country; ?>.
		</td>
        <td class="center"><?php echo $pro1->rank; ?></td>
        <td class="center"><?php echo $mem->date; ?></td>
        <td class="center"><?php if($mem->active==1){ ?>
		<span class='label label-success'>Active</span>
		<?php }else{?>
	<span class='label label-danger'>Inactive</span> 
		<?php } ?></td>
	


    </tr>
                                          
									<?php } ?>		
            

             
             
                    </tbody>
                    <tfoot>
                      <tr>
													<th>#</th>
													<th>UserId</th>													
													<th>Photo</th>													
													<th>Name</th>													
													<th>Mobile</th>													
													<th>Email</th>													
													<th>Gender</th>	
													<th>DOB</th>														
													<th>Address</th>													
													<th>Rank</th>													
													<th>Join Date</th>
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
