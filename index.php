<?php 
	error_reporting(0);
	ini_set('display_errors','off');
    session_start();
	session_regenerate_id(true);
	$token = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION['token']=$token;
	require 'db/db.php';
	$cog=mysqli_fetch_object($mysqli->query("SELECT * FROM `cog` where serial=2 "));
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $cog->title; ?></title>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="plugins/normalize.css" rel="stylesheet" type="text/css">
        <link href="plugins/animate.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/uikit-2.27.4/css/uikit.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/flaticon/font/flaticon.css" rel="stylesheet" type="text/css">
        <link href="plugins/lightslidervertical-master/src/css/lightslider.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/slick/slick.css" rel="stylesheet" type="text/css">
		
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN UIKIT COMPONENTS -->
        <link href="plugins/uikit-2.27.4/css/components/slider.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/uikit-2.27.4/css/components/slidenav.min.css" rel="stylesheet" type="text/css">
        <!-- END UIKIT COMPONENTS -->
        <!-- BEGIN REVOLUTION SLIDER -->
        <link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css">
        <link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css">
        <link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css">
        <!-- END REVOLUTION SLIDER -->
        <!-- BEGIN TEMPLATE LAYOUT STYLES -->
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <!-- END TEMPLATE LAYOUT STYLES -->
        <link href="images/<?php echo $cog->icon; ?>" rel="shortcut icon" type="text/css">
    </head>
    <body>
	<!-- Google Tag Manager (noscript) -->

<!-- End Google Tag Manager (noscript) -->
        <!-- BEGIN HEADER -->
        <?php require_once 'headerd.php';?>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <!-- BEGIN SLIDER -->
       
<?php require_once 'slider.php';?>
        <!-- END SLIDER -->
        <!-- BEGIN ARCHIVE PAGE -->
		 <section class="tzp-breadcumb">
            <div class="uk-container uk-container-center">
                <ul>
                    <li class="uk-active"><a href="index.php">Products</a></li>
                  </ul>
            </div>
        </section>
        <!-- BEGIN BREADCUMB -->
        <!-- BEGIN ARCHIVE PAGE -->
		 <section class="archive-page-product tzp-section-padding">
            <div class="uk-container uk-container-center">
                <div class="uk-grid">
                    <div class="uk-width-large-3-4 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
                        <div class="page-content">
								       <?php 
				if(isset($_GET['Category_id'])){ $catId=$_GET['Category_id']; $sql1=" and `cat_id`='$catId'"; }
				if(isset($_GET['Sub_Category_id'])){ $scatId=$_GET['Sub_Category_id'];  $sql2=" and `scat_id`='$scatId'"; }
				if(isset($_GET['Brand_id'])){ $brandId=$_GET['Brand_id']; $sql3=" and `brand_id`='$brandId'"; }

					require_once 'prod_com.php'; 

				   ?> 
                        </div>
                    </div>
					<div class="uk-flex-order-first uk-width-large-1-4 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
                        <div class="tzp-all-category">
                            <div class="title">
                                <h3>Show all categories<span class="uk-icon-angle-right"></span></h3>
                            </div>
                            <ul class="list-categories">
							 <?php  $exe1=$mysqli->query("SELECT * FROM `cat` where chk=1 ORDER BY `cat`");	
								while($cat=mysqli_fetch_object($exe1)){
								?>
                                <li><a href="index.php?Category_id=<?php echo $cat->cat_id; ?>"><?php echo $cat->cat; ?> </a></li>
								<?php } ?> 
      
                            </ul>
                        </div>
                        
                    </div>
                 </div>
               <?php //require_once 'prod_rel.php';?>
            </div>
        </section>

        <!-- BEGIN ARCHIVE PAGE -->
        <!-- BEGIN CONTAINER -->
        <!-- BEGIN FOOTER -->
       <?php require_once 'footer.php'; ?>
        <!-- END FOOTER -->
        <div class="tzp-backtop"><span class="uk-icon-angle-double-up"></span></div>
        <!-- BEGIN POPUP CART ITEM -->
          <div class="tzp-popup-cart hidden">
            <div class="popup-form">
                <div class="content">
					<div class="topcart">
					
					</div>
		        </div>
            </div>
            <div class="tzp-mark"></div>
        </div>
        <!-- END POPUP CART ITEM -->
        <!-- BEGIN PAGE LOADER 
        <div class="tzp-page-loader uk-hidden"></div>
        <div class="fixed-center uk-hidden">
            <div class="tzp-popup-form uk-grid-match">
                <div class="content">
                    <h3>Get to know the latest offers</h3>
                    <p>Subscribe and get modified at first on the latest update and offers</p>
                    <form id="subcribe-popup" action="#" method="post">
                        <input type="email" placeholder="Email address">
                        <div class="tzp-button">
                            <a href="#" class="button"><i>SEND</i></a>
                        </div>
                    </form>
                    <p class="note">Note: We do not spam</p>
                </div>
                <div class="box-image"></div>
                <div class="tzp-close-popup"><span class="uk-icon uk-icon-times"></span></div>
            </div>
        </div>
        -- END PAGE LOADER -->
        <!-- BEGIN JQUERY JS -->
        <script src="plugins/jquery-1.12.4/jquery-1.12.4.min.js"></script>
        <script src="plugins/uikit-2.27.4/js/uikit.min.js"></script>
        <script src="plugins/jquery-waypoints/2.0.3/waypoints.min.js"></script>
        <script src="plugins/lightslidervertical-master/src/js/lightslider.min.js"></script>
        <script src="plugins/slick/slick.min.js"></script>
        <script src="plugins/jquery-countdown/jquery.countdown.min.js"></script>
        <!-- END JQUERY JS -->
        <!-- BEGIN UIKIT COMPONENTS -->
        <script src="plugins/uikit-2.27.4/js/components/slider.min.js"></script>
        <script src="plugins/uikit-2.27.4/js/components/slideset.min.js"></script>
        <script src="plugins/uikit-2.27.4/js/components/lightbox.min.js"></script>
        <!-- END UIKIT COMPONENTS -->
        <!-- BEGIN REVOLUTION SLIDER -->
        <script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <!-- END REVOLUTION SLIDER -->
        <!-- BEGIN MAIN JS -->
        <script src="javascript/main.js"></script>
		<!-- END MAIN JS  -->

    </body>
</html>
<?php require_once('cart_loader.php');?>