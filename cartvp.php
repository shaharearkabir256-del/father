                 <h3 class="title">shopping cart</h3>
				 
				 <!--Start-->
				 
				 <!--End-->
                    <table class="uk-table">
                        <thead>
                            <tr>
                                <th class="uk-width-3-6">Product</th>
                                <th class="uk-width-1-6">Price</th>
                                <th class="uk-width-1-6">Point</th>
                                <th class="uk-width-1-6">Quantity</th>
                                <th class="uk-width-1-6">Total Point</th>
                                <th class="uk-width-1-6">Total Amount</th>
                                <th class="uk-width-1-6">Action</th>
                         
                            </tr>
                        </thead>
                        <tbody>
										<?php
require_once("db/db.php");

	$csrc=$_SESSION['MemLogId'];
	$cc=$mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."'");
	$cc33=mysqli_fetch_object($mysqli->query("SELECT SUM(total) as `price` FROM `cart` WHERE `csrc`='".$csrc."'"));
	$carr=mysqli_num_rows($cc);
	//if($carr>0){
		$cc2=$mysqli->query("SELECT * FROM `cart` WHERE `csrc`='".$csrc."' ORDER BY `serial`");
		$ctotal=mysqli_fetch_object($mysqli->query("SELECT sum(total)as cptotal,sum(tpoint)as cptpoint FROM `cart` WHERE `csrc`='".$csrc."'"));
				while($cart=mysqli_fetch_object($cc2)){
					$produ=mysqli_fetch_object($mysqli->query("SELECT * FROM `product` WHERE `serial`='".$cart->p_id."'"));
	?>
                            <tr>
                                <td class="product-name">
                                    <div class="product">
                                        <div class="remove-product"><a  title="Press To Delete" class="remcp"  data-serial="<?php echo time().$cart->serial?>" ><span class="uk-icon-times"></span></a></div>
                                        <div class="image">
                                            <img width="50" src="<?php echo $cog->url;?>product/<?php echo $produ->img1; ?>" alt="<?php echo $produ->name; ?>" title="<?php echo $produ->name; ?>">
                                        </div>
                                        <div class="text">
                                            <h3><?php echo $produ->name; ?></h3>
                                            <p><?php echo $produ->info; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">
                                    <h5><?php echo $cart->price.$bdt; ?></h5>
                                </td>
								<td class="product-point">
                                    <h5><?php echo $cart->point.$bdt; ?></h5>
                                </td>
                                <td class="product-qty">
								<form action="cart_up_act.php" method="POST" >
								<input type="number" name="serial" class="" value="<?php echo $cart->serial; ?>" hidden>
								<input type="number" name="qty" class="" value="<?php echo $cart->qty; ?>">
                                    </div>
                                </td>
								<td class="product-tpoint">
                                    <h5><?php echo $cart->tpoint.$bdt; ?></h5>
                                </td>
                                <td class="product-total">
                                    <h5><?php echo $cart->total.$bdt; ?></h5>
                                </td>
								<td class="product-action">
                                  <button type="submit" name="cartup" class=""><span class="uk-icon-refresh"></span></button>
								  </form>
                                </td>
                            </tr>
							 <?php } ?> 
                           
                           
                        </tbody>
                    </table>
                    <div class="cart-total uk-clearfix">
					
                        <!--<div class="coupon">
                            <form  action="prod_coupon_act.php" method="post">
                                <input type="text" placeholder="Coupon code">
                                <button type="button">Apply</button>
                            </form>
                        </div>-->
                        <div class="total">
                            <h3>Total: <i> <?php echo $ctotal->cptotal.$bdt; ?> BDT</i></h3>
                            <h3>Total: <i> <?php echo $ctotal->cptpoint.$bdt; ?> Point</i></h3>
                            <div class="tzp-button">
                                <!--<a href="cart_up_act.php" class="button update-cart">Update Cart</a>-->
                                <a href="member/product_order.php?page=Order%20List&&menu=Products" class="button check-out">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>