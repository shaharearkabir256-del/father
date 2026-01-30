<div class="choose-category">
                                <div class="uk-grid uk-grid-match">
								<?php  
								$n=1;
								$exe1=$mysqli->query("SELECT * FROM `cat` where `chk`='1' ORDER BY `cat_id` desc limit 3  ");	 
					while($cat=mysqli_fetch_object($exe1)){
					?>
                                    <div class="uk-width-medium-1-3 uk-width-small-1-2 uk-width-1-1">
                                        <div class="box">
                                            <div class="image">
                                                <img src="images/shop/choose-category-<?php //echo $n++;?>.png" alt="">
                                            </div>
                                            <div class="link">
                                                <h3><?php echo $cat->cat; ?></h3>
                                                <ul>
												<?php  $exe2=$mysqli->query("SELECT * FROM `scat` where `cat_id`='".$cat->cat_id."' order by `scat` limit 3 ");
											while($scat=mysqli_fetch_object($exe2)){
											?>
                                                    <li><a href="product.php?Sub_Category_id=<?php echo $scat->scat_id; ?>"><?php echo $scat->scat; ?></a></li>

													<?php }  ?>
                                                    <li><a href="product.php?Category_id=<?php echo $cat->cat_id; ?>" class="view-all">View All</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
									<?php }  ?>
                                   
                                </div>
                            </div>