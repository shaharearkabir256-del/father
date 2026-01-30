<?php
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
	$token = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION['token']=$token;
	require 'db/db.php';
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
        <link href="plugins/lightslidervertical-master/src/css/lightslider.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/jquery-rateyo/jquery.rateyo.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/slick/slick.css" rel="stylesheet" type="text/css">
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN UIKIT COMPONENTS -->
        <link href="plugins/uikit-2.27.4/css/components/slider.min.css" rel="stylesheet" type="text/css">
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
        <?php require_once('headerd.php');?>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <!-- BEGIN BREADCUMB -->
        <section class="tzp-breadcumb">
            <div class="uk-container uk-container-center">
                <ul>
                    <li><a href="index.php">Products</a></li>
                    <li class="uk-active"><a>Product Detail</a></li>
                </ul>
            </div>
        </section>
        <!-- BEGIN BREADCUMB -->
        <!-- BEGIN ARCHIVE PAGE -->
		<?php 
		$url=mysqli_fetch_object($query=$mysqli->query("SELECT * FROM `cog` where `page`='home' and `type`='home' and chk=1"));
		$sed=$_GET['id'];
		$ret=strlen($sed);
		$seri=substr($sed, 10,$ret);
		settype($seri, "integer");
		$id=$seri;
			//$prodchk=mysqli_num_rows($mysqli->query("SELECT * FROM `product` where place=3 and `chk`='1' order by serial desc "));
			$prod=mysqli_fetch_object($mysqli->query("SELECT * FROM `product` where `serial`='".$id."' and `chk`='1'"));
				
									?>
        <section class="archive-page-product-detail tzp-section-padding">
            <div class="uk-container uk-container-center">
                <div class="product-detail uk-clearfix">
                    <div class="image">
                        <ul class="product-detail-list-image list-unstyled cS-hidden">
                            <li data-thumb="<?php echo $url->url; ?>product/<?php echo $prod->img1;?>"> 
                                <img src="<?php echo $url->url; ?>product/<?php echo $prod->img1;?>" alt="<?php echo $prod->name; ?>" title="<?php echo $prod->name; ?>">
                            </li>
                            <li data-thumb="<?php echo $url->url; ?>product/<?php if($prod->img2!=''){echo $prod->img2;}else{echo $prod->img1;}?>"> 
                                <img src="<?php echo $url->url; ?>product/<?php if($prod->img2!=''){echo $prod->img2;}else{echo $prod->img1;}?>" alt="<?php echo $prod->name; ?>" title="<?php echo $prod->name; ?>">
                            </li>
                            <li data-thumb="<?php echo $url->url; ?>product/<?php if($prod->img3!=''){echo $prod->img3;}else{echo $prod->img1;}?>"> 
                                <img src="<?php echo $url->url; ?>product/<?php if($prod->img3!=''){echo $prod->img3;}else{echo $prod->img1;}?>" alt="<?php echo $prod->name; ?>" title="<?php echo $prod->name; ?>">
                            </li>
                            <li data-thumb="<?php echo $url->url; ?>product/<?php if($prod->img4!=''){echo $prod->img4;}else{echo $prod->img1;}?>"> 
                                <img src="<?php echo $url->url; ?>product/<?php if($prod->img4!=''){echo $prod->img4;}else{echo $prod->img1;}?>" alt="<?php echo $prod->name; ?>" title="<?php echo $prod->name; ?>">
                            </li>
                        </ul>
                    </div>
                    <div class="text">
                        <h3><?php echo $prod->name; ?></h3>
						<h5><?php if($prod->offer==1){ echo $prod->discount_price;}else{ echo $prod->sale_price;}?> BDT</h5>
                        <p><?php echo $prod->rp; ?> Point</p>
						<!--
                           <div class="size">
                            <p>Size:</p>
                            <ul class="list-size">
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                                <li><a href="#">XXL</a></li>
                            </ul>
                        </div>
                     <div class="qty-color">
                          
                            <div class="tzp-box-color">
                                <ul>
                                    <li>
                                        <input id="color-1" checked="checked" type="checkbox" name="color-1">
                                        <label for="color-1"></label>
                                    </li>
                                    <li>
                                        <input id="color-2" type="checkbox" name="color-2">
                                        <label for="color-2"></label>
                                    </li>
                                    <li>
                                        <input id="color-3" type="checkbox" name="color-3">
                                        <label for="color-3"></label>
                                    </li>
                                    <li>
                                        <input id="color-4" type="checkbox" name="color-4">
                                        <label for="color-4"></label>
                                    </li>
                                    <li>
                                        <input id="color-5" type="checkbox" name="color-5">
                                        <label for="color-5"></label>
                                    </li>
                                    <li>
                                        <input id="color-6" type="checkbox" name="color-6">
                                        <label for="color-6"></label>
                                    </li>
                                    <li>
                                        <input id="color-7" type="checkbox" name="color-7">
                                        <label for="color-7"></label>
                                    </li>
                                </ul>
                            </div>
                        </div>-->
                        <div class="tzp-button">
						<?php
						if(isset($_GET['merid'])){ $userstypes=$_GET['mer']; $userid=$_GET['merid'];}
						if(isset($_GET['ageid'])){ $userstypes=$_GET['age']; $userid=$_GET['ageid'];}
						?>
                            <a <?php if(!isset($_SESSION['MemLogId'])){ ?>href="checkout.php?msg2=Please fillup the customer information"<?php } ?> class="<?php if(isset($_SESSION['MemLogId'])){ ?>addtocart<?php } ?> button"   data-userstypes="<?php echo $userstypes;?>" data-produid="<?php echo $userid;?>" data-price="<?php if($prod->offer==1){ echo $prod->discount_price; }else{ echo $prod->sale_price; }?>" data-serial="<?php echo time().$prod->serial;?>">Add To Cart</a>
                        </div>
                     
                        <p><span>Category:</span> <a href="product.php?Category_id=<?php echo $prod->cat_id;?>">
						<?php 
						$cat=mysqli_fetch_object($mysqli->query("SELECT * FROM `cat` where `cat_id`='$prod->cat_id'"));  
						echo $cat->cat;
						?>
						</a></p>
                       <!--<div class="social">
                            <p><span>Share:</span></p>
                            <ul>
                                <li><a href="#"><span class="uk-icon-facebook"></span></a></li>
                                <li><a href="#"><span class="uk-icon-twitter"></span></a></li>
                                <li><a href="#"><span class="uk-icon-google-plus"></span></a></li>
                                <li><a href="#"><span class="uk-icon-pinterest-p"></span></a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
 <div class="box-review">
                    <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#switcher-content-a-fade', animation: 'fade'}">
                        <li><a href="#">DESCRIPTION</a></li>
                       
                    </ul>
                    <ul id="switcher-content-a-fade" class="uk-switcher">
                        <li class="product-description">
                            <p><?php echo $prod->info;?></p>
                           
                        </li>
                        
                    </ul>
                </div>
               <?php //require_once('prod_rel.php'); ?>
            </div>
        </section>
        <!-- BEGIN ARCHIVE PAGE -->
        <!-- BEGIN CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php require_once('footer.php');?> 
        <!-- END FOOTER -->
        <div class="tzp-backtop"><span class="uk-icon-angle-double-up"></span></div>
        <div class="tzp-popup-cart hidden">
            <div class="popup-form">
                <div class="content">

		<div class="topcart">

		</div>                
                </div>
            </div>
            <div class="tzp-mark"></div>
        </div>
        <!-- BEGIN JQUERY JS -->
        <script src="plugins/jquery-1.12.4/jquery-1.12.4.min.js"></script>
        <script src="plugins/uikit-2.27.4/js/uikit.min.js"></script>
        <script src="plugins/lightslidervertical-master/src/js/lightslider.min.js"></script>
        <script src="plugins/jquery-rateyo/jquery.rateyo.min.js"></script>
        <script src="plugins/slick/slick.min.js"></script>
        <!-- END JQUERY JS -->
        <!-- BEGIN MAIN JS -->
        <script src="javascript/main.js"></script>
        <!-- END MAIN JS  -->
    </body>
</html>
<?php require_once('cart_loader.php');?>