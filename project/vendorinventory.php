<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vendor Inventory</title>
  <meta charset="utf-8">
  <meta name="keywords" content="vendor details of inventory" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

  <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
        include_once("vendorheader.php");
  ?>
    <br/>
        <br/>
    <h2  style=" text-align: center;">Vendory Inventory</h2>
  <p style=" text-align: center;">Please click on each of the product below and tell us the inventory you have</p>
<div position="absolute">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#fruits" aria-controls="fruits" role="tab" data-toggle="tab">Fruits</a></li>
    <li role="presentation"><a href="#veggies" aria-controls="veggies" role="tab" data-toggle="tab">Vegetables</a></li>
    <li role="presentation"><a href="#snacks" aria-controls="snacks" role="tab" data-toggle="tab">Snacks</a></li>
  </ul>

  <div class="tab-content current">
    <div role="tabpanel" class="tab-pane active" id="fruits"><iframe src="vendorfruits.php" height="800" width = "1500"></iframe></div>
    <div role="tabpanel" class="tab-pane" id="veggies"><iframe src="veggies.php" height="800" width = "1500"></iframe></div>
    <div role="tabpanel" class="tab-pane" id="snacks"><iframe src="snacks.php" height="800" width = "1500"></iframe></div>
  </div>

	</div>
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
  <?php
        include_once("footer.php");
  ?>
</body>
</html>
