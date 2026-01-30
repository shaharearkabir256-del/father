<script>
			jQuery(document).ready(function(){
				var cart=function(){
					var req=jQuery.ajax({
						method: "GET",
						url:"cart.php",
						data: { }
					});
					req.done(function(msg){
						jQuery(".topcart").html(msg);
					});
					
					 var req=jQuery.ajax({
						method: "GET",
						url:"cart_basket.php",
						data: { }
					}); 
					req.done(function(msg){
						jQuery(".cartbasket").html(msg);
					}); 
					
				}
				cart();
				jQuery(".addtocart").on("click", function(){
					var ser=jQuery(this).attr("data-serial"),
					pri=jQuery(this).attr("data-price"),
					productuid=jQuery(this).attr("data-produid"),
					usertype=jQuery(this).attr("data-userstypes"),
					qty=jQuery(this).attr("data-quantity")
					var req=jQuery.ajax({
						method: "GET",
						url:"cart_add_act.php",
						data: {serial:ser,puid:productuid,utype:usertype,fd:pri}
					});
					req.done(function(msg){
						console.log(msg); 
						cart();
					});
				});
			});
		</script>
