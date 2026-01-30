<?php
	session_start();
	require_once("../db/db.php");
	$cog=mysqli_fetch_object($query=$mysqli->query("SELECT * FROM `cog` where `page`='home' and `type`='ecom' and chk=1"));
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
                <meta charset="utf-8">
	   <meta name="author" content="<?php echo $cog->auth; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Title -->
		<title>E-Commerce | <?php echo $cog->title; ?></title>
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
        <!-- BEGIN HEADER -->
        <?php require_once 'headerd.php';?>
        <!-- END HEADER -->
		        <!-- BEGIN BREADCUMB -->
        <section class="tzp-breadcumb">
            <div class="uk-container uk-container-center">
                <ul>
                    <li><a href="index-2.html">Home</a></li>
                    <li><a>Pages</a></li>
                    <li class="uk-active"><a>My Account</a></li>
                </ul>
            </div>
        </section>
        <!-- BEGIN BREADCUMB -->
  <!-- BEGIN MY ACCOUNT -->
        <section class="my-account">
            <div class="uk-container uk-container-center">
                <div class="uk-grid">
                    <div class="uk-width-large-1-2 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
                        <div class="box">
                            <h3>SIGN IN</h3>
                            <p>Welcome, sign in to your account</p>
                            <form class="tzp-form" action="#" method="post">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
                                        <div class="uk-form-icon uk-width-1-1">
                                            <input type="text" name="name" placeholder="Username Or Email Address" class="uk-width-1-1">
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
                                        <div class="uk-form-icon uk-width-1-1">
                                            <input type="password" name="password" placeholder="Password" class="uk-width-1-1">
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
                                        <div class="remember uk-clearfix">
                                            <div class="tzp-box-color tzp-box-check">
                                                <ul>
                                                    <li>
                                                        <input id="remember" checked="checked" type="checkbox" name="remember">
                                                        <label for="remember"><i class="label">Remember Me</i></label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a><p>Forgot Password?</p></a>
                                        </div>
                                    </div>
                                    <div class="tzp-button">
                                        <a href="#" class="button"><i>LOGIN</i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="uk-width-large-1-2 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
                        <div class="box line">
                            <h3>Create new account</h3>
                            <p>Create your very own Teezippo Account</p>
                            <form class="tzp-form" action="#" method="post">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
                                        <div class="uk-form-icon uk-width-1-1">
                                            <input type="text" name="name" placeholder="Usename Or Email Address" class="uk-width-1-1">
                                        </div>
                                    </div>
                                    <div class="tzp-button">
                                        <a href="#" class="button"><i>REGISTER</i></a>
                                    </div>
                                </div>
                            </form>
                            <h5>Sign up today and you will be able to:</h5>
                            <ul>
                                <li><p><span class="uk-icon-check"></span>Speed your way throught the checkout</p></li>
                                <li><p><span class="uk-icon-check"></span>Track your orders easily</p></li>
                                <li><p><span class="uk-icon-check"></span>Keep a record of all your purchases</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
               <?php require_once 'prod_fashion.php';?>
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