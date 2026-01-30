<?php
	error_reporting(0);
	ini_set('display_errors','off');
	session_start();
	require("db/db.php");
	$csrc=$_SESSION['MemLogId'];
	$cc=$mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."'");
	$cc33=mysqli_fetch_object($mysqli->query("SELECT SUM(total) as `price`,SUM(tpoint) as `point` FROM `cart` WHERE  `csrc`='".$csrc."'"));
	$carr=mysqli_num_rows($cc);
	if($carr>0){
	?>
                    <h3><span class="uk-icon-shopping-cart"></span> Your Cart - <i><?php echo $carr; ?></i> items</h3>
                    <ul>
					<?php
 
				$cc2=$mysqli->query("SELECT * FROM `cart` WHERE  `csrc`='".$csrc."' ORDER BY `serial` asc LIMIT 3");
				while($cart=mysqli_fetch_object($cc2)){
					$produ=mysqli_fetch_object($mysqli->query("SELECT * FROM `product` WHERE `serial`='".$cart->p_id."'"));
					
			?>
                        <li>
                            <div class="box uk-clearfix">
                                <div class="image">
                                    <img width="50" src="product/<?php echo $produ->img1; ?>" alt="<?php echo $produ->name; ?>" title="<?php echo $produ->name; ?>">
                                </div>
                                <div class="text">
                                    <a href="prod_details.php?id=<?php echo time().$produ->serial;?>"><h3><?php echo $produ->name; ?></h3></a>
									<a><h3><?php echo $cart->qty; ?>x<?php echo $cart->price; ?></h3></a>
                                    <h5>Total: <?php echo $cart->total; ?> BDT</h5>
                                    <h5>Total: <?php echo $cart->tpoint; ?> Point</h5>
                                </div>
								<!--<div class="remove-product">
                                    <a class="remove_product" remove-product-serial="<?php echo time().$produ->serial;?>"><span class="uk-icon-times"></span></a>
                                </div>-->
                            </div>
                        </li>
            <?php } ?>  
                    </ul>
                    <div class="total uk-clearfix">
                        <h3>Sub Total: <span><?php echo $cc33->price; ?> BDT</span></h3><br>
                        <h3>Sub Total: <span><?php echo $cc33->point; ?> Point</span></h3>
                        <div class="tzp-button">
                            <a href="cart_view.php" class="button">View Cart</a>
                        </div>
                    </div>
					<!--<div class="tzp-close-popup"><span class="uk-icon-times"></span></div>-->
					
					
				 <?php } ?>  	
