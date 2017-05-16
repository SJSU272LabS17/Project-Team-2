<? php
 if (session_status() == PHP_SESSION_NONE) {
 	 session_start();
 }
  ?>
 <!DOCTYPE html>
<html>
<head>
<title>Grocery Bargain</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Responsive website compatible with all browsers to sell and buy groceries nearing expiration dates at lesser prices" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){if (window.scrollY == 0) window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<!-- //font-awesome icons -->
<!-- js -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
<?php
	include_once("header.php");
	include_once("navbar.php");
?>

		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3> <span></span> </h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3><span>food</span> </h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3> <i></i></h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
<div class="container">
  <div id="products" class="row list-group">
		<?php
		include_once("php/dbconnect.php");
	  $sql = "SELECT * from product;";
		$result = $conn->query($sql);
		if ($result=mysqli_query($conn,$sql))
  	{
  // Fetch one and one row
  	while ($product=mysqli_fetch_assoc($result))
    	{ ?>
			<!--<div class="item  col-xs-3 col-lg-3">
				<div class="thumbnail">
					<img class="img-rounded" src=<?= $product['product_image'] ?> alt= <?= $product['product_name'] ?> width=400px height=250px; />
					<div class="caption">
						 <h4 class="group inner list-group-item-heading"><?= $product['product_name'] ?></h4>
						 <div class="row">
                <div class="col-xs-12 col-md-2">
                  <p class="list-price text-danger"><s>$<?= $product['product_price'] ?></s> </p>
								</div>
								<div class="col-xs-12 col-md-4">
						 			<p class="price">
									<?php $discount= $product['product_price']*($product['product_discount']/100);
									$newprice = number_format(($product['product_price']-$discount),2,'.',' '); ?>
									$<?= $newprice ?>
									</p>
								</div>
								<div class="col-xs-12 col-md-6">
									<p class="discount" style="color:green">Save <?= $product['product_discount'] ?> %</p>
							</div>
						</div>
						<hr />
						<div class="row">
              <div class="col-xs-12 col-md-6">
                <button type = "button" class = "btn btn-success" data-toggle="modal" data-target="Details-1">Details</button>
 							</div>
 							<div class="col-xs-12 col-md-6">
 						 		<button type = "button" class = "btn btn-info" data-toggle="modal" data-target="Details-1">Add To Cart</button>
 							</div>
 						</div>
					</div>
				</div>
			</div>-->
			<?php }
		} ?>
	</div>

</div>

<!-- //footer -->
<?php
include_once("footer.php");
?>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- script for the product display-->
<script type="text/javascript">
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>
<script>
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
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});
	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
</body>
</html>
