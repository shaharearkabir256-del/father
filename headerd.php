<header class="header-v2">
            <div class="top-header">
                <div class="uk-container uk-container-center">
                    <p><marquee><?php echo $cog->marquee;?></marquee></p>
                      <ul class="top-menu">
				 <?php if(isset($_SESSION['MemLogId'])){ 
				 $memberid=$_SESSION['MemLogId'];
				 //$mem = mysqli_fetch_object($mysqli->query("select * from `member` where `user_id`='".$memberid."' "));	
				 $pro = mysqli_fetch_object($mysqli->query("select * from `profile` where `user_id`='".$memberid."' "));
				 ?>
				  <li><a href="member/product_order.php?page=Order%20List&&menu=Products"><?php echo $pro->fname." ".$pro->lname; ?></a></li>
				 <?php }else{ ?>
				  <li><a href="checkout.php">Login</a></li>
				 <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="main-menu tzp-stricky">
                <div class="uk-container uk-container-center">
                    <div class="logo"> 
                       <a href="index.php"><img src="images/Untitled-removebg-preview.png" alt="" style="width:120px;height:auto;"> </a>
                    </div>
                    <ul class="menu">
	<li class="uk-parent uk-active"><a href="index.php"> HOME</a></li>
	<li class="uk-parent uk-active"><a href="about.php"> ABOUT US</a></li>
	<li class="uk-parent uk-active"><a href="contact.php"> CONTACT US</a></li>
	<li class="border-left"><p>CALL US <br> <a href="tel:<?php 
													$ad_info=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='1536835893' "));
													echo $ad_info->mobile;
													?>"><font color="red"><?php 
													echo $ad_info->mobile;
													?></font></a></p></li>
                    </ul>
                    <div class="icon-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="mobile-menu">
                        <nav class="nav-holder">
                            <ul>
								<li><a href="index.php"> Home</a></li> <!--class="uk-active"-->
								<li><a href="about.php"> About Us</a></li>
								<li><a href="contact.php"> Contact Us</a></li>
								 <li><a href="checkout.php">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="search-bar">
                <div class="flex-box uk-container uk-container-center uk-position-relative">
                    <div class="category toggle">
                        <a class="offcanvas-category"><span class="uk-icon-th-large"></span>SHOP BY CATEGORY</a>
                        <div id="category-mobi" class="category-mobi">
                            <div class="logo"><?php echo $cog->title; ?>
                                <!--<a href="index.php"><img src="images/<?php echo $cog->logo; ?>" alt="<?php echo $cog->title; ?>" title="<?php echo $cog->title; ?>"></a>-->
                            </div>
                             <nav class="nav-holder">
                                <ul>
								 <?php  $exe1=$mysqli->query("SELECT * FROM `cat` where chk=1 ORDER BY `cat` limit 10 ");	
								while($cat=mysqli_fetch_object($exe1)){
								$exe2R=$mysqli->query("SELECT * FROM `scat` where cat_id='".$cat->cat_id."' ");	
								$scatR=mysqli_fetch_row($exe2R); ?>
                                    <li <?php if($scatR>0){ ?> class="has-submenu" <?php } ?> >
                                         <a <?php if($scatR==0){ ?>href="index.php?Category_id=<?php echo $cat->cat_id; ?>"<?php } ?>><?php echo $cat->cat; ?></a>
                                        <ul class="submenu">
										<?php  $exe2=$mysqli->query("SELECT * FROM `scat` where cat_id='".$cat->cat_id."' order by scat ");
											while($scat=mysqli_fetch_object($exe2)){
											$exe3B=$mysqli->query("SELECT * FROM `brand` where cat_id='".$cat->cat_id."' and scat_id='".$scat->scat_id."' order by brand ");
											$brandB=mysqli_fetch_row($exe3B);
											?>
                                            <li <?php if($brandB>0){ ?> class="has-submenu"<?php } ?> >
                                               <a <?php if($brandB==0){ ?>href="index.php?Sub_Category_id=<?php echo $scat->scat_id; ?>"<?php } ?>><?php echo $scat->scat; ?></a>
                                                <ul class="submenu">
												<?php   $exe3=$mysqli->query("SELECT * FROM `brand` where cat_id='".$cat->cat_id."' and scat_id='".$scat->scat_id."' order by brand ");	
													while($brand=mysqli_fetch_object($exe3)){ ?>
                                                    <li><a href="index.php?Brand_id=<?php echo $brand->brand_id; ?>"><?php echo $brand->brand; ?></a></li>
                                                   <?php }  ?>
                                                </ul>
                                            </li>
                                           <?php }  ?>
                                        </ul>
                                    </li> 
									<?php }  ?>
								
                                 <li><a href="tel:<?php 
													$ad_info=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='1536835893' "));
												
													echo $ad_info->mobile;
													?>">
								 <font color="red">CALL US</font><br>
								 <font color="red"><?php 
													$ad_info=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='1536835893' "));
												
													echo $ad_info->mobile;
													?></font></a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="mark-window"></div>
                    </div>
                    <form class="search tzp-custom-select" action="#" method="post">
                        <select class="custom-select sources" data-placeholder="All categories">
						<?php  $exe1=$mysqli->query("SELECT * FROM `cat` where `chk`='1' ORDER BY `cat` ");	 
					while($cat=mysqli_fetch_object($exe1)){
					?>
                            <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat; ?></option>
					<?php }  ?>
                        </select>
                        <input type="text" placeholder="Search Product">
                        <button type="button"><span class="uk-icon-search"></span></button>
                    </form>
<?php 	//$carr=mysqli_num_rows($mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$memberid."'"));	?>
                    <div class="cart tzp-show-cart">
                        <a href="#"><span class="uk-icon-shopping-basket"></span></a>
                         <a class="cartbasket"><i class="count-product">0</i></a>
                    </div>

                    <div class="search-icon" data-uk-dropdown="{remaintime:'0', mode:'click', pos: 'bottom-left'}">
                        <a href="#"><span class="uk-icon-search"></span></a>
                        <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-bottom">
                            <form class="uk-form" action="#" method="POST">
                                <input type="text" class="uk-form-large uk-width-1-1" placeholder="Search...">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>