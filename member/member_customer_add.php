<?php require('session.php');?>
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
                                <h1 class="title">Available Customer(<?php echo $bal->customer; ?>)</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="#"><?php echo $page;?></a>
                                    </li>
                                    <li class="active">
                                        <strong><?php echo $page;?></strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left"><?php echo $page;?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">


                                        <!-- ********************************************** -->
			  <div class="col-xs-10">
                   <p class="text-muted">
                   <font color="red">   <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?> </font>
				   <font color="green"> <?php if(isset($_SESSION['msgs'])){echo $_SESSION['msgs'];} ?> </font>
				  </p>
                  <!--Register Form-->
                  <form name="registration_form" action="member_customer_add_act.php" name="member" onsubmit="return process()" method="post" id='registration_form' class="form-horizontal">
                <div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="firstname" class="control-label">First Name</label>
                        <input id="firstname" class="form-control" type="text" name="fname" title="Enter first name" placeholder="First name"/>
                      </div>
                 </div>
				  <div class="col-sm-6">  
                      <div class="form-group">
                        <label for="lastname" class="control-label">Last Name</label>
                        <input id="lastname" class="form-control" type="text" name="lname" title="Enter last name" placeholder="Last name"/>
                      </div>
                  </div>
                </div>
				
				<div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Email<font color="#990000">*</font></label>
                        <input required id="email" class="form-control" type="email" name="email"  onblur="this.value=removeSpaces(this.value); title="Enter Email" placeholder="Your Email"/>
                      </div>
                  </div>
				<div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Mobile<font color="#990000">*</font></label>
                        <input required id="mobile" class="form-control" type="text" name="mobile" title="Enter Mobile" placeholder="Your Mobile"/>
                      </div>
                </div>
              </div>
                 
			<div class="col-sm-12">
				<div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Customer ID<font color="#990000">*</font></label>
                        <input required class="form-control" type="text" name="userid" id="User_ID" onchange="return check_user_id();" onblur="this.value=removeSpaces(this.value);" onkeyup="return check_user_id();"  title="Enter Usre ID" placeholder="Your User Id"/>
						</div>
				</div>
					<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="user_id_error"></div>
					 </div>
					 </div>
					 
			</div>
				<div class="col-sm-12">
				  <div class="col-sm-6">	  
					   <div class="form-group">
                        <label for="email" class="control-labely">Sponsor ID<font color="#990000">*</font></label>
                        <input class="form-control" type="text" name="sponsor" id="Reference" onchange="return check_ref_id();" onblur="this.value=removeSpaces(this.value);"  onkeyup="return check_ref_id();" title="Enter Sponsor ID" placeholder="Your Sponsor Id" readonly />
					  </div>
				  </div>
				  	<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="ref_error"></div>
					 </div>
					 </div>
					 
			</div>
			<div class="col-sm-12">
				  <div class="col-sm-6">	
					  <div class="form-group">
					   <?php $placement=$_GET['placement'];?>
                        <label for="email" class="control-labely">Placement ID<font color="#990000">*</font></label>
                        <input class="form-control" type="text" name="plcmnt" <?php if($placement!=''){?> value="<?php echo $placement;?>"<?php } ?> id="Uplink" onchange="return check_uplink_id();" onblur="this.value=removeSpaces(this.value);" onkeyup="return check_uplink_id();" title="Enter Placement ID" placeholder="Your Placement Id" readonly />
					  </div>
				   </div>
				   	<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="spon_error"></div>
					 </div>
					 </div>
					 
			</div>
			
                <div class="col-sm-12">
				  <div class="col-sm-6">    
                      <div class="form-group">
                        <label for="password" class="control-labely">Password<font color="#990000">*</font></label>
                        <input required class="form-control" type="password" name="passOne" title="Enter password" value="12345"/>
                      </div>
                  </div>
					<div class="col-sm-6"> 
                        <div class="form-group">
                        <label for="pinn" class="control-labely">Pin<font color="#990000">*</font></label>
                        <input required class="form-control" type="password" name="pinOne" title="Enter Pin Code" value="1234"/>
					  </div>
					</div>
				</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
						 </div>
	
               <!--Registration Form Contents Ends-->
                
                <!--Login-->
              </div>

						<!--End-->
                       
                            
						
								 </form><!--Register Now Form Ends-->
                           
                        </div>
                        
                       
                    </div>

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
		<script src="js/signup.js"></script>


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

<?php
unset($_SESSION['msg']);
unset($_SESSION['msgs']);
?>

