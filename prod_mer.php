                            <div class="in-categories">
                                <div class="title">
                                    <h3><?php echo'Merchant Products'; ?></h3>
                                </div>
                                <ul class="list-item uk-grid uk-grid-width-medium-1-2 uk-grid-width-small-1-1 uk-grid-width-1-1"> 
								<?php 
			if($_GET['mer_id']!=''){
				$merid=$_GET['mer_id']; 
				$mer6=$mysqli->query("SELECT * FROM `dealer` WHERE `type`='6' and `chk`=1 and `user_id`='$merid'");
				}else{
				$mer6=$mysqli->query("SELECT * FROM `dealer` WHERE `type`='6' and chk=1 ");
				}
	
			while($mer=mysqli_fetch_object($mer6)){
			$exep_mer=$mysqli->query("SELECT * FROM `product` where `user_id`='$mer->user_id' and chk=1 $sql1 $sql2 $sql3  ");

								while($prod_mer=mysqli_fetch_object($exep_mer)){ ?> 
                                    <li>
                                        <div class="box">
                                            <div class="image">
                                                <a href="prod_details.php?mer=merchant&&merid=<?php echo $mer->user_id;?>&&id=<?php echo time().$prod_mer->serial;?>"><img width="105"  src="<?php echo $url->url;?>/product/<?php echo $prod_mer->img1;?>" alt="<?php echo $prod_mer->name; ?>" title="<?php echo $prod_mer->name; ?>"></a>
                                                
                                            </div>
                                           <div class="text">
                                                    <h3><?php if($prod_mer->offer==1){ echo $prod_mer->discount_price;}else{ echo $prod_mer->sale_price;}?> BDT</h3>
													
													<a><p><?php echo $prod_mer->rp;?> Point</p></a>
													<a><p><?php echo substr($prod_mer->name,0,18);?></p></a> 
													<a><p style="width:auto; background:#; color:#0000cc;"><b><?php echo $mer->log_id;?></b></p></a> 
 
                                                        <a  <?php if(!isset($_SESSION['MemLogId'])){ ?>href="checkout.php?msg2=Please fillup the customer information"<?php } ?> class="<?php if(isset($_SESSION['MemLogId'])){ ?>addtocart<?php } ?> add-to-cart add-to-cart"  data-userstypes="merchant" data-produid="<?php echo $mer->user_id;?>" data-price="<?php if($prod_mer->offer==1){ echo $prod_mer->discount_price; }else{ echo $prod_mer->sale_price; }?>" data-serial="<?php echo time().$prod_mer->serial?>"><span class="uk-icon-shopping-cart"></span> Add To Cart</a> 
                                          </div>
                                        </div>
                                       
                                    </li>
			<?php } }  ?> 

                                </ul>
                            </div>                            
						

                       
                       