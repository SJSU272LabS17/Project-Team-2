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

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

  </head>
  <body>
		<?php include_once("header.php");?>
		<div class="products-breadcrumb">
			<div class="container">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
					<li>Shopping Cart</li>
				</ul>
			</div>
		</div>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-xs-10">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-xs-6">
										<h2><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h2>
									</div>
									<div class="col-xs-2">
									</div>
									<div class="col-xs-4">
										<a href="products.php" class="btn btn-primary btn-sm btn-block">
											<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
		<?php
		include_once("php/dbconnect.php");
		if( isset($_SESSION['email'])){
			$email = $_SESSION['email'];
			$sql2= "SELECT * FROM customer where customer_email = '$email';";
			$result2 = mysqli_query($conn,$sql2);
			if($result2->num_rows == 1){
				$row2 = mysqli_fetch_assoc($result2);
				$customerid = $row2['customer_id'];
			}
			$sql = "SELECT * FROM shopping_cart WHERE customer_id=$customerid;";
			$result = mysqli_query($conn,$sql);
	    $total=0;
	    $item_count=0;
			while($row=mysqli_fetch_assoc($result)){
				$productid = $row['product_id'];
				$sql1 = "SELECT * FROM product WHERE product_id= $productid";
				$result1 = mysqli_query($conn,$sql1);
				if($result1->num_rows == 1){
					$row1 = mysqli_fetch_assoc($result1);
					$proimage = $row1['product_image'];
				}
					$units = $row['units'];

				$proname = $row['product_name'];
				$oldprice = $row['old_price'];
				$newprice = $row['new_price'];
				$sub_total= $newprice*$units;
				$item_count += $units;
				$total+=$sub_total;
				?>
									<div class="row">
										<div class="col-xs-2"><img class="img img-responsive" src="<?= $proimage ?>">
										</div>
										<div class="col-xs-4">
											<h4></h4>
											<h4 class="product-name"><strong><?= $proname?></strong></h4>
										</div>
										<div class="col-xs-6">
											<div class="col-xs-6 text-right">
												<h6 style="font-size:18px;"><s style="color:red;">$<?= $oldprice ?></s><strong>$<?= $newprice ?> <span class="text-muted">x</span></strong></h6>
											</div>
											<div class="col-xs-4">
												<form class="update-quantity-form" action="updatecart.php" method=post>
													<input type="hidden" name="productname"  value="<?= $proname?>" />
													<input type="hidden" name="customerid"  value="<?= $customerid?>" />
													<input type="text" name="units" class="form-control input-xs" value="<?= $units; ?>" />
													<button type="submit" class="btn btn-info btn-sm btn-block">
														update
													</button>
												</form>
											</div>
											<div class="col-xs-2">
											<button type="button" class="btn btn-link btn-xs">
												<span class="glyphicon glyphicon-trash"> </span>
											</button>
											</div>
										</div>
									</div>
									<hr>
									<?php } ?>
									<div class="row">
										<div class="text-center">
											<div class= "col-xs-9"> </div>
											<div class="col-xs-3">
											</div>
										</div>
									</div>
								</div>
								<div class="panel-footer">
								<div class="row text-center">
								<div class="col-xs-9">
								<h4 class="text-right">Total: <strong> $<?= $total ?></strong></h4>
								</div>
								<div class="col-xs-3">
								<a type="submit" href="checkout.php" class="btn btn-success btn-block">	
									</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php
			}
// no products were added to cart
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "No products found in your cart!";
        echo "</div>";
    echo "</div>";
}
		?>

    <!---->
    <?php include 'footer.php'; ?>
    <!---->
		<script type="text/javascript">
		</script>
    </body>
    </html>
