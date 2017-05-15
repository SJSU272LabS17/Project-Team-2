<!-- header -->
<?php
if (session_status() == PHP_SESSION_NONE) {
	 session_start();
 }
?>
	<div class="agileits_header">
		<div class="w3l_search">
			<form action="search.php" method="get">
				<input type="text" name="query" min_length=4 value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<button type="submit" class ="btn btn-info" style="padding:10px;" value=""><i class="fa fa-search" aria-hidden="true"></i></button>
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
			<div class="w3l_header_right" style = "padding-right: 2em">
				<p>
	        <a href="viewcart.php" class="btn btn-success btn-lg">
	          <span class="glyphicon glyphicon-shopping-cart"></span> My Cart
	        </a>
	      </p>
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
									<li><a href="login.php">Login</a></li>
									<li><a href="signup.php">Sign Up</a></li>
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
									<li><a href="vendorsignup.php">Sign Up</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
  		
		  
		  <?php } ?>
		
			<div class="w3l_header_right" style = "padding-right: 0px">
				<ul>
					<li class="dropdown" id="menuLogin" style="padding:10px;">
             <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="Location" style="color:white">Location<i class="fa fa-map-marker" aria-hidden="true"></i><span class="caret"></span></a>

						 <div class="dropdown-menu" style="padding:17px;">
               <button type="submit" onclick="getLocation()" class="btn btn-primary" style="margin-top:10px;">Set</button>
             </div>
           </li>
				</ul>
			</div>

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
				<h1><a href="index.php"><span style="color:red; font-size:45px; line-height:35px; font-family: Ar Delaney;">Timely</span>Grocery</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="products.php">Products</a><i>/</i></li>
					<li><a href="#">About Us</a></li>
					<!--li><a href="products.php">Best Deals</a><i>/</i></li>
					<li><a href="services.php">Services</a></li-->
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(408)456 7891</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocerybargain.com">store@grocerybargain.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<script type="text/javascript">
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});
</script>
<!--* to get location value of user -->
<script type="text/javascript">

function getLocation() {

		 var timeoutVal = 10 * 1000 * 1000;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, displayError,
    { enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 0 });
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    //x.innerHTML = "Latitude: " + position.coords.latitude +
    //"<br>Longitude: " + position.coords.longitude;
		$.ajax({
            type: "POST",
            url: "getlocation.php",
            data: {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude
            },
            success: function (data) {
                $("#demo").html(data);
            }
      });
}

function displayError(error) {
  var errors = {
    1: 'Permission denied',
    2: 'Position unavailable',
    3: 'Request timeout'
  };
  alert("Error: " + errors[error.code]);
}
</script>

