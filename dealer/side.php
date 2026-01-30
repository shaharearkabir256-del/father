 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="photo/<?php echo $info->photo?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php 
			$id=$_SESSION['DealerLogId'];
			$del=mysqli_fetch_object($mysqli->query("SELECT * FROM `dealer` WHERE `user_id`='$id' "));
			$acc=mysqli_fetch_object($mysqli->query("SELECT `net_bal` FROM `dealer_balance` WHERE `user_id`='".$id."'"));
			$req_new=mysqli_num_rows($mysqli->query("SELECT * FROM `withdraw` where `status`='0' and `rec_id`='".$id."' and `type`='0' and `account`='3'")); // Request
			$wit_new=mysqli_num_rows($mysqli->query("SELECT * FROM `withdraw` where `status`='0' and `rec_id`='".$id."' and `type`='1' and `account`='3'")); // Withdraw

			  $q1=$mysqli->query("select * from `dealer_info` where `user_id`='".$id."' ");
			  $chk1=mysqli_num_rows($q1);
			 $info=mysqli_fetch_object($q1);
			 
			 if($chk1==1){echo $info->fname." ".$info->lname;}else{ echo "James Bond"; }
			  ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $del->log_id;?></a>
            </div>
          </div>
          <!-- search form -->
        
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header active"><a href=""><h4><?php echo $acc->net_bal.$t; ?></h4> </a></li>
            <li class="treeview">
              <a href="home.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
              
            </li>
			 <li>
                  <a href="#"><i class="fa fa-user"></i> <span>Profile<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
				<li><a href="profile.php?pageName=Profile"><i class="fa fa-user"></i>Profile Update</a></li>
                <li><a href="photo.php?pageName=Photo Update"><i class="fa fa-circle-o text-info"></i> Photo Update</a></li>
                   
				  </ul>
                </li>
				
		
			
			<?php if($del->type!=6){ ?> 
			 <li>
                  <a href="#"><i class="fa fa-cart-plus"></i> <span> Products Management<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
				<li><a href="prod.php?pageName=All Products"><i class="fa fa-cart-plus"></i>General Products</a></li>
                   <li><a href="prod_invoice.php?pageName=Invoice List"><i class="fa fa-circle-o text-info"></i> Invoice List</a></li>
                   <li><a href="prod_invoice_add.php?pageName=Create New Invoice"><i class="fa fa-circle-o text-info"></i> Create New Invoice</a></li>
				   <li><a href="product_shop_cart.php"><i class="fa fa-circle-o"></i>Shopping Cart</a></li>
                  </ul>
                </li>
				
			<li><a href="#"><i class="fa fa-th"></i> <span>Stock Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu" style="display: <?php if($_GET['stockActive']==1){ ?>block<?php }else{ ?>none<?php } ?>;">
					<?php if($del->type!=1){ ?> 
					<li><a href="prod_up.php?pageName=Products(Upline Dealer)&&stockActive=1"><i class="fa fa-circle-o text-danger"></i> <span>Products(Upline Dealer)</span> </a></li>    
					<?php } ?>
					<li><a href="prod_req.php?pageName=Products(Company)&&stockActive=1"><i class="fa fa-circle-o text-danger"></i> <span>Products(Company)</span> </a></li>    
					<li><a href="prod_req_list.php?pageName=Product Request List&&stockActive=1"><i class="fa fa-circle-o text-danger"></i> <span>Product Request List</span> </a></li> 
					<?php if($del->type!=5){ ?> 
					<li><a href="prod_req_list2.php?pageName=Product Order List&&stockActive=1"><i class="fa fa-circle-o text-danger"></i> <span>Product Order List</span> </a></li> 
					<li><a href="prod_out.php?pageName=Stock Out&&stockActive=1"><i class="fa fa-circle-o text-warning"></i> <span>Stock Out</span> </a></li>  
					<?php } ?>
					<li><a href="prod_in.php?pageName=Stock In&&stockActive=1"><i class="fa fa-circle-o text-danger"></i> <span>Stock In</span> </a></li>            
					<li><a href="prod_sales.php?pageName=Stock Out&&stockActive=1"><i class="fa fa-circle-o text-danger"></i> <span>Stock Out</span> </a></li>            
				</ul>
			</li> 
			<?php } ?>
			<?php if($del->type==5){ ?> 
	
			<li><a href="prod_order_list.php?pageName=Product Order List"><i class="fa fa-th"></i> <span>Product Order List</span> </a></li>  
			<li><a href="prod_delivery_list.php?pageName=Product Delivery List"><i class="fa fa-th"></i> <span>Product Delivery List</span> </a></li>  
			<li><a href="#"><i class="fa fa-group"></i> <span>Members</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu" style="display: <?php if($_GET['memberActive']==1){ ?>block<?php }else{ ?>none<?php } ?>;">
					<li><a href="member.php?pageName=Member List&&memberActive=1"><i class="fa fa-group"></i> <span>Member List</span> </a></li> 
					<li><a href="member_add.php?pageName=Add New Member&&memberActive=1"><i class="fa fa-plus"></i> <span>Add New Member</span> </a></li> 
					<li><a href="customer.php?pageName=Customer List&&memberActive=1"><i class="fa fa-group"></i> <span>Customer List</span> </a></li> 
					<li><a href="customer_add.php?pageName=Add New Customer&&memberActive=1"><i class="fa fa-plus"></i> <span>Add New Customer</span> </a></li> 
				</ul>
			</li>
			<li><a href="bal_pay_to_mem.php?pageName=Payment Member(Virtual)"><i class="fa fa-usd"></i> <span>Payment Member(Virtual)<?php if($req_new>0){ ?><small title="Withdraw Pending Request" class="label pull-right bg-yellow"><?php echo $req_new; ?></small><?php } ?></span> </a></li>  
			<li><a href="bal_pay_to_mem_cash.php?pageName=Payment Member(Cash)"><i class="fa fa-usd"></i> <span>Payment Member(Cash)<?php if($wit_new>0){ ?><small title="Withdraw Pending Request" class="label pull-right bg-yellow"><?php echo $wit_new; ?></small><?php } ?></span> </a></li>  
			<?php } ?>
			<?php if($del->type==6){ ?> 
<!--Merchant-->
			<li><a href="#"><i class="fa fa-cart-plus "></i> <span>Product Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu" style="display: <?php if($_GET['ProductActive']==1){ ?>block<?php }else{ ?>none<?php } ?>;">
				<li><a href="prod_order_list.php?pageName=Product Order List"><i class="fa fa-th"></i> <span>Product Order List</span> </a></li>  
					<li><a href="prod.php?pageName=Company Product List&&ProductActive=1"><i class="fa fa-cart-plus text-warning"></i> <span>Company Product </span> </a></li>
					<li><a href="prod_gen.php?pageName=General Product List&&ProductActive=1"><i class="fa fa-cart-plus text-warning"></i> <span>General Product </span> </a></li>
					<li><a href="merchant_prod_list.php?pageName=Merchant Product List&&ProductActive=1"><i class="fa fa-cart-plus text-warning"></i> <span>Merchant Product </span> </a></li>
					<li><a href="merchant_prod_add.php?pageName=Product Add&&ProductActive=1"><i class="fa fa-plus text-warning"></i> <span>Product Add</span> </a></li> 			
					<li><a href="prod_invoice.php?pageName=Invoice List&&ProductActive=1"><i class="fa fa-circle-o text-info"></i> Invoice List</a></li>
					<li><a href="prod_invoice_add.php?pageName=Create New Invoice&&ProductActive=1"><i class="fa fa-plus text-info"></i> Create New Invoice</a></li>
					<li><a href="merchant_sales_list.php?pageName=Sales List&&ProductActive=1"><i class="fa fa-cart-plus text-success"></i> <span>Sales List</span> </a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-group"></i> <span>Customer Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu" style="display: <?php if($_GET['memberActive']==1){ ?>block<?php }else{ ?>none<?php } ?>;">
					<li><a href="customer.php?pageName=Customer List&&memberActive=1"><i class="fa fa-group"></i> <span>Customer List</span> </a></li> 
					<li><a href="customer_add.php?pageName=Add New Customer&&memberActive=1"><i class="fa fa-plus"></i> <span>Add New Customer</span> </a></li> 
				</ul>
			</li>
			<?php } ?>
			<li><a href="#"><i class="fa fa-usd"></i> <span>Balance</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu" style="display: <?php if($_GET['BalanceActive']==1){ ?>block<?php }else{ ?>none<?php } ?>;">
					<?php if($del->type!=6){ ?> 
					<li><a href="bal_virtual_to_del.php?pageName=Payment(Virtual)&&BalanceActive=1"><i class="fa fa-usd"></i> <span>Payment(Virtual)</span> </a></li>  	
					<?php } ?>
					<li><a href="bal_trx.php?pageName=Transaction&&BalanceActive=1"><i class="fa fa-usd"></i> <span> Transaction</span> </a></li> 
					<li><a href="bal_rec.php?pageName=Received&&BalanceActive=1"><i class="fa fa-usd"></i> <span>Received</span> </a></li> 			 
					<li><a href="bal_rec_shop.php?pageName=Received(Shop)&&BalanceActive=1"><i class="fa fa-usd"></i> <span>Received(Shop)</span> </a></li> 			 
					<li><a href="bal_req.php?pageName=Request&&BalanceActive=1"><i class="fa fa-usd"></i> <span> Request</span> </a></li> 			 
					<li><a href="bal_with.php?pageName=Withdraw&&BalanceActive=1"><i class="fa fa-money"></i> <span> Withdraw</span> </a></li> 
					
					 <?php if($del->type!=6){ ?> 	
					<li><a href="bal_pay_to_del.php?pageName=Payment(Cash)&&BalanceActive=1"><i class="fa fa-money"></i> <span>Payment(Cash)</span> </a></li>
					 <?php } ?>
					 <li><a href="dealer_mobile_recharge.php"><i class="fa fa-money"></i> <span> Mobile Recharge</span> </a></li> 
					 
				</ul>
			</li>  	
            
           <?php if($del->type!=5 && $del->type!=6){ ?> 	
			   
            <li><a href="dealer.php?pageName=Dealer List"><i class="fa fa-user"></i> <span>Dealer List</span> </a></li>   
  			<?php } ?>
			<?php if($del->type!=6){ ?>
			<li><a href="#"><i class="fa fa-usd"></i> <span>Commission</span> <i class="fa fa-angle-left pull-right"></i> </a>
			<ul class="treeview-menu" style="display: <?php if($_GET['Commission']==1){ ?>block<?php }else{ ?>none<?php } ?>;">
				<li><a href="com.php?pageName=Commission Chart"><i class="fa fa-usd"></i> <span>Commission Chart</span> </a></li> 
				<li><a href="com_mem_join.php?pageName=Member Joining Commission"><i class="fa fa-usd"></i> <span>Member Joi Com</span> </a></li> 
			</ul>
			</li> 
			<?php } ?>
			 <?php if($del->type==5){ ?> 
			<li><a href="#"><i class="fa fa-usd"></i> <span>Transaction Commission</span> <i class="fa fa-angle-left pull-right"></i> </a>
			<ul class="treeview-menu" style="display: <?php if($_GET['Commission']==1){ ?>block<?php }else{ ?>none<?php } ?>;">
				<li><a href="com_trx_agent.php?pageName=com&&Commission=1"><i class="fa fa-money"></i> <span> Transaction Agent</span> </a></li>  
				<li><a href="com_wit_agent.php?pageName=com&&Commission=1"><i class="fa fa-money"></i> <span>Withdraw Agent</span> </a></li> 			
			
			<!--<li><a href="com_trxr.php?pageName=com&&Commission=1"><i class="fa fa-money"></i> <span>trxr</span> </a></li> 	
			<li><a href="com_dtrxs.php?pageName=com&&Commission=1"><i class="fa fa-money"></i> <span>dtrxs</span> </a></li> -->
				</ul>
			</li> 
			<?php } ?>
			<?php if($del->type==6){ ?> 
			<li><a href="merchant_com.php?pageName=Sales Commission Chart"><i class="fa fa-usd"></i> <span>Sales Commission Chart</span> </a></li> 
			<?php } ?>
			<li><a href="logout.php"><i class="fa fa-user"></i> <span>Logout</span> </a></li>  
			
		
         
         
            
            <li><a href="#">
				<i class="fa fa-circle-o text-danger"></i> 
				<i class="fa fa-circle-o text-warning"></i> 
				<i class="fa fa-circle-o text-info"></i>
				<span class="label label-primary pull-right">4</span>
				<small class="label pull-right bg-green">Hot</small>
				 <small class="label pull-right bg-red">3</small>
				   <small class="label pull-right bg-yellow">12</small>
			</a></li>
			<li><a href="#"><span></span> </a></li>  
			<li><a href="#"><span></span> </a></li>  
			<li><a href="#"><span></span> </a></li>  
			<li><a href="#"><span></span> </a></li>  
			<li><a href="#"><span></span> </a></li>  
			<li><a href="#"><span></span> </a></li>  
          </ul>
      
        </section>
        <!-- /.sidebar -->
      </aside>