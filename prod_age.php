                            <div class="in-categories">
                                <div class="title">
                                    <h3><?php if(($catId>0)||($scatId>0)||($brandId>0)) { echo 'Agent Products';}else{echo'Agent Products';} ?></h3>
                                </div>
                                <ul class="list-item uk-grid uk-grid-width-medium-1-2 uk-grid-width-small-1-1 uk-grid-width-1-1">
								<?php 
			if($_GET['age_id']!=''){ 
			$age_id=$_GET['age_id'];
			$agnt5=$mysqli->query("SELECT * FROM `dealer` WHERE `type`=5 and chk=1 and `user_id`='$age_id' ");
			}else{
			$agnt5=$mysqli->query("SELECT * FROM `dealer` WHERE `type`=5 and chk=1 ");
			}
			while($agnt=mysqli_fetch_object($agnt5)){
			$exep_age=$mysqli->query("SELECT * FROM `stock` where `rec_id`='$agnt->user_id' and `chk`='1' order by serial desc ");

								while($prod_mer=mysqli_fetch_object($exep_age)){ ?> 
                                    <li>
                                        <div class="box">
                                            <div class="image">
                                                <a href="prod_details.php?age=agent&&ageid=<?php echo $agn_info->user_id;?>&&id=<?php echo time().$prod_mer->serial;?>"><img width="105"  src="<?php echo $url->url;?>/product/<?php echo $prod_mer->img1;?>" alt="<?php echo $prod_mer->name; ?>" title="<?php echo $prod_mer->name; ?>"></a>
                                                
                                            </div>
                                           <div class="text">
                                                    <h3><?php echo $prod_mer->price;?> BDT</h3>
													<a><p><?php echo $prod_mer->rp;?> Point</p></a>
													<a><p><?php echo substr($prod_mer->name,0,18);?></p></a> 
 
                                                        <a <?php if(!isset($_SESSION['MemLogId'])){ ?>href="checkout.php?msg2=Please fillup the customer information"<?php } ?> class="<?php if(isset($_SESSION['MemLogId'])){ ?>addtocart<?php } ?> add-to-cart add-to-cart" data-userstypes="agent" data-produid="<?php echo $agnt->user_id;?>" data-price="<?php echo $prod_mer->price;?>" data-serial="<?php echo time().$prod_mer->p_id?>"><span class="uk-icon-shopping-cart"></span> Add To Cart</a> 
                                                    </div>
                                        </div>
                                       
                                    </li>
			<?php } }  ?> 

                                </ul>
                            </div>
							<hr style="color:red">
<!--Agent List-->
                            <div class="in-categories">
                                <div class="title">
                                    <h3><?php echo'Agent List'; ?></h3>
                                </div>
                                <ul class="list-item uk-grid uk-grid-width-medium-1-2 uk-grid-width-small-1-1 uk-grid-width-1-1"> 
								<?php 
			$age5=$mysqli->query("SELECT * FROM `dealer_info` WHERE `type`=5");
			while($age_info=mysqli_fetch_object($age5)){
			$age=mysqli_fetch_object($mysqli->query("select * from `dealer` where `user_id`='".$age_info->user_id."'"));
				if($age->chk==1){						
										?> 
                                    <li>
                                        <div class="box">
                                            <div class="image">
                                              <?php if($_GET['age_id']!=$age_info->user_id){ ?>  <a href="index.php?age_id=<?php echo $age_info->user_id;?>"><?php } ?><img width="105"  src="<?php echo $url->url;?>/dealer/photo/<?php echo $age_info->photo;?>" alt="<?php echo $age_info->fname." ".$age_info->lname; ?>" title="<?php echo $age_info->fname." ".$age_info->lname; ?>"><?php if($_GET['age_id']!=$age_info->user_id){?></a><?php } ?>
                                                
                                            </div>
                                           <div class="text">
                                                    <h3><?php if($_GET['age_id']!=$age_info->user_id){ ?><a href="index.php?age_id=<?php echo $age_info->user_id;?>"><?php } ?><?php echo $age->log_id; ?><?php if($_GET['age_id']!=$age_info->user_id){ ?></a><?php } ?></h3>
													<a><p>Postal: <?php echo $age_info->postal;?>, Zipe: <?php echo $age_info->zip;?> </p></a>
													<a><p>Location: <?php echo $age_info->address;?></p></a> 
 
                                                        <?php if($_GET['age_id']!=$age_info->user_id){?><a href="index.php?age_id=<?php echo $age_info->user_id;?>" class="add-to-cart add-to-cart"><span class="uk-icon-shopping-cart"></span> View Products</a><?php } ?>
                                                    </div>
                                        </div>
                                       
                                    </li>
			<?php    } }  ?>  

                                </ul>
                            </div>
							<hr style="color:red">

                       
                       
                       