<!-- header -->
<?php
if (session_status() == PHP_SESSION_NONE) {
	 session_start();
 }
?>
	<div class="agileits_header">
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<!--div class="product_list_header">
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
		</div-->
		<?php
		if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
			{ echo '<span class=login_user>';
				//echo $_SESSION["username"];
				echo '</span>';
				//echo '<a href="logout.php"><span class="login_user">Logout</span></a></li>';
			?>
			<div class="w3l_header_right">
				<ul>
					<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi,<?php echo $_SESSION["username"]; ?><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
								<ul class="dropdown-menu drp-mnu">
									<li><a href="orders.php">Orders</a></li>
									<li><a href="wishlist.php">Wishlist</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="w3l_header_right1" >
				<a href="php/logout.php" style="color:white;padding:10px 90px 10px 20px ;float:left;" >logout</a>
			</div>
			<?php
			}
			else
			{ ?>
			<div class="w3l_header_right">
				<ul>
					<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customer <i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
						<div class="mega-dropdown-menu">
							<div class="w3ls_vegetables">
								<ul class="dropdown-menu drp-mnu">
									<li><a href="customerlogin.php">Login</a></li>
									<li><a href="customerregister.php">Sign Up</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<div class="w3l_header_right" style = "padding-right: 2em">
				<ul>
					<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Vendor <i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
						<div class="mega-dropdown-menu">
							<div class="w3ls_vegetables">
								<ul class="dropdown-menu drp-mnu">
									<li><a href="vendorlogin.php">Login</a></li>
									<li><a href="login.php">Sign Up</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
  		
		  
		  <?php } ?>

		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop();
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });

	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>Grocery</span> Bargain</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="products.php">Products</a><i>/</i></li>
					<li><a href="about.php">About Us</a></li>
					<!--li><a href="products.php">Best Deals</a><i>/</i></li>
					<li><a href="services.php">Services</a></li-->
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 456 789</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocerybargain.com">store@grocerybargain.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
