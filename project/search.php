<?php
    include_once("php/dbconnect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

</head>
<body>

<?php
    include_once("header.php");
    $query = $_GET['query'];
    // gets value sent over search form

    $min_length = 3;
    // you can set minimum length of the query if you want

    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then


        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;


        $query = mysqli_real_escape_string($conn,$query);
        // makes sure nobody uses SQL injection

        $sql="SELECT * FROM product WHERE (product_name LIKE '%$query%') OR (product_category LIKE '%$query%') GROUP BY product_name;";

        $result = mysqli_query($conn,$sql) ;

        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table

        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

        if($result->num_rows > 0){ // if one or more rows are returned do following

            while($product = mysqli_fetch_assoc($result)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
            ?>
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
            <?php //echo "<p><h3>".$row['product_name']."</h3>".$row['product_category']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }

        }
        else{ // if there is no matching rows do following
            echo "No results";
        }

    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
?>
</body>
</html>
