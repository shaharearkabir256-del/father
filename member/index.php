<?php
	error_reporting(0);
	ini_set('display_errors','off');
    session_start(); 
	session_regenerate_id(true); 
	$token = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION['token']=$token;
	require '../db/db.php';
	setcookie("CSRM", $token, time() + 60 * 60 * 24,'/member');	
	$_SESSION['CSRM']=$token;	
?>
<!DOCTYPE html>
<html class=" ">
<?php require_once('head.php')?>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">


        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">
                <h1><a href="#" title="Login Page" tabindex="-1">Member Area</a></h1>

                <form name="loginform" id="loginform" action="login_act.php" method="post">
				
					<?php if(isset($_SESSION['msg'])){ ?><p class="text-muted text-center btn-block btn btn-danger btn-rect">
					<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?></p> <?php } ?>
                   <p>
                        <label for="user_login">Username<br />
                            <input type="text" name="userid" id="" class="input"  size="20" /></label>
                    </p>
                    <p>
                        <label for="user_pass">Password<br />
                            <input type="password" name="userPassOne" id="" class="input"  size="20" /></label>
                    </p>
                    <p class="forgetmenot">
                        <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked> Remember me</label>
                    </p>



                    <p class="submit">
					<input type="hidden" name="CSRM" value="<?php echo $token; ?>">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
                    </p>
                </form>

                <p id="nav">
                    <a class="pull-left" href="<?php echo 'https://www.'.$url;?>" title="Password Lost and Found">Back To <?php echo $title;?></a>
                    <!--<a class="pull-right" href="<?php //echo $page;?>" title="Sign Up">Sign Up</a>-->
                </p>


            </div>
        </div>





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
        <script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

    </body>
</html>
<?php unset($_SESSION['msg']); ?>
	 <script>    
		if(typeof window.history.pushState == 'function') {
			window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
		}
	</script>