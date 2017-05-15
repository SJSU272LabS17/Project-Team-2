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

<div class="container">
  <div class="row">
  <div class="col-md-4">
      <div class="thumbnail">
        <a href="inventory.php?productname=SeaSaltChips&productcategory=Snacks&imageurl=seasaltchip.jpg" data-target="#theModal" data-toggle="modal">
          <img src="images/seasaltchip.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p align="center">Sea Salt Chips</p>
          </div>
        </a>

  <div id="theModal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
      </div>

  </div>
    
  <div class="col-md-4">
      <div class="thumbnail">
        <a href="inventory.php?productname=BrownRiceChips&productcategory=Snacks&imageurl=brownricechips.jpg" data-target="#theModal" data-toggle="modal">
          <img src="images/brownricechips.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p align="center">Brown Rice Chips</p>
          </div>
        </a>

  <div id="theModal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
      </div>

  </div>
  
  <div class="col-md-4">
      <div class="thumbnail">
        <a href="inventory.php?productname=ChocolateChips&productcategory=Snacks&imageurl=chocolatechip.jpg" data-target="#theModal" data-toggle="modal">
          <img src="images/chocolatechip.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p align="center">Chocolate Chips</p>
          </div>
        </a>

  <div id="theModal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
      </div>

  </div>
   
  <div class="col-md-4">
      <div class="thumbnail">
        <a href="inventory.php?productname=VeggiesChips&productcategory=Snacks&imageurl=veggieschips.jpg" data-target="#theModal" data-toggle="modal">
          <img src="images/veggieschips.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p align="center">Veggies Chips</p>
          </div>
        </a>

  <div id="theModal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
      </div>

  </div>
       
  <div class="col-md-4">
      <div class="thumbnail">
        <a href="inventory.php?productname=WheatCrackers&productcategory=Snacks&imageurl=wheatcrackers.jpg" data-target="#theModal" data-toggle="modal">
          <img src="images/wheatcrackers.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p align="center">Wheat Crackers</p>
          </div>
        </a>

  <div id="theModal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
      </div>

  </div>
       
       
  <div class="col-md-4">
      <div class="thumbnail">
        <a href="inventory.php?productname=BeefProteinBar&productcategory=Snacks&imageurl=beefproteinbar.jpg" data-target="#theModal" data-toggle="modal">
          <img src="images/beefproteinbar.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p align="center">Beef Protein Bar</p>
          </div>
        </a>

  <div id="theModal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
      </div>

  </div>
       
  <div class="col-md-4">
      <div class="thumbnail">
        <a href="inventory.php?productname=DarkChocolate&productcategory=Snacks&imageurl=darkchocolate.jpg" data-target="#theModal" data-toggle="modal">
          <img src="images/darkchocolate.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p align="center">Dark Chocolate</p>
          </div>
        </a>

  <div id="theModal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
      </div>

  </div>

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

</body>
</html>
