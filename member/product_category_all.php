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
                                <h1 class="title">Categories</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="product_category_all.php">Product Categories</a>
                                    </li>
                                    <li class="active">
                                        <strong>Product Categories</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">All Categories</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->


                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Category Name</th><th>Description</th><th>No. of Products</th>                    </tr>
                                            </thead>

                                            <tbody>
                                                <tr><td>1</td><td>electronics</td><td>Maecenas rhoncus aliquam lacus.</td><td>76</td></tr><tr><td>2</td><td>software</td><td>Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo.</td><td>56</td></tr><tr><td>3</td><td>hardware</td><td>Nullam porttitor lacus at turpis.</td><td>38</td></tr><tr><td>4</td><td>shoes</td><td>Nunc nisl.</td><td>31</td></tr><tr><td>5</td><td>electronics</td><td>Nunc nisl.</td><td>62</td></tr><tr><td>6</td><td>electronics</td><td>Aliquam quis turpis eget elit sodales scelerisque.</td><td>70</td></tr><tr><td>7</td><td>software</td><td>Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.</td><td>53</td></tr><tr><td>8</td><td>shoes</td><td>Fusce consequat.</td><td>89</td></tr><tr><td>9</td><td>accessories</td><td>Maecenas tincidunt lacus at velit.</td><td>88</td></tr><tr><td>10</td><td>tools</td><td>Sed sagittis.</td><td>48</td></tr><tr><td>11</td><td>clothes</td><td>Aenean auctor gravida sem.</td><td>61</td></tr><tr><td>12</td><td>clothes</td><td>Integer tincidunt ante vel ipsum.</td><td>48</td></tr><tr><td>13</td><td>clothes</td><td>Fusce consequat.</td><td>50</td></tr><tr><td>14</td><td>shoes</td><td>Suspendisse ornare consequat lectus.</td><td>47</td></tr><tr><td>15</td><td>accessories</td><td>Nulla facilisi.</td><td>38</td></tr><tr><td>16</td><td>accessories</td><td>Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.</td><td>63</td></tr><tr><td>17</td><td>electronics</td><td>Maecenas rhoncus aliquam lacus.</td><td>37</td></tr><tr><td>18</td><td>accessories</td><td>Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.</td><td>58</td></tr><tr><td>19</td><td>electronics</td><td>Nullam varius.</td><td>83</td></tr><tr><td>20</td><td>accessories</td><td>Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.</td><td>61</td></tr><tr><td>21</td><td>accessories</td><td>Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.</td><td>51</td></tr><tr><td>22</td><td>accessories</td><td>In congue.</td><td>52</td></tr><tr><td>23</td><td>software</td><td>Mauris sit amet eros.</td><td>87</td></tr><tr><td>24</td><td>shoes</td><td>Praesent blandit.</td><td>35</td></tr><tr><td>25</td><td>clothes</td><td>In hac habitasse platea dictumst.</td><td>80</td></tr><tr><td>26</td><td>tools</td><td>In est risus, auctor sed, tristique in, tempus sit amet, sem.</td><td>32</td></tr><tr><td>27</td><td>accessories</td><td>Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.</td><td>83</td></tr><tr><td>28</td><td>tools</td><td>Sed accumsan felis.</td><td>78</td></tr><tr><td>29</td><td>tools</td><td>In hac habitasse platea dictumst.</td><td>48</td></tr><tr><td>30</td><td>software</td><td>Nulla facilisi.</td><td>79</td></tr><tr><td>31</td><td>electronics</td><td>Morbi porttitor lorem id ligula.</td><td>35</td></tr><tr><td>32</td><td>software</td><td>Quisque porta volutpat erat.</td><td>66</td></tr><tr><td>33</td><td>hardware</td><td>Donec posuere metus vitae ipsum.</td><td>57</td></tr><tr><td>34</td><td>tools</td><td>Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.</td><td>36</td></tr><tr><td>35</td><td>tools</td><td>Curabitur in libero ut massa volutpat convallis.</td><td>59</td></tr><tr><td>36</td><td>clothes</td><td>Morbi ut odio.</td><td>72</td></tr><tr><td>37</td><td>software</td><td>Nam dui.</td><td>66</td></tr><tr><td>38</td><td>accessories</td><td>Suspendisse ornare consequat lectus.</td><td>40</td></tr><tr><td>39</td><td>software</td><td>Praesent id massa id nisl venenatis lacinia.</td><td>73</td></tr><tr><td>40</td><td>clothes</td><td>Curabitur convallis.</td><td>63</td></tr><tr><td>41</td><td>clothes</td><td>Cras non velit nec nisi vulputate nonummy.</td><td>61</td></tr><tr><td>42</td><td>hardware</td><td>Suspendisse potenti.</td><td>42</td></tr><tr><td>43</td><td>clothes</td><td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td><td>39</td></tr><tr><td>44</td><td>shoes</td><td>Vivamus vestibulum sagittis sapien.</td><td>38</td></tr><tr><td>45</td><td>software</td><td>Mauris sit amet eros.</td><td>51</td></tr><tr><td>46</td><td>electronics</td><td>Aenean sit amet justo.</td><td>90</td></tr><tr><td>47</td><td>hardware</td><td>Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.</td><td>88</td></tr><tr><td>48</td><td>shoes</td><td>Pellentesque at nulla.</td><td>64</td></tr><tr><td>49</td><td>software</td><td>Aliquam quis turpis eget elit sodales scelerisque.</td><td>35</td></tr><tr><td>50</td><td>shoes</td><td>Nunc purus.</td><td>47</td></tr>
                                            </tbody>
                                        </table>
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



