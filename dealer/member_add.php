<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add New <?php echo $page="Member";?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
     <?php require_once 'header.php';?>
      <!-- Left side column. contains the logo and sidebar -->
		<?php require_once 'side.php';?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New <?php echo $page;?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         
            <li class="active">Add New <?php echo $page;?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		
          <div class="row">
            <div class="col-xs-12">
               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New <?php echo $page;?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <p class="text-muted">
                   <font color="red">   <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?> </font>
				   <font color="green"> <?php if(isset($_SESSION['msgs'])){echo $_SESSION['msgs'];} ?> </font>
				  </p>
                  <!--Register Form-->
            <form action="member_add_act.php" name="member" onsubmit="return validateForm()" method="post" class="form-horizontal">
                <div class="col-sm-12">
			<div class="col-sm-6">
				<div style="display:block;">
					<div class="form-group">
						<label for="zone" class="control-label" for="input-email">MDH</label>
							<select id="cat" onchange="btnFunction();" name="zone" type="number" class="form-control">
								<option value="">Select</option>
									<?php
										$sql2 = $mysqli->query("SELECT * FROM `zone` where chk=1 ");		
										while($res2=mysqli_fetch_object($sql2)){	?>
										<option value="<?php echo $res2->zone_id;?>"> <?php echo $res2->zone;?></option>
									<?php } ?> 
							</select>
				        <p id="cat_err">Fill Up this field</p>
          		    </div>	
          		</div>
           </div>
           
           <div class="col-sm-6">
               <div id="usb1" style="display:none;">
		        <div class="form-group">
							 <label class="control-label" for="input-email">DH</label>
								  <select id="scat"  onchange="btnFunction();" name="upozela" class="form-control">
								  </select>
								  <p id="scat_err">Fill Up this field</p>
		    	</div>
			 </div>
           </div>
           
        </div>
        <div class="col-sm-12">
           
		    <div class="col-sm-6">
				    <div  id="usb2" style="display:none;">
			         <div class="form-group">
						<label class="control-label" for="input-email">SDH</label>	
								  <select id="brand" onchange="btnFunction();" name="union"  class="form-control">
								  </select>
								  <p id="brand_err">Fill Up this field</p>
			        </div>
			     </div>
		    </div>
		    <div class="col-sm-6">
				        	<div id="usb3" style="display:none;">
			            <div class="form-group">
						 <label class="control-label" for="input-email">DSO</label>	
								  <select id="ward" onchange="btnFunction();" name="ward" class="form-control">
								  </select>
								  <p id="ward_err">Fill Up this field</p>
			</div>
			 </div>
		    </div>
		        </div>
		       <div class="col-sm-12">
		       <div class="col-sm-6">
				       <div id="usb4" style="display:none;">
			            <div class="form-group">
						 <label class="control-label" for="input-email">Agent</label>	
								  <select id="agent" onchange="btnFunction();" name="agent" class="form-control">
								  </select>
								  <p id="agent_err">Fill Up this field</p>
		            	</div>
			             </div>
			   </div> 
			   </div>
			 
                <div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="plan" class="control-label">Package Name<font color="#990000">*</font> <font id=""></font></label>
                        <select id="plan" onchange="btnFunction()" name="plan" type="number" class="form-control">
						<option value="" >Select Package One</option>
						<?php 
				$query=$mysqli->query("SELECT * FROM `plan` where `chk`='1' ");
				while($plan=mysqli_fetch_object($query)){
			?>
						<option value="<?php echo $plan->serial; ?>"><?php echo $plan->name."-".$plan->plan.$t; ?></option>
				<?php } ?>
						</select>
						<p id="plan_err">Fill Up this field</p>
                      </div>
                 </div>
				 <div class="col-sm-6">
                      <div class="form-group">
                        <label for="memcat" class="control-label">Member Categories<font color="#990000">*</font> <font id=""></font></label>
                        <select id="memcat" onchange="btnFunction()" name="memcat" type="number" class="form-control">
						<option value="">Select Member Category One</option>
						<option value="1">Happy</option>
						<option value="2">Regular</option>
						<option value="3">Lucky</option>
						</select>
						<p id="memcat_err">Fill Up this field</p>
                      </div>
                 </div>
                 

                </div>
				<div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="firstname" class="control-label">First Name</label>
                        <input id="firstname" class="form-control" type="text" name="fname" title="Enter first name" placeholder="First name"/>
                      <p>Optional</p>
					  </div>
                 </div>
				  <div class="col-sm-6">  
                      <div class="form-group">
                        <label for="lastname" class="control-label">Last Name</label>
                        <input id="lastname" class="form-control" type="text" name="lname" title="Enter last name" placeholder="Last name"/>
                      <p>Optional</p>
					  </div>
                  </div>
                </div>
				<div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Email<font color="#990000">*</font> <font id=""></font></label>
                        <input  id="email" onchange="btnFunction()" class="form-control" type="email" name="email"  onblur="this.value=removeSpaces(this.value);" title="Enter Email Address" placeholder="Your Email Address"/>
                      <p id="email_err">Fill Up this field</p>
					  </div>
                  </div>
				<div class="col-sm-6">
                      <div class="form-group">
                        <label for="mobile" class="control-labely">Mobile<font color="#990000">*</font> <font id=""></font></label>
                        <input  id="mobile" onchange="btnFunction()" class="form-control" type="text" name="mobile" title="Enter Mobile" placeholder="Your Mobile"/>
						<p id="mobile_err">Fill Up this field</p>
                      </div>
                </div>
              </div>
			<div class="col-sm-12">
				<div class="col-sm-6">
                      <div class="form-group">
                        <label for="userid" class="control-labely">User ID<font color="#990000">*</font> <font id=""></font></label>
                        <input id="User_ID" onchange="btnFunction()" class="form-control" type="text" name="userid" onchange="return check_user_id();" onblur="this.value=removeSpaces(this.value);" onkeyup="return check_user_id();"  title="Enter Usre ID" placeholder="Enter Your User Id"/>
						<table><tr><td><p id="userid_err">Fill Up this field</p></td><td><p id="user_id_error"></p></td></tr></table>
						</div>
				</div>
				 <div class="col-sm-6">	  
					   <div class="form-group">
                        <label for="sponsor" class="control-labely">Sponsor ID<font color="#990000">*</font> <font id=""></font></label>
                        <input id="Reference" onchange="btnFunction()" class="form-control" type="text" name="sponsor"  onchange="return check_ref_id();" onblur="this.value=removeSpaces(this.value);"  onkeyup="return check_ref_id();" title="Enter Sponsor ID" placeholder="Type Your Sponsor Id"/>
					 <table><tr><td><p id="sponsor_err">Fill Up this field</p></td><td><p id="ref_error"></p></td></tr></table>
					 </div>
				  </div>
			</div>
			<div class="col-sm-12">
				  <div class="col-sm-6">	
					  <div class="form-group">
					   <?php $placement=$_GET['placement'];?>
                        <label for="plcmnt" class="control-labely">Placement ID<font color="#990000">*</font> <font id=""></font></label>
                        <input  id="Uplink" onchange="btnFunction()" class="form-control" type="text" name="plcmnt" <?php if($placement!=''){?> value="<?php echo $placement;?>"<?php } ?> onchange="return check_uplink_id();" onblur="this.value=removeSpaces(this.value);" onkeyup="return check_uplink_id();" title="Enter Placement ID" placeholder="Type Your Placement Id"/>
					  <table><tr><td><p id="plcmnt_err">Fill Up this field</p></td><td><p id="spon_error"></p></td></tr></table>
					  </div>
				   </div>
				   <div class="col-sm-6">  
                      <div class="form-group">
                        <label for="nid" class="form-label">NID<font color="#990000">*</font></label>
                        <input id="NID" onchange="btnFunction();"  type="number" name="nid" onchange="return check_nid();" onblur="this.value=removeSpaces(this.value);"  onkeyup="return check_nid();" title="Enter NID Number" placeholder="Enter NID Number" class="form-control"/>
						<table><tr><td><p id="nid_err">Fill Up this field</p></td><td><p id="nid_error"></p></td></tr></table>
                      </div>
                  </div>
				   
			</div>
                <div class="col-sm-12">
				  <div class="col-sm-6">    
                      <div class="form-group">
                        <label for="passOne" class="control-labely">Password<font color="#990000">*</font> <font id=""></font></label>
                        <input id="passOne" onchange="btnFunction()" class="form-control" type="password" name="passOne" title="Enter password" value="12345"/>
                     <p id="passOne_err">Fill Up this field</p>
					 </div>
                  </div>
					<div class="col-sm-6"> 
                        <div class="form-group">
                        <label for="pinOne" class="control-labely">Pin<font color="#990000">*</font> <font id=""></font></label>
                        <input id="pinOne" onchange="btnFunction()" class="form-control" type="password" name="pinOne" title="Enter Pin Code" value="1234"/>
					 <p id="pinOne_err">Fill Up this field</p>
					 </div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" id="submitbtn" onkeyup="btnFunction()" class="btn btn-success btn-block btn-lg">Submit</button>
				 </div><!--Registration Form Contents Ends-->

                <!--Login-->
              </div><!--End-->
			  
<script>
function btnFunction(){
//document.getElementById("submitbtn").disabled = true;
   var a = document.getElementById("plan").value;
	if (a == ""){
	//document.getElementById("submitbtn").disabled = true;	
    return false;
	}else{
		var b = document.getElementById("nid").value; //memcat
		if (b == ""){
		//document.getElementById("submitbtn").disabled = true;	
		return false;
		}else{
			var c = document.getElementById("email").value;
			if (c == ""){
			//document.getElementById("submitbtn").disabled = true;	
			return false;
		}else{
			var d = document.getElementById("mobile").value;
			if (d == ""){
			//document.getElementById("submitbtn").disabled = true;	
			return false;
		}else{
			var e = document.getElementById("User_ID").value;
			if (e == ""){
			//document.getElementById("submitbtn").disabled = true;	
			return false;
		}else{
			var f = document.getElementById("Reference").value;
			if (f == ""){
			//document.getElementById("submitbtn").disabled = true;	
			return false;
		}else{
			var g = document.getElementById("Uplink").value;
			if (g == ""){
			//document.getElementById("submitbtn").disabled = true;	
			return false;
		}else{
			var h = document.getElementById("memcat").value; //nid
			if (h == ""){
			//document.getElementById("submitbtn").disabled = true;	
			return false;
		}else{
			var i = document.getElementById("passOne").value;
			if (i == ""){
			//document.getElementById("submitbtn").disabled = true;	
			return false;
		}else{
			var j = document.getElementById("pinOne").value;
			if (j == ""){
			//document.getElementById("submitbtn").disabled = true;	
			return false;
		}else{
			//document.getElementById("submitbtn").disabled = false;	
			return false;
	}
	}
	}
	}
	}
	}
	}
	}
	}	
	}	
	
	
}
function validateForm() {
	var x = document.forms["member"]["plan"].value;
	if (x == "") {
    alert("Select Package From Dropdown");
	document.member.plan.focus()
	document.getElementById("plan_err").style.color = "red";
	document.getElementById("plan_err").innerHTML = "Select Package From Dropdown";	
    return false;
	}
	var x = document.forms["member"]["memcat"].value;
	if (x == "") {
    alert("Select Member Category From Dropdown");
	document.member.memcat.focus()
	document.getElementById("memcat_err").style.color = "red";
	document.getElementById("memcat_err").innerHTML = "Select Member Category From Dropdown";	
    return false;
	}
	var x = document.forms["member"]["email"].value;
	if (x == "") {
    alert("Enter Email Address");
	document.member.email.focus()
	document.getElementById("email_err").style.color = "red";
	document.getElementById("email_err").innerHTML = "Enter Email Address";	
    return false;
	}
	var x = document.forms["member"]["mobile"].value;
	if (x == "") {
    alert("Enter Mobile Number");
	document.member.mobile.focus()
	document.getElementById("mobile_err").style.color = "red";
	document.getElementById("mobile_err").innerHTML = "Enter Mobile Number";	
    return false;
	}
	var x = document.forms["member"]["userid"].value;
	if (x == "") {
    alert("Enter User ID Name");
	document.member.userid.focus()
	document.getElementById("userid_err").style.color = "red";
	document.getElementById("userid_err").innerHTML = "Enter User ID Name";	
    return false;
	}
	var x = document.forms["member"]["sponsor"].value;
	if (x == "") {
    alert("Enter Sponsor ID Name");
	document.member.sponsor.focus()
	document.getElementById("sponsor_err").style.color = "red";
	document.getElementById("sponsor_err").innerHTML = "Enter Sponsor ID Name";	
    return false;
	}
	var x = document.forms["member"]["plcmnt"].value;
	if (x == "") {
    alert("Enter Placement ID Name");
	document.member.plcmnt.focus()
	document.getElementById("plcmnt_err").style.color = "red";
	document.getElementById("plcmnt_err").innerHTML = "Enter Placement ID Name";	
    return false;
	}
	var x = document.forms["member"]["nid"].value;
	if (x == "") {
    alert("Enter NID Number");
	document.member.nid.focus()
	document.getElementById("nid_err").style.color = "red";
	document.getElementById("nid_err").innerHTML = "Enter NID Number";	
    return false;
	}
	var x = document.forms["member"]["passOne"].value;
	if (x == "") {
    alert("Enter Password");
	document.member.passOne.focus()
	document.getElementById("passOne_err").style.color = "red";
	document.getElementById("passOne_err").innerHTML = "Enter Password";	
    return false;
	}
	var x = document.forms["member"]["pinOne"].value;
	if (x == "") {
    alert("Enter Pin Number");
	document.member.pinOne.focus()
	document.getElementById("pinOne_err").style.color = "red";
	document.getElementById("pinOne_err").innerHTML = "Enter Pin Number";	
    return false;
	}
  
}
</script>

			 </form><!--Register Now Form Ends-->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php require_once 'footer.php';?>
    </div><!-- ./wrapper -->
<script src="js/signup.js"></script>
    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
<?php
		unset($_SESSION['msg']);
		unset($_SESSION['msgs']);
		?>
  </body>
</html>
<script>
	$(document).ready(function(){
		$("#cat").on('change', function(){
			var cat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "exe_upozela.php?cat_id=sub_cat&ref_id="+cat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#scat").html(response);
					//console.log(response);
				}
			});
		$("#usb1").show(300);
		});
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#scat").on('change', function(){
			var scat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "exe_union.php?scat_id=brand&refb_id="+scat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#brand").html(response);
					//console.log(response);
				}
			});
		$("#usb2").show(300);
		});
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#brand").on('change', function(){
			var scat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "exe_ward.php?scat_id=brand&refb_id="+scat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#ward").html(response);
					//console.log(response);
				}
			});
		$("#usb3").show(300);
		});
		
	});
</script>
 <script>
	$(document).ready(function(){
		$("#ward").on('change', function(){
			var scat_id = $(this).val();
			
			var response = '';
			$.ajax({    //create an ajax request to load_page.php
				type: "GET",
				url: "exe_agent.php?scat_id=brand&refb_id="+scat_id,             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#agent").html(response);
					//console.log(response);
				}
			});
		$("#usb4").show(300);
		});
		
	});
</script>