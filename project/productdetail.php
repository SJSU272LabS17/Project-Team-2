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
					<li><a href="Products.php" >Products</a><span>|</span></li>
					<li>Product details</li>
				</ul>
			</div>
		</div>
		<br/>

		<?php
		if(isset($_GET['way'])){
			$way = $_GET['way'];
		} else {
			$way = "DESC";
		}
		if(isset($_GET['filterby'])){
			$filterby = $_GET['filterby'];
		}
		else {
			$filterby = NULL;
		}
		if(isset($_GET['filterby2'])){
			$filterby2 = $_GET['filterby2'];
		}
		else {
			$filterby2 = NULL;
		}
		if(isset($_GET['filtersby'])){
			$filtersby = $_GET['filtersby'];
		}
		else {
			$filtersby = NULL;
		}
		if(isset($_GET['filtersby2'])){
			$filtersby2 = $_GET['filtersby2'];
		}
		else{
			$filtersby2 = NULL;
		}
		include_once ("php/dbconnect.php");
		if( isset($_GET['category']) && isset($_GET['name']) ){
			$proname = $_GET['name'];
			$procategory = $_GET['category'];
			$proimage = $_GET['image'];
		}
		if($procategory== "Meat "){
			$procategory= "Meat & Fish";
		}
		if($procategory == "Dairy "){
			$procategory == "Dairy & Eggs";
		}
		if(isset($_GET['sortby'])){
			$sortby = $_GET['sortby'];
		} else {
			$sortby = "product_discount";
		}

		if($filterby != NULL){
			if($filterby2!=NULL){
				$sql = "SELECT P.*, D.distance FROM product P INNER JOIN  distance D WHERE P.seller_id = D.seller_id AND P.product_name= '$proname' AND (D.distance>$filterby AND D.distance<$filterby2) ORDER BY $sortby $way  ;";
			}
			else{
				$sql = "SELECT P.* , D.distance FROM product P INNER JOIN distance D WHERE P.seller_id = D.seller_id AND P.product_name= '$proname' AND (D.distance<$filterby) ORDER BY $sortby $way  ;";
			}
		}
		else if($filterby2 != NULL){
			$sql = "SELECT P.* , D.distance FROM product P INNER JOIN distance D WHERE P.seller_id = D.seller_id AND P.product_name= '$proname' AND (D.distance>$filterby2) ORDER BY $sortby $way  ;";
		}
		else if($filtersby!=NULL){
			$sql= "SELECT * FROM product  WHERE product_name= '$proname' AND product_sell_by_date<(Now() + Interval 7 day) ORDER BY $sortby $way  ;";
		}
		else if($filtersby2!=NULL){
			$sql= "SELECT * FROM product  WHERE product_name= '$proname' AND product_sell_by_date>(Now() + Interval 7 day) ORDER BY $sortby $way  ;";
		}
		else {
			$sql = "SELECT * FROM product WHERE product_name= '$proname' ORDER BY $sortby $way;";
		}

		//echo $sql;
		//$sql = "SELECT * FROM product WHERE product_name= '$proname'";
		$result=mysqli_query($conn,$sql);
		?>

  <div class="container" id="productsection" >
		<!-- select boxes for the the sortby option -->

		<div class="select_box" align="right" >
			<p>	Sortby:
				<select name="menu" id="sortby" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="Choose">
				<option value = ''> Choose </option>
				<?php $hostname = $_SERVER['REQUEST_URI'];
				 $url = 'productdetail.php?category='.$procategory.'&name='.$proname.'&image='.$proimage ?>
	        <option value="<?=$hostname?><?= $url ?>&sortby=product_price&way=DESC&filterby=<?php
				if(isset($_GET['filterby']))
					echo $filterby;
				else
					echo NULL;
				?> ">Price: High to Low</option>

	      <option value="<?=$hostname?><?= $url ?>&sortby=product_price&way=ASC&filterby=<?php
				if(isset($_GET['filterby']))
					echo $filterby;
				else
					echo NULL;
				?>">Price: Low to High</option>
				<option value="<?=$hostname?><?= $url ?>&sortby=product_sell_by_date&way=ASC&filterby=<?php
				if(isset($_GET['filterby']))
					echo $filterby;
				else
					echo NULL;
				?>">Expiry date sooner</option>
				<option value="<?=$hostname?><?= $url ?>&sortby=product_sell_by_date&way=DESC&filterby=<?php
				if(isset($_GET['filterby']))
					echo $filterby;
				else
					echo NULL;
				?>">Expiry date later</option>
	 		</select>
			Filter By:
			<select name="menu" id=filterby onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="Choose">
				<option value = ''> Choose </option>
         	<option value="<?=$hostname?><?= $url ?>">None</option>
          	<option value="<?=$hostname?><?= $url ?>&filterby=2&sortby=<?php
			if(isset($_GET['sortby']))
				echo $sortby;
			else
				echo "product_price";
			?>&way=<?php
			if(isset($_GET['way']))
				echo $way;
			else
				echo "DESC";
			?>">Distance &lt 2 miles</option>
          <option value="<?=$hostname?><?= $url ?>&filterby=2&filterby2=5&sortby=<?php
			if(isset($_GET['sortby']))
				echo $sortby;
			else
				echo "product_price";
			?>&way=<?php
			if(isset($_GET['way']))
				echo $way;
			else
				echo "DESC";
			?>">Distance 2-5 miles</option>
          <option value="<?=$hostname?><?= $url ?>&filterby2=5&sortby=<?php
			if(isset($_GET['sortby']))
				echo $sortby;
			else
				echo "product_price";
			?>&way=<?php
			if(isset($_GET['way']))
				echo $way;
			else
				echo "DESC";
			?>">Distance &gt 5 miles</option>
          <option value="<?=$hostname?><?= $url ?>&filtersby=5&sortby=<?php
			if(isset($_GET['sortby']))
				echo $sortby;
			else
				echo "product_price";
			?>&way=<?php
			if(isset($_GET['way']))
				echo $way;
			else
				echo "DESC";
			?>">sellbydate &lt 7 days</option>
          <option value="<?=$hostname?><?= $url ?>&filtersby2=7&sortby=<?php
			if(isset($_GET['sortby']))
				echo $sortby;
			else
				echo "product_price";
			?>&way=<?php
			if(isset($_GET['way']))
				echo $way;
			else
				echo "DESC";
			?>">sellbydate &gt 7days</option>
 			</select>
			</p>
		</div>


    <div class="row ">
     <div class="col-md-4 col-xs-4">
       <div class="row">
         <img
         src= <?= $proimage ?>
         alt="Apple"
         class="image-responsive"
         style="width: 380px;
         height: 230px;border-radius: 10px;"/>
       </div>
       <div class="row ">
         <div class="col-md-12">
           <h3><?= $proname ?></h3>
         </div>
       </div>


     </div>

     <div class="col-md-8 col-xs-8">

			 <h2><a href="<?=$procategory ?>.php"><?= $procategory ?></a></h2>
       <h3>Product details</h3>

       <!--<p>The .table-hover class enables a hover state on table rows:</p> -->
       <table class="table table-responsive " style="color:black;">
         <thead>
           <tr>
             <th class="col-xs-2">Seller</th>
             <th class="col-xs-2">Price</th>
             <th class="col-xs-2">discount</th>
             <th class="col-xs-3">Sell-by-date</th>
						 <th class="col-xs-2">Distance</th>
						 <th class="col-xs-2">Addtocart</th>
           </tr>
         </thead>
         <tbody>
				 <?php while($row = mysqli_fetch_assoc($result)){
	 					$seller = $row['seller_id'];
							$sqld= "SELECT distance from distance where seller_id = $seller ;";
	 					$markedprice = $row['product_price'];
	 					$discount= $row['product_price']*($row['product_discount']/100);
	 					$newprice = number_format(($row['product_price']-$discount),2,'.',' ');
						$sql1 = "SELECT * FROM seller WHERE seller_id= $seller;";
						$result1 = mysqli_query($conn,$sql1);
						$result2 = mysqli_query($conn,$sqld);
						if($result1->num_rows == 1){
							$row1 = mysqli_fetch_assoc($result1);
							$seller_name = getSellerName($row1);
						}
						if($result2->num_rows == 1){
							$row2 = mysqli_fetch_assoc($result2);
							$distance = $row2['distance'];
						}

						?>
     <tr>
       <td class="col-xs-2"><?= $seller_name; ?></td>
       <td class="col-xs-2"><s style="color:red;"><?= $row['product_price']; ?></s><strong><?= $newprice; ?></strong> /<?= $row['product_quantity']; ?></td>
       <td class="col-xs-2"><?= $row['product_discount'];?>%</td>
       <td class="col-xs-3"><?= $row['product_sell_by_date']?></td>
			  <td class="col-xs-2" ><?= $distance ?>mi</td>
       <td class="col-xs-2" >
         <form action="#" >
           <button type=submit class="btn btn-success btn-xs" value="Add"><span class="glyphicon glyphicon-shopping-cart"></span></button>
         </form>
       </td>

     </tr>
		 <?php } ?>
   </tbody>
       </table>
      </div>
    </div><!-- end row -->
   </div><!-- end container -->

<?php
	function getSellerName($row1){
			$seller_name = $row1['seller_name'];
			return $seller_name;
	}
 ?>
 <?php include_once("footer.php"); ?>
 <script type="text/javascript">
 document.getElementById("filterby").onchange = function() {
 	 localStorage.setItem('selectedtem', document.getElementById("filterby").value);
 }

 if (localStorage.getItem('item')) {
 	 document.getElementById("selectedtem").options[localStorage.getItem('selectedtem')].selected = true;
 }​
 </script>

  </body>
</html>
