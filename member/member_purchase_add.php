<?php require('session.php');?>
<!DOCTYPE html>
<html class=" ">
<?php require_once("head.php")?>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
        <!-- START TOPBAR -->
        <?php require_once("topbar.php")?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <?php require_once("sidebar.php")?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title"><?php echo $page;?></h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="#"><?php echo $page;?></a>
                                    </li>
                                    <li class="active">
                                        <strong>All <?php echo $page;?></strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">All <?php echo $page;?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">


                                        <!-- ********************************************** -->
			  <div class="col-xs-12">
                   <p class="text-muted">
                   <font color="red">   <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?> </font>
				   <font color="green"> <?php if(isset($_SESSION['msgs'])){echo $_SESSION['msgs'];} ?> </font>
				  </p>
				   <!--Register Form-->
            <form action="member_purchase_add_act.php" name="member" onsubmit="return validateForm()" method="post" class="form-horizontal">
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
					if($planupchk>0){
			?>
					<?php if($planup->plan>=$plan->serial){?><option value="<?php echo $plan->serial; ?>"><?php echo $plan->name."-".$plan->plan.$t; ?></option>
					<?php } }else{ ?>
					<?php if($plan->plan<=$inv_pla->invest){?><option value="<?php echo $plan->serial; ?>"><?php echo $plan->name."-".$plan->plan.$t; ?></option>
				<?php }}}?>
						</select>
						<p id="plan_err">Fill Up this field</p>
                      </div>
                 </div>
				 <div class="col-sm-6">
                      <div class="form-group">
                        <label for="memcat" class="control-label">Member Categories<font color="#990000">*</font> <font id=""></font></label>
                        <select id="memcat" onchange="btnFunction()" name="memcat" type="number" class="form-control">
						<option value="">Select Member Category One</option>
						<?php //if($mem->stype==1){ ?><option value="1">Happy</option><?php //} ?>
						<?php //if($mem->stype==2){ ?><option value="2">Regular</option><?php //} ?>
						<?php //if($mem->stype==3){ ?><option value="3">Lucky</option><?php //} ?>
						<option value="4">Freedom</option>
						<option value="5">Extreme</option>
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
                        <label for="nid" class="form-label">ID<font color="#990000">*</font></label>
                        <input id="NID" onchange="btnFunction();"  type="number" name="nid" onchange="return check_nid();" onblur="this.value=removeSpaces(this.value);"  onkeyup="return check_nid();" title="Enter NID Number" placeholder="Enter ID Number" class="form-control"/>
						<table><tr><td><p id="nid_err">Fill Up this field</p></td><td><p id="nid_error"></p></td></tr></table>
                      </div>
                  </div>
			</div>
                <div class="col-sm-12">
				  <div class="col-sm-6">    
                      <div class="form-group">
                        <label for="passOne" class="control-labely">Password<font color="#990000">*</font> <font id=""></font></label>
                        <input id="passOne" onchange="btnFunction()" class="form-control" type="password" name="passOne" title="Enter password"  value="12345"/>
                     <p id="passOne_err">Fill Up this field</p>
					 </div>
                  </div>
					<div class="col-sm-6"> 
                        <div class="form-group">
                        <label for="pinOne" class="control-labely">Pin<font color="#990000">*</font> <font id=""></font></label>
                        <input id="pinOne" onchange="btnFunction()" class="form-control" type="password" name="pinOne" title="Enter Pin Code"  value="1234"/>
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
		var b = document.getElementById("memcat").value;
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
			var h = document.getElementById("nid").value;
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
				  
                  <!--Register Form--
                  <form name="registration_form" action="member_add_act.php" name="member" onsubmit="return process()" method="post" id='registration_form' class="form-horizontal">
                <div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="firstname" class="control-label">First Name</label>
                        <input id="firstname" class="form-control" type="text" name="fname" title="Enter first name" placeholder="First name"/>
                      </div>
                 </div>
				  <div class="col-sm-6">  
                      <div class="form-group">
                        <label for="lastname" class="control-label">Last Name</label>
                        <input id="lastname" class="form-control" type="text" name="lname" title="Enter last name" placeholder="Last name"/>
                      </div>
                  </div>
                </div>
				
				<div class="col-sm-12">
				  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Email<font color="#990000">*</font></label>
                        <input required id="email" class="form-control" type="email" name="email"  onblur="this.value=removeSpaces(this.value); title="Enter Email" placeholder="Your Email"/>
                      </div>
                  </div>
				<div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">Mobile<font color="#990000">*</font></label>
                        <input required id="mobile" class="form-control" type="text" name="mobile" title="Enter Mobile" placeholder="Your Mobile"/>
                      </div>
                </div>
              </div>
                 
			<div class="col-sm-12">
				<div class="col-sm-6">
                      <div class="form-group">
                        <label for="email" class="control-labely">User ID<font color="#990000">*</font></label>
                        <input required class="form-control" type="text" name="userid" id="User_ID" onchange="return check_user_id();" onblur="this.value=removeSpaces(this.value);" onkeyup="return check_user_id();"  title="Enter Usre ID" placeholder="Your User Id"/>
						</div>
				</div>
					<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="user_id_error"></div>
					 </div>
					 </div>
					 
			</div>
				<div class="col-sm-12">
				  <div class="col-sm-6">	  
					   <div class="form-group">
                        <label for="email" class="control-labely">Sponsor ID<font color="#990000">*</font></label>
                        <input class="form-control" type="text" name="sponsor" id="Reference" onchange="return check_ref_id();" onblur="this.value=removeSpaces(this.value);"  onkeyup="return check_ref_id();" title="Enter Sponsor ID" placeholder="Your Sponsor Id"/>
					  </div>
				  </div>
				  	<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="ref_error"></div>
					 </div>
					 </div>
					 
			</div>
			<div class="col-sm-12">
				  <div class="col-sm-6">	
					  <div class="form-group">
					   <?php $placement=$_GET['placement'];?>
                        <label for="email" class="control-labely">Placement ID<font color="#990000">*</font></label>
                        <input class="form-control" type="text" name="plcmnt" <?php if($placement!=''){?> value="<?php echo $placement;?>"<?php } ?> id="Uplink" onchange="return check_uplink_id();" onblur="this.value=removeSpaces(this.value);" onkeyup="return check_uplink_id();" title="Enter Placement ID" placeholder="Your Placement Id"/>
					  </div>
				   </div>
				   	<div class="col-sm-6">
					 <div class="form-group">
					 <label for="email" class="control-labely"></label>
					   <div id="spon_error"></div>
					 </div>
					 </div>
					 
			</div>
			
                <div class="col-sm-12">
				  <div class="col-sm-6">    
                      <div class="form-group">
                        <label for="password" class="control-labely">Password<font color="#990000">*</font></label>
                        <input required class="form-control" type="password" name="passOne" title="Enter password" placeholder="Password"/>
                      </div>
                  </div>
					<div class="col-sm-6"> 
                        <div class="form-group">
                        <label for="pinn" class="control-labely">Pin<font color="#990000">*</font></label>
                        <input required class="form-control" type="password" name="pinOne" title="Enter Pin Code" placeholder="Pin Code"/>
					  </div>
					</div>
				</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
						 </div>
	
              </div>

				</form>
								 <!--Register Now Form Ends-->
                           
                        </div>
                        
                       
                    </div>

                                        <!-- ********************************************** -->




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
		<script src="js/signup.js"></script>


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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

<?php
unset($_SESSION['msg']);
unset($_SESSION['msgs']);
?>
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
