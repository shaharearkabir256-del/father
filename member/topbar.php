<div class='page-topbar '>
            <div class='logo-area'>
<a style="text-decoration:none;"><h4 style="margin-top:20px;margin-left:10px;"> 
<font class="" color="white"><?php if($mem->team==0){echo $t.$bal->net_bal;}else{echo $t.$mem->point;}?></font>

<span class="hidden-lg hidden-md">&nbsp;
<font class="" color="white"><i class="fa fa-user"></i> <?php echo $mem->log_id;?></font>
</span>

</h4>
</a>
            </div>
            <div class='quick-area'>
                <div class='pull-left'>
                    <ul class="info-menu left-links list-inline list-unstyled">
                        <li class="sidebar-toggle-wrap">
                            <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <li style="display:none" class="hidden-sm hidden-xs searchform">
                            <div class="input-group">
                                <span class="input-group-addon input-focus">
                                    <i class="fa fa-search"></i>
                                </span>
                                <form action="" method="post">
                                    <input type="text" class="form-control animated fadeIn" placeholder="Search & Enter">
                                    <input type='submit' value="">
                                </form>
                            </div>
                        </li>
						<?php if($cus->team==0){?> 
                        <li class="hidden-sm hidden-xs message-toggle-wrapper">
                            <a href="#" style="text-decoration:none;">
                                <span>
								<i class="fa fa-rocket icon-xs icon-rounded icon-primary inviewport animated animated-delay-400ms visible rollIn" data-vp-add-class="visible rollIn"></i>
                                <?php
                                if(($tre->get)&&($tre->expdate)>0){
                                echo "<font size='3' color=''>Earning: </font>";
                                echo "<font class='badge badge-success' size='4' color='green'> Yes </font>";
                                }else{
								echo "<font size='3' color=''>Earning: </font>";
                                echo "<font class='badge badge-danger' size='4' color='red'>No</font>&nbsp;";    
                                }
                               ?>							  
                               </span>
                            </a>
                        </li>
						<?php } ?>
                    </ul>
                </div>		
                <div class='pull-right'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                        <li class="profile">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <img src="images/avatar/<?php echo $pro->photo; ?>" alt="<?php echo $tre->user; ?>" title="<?php echo $tre->user; ?>" class="img-circle img-inline">
                                <span><?php echo $tre->user; ?> <i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
								
                                <li>
                                    <a href="profile.php">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
								<li>
                                    <a href="pass.php?page=Change%20Password">
                                        <i class="fa fa-wrench"></i>
                                        Password
                                    </a>
                                </li> 
								 <li>
                                    <a href="pin.php?page=Change%20Pin%20Code">
                                        <i class="fa fa-info"></i>
                                         Pincode
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="logout.php">
                                        <i class="fa fa-lock"></i>
                                        Logout 
									</a>
                                </li>
                            </ul>
                        </li>
                        <!--<li class="chat-toggle-wrapper">
                            <a href="#" data-toggle="chatbar" class="toggle_chat">
                                <i class="fa fa-comments"></i>
                                <span class="badge badge-warning">9</span>
                                <i class="fa fa-times"></i>
                            </a>
                        </li>-->
                    </ul>			
                </div>		
            </div>

        </div>