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
<title>Grocery Bargain : products/sellerproducts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
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

		<?php include_once("php/dbconnect.php");
    if( isset($_GET['seller'])){
      $seller = $_GET['seller'];
    }

  	  printProducts("$seller",$conn);

	  ?>
		<!--<ul>
			<li><a href="Vegetables.php">	<h2 class="text-left;">Vegetables</h2></a></li>
			<li><a href="Vegetables.php">	<h4 class="text-leftt;" >View More</h4></a></li>
		</ul>-->


  </div>

<!-- footer -->
<?php include("footer.php"); ?>
<?php function printProducts($seller,$conn){
  $sql2= "SELECT sellerlat,sellerlon FROM seller where seller_name='$seller';";
  $result2 = mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $sellerlat = $row2['sellerlat'];
  $sellerlon = $row2['sellerlon'];
  $sql3= "SELECT userlat,userlon FROM distance limit 1;";
  $result3 = mysqli_query($conn,$sql3);
  $row3 = mysqli_fetch_assoc($result3);
  $userlat = $row3['userlat'];
  $userlon = $row3['userlon'];
  ?>

  <div class="locationdetails" style="font-size:3px;">
    <div id="userlat" ><?= $userlat ?></div>
    <span id="userlon" ><?= $userlon ?></span>
    <div id="sellerlat" ><?= $sellerlat ?> </div>
    <span id="sellerlon" ><?= $sellerlon ?></span>
  </div>

	<div id="products" class="row list-group">
	<ul>
		<li><a href="sellerproducts.php" >	<h2 class="text-left;"><?= $seller ?></h2></a></li>
	</ul>
  <div id="floating-panel">
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
    </div>
  <div id="map" style="width:700px;height:400px;background:white;"></div>
  <ul>
    <li><h2 class="text-left;" id="demo">Products</h2></li>
  </ul>
  <div class=row>
  </div>
  <br/>
</br/>

	<?php
  $sql1 = "SELECT * FROM seller WHERE seller_name= '$seller';";
  $result1 = mysqli_query($conn,$sql1);
  if($result1->num_rows == 1){
    $row1 = mysqli_fetch_assoc($result1);
    $sellerid = $row1['seller_id'];
  }
  $sql = "SELECT * from product where seller_id='$sellerid';";
	$result = $conn->query($sql);
	if ($result=mysqli_query($conn,$sql))
	{
// Fetch one and one row
	while ($product=mysqli_fetch_assoc($result))
		{  ?>
	<div class="item  col-xs-6 col-lg-3 col-sm-4">
		<div class="thumbnail">
			<img class="img img-rounded img-responsive" src=<?= $product['product_image'] ?> alt= <?= $product['product_name'] ?> />
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
						<a href='productdetail.php?category=<?=$product['product_category']?>&name=<?= $product['product_name'] ?>&image=<?= $product['product_image'] ?>' class = "btn btn-success">
              Details </a>
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
<script>
function initMap() {
  var directionsDisplay = new google.maps.DirectionsRenderer;
   var directionsService = new google.maps.DirectionsService;
   var map = new google.maps.Map(document.getElementById('map'), {
     zoom: 14,
     center: {lat: 37.77, lng: -122.447}
   });
   directionsDisplay.setMap(map);

   calculateAndDisplayRoute(directionsService, directionsDisplay);
   document.getElementById('mode').addEventListener('change', function() {
     calculateAndDisplayRoute(directionsService, directionsDisplay);
   });
 }

</script>
<script>
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  var selectedMode = document.getElementById('mode').value;
  var userla = parseFloat(document.getElementById("userlat").innerHTML);
  var userlo = parseFloat(document.getElementById("userlon").innerHTML);
  var sellerla = parseFloat(document.getElementById('sellerlat').innerHTML);
  var sellerlo = parseFloat(document.getElementById('sellerlon').innerHTML);

  directionsService.route({
    origin: {lat: userla, lng: userlo},  // Haight.
    destination: {lat: sellerla, lng: sellerlo},  // Ocean Beach.
    // Note that Javascript allows us to access the constant
    // using square brackets and a string value as its
    // "property."
    travelMode: google.maps.TravelMode[selectedMode]
  }, function(response, status) {
    if (status == 'OK') {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });

}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCCkFyucnzrEKZxpQhpqu5ft9zFH93EsI&callback=initMap"></script>
</body>
</html>
