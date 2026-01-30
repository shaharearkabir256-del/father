 <footer class="footer-v1">
            <div class="footer">
                <div class="uk-container uk-container-center">
                    <div class="uk-grid">
                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-1 uk-width-1-1">
                            <div class="footer-left">
                                <a href="index.php"><img src="images/<?php echo $cog->logo; ?>" alt="<?php echo $cog->title; ?>" title="<?php echo $cog->title; ?>"></a>
                                <p><?php echo $cog->desc; ?></p>
                                <h5>Payment Method</h5>
                                <p class="set-margin">Easy To Pay, Pay Anytime Anywhere</p>
                                <ul>
                                    <li><a href="#"><img style="height:px;width:70px;" src="images/pay-1.png" alt=""></a></li>
                                    <li><a href="#"><img style="height:px;width:70px;" src="images/pay-2.png" alt=""></a></li>
                                    <li><a href="#"><img style="height:px;width:70px;" src="images/pay-3.png" alt=""></a></li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-1 uk-width-1-1">
                            <div class="footer-right">
                                <h3>Customer Care</h3>
                                <ul class="list-link">
									<li><a href="Daily_Income_Bazar.apk">Apps</a></li>
                                    <li><a href="cart_view.php">Cart</a></li>
                                    <li><a href="checkout.php">Check Out</a></li>
                                    <li><a href="#">Terms Of Service</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                    <li><a href="#">Faq</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-1 uk-width-1-1">
                            <div class="footer-right">
                                <h3>Find It Fast</h3>
                                <ul class="list-link">
									<?php  $exe1=$mysqli->query("SELECT * FROM `cat` where `chk`='1' ORDER BY `cat` ");	 
					while($cat=mysqli_fetch_object($exe1)){
					?>
                                    <li><a href="index.php?Category_id=<?php echo $cat->cat_id; ?>"><?php echo $cat->cat; ?></a></li>
									<?php }  ?>
                            
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-1 uk-width-1-1">
                            <div class="footer-right">
                                <h3>Contact Us</h3>
                                <ul>
                                    <li>
                                        <p class="padding"><span class="uk-icon-home"></span>Address: <br>
										 <?php 
									   //SELECT `serial`, `user_id`, `title`, `img`, `msg`, `mdate`, `chk` FROM `address` WHERE 1
											$query =$mysqli->query("SELECT * FROM `address` where `chk`=1 ORDER BY `serial` DESC");
											while($slide = mysqli_fetch_object($query)){
										?>
										<b><?php echo $slide->title; ?></b> <?php echo $slide->msg; ?> <br>
									
										
										<?php } ?>
										</p>
                                    </li>
                                    <li>
                                        <p class="padding"><span class="uk-icon-phone"></span>Phone: <a href="tel:<?php 
													$ad_info=mysqli_fetch_object($mysqli->query("SELECT * FROM `profile` WHERE `user_id`='1536835893' "));
													echo $ad_info->mobile;
													?>"><?php 
													echo $ad_info->mobile;
													?></a></p>
                                    </li>
                                    <li>
                                        <p class="padding"><span class="uk-icon-envelope"></span>Email: <a href="mailto:<?php echo $ad_info->email; ?>"><?php echo $ad_info->email; ?></a></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-coppyright">
                <div class="uk-container uk-container-center">
                    <ul class="social">
                        <li><a href="https://www.facebook.com/<?php echo $cog->fb; ?>"><span class="uk-icon-facebook"></span></a></li>
                        <li><a href="#"><span class="uk-icon-twitter"></span></a></li>
                        <li><a href="#"><span class="uk-icon-vimeo"></span></a></li>
                        <li><a href="#"><span class="uk-icon-youtube"></span></a></li>
                        <li><a href="#"><span class="uk-icon-yelp"></span></a></li>
                    </ul>
                    <p><?php echo $cog->copyright; ?> 2018-<?php echo date('Y');?> </p>
                </div>
            </div>
        </footer>
		<?php 
		unset($_SESSION['msg']);
		unset($_SESSION['msgs']);
		?>