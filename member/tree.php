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
                                <h2 class="title pull-left">                         
	<a href = "javascript:history.back()"style="text-decoration:none;"><button class="btn btn-primary" type="submit"  value="Back">< Back</button> </a>
    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
	<a href = "javascript:history.forward()"style="text-decoration:none;"><button  class="btn btn-primary" type="submit" value="Next">Next ></button> 		</a>
	</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <!-- Post Content
              ================================================= -->
							<?php
	if($_GET['userid']==''){ 
		$exe2=mysqli_fetch_object($mysqli->query("SELECT `user` FROM `tree` where `user_id`='$id'"));
		$user=$exe2->user;
		}else{	
		$exe1=mysqli_fetch_object($mysqli->query("SELECT `serial`,`user` FROM `tree` where user='".$_GET['userid']."'"));
		$res=mysqli_fetch_object($mysqli->query("select `serial`,`user` from `tree` where `user_id`='$id'"));
		if($exe1->serial>$res->serial){
				$user=$exe1->user;				
				}else{
					$user=$res->user;
					}
		}
		require('star.php');
	?>

<table class="table table-responsive" width="100%" align="center"><tr><td>
<div class="tree">
	<ul>
		<li>                         <!--Root-->
		<?php
			$res1=mysqli_fetch_object($mysqli->query("select * from `tree` where `user`='".$user."'"));
			$pro1=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res1->user_id."'"));
			$mem1=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res1->user_id."'"));
			$b="<span class='glyphicon glyphicon-plus'></span>Add" ;
			?>	
			<a href="#"><font color=blue><?php if($res1->user==''){echo $b ;}else{echo $res1->user;} ?></font>
			<br><img height="100" src="images/avatar/<?php if($pro1->photo!=''){echo $pro1->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro1->fname!=''){echo $pro1->fname;}else{echo $mem1->log_id;}?>" title="Name: <?php if($pro1->fname!=''){echo $pro1->fname.' '.$pro1->lname;}else{echo $mem1->log_id;}?>" class="profile-photo-md" />
			<?php echo "<br>";
				if($res1->package==1){echo $star1;}
			elseif($res1->package==2){echo $star2;}
			elseif($res1->package==3){echo $star3;}
			elseif($res1->package==4){echo $star4;}
			elseif($res1->package==5){echo $star5;}
			elseif($res1->package==6){echo $star6;}
			elseif($res1->package==7){echo $star7;}
			elseif($res1->package==8){echo $star8;}
			elseif($res1->package==9){echo $star9;}
		    elseif($res1->package==10){echo $star10;}
								   else{}
				echo " stype= ".$res1->stype; echo " Position= ".$res1->position; echo "<br>";				   
			?>
			</a>
			<ul>
				<li>                                       <!--P 1-->
				<?php	
					$res2=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='1'"));
					$pro2=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res2->user_id."'"));
					$mem2=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res2->user_id."'"));
					?>
					<a href="<?php if($res2->user!=''){?>tree.php?userid=<?php echo $res2->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=1"><font color=blue><?php if($res2->user==''){echo $b ;}else{echo $res2->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro2->photo!=''){echo $pro2->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro2->fname!=''){echo $pro2->fname;}else{echo $mem2->log_id;}?>" title="Name: <?php if($pro2->fname!=''){echo $pro2->fname.' '.$pro2->lname;}else{echo $mem2->log_id;}?>; <?php if($res2->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
								<?php echo "<br>";
				if($res2->package==1){echo $star1;}
			elseif($res2->package==2){echo $star2;}
			elseif($res2->package==3){echo $star3;}
			elseif($res2->package==4){echo $star4;}
			elseif($res2->package==5){echo $star5;}
			elseif($res2->package==6){echo $star6;}
			elseif($res2->package==7){echo $star7;}
			elseif($res2->package==8){echo $star8;}
			elseif($res2->package==9){echo $star9;}
		    elseif($res2->package==10){echo $star10;}
								   else{}
			?>
					</a>
				
				</li> 
				<li>  							<!--P 2-->
				<?php	
					$res3=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='2'"));
					$pro3=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res3->user_id."'"));
					$mem3=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res3->user_id."'"));
					?>	
					<a href="<?php if($res3->user!=''){?>tree.php?userid=<?php echo $res3->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=2"><font color=blue><?php if($res3->user==''){echo $b ;}else{echo $res3->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro3->photo!=''){echo $pro3->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro3->fname!=''){echo $pro3->fname;}else{echo $mem3->log_id;}?>" title="Name: <?php if($pro3->fname!=''){echo $pro3->fname.' '.$pro3->lname;}else{echo $mem3->log_id;}?>; <?php if($res3->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res3->package==1){echo $star1;}
			elseif($res3->package==2){echo $star2;}
			elseif($res3->package==3){echo $star3;}
			elseif($res3->package==4){echo $star4;}
			elseif($res3->package==5){echo $star5;}
			elseif($res3->package==6){echo $star6;}
			elseif($res3->package==7){echo $star7;}
			elseif($res3->package==8){echo $star8;}
			elseif($res3->package==9){echo $star9;}
		    elseif($res3->package==10){echo $star10;}
								   else{}
			?>
					</a>
				</li>
				<li>							<!--P 3-->
				<?php	
					$res4=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='3'"));
					$pro4=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res4->user_id."'"));
					$mem4=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res4->user_id."'"));
					?>
					<a href="<?php if($res4->user!=''){?>tree.php?userid=<?php echo $res4->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=3"><font color=blue><?php if($res4->user==''){echo $b ;}else{echo $res4->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro4->photo!=''){echo $pro4->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro4->fname!=''){echo $pro4->fname;}else{echo $mem4->log_id;}?>" title="Name: <?php if($pro4->fname!=''){echo $pro4->fname.' '.$pro4->lname;}else{echo $mem4->log_id;}?>; <?php if($res4->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res4->package==1){echo $star1;}
			elseif($res4->package==2){echo $star2;}
			elseif($res4->package==3){echo $star3;}
			elseif($res4->package==4){echo $star4;}
			elseif($res4->package==5){echo $star5;}
			elseif($res4->package==6){echo $star6;}
			elseif($res4->package==7){echo $star7;}
			elseif($res4->package==8){echo $star8;}
			elseif($res4->package==9){echo $star9;}
		    elseif($res4->package==10){echo $star10;}
								   else{}
			?>
            		</a>
				</li>
				<li>						<!--P 4-->
					<?php	
					$res5=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='4'"));
					$pro5=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res5->user_id."'"));
					$mem5=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res5->user_id."'"));
					?>
					<a href="<?php if($res5->user!=''){?>tree.php?userid=<?php echo $res5->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=4"><font color=blue><?php if($res5->user==''){echo $b ;}else{echo $res5->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro5->photo!=''){echo $pro5->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro5->fname!=''){echo $pro5->fname;}else{echo $mem5->log_id;}?>" title="Name: <?php if($pro5->fname!=''){echo $pro5->fname.' '.$pro5->lname;}else{echo $mem5->log_id;}?>; <?php if($res5->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res5->package==1){echo $star1;}
			elseif($res5->package==2){echo $star2;}
			elseif($res5->package==3){echo $star3;}
			elseif($res5->package==4){echo $star4;}
			elseif($res5->package==5){echo $star5;}
			elseif($res5->package==6){echo $star6;}
			elseif($res5->package==7){echo $star7;}
			elseif($res5->package==8){echo $star8;}
			elseif($res5->package==9){echo $star9;}
		    elseif($res5->package==10){echo $star10;}
								   else{}
			?>
            		</a>
				</li>
				<li>						<!--P 5-->
					<?php	
					$res6=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='5'"));
					$pro6=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res6->user_id."'"));
					$mem6=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res6->user_id."'"));
					?>
					<a href="<?php if($res6->user!=''){?>tree.php?userid=<?php echo $res6->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=5"><font color=blue><?php if($res6->user==''){echo $b ;}else{echo $res6->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro6->photo!=''){echo $pro6->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro6->fname!=''){echo $pro6->fname;}else{echo $mem6->log_id;}?>" title="Name: <?php if($pro6->fname!=''){echo $pro6->fname.' '.$pro6->lname;}else{echo $mem6->log_id;}?>; <?php if($res6->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res6->package==1){echo $star1;}
			elseif($res6->package==2){echo $star2;}
			elseif($res6->package==3){echo $star3;}
			elseif($res6->package==4){echo $star4;}
			elseif($res6->package==5){echo $star5;}
			elseif($res6->package==6){echo $star6;}
			elseif($res6->package==7){echo $star7;}
			elseif($res6->package==8){echo $star8;}
			elseif($res6->package==9){echo $star9;}
		    elseif($res6->package==10){echo $star10;}
								   else{}
			?>
            		</a>
				</li>
					<li>						<!--P 6-->
					<?php	
					$res7=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='6'"));
					$pro7=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res7->user_id."'"));
					$mem7=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res7->user_id."'"));
					?>
					<a href="<?php if($res7->user!=''){?>tree.php?userid=<?php echo $res7->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=6"><font color=blue><?php if($res7->user==''){echo $b ;}else{echo $res7->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro7->photo!=''){echo $pro7->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro7->fname!=''){echo $pro7->fname;}else{echo $mem7->log_id;}?>" title="Name: <?php if($pro7->fname!=''){echo $pro7->fname.' '.$pro7->lname;}else{echo $mem7->log_id;}?>; <?php if($res7->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res7->package==1){echo $star1;}
			elseif($res7->package==2){echo $star2;}
			elseif($res7->package==3){echo $star3;}
			elseif($res7->package==4){echo $star4;}
			elseif($res7->package==5){echo $star5;}
			elseif($res7->package==6){echo $star6;}
			elseif($res7->package==7){echo $star7;}
			elseif($res7->package==8){echo $star8;}
			elseif($res7->package==9){echo $star9;}
		    elseif($res7->package==10){echo $star10;}
								   else{}
			?>
            		</a>
				</li>	
				<li>						<!--P 7-->
					<?php	
					$res8=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='7'"));
					$pro8=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res8->user_id."'"));
					$mem8=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res8->user_id."'"));
					?>
					<a href="<?php if($res8->user!=''){?>tree.php?userid=<?php echo $res8->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=7"><font color=blue><?php if($res8->user==''){echo $b ;}else{echo $res8->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro8->photo!=''){echo $pro8->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro8->fname!=''){echo $pro8->fname;}else{echo $mem8->log_id;}?>" title="Name: <?php if($pro8->fname!=''){echo $pro8->fname.' '.$pro8->lname;}else{echo $mem8->log_id;}?>; <?php if($res8->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res8->package==1){echo $star1;}
			elseif($res8->package==2){echo $star2;}
			elseif($res8->package==3){echo $star3;}
			elseif($res8->package==4){echo $star4;}
			elseif($res8->package==5){echo $star5;}
			elseif($res8->package==6){echo $star6;}
			elseif($res8->package==7){echo $star7;}
			elseif($res8->package==8){echo $star8;}
			elseif($res8->package==9){echo $star9;}
		    elseif($res8->package==10){echo $star10;}
								   else{}
			?>
            		</a>
				</li>
				
				<li>						<!--P 8-->
					<?php	
					$res9=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='8'"));
					$pro9=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res9->user_id."'"));
					$mem9=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res9->user_id."'"));
					?>
					<a href="<?php if($res9->user!=''){?>tree.php?userid=<?php echo $res9->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=8"><font color=blue><?php if($res9->user==''){echo $b ;}else{echo $res9->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro9->photo!=''){echo $pro9->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro9->fname!=''){echo $pro9->fname;}else{echo $mem9->log_id;}?>" title="Name: <?php if($pro9->fname!=''){echo $pro9->fname.' '.$pro9->lname;}else{echo $mem9->log_id;}?>; <?php if($res9->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res9->package==1){echo $star1;}
			elseif($res9->package==2){echo $star2;}
			elseif($res9->package==3){echo $star3;}
			elseif($res9->package==4){echo $star4;}
			elseif($res9->package==5){echo $star5;}
			elseif($res9->package==6){echo $star6;}
			elseif($res9->package==7){echo $star7;}
			elseif($res9->package==8){echo $star8;}
			elseif($res9->package==9){echo $star9;}
		    elseif($res9->package==10){echo $star10;}
								   else{}
			?>
            		</a>
				</li>
				
				<li>						<!--P 9-->
					<?php	
					$res10=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='9'"));
					$pro10=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res10->user_id."'"));
					$mem10=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res10->user_id."'"));
					?>
					<a href="<?php if($res10->user!=''){?>tree.php?userid=<?php echo $res10->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=9"><font color=blue><?php if($res10->user==''){echo $b ;}else{echo $res10->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro10->photo!=''){echo $pro10->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro10->fname!=''){echo $pro10->fname;}else{echo $mem10->log_id;}?>" title="Name: <?php if($pro10->fname!=''){echo $pro10->fname.' '.$pro10->lname;}else{echo $mem10->log_id;}?>; <?php if($res10->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res10->package==1){echo $star1;}
			elseif($res10->package==2){echo $star2;}
			elseif($res10->package==3){echo $star3;}
			elseif($res10->package==4){echo $star4;}
			elseif($res10->package==5){echo $star5;}
			elseif($res10->package==6){echo $star6;}
			elseif($res10->package==7){echo $star7;}
			elseif($res10->package==8){echo $star8;}
			elseif($res10->package==9){echo $star9;}
		    elseif($res10->package==10){echo $star10;}
								   else{}
			?>
            		</a>
				</li>
				
				<li>						<!--P 10-->
					<?php	
					$res11=mysqli_fetch_object($mysqli->query("select * from `tree` where `upline`='".$res1->user."' and position='10'"));
					$pro11=mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$res11->user_id."'"));
					$mem11=mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$res11->user_id."'"));
					?>
					<a href="<?php if($res11->user!=''){?>tree.php?userid=<?php echo $res11->user;}else{?>member_add.php?placement=<?php echo $res1->user; } ?>&&position=10"><font color=blue><?php if($res11->user==''){echo $b ;}else{echo $res11->user;}?></font>
					<br><img height="100" src="images/avatar/<?php if($pro11->photo!=''){echo $pro11->photo;}else{echo 'avatar-1.png';}?>" alt="<?php if($pro11->fname!=''){echo $pro11->fname;}else{echo $mem11->log_id;}?>" title="Name: <?php if($pro11->fname!=''){echo $pro11->fname.' '.$pro11->lname;}else{echo $mem11->log_id;}?>; <?php if($res11->sponsor==$id){echo 'My Team';}; ?>" class="profile-photo-md" />
					<?php echo "<br>";
				if($res11->package==1){echo $star1;}
			elseif($res11->package==2){echo $star2;}
			elseif($res11->package==3){echo $star3;}
			elseif($res11->package==4){echo $star4;}
			elseif($res11->package==5){echo $star5;}
			elseif($res11->package==6){echo $star6;}
			elseif($res11->package==7){echo $star7;}
			elseif($res11->package==8){echo $star8;}
			elseif($res11->package==9){echo $star9;}
		    elseif($res11->package==10){echo $star10;}
								   else{}
			?>
            		</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
</td></tr></table>


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
        <!-- modal end -->
    </body>
</html>



