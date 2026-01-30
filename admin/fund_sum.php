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
    <title>Fund Summery</title>
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
            Fund Summery
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Fund Summery</li>
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
                  <h3 class="box-title">Fund Summery</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				<!-- Main Content Area -->
				 <?php
								if($_SESSION['msg']){echo "<button class='btn-danger btn-block'>".$_SESSION['msg']."</button>";}
								if($_SESSION['msgs']){echo "<button class='btn-success btn-block'>".$_SESSION['msgs']."</button>";}
							?>
				 <table id="example1" class="table table-bordered  table-hover">
                    <thead>
                      <tr>
			
                        <th>PSC</th>
                        <th>Yearly</th>
                        <th>Distributor</th>
                        <th>Leader Code</th>
                        <th>Imaging Achieve Dealer</th>
                        <th>Dealer Royalty</th>
                        <th>Legal Advisor</th>
                        <th>Welfare</th>
                        <th>Caring</th>
                        <th>Medical</th>
                        <th>Advertising</th>
                        <th>Company</th>
                      </tr>
                    </thead>
                    <tbody>
					 
					  
                      <?php 
					  /* 
					  SELECT `serial`, 
					  `user_id`, `sponsor_id`, `upline_id`,  `date`,
					  `yearly`, `psc`, `distributor`, `lc`, `iad`, `royality`, `la`, `welfare`, `caring`, `medical`, `ad`, `company`, 
					  `chk` FROM `com` WHERE 1
					  */
				$n=1;
				$query=$mysqli->query("SELECT sum(psc)as `pscs`,sum(yearly)as yearlys,sum(distributor)as distributors,sum(lc)as lcs,sum(iad)as iads,
				sum(royality)as royalitys,sum(la)as las,sum(welfare)as welfares,sum(caring)as carings,sum(medical)as medicals,sum(ad)as ads,sum(company)as companys
				FROM `com` ");
				$mem=mysqli_fetch_object($query);

			?>  
                                           <tr>
    
  
		
 
        <td class="center"><?php echo $mem->pscs; ?> </td>
        <td class="center"><?php echo $mem->yearlys; ?> </td>
        <td class="center"><?php echo $mem->distributors; ?> </td>
        <td class="center"><?php echo $mem->lcs; ?> </td>
        <td class="center"><?php echo $mem->iads; ?> </td>
        <td class="center"><?php echo $mem->royalitys; ?> </td>
        <td class="center"><?php echo $mem->las; ?> </td>
        <td class="center"><?php echo $mem->welfares; ?> </td>
        <td class="center"><?php echo $mem->carings; ?> </td>
        <td class="center"><?php echo $mem->medicals; ?> </td>
        <td class="center"><?php echo $mem->ads; ?> </td>
        <td class="center"><?php echo $mem->companys; ?> </td>

		
		

		


    </tr>
	
					  
                    </tbody>
                    <tfoot>
         
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