<?php
	session_start();
	require_once("db/db.php");
	$cog=mysqli_fetch_object($query=$mysqli->query("SELECT * FROM `cog` where `page`='home' and `type`='ecom' and chk=1"));
/* 	$page="about";
	require_once("visitor.php"); */
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
       <meta charset="utf-8">
	   <meta name="author" content="<?php echo $cog->auth; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Title -->
		<title>About Us | <?php echo $cog->title; ?></title>
				<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WTZK9K2');</script>
<!-- End Google Tag Manager -->
		<link rel="shortcut icon" href="assets/images/<?php echo $cog->logo; ?>">
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="en-us"/>
		<meta name="Subject" content="<?php echo $cog->subject; ?>" />
		<meta name="description" content="<?php echo $cog->desc; ?>">
		<meta name="keywords" content="<?php echo $cog->keywords; ?>" />
       
		<meta name="owner" content="<?php echo $cog->owner; ?>" />
		<meta name="copyright" content="<?php echo $cog->copyright; ?>" />
		<meta name="distribution" content="Global" />
		<meta name="coverage" content="Worldwide" />
		<meta name="rating" content="General" />
		<meta name="language" content="English" />
		<meta name="country" content="BD" />
		<meta name="country" content="Bangladesh" />
		<meta name="city" content="Dhaka" >
		<meta name="zipcode" content="1219" >
		<meta name="expires" content="Never" />
		<meta name="robots" content="index, follow" />
		<meta name="Slurp" content="index, follow" />
		<meta name="googlebot" content="index, follow" />
		<meta name="bingbot" content="index, follow" />
		<meta name="revisit-after" content="7 day" />
		<meta name="alexaVerifyID" content="" />
		<meta name="msvalidate.01" content="" />
		<meta name="google-site-verification" content="" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="plugins/normalize.css" rel="stylesheet" type="text/css">
        <link href="plugins/animate.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/uikit-2.27.4/css/uikit.min.css" rel="stylesheet" type="text/css">
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN UIKIT COMPONENTS -->
        <link href="plugins/uikit-2.27.4/css/components/slider.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/uikit-2.27.4/css/components/slidenav.min.css" rel="stylesheet" type="text/css">
        <!-- END UIKIT COMPONENTS -->
        <!-- BEGIN TEMPLATE LAYOUT STYLES -->
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <!-- END TEMPLATE LAYOUT STYLES -->
        <link href="images/favicon.ico" rel="shortcut icon" type="text/css">
    </head>
    <body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTZK9K2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <!-- BEGIN HEADER -->
        <?php require_once 'headerd.php';?>
        <!-- END HEADER -->
		        <!-- BEGIN BREADCUMB -->
        <section class="tzp-breadcumb">
            <div class="uk-container uk-container-center">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="uk-active"><a>About Us</a></li>
                </ul>
            </div>
        </section>
        <!-- BEGIN BREADCUMB -->
  <!-- BEGIN MY ACCOUNT -->
        <section class="my-account">
            <div class="uk-container uk-container-center">
                <div class="uk-grid">
                   <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-1 uk-width-1-1">
                             <div class="footer-left">
                                <a href="index.php"><img src="images/<?php echo $cog->logo; ?>" alt="<?php echo $cog->title; ?>" title="<?php echo $cog->title; ?>"></a>
                                <p><?php echo $cog->desc; ?></p>
                                
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <!-- BEGIN MY ACCOUNT -->
        <!-- BEGIN FOOTER -->
       <?php require_once 'footer.php';?>
        <!-- END FOOTER -->
        <div class="tzp-backtop"><span class="uk-icon-angle-double-up"></span></div>
        <!-- BEGIN POPUP CART ITEM -->
          <div class="tzp-popup-cart hidden">
            <div class="popup-form">
                <div class="content">
					<div class="topcart">
					<?php require_once 'cart.php';?>
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
        <!-- END JQUERY JS -->
        <!-- BEGIN UIKIT COMPONENTS -->
        <script src="plugins/uikit-2.27.4/js/components/slideset.min.js"></script>
        <!-- END UIKIT COMPONENTS -->
        <!-- BEGIN MAIN JS -->
        <script src="javascript/main.js"></script>
        <!-- END MAIN JS  -->
    </body>
</html>
<?php require_once('cart_loader.php');?>