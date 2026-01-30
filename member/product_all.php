<!DOCTYPE html>
<html class=" ">
<?php require_once('head.php')?>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <?php require_once('topbar.php') ?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <?php require_once('sidebar.php')?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Products</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="product_all.php">Products</a>
                                    </li>
                                    <li class="active">
                                        <strong>All Products</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">

                                    <div class="col-md-9 col-sm-12 col-xs-12">

                                        <div class="input-group primary">
                                            <span class="input-group-addon">                
                                                <span class="arrow"></span>
                                                <i class="fa fa-search"></i>
                                            </span>
                                            <input type="text" class="form-control search-page-input" placeholder="Search Products" value="">
                                        </div><br>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <nav class='pull-right'>
                                            <!-- 								  <ul class="pager" style="margin:0px;">
                                                                                                                <li><a href="#"><i class='fa fa-arrow-left icon-xs icon-orange icon-secondary'></i></a></li>
                                                                                                                <li><a href="#"><i class='fa fa-arrow-right icon-xs icon-orange icon-secondary'></i></a></li>
                                                                                                              </ul> -->

                                            <ul class="pagination pull-right" style="margin:0px;">
                                                <li><a href="#">«</a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">»</a></li>
                                            </ul>

                                        </nav>
                                    </div>

                                    <div class="clearfix"></div><br>

                                    <div class="col-md-12 col-sm-12 col-xs-12 ecommerce_product_search search_data">




                                        <ul class="nav nav-tabs vertical col-md-2 col-lg-2 col-sm-3 col-xs-3 left-aligned">
                                            <li class="active">
                                                <a href="#all-1" data-toggle="tab">
                                                    <i class="fa fa-home"></i> All Products
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#Electronics'" class="">Electronics</a>
                                            </li>
                                            <li>
                                                <a href="#shoes-1">Shoes</a>
                                            </li>
                                            <li>
                                                <a href="#clothes-1">Clothes</a>
                                            </li>
                                            <li>
                                                <a href="#mobile-1">Mobile Phones</a>
                                            </li>
                                            <li>
                                                <a href="#laptops-1">Laptops</a>
                                            </li>
                                            <li>
                                                <a href="#accessories-1">Accessories</a>
                                            </li>
                                            <li>
                                                <a href="#hardware-1">Hardware</a>
                                            </li>
                                            <li>
                                                <a href="#tools-1">Tools</a>
                                            </li>
                                            <li>
                                                <a href="#software-1">Software</a>
                                            </li>         
                                        </ul>					

                                        <div class="tab-content vertical col-md-10 col-lg-10 col-sm-9 col-xs-9 left-aligned">
                                            <div class="tab-pane fade in active" id="web-1">

                                                <div class="row">


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-1.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$886.98</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-2.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HTC One M8 Andr...</a></h4>
                                                                <span>$143.60</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-3.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$249.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-4.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Custom T-Shirt...</a></h4>
                                                                <span>$608.92</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-5.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$644.79</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-6.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$98.87</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-7.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$887.96</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-8.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Obey Propaganda...</a></h4>
                                                                <span>$787.73</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-9.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$274.38</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-10.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Levi's 511 Jean...</a></h4>
                                                                <span>$143.77</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-11.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$475.93</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-12.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$477.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-13.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$187.31</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-14.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$249.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-15.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">If You Wait...</a></h4>
                                                                <span>$909.39</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-16.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Fahrenheit 451 ...</a></h4>
                                                                <span>$88.10</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-17.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">First Prize Pie...</a></h4>
                                                                <span>$981.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-18.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$751.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-19.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$59.43</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-20.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$93.63</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-21.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$795.52</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-22.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$887.41</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-23.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$498.54</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-24.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Elegant Gemston...</a></h4>
                                                                <span>$511.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-25.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Digital Storm P...</a></h4>
                                                                <span>$776.47</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-1.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$886.98</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-2.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HTC One M8 Andr...</a></h4>
                                                                <span>$143.60</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-3.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$249.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-4.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Custom T-Shirt...</a></h4>
                                                                <span>$608.92</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-5.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$644.79</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-6.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$98.87</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-7.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$887.96</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-8.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Obey Propaganda...</a></h4>
                                                                <span>$787.73</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-9.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$274.38</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-10.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Levi's 511 Jean...</a></h4>
                                                                <span>$143.77</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-11.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$475.93</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-12.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$477.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-13.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$187.31</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-14.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$249.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-15.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">If You Wait...</a></h4>
                                                                <span>$909.39</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-16.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Fahrenheit 451 ...</a></h4>
                                                                <span>$88.10</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-17.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">First Prize Pie...</a></h4>
                                                                <span>$981.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-18.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$751.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-19.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$59.43</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-20.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$93.63</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-21.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$795.52</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-22.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$887.41</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-23.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$498.54</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-24.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Elegant Gemston...</a></h4>
                                                                <span>$511.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-25.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Digital Storm P...</a></h4>
                                                                <span>$776.47</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-1.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$886.98</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-2.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HTC One M8 Andr...</a></h4>
                                                                <span>$143.60</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-3.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$249.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-4.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Custom T-Shirt...</a></h4>
                                                                <span>$608.92</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-5.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$644.79</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-6.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$98.87</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-7.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$887.96</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-8.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Obey Propaganda...</a></h4>
                                                                <span>$787.73</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-9.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$274.38</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-10.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Levi's 511 Jean...</a></h4>
                                                                <span>$143.77</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-11.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$475.93</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-12.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$477.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-13.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$187.31</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-14.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$249.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-15.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">If You Wait...</a></h4>
                                                                <span>$909.39</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-16.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Fahrenheit 451 ...</a></h4>
                                                                <span>$88.10</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-17.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">First Prize Pie...</a></h4>
                                                                <span>$981.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-18.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$751.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-19.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$59.43</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-20.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$93.63</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-21.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$795.52</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-22.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$887.41</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-23.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$498.54</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-24.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Elegant Gemston...</a></h4>
                                                                <span>$511.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-25.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Digital Storm P...</a></h4>
                                                                <span>$776.47</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-1.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$886.98</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-2.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HTC One M8 Andr...</a></h4>
                                                                <span>$143.60</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-3.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$249.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-4.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Custom T-Shirt...</a></h4>
                                                                <span>$608.92</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-5.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$644.79</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-6.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$98.87</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-7.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$887.96</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-8.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Obey Propaganda...</a></h4>
                                                                <span>$787.73</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-9.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$274.38</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-10.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Levi's 511 Jean...</a></h4>
                                                                <span>$143.77</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-11.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$475.93</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-12.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$477.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-13.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$187.31</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-14.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$249.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-15.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">If You Wait...</a></h4>
                                                                <span>$909.39</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-16.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Fahrenheit 451 ...</a></h4>
                                                                <span>$88.10</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-17.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">First Prize Pie...</a></h4>
                                                                <span>$981.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-18.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$751.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-19.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$59.43</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-20.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$93.63</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-21.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$795.52</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-22.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$887.41</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-23.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$498.54</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-24.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Elegant Gemston...</a></h4>
                                                                <span>$511.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-25.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Digital Storm P...</a></h4>
                                                                <span>$776.47</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-1.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$886.98</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-2.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HTC One M8 Andr...</a></h4>
                                                                <span>$143.60</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-3.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$249.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-4.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Custom T-Shirt...</a></h4>
                                                                <span>$608.92</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-5.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$644.79</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-6.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$98.87</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-7.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$887.96</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-8.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Obey Propaganda...</a></h4>
                                                                <span>$787.73</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-9.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$274.38</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-10.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Levi's 511 Jean...</a></h4>
                                                                <span>$143.77</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-11.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$475.93</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-12.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$477.29</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-13.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$187.31</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-14.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$249.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-15.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">If You Wait...</a></h4>
                                                                <span>$909.39</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-16.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Fahrenheit 451 ...</a></h4>
                                                                <span>$88.10</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-17.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">First Prize Pie...</a></h4>
                                                                <span>$981.50</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-18.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$751.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-19.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Nikon D5500 DSL...</a></h4>
                                                                <span>$59.43</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-20.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Night Visions...</a></h4>
                                                                <span>$93.63</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-21.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Leica T Mirrorl...</a></h4>
                                                                <span>$795.52</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-22.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Portable Sound ...</a></h4>
                                                                <span>$887.41</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-23.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">HP Spectre XT P...</a></h4>
                                                                <span>$498.54</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-24.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Elegant Gemston...</a></h4>
                                                                <span>$511.07</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3 col-sm-6 col-md-4 ecommerce_product">
                                                        <div class="team-member ">
                                                            <div class="team-img thumb ">
                                                                <img class="img-responsive" src="data/eco-products/product-25.jpg" alt="">
                                                                <div class="overlay">
                                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="team-info ">
                                                                <h4><a href="#">Digital Storm P...</a></h4>
                                                                <span>$776.47</span>
                                                            </div>

                                                            <p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="images-1">

                                                <p class="col-md-12">Images Search Results</p>

                                            </div>
                                            <div class="tab-pane fade" id="contacts-1">

                                                <p>Contacts Search Results</p>


                                            </div>

                                            <div class="tab-pane fade" id="projects-1">
                                                <p>Projects Search Results</p>

                                            </div>

                                            <div class="tab-pane fade" id="map-1">
                                                <p>Location and Maps Search Results</p>
                                            </div>
                                            <div class="tab-pane fade" id="videos-1">
                                                <p>Videos Search Results</p>
                                            </div>
                                            <div class="tab-pane fade" id="messages-1">
                                                <p>Messages Search Results</p>
                                            </div>
                                            <div class="tab-pane fade" id="profile-1">
                                                <p>Profile Search Results</p>
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
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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



