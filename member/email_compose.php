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
                                <h1 class="title">Mailbox</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="email_inbox.php">Messaging</a>
                                    </li>
                                    <li class="active">
                                        <strong>Compose</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">

                                    <?php require_once('email_sidebar.php')?>
                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <div class="mail_content">

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <h3 class="mail_head">Compose</h3>
                                                    <i class='fa fa-refresh icon-primary icon-xs icon-orange mail_head_icon'></i>
                                                    <i class='fa fa-search icon-primary icon-xs icon-orange mail_head_icon'></i>
                                                    <i class='fa fa-cog icon-primary icon-xs icon-orange mail_head_icon pull-right'></i>


                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12 mail_view_title">

                                                    <div class='pull-right'>
                                                        <button class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Send" data-placement="top">
                                                            <i class="fa fa-paper-plane-o icon-xs"></i>
                                                        </button>
                                                        <button class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Save" data-placement="top">
                                                            <i class="fa fa-floppy-o icon-xs"></i>
                                                        </button>
                                                        <button class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Trash" data-placement="top">
                                                            <i class="fa fa-trash-o icon-xs"></i>
                                                        </button>
                                                    </div>

                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12 mail_view_info">

                                                    <div class="form-group mail_cc_bcc">
                                                        <label class="form-label" for="field-1">To:</label>
                                                        <span class="desc">e.g. "someemail@example.com"</span>
                                                        <div class="labels"><span class='label label-secondary cc'>CC</span> <span class='label label-secondary bcc'>BCC</span>
                                                        </div>
                                                        <div class="controls">
                                                            <input type="text" class="form-control mail_compose_to" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group mail_compose_cc">
                                                        <label class="form-label" for="field-1">CC:</label>
                                                        <span class="desc">e.g. "someemail@example.com"</span>
                                                        <div class="controls">
                                                            <input type="text" class="form-control mail_compose_to" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group mail_compose_bcc">
                                                        <label class="form-label" for="field-1">BCC:</label>
                                                        <span class="desc">e.g. "someemail@example.com"</span>
                                                        <div class="controls">
                                                            <input type="text" class="form-control mail_compose_to" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label" for="field-1">Subject:</label>
                                                        <span class="desc">e.g. "Meeting in 1st week"</span>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label" for="field-1">Message:</label>
                                                        <textarea class="mail-compose-editor" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>
                                                    </div>



                                                </div>





                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <div class='pull-left'>
                                                        <button class="btn btn-primary">
                                                            <i class="fa fa-paper-plane-o icon-xs"></i> &nbsp; SEND
                                                        </button>
                                                        <button class="btn btn-purple">
                                                            <i class="fa fa-floppy-o icon-xs"></i> &nbsp; SAVE
                                                        </button>
                                                        <button class="btn btn-secondary">
                                                            <i class="fa fa-trash-o icon-xs"></i> &nbsp; TRASH
                                                        </button>
                                                    </div>

                                                </div>





                                            </div>

                                        </div>
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
        <script src="assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script> <script src="assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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



