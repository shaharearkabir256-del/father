								       <?php 
		$qCat=$mysqli->query("SELECT * FROM `cat` where `cat_id`='$catId' ");
		$qScat=$mysqli->query("SELECT * FROM `scat` where `cat_id`='$scatId' ");
		$qBrand=$mysqli->query("SELECT * FROM `brand` where `cat_id`='$brandId' ");
		$catChk=mysqli_num_rows($qCat);
		$scatChk=mysqli_num_rows($qScat);
		$brandChk=mysqli_num_rows($qBrand);
		$cat=mysqli_fetch_object($qCat);
		$scat=mysqli_fetch_object($qScat);
		$brand=mysqli_fetch_object($qBrand);
		$prodchk=mysqli_num_rows($mysqli->query("SELECT * FROM `product` where `user_id`='0' and `chk`='1' $sql1 $sql2 $sql3 order by serial desc "));
			$exep=$mysqli->query("SELECT * FROM `product` where `user_id`='0' and `chk`='1' $sql1 $sql2 $sql3 order by serial desc ");
			if($prodchk>0){
				
									?>
                            <div class="in-categories"> 
                                <div class="title">
                                    <h3><?php if(($catChk>0)||($scatChk>0)||($brandChk>0)) { echo 'Products > '.$cat->cat;}else{echo'Our All Products';} if($prodchk>0){echo "(".$prodchk.")";} ?></h3>
                                </div>
                                <ul class="list-item uk-grid uk-grid-width-medium-1-2 uk-grid-width-small-1-1 uk-grid-width-1-1">
								<?php while($prod=mysqli_fetch_object($exep)){ ?> 
                                    <li>
                                        <div class="box">
                                            <div class="image">
                                                <a href="prod_details.php?id=<?php echo time().$prod->serial;?>"><img width="105"  src="<?php echo $url->url;?>/product/<?php echo $prod->img1;?>" alt="<?php echo $prod->name; ?>" title="<?php echo $prod->name; ?>"></a>
                                                
                                            </div>
                                           <div class="text">
                                                    <h3><?php if($prod->offer==1){ echo $prod->discount_price;}else{ echo $prod->sale_price;}?> BDT</h3>
													<a><p><?php echo $prod->rp;?> Point</p></a>
													<a><p><?php echo substr($prod->name,0,18);?></p></a> 
 
                                                       <a  <?php if(!isset($_SESSION['MemLogId'])){ ?>href="checkout.php?msg2=Please fillup the customer information"<?php } ?> class="<?php if(isset($_SESSION['MemLogId'])){ ?>addtocart<?php } ?> add-to-cart add-to-cart" data-price="<?php if($prod->offer==1){ echo $prod->discount_price; }else{ echo $prod->sale_price; }?>" data-serial="<?php echo time().$prod->serial?>"><span class="uk-icon-shopping-cart"></span> Add To Cart</a>
                                        
										   </div>
                                        </div>
                                       
                                    </li>
								<?php } ?> 

                                </ul>
                            </div>
							
<?php } ?> 
                        