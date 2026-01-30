<?php require('session.php');
$check= mysqli_num_rows($mysqli->query("select * from `cart` where `csrc`='".$id."'"));
if($check>0){
$invoice=time();
$cartq=$mysqli->query("SELECT * FROM `cart` where `csrc`='".$id."'");
	while($cart=mysqli_fetch_object($cartq)){ 
		if($cart->browser=="agent"){
			$recid=$cart->prod_uid;
			$agn_mer_com=1;
		}elseif($cart->browser=="merchant"){
			$recid=$cart->prod_uid;
			$agn_mer_com=2;
		}else{
			$recid=1547290479;//admin>product
		}
		$q=$mysqli->query("SELECT * FROM `product` WHERE `serial`='$cart->p_id' ");
		$chkprod=mysqli_num_rows($q);
			if($chkprod>0){
				$product=mysqli_fetch_object($q);
				if($product->offer==1){$price=$product->discount_price;}else{$price=$product->sale_price;}
				$tprice=$price*$cart->qty;
				$tpoint=$product->rp*$cart->qty;
				
				$mysqli->query("INSERT INTO `prod_req`(`send_id`, `rec_id`, `p_id`, `division`, `district`,`upozela`, `dunion`, `ward`, `dsd`, `name`, `price`, `rp`, `img1`, `qty`, `date`, `chk`) 
				VALUES ('".$id."','".$recid."','".$product->serial."','".$product->division."','".$product->district."','".$product->ps."','".$product->dunion."','".$product->ward."','".$product->dsd."','".$product->name."','".$price."','".$product->rp."','".$product->img1."','".$cart->qty."','".$date."','0')");	
				
				
			 	$agent_com=$tpoint*$agn_mer_com/100;
				$mysqli->query("INSERT INTO `invoice`(`agent_id`,`agent_com`,`product_id`,`invoice`,`user_id`,`name`, `price`, `qty`, `tprice`, `point`, `tpoint`, `sdate`,`type`) 
				VALUES('$recid','$agent_com','".$product->serial."','".$invoice."','".$id."','".$product->name."','".$price."','".$cart->qty."','".$tprice."','".$product->rp."','".$tpoint."','".$date."','0')");
			$checkinv= mysqli_num_rows($mysqli->query("select * from `invoice` where `type`='1' and `agent_id`='$recid' and `invoice`='".$invoice."'"));	

				if($checkinv==0){
				$inv=mysqli_fetch_object($mysqli->query("select sum(tpoint)as `trp` from `invoice` where `user_id`='".$id."' and `paid`='1' and `type`='0' "));
				$mysqli->query("INSERT INTO `invoice`(`previous_point`,`agent_id`,`agent_com`,`invoice`,`name`,`user_id`,`sdate`,`type`) 
				VALUES('$inv->trp','$recid','$agent_com','".$invoice."','".invoice."','".$id."','".$date."','1')");
				}
			}
		
	} 
$mysqli->query("DELETE FROM `cart` WHERE `csrc`='".$id."'");
}
?>
<!DOCTYPE html>
<html class=" ">
<?php require_once("head.php")?>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
        <!-- START TOPBAR -->
        <?php require_once("topbar.php")?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <?php require_once("sidebar.php")?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title"><?php echo $page;?> | <a href="../index.php" target="_blank">Go To Shop</a></h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="#"><?php echo $page;?></a>
                                    </li>
                                    <li class="active">
                                        <strong>All <?php echo $page;?></strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">All <?php echo $page;?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->
<div class="table-responsive">
                   <table id="example" class="table table-bordered table-striped">
                    <thead>
    <tr>
        <th>#</th>
         <th>Pic</th>
        <th>Product Name</th>
        <th>Date</th>
        <th>Order To</th>
		<th>Price</th>
		<th>Point</th>
		<th>Total Point</th>
        <th>Quantity</th>
		<th>Total</th>
        <th>Status</th>
 
    </tr>
    </thead>
	<tbody>
			<?php $n=1;
				$query=$mysqli->query("SELECT * FROM `prod_req` where `send_id`='$id' order by serial desc ");
				while($product=mysqli_fetch_object($query)){ 
			?>
    
    <tr <?php if($date==$product->date){ ?> bgcolor="#ffffcc" <?php } ?> >
        <td><?php echo $n++; ?></td>
   
       
        <td><img height="50" src="../../product/<?php echo $product->img1; ?>" alt=""></td>
        <td><?php echo $product->name; ?></td>
        <td><?php echo $product->date; ?></td>
        <td><?php 
		$info = mysqli_fetch_object($mysqli->query("select * from `dealer` where `user_id`='".$product->rec_id."'"));		
		if($product->rec_id=='999'){
		echo "Company";
		}else{
			echo $info->log_id;
		}
		?></td>

		<td><?php  echo $product->price.$tk;?></td>
		<td><?php  echo $product->rp;?></td>
		<td><?php  echo $trp=$product->rp*$product->qty;?></td>
		<td><?php echo $product->qty; ?></td>
		<td><?php $total=$product->price*$product->qty; echo $total.$tk ?></td>					
		<td>

		<?php if($product->chk==0){ ?>
<span class='label label-warning'>Pending</span>
		<?php }elseif($product->chk==1){ ?>
			<span class='label label-success'>Accepted</span>
		<?php }elseif($product->chk==2){ ?>
		<span class='label label-danger'>Canceled</span>
		<?php } ?>	
		</form>  
		</td>
		
    </tr>
    
       
					<?php } ?>	
            

             
             
                    </tbody>
                    <tfoot>
    <tr>
        <th>#</th>
         <th>Pic</th>
        <th>Product Name</th>
        <th>Date</th>
		<th>Order To</th>
		<th>Price</th>
		<th>Point</th>
		<th>Total Point</th>
        <th>Quantity</th>
		<th>Total</th>
        <th>Status</th>
      
    </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->

                                        <!-- ********************************************** -->




                                    </div>
                                </div>
                            </div>
                        </section></div>






                </section>
            </section>
            <!-- END CONTENT -->
            <div class="page-chatapi hideit">

                <div class="search-bar">
                    <input type="text" placeholder="Search" class="form-control">
                </div>

                <div class="chat-wrapper">
                    <h4 class="group-head">Groups</h4>
                    <ul class="group-list list-unstyled">
                        <li class="group-row">
                            <div class="group-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Work</a></h4>
                            </div>
                        </li>
                        <li class="group-row">
                            <div class="group-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Friends</a></h4>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">Favourites</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_1' data-user-id='1'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clarine Vassar</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_2' data-user-id='2'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Brooks Latshaw</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_3' data-user-id='3'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clementina Brodeur</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">More Contacts</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_4' data-user-id='4'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Carri Busey</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_5' data-user-id='5'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Melissa Dock</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_6' data-user-id='6'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Verdell Rea</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_7' data-user-id='7'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Linette Lheureux</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_8' data-user-id='8'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Araceli Boatright</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_9' data-user-id='9'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clay Peskin</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_10' data-user-id='10'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Loni Tindall</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_11' data-user-id='11'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Tanisha Kimbro</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_12' data-user-id='12'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Jovita Tisdale</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>


            <div class="chatapi-windows ">


            </div>    </div>
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 













        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Section Settings</h4>
                    </div>
                    <div class="modal-body">

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>



