<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<? php
 if (session_status() == PHP_SESSION_NONE) {
 	 session_start();
 }
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Grocery Bargain : products</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
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
<?php include("header.php"); ?>
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Products</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="container">
    <div class="well well-sm">
        <strong>Category Title</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>


		<?php include_once("php/dbconnect.php");
  	 printProducts("Fruits",$conn);
		 printProducts("Vegetables",$conn);
		 printProducts("Dairy & Eggs",$conn);
		 printProducts("Meat & Fish",$conn);
		  ?>
		<!--<ul>
			<li><a href="Vegetables.php">	<h2 class="text-left;">Vegetables</h2></a></li>
			<li><a href="Vegetables.php">	<h4 class="text-leftt;" >View More</h4></a></li>
		</ul>-->


  </div>

<!-- footer -->
<?php include("footer.php"); ?>
<?php function printProducts($category,$conn){ ?>
	<div id="products" class="row list-group">
	<ul>
		<li><a href="Fruits.php">	<h2 class="text-left;"><?= $category ?></h2></a></li>
		<li><a href="Fruits.php">	<h4 class="text-leftt;" >View More</h4></a></li>
	</ul>
	<?php $sql = "SELECT * from product where product_category='$category' LIMIT 8 ;";
	$result = $conn->query($sql);
	if ($result=mysqli_query($conn,$sql))
	{
// Fetch one and one row
	while ($product=mysqli_fetch_assoc($result))
		{  ?>
	<div class="item  col-xs-6 col-lg-3 col-sm-4">
		<div class="thumbnail">
			<img class="img-rounded" src=<?= $product['product_image'] ?> alt= <?= $product['product_name'] ?> />
			<div class="caption">
				 <h4 class="group inner list-group-item-heading"><?= $product['product_name'] ?></h4>
				 <p class="group inner list-group-item-text">
									Product description... </p>
				 <div class="row list-group-item-price">
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
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<form action="productdetail.php" method="post">
							<fieldset>
								<input type="hidden" name="category" value="<?= $product['product_category'] ?>" />
								<input type="hidden" name="name" value="<?= $product['product_name'] ?>" />
								<input type="hidden" name="description" value="<?= $product['product_description'] ?>" />
								<input type="hidden" name="image" value="<?= $product['product_image'] ?>"  />
								<button type = "submit" class = "btn btn-success" data-toggle="modal" data-target="Details-1">Details</button>
							</fieldset>
						</form>
					</div>
					<div class="col-xs-12 col-md-6 ">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="category" value="<?= $product['product_category'] ?>" />
									<button type = "button" class = "btn btn-info" data-toggle="modal" data-target="Details-1">Add To Cart</button>
								</fieldset>
							</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php }
} ?>
</div>
<?php } ?>

<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- For listing items a grid or list -->
<script>
$(document).ready(function() {
    $('#list').click(function(event){
      event.preventDefault();$('#products .item').addClass('list-group-item');

  });

    $('#grid').click(function(event){
      event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');

    });
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
