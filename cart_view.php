<?php
	session_start();
	require_once("db/db.php");
/* 	$page="cart";
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
		<title>Cart Product | <?php echo $cog->title; ?></title>
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <link href="images/<?php echo $cog->icon; ?>" rel="shortcut icon" type="text/css">
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
                     <li><a href="index.php">Home</a></li>
                    <li class="uk-active"><a>Cart Product <?php 
					if(isset($_SESSION['msg'])){echo " | ".$_SESSION['msg'];}
					if(isset($_SESSION['msgs'])){echo " | ".$_SESSION['msgs'];}
					?></a></li>
                </ul>
            </div>
        </section>
        <!-- BEGIN BREADCUMB -->
        <!-- BEGIN ARCHIVE PAGE -->
        <section class="archive-page-shopping-cart">
            <div class="uk-container uk-container-center">
                <div class="table-cart">
				<div id="">
				 <h3 class="title">shopping cart</h3>
				 
				 <!--Start-->
				 
				 <!--End-->
                    <table class="uk-table">
                        <thead>
                            <tr>
                                <th class="uk-width-3-6">Product</th>
                                <th class="uk-width-1-6">Price</th>
                                <th class="uk-width-1-6">Point</th>
                                <th class="uk-width-1-6">Quantity</th>
                                <th class="uk-width-1-6">Total Point</th>
                                <th class="uk-width-1-6">Total Amount</th>
                                <th class="uk-width-1-6">Action</th>
                         
                            </tr>
                        </thead>
                        <tbody>
										<?php

	$csrc=$_SESSION['MemLogId'];
	$cc=$mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."'");
	$cc33=mysqli_fetch_object($mysqli->query("SELECT SUM(total) as `price` FROM `cart` WHERE `csrc`='".$csrc."'"));
	$carr=mysqli_num_rows($cc);
	//if($carr>0){
		$cc2=$mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."' ORDER BY `serial`");
		$ctotal=mysqli_fetch_object($mysqli->query("SELECT sum(total)as cptotal,sum(tpoint)as cptpoint FROM `cart` WHERE `csrc`='".$csrc."'"));
				while($cart=mysqli_fetch_object($cc2)){
					$produ=mysqli_fetch_object($mysqli->query("SELECT * FROM `product` WHERE `serial`='".$cart->p_id."'"));
	?>
                            <tr>
                                <td class="product-name">
                                    <div class="product">
                                        <div class="remove-product"><a href="cart_del_act.php?serial=<?php echo $cart->serial?>"  title="Press To Delete" class=""  data-serial="<?php echo time().$cart->serial?>" ><span class="uk-icon-times"></span></a></div>
                                        <div class="image">
                                            <img width="50" src="<?php echo $cog->url;?>product/<?php echo $produ->img1; ?>" alt="<?php echo $produ->name; ?>" title="<?php echo $produ->name; ?>">
                                        </div>
                                        <div class="text">
                                            <h3><?php echo $produ->name; ?></h3>
                                            <p><?php echo $produ->info; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">
                                    <h5><?php echo $cart->price.$bdt; ?></h5>
                                </td>
								<td class="product-point">
                                    <h5><?php echo $cart->point.$bdt; ?></h5>
                                </td>
                                <td class="product-qty">
								<form action="cart_up_act.php" method="POST" >
								<input type="number" name="serial" class="" value="<?php echo $cart->serial; ?>" hidden>
								<input type="number" name="qty" class="" value="<?php echo $cart->qty; ?>">
                                    </div>
                                </td>
								<td class="product-tpoint">
                                    <h5><?php echo $cart->tpoint.$bdt; ?></h5>
                                </td>
                                <td class="product-total">
                                    <h5><?php echo $cart->total.$bdt; ?></h5>
                                </td>
								<td class="product-action">
                                  <button type="submit" name="cartup" class=""><span class="uk-icon-refresh"></span></button>
								  </form>
                                </td>
                            </tr>
							 <?php } ?> 
                           
                           
                        </tbody>
                    </table>
                    <div class="cart-total uk-clearfix">
					
                        <!--<div class="coupon">
                            <form  action="prod_coupon_act.php" method="post">
                                <input type="text" placeholder="Coupon code">
                                <button type="button">Apply</button>
                            </form>
                        </div>-->
                        <div class="total">
                            <h3>Total: <i> <?php echo $ctotal->cptotal.$bdt; ?> BDT</i></h3>
                            <h3>Total: <i> <?php echo $ctotal->cptpoint.$bdt; ?> Point</i></h3>
                            <div class="tzp-button">
                                <!--<a href="cart_up_act.php" class="button update-cart">Update Cart</a>-->
                                <a href="member/product_order.php?page=Order%20List&&menu=Products" class="button check-out">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
					
                </div>
                </div>
               <?php //require_once 'prod_fashion.php';?>
            </div>
        </section>
        <!-- BEGIN ARCHIVE PAGE -->
        <!-- BEGIN CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php require_once('footer.php');?>
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
<script>
		jQuery(document).ready(function(){
				var cart=function(){
					var req=jQuery.ajax({
						method: "GET",
						url:"cart.php",
						data: { }
					});
					req.done(function(msg){
						//console.log(msg);
						jQuery(".topcart").html(msg);
					});
					var req=jQuery.ajax({
						method: "GET",
						url:"cartvp.php",
						data: { }
					});
					req.done(function(msg){
						console.log(msg);
						jQuery("#cartp").html(msg);
					});
					 var req=jQuery.ajax({
						method: "GET",
						url:"cart_basket.php",
						data: { }
					}); 
					req.done(function(msg){
						console.log(msg);
						jQuery(".cartbasket").html(msg);
					}); 
				}
				cart();
				jQuery(".addtocart").on("click", function(){
					var ser=jQuery(this).attr("data-serial"),
					pri=jQuery(this).attr("data-price"),
					sd=ser.length;
					dr=ser.slice(10,sd);
					//console.log(sd);
					//console.log(dr);
					var req=jQuery.ajax({
						method: "GET",
						url:"cart_add_act.php",
						data: {serial:ser,sed:dr,gt:sd,fd:pri}
					});
					req.done(function(msg){
						//console.log(msg);
						cart();
					});
				}); 
				var btnre =function(){
					jQuery(".remcp").on("click", function(e){
						//clearInterval(sde);
						e.stopPropagation();
						e.preventDefault();
						var edr=jQuery(this).attr("data-serial");
						var req=jQuery.ajax({
							method: "GET",
							url:"cart_del_act.php",
							data: {serial:edr,rem:"fdd"}
						});
						req.done(function(msg){
							console.log(msg);
							sde=setInterval(btnre,1000);
							//jQuery("#cart_"+edr).hide();
							//jQuery("#scart_"+edr).hide();
							cart();

						});
						//console.log(edr);
					});
				} 
		 		var sde=setInterval(btnre,1000);
				jQuery(".view-mode a").on("click", function(e){
					e.preventDefault();
					e.stopPropagation();
					alert("hello");
				}); 
			});
		</script>