 <?php session_start(); ?>

<html>
<body>
<?php
include_once("php/dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $quantity = $_POST["quantity"];
  $price = (float) $_POST["price"];
  $quality = $_POST["quality"];
  $expiry_date = date('Y-m-d', strtotime(' +'.$quality.' days'));
  $discountpercentage = $_POST["discountpercentage"];
  $dp_flag= $_POST["dp_flag"];
  $seller_id = $_SESSION['seller_id'];
  $product_name = $_POST['product_name'];
  $product_category = $_POST['product_category'];
  $product_image = 'images/'.$_POST['product_image'];
}

$sql = "INSERT INTO product (product_available_units, product_price, product_sell_by_date, product_discount, dynamic_pricing_flag, seller_id,product_name,product_category,product_image)
VALUES ('$quantity', '$price', '$expiry_date', '$discountpercentage', '$dp_flag', '$seller_id','$product_name','$product_category','$product_image')";

if ($conn->query($sql) == TRUE)
{
    if($product_category== "Vegetables") {
      header('location: veggies.php');
      }
    elseif ($product_category== "Snacks") {
      header('location: snacks.php');
    }
    else {
      header('location: vendorfruits.php');
}
}
else {
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn.close();

?>
</body>
</html>
