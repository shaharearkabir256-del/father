<?php
$ip=isset($_SERVER['REMOTE_ADDR']) ? trim($_SERVER['REMOTE_ADDR']) : '';
$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
$country = "$xml->geoplugin_countryName";
if($country=='Bangladesh'){
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	if(isset($_GET['token'])){$token=$_GET['token'];
	$_SESSION['token']=$token;
	}
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
		<title>Checkout | <?php echo $cog->title; ?></title>
				<!-- Google Tag Manager -->

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
        <link href="images/<?php echo $cog->icon; ?>" rel="shortcut icon" type="text/css">
		<script type="text/javascript">
			function clickIE4(){
			if (event.button==2){
				 return false;
				}
			}
			function clickNS4(e){
				if (document.layers||document.getElementById&&!document.all){
					if (e.which==2||e.which==3){
						  return false;
						}
					}
				}
				if (document.layers){
					document.captureEvents(Event.MOUSEDOWN);
					document.onmousedown=clickNS4;
					}
				else if (document.all&&!document.getElementById){
					document.onmousedown=clickIE4;
				}
				document.oncontextmenu=new Function("return false") 
		</script>
		
		<style>
			::placeholder{
				
			}
		</style>
		
		
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
                    <li class="uk-active"><a>Checkout</a></li>
                    <li class="uk-active"><a>From <?php echo $country; ?>.</a></li>
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
                            <h3>Personal Information</h3>
                            <p>
							<?php if(isset($_GET['msg2'])){ ?>
							<font color="red">
					<?php if(isset($_GET['msg2'])){echo $_GET['msg2'];} ?>
					</font> <?php } ?>
							<?php if(isset($_SESSION['msg2'])){ ?>
							<font color="red">
					<?php if(isset($_SESSION['msg2'])){echo $_SESSION['msg2'];} ?>
					</font> <?php } ?>
					<?php if(isset($_SESSION['msgs2'])){ ?>
							<font color="green">
					<?php if(isset($_SESSION['msgs2'])){echo $_SESSION['msgs2'];} ?>
					</font> <?php } ?>
							</p>
                            <form class="tzp-form" action="sign_up_act.php" name="member" method="post">
                                <div class="uk-grid">
                                  
                                    <div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
                                        <div class="uk-form-icon uk-width-1-1">
						  <div id="leftshow" style="display: block;">
				   
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input type="text" name="fname" placeholder="Enter Your First Name" class="uk-width-1-1 " style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input type="text" name="lname" placeholder="Enter Your Last Name" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<!--
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<select style="height:40px;" name="agent" class="uk-width-1-1">
								<option value="">Select Agent</option>
								<?php 
				$query1=$mysqli->query("SELECT * FROM `dealer` where `type`=5 order by serial desc ");
				while($dealer=mysqli_fetch_object($query1)){ 
			?>
								<option value="<?php echo $dealer->user_id; ?>"><?php echo $dealer->log_id; ?></option>
								<?php } ?>
								</select>
							</div>
						</div><br>
						
						
						-->
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required type="text" name="email" onblur="this.value=removeSpaces(this.value);" placeholder="Enter Your Email Address" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required  type="text" name="mobile" placeholder="Enter Your Mobile Number" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required  type="text" name="userid" onblur="this.value=removeSpaces(this.value);" placeholder="Enter Your User Name" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required  type="password" name="passOne" placeholder="Enter Your Password For Login" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required  type="password" name="passTwo" placeholder="Enter Your Confirm Password" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required  type="password" name="pinOne" placeholder="Enter Your Pin For Transaction" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required  type="password" name="pinTwo" placeholder="Enter Your Confirm Pin" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required  type="text" name="address" placeholder="Enter Your Address" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
							<div class="uk-form-icon uk-width-1-1">
								<input required  type="text" name="postal" placeholder="Enter Your Post Code" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
							</div>
						</div>
						<div class="tzp-button">
										<input type="hidden" name="CSRM" value="<?php echo $token; ?>" >
										<input type="submit" name="signup" id="wp-submit" class="button" value="Sign UP" />
                                    </div>
					
					</div>
								</div>
                                        </div>
                                    </div> 
                                    
                                    
                                </div>
                            </form>
                        </div>
                      <div class="uk-width-large-1-2 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
                        <div class="box line">
                            <h3>LOGIN</h3>
                            <p>Welcome, Login to your account</p>
							<?php if(isset($_SESSION['msg'])){ ?>
							<font color="red">
					<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>
					</font> <?php } ?>
                            <form class="tzp-form" action="login_act.php" method="post">
                                <div class="uk-grid">

									
				<!--
								<div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
									<div class="uk-width-1-1">
									<select  style="height:40px;" class="uk-width-1-1" name="agent" id="agent">
										<option value="">Select Agent ID</option>
											<option value="agent">Agent Name</option>
							
									</select>
								<br><br>
									</div>
                                </div>
								 <input type="text" name="userid"  pattern=".{11,11}" title="11 character mobile number" required=""  placeholder="Enter Your Username" class="uk-width-1-1">
								-->

                                    <div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
                                        <div class="uk-form-icon uk-width-1-1">
                                            <input type="text" name="userid"  required=""  placeholder="Enter Your Username" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
                                        </div>
                                    </div>
									
                                    <div class="uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 uk-position-relative">
                                        <div class="uk-form-icon uk-width-1-1">
                                            <input type="password" name="userPassOne" required="" placeholder="Enter Your  Password" class="uk-width-1-1" style="font-size:18px;font-weight: bold;color:black;">
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
                                            <a href="checkout_forgot_pass.php"><p>Forgot Password?</p></a>
                                        </div>
                                    </div>
                                    <div class="tzp-button">
                                        <!--<a href="#" class="button"><i>LOGIN</i></a>-->
										<input type="hidden" name="CSRM" value="<?php echo $token; ?>">
										<input type="submit" name="wp-submit" id="wp-submit" class="button" value="LOGIN" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               <?php //require_once 'prod_fashion.php';?>
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
		<script src="member/js/signup.js"></script>
        <!-- END MAIN JS  -->
    </body>
</html>
<script>		
/* 			function check_left1(){
				if(document.member.left1.checked){
					document.getElementById("leftshow").style.display="block";
				}else{
					document.getElementById("leftshow").style.display="none";
				}
			}	
			
			function check_right2(){
			if(document.member.right2.checked){
			document.getElementById("rightshow").style.display="block";
			
			}else{
				document.getElementById("rightshow").style.display="none";
			}	
			} */				
		</script>
<?php require_once('cart_loader.php'); 
unset($_SESSION['msg']);
unset($_SESSION['msg2']);
unset($_SESSION['msg2']);
unset($_SESSION['msgs2']);
}
?>