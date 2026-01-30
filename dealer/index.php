<?php   
	error_reporting(0);
	ini_set('display_errors','off');
	session_start(); 
	session_regenerate_id(true); 	
	$token = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION['token']=$token;
	require '../db/db.php';
	setcookie("CSRD", $token, time() + 60 * 60 * 24,'/dealer');
	$_SESSION['CSRD']=$token;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
			<script type="text/javascript">
 			var message="";	
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
	
  </head>
   
  

 

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
       
      </div><!-- /.login-logo -->
      <div class="login-box-body">
	   <?php if(isset($_SESSION['msg'])){ ?><p class="text-muted text-center btn-block btn btn-danger btn-rect"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?></p> <?php } ?>
        <p class="login-box-msg">Sign in</p>
        <form action="login_action.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="userid" class="form-control" placeholder="Enter Your Dealer ID"/ style="color:black;font-weight: bold;">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password"  name="userPassOne" class="form-control" placeholder="Password"/ style="color:black;font-weight: bold;">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
			<input name="CSRD" type="hidden" value="<?php echo $token;?>">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

      

       
     

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
	<?php unset($_SESSION['msg']); ?>
	 <script>    
		if(typeof window.history.pushState == 'function') {
			window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
		}
	</script>
  </body>

</html>