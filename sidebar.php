<div class="uk-flex-order-first uk-width-large-1-4 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
                        <!--<div class="tzp-browse-category div-margin-bottom">
                            <ul class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-3 uk-grid-width-small-1-2 uk-grid-width-1-1">
							<?php  
							/* 	$n=1;
								$exe1=$mysqli->query("SELECT * FROM `cat` where `chk`='1' ORDER BY `cat` limit 3 ");	 
					while($cat=mysqli_fetch_object($exe1)){
						$prodCatChk=mysqli_num_rows($mysqli->query("SELECT * FROM `product` where `cat_id`='$cat->cat_id' and `chk`='1' "));
						if($prodCatChk>0){ */
					?>
                                <li>
                                    <div class="box">
                                        <img src="images/sidebar/browse-category-<?php //echo $n++;?>.jpg" alt="<?php //echo $cat->cat; ?>" title="<?php //echo $cat->cat; ?>">
                                        <div class="text">
                                         <a href="product.php?Category_id=<?php //echo $cat->cat_id; ?>"><h3><?php //echo $cat->cat; ?></h3></a>
                                         <p><?php //echo $prodCatChk; ?> Products</p>
                                         <a href="product.php?Category_id=<?php //echo $cat->cat_id; ?>"><h5 class="tzp-hvr-icon-translate">Shop now <span class="hvr-icon uk-icon-chevron-circle-right"></span></h5></a>
                                        </div>
                                    </div>
                                </li>
					<?php //} }  ?>
                               <!-- <li>
                                    <div class="box">
                                        <img src="images/sidebar/browse-category-2.jpg" alt="">
                                        <div class="text">
                                            <a href="#"><h3>Sunglasses</h3></a>
                                            <p>21 Products</p>
                                            <a href="#"><h5 class="tzp-hvr-icon-translate">Shop now <span class="hvr-icon uk-icon-chevron-circle-right"></span></h5></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <img src="images/sidebar/browse-category-3.jpg" alt="">
                                        <div class="text">
                                            <a href="#"><h3>Clothing</h3></a>
                                            <p>21 Products</p>
                                            <a href="#"><h5 class="tzp-hvr-icon-translate">Shop now <span class="hvr-icon uk-icon-chevron-circle-right"></span></h5></a>
                                        </div>
                                    </div>
                                </li>--
                            </ul>
                        </div>-->
                       <!-- <div class="support div-margin-bottom">
                            <ul class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-4 uk-grid-width-small-1-2 uk-grid-width-1-1">
                                <li>
                                    <div class="box">
                                        <div class="icon">
                                            <span class="flaticon-delivery-truck"></span>
                                        </div>
                                        <div class="text">
                                            <h3>Free Delivery</h3>
                                            <p>from $50</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon">
                                            <span class="flaticon-information"></span>
                                        </div>
                                        <div class="text">
                                            <h3>99% Customer</h3>
                                            <p>feedbacks</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon">
                                            <span class="flaticon-24-hours-delivery"></span>
                                        </div>
                                        <div class="text">
                                            <h3>365 Days</h3>
                                            <p>for free return</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon">
                                            <span class="flaticon-credit-card"></span>
                                        </div>
                                        <div class="text">
                                            <h3>Payment</h3>
                                            <p>secure system</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>-->
									<?php 
			$prodchk=mysqli_num_rows($mysqli->query("SELECT * FROM `product` where place=6 and `chk`='1' "));
			$exep=$mysqli->query("SELECT * FROM `product` where place=6 and `chk`='1' order by serial desc limit 3 ");
			if($prodchk>0){
				
									?>
                        <!--<div class="recommented div-margin-bottom">
                            <div class="bg-title">
                                <h3>Recommended For You!</h3>
                            </div>
                            <div class="box-padding">
                                <ul class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-3 uk-grid-width-small-1-3 uk-grid-width-1-1">
								 <?php
									 while($prod3=mysqli_fetch_object($exep)){
									?>
                                    <li>
                                        <div class="box uk-clearfix">
                                            <div class="image">
                                                <a href="prod_details.php?id=<?php echo time().$prod3->serial;?>">
											<img src="<?php echo $url->url; ?>product/<?php echo $prod3->img1; ?>" alt="<?php echo $prod3->name;?>" title="<?php echo $prod3->name;?>">
											</a>
                                            </div>
                                            <div class="text">
						<h3><?php if($prod3->offer==1){ echo $prod3->discount_price.$bdt; }else{ echo $prod3->sale_price.$bdt; } ?></h3>
                                              <a href="prod_details.php?id=<?php echo time().$prod3->serial;?>"><p><?php echo $prod3->name;?></p></a>
                                                <ul class="rating">
                                                    <li><span class="uk-icon-star"></span></li>
                                                    <li><span class="uk-icon-star"></span></li>
                                                    <li><span class="uk-icon-star"></span></li>
                                                    <li><span class="uk-icon-star"></span></li>
                                                    <li><span class="uk-icon-star"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>-->
						<?php } ?>
                        <div class="starting div-margin-bottom">
                            <div class="text uk-clearfix">
                                <div class="left">
                                    <h5>Where To Buy</h5>
                                    <h3 class="sec-color">Eye Glasses</h3>
                                    <h3>Online</h3>
                                </div>
                                <div class="right">
                                    <h5>Starting At</h5>
                                    <h3 class="price"><i class="color">$</i>29<i>99</i></h3>
                                </div>
                            </div>
                            <div class="tzp-button">
                                <a href="#" class="button">Start Buying</a>
                            </div>
                        </div>
						<div class="starting div-margin-bottom">
                            <div class="text uk-clearfix">
                                <div class="left">
                                    <h5>Where To Buy</h5>
                                    <h3 class="sec-color">Eye Glasses</h3>
                                    <h3>Online</h3>
                                </div>
                                <div class="right">
                                    <h5>Starting At</h5>
                                    <h3 class="price"><i class="color">$</i>29<i>99</i></h3>
                                </div>
                            </div>
                            <div class="tzp-button">
                                <a href="#" class="button">Start Buying</a>
                            </div>
                        </div>
						<div class="starting div-margin-bottom">
                            <div class="text uk-clearfix">
                                <div class="left">
                                    <h5>Where To Buy</h5>
                                    <h3 class="sec-color">Eye Glasses</h3>
                                    <h3>Online</h3>
                                </div>
                                <div class="right">
                                    <h5>Starting At</h5>
                                    <h3 class="price"><i class="color">$</i>29<i>99</i></h3>
                                </div>
                            </div>
                            <div class="tzp-button">
                                <a href="#" class="button">Start Buying</a>
                            </div>
                        </div>
                       <!-- <div class="form-blog tzp-slider">
                            <div class="title">
                                <h3>From The Blog</h3>
                            </div>
                            <div class="uk-slidenav-position" data-uk-slider>
                                <div class="uk-slider-container">
                                    <ul class="uk-slider uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1">
                                        <li>
                                            <div class="box">
                                                <div class="image">
                                                    <a href="#"><img src="images/sidebar/blog-1.jpg" alt=""></a>
                                                </div>
                                                <div class="text">
                                                    <p>19<span> / August</span></p>
                                                    <i>10 Comments</i>
                                                    <a href="#"><h3>The Most Beautiful Arrangement</h3></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="box">
                                                <div class="image">
                                                    <a href="#"><img src="images/sidebar/blog-2.jpg" alt=""></a>
                                                </div>
                                                <div class="text">
                                                    <p>19<span> / August</span></p>
                                                    <i>10 Comments</i>
                                                    <a href="#"><h3>The Most Beautiful Arrangement</h3></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="box">
                                                <div class="image">
                                                    <a href="#"><img src="images/sidebar/blog-3.jpg" alt=""></a>
                                                </div>
                                                <div class="text">
                                                    <p>19<span> / August</span></p>
                                                    <i>10 Comments</i>
                                                    <a href="#"><h3>The Most Beautiful Arrangement</h3></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
                                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
                            </div>
                        </div>-->
                    </div>