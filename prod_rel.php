 <?php
 				$sed=$_GET['id'];
				$ret=strlen($sed);
				$seri=substr($sed, 10,$ret);
				settype($seri, "integer");
				$id=$seri;
				$pid=mysqli_fetch_object($mysqli->query("SELECT * FROM `product` where `serial`='$id' and `chk`='1'"));
				
				if($pid->cat_id>0){ $sql1=" and `cat_id`='$pid->cat_id'"; }
				if($pid->scat_id>0){ $sql2=" and `scat_id`='$pid->scat_id'"; }
				if($pid->brand_id>0){ $sql3=" and `brand_id`='$pid->brand_id'"; }
				$exep=$mysqli->query("SELECT * FROM `product` where `chk`='1' $sql1 $sql2 $sql3 $sql3  order by serial desc ");
				$prodchk=mysqli_num_rows($exep);
				if($prodchk>0){
 ?>
 <div class="relate-tshirt">
                    <div class="uk-grid">
                        <div class="uk-width-large-1-4 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
                            <div class="title">
                                <h3>Relate Products</h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="uk-width-large-3-4 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
                            <ul class="slick-slider slick-relate-tshirt uk-slidenav-position">
							  <?php 
			 while($prod=mysqli_fetch_object($exep)){
									?>
                                <li>
                                    <div class="box">
                                        <div class="image">
                                            <a href="prod_details.php?id=<?php echo time().$prod->serial;?>"><img style="width:120px; height:150px;" src="<?php echo $url->url;?>/product/<?php echo $prod->img1;?>" alt="<?php echo $prod->name; ?>" title="<?php echo $prod->name; ?>"></a>
                                        </div>
                                        <div class="text">
										<?php if($prod->offer==1){ ?> 
                                            <h3><?php echo $prod->discount_price.$bdt;?><i><?php echo $prod->sale_price.$bdt;?></i></h3>
										<?php } ?>
										<?php if($prod->offer==0){ ?> 
                                            <h3><?php echo $prod->sale_price.$bdt;?></h3>
										<?php } ?>
                                            <a href="prod_details.php?id=<?php echo time().$prod->serial;?>"><p><?php echo $prod->name;?></p></a>
                                        </div>
                                    </div>
                                </li>
						<?php } ?> 
                            </ul>
                        </div>
                    </div>
                </div>
				<?php } ?>